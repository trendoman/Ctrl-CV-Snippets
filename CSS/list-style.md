# list-style: none

```xml
<cms:if hide_bullets>
  <cms:set style='style="list-style: none;" ' />
</cms:if>
```

## `ol` Type

```xml
<cms:repeat count="<cms:add k_named_args.level '1' />">
   <cms:set type="<cms:zebra '1' 'a' 'A' 'i' 'I' />" scope='parent' />
</cms:repeat>

<ol type="<cms:show type />" >
```
