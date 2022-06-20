# Insert

Place a variable after another one.

```php
<?
if( $AUTH->user->access_level >= K_ACCESS_LEVEL_SUPER_ADMIN ){
   $pos = array_search( 'k_user_access_level', array_keys($CTX->ctx['0']['_scope_']) );
   $first_array = array_splice( $CTX->ctx['0']['_scope_'], 0, $pos+1 );
   $CTX->ctx['0']['_scope_'] = array_merge( $first_array, array (
       'k__user_superadmin' => '1',
       'k__is_superadmin' => '1'
       ), $CTX->ctx['0']['_scope_'] );
}
```
