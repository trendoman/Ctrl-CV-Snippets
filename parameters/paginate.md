# paginate

## folders

```html
 <cms:ignore><!-- Категории в Блог --></cms:ignore>
 <cms:folders masterpage='index.php' root='world' include_custom_fields='1'
     paginate='1'
     hierarchical='1'
     limit=mypagination_limit>
     <cms:if task.pg gt k_total_pages >
         <cms:if k_paginated_bottom>
             <cms:set task.notes. = "2nd tag :no_results" scope='parent' />
         </cms:if>
         <cms:ignore><!--do nothing -- see https://github.com/CouchCMS/CouchCMS/issues/140 --></cms:ignore>
     <cms:else />
         <url><loc><cms:show k_site_link/><cms:show k_folder_name/>/</loc></url>
         <cms:if k_paginated_bottom && k_paginate_link_next>
             <cms:set task.sequent_task = k_paginate_link_next scope='parent' />
             <cms:set task.notes. = "2nd tag listed <cms:concat '[' k_current_record ' / ' k_total_records '] records' />" scope='parent' />
         <cms:else_if k_paginated_bottom />
             <cms:set task.notes. = "2nd tag listing done <cms:concat '[' k_total_records '] records' />" scope='parent' />
         </cms:if>
     </cms:if>
     <cms:no_results>
         <cms:set task.notes. = "2nd tag :no_results" scope='parent' />
     </cms:no_results>
 </cms:folders>
```
