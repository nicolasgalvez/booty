/**
 The theme js.
 */

jQuery(document).ready(function($) {
	// $ Works here. Used for wordpress

	//console.log('hi'); //test that grunt is compiling this.
	var navbarHeight = $('.site-header nav').height();
	console.log(navbarHeight);
	console.log($(window).height());
	/**
	 * Resize slider
	 */
	function resizeSlider(anim) {
		var heroHeight = $(window).height() - navbarHeight;
		if (anim) {
			// move it all animated style.
			$('#hero-widgets').animate({
				height : heroHeight
			}, 500);
		} else {
			// do it as fast as possible.
			$('#hero-widgets').height(heroHeight);
		}
		// position the hero text
		$('#hero-widgets').animate({
				"padding-top": heroHeight / 4
			}, 500);
	}
	/*
	On load resize the hero section to full height.
	On resize, make hero full height.
	 */
	if ($('body').hasClass('home')) {
		resizeSlider();
		$(window).resize(function() {
			resizeSlider(true);
		});
	}

	/**
	 * Smooth Scrolling
	 */
	if ($('body').hasClass('home')) {
		$('a').smoothScroll({offset: -navbarHeight});
	}
	/**
	 * Scrollspyyyyy
	 * @type {String}
	 */
	$('body.home').scrollspy({ target: '.site-header nav', offset: navbarHeight+1 });

	/**
	 * Map scroll fixer from
	 * http://jsfiddle.net/0u6v4jnp/
	 */
	// Disable scroll zooming and bind back the click event
	var onMapMouseleaveHandler = function(event) {
		var that = $(this);

		that.on('click', onMapClickHandler);
		that.off('mouseleave', onMapMouseleaveHandler);
		that.find('iframe').css("pointer-events", "none");
	};

	var onMapClickHandler = function(event) {
		var that = $(this);

		// Disable the click handler until the user leaves the map area
		that.off('click', onMapClickHandler);

		// Enable scrolling zoom
		that.find('iframe').css("pointer-events", "auto");

		// Handle the mouse leave event
		that.on('mouseleave', onMapMouseleaveHandler);
	};

	// Enable map zooming with mouse scroll when the user clicks the map
	$(".embed-responsive").on('click', onMapClickHandler);

	/**
	 * Compact Navbar
	 */
	if ($('body').hasClass('home')) {
		$(window).scroll(function() {
			// find the li with class 'active' and remove it
			//$("ul.menu-bottom li.active").removeClass("active");
			// get the amount the window has scrolled
			var scroll = $(window).scrollTop();
			// add the 'active' class to the correct li based on the scroll amount
			if (scroll >= 1) {
				$(".site-header nav").addClass("compact");
			} else {
				$(".site-header nav").removeClass("compact");
			}
		});
	}

	//$('.home-widgets .widget_nav_menu').scroll_navi();
	// @todo add the needed height offset when logged in.
	// console.log($('#wpadminbar').height());

	/**
	 * Dropdown, allow clicking on parent item.
	 */
	if ($(window).width() > 769) {
		$('.navbar .dropdown').hover(function() {
			$(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();

		}, function() {
			$(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();

		});

		$('.navbar .dropdown > a').click(function() {
			location.href = this.href;
		});

	}
});