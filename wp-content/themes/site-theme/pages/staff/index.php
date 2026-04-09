<?php
/**
 * single page template
 *
 * @since site theme X 10.0
 */

	// ページタイトル表示用ディレクトリ名
	define('DIR_NAME',		'スタッフ紹介');
	define('PAGE_SUBTITLE',	'STAFF');

	// サイドバー（不要の場合は値を空白）
	$sidebar_position	= '';

	$post_type = get_currentdir_slug();

	// ヘッダーを読み込み
	get_header();

?>
		<main class="l-main">

			<section class="l-section">
				<div class="l-contents">
<?php if (have_posts()): ?>
					<div class="l-block">
						<div class="l-clm_3 -sp_clear">
<?php while (have_posts()) : the_post(); ?>
							<div class="l-clm__item">
								<a href="<?php the_permalink();?>" class="u-disp_b c-card">
									<div class="u-afix_1">
										<?php if (has_post_thumbnail()) : ?>
										<div class="u-afix__item u-bg_cover" style="background-image: url(<?php the_post_thumbnail_url('thumb640');?>);">
											<?php if( $catcol ):?>
											<object><a class="u-tx_icon" href="<?php echo $term_link;?>" style="background-color: <?php echo $catcol;?>"><?php echo $term_name;?></a></object>
											<?php endif;?>
										</div>
										<?php else:?>
										<div class="u-afix__item u-bg_cover" style="background-image: url(<?=ROOT;?>/assets/images/noimage.png);?>">
											<?php if( $catcol ):?>
											<object><a class="u-tx_icon" href="<?php echo $term_link;?>" style="background-color: <?php echo $catcol;?>"><?php echo $term_name;?></a></object>
											<?php endif;?>
										</div>
										<?php endif;?>
									</div>
									<div class="c-card__cont js-eqh">
										<p class="c-card__ttl"><?php the_title();?></p>
										<p class="u-supple u-mb0"><?php the_field('staff-post');?> / <?php the_field('staff-year');?>入社</p>
									</div>
								</a>
							</div>
<?php endwhile; wp_reset_postdata(); ?>
						</div>
					</div>

					<div class="l-block">
						<?php wp_pagenavi(); ?>
					</div>
<?php else:?>
					<div class="l-block">
						<p class="u-center">まだ投稿がありません。</p>
					</div>
<?php endif; ?>
				</div>
			</section>

		</main>

		<?=get_aside()?>

<?php
	// フッター読み込み
	get_footer();
?>
