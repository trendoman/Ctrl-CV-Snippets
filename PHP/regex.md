# regex

```txt
(?!) - negative lookahead
(?=) - positive lookahead
(?<=) - positive lookbehind
(?<!) - negative lookbehind

(?>) - atomic group

bar(?=bar)     finds the 1st bar ("bar" which has "bar" after it)
bar(?!bar)     finds the 2nd bar ("bar" which does not have "bar" after it)
(?<=foo)bar    finds the 1st bar ("bar" which has "foo" before it)
(?<!foo)bar    finds the 2nd bar ("bar" which does not have "foo" before it)
```

## Split csv

```php
$tags = '  ,p, br, br  , <html> ,,,';
$arr_tags = preg_split('/[^\S]*,[^\S]*/', $tags, -1, PREG_SPLIT_NO_EMPTY);
print_r($arr_tags);
```
