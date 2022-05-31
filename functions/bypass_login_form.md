# bypass_login_form

Autologin with username and password.
```html
<cms:set page_loaded_noncached = "<cms:gpc 'nc' />" />
<cms:set page_loaded_for_debug = "<cms:gpc 'debug' />" />

<cms:if page_loaded_noncached || page_loaded_for_debug><cms:ignore>
  /* Page requested in pristine condition, do not use tweaks */
  </cms:ignore>
  <cms:else />
    <cms:test
      ignore=''
      >
      <cms:if "<cms:func_exists 'bypass_login_form' />">
        <cms:call 'bypass_login_form' user='admin' password='admin' redirect='@current' memo='Can autologin me'/>
      </cms:if>
      <cms:if "<cms:func_exists 'php_log_clear' />">
        <cms:call 'php_log_clear' memo='Clears PHP Error log'/>
      </cms:if>
    </cms:test>
</cms:if>
```
