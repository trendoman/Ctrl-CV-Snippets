# Mosaic

```html
<cms:mosaic name='my_fields' label='Fields'><cms:ignore>

   // Memo

   </cms:ignore>

    <cms:tile name='editable_text' label='Text'>
        <cms:config_list_view >
        </cms:config_list_view>

        <cms:config_form_view >
        </cms:config_form_view>
    </cms:tile>

</cms:mosaic>

```

```xml
<cms:mosaic name="content_<cms:show k_count />" label="Content <cms:show k_count />">
  <cms:tile name='heading' label='Heading'>
      <cms:editable name='heading' label='Heading' type='text' />
  </cms:tile>

  <cms:tile name='text' label='Text'>
      <cms:editable name='text' label='Text' type='richtext' toolbar='basic' />
  </cms:tile>

  <cms:tile name='image' label='Image'>
      <cms:editable name='image' label='Image' type='image' show_preview='1' preview_width='150' />
      <cms:editable name='caption' label='Caption' type='text' />
      <cms:editable name='align' label='Align' opt_values='Left | Center | Right' type='dropdown'/>
  </cms:tile>

  <cms:tile name='quote' label='Quote'>
      <cms:editable name='quote' label='Quote' type='textarea' height='80'  />
      <cms:editable name='author' label='Author' type='text' />
  </cms:tile>

  <cms:tile name='list' label='List'>
      <cms:repeatable name='list' label='List'>
          <cms:editable name='item' label='Item' type='text' />
      </cms:repeatable>
  </cms:tile>
</cms:mosaic>
 ```
