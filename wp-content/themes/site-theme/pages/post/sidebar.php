<?php
/*--------------------------------------------------------------------
	sidebar
--------------------------------------------------------------------*/

	global $post_type;

	// タグクラウドを表示するか
	$tag_cloud = true;

?>
<aside class="l-aside">

	<div class="l-block">
		<div class="p-sidenav_search">
			<form method="get" id="<?=$post_type?>_search" class="searchform" action="<?=HOME?>">
				<input type="text" name="s" id="<?=$post_type?>_search_input" value="<?php the_search_query(); ?>" class="searchfield" placeholder="キーワード検索">
				<input type="hidden" name="post_type" value="<?=$post_type?>" class="hidden-input">
				<input type="submit" value="&#xf002;" accesskey="f" class="searchsubmit">
			</form>
		</div>
	</div>

	<div class="l-block">
		<h3 class="u-h5 u-center t-font_1">CATEGORY</h3>
		<nav class="p-sidenav_normal">
			<ul>
				<?php
					if( $post_type == 'post' ){
						$category_name = 'category';
					} else {
						$category_name = $post_type.'_cat';
					}
					wp_list_categories(array('title_li' => '', 'taxonomy' => $category_name, 'show_count' => 0, 'depth' => 1));
				?>
			</ul>
		</nav>
	</div>

<?php
	// POSTのタグクラウド
	if( $post_type == 'post' && $tag_cloud ):?>
	<div class="l-block">
		<h3 class="u-h5 u-center t-font_1">TAGS</h3>
		<div class="c-card">
			<div class="c-card__cont">
				<div class="p-tagcloud">
					<?php wp_tag_cloud('smallest=9 & largest=14');?>
				</div>
			</div>
		</div>
	</div>
<?php
	// カスタム投稿のタグクラウド
	elseif( $post_type !== 'post' && $tag_cloud ):?>
	<div class="l-block js-cposttag">
		<h3 class="u-h5 u-center t-font_1">TAGS</h3>
		<div class="c-card">
			<div class="c-card__cont">
				<div class="p-tagcloud">
					<?php wp_tag_cloud(
						array(
							'taxonomy' => $post_type.'_tag',
							'largest' => '14',
							'smallest' => '9',
							'unit'  => 'px'
							)
						);
					?>
				</div>
			</div>
		</div>
	</div>
<?php endif;?>

<?php if( is_single() | is_tax() ):?>
	<div class="l-block"><!-- side-contents -->
		<h3 class="u-h5 u-center t-font_1">RECENT POSTS</h3>
		<nav class="p-sidenav_imt">
			<ul>
<?php
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	$args = array(
		'paged' => $paged ,
		'post_type' => $post_type,
		'posts_per_page' => 10,
//		'cat' => 3,4,5,
	);
	$the_query = new WP_Query($args);
?>
<?php if($the_query->have_posts()): ?>
<?php while($the_query->have_posts()) : $the_query->the_post(); ?>
				<li>
					<a href="<?php the_permalink();?>">
						<div class="_inner">
							<?php if (has_post_thumbnail()) : ?>
							<div class="_image" style="background-image: url(<?php the_post_thumbnail_url('thumb640');?>);"></div>
							<?php else:?>
							<div class="_image" style="background-image: url(<?=HOME?>dist/img/noimage.png);?>);"></div>
							<?php endif;?>
							<div class="_title">
								<p><?php echo the_title();?></p>
							</div>
						</div>
					</a>
				</li>
<?php endwhile; wp_reset_postdata(); ?>
<?php else: endif;?>
			</ul>
		</nav>
	</div>
<?php endif;?>
</aside>
