# repeatable


```html
<cms:repeatable name='my_multiple_images' >
    <cms:editable type='image' name='my_image' label='Photo' />
</cms:repeatable>
```

```html
<cms:repeatable name='offices' label='Offices'>
    <cms:editable name='office_name' label="Name" type='text' />
    <cms:editable name='office_address' label="Address" type='textarea' />
</cms:repeatable>
```

#### unsupported types
* thumbnail
* hidden
* group
* mosaic
* repeatable
