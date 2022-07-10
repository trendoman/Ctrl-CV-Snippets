# iterator

## Some links

* https://stackoverflow.com/questions/69839989/does-iterator-work-only-with-numeric-arrays

## GlobIterator

```php
<?php

$Iterator = new \GlobIterator($dir.'/*.func');
while ($Iterator->valid()) {
   var_dump($Iterator->current()->getFilename());
   $Iterator->next();
}
```

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

## [When does the NoRewindIterator rewind the inner Iterator?](https://stackoverflow.com/a/16682199/7524904)

Like by the name of the class alone (`NoRewindIterator`), [the manual has](http://php.net/NoRewindIterator) the following wording in specific:

> NoRewindIterator  - This iterator cannot be rewound.

And for the concrete method:

> NoRewindIterator::rewind() - Prevents the rewind operation on the inner iterator.

This implies that the `Iterator::rewind()` method is not passed through to the inner iterator. Tests also show this, here is a simple one I've been running (code of all iterators not part of PHP are in the [Iterator Garden](https://github.com/hakre/Iterator-Garden)):

    $iterator = new RangeIterator(1, 1);
    $debug    = new DebugIteratorDecorator($iterator);
    $noRewind = new NoRewindIterator($debug);

    echo "first foreach:\n";

    foreach ($noRewind as $value) {
        echo "iteration value: $value\n";
    }

In this code, the debug-iterator prints (echoes) iteration information on the fly:

    first foreach:
    Iterating (RangeIterator): #0 valid()
    Iterating (RangeIterator): #0 parent::valid() is TRUE
    Iterating (RangeIterator): #0 current()
    Iterating (RangeIterator): #0 parent::current() is 1
    iteration value: 1
    Iterating (RangeIterator): #1 next()
    Iterating (RangeIterator): #1 after parent::next()
    Iterating (RangeIterator): #1 valid()
    Iterating (RangeIterator): #1 parent::valid() is FALSE

As this shows, `$iterator->rewind()` is never called.

This also makes sense for the same reasons given in a related question: [*Why must I rewind IteratorIterator*](https://stackoverflow.com/q/2458955/367456). The `NoRewindIterator` extends from `IteratorIterator` and *different* to it's parent class, the `getInnerIterator()` method returns an `Iterator` and not a `Traversable`.

This change allows you to initialize the rewind when you need to:

    echo "\n\$calling noRewind->getInnerIterator()->rewind():\n";

    $noRewind->getInnerIterator()->rewind();

    echo "\nsecond foreach:\n";

    foreach ($noRewind as $value) {
        echo "iteration value: $value\n";
    }

Exemplary debug output again:

    $calling noRewind->getInnerIterator()->rewind():
    Iterating (RangeIterator): #0 rewind()
    Iterating (RangeIterator): #0 after parent::rewind()

    second foreach:
    Iterating (RangeIterator): #0 valid()
    Iterating (RangeIterator): #0 parent::valid() is TRUE
    Iterating (RangeIterator): #0 current()
    Iterating (RangeIterator): #0 parent::current() is 1
    iteration value: 1
    Iterating (RangeIterator): #1 next()
    Iterating (RangeIterator): #1 after parent::next()
    Iterating (RangeIterator): #1 valid()
    Iterating (RangeIterator): #1 parent::valid() is FALSE

Knowing about these details then does allow to create a `OneTimeRewindIterator` for example:

    /**
     * Class OneTimeRewindIterator
     */
    class OneTimeRewindIterator extends NoRewindIterator
    {
        private $didRewind = FALSE;

        public function rewind() {
            if ($this->didRewind) return;

            $this->didRewind = TRUE;
            $this->getInnerIterator()->rewind();
        }
    }

