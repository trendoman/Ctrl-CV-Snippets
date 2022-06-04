# func

## anonymous
```html
<cms:func _into='exec' access_level='' sql='' >
</cms:func>
<cms:if "<cms:validate access_level validator='non_negative_integer' />">
    <cms:call exec access_level sql />
</cms:if>
```
