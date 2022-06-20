# $FUNCS

## get_clean_url

```php
foreach( $my_session as $k=>$v ){
    $my_session[ $FUNCS->get_clean_url($k) ] = $v;
}
```

## funcs

```php
if( !array_key_exists($func_name, $FUNCS->funcs) ){ // function not registered
   $body .= "<br><pre><strong>WARN: &lt;cms:call /&gt; - function '".$func_name."' is not available.</strong></pre>";
}
```

## hash

### create
```php
$hash = $FUNCS->hash_hmac( $data, $FUNCS->hash_hmac($data, $FUNCS->get_secret_key()) );
```

### check
```php
$hash = ( $hash ) ? trim($hash) : trim($params[0]['rhs']);
$data = ( $data ) ? trim($data) : trim($params[1]['rhs']);

$hash2 = $FUNCS->hash_hmac( $data, $FUNCS->hash_hmac($data, $FUNCS->get_secret_key()) );
return ( $hash2 == $hash ) ? 1 : 0;
```

## refresh user

```html
<cms:php>
   global $FUNCS;
   $FUNCS->set_userinfo_in_context();
</cms:php>
```
