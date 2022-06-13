# alter_page_tag_query


### compact listing

```php
global $FUNCS;
$FUNCS->add_event_listener( "alter_page_tag_query", function(
      &$d, &$cqf, &$cqfa, &$qf, &$qt,
      &$s, &$gb, &$h, &$os, &$ls, &$m,
      $params, $node, $rec_tpl, $token ){
         var_dump( $node->name );
}, 0);
```

### native listing

```php
$FUNCS->add_event_listener( "alter_page_tag_query", function(
      &$distinct,
      &$count_query_field,
      &$count_query_field_as,
      &$query_fields,
      &$query_table,
      &$sql,
      &$group_by,
      &$having,
      &$order_sql,
      &$limit_sql,
      &$mode,
      $params,
      $node,
      $rec_tpl,
      $token
      ){
});
```
