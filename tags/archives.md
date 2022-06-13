# archives

```html
<cms:archives masterpage="student.php" type="monthly">
    <cms:pages masterpage=k_user_template id=k_user_id limit='1' >
        <cms:reverse_related_pages 'created_by' masterpage="student.php" limit="1" start_on=k_archive_date stop_before=k_next_archive_date>
            <cms:date k_archive_date format="M Y" />
            <cms:show k_total_records />
        </cms:reverse_related_pages>
    </cms:pages>
</cms:archives>
```
