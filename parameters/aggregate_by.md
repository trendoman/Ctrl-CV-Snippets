# aggregate_by

https://www.couchcms.com/forum/viewtopic.php?f=5&t=8581

List all students who take exactly one course:

```html
 <cms:pages masterpage='courses.php' aggregate_by='students.php::take' custom_field="k_rel_count>1" orderby='k_rel_count' >
    <a href="<cms:show k_page_link />"><h3><cms:show k_page_title /> (<cms:show k_rel_count />)</h3></a>
</cms:pages>
```
