<?php

/*
 *
 *
 *
 * */

static::$glob_files = array_merge(static::$glob_files, glob("$valid_dir/*.".FOD_FILE_EXTENSION));
$subdirs = glob("$valid_dir/*", GLOB_ONLYDIR);
foreach( $subdirs as $subdir )
{
   static::add_dir($subdir);
}

/*
 *
 *
 * https://stackoverflow.com/a/47369647/7524904
 * */

class AllFiles {
   public $files = [];
   static $Iterator;

   function __construct($folder) {
      AllFiles::$Iterator = new ArrayIterator();
      $this->read($folder);
   }

   function read($folder) {
      $folders = glob("$folder/*", GLOB_ONLYDIR);

      foreach ($folders as $folder)
      {
         $this->files[] = $folder . "/";
         $this->read( $folder );
      }

      $files = array_filter(glob("$folder/*"), 'is_file');

      foreach ($files as $file)
      {
         $this->files[] = $file;
      }
   }

   function __toString() {
      return implode( "\n", $this->files );
   }
};

$allfiles = new AllFiles("baseq3");
echo $allfiles;
