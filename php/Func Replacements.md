# Functions

## array_column

```php
 /**
 *   Replacement for native PHP function 'array_column' which doesn't exist before PHP v5.5
 *
 *   @author
 *   @date   21.06.2019
 */

 if(!function_exists("array_column")){
     function array_column( $array, $column_name ){
         return array_map(function($element) use($column_name){return $element[$column_name];}, $array);
     }
 }

```
