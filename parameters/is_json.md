# is_json

```html
<cms:capture into='climate' is_json='1' >
{
    "Russia": {
        "Moscow": "cold",
        "Sochi": "warm"
    },
    "India": {
        "Mumbai": "pleasant",
        "Delhi": "moderate"
    }
    "Miami": "great",
    "Utopia": [ "unknown", "uncertain", "finicky" ]
}
</cms:capture>
```

Set a new array or get existing.
```html
<cms:set clock = "<cms:get 'clock' default='[]' scope='global' as_json='1' />" is_json='1' scope='global'/>
```
