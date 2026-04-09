<?php
/**
 * single page template
 *
 * @since site theme X 10.0
 */

	// ページタイトル表示用ディレクトリ名
	define('DIR_NAME',		'スタッフ紹介');
	define('PAGE_SUBTITLE',	'STAFF');

	// サイドバー（不要の場合は値を空白）
	$sidebar_position	= '';

	// アーカイブリストタイプ指定
	$archive_list_type = array( 'type' => 'a' ); // テキストのみ
//	$archive_list_type = array( 'type' => 'b' ); // 写真＋テキスト
//	$archive_list_type = array( 'type' => 'c', 'column' => '3' ); // 写真＋タイトル, カラム数（2~6）

	$post_type = get_currentdir_slug();

	// ヘッダーを読み込み
	get_header();

?>
		<main class="l-main">

			<section class="l-pagetitle">
				<div class="p-pagetitle u-bg_cover" style="background-image: url(<?php the_post_thumbnail_url();?>);">
					<div class="p-pagetitle__wrap">
						<div class="p-pagetitle__cont">
							<div class="p-pagetitle__ptitle u-white">
								<h1 class="p-pagetitle__ttl u-h1"><?php the_field('staff-catch');?></h1>
								<p class="p-pagetitle__sub"><?php the_title();?>&emsp;<?php the_field('staff-post');?> / <?php the_field('staff-year');?>入社</p>
							</div>
						</div>
					</div>
				</div>
			</section>

			<?php breadcrumb();?>

<?php if( have_posts()) : while ( have_posts() ) : the_post(); ?>

			<section class="l-section">
				<div class="l-contents">

					<div class="l-block">
						<div class="u-texts">
							<?php the_content();?>
						</div>
					</div>

				</div>
			</section>

<?php if(have_rows('staff-interview')): ?>
			<section class="l-section">
				<div class="l-contents l-fullwidth">

					<div class="l-block">
						<div class="p-headline u-center">
							<h1 class="p-headline__ttl t-font_1">INTERVIEW</h1>
							<p class="p-headline__sub">インタビュー</p>
						</div>
					</div>

					<div class="l-block">
						<div class="l-splitbox">

<?php while(have_rows('staff-interview')): the_row(); ?>
							<div class="l-splitbox__item">
								<div class="l-splitbox__image u-bg_cover" style="background-image: url('<?php the_sub_field('pic');?>');">
									<div class="l-splitbox__inner"></div>
								</div>
								<div class="l-splitbox__text">
									<div class="l-splitbox__inner">
										<div class="u-texts">
											<h2 class="u-h2"><?php the_sub_field('headline');?></h2>
											<p><?php the_sub_field('text');?></p>
										</div>
									</div>
								</div>
							</div>
<?php endwhile; ?>
						</div>
					</div>

				</div>
			</section>
<?php endif; ?>

<?php if(have_rows('staff-schedule')): ?>
			<section class="l-section">
				<div class="l-contents l-narrowcont">

					<div class="l-block">
						<div class="p-headline">
							<h2 class="p-headline__ttl">
								<span class="p-headline__ttl--main t-font_1">A DAY</span>
								<span class="p-headline__ttl--sub">1日のスケジュール</span>
							</h2>
						</div>
					</div>

					<div class="l-block">
						<div class="p-flow_schedule">
<?php while(have_rows('staff-schedule')): the_row(); ?>
							<div class="p-flow_schedule__item">
								<h3 class="u-h4 p-flow_schedule__ttl"><span class="p-flow_schedule__time u-supple"><i class="far fa-clock"></i><?php the_sub_field('time'); ?></span><?php the_sub_field('action'); ?></h3>
								<?php if( get_sub_field('pic') ):?>
								<div class="l-part p-flow_schedule__fig">
									<figure><img src="<?php the_sub_field('pic'); ?>" alt="<?php the_sub_field('action'); ?>イメージ"></figure>
								</div>
								<?php endif;?>
								<div class="u-texts">
									<p><?php the_sub_field('text'); ?></p>
								</div>
							</div>
<?php endwhile; ?>
						</div>
					</div>

				</div>
			</section>
<?php endif; ?>
<?php endwhile; endif; wp_reset_query(); ?>

			<section class="l-section">
				<div class="l-contents">

					<div class="l-block u-center">
						<a href="<?=HOME?>/recruit/?id=staff" class="c-btn u-fa_after -huge">採用情報に戻る<i class="fas fa-undo-alt"></i></a>
					</div>

				</div>
			</section>

		</main>

		<?=get_aside()?>

<?php
	// フッター読み込み
	get_footer();
?>
