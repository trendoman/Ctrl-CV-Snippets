# embed once

Just for keeps.

```xml
<cms:if "<cms:exists snippet />">
  <cms:set cached = "<cms:get "embed_once_<cms:md5 snippet />" default='0'  />" />
  <cms:if cached ><cms:else />
      <cms:put var="embed_once_<cms:md5 snippet />" value='1' scope='global' />
      <cms:embed snippet />
  </cms:if>
</cms:if>
```
