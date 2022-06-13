# Submit to iframe

```html
<form method='post' target='iframe' action="<cms:add_querystring k_page_link 'iframe_submit=1' />">
    <cms:input type='textarea' width='800' height='200' name="text" /><br/>
    <cms:input type='checkbox' name="line2code" opt_values='Wrap lines with &lt;code&gt;?=1' opt_selected='1' />
    <cms:input type='submit' name='submit' value='Encode'/>
</form>
<iframe style="width:800px; height:200px" name="iframe" ></iframe>
<cms:set iframe_submit = "<cms:gpc 'iframe_submit' />" />
<cms:if  iframe_submit >
    <cms:abort>
        <cms:php>
        </cms:php>
    </cms:abort>
</cms:if>

```
