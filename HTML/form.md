# form

```html
<form style='padding:1.25rem'><label for='help'><strong>Tag:</strong></label>&nbsp;(<small>Just a name of the tag, without cms:</small>)<br/><input type='text' name='help'>&nbsp;<button type='submit'>Find</button></form>
```

### Login form

```html
<cms:form method='post' anchor='0' action="<cms:show k_user_login_template />?redirect=<cms:show k_page_link />">

    <cms:if failed_login >
    <div class="error">
        <font color='red'>
            <cms:show failed_login />
        </font>
    </div>
    </cms:if>

    <cms:if k_error || k_login_error >
    <div class="error">
        <font color='red'>
            <cms:dump />
        </font>
    </div>
    </cms:if>

    <cms:ignore>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
            <a href="javascript:void();" class="bt_facebook disabled">
                <i class="icon-facebook"></i>Facebook </a>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <a href="javascript:void();" class="bt_google disabled">
                <i class="icon-google"></i>Google </a>
        </div>
    </div> <!-- end row -->

    <div class="login-or"><hr class="hr-or"><span class="span-or">or</span></div>
    </cms:ignore>

    <div class="form-group">
        <label>Email | login <sup>*</sup></label>
        <cms:if k_error_k_user_name ><div class="error text-danger" ><cms:show k_error_k_user_name /></div></cms:if>
        <cms:input type='text' name='k_user_name' class="form-control" placeholder="Email" required='1' />
    </div>
    <div class="form-group">
        <label>Password</label>
        <cms:if k_error_k_user_pwd ><div class="error text-danger" ><cms:show k_error_k_user_pwd /></div></cms:if>
        <cms:input type='password' name='k_user_pwd' class="form-control" placeholder="Password" required='1' />
    </div>

    <p class="small">
        <a href="<cms:link k_user_lost_password_template />">Forgot Password?</a>
    </p>
    <button name="submit" class="btn_full">Sign in</button>
    <a href="<cms:link k_user_registration_template />" class="btn_full_outline">Register</a>

    <cms:input type='hidden' name='k_user_remember' value='1' class="form-control" />
</cms:form>

```
