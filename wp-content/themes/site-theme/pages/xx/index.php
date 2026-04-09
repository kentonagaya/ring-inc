<?php
/**
 * page template
 *
 * @since site theme X 10.0
 */

	// ページタイトル表示用ディレクトリ名
	define('DIR_NAME',		'ページタイトル');
	define('PAGE_SUBTITLE',	'PAGA SUBTITLE');

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
								<span class="p-headline__ttl--main t-font_1">PAGE TITLE</span>
								<span class="p-headline__ttl--sub">タイトル</span>
							</h2>
						</div>
					</div>

					<div class="l-block">

					</div>

				</div>
			</section>

		</main>

		<?=get_aside()?>

<?php
	// フッターを読み込み
	get_footer();
?>