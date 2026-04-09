<?php
/**
 * page template
 *
 * @since site theme X 10.0
 */

	// ページタイトル表示用ディレクトリ名
	define('DIR_NAME',		'採用情報');
	define('PAGE_SUBTITLE',	'RECRUIT');

	// サイドバー（不要の場合は値を空白）
	$sidebar_position	= '';

	// ヘッダーを読み込み
	get_header();
?>

		<main class="l-main">

			<section class="l-section">
				<div class="l-contents">

					<div class="l-block js-scroll_fadeup">
						<div class="p-headline">
							<h2 class="p-headline__ttl">
								<span class="p-headline__ttl--main t-font_1">MESSAGE</span>
								<span class="p-headline__ttl--sub">ご挨拶</span>
							</h2>
						</div>
					</div>

					<div class="l-block">
						<div class="l-lrbox">
							<div class="l-part l-lrbox__item -sp_clear js-scroll_fadeup_order">
								<div class="l-lrbox__l js-fadeup_child">
									<figure class="u-figure"><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
								</div>
								<div class="l-lrbox__r js-fadeup_child u-texts">
									<h2 class="u-h2">ここにキャッチコピーが入ります。<br>この文章はダミーです。</h2>
									<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。この文章はダミ百三拾この文章はダミ百四拾自分に見ですの百五拾うど偶然へよく百六拾同時に嘉納さん百七拾係壇ああ見当に百八拾し人その主義私百九拾をについご盲従弐百。</p>
									<p class="u-right u-font_min"><span class="u-supple">代表取締役社長</span>&emsp;山田 太郎</p>
								</div>
							</div>
						</div>
					</div>

				</div>
			</section>

			<section class="l-section" id="staff">
				<div class="l-contents">

					<div class="l-block js-scroll_fadeup">
						<div class="p-headline">
							<h2 class="p-headline__ttl">
								<span class="p-headline__ttl--main t-font_1">STAFF</span>
								<span class="p-headline__ttl--sub">スタッフ紹介</span>
							</h2>
						</div>
					</div>

					<div class="l-block">
						<div class="l-clm_3 -sp2 js-eqheight js-scroll_fadeup_order">
<?php
    $args = array(
		'post_type' => 'staff',
		'posts_per_page'  => '6'
	);
    $the_query = new WP_Query($args);
?>
<?php if($the_query->have_posts()): ?>
<?php while($the_query->have_posts()) : $the_query->the_post(); ?>
							<div class="l-clm__item js-fadeup_child">
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
<?php endwhile; endif; wp_reset_postdata(); ?>
						</div>
					</div>

					<div class="l-block u-center js-scroll_fadeup">
						<a href="<?=HOME?>staff/" class="c-btn -huge">スタッフ紹介</a>
					</div>

				</div>
			</section>

<?php
    $args = array(
		'post_type' => 'admission',
		'posts_per_page'  => '-1'
	);
    $the_query = new WP_Query($args);
?>
<?php if($the_query->have_posts()): ?>
			<section class="l-section">
				<div class="l-contents">

					<div class="l-block js-scroll_fadeup">
						<div class="p-headline">
							<h2 class="p-headline__ttl">
								<span class="p-headline__ttl--main t-font_1">ADMISSION</span>
								<span class="p-headline__ttl--sub">募集要項</span>
							</h2>
						</div>
					</div>

					<div class="l-block js-scroll_fadeup">
<?php while($the_query->have_posts()) : $the_query->the_post(); ?>
						<div class="l-part p-jq_accordion">
							<h3 class="p-jq_accordion__toggle"><?php the_title();?></h3>
							<div class="p-jq_accordion__cont">
								<div class="c-tbl_1">
									<table>
<?php if(have_rows('admission')): ?>
<?php while(have_rows('admission')): the_row(); ?>
										<tr>
											<th><?php the_sub_field('th'); ?></th>
											<td><?php the_sub_field('td'); ?></td>
										</tr>
<?php endwhile; ?>
<?php endif; ?>
									</table>
								</div>
							</div>
						</div>
<?php endwhile;?>
					</div>

				</div>
			</section>
<?php endif; wp_reset_postdata();?>
			<section class="l-section" id="section_flow">
				<div class="l-contents">

					<div class="l-block js-scroll_fadeup">
						<div class="p-headline">
							<h2 class="p-headline__ttl">
								<span class="p-headline__ttl--main t-font_1">FLOW</span>
								<span class="p-headline__ttl--sub">採用の流れ</span>
							</h2>
						</div>
					</div>

					<div class="l-block js-scroll_fadeup">
						<div class="p-flow_horizontal js-eqheight js-scroll_fadeup_order">
<?php
	$coltit = array(
		'会社説明会',
		'エントリー',
		'書類選考',
		'一次面接',
		'筆記試験',
		'二次面接',
		'採用'
	);
	$colsub = array(
		'句読点を入て拾文字、ここまでで二拾。',
		'句読点を入て拾文字。',
		'句読点を入て拾文字、ここまでで二拾文字。',
		'句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾。',
		'句読点を入て拾文字。',
		'句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾。',
		'句読点を入て拾文字、ここまでで二拾文字。'
	);
	for($i = 0 ; $i < count( $coltit ); $i++):
?>


								<div class="p-flow_horizontal__item js-fadeup_child">
									<div class="p-flow_horizontal__cont u-fcenter js-eqh">
										<div class="p-flow_horizontal__text u-center">
											<h3 class="u-h5"><?php echo $coltit[$i];?></h3>
											<p class="u-supple u-mb0"><?php echo $colsub[$i];?></p>
										</div>
									</div>
								</div>
<?php endfor;?>
						</div>
					</div>

					<div class="l-block u-center">
						<a href="<?=HOME?>contact/" class="c-btn -huge">エントリー</a>
					</div>

				</div>
			</section>

		</main>

		<?=get_aside()?>

<?php
	// フッターを読み込み
	get_footer();
?>