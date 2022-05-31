```html
<cms:config_form_view>
    <cms:html>
        <cms:if k_page_date eq '0000-00-00 00:00:00'>
          <style>
            #page-unpublished {
              position: absolute;
              right: 210px;
              margin-top: 25px;
            }
          </style>
          <span id="page-unpublished"
              class="label label-error"
              >Unpublished</span>
        </cms:if>
    </cms:html>
    <cms:script>
        <cms:if k_page_date = ''>
        $('input:radio[name=f_publish_status][value=0]').click();
        </cms:if>
    </cms:script>
</cms:config_form_view>
```
