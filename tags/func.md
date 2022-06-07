# func

## anonymous
```html
<cms:func _into='exec' access_level='' sql='' >
</cms:func>
<cms:if "<cms:validate access_level validator='non_negative_integer' />">
    <cms:call exec access_level sql />
</cms:if>
```
```html
<cms:func _into='show-report' _scope='global' report=''>
    <h2><cms:show report.msg /></h2>
    <cms:show_json report />
</cms:func>
```
## callback
```html
<cms:func 'purchase' product='' amount='' reason=''>
    <p>
        I have purchased a <cms:show product /> for <cms:show amount />.<br>
        I want to <cms:call reason />
    </p>
</cms:func>
<cms:func _into='travel'>see the world.</cms:func>
<cms:func _into='donate'>donate it to charity.</cms:func>
<cms:func 'gift'>send it as a present.</cms:func>
<cms:call 'purchase' 'phone' '$200' 'gift' />
<cms:call 'purchase' 'toy' '$100' donate />
<cms:call 'purchase' 'tour' '$500' travel />
```

