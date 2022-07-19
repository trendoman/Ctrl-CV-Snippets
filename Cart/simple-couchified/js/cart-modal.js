/** Copyright (c) 2013 Increment Web Services - http://incrementwebservices.com/ - MIT License - http://www.opensource.org/licenses/mit-license.php */

$(document).ready(function() {
    // Handle 'Add Item' & 'Update Cart' form submissions
	$(document).on('submit', '.cart-form', function(event) {
		event.preventDefault();
        if ($('#cart-modal').is(':hidden')) {
            $('#cart-modal').modal('show');
        }
        
        // Cart update begins - fade out
        cart_fade_out();
        
        // Execute action by submitting form
		$.ajax({
			type: 'post',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function() {
				show_cart();
			}
		});
	});

	// Handle 'Remove Item' link
	$(document).on('click', '.cart-remove', function(e) {
		e.preventDefault();
        
        // Cart update begins - fade out
        cart_fade_out();
        
        // Execute action by following link
		$.get($(this).attr("href"), function() {
			show_cart();
		});
	});

	// Handle 'Checkout' link
	$(document).on('click', '.checkout-button', function(e) {
		e.preventDefault();
        
        // Action begins - fade out
        cart_fade_out();
		document.location.href = checkout_link;
	});
});

function show_cart() {
    var rand = new Date().getTime();
	var url = cart_link + '?v=' + rand; 

    // Fetch updated cart
	$.get(url, function(response) {
        // Update modal window
        $('#cart-modal>.modal-body').html(response);
        
        // Update the summary on main page
		update_summary();
        
        // Cart update ends - fade in
        cart_fade_in();     
	});
}

function cart_fade_out() {
    $('.ajax-loader').fadeIn(250);
    $('#cart-modal>.modal-body').height($('#cart-modal>.modal-body').height()).addClass('opacity-hide');
}

function cart_fade_in() {
    $('.ajax-loader').fadeOut(250);
	$('#cart-modal>.modal-body').animateAuto('height', 250, function() {
		$(this).removeClass('opacity-hide').removeAttr('style');
	}); 
}

function update_summary() {
	var quantity = $('#cart_quantity').text();
	var price = $('#cart_total').text();
	
	// Update cart totals
	$('.quantity').html(quantity);
	$('.price').html(price);
}

/* http://darcyclarke.me/development/fix-jquerys-animate-to-allow-auto-values-2/ */
jQuery.fn.animateAuto = function(prop, speed, callback) {
	var elem, height, width;
	return this.each(function(i, el) {
		el = jQuery(el), elem = el.clone().css({"height":"auto","width":"auto"}).appendTo("body");
		height = elem.css("height"),
		width = elem.css("width"),
		elem.remove();

		if (prop === "height")
			el.animate({"height":height}, speed, callback);
		else if (prop === "width")
			el.animate({"width":width}, speed, callback);
		else if (prop === "both")
			el.animate({"width":width,"height":height}, speed, callback);
	});
}