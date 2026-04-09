jQuery(function () {

	// スクロールでヘッダー背景を変更（TOPのみ）

	if ($('.pc-header' && '.scroll-change-headerbg').length) {
		$(function () {
			$(".header-logo a img").each(function () {
				if (String($(this).attr("src")).match(/-white\.(.*)$/)) {
					var img = new Image();
					img.src = String($(this).attr("src")).replace(/-normal\.(.*)$/, "-white.$1");
				}
			});
			var px_change = 100;
			window.addEventListener('scroll', function (e) {
				if ($(window).scrollTop() > px_change) {
					$(".site-header").addClass("bg-normal");
					$(".header-logo a img").attr('src', $(".header-logo a img").attr('src').replace('-white', '-normal'));
				} else if ($(".site-header").hasClass("bg-normal")) {
					$(".site-header").removeClass("bg-normal");
					$(".header-logo a img").attr('src', $(".header-logo a img").attr('src').replace('-normal', '-white'));
				}
			});
		});
	}

	// slick slider
	$(function () {
		$(window).on('load', function () {
			$('.slick-slider').not('.slick-initialized').slick({
				accessibility: true,
				autoplay: true,
				pauseOnHover: false,
				autoplaySpeed: 6000,
				speed: 3000,
				fade: true,
				infinite: true,
				dots: true,
				slidesToShow: 1,
				slidesToScroll: 1,
				responsive: [{
					breakpoint: 767,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
					}
				}]
			});
		});
	});

	// スクロールしてgnavをヘッダー直下で停止

	$(function () {
		$(window).on('load', function () {
			if ($('.gnav-wrap').length) {
				var nav = $('.gnav-wrap');
				var promo = $('.promo-wrap');
				var header = $('.header-wrap').outerHeight();
				offset = nav.offset();
				$(window).scroll(function () {
					if ($(window).scrollTop() > offset.top - header) {
						nav.addClass('fixed');
						promo.addClass('fixed');
					} else {
						nav.removeClass('fixed');
						promo.removeClass('fixed');
					}
				});
			};
		});
	});

	$(function () {
		$(window).on('load', function () {
			if ($('.scroll-change-header').length) {
				var promo = $('.promo-wrap');
				promo.addClass('scroll-header');
			};
		});
	});

	// fade
	if (!navigator.userAgent.match(/(iPhone|iPad|iPod|Android)/)) {
		$(function () {
			$(window).bind('load', function () {
				var sct = $(document).scrollTop();
				var hei = $(window).height();
				function anime() {
					sct = $(document).scrollTop();
					hei = $(window).height();
					$(".fade").each(function () {
						if ($(this).offset().top + 200 < sct + hei) {
							$(this).animate({ opacity: "1", top: 0 }, 1000);
						};
					});
				}
				//スクロールした時
				$(window).scroll(function () {
					anime();
				});
				//リサイズした時
				$(window).resize(function () {
					anime();
				});
				anime();
			});
		});
	};


});
