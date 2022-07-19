# Submit to iframe

```xml
<cms:form method='post' name='_' anchor='0'>
   <script>
      window.k_form = document.forms['<cms:show k_cur_form/>'];
   </script>
   <cms:if k_success>
      <cms:abort>
         <script>
            const newElement = window.parent.document.createElement("p");
            newElement.innerHTML += `<h2>Submitted <cms:date format='H:i:s'/></h2>`;
            newElement.innerHTML += `
            <cms:dump />
            `;
            window.parent.window.k_form.insertAdjacentElement('afterend', newElement);
         </script>
      </cms:abort>
   </cms:if>
    <cms:input type='submit' name='submit' value='Submit' />
</cms:form>

<script>
   const iframe = document.createElement("iframe");
   iframe.name = "baseFrame_<cms:random_name />";
   iframe.setAttribute("style", "width:100%; height:600px; display:none;");
   window.k_form.target = iframe.name;
   document.body.append(iframe);
</script>
```

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
