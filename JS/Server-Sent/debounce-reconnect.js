/* https://stackoverflow.com/a/54385424/7524904 */

function isFunction(functionToCheck) {
  return functionToCheck && {}.toString.call(functionToCheck) === '[object Function]';
}

function debounce(func, wait) {
    var timeout;
    var waitFunc;

    return function() {
        if (isFunction(wait)) {
            waitFunc = wait;
        }
        else {
            waitFunc = function() { return wait };
        }

        var context = this, args = arguments;
        var later = function() {
            timeout = null;
            func.apply(context, args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, waitFunc());
    };
}

// reconnectFrequencySeconds doubles every retry
var reconnectFrequencySeconds = 1;
var evtSource;

var reconnectFunc = debounce(function() {
    setupEventSource();
    // Double every attempt to avoid overwhelming server
    reconnectFrequencySeconds *= 2;
    // Max out at ~1 minute as a compromise between user experience and server load
    if (reconnectFrequencySeconds >= 64) {
        reconnectFrequencySeconds = 64;
    }
}, function() { return reconnectFrequencySeconds * 1000 });

function setupEventSource() {
    evtSource = new EventSource(/* URL here */);
    evtSource.onmessage = function(e) {
      // Handle even here
    };
    evtSource.onopen = function(e) {
      // Reset reconnect frequency upon successful connection
      reconnectFrequencySeconds = 1;
    };
    evtSource.onerror = function(e) {
      evtSource.close();
      reconnectFunc();
    };
}
setupEventSource();
