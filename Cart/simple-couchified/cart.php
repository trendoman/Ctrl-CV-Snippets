<?php require_once 'couch/cms.php'; ?>
<cms:no_cache />
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Shopping Cart - CouchCart</title>
	<link href="css/styles.css?v=8" rel="stylesheet" media="screen,projection" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,700" rel="stylesheet" media="screen,projection" type="text/css">
	<!--[if lt IE 9]>
		<script src="js/ie9.js" type="text/javascript"></script>
	<![endif]-->
</head>
<body>
	<div class="page-wrap">
		<header>
			<div class="header">
				<a href="<cms:link "<cms:pp_config 'tpl_products' />" />" class="logo">Couch<span class="color">Cart</span></a>
			</div>
			<nav>
				<ul>
					<li class="nav-button">
						<a href="<cms:link "<cms:pp_config 'tpl_products' />" />" class="nav">Products</a>
					</li>
                    <li class="nav-button">
						<a href="<cms:pp_cart_link />" class="nav">Cart</a>
					</li>
					<li class="nav-button">
						<a href="<cms:pp_cart_link />" class="nav cart"><span class="quantity"><cms:pp_count_items /></span> item(s) - $<span class="price"><cms:number_format "<cms:pp_total />" /></span></a>
					</li>
				</ul>
			</nav>
		</header>
		<section>
            <cms:if "<cms:get_flash 'cart_flash_msg' />" >
                <div class="message">
                    <cms:get_flash 'cart_flash_msg' />
                </div>
            </cms:if>
            
            <cms:if "<cms:pp_count_items />" >
			<div class="row">
				<div class="twelve columns">
					<cms:pp_cart_form>
						<table>
							<thead>
								<tr>
									<th class="col-remove">&nbsp;</th>
									<th class="col-desc">Item</th>
									<th class="col-quantity">Qty</th>
									<th class="col-price">Price</th>
									<th class="col-subtotal">Total</th>
								</tr>
							</thead>
							<tbody>
                                <cms:pp_cart_items>
                                    <tr>
                                        <td class="col-remove"><a href="<cms:pp_remove_item_link />" class="cart-remove" title="Remove">&times;<span class="screen-reader">Remove</span></a></td>
                                        <td class="col-desc">
                                            <a href="<cms:show link />" class="cart-thumb">
                                                <img src="<cms:show product_thumb />" width="70" height="64" alt="<cms:show title />">
                                            </a>
                                            <div class="desc-box">
                                                <a href="<cms:show link />"><cms:show title /></a>
                                                <p><cms:pp_selected_options separator='<br>' /></p>
                                            </div>
                                        </td>
                                        <td class="col-quantity"><input name="qty[<cms:show line_id />]" class="quantity-input" type="number" min="0" step="1" value="<cms:show quantity />" title="Quantity"></td>
                                        <td class="col-price">
                                            <cms:if line_discount><span class="compare-price">$<cms:number_format orig_price /></span></cms:if> 
                                            $<cms:number_format price />
                                        </td>
                                        <td class="col-subtotal">$<cms:number_format line_total /></td>
                                    </tr>
                                </cms:pp_cart_items>
                                
                                <cms:if "<cms:pp_discount />" || "<cms:pp_shipping />" || "<cms:pp_taxes />" >
                                    <tr class="row-extras">
                                        <td class="col-extras-label" colspan="4">Subtotal</td>
                                        <td class="col-extras">$<cms:number_format "<cms:pp_sub_total />" /></td>
                                    </tr>
                                </cms:if>
                
                                <cms:if "<cms:pp_discount />">
                                    <tr class="row-extras">
                                        <td class="col-extras-label" colspan="4">Discount:</td>
                                        <td class="col-extras col-discount"><span class="subtract">-</span>$<cms:number_format "<cms:pp_discount />" /></td>
                                    </tr>
                                </cms:if>
                                
                                <cms:if "<cms:pp_shipping />">
                                    <tr class="row-extras">
                                        <td class="col-extras-label" colspan="4">Shipping:</td>
                                        <td class="col-extras">$<cms:number_format "<cms:pp_shipping />" /></td>
                                    </tr>
                                </cms:if>
                                
                                <cms:if "<cms:pp_taxes />">
                                    <tr class="row-extras">
                                        <td class="col-extras-label" colspan="4">Taxes:</td>
                                        <td class="col-extras">$<cms:number_format "<cms:pp_taxes />" /></td>
                                    </tr>
                                </cms:if>
                                
								<tr class="row-total">
									<td class="col-total-label" colspan="4">Total:</td>
									<td class="col-total">$<cms:number_format "<cms:pp_total />" /></td>
								</tr>
							</tbody>
						</table>
						<div class="cart-operations">
							<div class="checkout-box">
								<input class="button checkout-button" type="submit" name="checkout" value="Checkout">
							</div>
							<div class="update-box">
								<input class="button update-button" type="submit" value="Update Quantities">
							</div>
						</div>
					</cms:pp_cart_form>
				</div>
			</div>
            <cms:else />
                <div class="message">
                    <p class="info">Your cart is empty!</p>
                </div>
            </cms:if>
		</section>
	</div>
	<div class="footer-wrap">
		<div class="footer-bar">
			<p>
				<span class="copyright">Theme by <a href="http://incrementwebservices.com/">Increment Web Services</a></span><span class="powered-by">Powered by <a href="http://www.couchcms.com/">CouchCMS</a></span>
			</p>
		</div>
	</div>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
	<script src="js/input-restriction.js" type="text/javascript"></script>
</body>
</html>
<?php COUCH::invoke(); ?>