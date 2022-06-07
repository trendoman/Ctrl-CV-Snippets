# video

```html
<video autoplay muted id="myVideo">
  <source src=".webm" type="video/mp4">
</video>
```

```html
<script>
    var videoSource = new Array();
    <cms:show_repeatable 'content_video' startcount='0' >
    videoSource[<cms:show k_count />]='<cms:show video />';
    </cms:show_repeatable>

    var videoCount = videoSource.length;
    var i = 1;

    $("#myVideo").attr("src", videoSource[0]);
    $('#myVideo').on('ended', function(e) {

        if (i == (videoCount)) {
            i = 0;
        }
        videoPlay(i);
    });

    function videoPlay(videoNum) {
        i++;
        $("#myVideo").attr("src", videoSource[videoNum]);
    }
</script>
```
