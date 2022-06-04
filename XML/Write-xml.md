```html
<cms:capture into='xmlcontent' >
    <cms:concat '<' '?xml version="1.0" encoding="' k_site_charset '"?' '>'/>

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
</cms:capture>
<cms:write 'sitemaps.xml' truncate='1'><cms:trimo_html><cms:show xmlcontent /></cms:trimo_html></cms:write>
```
