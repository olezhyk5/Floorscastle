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

	// Load more events
	if ( $('.js-load-more-events').length ) {
		var can_be_loaded = true,
		    current_page = 2,
		    category = 'all',
		    observer = new IntersectionObserver(scroll_handler),
		    buttons  = document.querySelectorAll('.js-load-more-events'),
		    $button = $('.js-load-more-events'),
		    total_pages = parseInt($button.attr('data-pages')),
		    $wrapper = $('.js-load-more-events-container');

		function scroll_handler(entries, observer) {
			entries.forEach(entry => {
			    if (entry.isIntersecting) {
			    	load_events();
			    }
			});
		}

		buttons.forEach(button => {
	    	observer.observe(button);
	    });

		$('.flc-tabs button').on('click', function(){
			$wrapper.html('');
			current_page = 1;
			category = $(this).attr('id');

			$('body, html').animate({
				scrollTop: $wrapper.offset().top - 50
			}, 600);

			can_be_loaded = true;
			load_events();
		});
		
		function load_events() {
			if ( can_be_loaded ) {
				$.ajax({
					url: fc_object.ajax_url,
					data: {
						'action': 'flc_load_more_events',
						'page': current_page,
						'category': category
					},
					type: 'POST',
					beforeSend: function( xhr ){
						can_be_loaded = false; 
						$button.show();
					},
					success:function(data){
						var result = JSON.parse(data);

						total_pages = result.max_num_pages;
						current_page++;

						if ( current_page > total_pages ) {
							$button.hide();
							console.log('$button.hide');
						} else {
							can_be_loaded = true;
						}

						$wrapper.append(result.html);
					}
				});
			}
		}
	}

})(jQuery)


