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
								<span class="p-headline__ttl--main t-font_1">LAYOUT & PROJECT</span>
								<span class="p-headline__ttl--sub">レイアウト&プロジェクト一覧</span>
							</h2>
						</div>
					</div>

					<div class="l-block">
						<div class="l-clm_3 -thingap -sp_clear">
							<div class="l-clm__item"><a href="#clm" class="c-btn -bc_ghost -max">[L]横並びコンテンツ</a></div>
							<div class="l-clm__item"><a href="#lr" class="c-btn -bc_ghost -max">[L]左右分割ボックス</a></div>
							<div class="l-clm__item"><a href="#split" class="c-btn -bc_ghost -max">[L]スプリットボックス</a></div>
							<div class="l-clm__item"><a href="#slip" class="c-btn -bc_ghost -max">[L]重なるボックス（通常）</a></div>
							<div class="l-clm__item"><a href="#slip2" class="c-btn -bc_ghost -max">[L]重なるボックス（天地中央）</a></div>
							<div class="l-clm__item"><a href="#flowvnum" class="c-btn -bc_ghost -max">[P]フロー（縦並び : 数字）</a></div>
							<div class="l-clm__item"><a href="#flowvpic" class="c-btn -bc_ghost -max">[P]フロー（縦並び : 写真）</a></div>
							<div class="l-clm__item"><a href="#flowh" class="c-btn -bc_ghost -max">[P]フロー（横並び）</a></div>
							<div class="l-clm__item"><a href="#flowschedule" class="c-btn -bc_ghost -max">[P]フロー（タイムスケジュール）</a></div>
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
			<section class="l-section u-pt0" id="clm">
				<div class="l-contents">

					<div class="u-block">
						<h2 class="u-h2 u-center t-ttl_1">[L]横並びコンテンツ</h2>
					</div>

					<div class="u-block">
						<h3 class="u-h3">ノーマル</h3>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="l-clm_N">
	<div class="l-clm__item">
	</div>
	<div class="l-clm__item">
	</div>
</div>
</code></pre>
<!--##### CODE AREA #####-->
						<div class="l-clm_4">
						<?php for( $i = 1 ; $i <= 4; $i++ ):?>
							<div class="l-clm__item">
								<figure><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
							</div>
						<?php endfor;?>
						</div>
					</div>

					<div class="u-block">
						<h3 class="u-h3">ギャップ細め（ -thingap ）</h3>
						<div class="l-clm_4 -thingap">
						<?php for( $i = 1 ; $i <= 4; $i++ ):?>
							<div class="l-clm__item">
								<figure><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
							</div>
						<?php endfor;?>
						</div>
					</div>

					<div class="u-block">
						<h3 class="u-h3">ギャップなし（ -nogap ）</h3>
						<div class="l-clm_4 -nogap">
						<?php for( $i = 1 ; $i <= 4; $i++ ):?>
							<div class="l-clm__item">
								<figure><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
							</div>
						<?php endfor;?>
						</div>
					</div>

					<div class="u-block">
						<h3 class="u-h3">最後の行は中央揃え （ -last_center ）</h3>
						<div class="l-clm_4 -last_center">
						<?php for( $i = 1 ; $i <= 7; $i++ ):?>
							<div class="l-clm__item">
								<figure><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
							</div>
						<?php endfor;?>
						</div>
					</div>

					<div class="u-block">
						<h3 class="u-h3">スマホは2列 （ -sp2 : -sp2 〜 6 ）</h3>
						<div class="l-clm_4 -sp2 **-sp_clear">
						<?php for( $i = 1 ; $i <= 7; $i++ ):?>
							<div class="l-clm__item">
								<figure><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
							</div>
						<?php endfor;?>
						</div>
					</div>

					<div class="u-block">
						<h3 class="u-h3">スマホは横並び解除 （ -sp_clear ）</h3>
						<div class="l-clm_4 -sp_clear">
						<?php for( $i = 1 ; $i <= 4; $i++ ):?>
							<div class="l-clm__item">
								<figure><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
							</div>
						<?php endfor;?>
						</div>
					</div>

				</div>
			</section>

			<section class="l-section" id="lr">
				<div class="l-contents">

					<div class="u-block">
						<h2 class="u-h2 u-center t-ttl_1">[L]左右分割ボックス</h2>
					</div>

					<div class="u-block">
						<h3 class="u-h3">ノーマル</h3>
						<div class="u-part">
							<div class="u-frame">
								<p>.l-lrbox 内で _item が連続すると、左右交互になります。</p>
							</div>
						</div>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="l-lrbox">
	<div class="part l-lrbox__item">
		<div class="l-lrbox__l">
			<figure class="u-figure"><img src="" alt=""></figure>
		</div>
		<div class="l-lrbox__r texts">
		</div>
	</div>
	<div class="part l-lrbox__item">
		<div class="l-lrbox__l">
			<figure class="u-figure"><img src="" alt=""></figure>
		</div>
		<div class="l-lrbox__r texts">
		</div>
	</div>
</div>
</code></pre>
<!--##### CODE AREA #####-->
						<div class="l-lrbox">
							<div class="u-part l-lrbox__item">
								<div class="l-lrbox__l">
									<figure class="u-figure"><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
								</div>
								<div class="l-lrbox__r u-texts">
									<h3>ここに見出しが入ります</h3>
									<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。</p>
								</div>
							</div>
							<div class="p-part l-lrbox__item">
								<div class="l-lrbox__l">
									<figure class="u-figure"><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
								</div>
								<div class="l-lrbox__r u-texts">
									<h3>ここに見出しが入ります</h3>
									<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。</p>
								</div>
							</div>
						</div>
					</div>

					<div class="u-block">
						<h3 class="u-h3">テキストが天付き（ -align_top ）</h3>
						<div class="l-lrbox">
							<div class="box l-lrbox__item -align_top">
								<div class="l-lrbox__l">
									<figure class="u-figure"><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
								</div>
								<div class="l-lrbox__r u-texts">
									<h3>ここに見出しが入ります</h3>
									<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。</p>
								</div>
							</div>
						</div>
					</div>

					<div class="u-block">
						<h3 class="u-h3">片方のアイテム幅が40% （ -l4 ）</h3>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="l-lrbox">
	<div class="u-part l-lrbox_item -l4">
		<div class="l-lrbox_l">
			<figure class="u-figure"><img src="" alt=""></figure>
		</div>
		<div class="l-lrbox_r u-texts">
		</div>
	</div>
</div>
</code></pre>
<!--##### CODE AREA #####-->
						<div class="l-lrbox">
							<div class="u-box l-lrbox__item -l4">
								<div class="l-lrbox__l">
									<figure class="u-figure"><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
								</div>
								<div class="l-lrbox__r u-texts">
									<h3>ここに見出しが入ります</h3>
									<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。</p>
								</div>
							</div>
						</div>
					</div>

					<div class="u-block">
						<h3 class="u-h3">片方のアイテム幅が30% （ -l3 ）</h3>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="l-lrbox">
	<div class="part l-lrbox__item -l3">
		<div class="l-lrbox__l">
			<figure class="u-figure"><img src="" alt=""></figure>
		</div>
		<div class="l-lrbox__r u-texts">
		</div>
	</div>
</div>
</code></pre>
<!--##### CODE AREA #####-->
						<div class="l-lrbox">
							<div class="u-box l-lrbox__item -l3">
								<div class="l-lrbox__l">
									<figure class="u-figure"><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
								</div>
								<div class="l-lrbox__r u-texts">
									<h3>ここに見出しが入ります</h3>
									<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。</p>
								</div>
							</div>
						</div>
					</div>

					<div class="u-block">
						<h3 class="u-h3">片方のアイテム幅が20% （ -l2 ）</h3>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="l-lrbox">
	<div class="u-part l-lrbox__item -l2">
		<div class="l-lrbox__l">
			<figure class="u-figure"><img src="" alt=""></figure>
		</div>
		<div class="l-lrbox__r u-texts">
		</div>
	</div>
</div>
</code></pre>
<!--##### CODE AREA #####-->
						<div class="l-lrbox">
							<div class="u-box l-lrbox__item -l2">
								<div class="l-lrbox__l">
									<figure class="u-figure"><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
								</div>
								<div class="l-lrbox__r u-texts">
									<h3>ここに見出しが入ります</h3>
									<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。</p>
								</div>
							</div>
						</div>
					</div>

					<div class="u-block">
						<h3 class="u-h3">スマホでは解除（ -sp_clear ）</h3>
						<div class="l-lrbox">
							<div class="box l-lrbox__item -sp_clear">
								<div class="l-lrbox__l">
									<figure class="u-figure"><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
								</div>
								<div class="l-lrbox__r u-texts">
									<h3>ここに見出しが入ります</h3>
									<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。</p>
								</div>
							</div>
						</div>
					</div>

				</div>
			</section>

			<section class="l-section" id="split">
				<div class="l-contents">

					<div class="u-block">
						<h2 class="u-h2 u-center t-ttl_1">[L]スプリットボックス</h2>
					</div>

					<div class="u-block">
						<div class="u-part">
							<div class="u-frame">
								<p>.l-splitbox 内で _item が連続すると、左右交互になります。</p>
							</div>
						</div>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="l-splitbox">
	<div class="l-splitbox__item">
		<div class="l-splitbox__image u-bg_cover" style="background-image: url('<?=HOME?>dist/img/dummy.jpg');">
			<div class="l-splitbox__inner"></div>
		</div>
		<div class="l-splitbox__text">
			<div class="l-splitbox__inner">
				<div class="u-texts">
				</div>
			</div>
		</div>
	</div>
	<div class="l-splitbox__item">
		<div class="l-splitbox__image u-bg_cover" style="background-image: url('<?=HOME?>dist/img/dummy.jpg');">
			<div class="l-splitbox__inner"></div>
		</div>
		<div class="l-splitbox__text">
			<div class="l-splitbox__inner">
				<div class="u-texts">
				</div>
			</div>
		</div>
	</div>
</div>
</code></pre>
<!--##### CODE AREA #####-->
						<div class="l-splitbox">
							<div class="l-splitbox__item">
								<div class="l-splitbox__image u-bg_cover" style="background-image: url('<?=HOME?>dist/img/dummy.jpg');">
									<div class="l-splitbox__inner"></div>
								</div>
								<div class="l-splitbox__text">
									<div class="l-splitbox__inner">
										<div class="u-texts">
											<h2>ここに見出しが入ります。</h2>
											<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。この文章はダミ百三拾この文章はダミ百四拾自分に見ですの百五拾うど偶然へよく百六拾同時に嘉納さん百七拾係壇ああ見当に百八拾し人その主義私百九拾をについご盲従弐百。</p>
										</div>
									</div>
								</div>
							</div>
							<div class="l-splitbox__item">
								<div class="l-splitbox__image u-bg_cover" style="background-image: url('<?=HOME?>dist/img/dummy.jpg');">
									<div class="l-splitbox__inner"></div>
								</div>
								<div class="l-splitbox__text">
									<div class="l-splitbox__inner">
										<div class="u-texts">
											<h2>ここに見出しが入ります。</h2>
											<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。この文章はダミ百三拾この文章はダミ百四拾自分に見ですの百五拾うど偶然へよく百六拾同時に嘉納さん百七拾係壇ああ見当に百八拾し人その主義私百九拾をについご盲従弐百。</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</section>

			<section class="l-section" id="slip">
				<div class="l-contents">

					<div class="u-block">
						<h2 class="u-h2 u-center t-ttl_1">[L]重なるボックス</h2>
					</div>

					<div class="u-block">
						<div class="u-part">
							<div class="u-frame">
								<p>.l-splitbox 内で _item が連続すると、左右交互になります。</p>
							</div>
						</div>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="l-slipbox_normal">
	<div class="u-box l-slipbox_normal__item">
		<div class="l-slipbox_normal__l">
			<figure><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
		</div>
		<div class="l-slipbox_normal__r">
			<div class="l-slipbox_normal__inner u-texts">
			</div>
		</div>
	</div>
	<div class="u-box l-slipbox_normal__item">
		<div class="l-slipbox_normal__l">
			<figure><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
		</div>
		<div class="l-slipbox_normal__r">
			<div class="l-slipbox_normal__inner u-texts">
			</div>
		</div>
	</div>
</div>
</code></pre>
<!--##### CODE AREA #####-->
						<div class="l-slipbox_normal">
							<div class="u-box l-slipbox_normal__item">
								<div class="l-slipbox_normal__l">
									<figure><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
								</div>
								<div class="l-slipbox_normal__r">
									<div class="l-slipbox_normal__inner u-texts">
										<h2>ここに見出しが入ります</h2>
										<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。この文章はダミ百三拾この文章はダミ百四拾自分に見ですの百五拾うど偶然へよく百六拾同時に嘉納さん百七拾係壇ああ見当に百八拾し人その主義私百九拾をについご盲従弐百。</p>
									</div>
								</div>
							</div>
							<div class="u-box l-slipbox_normal__item">
								<div class="l-slipbox_normal__l">
									<figure><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
								</div>
								<div class="l-slipbox_normal__r">
									<div class="l-slipbox_normal__inner u-texts">
										<h2>ここに見出しが入ります</h2>
										<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。この文章はダミ百三拾この文章はダミ百四拾自分に見ですの百五拾うど偶然へよく百六拾同時に嘉納さん百七拾係壇ああ見当に百八拾し人その主義私百九拾をについご盲従弐百。</p>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</section>

			<section class="l-section" id="slip2">
				<div class="l-contents">

					<div class="u-block">
						<h2 class="u-h2 u-center t-ttl_1">[L]重なるボックス</h2>
					</div>

					<div class="u-block">
						<div class="u-part">
							<div class="u-frame">
								<p>.l-splitbox 内で _item が連続すると、左右交互になります。</p>
							</div>
						</div>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="l-slipbox_vcenter">
	<div class="u-box l-slipbox_vcenter__item">
		<div class="l-slipbox_vcenter__l">
			<figure><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
		</div>
		<div class="l-slipbox_vcenter__r">
			<div class="l-slipbox_vcenter__inner u-texts">
			</div>
		</div>
	</div>
	<div class="u-box l-slipbox_vcenter__item">
		<div class="l-slipbox_vcenter__l">
			<figure><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
		</div>
		<div class="l-slipbox_vcenter__r">
			<div class="l-slipbox_vcenter__inner u-texts">
			</div>
		</div>
	</div>
</div>
</code></pre>
<!--##### CODE AREA #####-->
						<div class="l-slipbox_vcenter">
							<div class="u-box l-slipbox_vcenter__item">
								<div class="l-slipbox_vcenter__l">
									<figure><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
								</div>
								<div class="l-slipbox_vcenter__r">
									<div class="l-slipbox_vcenter__inner u-texts">
										<h2>ここに見出しが入ります</h2>
										<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。この文章はダミ百三拾この文章はダミ百四拾自分に見ですの百五拾うど偶然へよく百六拾同時に嘉納さん百七拾係壇ああ見当に百八拾し人その主義私百九拾をについご盲従弐百。</p>
									</div>
								</div>
							</div>
							<div class="u-box l-slipbox_vcenter__item">
								<div class="l-slipbox_vcenter__l">
									<figure><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
								</div>
								<div class="l-slipbox_vcenter__r">
									<div class="l-slipbox_vcenter__inner u-texts">
										<h2>ここに見出しが入ります</h2>
										<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。この文章はダミ百三拾この文章はダミ百四拾自分に見ですの百五拾うど偶然へよく百六拾同時に嘉納さん百七拾係壇ああ見当に百八拾し人その主義私百九拾をについご盲従弐百。</p>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</section>

			<section class="l-section" id="flowvnum">
				<div class="l-contents">

					<div class="u-block">
						<h2 class="u-h2 u-center t-ttl_1">[P]フロー（縦並び : 数字）</h2>
					</div>

					<div class="u-block">
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="p-flow_vnum">
	<div class="p-flow_vnum__item">
		<div class="p-flow_vnum__num">
			<div class="u-afix_3">
				<div class="u-afix__item u-fcenter u-oval">
					<div class="p-flow_vnum__numtext t-font_1">01</div>
				</div>
			</div>
		</div>
		<div class="p-flow_vnum__text">
		</div>
	</div>
</div>
</code></pre>
<!--##### CODE AREA #####-->
						<div class="p-flow_vnum">
							<div class="p-flow_vnum__item">
								<div class="p-flow_vnum__num">
									<div class="u-afix_3">
										<div class="u-afix__item u-fcenter u-oval">
											<div class="p-flow_vnum__numtext t-font_1">01</div>
										</div>
									</div>
								</div>
								<div class="p-flow_vnum__text">
									<h3 class="u-h3">ここに見出しが入ります</h3>
									<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。</p>
								</div>
							</div>
							<div class="p-flow_vnum__item">
								<div class="p-flow_vnum__num">
									<div class="u-afix_3">
										<div class="u-afix__item u-fcenter u-oval">
											<div class="p-flow_vnum__numtext t-font_1">02</div>
										</div>
									</div>
								</div>
								<div class="p-flow_vnum__text">
									<h3 class="u-h3">ここに見出しが入ります</h3>
									<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。</p>
								</div>
							</div>
							<div class="p-flow_vnum__item">
								<div class="p-flow_vnum__num">
									<div class="u-afix_3">
										<div class="u-afix__item u-fcenter u-oval">
											<div class="p-flow_vnum__numtext t-font_1">03</div>
										</div>
									</div>
								</div>
								<div class="p-flow_vnum__text">
									<h3 class="u-h3">ここに見出しが入ります</h3>
									<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。</p>
								</div>
							</div>
						</div>
					</div>

				</div>
			</section>

			<section class="l-section" id="flowvpic">
				<div class="l-contents">

					<div class="u-block">
						<h2 class="u-h2 u-center t-ttl_1">[P]フロー（縦並び : 写真）</h2>
					</div>

					<div class="u-block">
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="p-flow_vpic">
	<div class="l-lrbox">
		<div class="l-lrbox__item -l3">
			<div class="l-lrbox__l">
				<figure class="u-figure"><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
			</div>
			<div class="l-lrbox__r u-texts">
				<h3 class="p-flow_vpic__ttl"><span class="_num p_font1"><small>STEP</small>01</span>ここに見出しが入ります</h3>
				<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。</p>
			</div>
		</div>
	</div>
</div>
</code></pre>
<!--##### CODE AREA #####-->
						<div class="p-flow_vpic">
							<div class="l-lrbox">
								<div class="l-lrbox__item -l3">
									<div class="l-lrbox__l">
										<figure class="u-figure"><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
									</div>
									<div class="l-lrbox__r u-texts">
										<h3 class="p-flow_vpic__ttl"><span class="_num p_font1"><small>STEP</small>01</span>ここに見出しが入ります</h3>
										<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。</p>
									</div>
								</div>
							</div>
							<div class="l-lrbox">
								<div class="l-lrbox__item -l3">
									<div class="l-lrbox__l">
										<figure class="u-figure"><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
									</div>
									<div class="l-lrbox__r u-texts">
										<h3 class="p-flow_vpic__ttl"><span class="_num p_font1"><small>STEP</small>02</span>ここに見出しが入ります</h3>
										<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。</p>
									</div>
								</div>
							</div>
							<div class="l-lrbox">
								<div class="l-lrbox__item -l3">
									<div class="l-lrbox__l">
										<figure class="u-figure"><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
									</div>
									<div class="l-lrbox__r u-texts">
										<h3 class="p-flow_vpic__ttl"><span class="_num p_font1"><small>STEP</small>03</span>ここに見出しが入ります</h3>
										<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。</p>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</section>

			<section class="l-section" id="flowh">
				<div class="l-contents">

					<div class="u-block">
						<h2 class="u-h2 u-center t-ttl_1">[P]フロー（横並び）</h2>
					</div>

					<div class="u-block">
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="p-flow_horizontal__item">
	<div class="p-flow_horizontal__cont fcenter js-eqh">
		<div class="p-flow_horizontal__text u-center">
			<h3 class="u-h5">見出し</h3>
			<p class="u-supple u-mb0">本文</p>
		</div>
	</div>
</div>
</code></pre>
<!--##### CODE AREA #####-->
						<div class="p-flow_horizontal js-eqheight">
<?php
	$coltit = array(
		'会社説明会',
		'エントリー',
		'書類選考',
		'一次面接',
		'筆記試験',
		'二次面接',
		'採用'
	);
	$colsub = array(
		'句読点を入て拾文字、ここまでで二拾。',
		'句読点を入て拾文字。',
		'句読点を入て拾文字、ここまでで二拾文字。',
		'句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾。',
		'句読点を入て拾文字。',
		'句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾。',
		'句読点を入て拾文字、ここまでで二拾文字。'
	);
	for($i = 0 ; $i < count( $coltit ); $i++):
?>


								<div class="p-flow_horizontal__item">
									<div class="p-flow_horizontal__cont fcenter js-eqh">
										<div class="p-flow_horizontal__text u-center">
											<h3 class="u-h5"><?php echo $coltit[$i];?></h3>
											<p class="u-supple u-mb0"><?php echo $colsub[$i];?></p>
										</div>
									</div>
								</div>
<?php endfor;?>
						</div>
					</div>

				</div>
			</section>

			<section class="l-section" id="flowschedule">
				<div class="l-contents">

					<div class="u-block">
						<div class="p-headline u-center">
							<h2 class="u-h2 u-center t-ttl_1">[P]フロー（スケジュール）</h2>
						</div>
					</div>

					<div class="u-block">
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="p-flow_schedule">
	<div class="p-flow_schedule__item">
		<h3 class="u-h4 p-flow_schedule__ttl"><span class="p-flow_schedule_time u-supple u-fa_before"><i class="far fa-clock"></i>9:00</span>出社</h3>
		<div class="u-part p-flow_schedule__fig">
			<figure><img src="<?=HOME?>dist/img/dummy.jpg" alt="イメージ"></figure>
		</div>
		<div class="u-texts">
			<p></p>
		</div>
	</div>
</div>
</code></pre>
<!--##### CODE AREA #####-->
						<div class="u-narrowcont">
							<div class="p-flow_schedule">
								<div class="p-flow_schedule__item">
									<h3 class="u-h4 p-flow_schedule__ttl"><span class="p-flow_schedule_time u-supple u-fa_before"><i class="far fa-clock"></i>9:00</span>出社</h3>
									<div class="u-part p-flow_schedule__fig">
										<figure><img src="<?=HOME?>dist/img/dummy.jpg" alt="イメージ"></figure>
									</div>
									<div class="u-texts">
										<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。</p>
									</div>
								</div>
								<div class="p-flow_schedule__item">
									<h3 class="u-h4 p-flow_schedule__ttl"><span class="p-flow_schedule_time u-supple u-fa_before"><i class="far fa-clock"></i>10:00</span>企画会議</h3>
									<div class="u-texts">
										<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。</p>
									</div>
								</div>
								<div class="p-flow_schedule__item">
									<h3 class="u-h4 p-flow_schedule__ttl"><span class="p-flow_schedule_time u-supple u-fa_before"><i class="far fa-clock"></i>11:00</span>営業訪問</h3>
									<div class="u-part p-flow_schedule__fig">
										<figure><img src="<?=HOME?>dist/img/dummy.jpg" alt="イメージ"></figure>
									</div>
									<div class="u-texts">
										<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。</p>
									</div>
								</div>
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