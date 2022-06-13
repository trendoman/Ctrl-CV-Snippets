# dropdown

```html
<cms:editable
    name="my_related_folder"
    label="Related folder"
    opt_values='my_folder_listing.htm'
    dynamic='opt_values'
    type='dropdown'
/>


Please Select=-
<cms:folders masterpage='product.php'>
    | <cms:show k_folder_title  /> = <cms:show k_folder_name />
</cms:folders>
```
