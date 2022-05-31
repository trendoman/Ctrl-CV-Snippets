# field

```html
<cms:field 'admin_html' no_wrapper='1' order='-1'>
    <h1 id="type-text-">type = 'text'</h1>
    <p>Editable region of <em>text</em> type is used to allow users to input text when only one line of text is required.<br>
            For this type, Couch creates a single line textbox for data input.</p>
    <hr/>
</cms:field>
```

```html
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
```

```html
<cms:config_list_view>
  <cms:field name=''
      sortable=''
      sort_name=''
      class=''
      header=''
  >
    <cms:ignore>
      // See tags.php:5037
    </cms:ignore>
  </cms:field>
</cms:config_list_view>
```

```html
<cms:config_form_view>
  <cms:field name=''
      label=''
      desc=''
      order=''
      group=''
      class=''
      icon=''
      no_wrapper=''
      skip=''
      hide=''
      required=''
      is_compound=''
  >
    <cms:ignore>
      // See tags.php:5087
    </cms:ignore>
  </cms:field>
</cms:config_form_view>
```
