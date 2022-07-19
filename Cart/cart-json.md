# Cart-json

[Implementation by Cheesypoof:](https://github.com/cheesypoof/CouchCMS-Cart-JSON-Template)

```php
<?php require_once('couch/cms.php'); ?>

<cms:no_cache/>

<cms:content_type 'application/json'/>

<cms:template hidden='1' title='Cart JSON'/>

{
    "items":                <cms:pp_count_items/>,
    "unique_items":         <cms:pp_count_unique_items/>,
    "shippable_items":      <cms:pp_count_shippable_items/>,
    "sub_total":            <cms:pp_sub_total/>,
    "discount":             <cms:pp_discount/>,
    "sub_total_discounted": <cms:pp_sub_total_discounted/>,
    "taxes":                <cms:pp_taxes/>,
    "shipping":             <cms:pp_shipping/>,
    "total":                <cms:pp_total/>,

    <cms:if "<cms:get_session 'coupon_found'/>">
        "coupon_code":          "<cms:addslashes><cms:get_session 'coupon_code'/></cms:addslashes>",
        "coupon_discount":      <cms:get_session 'coupon_discount'/>,
        "coupon_free_shipping": <cms:if "<cms:get_session 'coupon_free_shipping'/>">true<cms:else/>false</cms:if>,
    </cms:if>

    "cart_items": [
        <cms:pp_cart_items>
            <cms:incr item_count/>
            {
                <cms:hide><!-- Add editable regions --></cms:hide>
                <cms:pages id=id limit='1' masterpage="<cms:pp_config 'tpl_products'/>">
                    "description": "<cms:addslashes><cms:show product_desc/></cms:addslashes>",
                    "image":       "<cms:show product_image/>",
                    "thumbnail":   "<cms:show pp_product_thumb/>",
                </cms:pages>

                "id":                <cms:show id/>,
                "quantity":          <cms:show quantity/>,
                "price":             <cms:show price/>,
                "line_total":        <cms:show line_total/>,
                "requires_shipping": <cms:if requires_shipping>true<cms:else/>false</cms:if>,
                "name":              "<cms:show name/>",
                "title":             "<cms:addslashes><cms:show title/></cms:addslashes>",
                "link":              "<cms:show link/>",
                "remove_item_link":  "<cms:pp_remove_item_link/>",
                "line_id":           "<cms:show line_id/>",

                <cms:if line_discount>
                    "line_discount": <cms:show line_discount/>,
                    "orig_price":    <cms:show orig_price/>,
                </cms:if>

                "options": [
                    <cms:set opt_count = '0'/>
                    <cms:pp_selected_options><cms:incr opt_count/></cms:pp_selected_options>

                    <cms:if opt_count>
                        <cms:pp_selected_options startcount='1'>
                            {
                                "name":  "<cms:addslashes><cms:show option_name/></cms:addslashes>",
                                "value": "<cms:addslashes><cms:show option_value/></cms:addslashes>"
                            }
                            <cms:if opt_count != k_count>,</cms:if>
                        </cms:pp_selected_options>
                    </cms:if>
                ]
            }
            <cms:if item_count != "<cms:pp_count_unique_items/>">,</cms:if>
        </cms:pp_cart_items>
    ]
}

<?php COUCH::invoke(); ?>
```

Example JavaScript (with jQuery)

```js
var cart;

function formatNumber( n, money ) {
    var parts = ( money ? n.toFixed( 2 ) : n.toString() ).split( "." );
    return parts[ 0 ].replace( /\B(?=(\d{3})+(?!\d))/g, "," ) + ( parts[ 1 ] ? "." + parts[ 1 ] : "" );
}

function update_cart( callback ) {
    $.ajax({
        dataType: "json",
        url:      "http://mysite.com/json.php" // URL of the above template
    }).done(function( data ) {
        cart = data;

        callback();
    }).fail(function( request ) {
        alert( request.status + ": " + request.statusText );
    });
}

function update_cart_callback() {
    $( "#items" ).text( formatNumber( cart.items ) );
    $( "#total" ).text( formatNumber( cart.total, true ) );

    $( "#cart_items" ).html(function() {
        var html = '';

        for ( var i = 0; i < cart.cart_items.length; i++ ) {
            var item = cart.cart_items[ i ];

            html += '<li>';

            html += '<a href="' + item.link + '"><img alt="" src="' + item.thumbnail + '"></a>';

            html += '<br><a href="' + item.link + '">' + item.title + '</a>';

            for ( var j = 0; j < item.options.length; j++ ) {
                var option = item.options[ j ];

                html += '<br>' + option.name + ': ' + option.value;
            }

            html += '<br>$' + formatNumber( item.price, true ) + ' &times; ' + formatNumber( item.quantity ) + ' &rarr; $' + formatNumber( item.line_total, true );

            html += '</li>';
        }

        return html;
    });
}

$(function() {
    $( "#update_cart" ).on( "click", function() {
        update_cart( update_cart_callback );
    });
});
```

Updated part

```js
$.ajax({
    type: "post",
    url: $( this ).attr( "action" ),
    data: $( this ).serialize()
}).done(function() {
    update_cart( update_cart_callback );
}).fail(function( request ) {
    alert( request.status + ": " + request.statusText );
});
```
