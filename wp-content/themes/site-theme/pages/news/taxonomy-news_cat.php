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

			<section class="l-section">
				<div class="l-contents">

					<div class="l-block">
						<h2 class="u-h1 u-center">カテゴリー「<?=single_tag_title();?>」の一覧</h2>
					</div>

					<div class="l-block">
<?php require_once ( THEMEPATH.'inc/parts/archive_list_'.$archive_list_type['type'].'.php' );?>
					</div>

					<div class="l-block">
						<?php wp_pagenavi(); ?>
					</div>

				</div>
			</section>

		</main>

		<?=get_aside()?>

<?php
	// フッター読み込み
	get_footer();
?>
