<?php
/**
 * page template
 *
 * @since site theme X 10.0
 */

	// ページタイトル表示用ディレクトリ名
	define('DIR_NAME',		'会社概要');
	define('PAGE_SUBTITLE',	'COMPANY');

	// サイドバー（不要の場合は値を空白）
	$sidebar_position	= '';

	// ヘッダーを読み込み
	get_header();
?>

		<main class="l-main">

			<section class="l-section" id="message">
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
						<div class="l-grid">
							<div class="l-grid__row -half js-scroll_fadeup_order">
								<figure class="u-figure js-fadeup_child"><img src="<?=HOME?>dist/img/dummy.jpg" alt=""></figure>
								<div class="u-gap__l  js-fadeup_child">
									<div class="u-part u-texts">
										<h3 class="u-h2">ここに見出しが入ります、<br>この文章はダミーです</h3>
										<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。</p>
									</div>
									<p class="u-right u-huge"><span class="u-supple">代表取締役社長</span>&emsp;山田 太郎</p>
								</div>
							</div>
						</div>
					</div>

				</div>
			</section>

			<section class="l-section" id="outline">
				<div class="l-contents">

					<div class="l-block js-scroll_fadeup">
						<div class="p-headline">
							<h2 class="p-headline__ttl">
								<span class="p-headline__ttl--main t-font_1">OUTLINE</span>
								<span class="p-headline__ttl--sub">会社概要</span>
							</h2>
						</div>
					</div>
<?php if(have_rows('company-info')): ?>
<?php while(have_rows('company-info')): the_row(); ?>
					<div class="l-block js-scroll_fadeup">
						<div class="l-narrowcont">
							<h3 class="u-h3"><?=the_sub_field('company-info_ttl')?></h3>
							<div class="c-tbl_2 -sp_clear -spslide">
								<table>
<?php if(have_rows('company-info_outline')): ?>
<?php while(have_rows('company-info_outline')): the_row(); ?>
									<tr>
										<th><?php the_sub_field('th'); ?></th>
										<td><?php echo apply_filters('the_content',get_sub_field('td'));?></td>
									</tr>
<?php endwhile; ?>
<?php endif; ?>
								</table>
							</div>
						</div>
					</div>
<?php endwhile; ?>
<?php endif; ?>
				</div>
			</section>

			<section class="l-section" id="access">
				<div class="l-contents">

					<div class="l-block js-scroll_fadeup">
						<div class="p-headline">
							<h2 class="p-headline__ttl">
								<span class="p-headline__ttl--main t-font_1">ACCESS MAP</span>
								<span class="p-headline__ttl--sub">アクセスマップ</span>
							</h2>
						</div>
					</div>

					<div class="l-block u-texts js-scroll_fadeup">
						<address class="u-fa_before"><i class="fas fa-map-marker-alt"></i>〒<?=ZIP?> <?=ADDRESS1?> <?=ADDRESS2?></address>
						<div class="u-part u-iframe_wrap">
							<iframe class="gmap" width="600" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.jp/maps?q=<?=ADDRESS1?>&output=embed&t=m&z=16"></iframe>
						</div>
						<p class="u-right"><a class="c-btn -small u-fa_before" href="https://maps.google.co.jp/maps/search/<?=ADDRESS1?>" target="_blank" rel="nofollow"><i class="fas fa-map-marker-alt"></i>Google Mapで見る</a></p>
					</div>

				</div>
			</section>


		</main>

		<?=get_aside()?>

<?php
	// フッターを読み込み
	get_footer();
?>