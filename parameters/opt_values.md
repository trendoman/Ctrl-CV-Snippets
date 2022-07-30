# opt_values

```html
<cms:editable
    name="my_related_folder"
    label="Related folder"
    opt_values='my_folder_listing.htm'
    dynamic='opt_values'
    type='dropdown'
/>

<!--my_folder_listing-->

Please Select=-
<cms:folders masterpage='product.php'>
    | <cms:show k_folder_title  /> = <cms:show k_folder_name />
</cms:folders>

<!-- show -->
<cms:if my_related_folder != '-' >
    <cms:pages masterpage='product.php' folder=my_related_folder>
        <!-- all pages (i.e. images) from the folder available here -->
    </cms:pages>
</cms:if>
```

## padded custom dropdown

```xml
-- Раздел / Категория / Субкатегория --=-|
<cms:folders masterpage='index.php' childof='' hierarchical='1' include_custom_fields='1' depth='0' orderby='weight' order='asc'>
      <cms:set pad="<cms:repeat k_level>- &nbsp;&nbsp;&nbsp;</cms:repeat>"/><cms:show pad/><cms:show k_folder_title/>=<cms:show k_folder_name />|
</cms:folders>
```
