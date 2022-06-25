# form

## Submit DB-Form

```xml
<cms:set submit_success="<cms:get_flash 'submit_success' />" />
<cms:if submit_success >
    <h4>Saved.</h4>
</cms:if>

<cms:form
    masterpage=k_template_name
    mode='edit'
    enctype='multipart/form-data'
    method='post'
    anchor='0'
    >

    <cms:if k_success >
        <cms:db_persist_form
            _invalidate_cache='0'
        />

        <cms:if k_success >
            <cms:set_flash name='submit_success' value='1' />
            <cms:redirect k_page_link />
        </cms:if>
    </cms:if>

    <cms:if k_error >
        <div class="error">
            <cms:each k_error >
                <br><cms:show item />
            </cms:each>
        </div>
    </cms:if>

    <!--
        bound inputs can be placed here
    -->

    <cms:input type='submit' name='submit' value='Submit' />
</cms:form>

```
