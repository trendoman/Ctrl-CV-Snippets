```html
<cms:config_form_view >
    <cms:persist name="<cms:if "<cms:strlen frm_name />" ><cms:show frm_name /><cms:else /><cms:show k_template__tile_name />_<cms:call 'random_name' count='2' /></cms:if>" />

    <cms:field 'admin_html' no_wrapper='1' order='-1'>
        <h1 id="type-text-">type = 'text'</h1>
        <p>Editable region of <em>text</em> type is used to allow users to input text when only one line of text is required.<br>
                For this type, Couch creates a single line textbox for data input.</p>
        <hr/>
    </cms:field>

</cms:config_form_view>
```
