<?php
/**
 * page template
 *
 * @since site theme X 10.0
 */

	// ページタイトル表示用ディレクトリ名
	define('DIR_NAME',		'資料請求');
	define('PAGE_SUBTITLE',	'REQUEST');

	// サイドバー（不要の場合は値を空白）
	$sidebar_position	= '';

	require ( THEMEPATH.'pages/'.get_currentdir_slug().'/form-settings.php' );

	// ヘッダーを読み込み
	get_header();
?>

		<main class="l-main">

			<section class="l-section">
				<div class="l-contents"><!-- contents -->

					<div class="l-block">
						<h2 class="u-h2 u-center">送信が完了しました。</h2>
						<div class="u-part u-frame u-texts u-center">
							<?=$message;?>
						</div>
					</div>

					<div class="l-block">
						<p class="u-center"><a class="c-btn -huge" href="<?=HOME?>">TOPページに戻る</a></p>
					</div>

				</div><!-- // contents -->
			</section>



		</main>

		<?=get_aside()?>

<?php
	// フッターを読み込み
	get_footer();
?>