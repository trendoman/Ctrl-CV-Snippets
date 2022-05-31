```html
<cms:config_list_view >
    <cms:field 'k_content'>
        <div class="mosaic-list">
            <div class="row">
                <div class="cell cell-label col-md-2">
                    <label><cms:show k_template__tile_label /></label>
                </div>
                <div class="cell cell-content col-md-10">
                    <div class="field-content">
                        <cms:embed "template_editables/config_list_tile_editable_text.html" />
                    </div>
                </div>
            </div>
        </div>
    </cms:field>
</cms:config_list_view>
```
