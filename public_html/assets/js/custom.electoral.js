(function($) {
	"use strict";

	// Navigation menu
	
	var $navList = $( '#nav > ul' );
	var $navBreakPoint = 768;

	//Initializing top menu
	$( $navList ).superfish( { delay: 100, speed: 'fast', disableHI: true } );

	// Mobile menu trigger
	$( '#nav-toggle' ).click( function( el ) {
		el.preventDefault();
		$( this ).find( 'i.fa' ).toggleClass( 'fa-bars fa-times' )
		$( $navList ).slideToggle();
	});

	// Mobile menu tests
	if ( Modernizr.mq( '(max-width: ' + $navBreakPoint +'px)' ) ) {
		$( $navList ).addClass( 'nav-mobile' );
	}
	else {
		$( $navList ).removeClass( 'nav-mobile' );
	}

	$( window ).resize(function() {
		if ( Modernizr.mq( '(max-width: ' + $navBreakPoint +'px)' ) ) {
			if ( !$( $navList ).hasClass( 'nav-mobile' ) ) {
				$( $navList ).addClass( 'nav-mobile' ).hide();
			}
		}
		else {
			$( $navList ).removeClass( 'nav-mobile' );
			if ( $( $navList ).is( ':hidden' ) ) {
				$( $navList ).show();
			}
		}
	});


	// Initializing sliders
	$( '.simple-slider' ).owlCarousel({
		autoPlay: 7000,
		stopOnHover: true,
		slideSpeed: 200,
		paginationSpeed: 800,
		rewindSpeed: 800,
		singleItem: true
	});


	// Initializing tabs
	$( '.tabs-hor' ).easyResponsiveTabs({
		type: 'default',
		width: 'auto',		//auto or any custom width
		fit: true,			// 100% fits in a container
		closed: false
	});
	$( '.tabs-vert' ).easyResponsiveTabs({
		type: 'vertical',
		width: 'auto',		//auto or any custom width
		fit: true,			// 100% fits in a container
		closed: false
	});
	$( '.accordion' ).easyResponsiveTabs({
		type: 'accordion',
		width: 'auto',		//auto or any custom width
		fit: true,			// 100% fits in a container
		closed: false
	});

	$( '.gallery-items' ).mixitup( {
		targetSelector: '.gallery-item',	// Class required on each portfolio item
		filterSelector: '.gallery-filter', // Class required on each filter link
		effects: ['fade'],
		easing: 'snap'
	} );


	// Initializing Magnific Popup
	$('.gallery-item').each(function() { // the containers for all your galleries should have the class gallery
		$(this).magnificPopup({
			delegate: 'a.zoom', // the container for each your gallery items
			type: 'image',
			gallery:{enabled:true}
		});
	});


	// Crossbrowser input placeholders
	$('[placeholder]').focus(function() {
		var input = $(this);
		if (input.val() == input.attr('placeholder')) {
			input.val('');
			input.removeClass('placeholder');
		}
	}).blur(function() {
		var input = $(this);
		if (input.val() == '' || input.val() == input.attr('placeholder')) {
			input.addClass('placeholder');
			input.val(input.attr('placeholder'));
		}
	}).blur();


	// Smooth BODY scroll
	//$.srSmoothscroll({step:60,speed:600,ease:"linear"});


	// Initializing FitVids
	$( 'body' ).fitVids();

	// WOW.js animations setup
	var wow = new WOW({
		boxClass: 'wow',      // animated element css class (default is wow)
		animateClass: 'animated', // animation css class (default is animated)
		offset: 0,          // distance to the element when triggering the animation (default is 0)
		mobile: false,       // trigger animations on mobile devices (default is true)
		live: false        // act on asynchronously loaded content (default is true)
	});
	wow.init();


	// Google Maps setup
	// .gmap as class selector, also defined in stylesheet. Edit at own risk.

	function gmapSetup() {
		$( '.gmap' ).each( function() {
			$( this ).uniqueId();
			var gmapId = $( this ).attr( 'id' );
			var gmapLat = $( this ).data( 'lat' );
			var gmapLng = $( this ).data( 'lng' );
			var gmapTitle = $( this ).attr( 'title' );
			var gmapInfo = $( this ).html();
			// Cleaning the content
			//$( this ).css( 'display' , 'none');

			gmapInit( gmapId, gmapLat, gmapLng, gmapTitle, gmapInfo );
		});
	}

	function gmapInit( gmapId, gmapLat, gmapLng, gmapTitle, gmapInfo ) {
		var iconBase = 'assets/img/';

		var gmapLatLng = new google.maps.LatLng( gmapLat, gmapLng );
		var infowindow = new google.maps.InfoWindow({
			content: gmapInfo,
		});
		var gmapOptions = {
		 	center: gmapLatLng,
		 	zoom: 14
		};

		var gmap = new google.maps.Map( document.getElementById( gmapId ), gmapOptions );

		var gmapMarker = new google.maps.Marker({
			icon: iconBase + 'gmaps-marker.png',
			position: gmapLatLng,
			map: gmap,
			title: gmapTitle
		});
		google.maps.event.addListener(gmapMarker, 'click', function() {
			infowindow.open( gmap, gmapMarker );
		});
	}

	// Will test for existing Google Maps on page and
	// execute only if any have been found
	if ( $( '.gmap' )[0] ){
		google.maps.event.addDomListener(window, 'load', gmapSetup);
	}
})(jQuery);