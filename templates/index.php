<?php require_once( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR/*."".*/.'couch/cms.php' ); ?>
<cms:template title="Index"
    clonable='1'
    dynamic_folders='1'
    nested_pages='0'
    gallery='0'
    routable='0'
    order='0010'
    >
    <cms:smart_embed 'template_editables' />
    <cms:smart_embed 'template_routes' />
</cms:template><cms:ignore>
/*
*   Index..
*/
</cms:ignore>
<cms:set
  my_debug='0'
  />
<cms:smart_embed debug=my_debug 'html_afore' />
<!DOCTYPE html>
<html lang="<cms:show k_lang />">
    <cms:smart_embed debug=my_debug 'html_headers' />
<body>
    <cms:smart_embed debug=my_debug 'html_hero' />
    <cms:smart_embed debug=my_debug 'html_master' />
    <cms:smart_embed debug=my_debug 'html_trail' />
</body>
</html>
<?php COUCH::invoke(); ?>
<?php //COUCH::invoke( K_IGNORE_CONTEXT ); ?>
