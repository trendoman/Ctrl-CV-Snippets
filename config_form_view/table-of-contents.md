# toc

```xml
<cms:config_form_view>
    <cms:field 'toc' no_wrapper='0' order='-1000' label="&nbsp;">

        <script>
        // handle links with @href started with '#' only
        $(document).on('click', 'a[href^="#"]', function(e) {
            // target element id
            var id = $(this).attr('href');

            // target element
            var $id = $(id);
            if ($id.length === 0) {
                return;
            }

            // prevent standard hash navigation (avoid blinking in IE)
            e.preventDefault();

            // top position relative to the document
            var pos = $id.offset().top;

            // animated top scrolling
            $("html, body, #scroll-content").animate({scrollTop: pos}, 400);
        });
        </script>

       <style>
            /* btn Scroll to Top is always visible */
            .ctrl-bot > #top { position:fixed; right:31px; bottom:31px; top:auto; }

            /* ToC is columnized */
            div#toc ul {column-count: auto; column-width: 30ex; max-width:100%;}
        </style>

        <details open><summary><b>Table of Contents</b></summary>

            <div id="toc">
                <ul>
                <cms:test>
                    <cms:db_fields masterpage=k_template_name>
                       <li><a href="#k_element_<cms:show name />" ><cms:get 'label' default=name /></a></li>
                    </cms:db_fields>
                </cms:test>
                </ul>
            </div>

        </details>

    </cms:field>

</cms:config_form_view>
```
