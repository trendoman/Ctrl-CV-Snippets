<cms:ignore>
<!-- ВАЖНО!
    Този снипет се изпълнява от шаблон content_form_sitemaps_generator-php.html, както и от cron.php.
    - content_form_sitemaps_generator-php.html се изпълнява при натискане на бутон "Запис" в шаблон sitemaps_generator.php, както и при изпълнение на публичната му част.
    - cron.php се изпълнява единствено от крон задачи, всяка от които с предварително зададен ключ (?key=XXXX) и в определено време.
-->
</cms:ignore>

<cms:ignore><!-- Начало на измерване времето за изпълнение на Крон задачата --></cms:ignore>
<cms:set start="<cms:php>echo $time_start = microtime(true);</cms:php>" />

<cms:ignore><!-- Sitemap index - съдържа всички карти на сайта. Регистрира се в конзолата на Гугъл, който на тази база започва да ползва отделните карти на сайта --></cms:ignore>
<cms:write 'sitemaps.xml' truncate='1'><cms:trimo_html><cms:content_type 'text/xml'/><cms:concat '<' '?xml version="1.0" encoding="' k_site_charset '"?' '>'/>
    <urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">

        <cms:ignore><!-- Sitemap 1 - общи, категории, автори на статии, категории в блог и категории в магазин --></cms:ignore>
        <sitemap><loc><cms:show k_site_link/>sitemap-common.xml</loc></sitemap>

        <cms:ignore><!-- Sitemap 2 - статии в Блог --></cms:ignore>
        <sitemap><loc><cms:show k_site_link/>sitemap-articles.xml</loc></sitemap>

        <cms:ignore><!-- Sitemap 3 - прдукти в Магазин --></cms:ignore>
        <sitemap><loc><cms:show k_site_link/>sitemap-products.xml</loc></sitemap>

        <cms:ignore><!-- Sitemap 4 - изображения - статии в Блог --></cms:ignore>
        <sitemap><loc><cms:show k_site_link/>sitemap-articles-images.xml</loc></sitemap>

        <cms:ignore><!-- Sitemap 5 - изображения - продукти в Магазин --></cms:ignore>
        <sitemap><loc><cms:show k_site_link/>sitemap-products-images.xml</loc></sitemap>

        <cms:ignore><!-- Sitemap 6 - youtube videos - видеа в статии и продукти --></cms:ignore>
        <sitemap><loc><cms:show k_site_link/>sitemap-videos.xml</loc></sitemap>

    </urlset>
</cms:trimo_html>
</cms:write>

<cms:ignore><!-- Sitemap 1 - общи, категории, автори на статии, категории в блог и категории в магазин, категории и страници от секция "Други" --></cms:ignore>
<cms:write 'sitemap-common.xml' truncate='1'><cms:trimo_html><cms:content_type 'text/xml'/><cms:concat '<' '?xml version="1.0" encoding="' k_site_charset '"?' '>'/>
    <urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">

    <cms:ignore><!-- Общи --></cms:ignore>
    <url><loc><cms:show k_site_link/></loc></url>

    <cms:ignore><!-- Автори на статии --></cms:ignore>
    <cms:pages masterpage='authors.php' page_name='NOT default-page-for-authors-php-please-change-this-title' skip_custom_fields='1' order='asc'>
        <url><loc><cms:show k_page_link/></loc></url>
    </cms:pages>

    <cms:ignore><!-- Категории в Блог --></cms:ignore>
    <cms:folders masterpage='index.php' root='blog' include_custom_fields='1'>
        <cms:if "<cms:not redirect_on/>" && "<cms:not canonical_on/>" && "<cms:not noindex_on/>"><url><loc><cms:show k_site_link/><cms:show k_folder_name/>/</loc></url></cms:if>
    </cms:folders>

    <cms:ignore><!-- Категории в Магазин --></cms:ignore>
    <cms:folders masterpage='index.php' root='shop' include_custom_fields='1'>
        <cms:if "<cms:not redirect_on/>" && "<cms:not canonical_on/>" && "<cms:not noindex_on/>" ><url><loc><cms:show k_site_link/><cms:show k_folder_name/>/</loc></url></cms:if>
    </cms:folders>

    <cms:ignore><!-- Категории в "Други" --></cms:ignore>
    <cms:folders masterpage='index.php' childof="<cms:php>echo K_SECTION_4_NAME;</cms:php>" include_custom_fields='1'>
        <cms:if "<cms:not redirect_on/>" && "<cms:not canonical_on/>" && "<cms:not noindex_on/>" && k_folder_name !='other'>
            <url><loc><cms:show k_site_link/><cms:show k_folder_name/>/</loc></url>
        </cms:if>
    </cms:folders>

    <cms:ignore><!-- Страници в "Други" --></cms:ignore>
    <cms:pages masterpage='index.php' folder="<cms:php>echo K_SECTION_4_NAME;</cms:php>" page_name='NOT default-page-for-index-php-please-change-this-title' custom_field='redirect_on!=1 | canonical_on!=1 | noindex_on!=1' limit='10000' order='asc'>
        <url><loc><cms:show k_site_link/><cms:show k_page_name/>.html</loc></url>
    </cms:pages>

    </urlset>
</cms:trimo_html>
</cms:write>

<cms:ignore><!-- Sitemap 2 - статии в Блог --></cms:ignore>
<cms:write 'sitemap-articles.xml' truncate='1'><cms:trimo_html><cms:content_type 'text/xml' /><cms:concat '<' '?xml version="1.0" encoding="' k_site_charset '"?' '>' />
    <urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">

    <cms:pages masterpage='index.php' folder='blog' page_name='NOT default-page-for-index-php-please-change-this-title' custom_field='redirect_on!=1 | canonical_on!=1 | noindex_on!=1' limit='10000' order='asc'>
        <url><loc><cms:show k_site_link/><cms:show k_page_name/>.html</loc></url>
    </cms:pages>

    </urlset>
</cms:trimo_html>
</cms:write>

<cms:ignore><!-- Sitemap 3 - прдукти в Магазин --></cms:ignore>
<cms:write 'sitemap-products.xml' truncate='1'><cms:trimo_html><cms:content_type 'text/xml' /><cms:concat '<' '?xml version="1.0" encoding="' k_site_charset '"?' '>' />
    <urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">

    <cms:pages masterpage='index.php' folder='shop' page_name='NOT default-page-for-index-php-please-change-this-title' custom_field='redirect_on!=1 | canonical_on!=1 | noindex_on!=1' limit='10000' order='asc'>
        <url><loc><cms:show k_site_link/><cms:show k_page_name/>.html</loc></url>
    </cms:pages>

    </urlset>
</cms:trimo_html>
</cms:write>

<cms:ignore><!-- Sitemap 4 изображения - статии в Блог --></cms:ignore>
<cms:write 'sitemap-articles-images.xml' truncate='1'><cms:trimo_html><cms:content_type 'text/xml' /><cms:concat '<' '?xml version="1.0" encoding="' k_site_charset '"?' '>' />
    <urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="https://www.google.com/schemas/sitemap-image/1.1">

    <cms:pages masterpage='index.php' folder='blog' page_name='NOT default-page-for-index-php-please-change-this-title' custom_field='redirect_on!=1 | canonical_on!=1 | noindex_on!=1' limit='10000' order='asc'>
        <url>
            <loc><cms:show k_site_link/><cms:show k_page_name/>.html</loc>
            <image:image>
                <image:loc><cms:show blog_i_page_d/></image:loc>
                <image:title><cms:show k_page_title/></image:title>
            </image:image>

            <cms:show_repeatable 'blog_base_desc_el'>
                <cms:if base_desc_tp='2'>
                    <image:image>
                        <image:loc><cms:show base_desc_tp_2_i_l/></image:loc>
                        <image:title><cms:show k_page_title/> - изображение в описание <cms:show k_count/></image:title>
                    </image:image>
                </cms:if>
                <cms:if base_desc_tp='3'>
                    <image:image>
                        <image:loc><cms:show base_desc_tp_3_i_r/></image:loc>
                        <image:title><cms:show k_page_title/> - изображение в описание <cms:show k_count/></image:title>
                    </image:image>
                </cms:if>
            </cms:show_repeatable>
        </url>
    </cms:pages>

    </urlset>
</cms:trimo_html>
</cms:write>

<cms:ignore><!-- Sitemap 5 изображения - продукти в Магазин --></cms:ignore>
<cms:write 'sitemap-products-images.xml' truncate='1'><cms:trimo_html><cms:content_type 'text/xml' /><cms:concat '<' '?xml version="1.0" encoding="' k_site_charset '"?' '>' />
    <urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="https://www.google.com/schemas/sitemap-image/1.1">

    <cms:pages masterpage='index.php' folder='shop' page_name='NOT default-page-for-index-php-please-change-this-title' custom_field='redirect_on!=1 | canonical_on!=1 | noindex_on!=1' limit='10000' order='asc'>
        <url>
            <loc><cms:show k_site_link/><cms:show k_page_name/>.html</loc>
            <cms:show_repeatable 'product_images_elements'>
            <image:image>
                <image:loc><cms:show image/></image:loc>
                <image:title><cms:if alt_and_title><cms:show alt_and_title/><cms:else/><cms:show k_page_title/><cms:if k_count gt '1'> — Изображение <cms:show k_count/></cms:if></cms:if></image:title>
            </image:image>
            </cms:show_repeatable>

            <cms:if shop_base_desc_on>
                <cms:show_repeatable 'shop_base_desc_el'>
                    <cms:if shop_base_desc_tp='2'>
                        <image:image>
                            <image:loc><cms:show shop_base_desc_tp_2_i_l/></image:loc>
                            <image:title><cms:show k_page_title/> - изображение в описание <cms:show k_count/></image:title>
                        </image:image>
                    </cms:if>
                    <cms:if shop_base_desc_tp='3'>
                        <image:image>
                            <image:loc><cms:show shop_base_desc_tp_3_i_r/></image:loc>
                            <image:title><cms:show k_page_title/> - изображение в описание <cms:show k_count/></image:title>
                        </image:image>
                    </cms:if>
                </cms:show_repeatable>
            </cms:if>
        </url>
    </cms:pages>

    </urlset>
</cms:trimo_html>
</cms:write>

<cms:ignore><!-- Sitemap 6 youtube videos - видеа в статии и продукти --></cms:ignore>
<cms:write 'sitemap-videos.xml' truncate='1'><cms:trimo_html><cms:content_type 'text/xml' /><cms:concat '<' '?xml version="1.0" encoding="' k_site_charset '"?' '>' />
    <urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9" xmlns:video="https://www.google.com/schemas/sitemap-video/1.1">

    <cms:pages masterpage='index.php' folder='blog,shop' page_name='NOT default-page-for-index-php-please-change-this-title' custom_field='redirect_on!=1 | canonical_on!=1 | noindex_on!=1 | video_on=1' limit='10000' order='asc'>
        <url>
            <loc><cms:show k_site_link/><cms:show k_page_name/>.html</loc>
            <cms:show_repeatable 'pr_video_elements'>

                <video:video>
                    <video:player_loc allow_embed="yes">https://www.youtube.com/v/<cms:show pr_vid_id/></video:player_loc>
                    <video:thumbnail_loc>https://img.youtube.com/vi/<cms:show pr_vid_id/>/0.jpg</video:thumbnail_loc>
                    <video:title><cms:show pr_vid_tit/></video:title>
                    <video:description><cms:show pr_vid_dsc/></video:description>
                </video:video>

            </cms:show_repeatable>
        </url>
    </cms:pages>

    </urlset>
</cms:trimo_html>
</cms:write>

