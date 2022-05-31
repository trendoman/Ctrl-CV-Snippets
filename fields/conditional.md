# Conditional

```html
<cms:func _into='my_cond' common_parameters='' searchable=''>
    <cms:if "<cms:is 'Searchable' in=common_parameters />" && searchable = '1'>show<cms:else />hide</cms:if>
</cms:func>

<cms:editable
  name='search_type'
  label='Search Type'
  desc=''
  type='radio'
  opt_values = 'Text = text | Integer = integer | Decimal = decimal'
  opt_selected = 'text'
  class='col-md-6'
  not_active=my_cond
  order='20'
  />
```
