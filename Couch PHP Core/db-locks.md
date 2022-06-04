# locks

```php
if( !$DB->is_free_lock('mylock') ) die;
```

##### benchmark
```php
global $DB, $CTX;
for( $x=1; $x<=1000; $x++ ){
    if( !$DB->get_lock('lock_limit_decline_'.$x) ) die;
}
```
