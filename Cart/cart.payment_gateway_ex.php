<?php

    if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

    class KCartEx extends KCart{

       /*
        * The only difference to the original method is
        * added "notify_url" in parameters and query string
        * */

        function payment_gateway( $params ){ // Used by cms:pp_payment_gateway tag
            global $FUNCS, $KSESSION;

            extract( $FUNCS->get_named_vars(
                        array(
                              'shipping_address'=>'0', /* 0=address not required, 1=get address at PayPal site, 2=get address from session */
                              'calc_shipping_at_paypal'=>'0', /* to calculate shipping at PayPal, set this to 1 and do not set $this->shipping */
                              'logo'=>'',
                              'notify_url'=>'',
                              'return_url'=>'',
                              'cancel_url'=>'',
                              'empty_cart'=>'1'
                              ),
                        $params)
                   );

            if( $shipping_address!=1 && $shipping_address!=2 ) $shipping_address=0;
            if( $calc_shipping_at_paypal!=1 ) $calc_shipping_at_paypal=0;
            $logo = trim( $logo );
            $notify_url = trim( $notify_url );
            $return_url = trim( $return_url );
            $cancel_url = trim( $cancel_url );
            if( !$return_url ){ $return_url = K_SITE_URL; }
            if( !$cancel_url ){ $cancel_url = $return_url; }
            if( $empty_cart!=0 ) $empty_cart=1;

            // get to work
            $items = $this->items;
            if( is_array($items) ){

                // general info
                if( $this->get_config('paypal_use_sandbox') ){
                    $paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
                }
                else{
                    $paypal_url = 'https://www.paypal.com/cgi-bin/webscr';
                }
                $qs  = "?cmd=_cart";
                $qs .= "&upload=1";
                $qs .= "&business=" . urlencode( $this->get_config('paypal_email') );
                $qs .= "&currency_code=" . urlencode( $this->get_config('currency') );
                $qs .= "&rm=1";
                $qs .= "&return=" . urlencode( $return_url );
                $qs .= "&cancel_return=" . urlencode( $cancel_url );
                $qs .= "&notify_url=" . urlencode( $notify_url );
                if( $logo ){
                   $qs .= '&image_url='.urlencode( $logo );
                }
                if( $KSESSION->get_var('contact_email') ){
                    $qs .= "&email=" . urlencode( substr($KSESSION->get_var('contact_email'), 0, 127) );
                }

                // add items
                $item_count = 1;
                foreach( $items as $item ){
                    $qs .= "&item_number_" . $item_count . "=" . urlencode( $item['id'] );
                    $qs .= "&item_name_" . $item_count . "=" . urlencode( $item['title'] );
                    $qs .= "&amount_" . $item_count . "=" . urlencode( $item['price'] );
                    $qs .= "&quantity_" . $item_count . "=" . urlencode( $item['quantity'] );
                    if( !$calc_shipping_at_paypal ){
                        $qs .= "&shipping_" . $item_count . "= 0"; // So as to be exempt of merchant rates configured at PayPal (if any).
                    }
                    $options_count = 0;
                    foreach($item['options'] as $k=>$v){
                        $qs .= "&on" . $options_count . "_" . $item_count . "=" . urlencode( $k );
                        $qs .= "&os" . $options_count . "_" . $item_count . "=" . urlencode( $v );
                        $options_count++;
                    }
                    $item_count++;
                }

                // discount
                if( $this->discount ){ // On complete cart. Will override per item discounts, if any
                    $qs .= "&discount_amount_cart=" . urlencode( $this->discount );
                }

                // shipping
                if( $this->shipping ){ //and shipping amount is non-zero
                    $qs .= "&handling_cart=" . urlencode( $this->shipping );
                }

                // shipping address
                if( $shipping_address==2 ){
                    // pass captured address to paypal
                    $qs .= "&first_name=" . urlencode( substr($KSESSION->get_var('shipping_first_name'), 0, 25) );
                    $qs .= "&last_name=" . urlencode( substr($KSESSION->get_var('shipping_last_name'), 0, 25) );
                    $qs .= "&address1=" . urlencode( substr($KSESSION->get_var('shipping_address1'), 0, 100) );
                    $qs .= "&address2=" . urlencode( substr($KSESSION->get_var('shipping_address2'), 0, 100) ); //optional
                    $qs .= "&city=" . urlencode( substr($KSESSION->get_var('shipping_city'), 0, 40) );
                    $qs .= "&state=" . urlencode( $KSESSION->get_var('shipping_state_code') ); // US valid values: https://www.x.com/developers/paypal/documentation-tools/api/stateandprovincecodes
                    $qs .= "&country=" . urlencode( $KSESSION->get_var('shipping_country_code') ); // Valid values: http://www.paypalobjects.com/en_US/ebook/PP_NVPAPI_DeveloperGuide/countrycodes_new.html
                    $qs .= "&zip=" . urlencode( substr($KSESSION->get_var('shipping_zip'), 0, 32) );
                }
                elseif( $shipping_address==1 ){
                    $qs .= "&no_shipping=2"; // make it mandatory to enter shipping address at paypal
                }
                else{
                    $qs .= "&no_shipping=1";
                }

                // taxes
                if( $this->taxes ){ // On complete cart. Will override per item taxes, if any
                    $qs .= "&tax_cart=" . urlencode( $this->taxes );
                }

                if( $empty_cart ){
                    $this->items = array();
                    $this->serialize();
                }

                // go!
                header( 'Location: ' . $paypal_url . $qs );
            }

        }

        static function gateway_handler( $params, $node ){
            global $CART;
            if( count($node->children) ) {die("ERROR: Tag \"".$node->name."\" is a self closing tag");}

            return $CART->payment_gateway( $params );
        }

    }

