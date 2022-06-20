# arrays

```php
$core_tags = array_values( get_class_methods($TAGS) );
$plug_tags = array_keys( $FUNCS->tags );
$tags = array_merge( $core_tags, $plug_tags );

$tags = array_filter($tags, function($v) {
    return ( $v[0] == '_' ) ? 0 : 1;
});
$tags = array_values( $tags );
array_walk($tags, function(&$v) {
    if( substr($v, 0, 2)=='k_' ) $v = substr( $v, 2 );
});
sort( $tags );
```
