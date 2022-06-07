# multi curl

https://schibsted.com/blog/php-perform-requests-in-parallel/

```php
$urls = array(
    'http://graph.facebook.com/http://tech.vg.no',
    'http://graph.facebook.com/http://www.vg.no',
);

$multi = curl_multi_init();
$channels = array();

// Loop through the URLs, create curl-handles
// and attach the handles to our multi-request
foreach ($urls as $url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_multi_add_handle($multi, $ch);

    $channels[$url] = $ch;
}

// While we're still active, execute curl
$active = null;
do {
    $mrc = curl_multi_exec($multi, $active);
} while ($mrc == CURLM_CALL_MULTI_PERFORM);

while ($active && $mrc == CURLM_OK) {
    // Wait for activity on any curl-connection
    if (curl_multi_select($multi) == -1) {
        continue;
    }

    // Continue to exec until curl is ready to
    // give us more data
    do {
        $mrc = curl_multi_exec($multi, $active);
    } while ($mrc == CURLM_CALL_MULTI_PERFORM);
}

// Loop through the channels and retrieve the received
// content, then remove the handle from the multi-handle
foreach ($channels as $channel) {
    echo curl_multi_getcontent($channel);
    curl_multi_remove_handle($multi, $channel);
}

// Close the multi-handle and return our results
curl_multi_close($multi);
```
