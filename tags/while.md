# while

```html
<cms:set i='5' />
<cms:while i>

    <p><cms:show i /></p>
    <cms:decr i />

</cms:while>
```
Output &mdash;
```txt
5
4
3
2
1
```
