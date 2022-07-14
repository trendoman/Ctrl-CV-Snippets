<cms:php>
    global $FUNCS, $CTX;
    $html_source = trim( $CTX->get('html_source') );

    $chars_array = $FUNCS->utf2code( $html_source );
    // main business

    $CTX->set('chars_array', $chars_array, 'global');
</cms:php>
<script>
    chars = <cms:show chars_array as_json='1' />;
    html = '';
    for (var i = 0; i < chars.length; i++) html += String.fromCharCode(chars[i]);

    document.getElementById('fillme').innerHTML = html;
    // Append the parsed HTML
</script>
