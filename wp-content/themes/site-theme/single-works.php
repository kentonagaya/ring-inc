<?php
/*--------------------------------------------------------------------------
	Template Name: works-single
---------------------------------------------------------------------------*/

	/* 共通設定読み込み */
	include_once ('assets/class/base.class.php');
	include_once ('assets/class/functions.php');
	include ('assets/settings/site-config.php');

	/* ページ設定 */
	define( 'CURRENTDIR', 'works' );	// ディレクトリ名
	define( 'CURRENTPAGE', 'single' );	// ページ名
	$dirname 		= '施工事例';
	$subtitle 		= 'WORKS';

	/* ページ専用CSS */
	$css = '';
	$css .= '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/lib/slick.css" media="all">' . "\n";
	$css .= '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/lib/slick-theme.css" media="all">' . "\n";

	/* ページ専用JS */
	$js = '';
	$js .= '<script src="' . get_template_directory_uri() . '/js/lib/slick.js" charset="utf-8"></script>' . "\n";

	/* ページ専用SEO */
	$page_org_title	= '';
	$page_meta_d	= '';
	$page_meta_k	= '';

	// レイアウト個別指定
	$layout			= 'one-column';
//	$layout			= 'has-side';

	// オリジナルヘッダータグ
//	$page_org_tag = '<meta name="robots" content="noindex">';
	$page_org_tag = '';

	# header読み込み
	include ("assets/common/html-header.php");
	get_header();

?>
	<section class="title-wrap <?php if ( $header_fix == true ) { echo "header-fix"; };?> <?php if( $header_type == 'standard' ){ echo 'has-gnav'; };?>">

<?php
	// page title
	include ('assets/modules/mod-pagetitle.php');
?>

<?php if ( $breadcrumb == true ) {?>
		<div class="breadcrumb-wrap">
<?php
			$current_layer		= 3;			// 階層指定
			$parent_dir_name	= 'directory';	// 階層数が`4`の場合のみ指定
			$parent_layer_name	= '親階層名';		// 階層数が`4`の場合のみ指定
			include ("assets/modules/breadcrumb.php");
?>
		</div>
<?php };?>

	</section><!-- // title-wrap -->

	<div class="contents-wrap <?php echo $layout;?>"><!-- contents-wrap -->

		<main>
<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
			<section class="page-section">
				<div class="contents"><!-- contents -->

					<div class="block">
						<h2 class="heading01"><?php the_title();?></h2>
						<div class="mod-left-right">
							<div class="left-cont">
								<?php if (has_post_thumbnail()) : ?>
								<p class="pic"><img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>のアイキャッチ画像"></p>
								<?php else:?>
								<p class="pic"><img src="<?php bloginfo('template_url');?>/images/noimage.png);?>" alt="<?php the_title();?>のアイキャッチ画像"></p>
								<?php endif;?>
							</div>
							<div class="right-cont texts">
								<?php the_content();?>
							</div>
						</div>
					</div>

					<div class="block">
						<h3 class="heading03">データ</h3>
						<div class="part texts">
							<?php if(have_rows('data')): ?>
							<table class="mod-table02">
								<?php while(have_rows('data')): the_row(); ?>
								<tr>
									<th><?php the_sub_field('title'); ?></th>
									<td><?php the_sub_field('text'); ?></td>
								</tr>
								<?php endwhile; ?>
							</table>
							<?php endif; ?>
						</div>
					</div>
<script>

	jQuery(function() {
		$('.thumb-item').slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			asNavFor: '.thumb-item-nav' //サムネイルのクラス名
		});
		$('.thumb-item-nav').slick({
			infinite: true,
			slidesToShow: 5,
			slidesToScroll: 1,
			asNavFor: '.thumb-item', //スライダー本体のクラス名
			focusOnSelect: true
		});
    });

</script>
					<div class="block">
						<h3 class="heading03">ギャラリー</h3>
						<div class="mod-thumb-slick">
							<ul class="thumb-item">
								<?php while(have_rows('gallery')): the_row(); ?>
								<li class="aspect-fix-wrap">
									<p class="aspect-fix pic" style="background-image: url(<?php the_sub_field('pic'); ?>);"></p>
									<p class="caption"><?php the_sub_field('cap'); ?></p>
								</li>
								<?php endwhile; ?>
							</ul>
							<ul class="thumb-item-nav">
								<?php while(have_rows('gallery')): the_row(); ?>
								<li class="aspect-fix-wrap">
									<p class="aspect-fix pic" style="background-image: url(<?php the_sub_field('pic'); ?>);"></p>
								</li>
								<?php endwhile; ?>
							</ul>
						</div>
					</div>

					<div class="block">
						<p class="center"><a href="<?php bloginfo('url');?>/<?php echo CURRENTDIR;?>/" class="button bc-ghost"><?php echo $dirname;?>一覧に戻る<i class="fas fa-undo-alt"></i></a></p>
					</div>

				</div><!-- // contents -->
			</section>
<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>
		</main>

<?php
	if ( $layout == 'has-side' ) {
		include ('assets/modules/mod-side-' . CURRENTDIR . '.php');
	};
?>

	</div><!-- // contents-wrap -->

<?php get_footer();?>
