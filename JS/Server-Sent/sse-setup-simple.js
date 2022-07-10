var nonce = "<cms:create_nonce action='ajax_action_emit' />";
var eventUrl = '<cms:show k_admin_link />ajax.php?act=emit&nonce=' + nonce;

const ssEvent = new EventSource( eventUrl );

ssEvent.onopen = function (evt) {
  // handle newly opened connection
}

ssEvent.onerror = function (evt) {
  // handle dropped or failed connection
}

ssEvent.onmessage = function (evt) {
  // handle new event from server
}
