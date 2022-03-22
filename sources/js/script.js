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

	// Lightbox gallery
	if ( $('.gallery').length ) {
		$('.gallery-item').find('a').attr('data-lightbox', 'gallery');
	}

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
	var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
	var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
		return new bootstrap.Popover(popoverTriggerEl,{
			container: 'body',
			trigger: 'hover'
		});
	});

	function show_loaded(parent_selector) {
		$(parent_selector).find('.ajax-loaded').each(function(i) {
			setTimeout(function(el) {
	            el.addClass('active');
	        }, i * 200, $(this));
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
						show_loaded('.js-load-more-events-container');
					}
				});
			}
		}
	}

	// Load more properties
	if ( $('.js-load-more-properties').length ) {
		var can_be_loaded = true,
		    current_page = 2,
		    observer = new IntersectionObserver(scroll_handler_properties),
		    buttons  = document.querySelectorAll('.js-load-more-properties'),
		    $button = $('.js-load-more-properties'),
		    total_pages = parseInt($button.attr('data-pages')),
		    $wrapper = $('.js-load-more-properties-container');

		function scroll_handler_properties(entries, observer) {
			entries.forEach(entry => {
			    if (entry.isIntersecting && can_be_loaded) {
			    	load_properties();
			    }
			});
		}

		buttons.forEach(button => {
	    	observer.observe(button);
	    });

		function load_properties() {
			$.ajax({
				url: fc_object.ajax_url,
				data: {
					'action': 'flc_load_more_properties',
					'page': current_page,
				},
				type: 'POST',
				beforeSend: function( xhr ){
					can_be_loaded = false; 
					$button.show();
				},
				success:function(data){
					var result = JSON.parse(data);

					current_page++;

					if ( current_page > total_pages ) {
						$button.hide();
					} else {
						can_be_loaded = true;
					}

					$wrapper.append(result.html);

					show_loaded('.js-load-more-properties-container');
				}
			});
		}
	}


	function initMap( $el ) {

	    // Find marker elements within map.
	    var $markers = $el.find('.marker');

	    // Create gerenic map.
	    var mapArgs = {
	        zoom        : $el.data('zoom') || 16,
	        mapTypeId   : google.maps.MapTypeId.ROADMAP
	    };
	    var map = new google.maps.Map( $el[0], mapArgs );

	    // Add markers.
	    map.markers = [];
	    $markers.each(function(){
	        initMarker( $(this), map );
	    });

	    // Center map based on markers.
	    centerMap( map );

	    // Return map instance.
	    return map;
	}

	function initMapList( $el ) {

	    // Find marker elements within map.
	    var locations = fc_object.map_locations;

	    // Create gerenic map.
	    var mapArgs = {
	        zoom        : $el.data('zoom') || 16,
	        mapTypeId   : google.maps.MapTypeId.ROADMAP
	    };
	    var map = new google.maps.Map( $el[0], mapArgs );
	    var infowindow = new google.maps.InfoWindow();

	    // Add markers.
	    map.markers = [];

	    for(var n in locations) {
	    	var marker = new google.maps.Marker({
		        position : {
			        lat: parseFloat( locations[n]['location']['lat'] ),
			        lng: parseFloat( locations[n]['location']['lng'] )
			    },
		        icon: {
		        	url: fc_object.map_icon,
		        	scaledSize: new google.maps.Size(50, 50),
		        },
		        map: map
		    });

	        var content = '<b>' + locations[n]['title'] + '</b><br>' + 
	            	locations[n]['location']['address'] + '<br>';// + 
	            	//'<a href="' + locations[n]['link'] + '">View property</a>';

	        // Show info window when marker is clicked.
	    	google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
			    return function() {
			        infowindow.setContent(content);
			        infowindow.open(map, marker);
			    };
			})(marker,content,infowindow));  

		    map.markers.push( marker );
	    }

	    // Center map based on markers.
	    centerMap( map );

	    // Return map instance.
	    return map;
	}


	function initMarker( $marker, map ) {

	    // Create marker instance.
	    var marker = new google.maps.Marker({
	        position : {
		        lat: parseFloat( $marker.data('lat') ),
		        lng: parseFloat( $marker.data('lng') )
		    },
	        icon: {
	        	url: fc_object.map_icon,
	        	scaledSize: new google.maps.Size(50, 50),
	        },
	        map: map
	    });

	    // Append to reference for later use.
	    map.markers.push( marker );

	    // If marker contains HTML, add it to an infoWindow.
	    if( $marker.html() ){

	        // Create info window.
	        var infowindow = new google.maps.InfoWindow({
	            content: $marker.html()
	        });

	        // Show info window when marker is clicked.
	        google.maps.event.addListener(marker, 'click', function() {
	            infowindow.open( map, marker );
	        });
	    }
	}


	function centerMap( map ) {

	    // Create map boundaries from all map markers.
	    var bounds = new google.maps.LatLngBounds();
	    map.markers.forEach(function( marker ){
	        bounds.extend({
	            lat: marker.position.lat(),
	            lng: marker.position.lng()
	        });
	    });

	    // Case: Single marker.
	    if( map.markers.length == 1 ){
	        map.setCenter( bounds.getCenter() );

	    // Case: Multiple markers.
	    } else{
	        map.fitBounds( bounds );
	    }
	}

	// Render maps on page load.
	$('.acf-map').each(function(){
		var map = initMap( $(this) );
	});

	$('.acf-map-list').each(function(){
		var map = initMapList( $(this) );
	});


})(jQuery)


