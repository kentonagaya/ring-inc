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
								<span class="p-headline__ttl--main t-font_1">COMPONENTS</span>
								<span class="p-headline__ttl--sub">コンポーネント一覧</span>
							</h2>
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

					<div class="u-block">
						<div class="p-clm_2 -sp_clear">
							<div class="p-clm__item">
								<div class="u-part">
									<div class="p-headline u-center">
										<h2 class="p-headline__title">.c-btn</h2>
										<p class="p-headline__subtitle">ボタン</p>
									</div>
								</div>
								<div class="box">
									<p><a href="" class="c-btn">通常ボタン</a></p>
									<p><a href="" class="c-btn -bc_ghost">ゴーストボタン -bc_ghost</a></p>
									<p><a href="" class="c-btn -bc_white">白抜きボタン -bc_white</a></p>
									<p><a href="" class="c-btn -bc_ghost -bc_white">白色ゴーストボタン -bc_ghost -bc_white</a></p>
									<p><a href="" class="c-btn -huge">ボタン 大 -huge</a></p>
									<p><a href="" class="c-btn -max">横幅100%ボタン -max</a></p>
									<p><a href="" class="c-btn -small">ボタン 小 -small</a></p>
								</div>
							</div>
							<div class="p-clm__item">
								<div class="u-part">
									<div class="p-headline u-center">
										<h2 class="p-headline__title">.c-baloon</h2>
										<p class="p-headline__subtitle">吹き出し</p>
									</div>
								</div>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="c-baloon -left">
</div>
</code></pre>
<!--##### CODE AREA #####-->
								<div class="u-part">
									<div class="c-baloon -left">
										矢印が左
									</div>
								</div>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="c-baloon -right">
</div>
</code></pre>
<!--##### CODE AREA #####-->
								<div class="u-part">
									<div class="c-baloon -right">
										矢印が右
									</div>
								</div>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="c-baloon -top">
</div>
</code></pre>
<!--##### CODE AREA #####-->
								<div class="u-part">
									<div class="c-baloon -top">
										矢印が上
									</div>
								</div>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="c-baloon -bottom">
</div>
</code></pre>
<!--##### CODE AREA #####-->
								<div class="u-part">
									<div class="c-baloon -bottom">
										矢印が下
									</div>
								</div>
							</div>
							<div class="p-clm__item">
								<div class="u-part">
									<div class="p-headline u-center">
										<h2 class="p-headline__title">.c-card</h2>
										<p class="p-headline__subtitle">カード</p>
									</div>
								</div>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="c-card">
	<figure><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
	<div class="c-card__cont">
		カードの内容
	</div>
</div>
</code></pre>
<!--##### CODE AREA #####-->
								<div class="c-card">
									<figure><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
									<div class="c-card__cont">
										カードの内容
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="u-block">
						<div class="p-clm_2 -sp_clear">

							<div class="p-clm__item">
								<h2 class="u-h2">.c-tbl_1 : テーブル1</h2>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="c-tbl_1">
	<table>
		<tbody>
			<tr>
				<th></th>
				<td></td>
			</tr>
		</tbody>
	</table>
</div>
</code></pre>
<!--##### CODE AREA #####-->
								<div class="c-tbl_1">
									<table>
										<tr>
											<th>項目</th>
											<td>内容</td>
										</tr>
										<tr>
											<th>項目</th>
											<td>内容</td>
										</tr>
										<tr>
											<th>項目</th>
											<td>内容</td>
										</tr>
									</table>
								</div>
							</div>

							<div class="p-clm__item">
								<h2 class="u-h2">.c-tbl_2 : テーブル2</h2>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="c-tbl_2">
	<table>
		<tbody>
			<tr>
				<th></th>
				<td></td>
			</tr>
		</tbody>
	</table>
</div>
</code></pre>
<!--##### CODE AREA #####-->
								<div class="c-tbl_2">
									<table>
										<tr>
											<th>項目</th>
											<td>内容</td>
										</tr>
										<tr>
											<th>項目</th>
											<td>内容</td>
										</tr>
										<tr>
											<th>項目</th>
											<td>内容</td>
										</tr>
									</table>
								</div>
							</div>

							<div class="p-clm__item">
								<h2 class="u-h2">.c-tbl_1 -sp_clear : スマホで改行</h2>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="c-tbl_1 -sp_clear">
	<table>
		<tbody>
			<tr>
				<th></th>
				<td></td>
			</tr>
		</tbody>
	</table>
</div>
</code></pre>
<!--##### CODE AREA #####-->
								<div class="c-tbl_1 -sp_clear">
									<table>
										<tr>
											<th>項目</th>
											<td>内容</td>
										</tr>
										<tr>
											<th>項目</th>
											<td>内容</td>
										</tr>
										<tr>
											<th>項目</th>
											<td>内容</td>
										</tr>
									</table>
								</div>
							</div>

							<div class="p-clm__item">
								<h2 class="u-h2">.c-tbl_2 -sp_clear : スマホで改行</h2>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="c-tbl_2 -sp_clear">
	<table>
		<tbody>
			<tr>
				<th></th>
				<td></td>
			</tr>
		</tbody>
	</table>
</div>
</code></pre>
<!--##### CODE AREA #####-->
								<div class="c-tbl_2 -sp_clear">
									<table>
										<tr>
											<th>項目</th>
											<td>内容</td>
										</tr>
										<tr>
											<th>項目</th>
											<td>内容</td>
										</tr>
										<tr>
											<th>項目</th>
											<td>内容</td>
										</tr>
									</table>
								</div>
							</div>

						</div>

					</div>

					<div class="u-block">
						<h2 class="u-h2">.-spslide : スマホで横スライド</h2>
<!--##### CODE AREA #####-->
<pre class="u-part p-code"><code>
<div class="c-tbl_1 -spslide">
	<table>
		<tbody>
			<tr>
				<th></th>
				<td></td>
			</tr>
		</tbody>
	</table>
</div>
</code></pre>
<!--##### CODE AREA #####-->
						<div class="c-tbl_1 -spslide">
							<table>
								<tr>
									<th>項目</th>
									<th>項目</th>
									<th>項目</th>
									<th>項目</th>
									<th>項目</th>
									<th>項目</th>
									<th>項目</th>
									<th>項目</th>
									<th>項目</th>
									<th>項目</th>
								</tr>
								<tr>
									<th>項目</th>
									<td>内容</td>
									<td>内容</td>
									<td>内容</td>
									<td>内容</td>
									<td>内容</td>
									<td>内容</td>
									<td>内容</td>
									<td>内容</td>
									<td>内容</td>
								</tr>
								<tr>
									<th>項目</th>
									<td>内容</td>
									<td>内容</td>
									<td>内容</td>
									<td>内容</td>
									<td>内容</td>
									<td>内容</td>
									<td>内容</td>
									<td>内容</td>
									<td>内容</td>
								</tr>
								<tr>
									<th>項目</th>
									<td>内容</td>
									<td>内容</td>
									<td>内容</td>
									<td>内容</td>
									<td>内容</td>
									<td>内容</td>
									<td>内容</td>
									<td>内容</td>
									<td>内容</td>
								</tr>
							</table>
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