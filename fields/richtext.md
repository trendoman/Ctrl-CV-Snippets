# Richtext RTF

```xml
<cms:editable type='richtext'
    name='richtext'
    label='Text'
    desc=''
    toolbar='full'
    searchable='0'
    order=''
    />
```

## custom styles

```xml
<cms:editable
    name='richtext'
    label='Text'
    desc=''
    toolbar='full'
    custom_styles="my_styles=custom_styles.js"
    type='richtext'
/>
```

File `custom_styles.js` –

```js
CKEDITOR.stylesSet.add( 'my_styles',
[

   { name: 'Italic Title',		element: 'h2', styles: { 'font-style': 'italic' } },
   { name: 'Subtitle',			element: 'h3', styles: { 'color': '#aaa', 'font-style': 'italic' } },
   {
      name: 'Special Container',
      element: 'div',
      styles: {
         padding: '5px 10px',
         background: '#eee',
         border: '1px solid #ccc'
      }
   },
   { name: 'Upper Roman', element: 'ul', styles: { 'list-style-type': 'upper-roman' } },
   { name: 'Lower Roman', element: 'ul', styles: { 'list-style-type': 'lower-roman' } },
   { name: 'Upper Alpha', element: 'ul', styles: { 'list-style-type': 'upper-alpha' } },
   { name: 'Lower Alpha', element: 'ul', styles: { 'list-style-type': 'lower-alpha' } },

   { name: 'Marker',			element: 'span', attributes: { 'class': 'marker' } },

   { name: 'Big',				element: 'big' },
   { name: 'Small',			element: 'small' },
   { name: 'Typewriter',		element: 'tt' },

   { name: 'Computer Code',	element: 'code' },
   { name: 'Keyboard Phrase',	element: 'kbd' },
   { name: 'Sample Text',		element: 'samp' },
   { name: 'Variable',			element: 'var' },

   { name: 'Deleted Text',		element: 'del' },
   { name: 'Inserted Text',	element: 'ins' },

   { name: 'Cited Work',		element: 'cite' },
   { name: 'Inline Quotation',	element: 'q' },

   { name: 'Language: RTL',	element: 'span', attributes: { 'dir': 'rtl' } },
   { name: 'Language: LTR',	element: 'span', attributes: { 'dir': 'ltr' } }

]);
```
