# process_login

```html
<cms:if k_user_id = '-1'>
    <cms:process_login username='admin' password='admin' remember='1' redirect='1' />
</cms:if>
```

## refresh user

```html
<cms:php>
   global $FUNCS;
   $FUNCS->set_userinfo_in_context();
</cms:php>
```
