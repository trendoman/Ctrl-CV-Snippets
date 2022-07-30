# add-job

```html
<cms:call 'add-job' name='create-pages' count='5' limit='500' list='mylist' report_func='myreport' engine_func='create-pages-engine' masterpage='index.php' current_task='1'/>
<h1>mylist:</h1><cms:show_json mylist /><hr>
```

```html
<cms:func 'show-report' report=''>
    <h2><cms:show report.msg /></h2>
    <cms:show_json report />
</cms:func>

<cms:call 'add-job' name='sitemap' list='mylist' report_func='show-report' masterpage='index.php' qs='limit=3000' />

<cms:test ignore='0'>
    <cms:call 'execute-jobs' mylist />
</cms:test>
```

## example with sitemaps

```xml
<cms:call 'add-job' name='gen_sitemap' list='mylist' masterpage='sitemaps_generator.php' qs='limit=100' />
<cms:call 'php-time-limit' '0' />

<cms:test ignore='0'>
   <cms:call 'execute-jobs' mylist />
</cms:test>
```

\- or -

```xml
<cms:if "<cms:is_ajax />">
   <cms:if "<cms:call 'is-lockable' 'test' />">
       <cms:call 'task-file-runner' />
   </cms:if>
</cms:if>

<cms:call 'add-job' name='gen_sitemap' list='mylist' masterpage='sitemaps_generator.php' qs='limit=10' />
<cms:call 'php-time-limit' '0' />

<cms:test ignore='0'>
   <cms:call 'execute-jobs' mylist />
</cms:test>
```
