<?php require_once("couch/cms.php"); ?>
<cms:template title='Pages' order='-1' clonable='1' nested_pages='1'>

    <cms:pagebuilder name='main_pb' label='PageBuilder' skip_custom_fields='1' order='-1'>
        <cms:section label='Covers' name='section_covers'  masterpage='blocks/covers.php' mosaic='blocks' />
        <cms:section label='About'  name='section_about'   masterpage='blocks/about.php'  mosaic='blocks' />
    </cms:pagebuilder>

</cms:template>

<cms:capture into='pb_tile_content' >
    <cms:show_pagebuilder 'main_pb'>
        <cms:show k_content />
    </cms:show_pagebuilder>
</cms:capture>
<cms:render 'pb_wrapper' 'page' />

<?php COUCH::invoke(); ?>
