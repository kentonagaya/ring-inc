<?php if (have_posts()): ?>
					<div class="p-archivelist_b u-narrowcont">
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
		if( $cpost_name == 'post' ) {
			$catcol = get_field ( 'catcol', 'category_' . $term_id );
		} else {
			$catcol = get_field ( 'catcol', $cpost_name.'_cat_' . $term_id );
		}
	}
?>
						<div class="u-frame u-part">
							<a href="<?php the_permalink();?>" class="p-lrbox u-disp_b">
								<div class="p-lrbox__item -l2">
									<div class="p-lrbox__l">
										<div class="u-afix_3">
											<?php if (has_post_thumbnail()) : ?>
											<div class="u-afix__item u-bg_cover" style="background-image: url(<?php the_post_thumbnail_url('thumb640');?>);">
											</div>
											<?php else:?>
											<div class="u-afix__item u-bg_cover" style="background-image: url(<?=HOME;?>dist/img/noimage.png);?>">
											</div>
											<?php endif;?>
										</div>
									</div>
									<div class="p-lrbox__r">
										<div class="p-archivelist_b__header u-supple">
											<p class="_tagcat">
												<time datetime="<?php the_time('Y-m-d');?>"><?php the_time('Y.m.d');?></time>
												<?php if($terms):?>
													<object><a class="u-tx_icon" href="<?php echo $term_link;?>" style="background-color: <?php echo $catcol;?>"><?php echo $term_name;?></a></object>
												<?php endif;?>
											</p>
											<?php
												// POSTのタグ一覧
												if( $post_type == 'post' ) {
													$posttags = get_the_tags();
													if( $posttags ) {
														echo '<ul class="_tags">';
														foreach ( $posttags as $tag ) {
															echo '<li class="_tag"><object><a href="' . get_tag_link( $tag->term_id ) . '">#' . $tag->name . '</a></object></li>';
														}
														echo '</ul>';
													}
												} else {
													if( $ctags ) {
														echo '<ul class="_tags">';
														foreach ( $ctags as $tag ) {
															echo '<li class="_tag"><object><a href="' . get_tag_link( $tag->term_id ) . '">#' . $tag->name . '</a></object></li>';
														}
														echo '</ul>';
													}
												}
											?>
										</div>
										<h3><?php the_title();?></h3>
										<div class="u-texts u-supple">
											<p><?php $excerpt = get_the_excerpt(); echo mb_substr( $excerpt, 0, 80 ); if( mb_strlen( $excerpt ) > 80 ) { echo '...'; } ?></p>
										</div>
									</div>
								</div>
							</a>
						</div>
<?php endwhile; wp_reset_postdata(); ?>
					</div>
<?php endif; ?>
