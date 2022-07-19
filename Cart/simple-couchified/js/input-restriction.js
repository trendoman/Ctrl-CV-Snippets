/** Restricting Input in HTML Textboxes to Numeric Values - Rick Strahl - http://www.west-wind.com/weblog/posts/2011/Apr/22/Restricting-Input-in-HTML-Textboxes-to-Numeric-Values */
$(document).ready(function() {
	$('body').on('keydown', '.product-quantity, .quantity-input', function(event) {
			var key = event.which || event.keyCode;

			if (!event.shiftKey && !event.altKey && !event.ctrlKey &&
			// Numbers
			key >= 48 && key <= 57 ||
			// Numeric keypad
			key >= 96 && key <= 105 ||
			// Backspace and Tab and Enter
			key == 8 || key == 9 || key == 13 ||
			// Home and End
			key == 35 || key == 36 ||
			// Left and Right arrows
			key == 37 || key == 39 ||
			// Del and Ins
			key == 46 || key == 45)
			return true;

			return false;
	});
});