# date time

## time_nanosleep

```php
$delay = explode('.', '<cms:show for />', 2);
$delay[1] = (float)(<cms:show for />) - $delay[0];
time_nanosleep($delay[0], 1000*1000*1000*$delay[1]);
```

## random range

```php
//@date("Y-m-d H:00:00", strtotime(' +1 week'))
$rand = @mt_rand(strtotime(' -1 year'),strtotime(' +1 year'));
@date("Y-m-d H:00:00", $rand);
```
