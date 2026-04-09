<?php
/**
 * single page template
 *
 * @since site theme X 10.0
 */

	// ページタイトル表示用ディレクトリ名
	define('DIR_NAME',		'お知らせ');
	define('PAGE_SUBTITLE',	'NEWS');

	// サイドバー（不要の場合は値を空白）
	$sidebar_position	= 'right';

	// アーカイブリストタイプ指定
	$archive_list_type = array( 'type' => 'a' ); // テキストのみ
//	$archive_list_type = array( 'type' => 'b' ); // 写真＋テキスト
//	$archive_list_type = array( 'type' => 'c', 'column' => '3' ); // 写真＋タイトル, カラム数（2~6）

	$post_type = get_currentdir_slug();

	// ヘッダーを読み込み
	get_header();

?>
		<main class="l-main">
<?php if( have_posts()) : while ( have_posts() ) : the_post(); ?>
<?php require_once ( THEMEPATH.'inc/parts/single_basic.php' );?>
<?php endwhile; endif; wp_reset_query(); ?>

			<section class="l-section">
				<div class="l-contents">

					<div class="l-block u-center">
						<a href="<?=HOME?><?=get_currentdir_slug();?>" class="c-btn -huge u-fa_after"><?=DIR_NAME?>一覧に戻る<i class="fas fa-undo-alt"></i></a>
					</div>

				</div>
			</section>

		</main>

		<?=get_aside()?>

<?php
	// フッター読み込み
	get_footer();
?>
