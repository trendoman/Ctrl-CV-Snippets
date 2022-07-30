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

## with config

```xml
<cms:mosaic name="images" label="Produkt Images" >

  <cms:tile name='tile_image' label='Image'>
      <cms:editable name='image' label='Image' type='image' width='1700' show_preview='1' preview_width='300' order='10'/>
      <cms:editable name='caption' label='Caption' type='text' order='20'/>

      <cms:editable name='thumb_500' label='Thumb x500' width='500' height='500' show_preview='1' assoc_field='image' type='thumbnail' order='100' />
      <cms:editable name='thumb_150' label='Thumb x150' width='150' height='150' show_preview='1' assoc_field='image' type='thumbnail' order='200' />

      <cms:config_list_view>
          <cms:field 'k_content' >
              <div class="mosaic-list">
                  <div class="row">
                      <div class="cell cell-label col-md-2">
                          <label>Image</label>
                      </div>
                      <div class="cell cell-content col-md-4">
                          <div class="field-content">
                              <a class="img-popup" href="<cms:show image />">
                                  <img src="<cms:show image />" width="500">
                              </a>
                          </div>
                      </div>
                      <div class="cell cell-content col-md-3">
                          <div class="field-content">
                              <a class="img-popup" href="<cms:show thumb_500 />">
                                  <img src="<cms:show thumb_500 />" width="350">
                              </a>
                          </div>
                      </div>
                      <div class="cell cell-content col-md-3">
                          <div class="field-content">
                              <a class="img-popup" href="<cms:show thumb_150 />">
                                  <img src="<cms:show thumb_150 />" width="150">
                              </a>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="cell cell-label col-md-2">
                          <label>Caption</label>
                      </div>
                      <div class="cell cell-content col-md-10">
                          <div class="field-content">
                              <cms:show caption />
                          </div>
                      </div>
                  </div>
              </div>
          </cms:field>
      </cms:config_list_view>

  </cms:tile>

</cms:mosaic>
```
