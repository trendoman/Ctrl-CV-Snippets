# mosaic

## editable

```html
<cms:mosaic name='content' label='Content'>
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


<cms:editable name='file' type='file' />
```

### nested repeatable

```html
<cms:mosaic name='content' label='Content'>
    <cms:tile name='item' label='Item'>
        <cms:editable type='text' name='header' label='Header'  />

        <cms:repeatable name='info' label='File Info' >
            <cms:editable type='text' name='file_name' label='File Name'  />
            <cms:editable type='text' name='file_size' label='File Size'  />
        </cms:repeatable>
    </cms:tile>
</cms:mosaic>
```

## show

```html
<cms:show_mosaic 'content'>
    <cms:if k_tile_name='item' >
        <h3><cms:show header /></h3>
        <cms:show_repeatable 'info' >
            <cms:show file_name /> - (<cms:show file_size />)<br>
        </cms:show_repeatable>
    </cms:if>
</cms:show_mosaic>
```
