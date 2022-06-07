# task-file-runner

From Routines

```html
<cms:ignore>Listing from tutorial</cms:ignore>

<cms:embed 'myfuncs.inc' />

<cms:call 'php-time-limit' '0' />
<cms:call 'limit-decline' '2' 'Wait..' />

<cms:if "<cms:is_ajax />">

    <cms:func 'set-snippet-path' name=''>
        _sitemaps/<cms:show name />.inc
    </cms:func>

    <cms:call 'task-file-runner' path_func='set-snippet-path' />

</cms:if>
```
