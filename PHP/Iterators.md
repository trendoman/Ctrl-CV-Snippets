# iterator

```php
<?php

$exclude = array_map(function($path){ return str_replace( array('\\','/'), DIRECTORY_SEPARATOR, $path); }, array(
  __FILE__,
  __DIR__.DIRECTORY_SEPARATOR.'gen-fakes'.DIRECTORY_SEPARATOR.'vendor',
));

// Process new tags first, then other folders
$iterator = new AppendIterator();
if( is_readable(__DIR__.DIRECTORY_SEPARATOR.'tags-new') ){
  $dir_iterator = new RecursiveDirectoryIterator( __DIR__.DIRECTORY_SEPARATOR.'tags-new', FilesystemIterator::SKIP_DOTS );
  $iterator->append(new RecursiveIteratorIterator( $dir_iterator ));
}
if( is_readable(__DIR__.DIRECTORY_SEPARATOR.'tags-modded') ){
  $dir_iterator = new RecursiveDirectoryIterator( __DIR__.DIRECTORY_SEPARATOR.'tags-modded', FilesystemIterator::SKIP_DOTS );
  $iterator->append(new RecursiveIteratorIterator( $dir_iterator ));
}

$dir_iterator = new RecursiveDirectoryIterator( __DIR__, FilesystemIterator::SKIP_DOTS );
$iterator->append(new RecursiveIteratorIterator( $dir_iterator ));
foreach ($iterator as $file) {
```

## regex

```php
<?php

$Iterator = new \RecursiveDirectoryIterator( $dir, \FilesystemIterator::SKIP_DOTS );
$RIterator = new \RegexIterator( new \RecursiveIteratorIterator( $Iterator ), '/\.func$/i',  \RegexIterator::MATCH );
```
