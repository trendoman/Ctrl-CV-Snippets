<?php require_once 'couch/cms.php'; ?>
<cms:no_cache />
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Checkout - CouchCart</title>
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
            <cms:if "<cms:pp_count_items />" >
            <div class="message">
                <p class="notice">Please review your order before we proceed to PayPal to make the payment. <br>
                If you have a discount coupon, please apply it below.</p>
                <cms:get_flash 'coupon_flash_msg' />
            </div>
			<div class="row">
				<div class="twelve columns">
                    <table>
                        <thead>
                            <tr>
                                <th class="col-desc">Item</th>
                                <th class="col-quantity">Qty</th>
                                <th class="col-price">Price</th>
                                <th class="col-subtotal">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <cms:pp_cart_items>
                                <tr>
                                    <td class="col-desc">
                                        <a href="<cms:show link />" class="cart-thumb">
                                            <img src="<cms:show product_thumb />" width="70" height="64" alt="<cms:show title />">
                                        </a>
                                        <div class="desc-box">
                                            <a href="<cms:show link />"><cms:show title /></a>
                                            <p><cms:pp_selected_options separator='<br>' /></p>
                                        </div>
                                    </td>
                                    <td class="col-quantity"><cms:show quantity /></td>
                                    <td class="col-price">
                                        <cms:if line_discount><span class="compare-price">$<cms:number_format orig_price /></span></cms:if> 
                                        $<cms:number_format price />
                                    </td>
                                    <td class="col-subtotal">$<cms:number_format line_total /></td>
                                </tr>
                            </cms:pp_cart_items>
                            
                            <cms:if "<cms:pp_discount />" || "<cms:pp_shipping />" || "<cms:pp_taxes />" >
                                <tr class="row-extras">
                                    <td class="col-extras-label" colspan="3">Subtotal</td>
                                    <td class="col-extras">$<cms:number_format "<cms:pp_sub_total />" /></td>
                                </tr>
                            </cms:if>
                
                            <cms:if "<cms:pp_discount />">
                                <tr class="row-extras">
                                    <td class="col-extras-label" colspan="3">Discount:</td>
                                    <td class="col-extras col-discount"><span class="subtract">-</span>$<cms:number_format "<cms:pp_discount />" /></td>
                                </tr>
                            </cms:if>
                            
                            <cms:if "<cms:pp_shipping />">
                                <tr class="row-extras">
                                    <td class="col-extras-label" colspan="3">Shipping:</td>
                                    <td class="col-extras">$<cms:number_format "<cms:pp_shipping />" /></td>
                                </tr>
                            </cms:if>
                            
                            <cms:if "<cms:pp_taxes />">
                                <tr class="row-extras">
                                    <td class="col-extras-label" colspan="3">Taxes:</td>
                                    <td class="col-extras">$<cms:number_format "<cms:pp_taxes />" /></td>
                                </tr>
                            </cms:if>
                            
                            <tr class="row-total">
                                <td class="col-total-label" colspan="3">Total:</td>
                                <td class="col-total">$<cms:number_format "<cms:pp_total />" /></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="cart-operations">
                        <div class="coupon-box">
                        
                            <!-- START COUPON FORM -->
                            <cms:form method="post" anchor='0'>
                                <cms:if k_success >
                                    <cms:pages masterpage="<cms:pp_config 'tpl_coupons' />" custom_field="code==<cms:show frm_coupon_code /> | end_date>=<cms:date format='Y-m-d' />" limit='1'>
                                        <cms:no_results>
                                            <cms:delete_session 'coupon_found' />  
                                            <cms:delete_session 'coupon_code' />
                                            <cms:delete_session 'coupon_discount' />
                                            <cms:delete_session 'coupon_type' />
                                            <cms:delete_session 'coupon_min_amount' />
                                            <cms:delete_session 'coupon_free_shipping' />
                                            
                                            <cms:set_flash name='coupon_flash_msg' value="<p class='error'>Coupon is invalid or expired!</p>" />
                                            <cms:pp_refresh_cart />
                                        </cms:no_results>
                                        
                                        <cms:set_session name='coupon_found' value='1' />  
                                        <cms:set_session name='coupon_code' value=code />
                                        <cms:set_session name='coupon_discount' value=discount />
                                        <cms:set_session name='coupon_type' value=type />
                                        <cms:set_session name='coupon_min_amount' value=min_amount />
                                        <cms:set_session name='coupon_free_shipping' value=free_shipping />
                                        
                                        <cms:if min_amount ge "<cms:pp_sub_total />" >
                                            <cms:set_flash name='coupon_flash_msg' value="<p class='notice'>Coupon discount will be applied when cart total is more than <cms:pp_config 'currency_symbol' /><cms:show min_amount />!</p>" />
                                        <cms:else />
                                            <cms:set_flash name='coupon_flash_msg' value="<p class='success'>Your coupon discount has been applied!</p>" />                    
                                        </cms:if>
                                        <cms:pp_refresh_cart />
                                    </cms:pages>
                                    
                                    <cms:redirect k_page_link />
                                </cms:if>
                                
                                <cms:input type="text" placeholder="Enter coupon code" name="coupon_code" value="<cms:get_session 'coupon_code' />" class="coupon-input"/>
                                <input type="submit" value="Apply" class="button coupon-button"/>
                                
                            </cms:form> 
                            <!-- END COUPON FORM -->
                            
                            
                        </div>
                        <div class="edit-cart-box">
                            <a href="<cms:pp_cart_link />" class="button" >Edit Cart</a>
                        </div>
                    </div>
					
                    <cms:form method="post" anchor='0'>
                        <cms:if k_success >
                            <cms:pp_payment_gateway 
                                shipping_address="<cms:if "<cms:pp_count_shippable_items />" >1<cms:else />0</cms:if>"
                                empty_cart='0' 
                            />
                        </cms:if>
                        <div class="checkout-box">
                            <cms:input name="paypal" class="button checkout-button" type="submit" value="Continue to PayPal" />
                        </div>
                    </cms:form>
                
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
</body>
</html>
<?php COUCH::invoke(); ?>