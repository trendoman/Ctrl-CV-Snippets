# MarkitUp Addon

```html
<cms:editable type='message'
  name='custom_markitup'
  order='5'
  >

   <!-- jQuery -->
   <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
   <script type="text/javascript">
      jQuery.noConflict();
   </script>

   <cms:ignore>
    <!-- markItUp! -->
    <!-- markItUp! toolbar settings -->
    <!-- markItUp! skin -->
    <!-- markItUp! toolbar skin -->
   </cms:ignore>
   <script type="text/javascript" src="<cms:show k_site_link />markitup/jquery.markitup.js"></script>
   <script type="text/javascript" src="<cms:show k_site_link />markitup/sets/couch/set.js"></script>
   <link rel="stylesheet" type="text/css" href="<cms:show k_site_link />markitup/skins/markitup/style.css" />
   <link rel="stylesheet" type="text/css" href="<cms:show k_site_link />markitup/sets/couch/style.css" />

   <script type="text/javascript">
      jQuery(document).ready(function()   {
         // Add markItUp! to your textarea in one line for each textarea
         // jQuery('textarea').markItUp( { Settings }, { OptionalExtraSettings } );
         jQuery('#f_desc').markItUp(mySettings);
         jQuery('#f_location').markItUp(mySettings);

      });
   </script>
</cms:editable>
```
