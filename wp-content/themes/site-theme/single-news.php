<?php
/*--------------------------------------------------------------------------
	Template Name: works-single
---------------------------------------------------------------------------*/

	/* 共通設定読み込み */
	include_once ('assets/class/base.class.php');
	include_once ('assets/class/functions.php');
	include ('assets/settings/site-config.php');

	/* ページ設定 */
	define( 'CURRENTDIR', 'news' );	// ディレクトリ名
	define( 'CURRENTPAGE', 'single' );	// ページ名
	$dirname 		= '新着情報';
	$subtitle 		= 'NEWS';

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
			<section class="contents-wrap page-section" id="top-content1">
				<article class="contents single-article">
<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="page-title">
						<h1 class="heading01"><?php the_title();?></h1>
					</div>
					<div class="block">
						<p class="date right"><i class="far fa-calendar-alt"></i><time datetime="<?php echo the_time('Y-m-d');?>"><?php echo the_time('Y-m-d');?></time></p>
						<?php if (has_post_thumbnail()) : ?>
						<div class="part">
							<p class="fig center"><img class="radius" src="<?php the_post_thumbnail_url();?>" alt="記事 <?php the_title();?>のアイキャッチ画像"></p>
						</div>
						<?php endif; ?>
						<div class="part texts">
							<?php the_content();?>
						</div>
					</div>
<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>
					<div class="block">
						<div class="part">
							<div class="mod-single-aside">
								<h4><i class="fa fa-folder-open" aria-hidden="true"></i>カテゴリー</h4>
								<ul>
									<?php echo get_the_term_list( $post->ID, 'news_category', '<li>', '', '</li>'); ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="block">
						<p class="center"><a href="<?php bloginfo('url');?>/<?php echo CURRENTDIR;?>/" class="button bc-ghost"><?php echo $dirname;?>一覧に戻る<i class="fas fa-undo-alt"></i></a></p>
					</div>
				</article>
			</section>
		</main>

<?php
	if ( $layout == 'has-side' ) {
		include ('assets/modules/mod-side-' . CURRENTDIR . '.php');
	};
?>

	</div><!-- // contents-wrap -->

<?php get_footer();?>
