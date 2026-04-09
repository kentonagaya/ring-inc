<?php
/*--------------------------------------------------------------------------
	Template Name: news-index
---------------------------------------------------------------------------*/

	/* 共通設定読み込み */
	include_once ('assets/class/base.class.php');
	include_once ('assets/class/functions.php');
	include ('assets/settings/site-config.php');

	/* このページに親がある場合true */
//	$has_parent = true;
	$has_parent = false;

	/* ページ設定 */
	define( 'CURRENTDIR', 'news' );	// ディレクトリ名
	define( 'CURRENTPAGE', 'index' );	// ページ名
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

	// オリジナルヘッダータグ
//	$page_org_tag = '<meta name="robots" content="noindex">';
	$page_org_tag = '';

	// レイアウト個別指定
	$layout			= 'one-column';
//	$layout			= 'has-side';

	// 一覧タイプ
//	$list_type		= '1'; // 写真つき3カラム
//	$list_type		= '2'; // 写真つき横長
	$list_type		= '3'; // テキストのみ

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

<?php if( $list_type == '1' ):?>
			<section class="page-section">
				<div class="contents"><!-- contents -->

					<div class="block">
						<div class="mod-arc-list-1">
							<div class="mod-clm3 sp-clear">
								<ul class="eq-height">
<?php
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	$args = array(
		'paged' => $paged ,
		'post_type' => 'news',
		'posts_per_page' => 10,
//		'cat' => 3,4,5,
	);
	$the_query = new WP_Query($args);
?>
<?php if($the_query->have_posts()): ?>
<?php while($the_query->have_posts()) : $the_query->the_post(); ?>
<?php
	$terms = get_the_terms($post->ID, 'news_category');
	$term_name = $terms[0]->name;
	$term_slug = $terms[0]->slug;
	$term_id   = $terms[0]->term_id;
	$term_link = get_term_link($term_id);
?>
									<li class="list-cont">
										<a class="list-inner disp-block" href="<?php the_permalink();?>">
											<div class="aspect-fix-wrap pic">
												<?php if (has_post_thumbnail()) : ?>
												<div class="aspect-fix bg-cover" style="background-image: url(<?php the_post_thumbnail_url('thumb640');?>);">
													<object><a class="tx-icon cat-<?php echo $term_id;?>" href="<?php echo $term_link;?>"><?php echo $term_name;?></a></object>
												</div>
												<?php else:?>
												<div class="aspect-fix bg-cover" style="background-image: url(<?php bloginfo('template_url');?>/images/noimage.png);?>">
													<object><a class="tx-icon cat-<?php echo $term_id;?>" href="<?php echo $term_link;?>"><?php echo $term_name;?></a></object>
												</div>
												<?php endif;?>
											</div>
											<p class="date"><time datetime="<?php the_time('Y-m-d');?>"><?php the_time('Y.m.d');?></time></p>
											<h3 class="arc-title"><?php the_title();?></h3>
										</a>
									</li>
<?php endwhile; wp_reset_postdata(); ?>
<?php else: endif;?>
							</ul>
						</div>
					</div>

					<div class="block">
						<div class="part center">
							<?php if(function_exists('wp_pagenavi')){wp_pagenavi(array('query'=>$the_query));}?>
						</div>
					</div>

				</div><!-- // contents -->
			</section>
<?php endif;?>

<?php if( $list_type == '2' ):?>
			<section class="page-section">
				<div class="contents"><!-- contents -->

					<div class="block">
						<div class="mod-arc-list-2">
							<ul>
<?php
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	$args = array(
		'paged' => $paged ,
		'post_type' => 'news',
		'posts_per_page' => 10,
//		'cat' => 3,4,5,
	);
	$the_query = new WP_Query($args);
?>
<?php if($the_query->have_posts()): ?>
<?php while($the_query->have_posts()) : $the_query->the_post(); ?>
<?php
	$terms = get_the_terms($post->ID, 'news_category');
	$term_name = $terms[0]->name;
	$term_slug = $terms[0]->slug;
	$term_id   = $terms[0]->term_id;
	$term_link = get_term_link($term_id);
?>
								<li>
									<a class="disp-block list-inner" href="<?php the_permalink();?>">
										<div class="mod-image-texts">
											<div class="image-cont">
												<div class="aspect-fix-wrap">
													<?php if (has_post_thumbnail()) : ?>
													<div class="aspect-fix bg-cover" style="background-image: url(<?php the_post_thumbnail_url('thumb640');?>);">
														<object><a class="tx-icon cat-<?php echo $term_id;?>" href="<?php echo $term_link;?>"><?php echo $term_name;?></a></object>
													</div>
													<?php else:?>
													<div class="aspect-fix bg-cover" style="background-image: url(<?php bloginfo('template_url');?>/images/noimage.png);?>">
														<object><a class="tx-icon cat-<?php echo $term_id;?>" href="<?php echo $term_link;?>"><?php echo $term_name;?></a></object>
													</div>
													<?php endif;?>
												</div>
											</div>
											<div class="texts-cont texts">
												<p class="date"><time datetime="<?php the_time('Y-m-d');?>"><?php the_time('Y.m.d');?></time></p>
												<h3 class="arc-title"><?php the_title();?></h3>
												<div class="text">
													<?php the_excerpt();?>
												</div>
											</div>
										</div>
									</a>
								</li>
<?php endwhile; wp_reset_postdata(); ?>
<?php else: endif;?>
							</ul>
						</div>
					</div>

					<div class="block">
						<div class="part center">
							<?php if(function_exists('wp_pagenavi')){wp_pagenavi(array('query'=>$the_query));}?>
						</div>
					</div>

				</div><!-- // contents -->
			</section>
<?php endif;?>


<?php if( $list_type == '3' ):?>
			<section class="page-section">
				<div class="contents"><!-- contents -->

					<div class="block">
						<div class="mod-arc-list-3">
							<ul>
<?php
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	$args = array(
		'paged' => $paged ,
		'post_type' => 'news',
		'posts_per_page' => 10,
//		'cat' => 3,4,5,
	);
	$the_query = new WP_Query($args);
?>
<?php if($the_query->have_posts()): ?>
<?php while($the_query->have_posts()) : $the_query->the_post(); ?>
<?php
	$terms = get_the_terms($post->ID, 'news_category');
	$term_name = $terms[0]->name;
	$term_slug = $terms[0]->slug;
	$term_id   = $terms[0]->term_id;
	$term_link = get_term_link($term_id);
?>
								<li>
									<p class="date">
										<time datetime="<?php the_time('Y-m-d');?>"><?php the_time('Y.m.d');?></time>&emsp;
										<a class="tx-icon cat-<?php echo $term_id;?>" href="<?php echo $term_link;?>"><?php echo $term_name;?></a></p>
									<p class="arc-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></p>
								</li>
<?php endwhile; wp_reset_postdata(); ?>
<?php else: endif;?>
							</ul>
						</div>
					</div>

					<div class="block">
						<div class="part center">
							<?php if(function_exists('wp_pagenavi')){wp_pagenavi(array('query'=>$the_query));}?>
						</div>
					</div>

				</div><!-- // contents -->
			</section>
<?php endif;?>

		</main>

<?php
	if ( $layout == 'has-side' ) {
		include ('assets/modules/mod-side-' . CURRENTDIR . '.php');
	};
?>

	</div><!-- // contents-wrap -->

<?php get_footer();?>
