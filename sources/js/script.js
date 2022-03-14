import Swiper from 'swiper/swiper-bundle';
import lightbox from 'lightbox2/dist/js/lightbox';
import  "select2/dist/js/select2.full.min";
// import { Tooltip, Toast, Popover } from 'bootstrap';


/**
 * is jQuery
 * @param obj
 * @returns {*}
 */
function isjQuery(obj) {
	return (obj instanceof jQuery) ? obj[0] : obj
}
 
let vh = window.innerHeight * 0.01;
document.documentElement.style.setProperty('--vh', `${vh}px`);

(function ($) {

	lightbox.option({
		'resizeDuration': 200,
		'wrapAround': true
	});

	/*swiper reviews*/
	const swiper = new Swiper('.flc-reviews-swiper', {
		slidesPerView: 1,
		spaceBetween: 10,
		loop: true,
		navigation: {
			nextEl: '.flc-reviews-swiper-next',
			prevEl: '.flc-reviews-swiper-prev',
		},
	})

	/*fearured events*/
	const f_swiper = new Swiper('.js-fearured-events', {
		slidesPerView: 1,
		loop: true,
		autoplay: {
			delay: 5000,
		},
	})


	/*$(".select").select2({
		minimumResultsForSearch: -1
	});*/

	$('.flc-header__burger').on('click', function () {
		let header = $('.flc-header');
		header.toggleClass('show-menu');
	})

	$('.flc-header__search-icon').on('click', function () {
		$(this).parent().toggleClass('active');
	})

	/*accordion*/
	$('.flc-accordion__item-header').on('click', function () {
		if($(this).parent().hasClass('active')) {
			$(this).parent().removeClass('active');
		} else {
			$('.flc-accordion__item.active').removeClass('active');
			$(this).parent().addClass('active');
		}
	});

	// popovers
	var popovers = document.querySelector('[data-bs-toggle="popover"]');
	if ( popovers !== null ) {
		new bootstrap.Popover(popovers, {
			container: 'body'
		});
	}

})(jQuery)


