function runWithJQuery(jQueryCode){
    if(window.jQuery)  jQueryCode();
    else{
        var script = document.createElement('script');
        document.head.appendChild(script);
        script.type = 'text/javascript';
        script.src = "//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js";
        script.onload = jQueryCode;
    }
}
runWithJQuery(function jQueryCode(){ // your jQuery code

    return;

    // replace 'cms:tag' with 'cms:<a href="?help=tag" class="tag">tag</a>'
    var link="<cms:add_querystring k_page_link 'help=' />";
    $('pre').html(function(i,html){
        return html.replace(/cms\:(.+?)\b/g, 'cms:<a href="'+link+'$1" class="tag">$1</a>');
    })
})
