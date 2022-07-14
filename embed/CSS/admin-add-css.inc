<cms:ignore>Hide editable fields in admin-panel. Usage: <cms:call 'embed' 'CSS/admin-add-css.inc' field='message, title'/></cms:ignore>
<cms:admin_add_css>
  <cms:each k_named_args.field sep=','>
      #admin_wrapper_custom_fields #k_element_<cms:show item /> {display:none;}
  </cms:each>
</cms:admin_add_css>
