<?php if (have_posts()): ?>
						<div class="p-archivelist_c">
							<div class="p-clm_<?=$archive_list_type['column'];?> -sp_clear js-eqheight">
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
								<div class="p-clm__item">
									<a href="<?php the_permalink();?>" class="u-disp_b c-card">
										<div class="u-afix_1">
											<?php if (has_post_thumbnail()) : ?>
											<div class="u-afix__item u-bg_cover" style="background-image: url(<?php the_post_thumbnail_url('thumb640');?>);">
												<?php if($terms):?>
												<object><a class="u-tx_icon" href="<?php echo $term_link;?>" style="background-color: <?php echo $catcol;?>"><?php echo $term_name;?></a></object>
												<?php endif;?>
											</div>
											<?php else:?>
											<div class="u-afix__item u-bg_cover" style="background-image: url(<?=HOME;?>dist/img/noimage.png);?>">
												<?php if($terms):?>
												<object><a class="u-tx_icon" href="<?php echo $term_link;?>" style="background-color: <?php echo $catcol;?>"><?php echo $term_name;?></a></object>
												<?php endif;?>
											</div>
											<?php endif;?>
										</div>
										<div class="c-card__cont js-eqh">
											<p class="p-archivelist_c__date u-supple"><time datetime="<?php the_time('Y-m-d');?>"><?php the_time('Y.m.d');?></time></p>
											<p class="p-archivelist_c__ttl u-mb0"><?php the_title();?></p>
											<?php
												// POSTのタグ一覧
												if( $post_type == 'post' ) {
													$posttags = get_the_tags();
													if( $posttags ) {
														echo '<ul class="p-archivelist_c__tags">';
														foreach ( $posttags as $tag ) {
															echo '<li class="_tag"><object><a href="' . get_tag_link( $tag->term_id ) . '">#' . $tag->name . '</a></object></li>';
														}
														echo '</ul>';
													}
												} else {
													if( $ctags ) {
														echo '<ul class="p-archivelist_c__tags">';
														foreach ( $ctags as $tag ) {
															echo '<li class="_tag"><object><a href="' . get_tag_link( $tag->term_id ) . '">#' . $tag->name . '</a></object></li>';
														}
														echo '</ul>';
													}
												}
											?>
										</div>
									</a>
								</div>
<?php endwhile; wp_reset_postdata(); ?>
							</div>
						</div>
<?php endif; ?>
