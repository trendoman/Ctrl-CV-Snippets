<?php require_once 'couch/cms.php'; ?>
<cms:no_cache />
<cms:if "<cms:pp_count_items />" >
    <cms:pp_cart_form class="cart-form">
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
                        <td class="col-extras-label" colspan="4">Discount</td>
                        <td class="col-extras col-discount"><span class="subtract">-</span>$<cms:number_format "<cms:pp_discount />" /></td>
                    </tr>
                </cms:if>
                
                <cms:if "<cms:pp_shipping />">
                    <tr class="row-extras">
                        <td class="col-extras-label" colspan="4">Shipping</td>
                        <td class="col-extras">$<cms:number_format "<cms:pp_shipping />" /></td>
                    </tr>
                </cms:if>
                
                <cms:if "<cms:pp_taxes />">
                    <tr class="row-extras">
                        <td class="col-extras-label" colspan="4">Taxes</td>
                        <td class="col-extras">$<cms:number_format "<cms:pp_taxes />" /></td>
                    </tr>
                </cms:if>
                
                <tr class="row-total">
                    <td class="col-total-label" colspan="4">Total</td>
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
            <div class="continue-box">
                <input class="button continue-button" type="submit" data-dismiss="modal" value="Continue Shopping">
            </div>
        </div>
    </cms:pp_cart_form>

<cms:else />
    <p class="info">Your cart is empty!</p>
</cms:if>

<span id="cart_quantity" style="display:none"><cms:pp_count_items /></span>
<span id="cart_total" style="display:none"><cms:number_format "<cms:pp_total />" /></span>

<?php COUCH::invoke(); ?>