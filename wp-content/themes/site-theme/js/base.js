jQuery(function() {


	// スマホとタブレットでviewportを切替え
	$(function(){
		var ua = navigator.userAgent;
		if((ua.indexOf('iPhone') > 0) || ua.indexOf('iPod') > 0 || (ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0)){
			$('head').prepend('<meta name="viewport" content="width=device-width,initial-scale=1">');
		} else {
			$('head').prepend('<meta name="viewport" content="width=1240">');
		}
	});

	// ブラウザの横幅が変わったときにリロード
	$(function(){
		var windowWidth = $(window).width();
		$(window).resize(function(){
			var ww = $(window).width();
			if(windowWidth != ww) {
				location.reload();
			}
		});
	});

	// スクロールでヘッダーを縮小
	$(function(){
		if($('.scroll-change-header').length){
			var px_change  = 100;
			window.addEventListener('scroll', function(e){
				if ( $(window).scrollTop() > px_change ) {
					$(".header-wrap").addClass("change-header");
				} else if ( $(".header-wrap").hasClass("change-header") ) {
					$(".header-wrap").removeClass("change-header");
				}
			});
		}
	});

	// スクロールでgnavを縮小
	$(function(){
		if($('.scroll-change-header').length){
			var px_change  = 100;
			window.addEventListener('scroll', function(e){
				if ( $(window).scrollTop() > px_change ) {
					$(".gnav-wrap").addClass("change-gnav");
				} else if ( $(".gnav-wrap").hasClass("change-gnav") ) {
					$(".gnav-wrap").removeClass("change-gnav");
				}
			});
		}
	});

	// 横並びの高さを合わせる
	$(window).on('load', function() {

		$('.eq-height').each(function(i, box) {
			var maxHeight = 0;
			$(box).find('.item-eq-height').each(function() {
				if ($(this).height() > maxHeight) maxHeight = $(this).height();
			});
			$(box).find('.item-eq-height').height(maxHeight);
		});

	});

	// GNAV,SIDE-NAVのカレント表示
	/*
	$(document).ready(function() {

		var gnDirNum = 1; // 監視階層指定

		var snDirNum = gnDirNum + 1;
		// GNAV
		var gnActiveUrl = location.pathname.split("/")[gnDirNum];
			gnavList = $(".gnav").find("a");
		gnavList.each(function(){
			if( $(this).attr("href").split("/")[gnDirNum] == gnActiveUrl ) {
				$(this).addClass("current");
			};
		});
		// SIDE-NAV
		var snActiveUrl = location.pathname.split("/")[snDirNum];
			snavList = $(".side-nav").find("a");
		snavList.each(function(){
			if( $(this).attr("href").split("/")[snDirNum] == snActiveUrl ) {
				$(this).addClass("current");
			};
		});
	});
	*/

$(document).ready(function() {
     var url = window.location.pathname;
        $('.gnav nav a[href="'+url+'"]').addClass('current');
});


	// accordion menu
	$(function(){
		$(".mod-ac-menu .ac-toggle").on("click", function() {
			$(this).toggleClass("open").next().slideToggle();
		});
	});

	// ページ内リンク
	$(function() {
		$(".scroll-btn").on('click', function () {
			var hwh = $('.header-wrap').outerHeight(),
				gwh = $('.gnav-wrap').outerHeight();
				headerHeight = hwh + gwh;
			var speed = 400; // ミリ秒で記述
			var href= $(this).attr("href");
			var target = $(href == "#" || href == "" ? 'html' : href);
			var position = target.offset().top-headerHeight;
			$('body,html').animate({scrollTop:position}, speed, 'swing');
			return false;
		});
	});

	// ページ内リンク２
	$(function() {
		$(".scroll-btn2").on('click', function () {
			var speed = 400; // ミリ秒で記述
			var href= $(this).attr("href");
			var target = $(href == "#" || href == "" ? 'html' : href);
			var position = target.offset().top;
			$('body,html').animate({scrollTop:position}, speed, 'swing');
			return false;
		});
	});

	// 別ページアンカーリンク
	$(window).on('load', function() {
		var hwh = $('.header-wrap').outerHeight(),
			gwh = $('.gnav-wrap').outerHeight();
			headerHeight = hwh + gwh;
			url = $(location).attr('href');
		if(url.indexOf("?id=") != -1){
		var id = url.split("?id=");
		var $target = $('#' + id[id.length - 1]);
			if($target.length){
				var pos = $target.offset().top-headerHeight;
				$("html, body").animate({scrollTop:pos}, 600);
			}
		}
	});

	// tab_switch
	$(function() {
		//クリックしたときのファンクションをまとめて指定
		$('.tab-menu li').click(function() {

			//.index()を使いクリックされたタブが何番目かを調べ、
			//indexという変数に代入します。
			var index = $('.tab-menu li').index(this);

			//コンテンツを一度すべて非表示にし、
			$('.tab-content-wrap .tab-content').css('display','none');

			//クリックされたタブと同じ順番のコンテンツを表示します。
			$('.tab-content-wrap .tab-content').eq(index).css('display','block');

			//一度タブについているクラスselectを消し、
			$('.tab-menu li').removeClass('select');

			//クリックされたタブのみにクラスselectをつけます。
			$(this).addClass('select')
		});
	});

	// PAGE TOP
	$(function() {
		var topBtn = $('.pagetop');
			topBtn.hide();
			//スクロールが100に達したらボタン表示
			$(window).scroll(function () {
				if ($(this).scrollTop() > 100) {
				topBtn.fadeIn();
				} else {
					topBtn.fadeOut();
				}
			});
			//スクロールしてトップ
			topBtn.click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 500);
			return false;
		});
	});

	// fade
	if(!navigator.userAgent.match(/(iPhone|iPad|iPod|Android)/)){
		$(function(){
			$('.fadeup').css('visibility','hidden');
			$(window).scroll(function(){
				var windowHeight = $(window).height(),
				topWindow = $(window).scrollTop();
				$('.fadeup').each(function(){
					var targetPosition = $(this).offset().top;
					if(topWindow > targetPosition - windowHeight + 100){
						$(this).addClass("fadeInDown");
					}
				});
			});
		});
	};

});

