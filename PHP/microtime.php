<?php

$start = microtime(true);
\trendoman\CmsFu\Autoload::find_and_read( '-' );
error_log('Full scan complete in '.((microtime(true)-$start)*1000).' msec.' );
