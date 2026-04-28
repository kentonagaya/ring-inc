<?php
/*--------------------------------------------------------------------------
	Template Name: index
---------------------------------------------------------------------------*/

	/* 共通設定読み込み */
	include_once ('assets/class/base.class.php');
	include_once ('assets/class/functions.php');
	include ('assets/settings/site-config.php');

	/* このページに親がある場合true */
	$has_parent = false;

	/* ページ設定 */
	define( 'CURRENTDIR', 'top' );	// ディレクトリ名
	define( 'CURRENTPAGE', 'index' );	// ページ名
	$dirname 		= 'ディレクトリ名';

	/* ページ専用CSS */
	$css = '';
	$css .= '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/lib/slick.css" media="all">' . "\n";
	$css .= '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/lib/slick-theme.css" media="all">' . "\n";

	/* ページ専用JS */
	$js = '';
	$js .= '<script src="' . get_template_directory_uri() . '/js/lib/slick.min.js"></script>' . "\n";
	$js .= '<script src="' . get_template_directory_uri() . '/js/' . CURRENTDIR . '.js"></script>' . "\n";

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
	<section class="promo-wrap <?php if ( $gnav_pos == 'header-fixed' ) { echo 'header-fixed'; };?>">
		<div class="mod-promo-slick slick-slider <?php echo switch_ua('','is_tb','');?>">
			<div class="slider-content slider01">
				<div class="promo">
					<div class="promo-catch">
						<img src="<?php bloginfo('template_url');?>/images/promo-catch<?php echo switch_ua( '', '', '-sp' );?>.svg" alt="一人一人の個性に合わせてサポートを">		
					</div>
				</div>
			</div>
			<div class="slider-content slider02">
				<div class="promo">
					<div class="promo-catch">
						<img src="<?php bloginfo('template_url');?>/images/promo-catch<?php echo switch_ua( '', '', '-sp' );?>.svg" alt="一人一人の個性に合わせてサポートを">					
					</div>					
				</div>
			</div>	
			<div class="slider-content slider03">
				<div class="promo">
					<div class="promo-catch">
						<img src="<?php bloginfo('template_url');?>/images/promo-catch<?php echo switch_ua( '', '', '-sp' );?>.svg" alt="一人一人の個性に合わせてサポートを">					
					</div>					
				</div>
			</div>			
		</div>

	</section>

<?php if( $header_type == 'standard' && $gnav_pos == 'promo-fixed' ): ?>
	<section class="gnav-wrap"><!-- gnav-wrap -->
		<div class="gnav">
			<nav class="mod-gnav-standard">
<?php include ("assets/settings/sitemap.php");?>
			</nav>
		</div>
	</section><!-- // gnav-wrap -->
<?php endif;?>

	<div class="contents-wrap <?php echo $layout;?>"><!-- contents-wrap -->

		<main>

			<section class="page-section bg-cover bg-atfix" id="top-intro">

				<div class="contents fadeup"><!-- contents -->

					<!--<div class="hgroup">
						<div class="mod-contents-header">
							<p class="header-title font-designed center">ABOUT</p>
							<h2 class="subtitle center">テンプレート概要</h2>
						</div>
					</div>-->

					<div class="block">
						<div class="mod-uneven-column eq-height">
							<div class="left-column item-eq-height">
								<p class="pic"><img src="<?php bloginfo('template_url');?>/images/top-about.jpg" alt=""></p>
							</div>
							<div class="right-column item-eq-height">
								<div class="column-inner">
									<h4 class="heading03">地域密着型<br>一人一人の個性に合わせて一貫したサポートを</h4>
									<p class="text">大阪府下、京都・兵庫などの私立病院への医師・管理医師・看護師・薬剤師、他医療有資格者の有料職業紹介事業を行っております。
													職業紹介希望の皆様には、実際お会いして経験や経歴、ご要望等を全てお伺いし、年収アップ、ミスマッチのない最適な職場をご紹介しています。</p>
								</div>
							</div>
						</div>
					</div>
					<div class="block mbcut">
						<p class="section-more center"><a href="<?php bloginfo('url');?>/company/" class="button bc-ghost">会社案内へ<i class="fas fa-chevron-right"></i></a></p>
					</div>
				</div>
			</section>
			<section class="page-section bg-cover bg-atfix" id="top-service">
				<div class="contents fadeup white-text"><!-- contents -->
					<div class="hgroup">
						<div class="mod-contents-header">
							<p class="header-title font-designed center">SERVICE</p>
							<h2 class="subtitle center">事業案内</h2>
						</div>
					</div>
					<div class="block">
						<div class="mod-clm3 sp-clear">
							<ul class="eq-height">
								<li class="list-cont">
									<div class="list-inner texts">
										<p class="pic"><img src="<?php bloginfo('template_url');?>/images/top-nursinghome.jpg" alt="高齢者トータルサポート"></p>
										<h3 class="heading04 center">高齢者トータルサポート</h3>
										<p class="mb30 item-eq-height">医療現場で勤務経験のある専門スタッフが在住しており、専門的な相談が可能です。お客様のニーズに応じて心安らぐ、最適な施設のご紹介をさせて頂きます。</p>
										<p class="section-more center"><a href="<?php bloginfo('url');?>/nursinghome/" class="button">詳しく見る<i class="fas fa-chevron-right"></i></a></p>
									</div>
								</li>
								<li class="list-cont">
									<div class="list-inner texts">
										<p class="pic"><img src="<?php bloginfo('template_url');?>/images/top-realestate.jpg" alt="不動産紹介事業"></p>
										<h3 class="heading04 center">不動産紹介事業</h3>
										<p class="mb30 item-eq-height">経験豊富なスタッフが一人一人のニーズに合わせてきめ細やかな対応でサポート致します。売りたい時、買いたい時。貸したい時、借りたい時。その間に立ち、皆さまに満足していただける安心で安全な取引をかなえます。</p>
										<p class="section-more center"><a href="<?php bloginfo('url');?>/realestate/" class="button mbcut">詳しく見る<i class="fas fa-chevron-right"></i></a></p>
									</div>
								</li>
								<li class="list-cont">
									<div class="list-inner texts">
										<p class="pic"><img src="<?php bloginfo('template_url');?>/images/top-resources.jpg" alt="人材紹介"></p>
										<h3 class="heading04 center">人材紹介</h3>
										<p class="mb30 item-eq-height">豊富な情報力をもって有能で即戦力となる人材をご紹介致します。企業様の経営方針や採用状況を理解し、事業戦略に沿う候補者をご紹介させて頂きます。</p>
										<p class="section-more center"><a href="<?php bloginfo('url');?>/resources/" class="button">詳しく見る<i class="fas fa-chevron-right"></i></a></p>
									</div>
								</li>
							</ul>
						</div>
					</div>
					
				</div>
			</section>
			
			<section class="page-section bg-light" id="top-news">
				<div class="contents fadeup"><!-- contents -->
					<div class="hgroup">
						<div class="mod-contents-header">
							<p class="header-title font-designed center">NEWS</p>
							<h2 class="subtitle center">お知らせ</h2>
						</div>
					</div>
					<div class="block">
						<div class="mod-arc-list-2">
							<ul>
<?php
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	$args = array(
		'paged' => $paged ,
		'post_type' => 'news',
		'posts_per_page' => 6,
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
												<h4 class="arc-title"><?php the_title();?></h4>
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

					<div class="block mbcut">
						<p class="section-more center"><a href="<?php bloginfo('url');?>/news/" class="button bc-ghost">記事一覧<i class="fas fa-chevron-right"></i></a></p>
					</div>

				</div>

			</section>

			

		</main>

<?php
	if ( $layout == 'has-side' ) {
		include ('assets/modules/mod-side-' . CURRENTDIR . '.php');
	};
?>

	</div><!-- // contents-wrap -->

<?php get_footer();?>
