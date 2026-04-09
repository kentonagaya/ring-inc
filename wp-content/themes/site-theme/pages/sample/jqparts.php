<?php
/**
 * page template
 *
 * @since site theme X 10.0
 */

	// ページタイトル表示用ディレクトリ名
	define('DIR_NAME',		'パーツ一覧');
	define('PAGE_SUBTITLE',	'PARTS');

	// サイドバー（不要の場合は値を空白）
	$sidebar_position	= '';

	// ヘッダーを読み込み
	get_header();
?>

		<main class="l-main">

			<section class="l-section">
				<div class="l-contents">

					<div class="l-block">
						<div class="p-headline">
							<h2 class="p-headline__ttl">
								<span class="p-headline__ttl--main t-font_1">jQuery PARTS</span>
								<span class="p-headline__ttl--sub">jQueryパーツ一覧</span>
							</h2>
						</div>
					</div>

					<div class="l-block">
						<div class="l-clm_3 -sp_clear -thingap">
							<div class="l-clm__item"><a href="#slider_normal" class="c-btn -bc_ghost -max">通常スライダー</a></div>
							<div class="l-clm__item"><a href="#slider_centerexpand" class="c-btn -bc_ghost -max">中央拡大スライダー</a></div>
							<div class="l-clm__item"><a href="#slider_loop" class="c-btn -bc_ghost -max">無限ループ</a></div>
							<div class="l-clm__item"><a href="#slider_loop_reverse" class="c-btn -bc_ghost -max">無限ループ（反転）</a></div>
							<div class="l-clm__item"><a href="#colorbox_single" class="c-btn -bc_ghost -max">カラーボックス（シングル）</a></div>
							<div class="l-clm__item"><a href="#colorbox_gallery" class="c-btn -bc_ghost -max">カラーボックス（ギャラリー）</a></div>
							<div class="l-clm__item"><a href="#jq_accordion" class="c-btn -bc_ghost -max">アコーディオンメニュー</a></div>
							<div class="l-clm__item"><a href="#jq_tabswitch" class="c-btn -bc_ghost -max">タブ切り替えメニュー</a></div>
							<div class="l-clm__item"><a href="#js_slide" class="c-btn -bc_ghost -max">スクロールで左右スライド</a></div>
							<div class="l-clm__item"><a href="#js_fadeup" class="c-btn -bc_ghost -max">スクロールで下からスライド</a></div>
							<div class="l-clm__item"><a href="#js_fadeup_order" class="c-btn -bc_ghost -max">横並び要素を順番にフェードアップ</a></div>
							<div class="l-clm__item"><a href="#js_eqheight" class="c-btn -bc_ghost -max">アイテムの高さを合わせる</a></div>
							<div class="l-clm__item"><a href="#js_modal" class="c-btn -bc_ghost -max">モーダルウィンドウ</a></div>
						</div>
					</div>


				</div>
			</section>

<script>
jQuery(function($){

	$('pre').on('click', function (e) {
		e.preventDefault();
		select_all(this);
		var divJQ = $(this);
		var text = divJQ.text();
	});

	function select_all(el) {
		if (typeof window.getSelection != "undefined" && typeof document.createRange != "undefined") {
			var range = document.createRange();
			range.selectNodeContents(el);
			var sel = window.getSelection();
			sel.removeAllRanges();
			sel.addRange(range);
		} else if (typeof document.selection != "undefined" && typeof document.body.createTextRange != "undefined") {
			var textRange = document.body.createTextRange();
			textRange.moveToElementText(el);
			textRange.select();
		}
	}
});
</script>
			<section class="l-section u-pt0">
				<div class="l-contents">

					<div class="l-block" id="slider_normal">
						<h2 class="u-h2">.p-slider_normal : 通常スライダー</h2>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="p-slider_normal">
<script>
	jQuery(function($){
		$('.normal_slider').not('.slick-initialized').slick({
			infinite: true,
			dots:true,
			arrows:true,
			slidesToShow: 3,
			slidesToScroll: 3,
			esponsive: [{
				breakpoint: 768,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
				}
			},{
				breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
					}
				}
			]
		});
	});
</script>
	<div class="normal_slider">
		<div class="p-slider_normal__item">
			<div class="u-afix_1">
				<div class="u-afix__item u-bg_cover" style="background-image: url('<?=HOME?>dist/img/dummy.jpg');"></div>
			</div>
		</div>
		<div class="p-slider_normal__item">
			<div class="u-afix_1">
				<div class="u-afix__item u-bg_cover" style="background-image: url('<?=HOME?>dist/img/dummy.jpg');"></div>
			</div>
		</div>
	</div>
</div>
</code></pre>
<!--##### CODE AREA #####-->
						<div class="p-slider_normal">
<script>
	jQuery(function($){
		$('.normal_slider').not('.slick-initialized').slick({
			infinite: true,
			dots:true,
			arrows:true,
			slidesToShow: 3,
			slidesToScroll: 3,
			responsive: [{
				breakpoint: 768,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
				}
			},{
				breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
					}
				}
			]
		});
	});
</script>
							<div class="normal_slider">
								<?php for( $i = 1 ; $i <= 5; $i++ ):?>
								<div class="p-slider_normal__item">
									<div class="u-afix_1">
										<div class="u-afix__item u-bg_cover" style="background-image: url('<?=HOME?>dist/img/dummy.jpg');"></div>
									</div>
								</div>
								<?php endfor;?>
							</div>
						</div>
					</div>

					<div class="l-block" id="slider_centerexpand">
						<h2 class="u-h2">.p-slider_centerexpand :中央が拡大するスライダー</h2>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="p-slider_centerexpand">
<script>
	jQuery(function($){
		$('.centerexpand_slider').not('.slick-initialized').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			dots: true,
			centerMode: true,
			infinite: true,
			autoplay: true,
			centerPadding: '50px',
			arrows: true,
			responsive: [
				{
					breakpoint: 480,
					settings: {
						arrows: true,
						centerMode: true,
						centerPadding: '20px',
						slidesToShow: 1
					}
				}
			]
		});
	});
</script>
	<div class="centerexpand_slider">
		<div class="p-slider_centerexpand__item">
			<img src="<?=HOME?>dist/img/dummy.jpg" alt="">
		</div>
		<div class="p-slider_centerexpand__item">
			<img src="<?=HOME?>dist/img/dummy.jpg" alt="">
		</div>
		<div class="p-slider_centerexpand__item">
			<img src="<?=HOME?>dist/img/dummy.jpg" alt="">
		</div>
	</div>
</div>
</code></pre>
<!--##### CODE AREA #####-->
						<div class="p-slider_centerexpand">
<script>
	jQuery(function($){
		$('.centerexpand_slider').not('.slick-initialized').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			dots: true,
			centerMode: true,
			infinite: true,
			autoplay: true,
			centerPadding: '50px',
			arrows: true,
			responsive: [
				{
					breakpoint: 480,
					settings: {
						arrows: true,
						centerMode: true,
						centerPadding: '20px',
						slidesToShow: 1
					}
				}
			]
		});
	});
</script>
							<div class="centerexpand_slider">
								<?php for( $i = 1 ; $i <= 5; $i++ ):?>
								<div class="p-slider_centerexpand__item">
									<img src="<?=HOME?>dist/img/dummy.jpg" alt="">
								</div>
								<?php endfor;?>
							</div>
						</div>
					</div>

					<div class="l-block" id="slider_loop">
						<h2 class="u-h2">.p-slider_loop : 無限ループ</h2>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="p-slider_loop">
<script>
	jQuery(function($){
		$('.loop_slider').not('.slick-initialized').slick({
			arrows: false,
			dots: false,
			infinite: true,
			slidesToShow: 4,
			slidesToScroll: 1,
			adaptiveHeight: true,
			autoplay: true,
			speed: 10000,
			autoplaySpeed: 0,
			cssEase: 'linear',
			accessibility: false,
			pauseOnHover: false,
		});
	});
</script>
	<div class="loop_slider">
		<div class="p-slider_loop__item">
			<div class="u-afix_1">
				<div class="u-afix__item u-bg_cover" style="background-image: url('<?=HOME?>dist/img/dummy.jpg');"></div>
			</div>
		</div>
		<div class="p-slider_loop__item">
			<div class="u-afix_1">
				<div class="u-afix__item u-bg_cover" style="background-image: url('<?=HOME?>dist/img/dummy.jpg');"></div>
			</div>
		</div>
		<div class="p-slider_loop__item">
			<div class="u-afix_1">
				<div class="u-afix__item u-bg_cover" style="background-image: url('<?=HOME?>dist/img/dummy.jpg');"></div>
			</div>
		</div>
	</div>
</div>
</code></pre>
<!--##### CODE AREA #####-->
						<div class="p-slider_loop">
<script>
	jQuery(function($){
		$('.loop_slider').not('.slick-initialized').slick({
			arrows: false,
			dots: false,
			infinite: true,
			slidesToShow: 4,
			slidesToScroll: 1,
			adaptiveHeight: true,
			autoplay: true,
			speed: 10000,
			autoplaySpeed: 0,
			cssEase: 'linear',
			accessibility: false,
			pauseOnHover: false,
		});
	});
</script>
							<div class="loop_slider">
								<?php for( $i = 1 ; $i <= 5; $i++ ):?>
								<div class="p-slider_loop__item">
									<div class="u-afix_1">
										<div class="u-afix__item u-bg_cover" style="background-image: url('<?=HOME?>dist/img/dummy.jpg');"></div>
									</div>
								</div>
								<?php endfor;?>
							</div>
						</div>
					</div>

					<div class="l-block" id="slider_loop_reverse">
						<h2 class="u-h2">.p-slider_loop_reverse : 無限ループ（反転）</h2>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="p-slider_loop_reverse">
<script>
	jQuery(function($){
		$('.loop_slider_reverse').not('.slick-initialized').slick({
			arrows: false,
			dots: false,
			infinite: true,
			slidesToShow: 4,
			slidesToScroll: 1,
			adaptiveHeight: true,
			autoplay: true,
			speed: 15000,
			autoplaySpeed: 0,
			cssEase: 'linear',
			accessibility: false,
			pauseOnHover: false,
			rtl: true
		});
	});
</script>
	<div class="loop_slider_reverse" dir="rtl">
		<div class="p-slider_loop__item">
			<div class="u-_1">
				<div class="u-afix__item u-bg_cover" style="background-image: url('<?=HOME?>dist/img/dummy.jpg');"></div>
			</div>
		</div>
		<div class="p-slider_loop__item">
			<div class="u-afix_1">
				<div class="u-afix__item u-bg_cover" style="background-image: url('<?=HOME?>dist/img/dummy.jpg');"></div>
			</div>
		</div>
		<div class="p-slider_loop__item">
			<div class="u-afix_1">
				<div class="u-afix__item u-bg_cover" style="background-image: url('<?=HOME?>dist/img/dummy.jpg');"></div>
			</div>
		</div>
	</div>
</div>
</code></pre>
<!--##### CODE AREA #####-->
						<div class="p-slider_loop_reverse">
<script>
	jQuery(function($){
		$('.loop_slider_reverse').not('.slick-initialized').slick({
			arrows: false,
			dots: false,
			infinite: true,
			slidesToShow: 4,
			slidesToScroll: 1,
			adaptiveHeight: true,
			autoplay: true,
			speed: 15000,
			autoplaySpeed: 0,
			cssEase: 'linear',
			accessibility: false,
			pauseOnHover: false,
			rtl: true
		});
	});
</script>
							<div class="loop_slider_reverse" dir="rtl">
								<?php for( $i = 1 ; $i <= 5; $i++ ):?>
								<div class="p-slider_loop__item">
									<div class="u-afix_1">
										<div class="u-afix__item u-bg_cover" style="background-image: url('<?=HOME?>dist/img/dummy.jpg');"></div>
									</div>
								</div>
								<?php endfor;?>
							</div>
						</div>
					</div>

					<div class="l-block" id="colorbox_single">
						<h2 class="u-h2">.p-colorbox : カラーボックス（シングル）</h2>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="p-colorbox">
<script>
	jQuery(function($){
		$(".single").colorbox({
			maxWidth:"90%",
			maxHeight:"90%",
			opacity: 0.7
		});
	});
</script>
	<div class="p-clm_3">
		<div class="p-clm__item">
			<figure><a href="<?=HOME?>dist/img/dummy.jpg" class="single"><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></a></figure>
		</div>
		<div class="p-clm__item">
			<figure><a href="<?=HOME?>dist/img/dummy.jpg" class="single"><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></a></figure>
		</div>
		<div class="p-clm__item">
			<figure><a href="<?=HOME?>dist/img/dummy.jpg" class="single"><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></a></figure>
		</div>
	</div>
</div>
</code></pre>
<!--##### CODE AREA #####-->
						<div class="p-colorbox">
<script>
	jQuery(function($){
		$(".single").colorbox({
			maxWidth:"90%",
			maxHeight:"90%",
			opacity: 0.7
		});
	});
</script>
							<div class="p-clm_3">
							<?php for( $i = 1 ; $i <= 3; $i++ ):?>
								<div class="p-clm__item">
									<figure><a href="<?=HOME?>dist/img/dummy.jpg" class="single"><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></a></figure>
								</div>
							<?php endfor;?>
							</div>
						</div>
					</div>

					<div class="l-block" id="colorbox_gallery">
						<h2 class="u-h2">.p-colorbox : カラーボックス（ギャラリー）</h2>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="p-colorbox">
<script>
	jQuery(function($){
		$(".gallery").colorbox({
			rel:'gallery',
			maxWidth:"90%",
			maxHeight:"90%",
			current:'{current} / {total}',
			opacity:1,
			transition:"fade"
		});
	});
</script>
	<div class="p-clm_3">
		<div class="p-clm__item">
			<figure><a href="<?=HOME?>dist/img/dummy.jpg" class="gallery"><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></a></figure>
		</div>
		<div class="p-clm__item">
			<figure><a href="<?=HOME?>dist/img/dummy.jpg" class="gallery"><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></a></figure>
		</div>
		<div class="p-clm__item">
			<figure><a href="<?=HOME?>dist/img/dummy.jpg" class="gallery"><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></a></figure>
		</div>
	</div>
</div>
</code></pre>
<!--##### CODE AREA #####-->
						<div class="p-colorbox">
<script>
	jQuery(function($){
		$(".gallery").colorbox({
			rel:'gallery',
			maxWidth:"90%",
			maxHeight:"90%",
			current:'{current} / {total}',
			opacity:1,
			transition:"fade"
		});
	});
</script>
							<div class="p-clm_3">
							<?php for( $i = 1 ; $i <= 3; $i++ ):?>
								<div class="p-clm__item">
									<figure><a href="<?=HOME?>dist/img/dummy.jpg" class="gallery"><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></a></figure>
								</div>
							<?php endfor;?>
							</div>
						</div>
					</div>

					<div class="l-block" id="jq_accordion">
						<h2 class="u-h2">.p-jq_accordion : アコーディオンメニュー</h2>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="p-jq_accordion">
	<h3 class="p-jq_accordion__toggle">クリックすると開閉</h3>
	<div class="p-jq_accordion__cont">
		<p>句読点入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。〓句読点入百拾文字、ここまで百二拾文字。この文章はダミ百三拾この文章はダミ百四拾自分に見ですの百五拾うど偶然へよく百六拾同時に嘉納さん百七拾係壇ああ見当に百八拾し人その主義私百九拾をについご盲従弐百。</p>
	</div>
</div>
</code></pre>
<!--##### CODE AREA #####-->
						<div class="p-jq_accordion">
							<h3 class="p-jq_accordion__toggle">クリックすると開閉</h3>
							<div class="p-jq_accordion__cont">
								<p>句読点入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。〓句読点入百拾文字、ここまで百二拾文字。この文章はダミ百三拾この文章はダミ百四拾自分に見ですの百五拾うど偶然へよく百六拾同時に嘉納さん百七拾係壇ああ見当に百八拾し人その主義私百九拾をについご盲従弐百。</p>
							</div>
						</div>
					</div>

					<div class="l-block" id="jq_tabswitch">
						<h2 class="u-h2">.p-jq_tabswitch : タブ切り替えメニュー</h2>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="p-jq_tabswitch">
	<div class="p-jq_tabswitch__menu">
		<div class="p-jq_tabswitch__item js-select">タブ1</div>
		<div class="p-jq_tabswitch__item">タブ2</div>
		<div class="p-jq_tabswitch__item">タブ3</div>
		<div class="p-jq_tabswitch__item">タブ4</div>
	</div>
	<div class="p-jq_tabswitch__contwrap">
		<div class="p-jq_tabswitch__cont">
			<p>親譲りの無鉄砲で小供の時から損ばかりしている。小学校に居る時分学校の二階から飛び降りて一週間ほど腰を抜かした事がある。</p>
		</div>
		<div class="p-jq_tabswitch__cont js-hide">
			<p>なぜそんな無闇をしたと聞く人があるかも知れぬ。別段深い理由でもない。</p>
		</div>
		<div class="p-jq_tabswitch__cont js-hide">
			<p>新築の二階から首を出していたら、同級生の一人が冗談に、いくら威張っても、そこから飛び降りる事は出来まい。</p>
		</div>
		<div class="p-jq_tabswitch__cont js-hide">
			<p>弱虫やーい。と囃したからである。小使に負ぶさって帰って来た時、おやじが大きな眼をして二階ぐらいから飛び降りて腰を抜かす奴があるかと云ったから、この次は抜かさずに飛んで見せますと答えた。</p>
		</div>
	</div>
</div>
</code></pre>
<!--##### CODE AREA #####-->
						<div class="p-jq_tabswitch">
							<div class="p-jq_tabswitch__menu">
								<div class="p-jq_tabswitch__item js-select">タブ1</div>
								<div class="p-jq_tabswitch__item">タブ2</div>
								<div class="p-jq_tabswitch__item">タブ3</div>
								<div class="p-jq_tabswitch__item">タブ4</div>
							</div>
							<div class="p-jq_tabswitch__contwrap">
								<div class="p-jq_tabswitch__cont">
									<p>親譲りの無鉄砲で小供の時から損ばかりしている。小学校に居る時分学校の二階から飛び降りて一週間ほど腰を抜かした事がある。</p>
								</div>
								<div class="p-jq_tabswitch__cont js-hide">
									<p>なぜそんな無闇をしたと聞く人があるかも知れぬ。別段深い理由でもない。</p>
								</div>
								<div class="p-jq_tabswitch__cont js-hide">
									<p>新築の二階から首を出していたら、同級生の一人が冗談に、いくら威張っても、そこから飛び降りる事は出来まい。</p>
								</div>
								<div class="p-jq_tabswitch__cont js-hide">
									<p>弱虫やーい。と囃したからである。小使に負ぶさって帰って来た時、おやじが大きな眼をして二階ぐらいから飛び降りて腰を抜かす奴があるかと云ったから、この次は抜かさずに飛んで見せますと答えた。</p>
								</div>
							</div>
						</div>
					</div>

					<div class="l-block" id="js_slide">
						<div class="u-box">
							<h2 class="u-h2">.js-slide_r : スクロールで右スライド表示</h2>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="u-afix_0 js-scroll_slide_r">
	<div class="u-afix__item u-bg_cover" style="background-image: url(<?=HOME?>dist/img/dummy.jpg);"></div>
</div>
</code></pre>
<!--##### CODE AREA #####-->
							<div class="u-afix_0 js-scroll_slide_r">
								<div class="u-afix__item u-bg_cover" style="background-image: url(<?=HOME?>dist/img/dummy.jpg);"></div>
							</div>
						</div>

						<div class="u-box">
							<h2 class="u-h2">.js-slide_l : スクロールで左スライド表示</h2>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="u-afix_0 js-scroll_slide_l">
	<div class="u-afix__item u-bg_cover" style="background-image: url(<?=HOME?>dist/img/dummy.jpg);"></div>
</div>
</code></pre>
<!--##### CODE AREA #####-->
							<div class="u-afix_0 js-scroll_slide_l">
								<div class="u-afix__item u-bg_cover" style="background-image: url(<?=HOME?>dist/img/dummy.jpg);"></div>
							</div>
						</div>

					</div>

					<div class="l-block" id="js_fadeup">
						<div class="p-clm_2">
							<div class="p-clm__item js-scroll_fadeup1">
								<h2 class="u-h2">.js-scroll_fadeup1 : スクロールで下から</h2>
								<div class="u-afix_3"><div class="u-afix__item u-bg_cover" style="background-image: url(<?=HOME?>dist/img/dummy.jpg);"></div></div>
							</div>
							<div class="p-clm__item js-scroll_fadeup2">
								<h2 class="u-h2">.js-scroll_fadeup2 : スクロールで下から（遅延）</h2>
								<div class="u-afix_3"><div class="u-afix__item u-bg_cover" style="background-image: url(<?=HOME?>dist/img/dummy.jpg);"></div></div>
							</div>
						</div>
					</div>

					<div class="l-block" id="js_fadeup_order">
						<h2 class="u-h2">.js-scroll_fadeup_order > .js-fadeup_child : 横並び要素を順番にフェードアップ</h2>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="l-clm_3 -sp_clear js-scroll_fadeup_order">
	<div class="l-clm__item js-fadeup_child"></div>
	<div class="l-clm__item js-fadeup_child"></div>
	<div class="l-clm__item js-fadeup_child"></div>
</div>
</code></pre>
<!--##### CODE AREA #####-->
						<div class="l-clm_3 -sp_clear js-scroll_fadeup_order">
							<div class="l-clm__item js-fadeup_child"><div class="u-afix_3"><div class="u-afix__item u-bg_cover" style="background-image: url(<?=HOME?>dist/img/dummy.jpg);"></div></div></div>
							<div class="l-clm__item js-fadeup_child"><div class="u-afix_3"><div class="u-afix__item u-bg_cover" style="background-image: url(<?=HOME?>dist/img/dummy.jpg);"></div></div></div>
							<div class="l-clm__item js-fadeup_child"><div class="u-afix_3"><div class="u-afix__item u-bg_cover" style="background-image: url(<?=HOME?>dist/img/dummy.jpg);"></div></div></div>
							<div class="l-clm__item js-fadeup_child"><div class="u-afix_3"><div class="u-afix__item u-bg_cover" style="background-image: url(<?=HOME?>dist/img/dummy.jpg);"></div></div></div>
							<div class="l-clm__item js-fadeup_child"><div class="u-afix_3"><div class="u-afix__item u-bg_cover" style="background-image: url(<?=HOME?>dist/img/dummy.jpg);"></div></div></div>
							<div class="l-clm__item js-fadeup_child"><div class="u-afix_3"><div class="u-afix__item u-bg_cover" style="background-image: url(<?=HOME?>dist/img/dummy.jpg);"></div></div></div>
						</div>
					</div>

					<div class="l-block" id="js_eqheight">
						<h2 class="u-h2">.js-eqheight : アイテムの高さを合わせる</h2>
						<div class="p-clm_3 js-eqheight js-eqheight2">
							<div class="p-clm__item">
								<div class="c-card">
									<div class="c-card__cont">
										<h3 class="u-h3 js-eqh2">見出しが１行</h3>
										<figure class="u-figure"><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
										<div class="js-eqh u-texts">
											<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。この文章はダミ百三拾この文章はダミ百四拾自分に見ですの百五拾うど偶然へよく百六拾同時に嘉納さん百七拾係壇ああ見当に百八拾し人その主義私百九拾をについご盲従弐百。</p>
										</div>
									</div>
								</div>
							</div>
							<div class="p-clm__item">
								<div class="c-card">
									<div class="c-card__cont">
										<h3 class="u-h3 js-eqh2">見出しが２行<br>ここに見出し</h3>
										<figure class="u-figure"><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
										<div class="js-eqh u-texts">
											<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾。</p>
										</div>
									</div>
								</div>
							</div>
							<div class="p-clm__item">
								<div class="c-card">
									<div class="c-card__cont">
										<h3 class="u-h3 js-eqh2">見出しが１行</h3>
										<figure class="u-figure"><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
										<div class="js-eqh u-texts">
											<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。この文章はダミ百三拾この文章はダミ百四拾自分に見ですの百五拾うど偶然へよく百六拾同時に嘉納さん百七拾係壇ああ見当に百八拾し人その主義私百九拾をについご盲従弐百。</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="l-block" id="js_modal">
						<h2 class="u-h2">.js-modal : モーダルウィンドウ</h2>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<script>
	jQuery(function($){
		$('.js-modal_open').on('click', function(){
			var target = $(this).data('target');
			var modal = document.getElementById(target);
			scrollPosition = $(window).scrollTop();
			$('body').addClass('js-modal_fixed').css({'top': -scrollPosition});
			$(modal).fadeIn();
			return false;
		});
		$('.js-modal_close').on('click', function(){
			$('body').removeClass('js-modal_fixed');
			window.scrollTo( 0 , scrollPosition );
			$('.js-modal').fadeOut();
			return false;
		});
	});
</script>
<div class="l-clm_3 -sp_clear">
	<div class="l-clm__item">
		<span class="c-btn -max js-modal_open" data-target="modal01">モーダルウィンドウ1を開く</span>
	</div>
	<div class="l-clm__item">
		<span class="c-btn -max js-modal_open" data-target="modal02">モーダルウィンドウ2を開く</span>
	</div>
	<div class="l-clm__item">
		<span class="c-btn -max js-modal_open" data-target="modal03">モーダルウィンドウ3を開く</span>
	</div>
</div>

<div id="modal01" class="p-modal js-modal">
	<div class="p-modal__bg js-modal_close"></div>
	<div class="p-modal__item">
		<div class="p-modal__content">
			<p>ここにコンテンツ1が入ります。ここにコンテンツ1が入ります。ここにコンテンツ1が入ります。</p>
		</div>
		<div class="p-modal__close js-modal_close"><i class="fas fa-times"></i></div>
	</div>
</div>
<div id="modal02" class="p-modal js-modal">
	<div class="p-modal__bg js-modal_close"></div>
	<div class="p-modal__item">
		<div class="p-modal__content">
			<p>ここにコンテンツ2が入ります。ここにコンテンツ2が入ります。ここにコンテンツ2が入ります。</p>
		</div>
		<div class="p-modal__close js-modal_close"><i class="fas fa-times"></i></div>
	</div>
</div>
<div id="modal03" class="p-modal js-modal">
	<div class="p-modal__bg js-modal_close"></div>
	<div class="p-modal__item">
		<div class="p-modal__content">
			<p>ここにコンテンツ2が入ります。ここにコンテンツ2が入ります。ここにコンテンツ2が入ります。</p>
		</div>
		<div class="p-modal__close js-modal_close"><i class="fas fa-times"></i></div>
	</div>
</div>
</code></pre>
<!--##### CODE AREA #####-->
<script>
	jQuery(function($){
		$('.js-modal_open').on('click', function(){
			var target = $(this).data('target');
			var modal = document.getElementById(target);
			scrollPosition = $(window).scrollTop();
			$('body').addClass('js-modal_fixed').css({'top': -scrollPosition});
			$(modal).fadeIn();
			return false;
		});
		$('.js-modal_close').on('click', function(){
			$('body').removeClass('js-modal_fixed');
			window.scrollTo( 0 , scrollPosition );
			$('.js-modal').fadeOut();
			return false;
		});
	});
</script>
						<div class="l-clm_3 -sp_clear">
							<div class="l-clm__item">
								<span class="c-btn -max js-modal_open" data-target="modal01">モーダルウィンドウ1を開く</span>
							</div>
							<div class="l-clm__item">
								<span class="c-btn -max js-modal_open" data-target="modal02">モーダルウィンドウ2を開く</span>
							</div>
							<div class="l-clm__item">
								<span class="c-btn -max js-modal_open" data-target="modal03">モーダルウィンドウ3を開く</span>
							</div>
						</div>

						<div id="modal01" class="p-modal js-modal">
							<div class="p-modal__bg js-modal_close"></div>
							<div class="p-modal__item">
								<div class="p-modal__content">
									<p>ここにコンテンツ1が入ります。ここにコンテンツ1が入ります。ここにコンテンツ1が入ります。句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。この文章はダミ百三拾この文章はダミ百四拾自分に見ですの百五拾うど偶然へよく百六拾同時に嘉納さん百七拾係壇ああ見当に百八拾し人その主義私百九拾をについご盲従弐百。句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。この文章はダミ百三拾この文章はダミ百四拾自分に見ですの百五拾うど偶然へよく百六拾同時に嘉納さん百七拾係壇ああ見当に百八拾し人その主義私百九拾をについご盲従弐百。句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。この文章はダミ百三拾この文章はダミ百四拾自分に見ですの百五拾うど偶然へよく百六拾同時に嘉納さん百七拾係壇ああ見当に百八拾し人その主義私百九拾をについご盲従弐百。句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。この文章はダミ百三拾この文章はダミ百四拾自分に見ですの百五拾うど偶然へよく百六拾同時に嘉納さん百七拾係壇ああ見当に百八拾し人その主義私百九拾をについご盲従弐百。句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。この文章はダミ百三拾この文章はダミ百四拾自分に見ですの百五拾うど偶然へよく百六拾同時に嘉納さん百七拾係壇ああ見当に百八拾し人その主義私百九拾をについご盲従弐百。句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。この文章はダミ百三拾この文章はダミ百四拾自分に見ですの百五拾うど偶然へよく百六拾同時に嘉納さん百七拾係壇ああ見当に百八拾し人その主義私百九拾をについご盲従弐百。句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。この文章はダミ百三拾この文章はダミ百四拾自分に見ですの百五拾うど偶然へよく百六拾同時に嘉納さん百七拾係壇ああ見当に百八拾し人その主義私百九拾をについご盲従弐百。句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。この文章はダミ百三拾この文章はダミ百四拾自分に見ですの百五拾うど偶然へよく百六拾同時に嘉納さん百七拾係壇ああ見当に百八拾し人その主義私百九拾をについご盲従弐百。句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。この文章はダミ百三拾この文章はダミ百四拾自分に見ですの百五拾うど偶然へよく百六拾同時に嘉納さん百七拾係壇ああ見当に百八拾し人その主義私百九拾をについご盲従弐百。句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。この文章はダミ百三拾この文章はダミ百四拾自分に見ですの百五拾うど偶然へよく百六拾同時に嘉納さん百七拾係壇ああ見当に百八拾し人その主義私百九拾をについご盲従弐百。句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。この文章はダミ百三拾この文章はダミ百四拾自分に見ですの百五拾うど偶然へよく百六拾同時に嘉納さん百七拾係壇ああ見当に百八拾し人その主義私百九拾をについご盲従弐百。句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。この文章はダミ百三拾この文章はダミ百四拾自分に見ですの百五拾うど偶然へよく百六拾同時に嘉納さん百七拾係壇ああ見当に百八拾し人その主義私百九拾をについご盲従弐百。句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。この文章はダミ百三拾この文章はダミ百四拾自分に見ですの百五拾うど偶然へよく百六拾同時に嘉納さん百七拾係壇ああ見当に百八拾し人その主義私百九拾をについご盲従弐百。</p>
								</div>
								<div class="p-modal__close js-modal_close"><i class="fas fa-times"></i></div>
							</div>
						</div>
						<div id="modal02" class="p-modal js-modal">
							<div class="p-modal__bg js-modal_close"></div>
							<div class="p-modal__item">
								<div class="p-modal__content">
									<p>ここにコンテンツ2が入ります。ここにコンテンツ2が入ります。ここにコンテンツ2が入ります。</p>
								</div>
								<div class="p-modal__close js-modal_close"><i class="fas fa-times"></i></div>
							</div>
						</div>
						<div id="modal03" class="p-modal js-modal">
							<div class="p-modal__bg js-modal_close"></div>
							<div class="p-modal__item">
								<div class="p-modal__content">
									<p>ここにコンテンツ3が入ります。ここにコンテンツ3が入ります。ここにコンテンツ3が入ります。</p>
								</div>
								<div class="p-modal__close js-modal_close"><i class="fas fa-times"></i></div>
							</div>
						</div>
					</div>

				</div>
			</section>


		</main>

		<?=get_aside()?>

<?php
	// フッターを読み込み
	get_footer();
?>