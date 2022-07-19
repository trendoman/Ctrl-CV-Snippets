# filesize

```php
<?
$ch = curl_init();
curl_setopt($ch, CURLOPT_TIMEOUT, 1);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FILE, $path);
curl_setopt($ch, CURLOPT_URL, "file://" . rawurlencode($path));
curl_exec($ch);
$filesize = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
var_dump($filesize);
curl_close($ch);
```

Not that fast as advertised.
