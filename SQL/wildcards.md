# wildcards

% is a wildcard only if you use it with the operator LIKE

A phrase that is enclosed within double quote (") characters matches only rows that contain the phrase literally, as it was typed.


## date

```sql
SELECT * FROm table1
WHERE DATE_FORMAT(last_date ,'%Y-%m') >= '2022-02'
```

## hyphens

https://stackoverflow.com/a/41925542/7524904

Trick

But finally I prefer a trick so HAVING isn't needed at all:

---

If you add texts to your database table, add them additionally to a separate fulltext indexed column and replace words like up-to-date with up-to-date uptodate.

If a user searches for up-to-date replace it in the query with uptodate.

---

By that you can still find specific in user-specific but up-to-date as well (and not only date).

Bonus

If a user searches for -well-known huge ports MySQL treats that as not include *well*, could include *known* and *huge*. Of course you could solve that with an other extra query variant as well, but with the trick above you remove the hyphen so the search query looks simply like that:

SELECT id
FROM texts
WHERE MATCH(text) AGAINST('-wellknown huge ports' IN BOOLEAN MODE)
