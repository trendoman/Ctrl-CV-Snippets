# globals

```html
<cms:globals>

   <cms:editable type='group' name='group_slider' label='Slider Section' collapsed='0' order='0' />

    <cms:mosaic name='files' label='Files' group='group_slider'>

        <cms:tile name='image' label='Image'>
            <cms:editable name='image' label='Image' type='image' show_preview='1' preview_width='150' />
            <cms:editable name='caption' label='Caption' type='text' />

              <cms:editable type='relation' name='editable_slider_related_media'
                         advanced_gui='1' masterpage='index.php' has='one' group='group_slider'
                         label='(related)' desc='Select from existing' order='1' />


            <cms:config_list_view>
                <cms:field 'k_content' skip='0' hide='1'>
                </cms:field>
            </cms:config_list_view>
        </cms:tile>

    </cms:mosaic>

    <cms:config_form_view>
        <cms:field 'files' skip='1'>

            <h4>DropZone for files, related to current user.</h4>
            <p>Files saved in 'globals' template, inside an unlimited mosaic, which is configured to display thumbnails with name, size, type and url.</p>

        </cms:field>
    </cms:config_form_view>

</cms:globals>
```

### get_global

```html
<cms:get_global 'files'>
    <cms:show_mosaic 'files' limit='1'>

        <cms:pages masterpage=k_template_name limit='1'>

            <cms:db_persist _mode='edit' _masterpage=k_template_name _page_id=k_page_id caption="<cms:date />" ignore='1' />

            <cms:form masterpage=k_template_name mode='edit' page_id=k_page_id method="post">


                <cms:if k_success>
                    <cms:db_persist_form />
                </cms:if>
                <cms:input type='bound' name='image' />
                <cms:input type='bound' name='caption' />

                <cms:input type='submit' name='submit' />
            </cms:form>

        </cms:pages>

    </cms:show_mosaic>
</cms:get_global>
```
