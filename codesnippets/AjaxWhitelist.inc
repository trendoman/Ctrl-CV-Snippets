<?php require_once( "../../../cms/cms.php" );  ?>
<cms:template title='Ajax connector' hidden='1' order='1000' />

<cms:if k_logged_out >
    <!-- this is secured page. login first to access it -->
    <cms:abort msg='ERROR: Please relogin to the system.' />
</cms:if>

<cms:if k_user_access_level = '10' >
    <cms:php>error_log( print_r( $_REQUEST, true) ); </cms:php>
    <cms:php>if( $_FILES ) error_log( print_r( $_FILES, true) ); </cms:php>
</cms:if>

<cms:if "<cms:is_ajax />" >
    /*
    Embeds the requested snippet, from POST ajax request.
    */
    <cms:if "<cms:gpc 'file' />" >
        <cms:set snippet = "<cms:gpc 'file' />" />
    </cms:if>

    <cms:if "<cms:gpc 'filename' />" >
        <cms:set snippet = "<cms:gpc 'filename' />" />
    </cms:if>

    <cms:if "<cms:gpc 'snippet' />" >
        <cms:set snippet = "<cms:gpc 'snippet' />" />
    </cms:if>

    <cms:capture into='whitelist' >
          ajax-files/quick-note-to-team.html
        | hr-files/hr-documents/ajax/document-add.html
        | hr-files/hr-documents/ajax/document-edit.html
        | hr-files/hr-documents/ajax/document-delete.html
        | hr-files/hr-documents/ajax/document-update.html
    </cms:capture>

    <cms:each whitelist >
        <cms:if item == snippet >
            <cms:set valid_snippet='1' scope='global' />
        </cms:if>
    </cms:each>

    <cms:capture into="ajax_output" >
        <cms:if valid_snippet >
            <cms:embed snippet />
        <cms:else />ERROR: File not found: '<cms:show snippet />'
        </cms:if>
    </cms:capture>
    <cms:ignore>
        <cms:log ajax_output />
    </cms:ignore>
    <cms:abort msg=ajax_output is_404='0' />

<cms:else />
    <cms:log '<h3/>Access denied<h3/>' />
    <cms:abort msg="ERROR: Page can't be accessed directly." />
</cms:if>
<?php COUCH::invoke(); ?>
