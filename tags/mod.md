# mod

repeat every 5 minutes

```xml
<cms:set curr_minute="<cms:date format='i'/>" scope='global'/>
<cms:if "<cms:mod curr_minute '5' />"><cms:ignore>/wait</cms:ignore><cms:else /><cms:log ':: ping' /></cms:if>
```
