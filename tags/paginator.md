# paginator

```html
<cms:if k_paginator_required && k_paginated_bottom>
    <ul class="pagination">
        <cms:paginator adjacents='1'>

            <li class="page-item <cms:if k_crumb_current >active</cms:if> <cms:if k_crumb_disabled >disabled</cms:if>">
                <a class="page-link" href="<cms:show k_crumb_link />"><cms:show k_crumb_text /></a>
            </li>
        </cms:paginator>
    </ul>
</cms:if>
```

## non-uniform paginator

<p><a href="https://www.couchcms.com/forum/viewtopic.php?f=8&t=11426" target="_blank">Forum topic</a></p>

```html
<!-- set only these two numbers -->
<cms:set my_limit_for_first_page = '3' />
<cms:set my_limit_for_all_other_pages = '8' />

<cms:set my_pg="<cms:gpc 'pg' method='get' default='1' />" />
<cms:if my_pg eq '1' >
    <cms:set my_limit=my_limit_for_first_page />
    <cms:set my_offset='0' />
<cms:else />
    <cms:set my_limit=my_limit_for_all_other_pages />
    <cms:set my_adjust="<cms:sub my_limit_for_first_page my_limit_for_all_other_pages />" />
    <cms:set my_offset="<cms:sub my_limit_for_all_other_pages my_limit_for_first_page />" /><!-- = '-5' -->
</cms:if>
```

Paginator:

```html
<cms:pages ..

    ..

    <cms:if k_paginated_bottom >
        <cms:if k_current_page eq '1' >
            <cms:set my_limit="<cms:if my_limit_for_first_page gt my_limit_for_all_other_pages><cms:show my_limit_for_first_page /><cms:else/><cms:show my_limit_for_all_other_pages /></cms:if>" />

            <cms:pages masterpage=k_template_name paginate='1' limit=my_limit skip_custom_fields='1'>
                <cms:paginator /><br>
            </cms:pages>
        <cms:else />
            <cms:paginator /><br>
        </cms:if>
    </cms:if>
</cms:pages>
```
