<?php
/**
 * single page template
 *
 * @since site theme X 10.0
 */

	// ページタイトル表示用ディレクトリ名
	define('DIR_NAME',		'よくあるご質問');
	define('PAGE_SUBTITLE',	'FAQ');

	// サイドバー（不要の場合は値を空白）
	$sidebar_position	= '';

	$post_type = get_currentdir_slug();

	// ヘッダーを読み込み
	get_header();

?>
		<main class="l-main">

			<section class="l-section">
				<div class="l-contents">

					<div class="l-block">
						<div class="p-catlist">
<?php
	$terms = get_terms( $post_type.'_cat', array('hide_empty' => false) );
	foreach($terms as $term):
		$term_id   = $term->term_id;
		$term_slug = $term->slug;
		$term_name = $term->name;
		$term_link = get_term_link($term_id);
?>
							<a href="#cat-<?=$term_slug?>" class="p-catlist__item u-fa_after"><?=$term_name?><i class="fas fa-arrow-alt-circle-down"></i></a>
<?php endforeach;?>
						</div>
					</div>

<?php
    $terms = get_terms($post_type.'_cat');
    foreach ($terms as $term){
        $term_id = $term->term_id;
		$term_slug = $term->slug;
        $term_name = $term->name;
?>
                    <div class="l-block" id="cat-<?php echo $term_slug;?>">
                        <h2 class="u-h2 t-ttl_1"><?php echo $term_name; ?></h2>
<?php
    $args=array(
        'tax_query' => array(
            array(
                'taxonomy' => $post_type.'_cat',
                'field' => 'term_id',
                'terms' => array( $term_id )
            ),
        ),
        'post_type' => $post_type,
        'posts_per_page'=> -1
    );
?>
<?php query_posts( $args ); ?>
<?php if(have_posts()): ?>
<?php while(have_posts()):the_post(); ?>
						<div class="part p-faq">
							<div class="p-faq__cont texts">
								<div class="p-jq_accordion">
									<div class="p-jq_accordion__toggle">
										<h3 class="u-h3 u-mb0">
											<span class="p-faq__ttl"><?php the_title();?></span>
										</h3>
									</div>
									<div class="p-jq_accordion__cont">
										<div class="p-faq__text">
											<div class="c-baloon -left u-radius u-texts">
												<?php the_content();?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
<?php endwhile; endif; ?>
                    </div>
<?php } wp_reset_query(); ?>


				</div>
			</section>

		</main>

		<?=get_aside()?>

<?php
	// フッター読み込み
	get_footer();
?>
