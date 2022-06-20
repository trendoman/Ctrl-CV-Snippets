# KParser

```php
$body = trim( @file_get_contents( $filepathname ) );
$CTX->push( '__help_page__', 1 /*no_check*/ );
$CTX->set('tag_name', $tag_name);
$CTX->set('params', (array)$params);

$parser = new KParser( $body );
$body = $parser->get_HTML();

$CTX->pop();
```

Exec code:
```php
// run requested tag as <cms:{tag_name} help='1' />
$code = "{$form}<cms:{$tag_name} help='1' />";
$parser = new KParser( $code );
$result = $parser->get_HTML();
```
