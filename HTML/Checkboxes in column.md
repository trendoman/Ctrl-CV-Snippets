# column

```html
# editable region is named "common_params", hence the element calling.
<cms:config_form_view>
    <cms:style>
        # Checkboxes placed in columns

        @media (max-width: 767px) {
            #k_element_common_params {column-count:2}
        }
        @media (min-width: 768px) and (max-width: 1199px) {
            #k_element_common_params {column-count:3}
        }
        @media (min-width: 1200px) {
            #k_element_common_params {column-count:5}
        }
        @media (min-width: 1600px) {
            #k_element_common_params {column-count:6}
        }
    </cms:style>
</cms:config_form_view>
```
