# Capture

### To JSON

```html
<cms:capture into='climate' is_json='1'>
{
   "Russia" : {
      "Moscow" : "cold",
      "Sochi"   : "warm"
   }
}
</cms:capture >

Climate in Moscow: <cms:show climate.Russia.Moscow /><br>
Climate in Sochi: <cms:show climate.Russia.Sochi />
```
