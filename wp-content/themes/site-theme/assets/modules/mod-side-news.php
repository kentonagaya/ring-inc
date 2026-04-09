		<aside id="aside" data-frix-scroll-margin-top="<?php echo $side_top_margin;?>">

			<div class="fixedmenu <?php if( $header_type == 'gnav' ){ echo 'header-gnav-in'; };?>">

				<div class="side-contents"><!-- side-contents -->

					<h3 class="heading-side">CATEGORY</h3>

					<nav class="mod-sidenav-standard">
						<ul>
							<?php wp_list_categories(array('title_li' => '', 'taxonomy' => 'news_category', 'show_count' => 0, 'depth' => 1)); ?>
						</ul>
					</nav>

				</div><!-- //side-contents -->

<?php if( CURRENTPAGE == 'single' ):?>
				<div class="side-contents"><!-- side-contents -->
					<h3 class="heading-side">最近の投稿一覧</h3>
					<ul class="mod-side-archive-list">
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
						<li>
							<a href="<?php the_permalink();?>">
								<div class="arc-list-inner">
									<?php if (has_post_thumbnail()) : ?>
									<p class="pic" style="background-image: url(<?php the_post_thumbnail_url('thumb640');?>);"></p>
									<?php else:?>
									<p class="pic" style="background-image: url(<?php bloginfo('template_url');?>/images/noimage.png);?>);"></p>
									<?php endif;?>
									<div class="arc-list-title">
										<p class="title"><?php echo the_title();?></p>
									</div>
								</div>
							</a>
						</li>
<?php endwhile; wp_reset_postdata(); ?>
<?php else: endif;?>
					</ul>
				</div>
<?php endif;?>
			</div>

<?php include ('mod-side-common.php');?>

		</aside>
