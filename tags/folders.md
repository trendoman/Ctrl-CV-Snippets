# folders

### All params
```html
<cms:folders masterpage=''
    root=''
    childof=''
    hierarchical='0'
    depth='0'
    orderby=''
    order=''
    exclude=''
    show_count='0'
    extended_info='0'
    paginate=0
    limit=''
    offset='0'
    startcount=''
    qs_param=''
    base_link=''
    >
    <cms:dump />
</cms:folders>
```
* orderby &mdash;
    - name
    - title
    - id
    - count
* qs_param &mdash; custom var in querystring that denotes paginated page
* base_link &mdash; replaces the default `$PAGE->link` used for paginator crumb links
