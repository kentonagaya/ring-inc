<?php
/*--------------------------------------------------------------------------
	Template Name: faq-index
---------------------------------------------------------------------------*/

	/* 共通設定読み込み */
	include_once ('assets/class/base.class.php');
	include_once ('assets/class/functions.php');
	include ('assets/settings/site-config.php');

	/* このページに親がある場合true */
//	$has_parent = true;
	$has_parent = false;

	/* ページ設定 */
	define( 'CURRENTDIR', 'faq' );	// ディレクトリ名
	define( 'CURRENTPAGE', 'index' );	// ページ名
	$dirname 		= 'よくあるご質問';
	$subtitle 		= 'FAQ';

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
<?php
			$current_layer		= 2;			// 階層指定
			$parent_dir_name	= 'directory';	// 階層数が`4`の場合のみ指定
			$parent_layer_name	= '親階層名';		// 階層数が`4`の場合のみ指定
			include ("assets/modules/breadcrumb.php");
?>
		</div>
<?php };?>

	</section><!-- // title-wrap -->

	<div class="contents-wrap <?php echo $layout;?>"><!-- contents-wrap -->

		<main>

			<section class="page-section">
				<div class="contents"><!-- contents -->

					<div class="block">
						<div class="mod-pagenavi-standard">
							<nav>
								<ul>
<?php
    $customPostType = get_post_type();
    $termsss = get_terms( 'faq_category' );
    foreach ($termsss as $termss){
        $term_id = $termss->term_id;
        $term_name = $termss->name;
?>
									<li><a class="button scroll-btn" href="#cat-<?php echo $term_id;?>"><i class="fas fa-tag"></i><?php echo $term_name; ?></a></li>
<?php };?>
								</ul>
							</nav>
						</div>
					</div>

<?php
    $customPostType = get_post_type();
    $termsss = get_terms( 'faq_category' );
    foreach ($termsss as $termss){
        $term_id = $termss->term_id;
        $term_name = $termss->name;
?>
                    <div class="block" id="cat-<?php echo $term_id;?>">
                        <h2 class="heading01"><?php echo $term_name; ?></h2>
                        <div class="mod-archive-list-2">
                            <ul>
<?php
    $args=array(
        'tax_query' => array(
            array(
                'taxonomy' => 'faq_category',
                'field' => 'term_id',
                'terms' => array( $term_id )
            ),
        ),
        'post_type' => 'faq',
        'posts_per_page'=> -1
    );
?>
<?php query_posts( $args ); ?>
<?php if(have_posts()): ?>
<?php while(have_posts()):the_post(); ?>
                                <div class="part mod-faq-block">
									<div class="faq-set texts">
										<h3 class="faq-heading"><?php the_title();?></h3>
										<div class="faq-answer">
											<div class="mod-arrow-left radius">
												<div class="arrow-content texts">
													<?php the_content();?>
												</div>
											</div>
										</div>
									</div>
								</div>
<?php endwhile; endif; ?>
                            </ul>
                        </div>
                    </div>
<?php } wp_reset_query(); ?>

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
