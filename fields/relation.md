# relation, reverse_relation


## reverse_relation

View/Add (1)

https://www.couchcms.com/forum/viewtopic.php?f=8&t=8559&p=16293#p16293

```html
<!-- in gallery.php -->

<cms:editable
    type='relation'
    name='photo_product'
    masterpage='products.php'
    has='one'
    no_gui='1'
    label='-'
/>

<!-- in products.php -->
<cms:editable
    type='reverse_relation'
    name='product_photos'
    masterpage='gallery.php'
    field='photo_product'
    anchor_text='View images'
    label='Gallery'
/>
```

### show

```html
<h3>Gallery:</h3>
<cms:reverse_related_pages 'photo_product' masterpage='gallery.php' >
    <!-- All variables of 'gallery.php' are available here -->
    <a href="<cms:show gg_image />"><img src="<cms:show gg_thumb />" /></a>
</cms:reverse_related_pages>
```
