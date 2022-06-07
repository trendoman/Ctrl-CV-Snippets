# DOMXPath, DOMDocument

Basic parsing

```html
<cms:capture into='html' trim='1'>
    <cms:call 'remote_url' url='http://www.apsny.ge' />
</cms:capture>

<cms:if html eq ''><cms:abort >Could not fetch the source.</cms:abort><cms:else /><cms:write file='web-content.html' truncate='1'><cms:show html /></cms:write></cms:if>

<cms:php>
    global $CTX;

    $html = $CTX->get('html');

    $doc = new DOMDocument();
    @$doc->loadHTML($html);
    echo "<br>" . $doc->documentURI;

    $xpath = new DOMXPath($doc);
    $articles = $xpath->query('(//div[@class="news"])[1]/a');

    /*
    $articles = $xpath->query('//div[@class="item"]');
    */

    foreach ($articles as $article) {
        echo $doc->saveHtml($article), PHP_EOL, '<hr>';
    }
</cms:php>

<cms:unset html />
```
