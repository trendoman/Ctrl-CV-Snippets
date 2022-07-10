# Files

## scandir

      function listAllFiles( $dir ) {
      $array = array_diff(scandir($dir), array('.', '..', '.git'));

      foreach ($array as &$item) {
      $item = $dir . $item;
      }
      unset($item);
      foreach ($array as $item) {
      if (is_dir($item)) {
      $array = array_merge($array, listAllFiles($item . DIRECTORY_SEPARATOR));
      }
      }
      return $array;
      }

      $start = microtime(true);
      listAllFiles(K_SITE_DIR);
      error_log('Full scan complete in '.((microtime(true)-$start)*1000).' msec.' );
