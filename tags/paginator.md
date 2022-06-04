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
