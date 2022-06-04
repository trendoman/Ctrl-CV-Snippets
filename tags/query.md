# query
```html
<cms:capture into='mySQL' trim='1'>
    SELECT
            name AS `k_page_name`
        ,   title AS `k_page_title`
        ,   email AS `extended_user_email`
        ,   id AS `extended_user_id`
    FROM
        <cms:php>echo K_TBL_USERS;</cms:php>
    WHERE
        access_level < 7
</cms:capture>
<cms:query sql=mySQL >
    <cms:show k_page_title /> : id(<cms:show extended_user_id />)<br>
</cms:query>
```
