<cms:ignore>Hide editable fields in admin-panel. Usage: <cms:call 'embed' 'CSS/k_element.display-none.inc' field='message, title'/></cms:ignore>
 <cms:each k_named_args.field sep=','>
     #k_element_<cms:show item /> {display:none;}
 </cms:each>
