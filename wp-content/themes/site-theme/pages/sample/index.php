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
								<span class="p-headline__ttl--main t-font_1">SAMPLE PARTS INDEX</span>
								<span class="p-headline__ttl--sub">サンプルパーツ一覧</span>
							</h2>
						</div>
					</div>

					<div class="l-block">
						<div class="l-clm_3 -sp_clear">
<?php
	$ttl = array(
		'レイアウト',
		'jQueryパーツ',
		'コンポーネント'
	);
	$url = array(
		'layout',
		'jqparts',
		'component'
	);
	for($i = 0 ; $i < count( $ttl ); $i++):
?>
							<div class="l-clm__item">
								<a href="<?=HOME?>sample/<?=$url[$i]?>" class="c-btn -max -huge -bc_ghost"><?=$ttl[$i]?></a>
							</div>
<?php endfor;?>
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