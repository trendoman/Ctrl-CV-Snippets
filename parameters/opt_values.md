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
