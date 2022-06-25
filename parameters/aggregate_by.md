# aggregate_by

https://www.couchcms.com/forum/viewtopic.php?f=5&t=8581

List all students who take exactly one course:

```html
 <cms:pages masterpage='courses.php' aggregate_by='students.php::take' custom_field="k_rel_count>1" orderby='k_rel_count' >
    <a href="<cms:show k_page_link />"><h3><cms:show k_page_title /> (<cms:show k_rel_count />)</h3></a>
</cms:pages>
```


---

I wish to list States, which have more than '0' companies associated with each of them.

```xml
<cms:pages masterpage='students.php' aggregate_by='take' custom_field='k_rel_count>2' orderby='k_rel_count'  >
    <a href="<cms:show k_page_link />"><h3><cms:show k_page_title /></h3></a>
</cms:pages>
```

↓

I suggest you please try the reverse syntax and see what happens -

```xml
<cms:pages masterpage='data/states.php' aggregate_by='admin/firma.php::firmastate_rel' custom_field='k_rel_count>2' orderby='k_rel_count' >
</cms:pages>
```
