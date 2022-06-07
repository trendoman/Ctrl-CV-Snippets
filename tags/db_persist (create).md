# db_persist mode='create'

```html
<cms:repeat count=mypagination_limit >

     <cms:db_persist
         _masterpage = k_template_name
         _mode = 'create'
         _auto_title = '1'
         _fields = '' >

         <cms:if k_success>
         <cms:else />
         </cms:if>
     </cms:db_persist>

</cms:repeat>
```

```html
<cms:test
    ignore='0'>

     <cms:db_persist
         _masterpage = 'index.php'
         _mode = 'create'
         _auto_title = '1'
         _fields = '' >

         <cms:if k_success>
             <cms:php>error_log("<cms:show k_last_insert_id />");</cms:php>
         <cms:else />
             <cms:show k_error />
         </cms:if>
     </cms:db_persist>

</cms:test>
```

Following works with modded **db_persist**, which accepts all core parameters dynamically besides ***_fields*** &mdash;
```html
 <cms:capture into='_fields__create_page' is_json='1'>{
       "_masterpage" : <cms:escape_json >index.php</cms:escape_json>
     , "_mode" : "create"
     , "_auto_title" : "1"
 }</cms:capture>
```
