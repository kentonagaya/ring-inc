<?php if (have_posts()): ?>
						<div class="p-archivelist_a u-narrowcont">
<?php while (have_posts()) : the_post(); ?>
<?php
	if( is_archive() | is_tag() ){
		if( $post_type == 'post' ) {
			$terms = get_the_terms( $post->ID, 'category' );
		} else {
			$terms = get_the_terms( $post->ID, $post_type.'_cat' );
			$ctags = get_the_terms( $post->ID, $post_type.'_tag' );
		}
		$term_name = $terms[0]->name;
		$term_slug = $terms[0]->slug;
		$term_id   = $terms[0]->term_id;
		$term_link = get_term_link($term_id);
		if( $post_type == 'post' ) {
			$catcol = get_field ( 'catcol', 'category_' . $term_id );
		} else {
			$catcol = get_field ( 'catcol', $cpost_name.'_cat_' . $term_id );
		}
	}
?>
							<div class="p-archivelist_a__cont">
								<div class="u-supple u-mb5">
									<time datetime="<?php the_time('Y-m-d');?>"><?php the_time('Y.m.d');?></time>
									<?php if($terms):?>
										&nbsp;<a class="u-tx_icon" href="<?php echo $term_link;?>" style="background-color: <?php echo $catcol;?>"><?php echo $term_name;?></a>
									<?php endif;?>
									<?php
										// POSTのタグ一覧
										if( $post_type == 'post' ) {
											$posttags = get_the_tags();
											if( $posttags ) {
												echo '<ul class="_tags">';
												foreach ( $posttags as $tag ) {
													echo '<li class="_tag"><a href="' . get_tag_link( $tag->term_id ) . '">#' . $tag->name . '</a></li>';
												}
												echo '</ul>';
											}
										} else {
											if( $ctags ) {
												echo '<ul class="_tags">';
												foreach ( $ctags as $tag ) {
													echo '<li class="_tag"><a href="' . get_tag_link( $tag->term_id ) . '">#' . $tag->name . '</a></li>';
												}
												echo '</ul>';
											}
										}
									?>
								</div>
								<p class="_link">
									<a href="<?php the_permalink();?>"><?php the_title();?></a>
								</p>
							</div>
<?php endwhile; wp_reset_postdata(); ?>
						</div>
<?php else:?>
					<p class="u-center">まだ投稿がありません。</p>
<?php endif; ?>
