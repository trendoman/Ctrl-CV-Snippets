# aliases

Array manipulation

```php
extract( $FUNCS->get_named_vars( // any keyword that you can remember and use :)
           array(
               'tag' => '',
               'show_form' => '0'
               ),
           $params)
      );

// allow param aliases
$show_form_idx = key( array_intersect( array_column($params, 'lhs'),
                       array(
                           'show_form', 'use_form', 'form',
                           'show_input', 'use_input', 'input'
                           )
                       ));

if( $show_form_idx !== false && !empty( $params[$show_form_idx]['lhs'])  ){
   $show_form = ( trim($params[$show_form_idx]['rhs']) == '1') ? 1 : 0;
}

```
