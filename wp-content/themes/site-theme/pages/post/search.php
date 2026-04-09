<?php
/**
 * seacrh template
 *
 * @since site theme X 10.0
 */

	// ページタイトル表示用ディレクトリ名
	define('DIR_NAME',		'お知らせ');
	define('PAGE_SUBTITLE',	'NEWS');

	// サイドバー（不要の場合は値を空白）
	$sidebar_position	= 'right';

	// アーカイブリストタイプ指定
//	$archive_list_type = array( 'type' => 'a' ); // テキストのみ
//	$archive_list_type = array( 'type' => 'b' ); // 写真＋テキスト
	$archive_list_type = array( 'type' => 'c', 'column' => '3' ); // 写真＋タイトル, カラム数（2~6）

	$post_type = 'post';

	# ヘッダー読み込み
	get_header();

?>
		<main class="l-main">

			<section class="l-section">
				<div class="l-contents">

					<div class="l-block">
						<div class="u-h1 u-center">検索結果</div>
					</div>

<?php
	## 検索結果テンプレート
	global $wp_query;
	$total_results = $wp_query->found_posts;
?>
<?php if($total_results == 0):?>
					<div class="l-block">
						<div class="u-frame -wide u-center">
							<p>検索結果はありません。</p>
						</div>
					</div>
<?php endif;?>
					<div class="l-block">
<?php require_once ( THEMEPATH.'inc/parts/archive_list_'.$archive_list_type['type'].'.php' );?>
					</div>

					<div class="l-block">
						<?php wp_pagenavi(); ?>
					</div>

				</div>
			</section>

			<section class="l-section">
				<div class="l-contents">

					<div class="l-block u-center">
						<a href="<?=HOME?><?=get_currentdir_slug();?>" class="c-btn -huge u-fa_after"><?=DIR_NAME;?>に戻る<i class="fas fa-redo"></i></a>
					</div>

				</div>
			</section>

		</main>

		<?=get_aside()?>

	</div>

<?php
	// フッター読み込み
	get_footer();
?>