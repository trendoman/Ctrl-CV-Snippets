# iframe

```php
$tmp = <<<HTML
        <br>
        <iframe
            frameborder="0"
            scrolling="no"
            onload="this.height=this.contentWindow.document.body.scrollHeight+30;this.width=this.contentWindow.document.body.scrollWidth+30;"
            srcdoc="\n<head><style>$css</style></head>\n<body>$body</body>"></iframe>
        <br>
HTML;
```
