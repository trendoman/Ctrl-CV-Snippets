<cms:if k_server.HTTP_USER_AGENT != 'ApacheBench/2.3' ><cms:ignore>

    // Code created for benchmarks with ApacheBench. Apache always must be anonymous.
    // I am tired to re-login when playing with it. Lets me just become logged in.
    //
    // NOTE:
    // Uses extra variable 'k_server'

    </cms:ignore>
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
</cms:if>
