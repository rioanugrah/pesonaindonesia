"use strict"; // start of use strict

$(document).ready(function() {
	scroll_top ();
	sticky_init ();
	hover_disable ();
	init_classic_menu();
	init_accordion();
	init_toggle();
	counter();
	$(window).on('scroll', progress_bar_loader);
	cws_page_focus();
	progress_bar_loader();
	init_twitter_carusel();
	init_fancy();
	search_open ()
	if($(".cws_prlx_section").length) {
		$( ".cws_prlx_section" ).cws_prlx();
	}
	init_rev_slider();
	init_add_cart ();
	init_color_filter ();
	if ($(".price_slider_wrapper").length) {
		woocommerce_price_slider( $ )
	};
	video_img();
	cws_touch_events_fix ();
	masonry_init();
	filter_init();
	gridList_init();
	popup_login_init();
	magicline_init();
	magicline_main_init();
	footer_height();
	search_form_height();
	search_form_click();
	search_tours_form_resize();
	slider_info_mob();
	scrollTo_init();
	flexslider_init();
	add_button_menu();
	mobile_menu_controller_init ();
	if($('.isotope-grid').length) {
		init_isotop ();
	}
});

$(window).resize(function() {

	if($('.isotope-grid').length) {
	init_isotop ();
	}
	masonry_init();
	search_form_height();
	search_tours_form_resize();
	slider_info_mob();
	footer_height();
	cws_touch_events_fix ();

});

// ios touch fix
function cws_touch_events_fix() {
	if ( is_mobile_device() ){
	jQuery( ".container" ).on( "mouseenter", ".hover-effect, .product .pic", function (e){
		e.preventDefault();
		jQuery( this ).trigger( "hover" );
	});
	jQuery( ".features-tours-item" ).on( "mouseenter", ".features-info-top, .features-info-bot", function (e){
		e.preventDefault();
		jQuery( this ).trigger( "hover" );
	});
	jQuery( ".main-nav" ).on( "hover", ".mobile_nav .button_open, .mobile_nav li > a", function ( e ){
		e.preventDefault();
		jQuery( this ).trigger( "click" );
	});
	jQuery( ".recom-item .recom-media > a" ).each(function(){
		jQuery(this).on( "click", function ( e ){
		e.preventDefault();
		})
	});
	jQuery( ".work-filter ul.magic-line li a" ).on( "mouseenter", function ( e ){
		e.preventDefault();
		jQuery( this ).trigger( "click" );
	});
	}
}

// hover disable function
function hover_disable() {
	$('.recom-item .recom-media').off('mouseenter mouseleave');
}

// search open function
function search_open() {
	$('.site-top-panel .top-search').on('click', function() {
		$('.site-top-panel').addClass('open-search');
		return false;
	})

	$('.site-top-panel .search_menu_cont .search_back_button').on('click', function() {
		$('.site-top-panel').removeClass('open-search');
	})

	$('.main-nav .inner-nav .search > a').on('click', function() {
		$('.main-nav').addClass('open-search');
		return false;
	})

	$('.main-nav .inner-nav .search .close-button').on('click', function() {
		$('.main-nav').removeClass('open-search');
	})
}

// menu
function init_classic_menu() {
	var mobile_nav = $(".mobile_nav .mobile_menu_switcher");
	var desktop_nav = $(".desktop-nav");

	// Navbar sticky
	height_line($(".inner-nav.desktop-nav > ul > li > a"), $(".main-nav"));

	mobile_nav.css({
		"width": $(".main-nav").height() + "px"
	});

	// Transpaner menu

	if ($(".main-nav").hasClass("transparent")) {
		$(".main-nav").addClass("js-transparent");
	}
	var lastScrollTop = 0;
	$(window).scroll(function() {
		if ($('.sticky-wrapper').length) {
			if ($('.sticky-wrapper').hasClass('is-sticky')) {
				$(".js-transparent").removeClass("transparent");
				$(".main-nav, .nav-logo-wrap .logo, .mobile-nav").addClass("small-height");
			} else {
				$(".js-transparent").addClass("transparent");
				$(".main-nav, .nav-logo-wrap .logo, .mobile-nav").removeClass("small-height");
			}
		}
	});

	// Mobile menu toggle
	mobile_nav.on('click', function() {
		if (desktop_nav.hasClass("js-opened")) {
			desktop_nav.slideUp("slow", "easeOutExpo").removeClass("js-opened");
			$(this).removeClass("active");
		} else {
			desktop_nav.slideDown("slow", "easeOutQuart").addClass("js-opened");
			$(this).addClass("active");

			// Fix for responsive menu
			if ($(".main-nav").hasClass("not-top")) {
				$(window).scrollTo(".main-nav", "slow");
			}
		}
	});

	desktop_nav.find("a:not(.mn-has-sub)").on('click', function() {
		if (mobile_nav.hasClass("active")) {
			desktop_nav.slideUp("slow", "easeOutExpo").removeClass("js-opened");
			mobile_nav.removeClass("active");
		}
	});

	// Sub menu

	var mnHasSub = $(".mn-has-sub");
	var mnThisLi;

	$(".mobile-on .mn-has-sub").find(".fa:first").removeClass("fa-angle-right").addClass("fa-angle-down");

	mnHasSub.on('click', function() {
		if ($(".main-nav").hasClass("mobile-on")) {
			mnThisLi = $(this).parent("li:first");
			if (mnThisLi.hasClass("js-opened")) {
			mnThisLi.find(".mn-sub:first").slideUp(function() {
				mnThisLi.removeClass("js-opened");
				mnThisLi.find(".mn-has-sub").find(".fa:first").removeClass("fa-angle-up").addClass("fa-angle-down");
			});
			} else {
			$(this).find(".fa:first").removeClass("fa-angle-down").addClass("fa-angle-up");
			mnThisLi.addClass("js-opened");
			mnThisLi.find(".mn-sub:first").slideDown();
			}
			return false;
		}
	});

	$(window).resize(function(){
		nav_hover();
	})

	nav_hover();

	function nav_hover() {
		$('.inner-nav').each(function(){
			if( !($('.inner-nav').hasClass('.mobile_nav')) ) {
				$(".mn-has-sub").parent("li").on({
					mouseenter: function() {
						if (!($(".main-nav").hasClass("mobile-on"))) {
							$(this).find(".mn-sub:first").stop(true, true).delay(100).fadeIn("fast");
						}
					},
					mouseleave: function() {
						if (!($(".main-nav").hasClass("mobile-on"))) {
							$(this).find(".mn-sub:first").stop(true, true).delay(100).fadeOut("fast");
						}
					}
				});
			}
		});
	}
}

function sticky_init() {
	if (jQuery('.main-nav').length) {
		var jQueryheader = jQuery( ".main-nav" ).clone();
		jQuery('body').prepend('<div class="sticky-container"></div>');
		var sticky_contaner = jQuery('.sticky-container');
		sticky_contaner.html(jQueryheader);
		var lastScrollTop = 0;
		jQuery(window).scroll(function(event){
			var st = jQuery(this).scrollTop();
			if (st > lastScrollTop || st <= 120) {
				sticky_contaner.removeClass('sticky-on');
			} else {
				if (jQuery(window).width() <= 1000) {
					sticky_contaner.removeClass('sticky-on');
				} else {
					sticky_contaner.addClass('sticky-on');
				}
			}
			lastScrollTop = st;
		});
	}
};
// Function for block height 100%
function height_line(height_object, height_donor){
	height_object.height(height_donor.height());
	height_object.css({"line-height": height_donor.height() + "px"});
	$('.inner-nav.desktop-nav').css('opacity', '1')
}

// Accordion
function init_accordion () {
	$(".accordion").each(function() {
		var allPanels = $(this).children('.content').hide();
		allPanels.first().slideDown("easeOutExpo");
		$(this).children('.content-title').first().addClass("active");

		$(this).children('.content-title').on('click', function(){
			var current = $(this).next(".content");
			$(this).parent().children('.content-title').removeClass("active");
			$(this).addClass("active");
			allPanels.not(current).slideUp("easeInExpo");
			$(this).next().slideDown("easeOutExpo");
			return false;
		});
	})
}

// Toggle
function init_toggle () {
	$(".toggle > .content").hide();
	$(".toggle > .content-title.active").next().slideDown();
	$(".toggle > .content-title").on('click', function(){
		if ($(this).hasClass("active")) {
			$(this).next().slideUp("easeOutExpo");
			$(this).removeClass("active");
		} else {
			var current = $(this).next(".content");
			$(this).addClass("active");
			$(this).next().slideDown("easeOutExpo");
		}
		return false;
	});
}

// counter
var is_count = true
function counter() {
	if($(".counter").length) {
		var winScr = $(window).scrollTop();
		var winHeight = $(window).height();
		var ofs = $('.counter').offset().top;

		$(window).on('scroll',function(){
			winScr = $(window).scrollTop();
			winHeight = $(window).height();
			ofs = $('.counter').offset().top;

			if ( (winScr+winHeight)>ofs && is_count) {
				$(".counter").each(function () {
					var atr = $(this).attr('data-count');
					var item = $(this);
					var n = atr;
					var d = 0;
					var c;

					item.text(d);
					var interval = setInterval(function() {
						c = atr/70;
						d += c;
						if ( (atr-d)<c) {
							d=atr;
						}
						item.text(Math.floor(d) );
						if (d==atr) {
							clearInterval(interval);
						}
					},50);
				});
				is_count = false;
			}
		})
	}
}

/**/
/*  Skill bar  */
/**/
function progress_bar_loader() {
	if (!is_mobile_device()){
		$('.skill-bar-progress').each(function(){
			var el = this;

			if (is_visible(el)){
			if ($(el).attr("processed")!="true"){
				$(el).css("width","0%");
				$(el).attr("processed","true");
				var val = parseInt($(el).attr("data-value"), 10);
				var fill = 0;
				var speed = val/100;

				var timer = setInterval(function() {
				if (fill<val){
					fill += 1;
					$(el).css("width",String(fill)+"%");
					var ind = $(el).parent().parent().find(".skill-bar-perc");
					$(ind).text(fill+"%");
				}
				},(10/speed));
			}
			}
		});
	} else {
		$(".skill-bar-progress").each(function(){
			var el = this;
			var fill = $(el).attr("data-value");
			var ind = $(el).parent().parent().find(".skill-bar-perc");

			$(el).css('width',fill+'%');
			$(ind).text(fill+"%");
		});
	}
}

// Is Visible
function is_visible (el){
	var w_h = $(window).height();
	var dif = $(el).offset().top - $(window).scrollTop();
	return ((dif > 0) && (dif<w_h));
}

/**/
/* mobile device detect */
/**/
function is_mobile_device () {
	return ( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) );
}

/**/
/* mobile video img */
/**/
function video_img(){
	if (is_mobile_device ()) {
		var img_url = $('.row_bg_video').attr('data-img-url');

		$('.row_bg_video').css({
			'background-image': 'url('+img_url+')'
		})
		$('.row_bg_video').children().hide();
	}
}

/**/
/*  Tabs  */
/**/
$(".tabs .tabs-btn").on( 'click', function() {
	var idBtn = ($(this).attr("data-tabs-id"));
	var containerList = $(this).parents(".tabs").find(".container-tabs");
	var f = $(".tabs [data-tabs-id=cont-"+idBtn+"]");

	$(f).addClass("active").siblings(".container-tabs").removeClass('active');
	$(containerList).fadeOut( 0 );
	$(f).fadeIn( 300 );
	$(this).addClass("active").siblings(".tabs-btn").removeClass('active');
});

/**/
/********   Carousel   *********/
/**/
var owl_one = $('.owl-one-item')
jQuery(owl_one).each(function() {
	jQuery(this).owlCarousel({
		itemsCustom : [
		[0, 1],
		[479, 1],
		[738, 1],
		[980, 1],
		[1170, 1],
	],
		navigation: false,
		pagination: false,
	});
	var owl = $(this)
	$(this).parent().parent().find(".carousel-nav .next").on( 'click', function(){
		owl.trigger('owl.next');
	})
	jQuery(this).parent().parent().find(".carousel-nav .prev").on( 'click', function() {
		owl.trigger('owl.prev');
	})
});

/**/
/********   Carousel   *********/
/**/
var owl_two = $('.owl-two-item')
jQuery(owl_two).each(function() {
	jQuery(this).owlCarousel({
		itemsCustom : [
		[0, 1],
		[479, 1],
		[630, 2],
		[980, 2],
		[1170, 2],
	],
		navigation: false,
		pagination: false,
	});
	 var owl = $(this)
	$(this).parent().parent().find(".carousel-nav .next").on( 'click', function(){
		owl.trigger('owl.next');
	})
	jQuery(this).parent().parent().find(".carousel-nav .prev").on( 'click', function() {
		owl.trigger('owl.prev');
	})
});

/**/
/********   Carousel   *********/
/**/
var owl_three = $('.owl-three-item')
jQuery(owl_three).each(function() {
	jQuery(this).owlCarousel({
		itemsCustom : [
		[0, 1],
		[430, 1],
		[767, 2],
		[980, 3],
		[1170, 3],
	],
		navigation: true,
		navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		pagination: false,
	});
	 var owl = $(this)
	$(this).parent().parent().find(".carousel-nav .next").on( 'click', function(){
		owl.trigger('owl.next');
	})
	jQuery(this).parent().parent().find(".carousel-nav .prev").on( 'click', function() {
		owl.trigger('owl.prev');
	})
});

/**/
/********   Carousel   *********/
/**/
var owl_three_small = $('.owl-three-item-small')
jQuery(owl_three_small).each(function() {
	jQuery(this).owlCarousel({
		itemsCustom : [
		[0, 1],
		[540, 2],
		[767, 2],
		[980, 3],
		[1170, 3],
	],
		navigation: true,
		navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		pagination: false,
	});
	 var owl = $(this)
	$(this).parent().parent().find(".carousel-nav .next").on( 'click', function(){
		owl.trigger('owl.next');
	})
	jQuery(this).parent().parent().find(".carousel-nav .prev").on( 'click', function() {
		owl.trigger('owl.prev');
	})
});

/**/
/********   Carousel   *********/
/**/
var owl_four = $('.owl-four-item')
jQuery(owl_four).each(function() {
	jQuery(this).owlCarousel({
		itemsCustom : [
		[0, 1],
		[479, 2],
		[738, 2],
		[980, 3],
		[1170, 4],
	],
		navigation: false,
		pagination: false,
	});
	 var owl = $(this)
	$(this).parent().parent().find(".carousel-nav .next").on( 'click', function(){
		owl.trigger('owl.next');
	})
	jQuery(this).parent().parent().find(".carousel-nav .prev").on( 'click', function() {
		owl.trigger('owl.prev');
	})
});

/**/
/********   Carousel   *********/
/**/
var owl_single = $('.owl-single-item')
jQuery(owl_single).each(function() {
	jQuery(this).owlCarousel({
		itemsCustom : [
		[0, 1],
		[479, 1],
		[738, 1],
		[980, 1],
		[1170, 1],
	],
		autoHeight : true,
		navigation: true,
		pagination: false,
	});
});

/**/
/* Twitter carousel */
/**/
function init_twitter_carusel () {
	if($('.twitter-1').length) {
	 $('.twitter-1').tweet({
		username: 'Creative_WS',
		count: 3,
		loading_text: 'loading twitter feed...',
		template: "<i class='fa fa-twitter twitt-icon'></i><p><a href='{user_url}'>@{screen_name}</a>{join}{text}<br>{time}</p>"
	});
	$('.twitter-1.full-screen .tweet_list').addClass("carousel-pag main-color");
	var owl_pag = $('.carousel-pag')
	jQuery(owl_pag).each(function() {
			jQuery(this).owlCarousel({
				itemsCustom : [
					[0, 1],
					[479, 1],
					[738, 1],
					[980, 1],
					[1170, 1],
				],
				navigation: false,
				pagination: true,
			});
		});
	}
	$('.twitter-footer').tweet({
		username: 'Creative_WS',
		count: 1,
		loading_text: 'loading twitter feed...',
		template: "<i class='fa fa-twitter twitt'></i><p><a class='link-color' href='{user_url}'>@{screen_name}</a>{join}{text}<br>{time}</p>"
	});
}

/**/
/********   Carousel   *********/
/**/
var owl_pag = $('.carousel-pag')
jQuery(owl_pag).each(function() {
	jQuery(this).owlCarousel({
		itemsCustom : [
			[0, 1],
			[479, 1],
			[738, 1],
			[980, 1],
			[1170, 1],
		],
		navigation: false,
		pagination: true,
	});
});

/**/
/********   Carousel   *********/
/**/
var owl_single = $('.owl-two-pag')
jQuery(owl_single).each(function() {
	jQuery(this).owlCarousel({
		itemsCustom : [
			[0, 1],
			[479, 2],
			[585, 1],
			[980, 1],
			[1200, 2],
		],
		navigation: false,
		pagination: true,
	});
});

/**/
/********   Carousel   *********/
/**/
var owl_single = $('.owl-three-pag')
jQuery(owl_single).each(function() {
	jQuery(this).owlCarousel({
		itemsCustom : [
			[0, 1],
			[479, 1],
			[738, 2],
			[980, 2],
			[1170, 3],
		],
		navigation: false,
		pagination: true,
	});
});


/**/
/* fancybox */
/**/
function init_fancy () {
	var fancy = $(".fancy");
	if (fancy.length) {
		fancy.fancybox();
		$('.fancybox').fancybox({
			helpers: { media: {} }
		});
	}
}

/**/
/* calendar */
/**/
if ($("#calendar").length) {
	$('#calendar').datepicker({
		prevText: '<i class="fa fa-angle-left"></i>',
		nextText: '<i class="fa fa-angle-right"></i>',
		firstDay: 1,
		dayNamesMin: [ "Su", "Mo", "Tu", "We", "Th", "Fr", "Sa" ]
	});
}

/**/
/* masonry */
/**/
function masonry_init(){
	$(".masonry").imagesLoaded(function(){
		$(".masonry").masonry();
	});
}

/**/
/* filter function */
/**/
function filter_init(){
	var fselector = 0;
	var filter_mode;

	if ($("#filter-grid").hasClass("masonry")){
		filter_mode = "masonry";
	} else{
		filter_mode = "fitRows"
	}
	$("#filter-grid").imagesLoaded(function(){
		$("#filter-grid").isotope({
			itemSelector: '.all',
			layoutMode: filter_mode,
			filter: fselector
		});
	});

	$(".filter").on('click', function(){
		$(".filter").removeClass("active");
		$(this).addClass("active");
		fselector = $(this).attr('data-filter');

		$("#filter-grid").isotope({
			itemSelector: '.all',
			layoutMode: filter_mode,
			filter: fselector
		});
	});

}
/**/
/* isotop */
/**/
function init_isotop () {

	var $container = $('.isotope-grid');
	$('.isotope-grid').isotope({
		itemSelector: '.isotope-grid .isotope-item',
		columnWidth: '.isotope-item',
		masonry: {}
	});
	if(jQuery('.filter-buttons a.active').length){
		var selector = jQuery('.filter-buttons a.active').attr('data-filter');
		$container.isotope({ filter: selector });
	}

	$('.filter-buttons').on('click', 'a', function() {
		$('.isotope-grid').isotope({
			filter: $(this).data('filter')
		});
		$(this).addClass('active').siblings().removeClass('active');
		return false;
	});
}

/**/
/* revolution slider init */
/**/
function init_rev_slider () {
	$('.tp-banner, .tp-banner-slider').on("revolution.slide.onloaded",function (e) {
		$('.tp-banner, .tp-banner-slider').css("opacity","1");
	});
	if ($('.tp-banner').length) {
		$('.tp-banner').revolution({
			dottedOverlay:"custom",
			delay:8000,
			startwidth:1170,
			startheight:700,
			lazyLoad:"on",
			responsiveLevels:[4096,1025,778,480],

			hideThumbs: 1000,
			thumbWidth:100,
			thumbHeight:50,
			thumbAmount:5,
			navigation: {
				arrows:{enable:true}
			},
			touchenabled:"on",
			onHoverStop:"on",

			swipe_velocity: 0.7,
			swipe_min_touches: 1,
			swipe_max_touches: 1,
			drag_block_vertical: false,

			keyboardNavigation:"off",

			navigationHAlign:"center",
			navigationVAlign:"bottom",
			navigationHOffset:0,
			navigationVOffset:20,

			soloArrowLeftHalign:"left",
			soloArrowLeftValign:"center",
			soloArrowLeftHOffset:20,
			soloArrowLeftVOffset:0,

			soloArrowRightHalign:"right",
			soloArrowRightValign:"center",
			soloArrowRightHOffset:20,
			soloArrowRightVOffset:0,

			shadow:0,
			fullWidth:"off",
			fullScreen:"on",

			spinner:"off",

			stopLoop:"off",
			stopAfterLoops:-1,
			stopAtSlide:-1,

			shuffle:"off",

			autoHeight:"off",
			forceFullWidth:"off",

			hideThumbsOnMobile:"off",
			hideNavDelayOnMobile:1500,
			hideBulletsOnMobile:"off",
			hideArrowsOnMobile:"off",
			hideThumbsUnderResolution:0,

			startWithSlide:0,
			disableProgressBar: "on"
		})
	}
	if ($('.tp-banner-slider').length) {
		$('.tp-banner-slider').revolution({
			sliderType: "standard",
			sliderLayout: "auto",
			navigation: {
				arrows:{
				enable:true,
				left : {
					container:"slider",
					h_align:"left",
					v_align:"center",
					h_offset:0,
					v_offset:0,
				},
				right : {
					container:"slider",
					h_align:"right",
					v_align:"center",
					h_offset:0,
					v_offset:0
				}
				}
			},
			gridwidth: 1170,
			gridheight: 700,
			dottedOverlay:"custom",
			lazyLoad:"on",
			responsiveLevels:[4096,1025,778,480],
			delay:8000,
			parallax: {
				type:"mouse",
				origo:"slidercenter",
				speed:2000,
				levels:[2,3,4,5,6,7,12,16,10,50,47,48,49,50,51,55],
			},
			touchenabled:"on",
			onHoverStop:"on",
			startWithSlide:0,
			disableProgressBar: "on",
			hideArrowsOnMobile:"off",
			/*onHoverStop:"on"*/
		})
	}
}


/**/
/* add to cart */
/**/
function init_add_cart () {
	$('.add-to-cart').on('click', function(){
		$(this).parents(".price-review").addClass("added");
		return false;
	})
}

/**/
/* active color filter */
/**/
function init_color_filter () {
	$('.color-filter li, .brand-filter li').on('click', function(){
		$(this).addClass('active').siblings().removeClass('active');
		return false;
	})
}

/**/
/* woocommerce_price_slider */
/**/
function woocommerce_price_slider(){
	var current_min_price
	var current_max_price
	window.woocommerce_price_slider_params = {
		'currency_pos' : 'right',
		'currency_symbol' : '<sup>$</sup>',
	}

	// woocommerce_price_slider_params is required to continue, ensure the object exists
	if ( typeof woocommerce_price_slider_params === 'undefined' ) {
		return false;
	}
	// Get markup ready for slider
	$( 'input#min_price, input#max_price' ).hide();
	$( '.price_slider, .price_label' ).show();

	// Price slider uses jquery ui
	var min_price = $( '.price_slider_amount #min_price' ).data( 'min' ),
	max_price = $( '.price_slider_amount #max_price' ).data( 'max' );

	current_min_price = parseInt( min_price, 10 );
	current_max_price = parseInt( max_price, 10 );


	if ( woocommerce_price_slider_params.min_price ) current_min_price = parseInt( woocommerce_price_slider_params.min_price, 10 );
	if ( woocommerce_price_slider_params.max_price ) current_max_price = parseInt( woocommerce_price_slider_params.max_price, 10 );
	$( 'body' ).on( 'price_slider_create price_slider_slide', function( event, min, max ) {
		var from, to;
		switch (woocommerce_price_slider_params.currency_pos) {
			case 'left':
				from = woocommerce_price_slider_params.currency_symbol + min;
				to = woocommerce_price_slider_params.currency_symbol + max;
				break;
			case 'left_space':
				from = woocommerce_price_slider_params.currency_symbol + ' ' + min;
				to = woocommerce_price_slider_params.currency_symbol + ' ' + max;
				break;
			case 'right':
				from = min + woocommerce_price_slider_params.currency_symbol;
				to = max + woocommerce_price_slider_params.currency_symbol;
				break;
			case 'right_space':
				from = min + ' ' + woocommerce_price_slider_params.currency_symbol;
				to = max + ' ' + woocommerce_price_slider_params.currency_symbol;
				break;
		}

		$( '.price_slider_amount span.from' ).html( from );
		$( '.price_slider_amount span.to' ).html( to );

		$( 'body' ).trigger( 'price_slider_updated', min, max );
	});

	$( '.price_slider' ).slider({
		range: true,
		animate: true,
		min: min_price,
		max: max_price,
		values: [ current_min_price, current_max_price ],
		create : function( event, ui ) {

			$( '.price_slider_amount #min_price' ).val( current_min_price );
			$( '.price_slider_amount #max_price' ).val( current_max_price );

			$( 'body' ).trigger( 'price_slider_create', [ current_min_price, current_max_price ] );
		},
		slide: function( event, ui ) {

			$( 'input#min_price' ).val( ui.values[0] );
			$( 'input#max_price' ).val( ui.values[1] );

			$( 'body' ).trigger( 'price_slider_slide', [ ui.values[0], ui.values[1] ] );
		},
		change: function( event, ui ) {

			$( 'body' ).trigger( 'price_slider_change', [ ui.values[0], ui.values[1] ] );

		},
	});
};

/* shop */

if ( $("#ship-to-different-address-checkbox").length ) {
	$("#ship-to-different-address-checkbox").on('click', show_address)
	show_address()
}

function show_address () {
	if ( document.getElementById("ship-to-different-address-checkbox").checked ) {
		$(".shipping_address").show();
	} else {
		$(".shipping_address").hide();
	}
}

if ( $(".woocommerce-checkout").length ) {

	$(".input-radio").on('click', function(){
		$(".payment_box.payment_method_paypal").slideUp(400);
		$(".payment_box.payment_method_bacs").slideUp(400);
		$(".payment_box.payment_method_cheque").slideUp(400);
		switch (true) {
			case document.getElementById("payment_method_bacs").checked:
				$(".payment_box.payment_method_bacs").slideDown(400);
				break;
			case document.getElementById("payment_method_cheque").checked:
				$(".payment_box.payment_method_cheque").slideDown(400);
				break;
			case document.getElementById("payment_method_paypal").checked:
				$(".payment_box.payment_method_paypal").slideDown(400);
				break;
		}
	})
}

if ($(".contact-form").length) {
	/**/
	/* contact form */
	/**/

	/* validate the contact form fields */
	$(".contact-form").each(function(){

	$(this).validate(  /*feedback-form*/{
		onkeyup: false,
		onfocusout: false,
		errorElement: 'p',
		errorLabelContainer: $(this).parent().children(".alert.alert-danger").children(".message"),
		rules:
			{
				name:	{	required: true },
				email:{	required: true,	email: true	},
				message: { required: true	}
			},
			messages:
			{
				name:	{	required: 'Please enter your name',	},
				email:{	required: 'Please enter your email address',
				email: 'Please enter a VALID email address'	},
				message: { required: 'Please enter your message'	}
			},
			invalidHandler: function()
			{
				$(this).parent().children(".alert.alert-danger").slideDown('fast');
				$("#feedback-form-success").slideUp('fast');
			},
			submitHandler: function(form)
			{
				$(form).parent().children(".alert.alert-danger").slideUp('fast');
				var $form = $(form).ajaxSubmit();
				submit_handler($form, $(form).parent().children(".email_server_responce") );
			}
		});
	})

	/* Ajax, Server response */
	var submit_handler =  function (form, wrapper){

		var $wrapper = $(wrapper); //this class should be set in HTML code

		$wrapper.css("display","block");
		var data = {
			action: "email_server_responce",
			values: $(form).serialize()
		};
		//send data to server
		$.post("php/contacts-process.php", data, function(s_response) {
			s_response = $.parseJSON(s_response);
			if(s_response.info == 'success'){
				$wrapper.addClass("message message-success").append('<div role="alert" class="alert alert-success alt alert-dismissible fade in"><button type="button" data-dismiss="alert" aria-label="Close" class="close"></button><i class="alert-icon flaticon-suntour-check"></i><strong>Success!</strong><br>Your message was successfully delivered.</div>');
				$wrapper.delay(5000).slideUp(300, function(){
					$(this).removeClass("message message-success").text("").fadeOut(500);
					$wrapper.css("display","none");
				});
				$(form)[0].reset();
			} else {
				$wrapper.addClass("message message-error").append('<div role="alert" class="alert alert-warning alt alert-dismissible fade in"><button type="button" data-dismiss="alert" aria-label="Close" class="close"></button><i class="alert-icon flaticon-warning"></i><strong>Error!</strong><br>Server fail! Please try again later!</div>');
				$wrapper.delay(5000).hide(500, function(){
					$(this).removeClass("message message-success").text("").fadeIn(500);
					$wrapper.css("display","none");
				});
			}
		});
		return false;
	}

	$('form.form.contact-form').on("click", function() {
	$(this).find('p.error').remove();
	})
}

/**/
/* mobile menu */
/**/
function mobile_menu_controller_init() {

	window.mobile_nav = {
	"is_mobile_menu" : false,
	"nav_obj" : jQuery("header .inner-nav>ul").clone(),
	"level" : 1,
	"current_id" : false,
	"next_id" : false,
	"prev_id" : "",
	"animation_params" : {
		"vertical_start" : 100,
		"vertical_end" : 0,
		"horizontal_start" : 0,
		"horizontal_end" : 200,
		"speed" : 300
		}
	}
	mobile_menu_controller();
	jQuery(window).resize( function() {
		mobile_menu_controller();
	});
	mobile_nav_switcher_init ();
}

function mobile_nav_switcher_init() {

	var nav_container = jQuery("nav .inner-nav");

	jQuery(document).on("click", "header nav .inner-nav.mobile_nav .mobile_menu_switcher", function() {
		var nav = get_current_nav_level();
		var cls = "opened";
		if ( nav_container.hasClass(cls) ){
			nav.stop().animate( {"margin-top": window.mobile_nav.animation_params.vertical_start + "px","opacity":0}, window.mobile_nav.animation_params.speed, function() {
				nav_container.removeClass(cls);
			})
		} else {
			nav_container.addClass(cls);
			nav.stop().animate( {"margin-top": window.mobile_nav.animation_params.vertical_end + "px","opacity":1}, window.mobile_nav.animation_params.speed );
		}
	});
}

function mobile_nav_handlers_init() {

	jQuery("header nav .inner-nav.mobile_nav .button_open").on( "click", function (e){
		var el = jQuery(this);
		var next_id = el.closest("li").attr("id");
		var current_nav_level = get_current_nav_level();
		var next_nav_level = get_next_nav_level( next_id );
		current_nav_level.animate( { "right": window.mobile_nav.animation_params.horizontal_end + "px", "opacity" : 0 }, window.mobile_nav.animation_params.speed, function() {
			current_nav_level.remove();
			jQuery("header nav .inner-nav").append(next_nav_level);
			next_nav_level.css( { "margin-top": window.mobile_nav.animation_params.vertical_end + "px", "right": "-" + window.mobile_nav.animation_params.horizontal_end + "px", "opacity" : 0} );
			next_nav_level.animate( { "right": window.mobile_nav.animation_params.horizontal_start + "px", "opacity" : 1 }, window.mobile_nav.animation_params.speed );
			window.mobile_nav.current_id = next_id;
			window.mobile_nav.level ++;
			mobile_nav_handlers_init ();
		});
	});

	jQuery("header nav .inner-nav.mobile_nav .back>a").on("click", function() {
		var current_nav_level = get_current_nav_level();
		var next_nav_level = get_prev_nav_level();
		current_nav_level.animate( { "right": "-" + window.mobile_nav.animation_params.horizontal_end + "px", "opacity" : 0 }, window.mobile_nav.animation_params.speed, function() {
			current_nav_level.remove();
			jQuery("header nav .inner-nav").append(next_nav_level);
			next_nav_level.css( { "margin-top": window.mobile_nav.animation_params.vertical_end + "px", "right": window.mobile_nav.animation_params.horizontal_end + "px", "opacity" : 0} );
			next_nav_level.animate( { "right": window.mobile_nav.animation_params.horizontal_start + "px", "opacity" : 1 }, window.mobile_nav.animation_params.speed );
			window.mobile_nav.level --;
			mobile_nav_handlers_init ();
		});
		return false;
	});
}

function get_current_nav_level() {
	var r = window.mobile_nav.level < 2 ? jQuery( "header nav .inner-nav>ul" ) : jQuery( "header nav .inner-nav ul" );
	r.find("ul").remove();
	return r;
}

function get_next_nav_level( next_id ) {
	var r = window.mobile_nav.nav_obj.find( "#" + next_id ).children("ul").first().clone();
	r.find("ul").remove();
	return r;
}

function get_prev_nav_level() {
	var r = {};

	if ( window.mobile_nav.level > 2 ){
		r = window.mobile_nav.nav_obj.find( "#" + window.mobile_nav.current_id ).parent("ul").parent("li");
		window.mobile_nav.current_id = r.attr("id");
		r = r.children("ul").first();
	} else{
		r = window.mobile_nav.nav_obj;
		window.mobile_nav.current_id = false;
	}
	r = r.clone();
	r.find("ul").remove();
	return r;
}

function mobile_menu_controller() {
	var is_mob = is_mobile();
	if ( is_mob && !window.mobile_nav.is_mobile_menu ){
		set_mobile_menu();
	} else if ( !is_mob && window.mobile_nav.is_mobile_menu ){
		reset_mobile_menu ();
	}
}

function set_mobile_menu() {
	var nav = get_current_nav_level();
	$("header nav .inner-nav").addClass("mobile_nav");
	$("header .sticky-menu").addClass("mobile");
	$("header .inner-nav").removeClass("scrolling, desktop-nav");
	nav.css( { "margin-top":window.mobile_nav.animation_params.vertical_start+"px" } );
	window.mobile_nav.is_mobile_menu = true;
	mobile_nav_handlers_init ();
}

function reset_mobile_menu() {
	var nav = get_current_nav_level();
	$("header nav .inner-nav").removeClass("mobile_nav opened").addClass('desktop-nav');
	$("header .sticky-menu").removeClass("mobile");
	nav.removeAttr("style");
	window.mobile_nav.is_mobile_menu = false;
	nav.remove();
	reset_mobile_nav_params();
}

function reset_mobile_nav_params() {
	jQuery("header nav .inner-nav").append(window.mobile_nav.nav_obj.clone());
	window.mobile_nav.level = 1;
	window.mobile_nav.current_id = false;
	window.mobile_nav.next_id = false;
}

function is_mobile() {
	return ( ( $(window).width()<992) || (navigator.userAgent.match(/(Android|iPhone|iPod|iPad)/) ) );
}

function add_button_menu() {
	var v = $('header nav .inner-nav>ul').find("li");
	for (var p=0;p<$('header nav .inner-nav>ul').find("li").length;p++) {
		$(v[p]).attr('id','menu-item-'+p);
	}
	$('header nav .inner-nav').append("<i class='mobile_menu_switcher'></i>");

	$('header nav .inner-nav>ul ul').each(function(){
		var x = document.createElement('li');
		$(x).attr("class","back");
		x.innerHTML = "<a href='#'>Back</a>";
		this.insertBefore( x, this.firstElementChild );
	});

	$('header nav .inner-nav li').each(function(){
		if ( $(this).children("ul").length > 0 ) {
			$(this).append("<span class='button_open'></span>");
		};
	});
};
/* \mobile menu */

function cws_page_focus() {
 document.getElementsByTagName('html')[0].setAttribute('data-focus-chek', 'focused');

 window.addEventListener('focus', function() {
	document.getElementsByTagName('html')[0].setAttribute('data-focus-chek', 'focused');
 });

 window.addEventListener('blur', function() {
	document.getElementsByTagName('html')[0].removeAttribute('data-focus-chek');
 });
};

/**/
/* scroll-top */
/**/
function scroll_top() {
	$('#scroll-top').on( 'click', function() {
		$('html, body').animate({scrollTop: 0});
		return false;
	});

	if( $(window).scrollTop() > 700 ) {
		$('#scroll-top').fadeIn();
	} else {
		$('#scroll-top').fadeOut();
	}

	$(window).scroll(function() {
		if( $(window).scrollTop() > 700 ) {
			$('#scroll-top').fadeIn();
		} else {
			$('#scroll-top').fadeOut();
		}
	});

};

// Grid or List function
function gridList_init(){

	$("#list-grid>div").on("click", function () {

		$(this).addClass("active").siblings().removeClass("active");
		if ($(this).hasClass("grid-view")) {
			if ($(".list-grid-view .products").hasClass("grid-view")) {
				return false;
			} else {
				$(".list-grid-view .products").fadeOut(300,function() {
					$(".list-grid-view .products").addClass("grid-view").removeClass("list-view").fadeIn(300);
				});
			}
		}

		if ($(this).hasClass("list-view")){
			if ($(".list-grid-view .products").hasClass("list-view")) {
				return false;
			} else {
				$(".list-grid-view .products").fadeOut(300,function(){
					$(".list-grid-view .products").addClass("list-view").removeClass("grid-view").fadeIn(300);
				});
			}
		}
	});
};

// login popup
function popup_login_init(){
	$(".top-login").on("click", function() {
		$(".login-popup").addClass("open");
	})

	$(".login-popup .close-button").on("click", function() {
		$(".login-popup").removeClass("open");
	})
};

// Magic line

function magicline_init(){

	var $el, leftPos, newWidth;

	if ( !$('.inner-nav').hasClass('mobile_nav')) {

		$("header .inner-nav > ul").addClass("magic-line-main");
		$("header .magic-line-main").append("<li class='magic-line-main-li'></li>");

		if ($("header .inner-nav > ul > li > a").hasClass("active")) {
			$("header .inner-nav > ul > li > a.active").parent("li").addClass("active-li");
		}

		var $magicLine = $(".magic-line-main-li");

		$magicLine
			.width($(".active-li").width())
			.css("left", $(".active-li").position().left)
			.data("origLeft", $magicLine.position().left)
			.data("origWidth", $magicLine.width());

		$(".magic-line-main > li:not(.slash)").on({
			mouseenter: function() {
				$el = $(this);
				leftPos = $el.position().left;
				newWidth = $el.width();
				$magicLine.stop().animate({
					left: leftPos,
					width: newWidth
				});
			},
			mouseleave: function() {
				$magicLine.stop().animate({
					left: $magicLine.data("origLeft"),
					width: $magicLine.data("origWidth")
				});
			}
		});
	}

}

// Magic line main

function magicline_main_init(){

	if($('.menu-widget').length) {

		$(".magic-line").append("<li id='magic-line'></li>");

			var recall_magicline_main = function() {

			var $el, leftPos, newWidth;

			var $magicLine = $("#magic-line");

			$magicLine
				.width($(".current_item").width())
				.css("left", $(".current_item a").position().left)
				.data("origLeft", $magicLine.position().left)
				.data("origWidth", $magicLine.width());

			$(".magic-line li").find("a").on({
				mouseenter: function() {
					$el = $(this);
					leftPos = $el.position().left;
					newWidth = $el.parent().width();

					$magicLine.stop().animate({
						left: leftPos,
						width: newWidth
					});
				},
				mouseleave: function() {
					$magicLine.stop().animate({
						left: $magicLine.data("origLeft"),
						width: $magicLine.data("origWidth")
					});
				}
			});
		}

		recall_magicline_main();

		if ($('.menu-widget').hasClass('with-switch')) {

			$('.menu-widget ul li').on('click', function (e){
				e.preventDefault();
				$(this).siblings().removeClass('current_item');
				$(this).addClass('current_item');
				recall_magicline_main();
			})
		}
	}

}

// footer fixed
function footer_height(){

	var fh = $('.footer').outerHeight();

	if ( ( $(window).width()>992) && $('.footer').hasClass('footer-fixed')){
		$('.footer.footer-fixed').addClass('fixed');
		$('body').css('margin-bottom',' ' + fh + 'px');
	} else{
		$('body').css('margin-bottom','0px');
		$('.footer.footer-fixed').removeClass('fixed');
	}

	var fh2 = fh * 1.5

	if ( ( $(window).height()<fh2) ){
		$('body').css('margin-bottom','0px');
		$('.footer.footer-fixed').removeClass('fixed');
	}
};

// search tours form
function search_form_height() {
	var contH = $('.search-tours-wrap .tours-container.active').outerHeight();
	$('.search-tours-content').css({'height': +contH+'px'});
}


function search_form_click() {

	$('.tours-tab-btn').each(function(){

		$(this).on('click', function() {

			$(this).siblings().removeClass('active');
			$(this).addClass('active');

			var idBtn = ($(this).attr("data-tours-cat"));
			var containerList = $(this).parents(".search-tours-wrap").find(".tours-container");
			var f = $(".search-tours-wrap [data-tours-cat="+idBtn+"]");

			$(f).addClass("active").siblings(".tours-container").removeClass('active');
			$(containerList).fadeOut( 0 );
			$(f).fadeIn( 600 );
			$(this).addClass("active").siblings(".tours-tab-btn").removeClass('active');

			var contH = $('.search-tours-wrap .tours-container.active').outerHeight();
			$('.search-tours-content').css({'height': +contH+'px'});
		})

	});

	$(document).on('click', '.tours-calendar span', function() {
		$(this).siblings('.calendar-widget').toggleClass('active').fadeToggle('fast');
		if($(this).parent().siblings('.tours-calendar').find('.calendar-widget').hasClass("active")) {
			$(this).parent().siblings('.tours-calendar').find('.calendar-widget').removeClass('active').css("display","none");
		}
	});

}

// search tours form resize function
function search_tours_form_resize() {
	if ($(window).width() <= 991) {
		$(".search-tours-form").addClass("mob-search-form");
		$(".search-tours-form .search-tours-wrap").parent().removeClass("container");
	} else {
		$(".search-tours-form").removeClass("mob-search-form");
		$(".search-tours-form .search-tours-wrap").parent().addClass("container");
	}
}

// slider info mobile function
function slider_info_mob(){
	if ($(window).width() <= 980) {
		$('.slider-info-item').addClass('mobile-on');
	} else {
		$('.slider-info-item').removeClass('mobile-on').removeClass('active');
	}
}

$('.slider-info-item').each(function(){
	$(this).on('click', function() {
		if ($('.slider-info-item').hasClass('mobile-on')){
			$(this).toggleClass("active").siblings(".slider-info-item").removeClass('active');
		}
	})
});

// scrollto function init
function scrollTo_init(){

	var elementClick,	destination;

	$("a.scrollto").on('click', function () {
		elementClick = jQuery(this).attr("href");
		destination = jQuery(elementClick).offset().top;
		$("html:not(:animated),body:not(:animated)").animate({scrollTop: destination}, 500);
		return false;
	});
};

// flexslider init
function flexslider_init(){

	$('#flex-carousel').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		itemWidth: 130,
		itemMargin: 5,
		asNavFor: '#flex-slider'
	});

	$('#flex-slider').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		sync: "#flex-carousel"
	});
}
