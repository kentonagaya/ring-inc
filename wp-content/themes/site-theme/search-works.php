<?php
/*--------------------------------------------------------------------------
	Template Name: works-search
---------------------------------------------------------------------------*/

	/* 共通設定読み込み */
	include_once ('assets/class/base.class.php');
	include_once ('assets/class/functions.php');
	include ('assets/settings/site-config.php');

	/* このページに親がある場合true */
//	$has_parent = true;
	$has_parent = false;

	/* ページ設定 */
	define( 'CURRENTDIR', 'works' );	// ディレクトリ名
	define( 'CURRENTPAGE', 'search' );	// ページ名
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
//	$layout			= 'one-column';
	$layout			= 'has-side';

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
						<li>検索結果</li>
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

					<div class="block">
						<h1 class="heading01">検索結果</h1>
					</div>

<?php
	## 検索結果テンプレート
	global $wp_query;
	$total_results = $wp_query->found_posts;
?>
					<div class="block mod-search-results">
<?php if($total_results == 0){?>
							<div class="part search-result texts">
								<h3>検索結果はありません。</h3>
							</div>
<?php };?>
<?php query_posts($query_string.'&posts_per_page=-1'); ?>
<?php while (have_posts()) : the_post(); ?>
							<div class="part search-result texts">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<p class="supple"><a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a></p>
								<?php the_excerpt();?>
							</div>
<?php endwhile; ?>
					</div>

					<div class="block">
						<p class="center"><a href="<?php bloginfo('url');?>/works/" class="button bc-ghost"><?php echo $dirname;?>一覧に戻る<i class="fas fa-undo-alt"></i></a></p>
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
