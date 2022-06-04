```html
<cms:config_list_view exclude="default-page-for-<cms:show k_template_name_safe />" searchable="0" ><cms:ignore>

    // Users have a custom column: 'Email' and 'Active since'

    </cms:ignore>
    <cms:field 'k_selector_checkbox' />
    <cms:field 'k_page_title' />
    <!-- Custom columns -->
    <cms:field 'email' header='Email'><cms:show extended_user_email /></cms:field>
    <cms:field 'k_page_date' header='Active since' >
        <cms:if "<cms:not k_page_date eq '0000-00-00 00:00:00' />" >
            <cms:date k_page_date format='Y M j h.i a' />
        <cms:else />
            <span id="page-unpublished" class="label label-error" style="">Unpublished</span>
        </cms:if>
    </cms:field>
    <!-- /custom columns -->
    <cms:field 'k_actions' />
</cms:config_list_view>
```
