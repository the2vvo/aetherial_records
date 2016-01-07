/*
Dillon Bastan, 2015.
This is the JavaScript for managing small, general tasks for all pages.
*/


$(document).ready( function() {


	//Maintain a minimun background size
	$(window).resize( function() {
		backgroundSizing();
	});


	//Open the input for the clients email for the newsletter
	$('#newsletterButton').on("click", function() {

		$('#newsletterButton').toggleClass('em');

		if( $('#newsletterButton').hasClass("em")) {
			$('#newsletterInput').css('visibility', 'visible');
			$('#newsletterInput input[type="email"]').focus();
		} else
			$('#newsletterInput').css('visibility', 'hidden');
	});

});


//Function to maintain a minimun background size
var backgroundSizing = function() {

	var $content = $('body'),
		contentWidth = $content.width();

	if (contentWidth <= 800) {
		$content.css('background-size', '800px 100%')
	} else {
		$content.css('background-size', '100% 100%')
	}
};