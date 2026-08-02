<?php
/*--------------------------------------------------------------------------
	Template Name: news-category
---------------------------------------------------------------------------*/

	/* 共通設定読み込み */
	include_once ('assets/class/base.class.php');
	include_once ('assets/class/functions.php');
	include ('assets/settings/site-config.php');

	/* このページに親がある場合true */
	$has_parent = true;
//	$has_parent = false;

	/* ページ設定 */
	define( 'CURRENTDIR', 'news' );	// ディレクトリ名
	define( 'CURRENTPAGE', 'category' );	// ページ名
	$dirname 		= '新着情報';
	$subtitle 		= 'NEWS';

	/* ページ専用CSS */
	$css = '';
	//$css .= '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/' . CURRENTDIR . '.css" media="all">' . "\n";

	/* ページ専用JS */
	$js = '';
	//$js .= '<script src="' . get_template_directory_uri() . '/js/' . CURRENTDIR . '.js" charset="utf-8"></script>' . "\n";

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
			<div class="mod-breadcrumb">
				<nav>
					<ul>
						<li><a href="<?php bloginfo('url');?>/<?php echo $top_dir;?>"><i class="fas fa-home"></i></a></li>
						<li><a href="<?php bloginfo('url');?>/<?php echo CURRENTDIR;?>"><?php echo $dirname;?></a></li>
						<li>[<?php single_tag_title(); ?>] のニュース一覧</li>
					</ul>
				</nav>
			</div><!-- // breadcrumb -->
		</div>
<?php };?>

	</section><!-- // title-wrap -->

	<div class="contents-wrap <?php echo $layout;?>"><!-- contents-wrap -->

		<main>

			<section class="page-section">
				<div class="contents"><!-- contents -->
					<div class="page-title">
						<h2 class="heading01">［<?php single_tag_title(); ?>］<span class="supple">のニュース一覧</span></h2>
						<?php echo $tag;?>
					</div>

					<div class="block">
						<div class="mod-arc-list-3">
							<ul>
<?php if (have_posts()) : ?>
<?php
	global $query_string;
	query_posts( $query_string . "&posts_per_page=12&paged=".$paged );
	while ( have_posts() ) : the_post()
?>
								<li>
									<p class="date">
										<time datetime="<?php the_time('Y-m-d');?>"><?php the_time('Y.m.d');?></time>&emsp;
									</p>
									<p class="arc-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></p>
								</li>
<?php endwhile; endif; ?>
							</ul>
						</div>
					</div>

					<div class="block">
						<div class="part center">
							<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
						</div>
					</div>

					<div class="block">
						<p class="center"><a href="<?php bloginfo('url');?>/<?php echo CURRENTDIR;?>/" class="button bc-ghost"><?php echo $dirname;?>一覧に戻る<i class="fas fa-undo-alt"></i></a></p>
					</div>

				</div><!-- // contents -->
			</section>

		</main>

<?php
	if ( $layout == 'has-side' ) {
		include ('assets/modules/mod-side-' . CURRENTDIR . '.php');
	};
?>

	</div><!-- // contents-wrap -->

<?php get_footer();?>
