(function ($) {
	
	//add span to the last word in button
	$('.text-link .elementor-button, .text-link.more-btn, .arrow-btn .elementor-button').html(function(){	
		var text= $(this).text().split(' ');
		var last = (text.pop()).trim();
		return text.join(" ") + ' <span class="last">'+last+'</span>';   
	});


	$(document).ready(function () {
		if (document.documentMode || /Edge/.test(navigator.userAgent)) {
			$('body').addClass('ie_edge');
		}
		generate_select('select:not(.gfield_select)');
		document.activeElement.blur();
		$(document).on('gform_post_render', function (event, form_id, current_page) {
			generate_select('#gform_wrapper_' + form_id + ' select.gfield_select');
			$("li.gf_readonly input").attr("readonly", "readonly");
		});
		//smoothscroll
		$('a[href^= "#"]:not(.main-menu-nav .menu li a, .galler-tab-nav .elementor-icon-list-item a, .galler-tab-navigation .elementor-icon-list-item a, .res-popup, .dialog-widget  ):not(a[href="#"])').on('click', function (x) {
			x.stopImmediatePropagation();
			x.preventDefault();
			$(document).off("scroll");
			var id = $(this).attr('href');
			var $id = $(id);
			if ($id.length === 0) {
				return;
			}
			x.preventDefault();
			var pos = $id.offset().top - adminbar;
			$('body, html').animate({ scrollTop: pos });
		});

		

	});

	$(document).ready(function() {
	$(".elementor-accordion-item").on("click", function (x) {
		if (window.matchMedia("(max-width: 900px)").matches) {
			const item = $(this);
			setTimeout(function () {
				const position = item.offset().top;
				$("body, html").animate({ scrollTop: position - adminbar - $("[data-elementor-type='header']").height() - 10 });
			}, 500);
		}
	});
	/*Mobile Header*/
	$('.menu-open-btn').on('click', function () {
		$('.mobile-header-wrapper').slideToggle();
		$('body').toggleClass('overflowbody mobile-menus-open');
		// $('.header-wrapper .header-menu-wrapper .header-menu-colum').addClass('activemenu');
	});
		var $opensubmenu = $("<div class='open-submenu-arrow'></div>");
		$('.mobile-menus ul.menu > li.menu-item-has-children').prepend($opensubmenu);

		var $openchild_submenu = $("<div class='open-chilssubmenu-arrow'></div>");
		$('.mobile-menus ul.menu > li > .sub-menu > li.menu-item-has-children').prepend($openchild_submenu);



		$('.open-submenu-arrow').on('click', function () {
			$(this).siblings(".sub-menu").slideToggle().closest('li.menu-item-has-children').toggleClass('is-active').siblings().removeClass("is-active").find(".sub-menu").slideUp();
			$('.mobile-menus ul.menu > li > .sub-menu > li.menu-item-has-children').removeClass('is-active')
		});

		$('.open-chilssubmenu-arrow').on('click', function () {
			$(this).siblings(".sub-menu").slideToggle().closest('.mobile-menus ul.menu > li > .sub-menu > li.menu-item-has-children').toggleClass('is-active').siblings().removeClass("is-active").find(".sub-menu").slideUp()
		});

		$(".galler-tab-nav .elementor-icon-list-item").first().addClass("active");
		$(".tabs-sect:not(.elementor-element-edit-mode)").hide();
		$(".tabs-sect").first().show();

		$(".galler-tab-nav .elementor-icon-list-item ").click(function (e) {
			e.preventDefault();
			$(".galler-tab-nav .elementor-icon-list-item").removeClass("active");
			$(this).addClass("active");
			$(".tabs-sect:not(.elementor-element-edit-mode)").hide();
			var activeTab = $(this).find("a").attr("href");
			$(activeTab).fadeIn();
			return false;
		});
		
		$.fn.matchHeight = function() {
			// Your plugin functionality here
			$('body .home-featured-prd-wrapper .elementor-widget-container .products > li').matchHeight();
			
		  };
		  var swiper = new Swiper(".mySwiper", {
			pagination: {
			  el: ".swiper-pagination",
			},
		  });
	});
	$(window).on("scroll load", function () {
		if ($(window).scrollTop() > 50) {
			$("body").addClass("active-header");
		} else {
			$("body").removeClass("active-header");
		}

		/**/
		var checknot_found_class = $('.post-single-left');
		if (checknot_found_class.hasClass('job-not-found')) {
		$('.job-posting-main-erapper').addClass('job-post-empty-content');
		}
	});

	var swiper = new Swiper(".hero-slider", {
		autoplay: {
			delay: 6000,
		},
		loop: true,
		navigation: {
		  nextEl: ".swiper-button-next",
		  prevEl: ".swiper-button-prev",
		},
	  });


	  function kovp_pagination() {

		// target container
		let container = '.facetwp-pager';

		// exist if facetwp not on the page
		if (!$(container).length) {
			return;
		}

		// range limit for mobile
		let mb_limit = 0;

		// end point range limit for mobile
		let mb_endpoints_limit = 1;

		// range limit for desktop
		let dk_limit = 1;

		// end point range limit for desktop
		let dk_endpoints_limit = 2;

		let mb_hide_class = 'kovp-hide-page-mb';
		let dk_hide_class = 'kovp-hide-page-dk';

		// dots markup
		let dots_start = '<a class="facetwp-page dots start ' + mb_hide_class + ' ' + dk_hide_class + '">…</a>';
		let dots_end = '<a class="facetwp-page dots end ' + mb_hide_class + ' ' + dk_hide_class + '">…</a>';

		// ----------------------------------------------------

		let total_pages = parseInt($(container + ' a.facetwp-page.last').attr('data-page'));
		let active_page = parseInt($(container + ' a.facetwp-page.active').attr('data-page'));

		// check if the current page is an endpoint
		let is_endpoint_page = (active_page === 1 || active_page === total_pages) ? true : false;

		let mb_range_start = is_endpoint_page ? active_page - mb_endpoints_limit : active_page - mb_limit;
		let mb_range_end = is_endpoint_page ? active_page + mb_endpoints_limit : active_page + mb_limit;

		let dk_range_start = is_endpoint_page ? active_page - dk_endpoints_limit : active_page - dk_limit;
		let dk_range_end = is_endpoint_page ? active_page + dk_endpoints_limit : active_page + dk_limit;

		let dots_mb_start, dots_mb_end, dots_dk_start, dots_dk_end = false;

		// ----------------------------------------------------

		$(container + ' .dots').remove();

		$(container + ' a.facetwp-page:not(.prev, .next)').removeClass(mb_hide_class + ' ' + dk_hide_class);

		// loop over all the page numbers, excluding 'previous' and 'next' elements
		$(container + ' a.facetwp-page:not(.active, .prev, .next, [data-page="1"], [data-page="' + total_pages + '"])').each(function (i, obj) {

			let current_page = $(this).attr('data-page');

			if (current_page < mb_range_start) {
				$(this).addClass(mb_hide_class);
				dots_mb_start = true;
			}

			if (current_page > mb_range_end) {
				$(this).addClass(mb_hide_class);
				dots_mb_end = true;
			}

			if (current_page < dk_range_start) {
				$(this).addClass(dk_hide_class);
				dots_dk_start = true;
			}

			if (current_page > dk_range_end) {
				$(this).addClass(dk_hide_class);
				dots_dk_end = true;
			}

		});

		// add dots element - start
		if (dots_mb_start || dots_dk_start) {

			$(container + ' a.facetwp-page[data-page="1"]').after(dots_start);

			if (dots_mb_start) {
				$(container + ' .dots.start').removeClass(mb_hide_class);
			}

			if (dots_dk_start) {
				$(container + ' .dots.start').removeClass(dk_hide_class);
			}

		}

		// add dots element - end
		if (dots_mb_end || dots_dk_end) {

			$(container + ' a.facetwp-page[data-page="' + total_pages + '"]').before(dots_end);

			if (dots_mb_end) {
				$(container + ' .dots.end').removeClass(mb_hide_class);
			}

			if (dots_dk_end) {
				$(container + ' .dots.end').removeClass(dk_hide_class);
			}

		}

		active_page = active_page ? active_page : 1;
		total_pages = total_pages ? total_pages : 1;

		$('.kovp-total-page-counter span.kovp-current-page').html(active_page);
		$('.kovp-total-page-counter span.kovp-total-page').html(total_pages);

	}

	  $(window).on('load resize', function () {
		kovp_pagination();
	  });
	  $(window).on('load', function () {
		
		if($('body section').hasClass('reserver-page') === true){
			$('.footer-reserver-btn').hide()
		}
	  });
	  document.addEventListener('facetwp-loaded', function () {
		if (FWP.loaded) {
			$('.facetwp-facet-post_pagination').show();
			kovp_pagination();
			if ($('.facetwp-scroll-top').length) {
				$('html,body').animate({
					scrollTop: $('.facetwp-scroll-top').offset().top - $('.elementor-location-header').height()
				});
			}
		}
	});

}(jQuery))

