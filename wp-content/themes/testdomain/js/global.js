;
(function ($) {

	$(document).ready(function () {

		$('.contact-us-btn').on('click', function(event) {
			$('body').addClass('overlay');
			$('.popup-window').addClass('show-popup');
		});

		$(document).on('click', function(event) {
			var target = event.target;
			if(!$(target).closest('.popup-window').length && !$(target).closest('.contact-us-btn').length || $(target).is('.close-popup')){
				$('.popup-window').removeClass('show-popup');
				$('body').removeClass('overlay');
			}
		});
	});

	$(window).on( 'load', function () {

	});

}(jQuery));
