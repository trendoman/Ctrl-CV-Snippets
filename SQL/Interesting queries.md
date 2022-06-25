# Queries

From [article](https://www.xarg.org/2011/10/optimized-pagination-using-mysql/)

Another estimation approach for the number of rows of a table is using the information_schema. I abuse this meta information schema for optimizations very heavily in the last time, as you'll see in further articles. So, if a table doesn't get deletes, we could use the auto_increment value as the number of rows and are done:

```sql
SELECT auto_increment
FROM information_schema.tables
WHERE table_schema=DATABASE()
AND table_name='couch_pages';
```

```sql
SHOW INDEX FROM couch_pages;
```

* https://www.xarg.org/2016/07/store-a-tag-cloud-in-mysql/
