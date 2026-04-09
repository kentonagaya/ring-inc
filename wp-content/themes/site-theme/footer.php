<?php
/*--------------------------------------------------------------------------
	Template Name: footer
---------------------------------------------------------------------------*/
	include ("assets/settings/site-config.php");
?>
	<footer>
<?php

	## サイド固定ナビの表示
	$side_fixed_banner = false;
#	$side_fixed_banner = true;

	## フッター問い合わせエリアの表示
//	$footer_contact_area = false;
	$footer_contact_area = true;

?>
		<?php if( $side_fixed_banner == true ):?>
		<div class="mod-side-edge-banner">
			<ul>
				<li class="sns-line">
					<a href="" target="_blank" rel="nofollow">
						<i><img src="<?php bloginfo('template_url');?>/images/mod/icon-line.svg" alt="LINE"></i>
						<span class="wm-vertical">LINE@ はこちら！</span>
					</a>
				</li>
				<li class="contact">
					<a href="<?php bloginfo('url');?>/contact/">
						<i class="fas fa-envelope"></i>
						<span class="wm-vertical">お問い合わせはこちら</span>
					</a>
				</li>
			</ul>
		</div>
		<?php endif;?>

		<?php if( $footer_contact_area == true ):?>
		<section class="mod-footer-contact">
			<div class="contents">
				<div class="cover">
					<div>
						<h2>お問い合わせ</h2>
						<p class="text">お電話またはWebフォームよりお問合せ下さい。</p>
					</div>
					<ul>
						<li>
							<h3>お電話から</h3>
							<p class="fmod-contact-tel font-designed"><i class="fas fa-phone"></i><?php echo $phone_num_2;?></p>
							<p class="sp-fmod-contact-tel"><a class="button font_designed" href="tel:<?php echo $phone_num_2;?>"><i class="fas fa-phone"></i><?php echo $phone_num_2;?></a></p>
							<p class="fmod-contact-notice"><i class="far fa-clock"></i><?php echo $open_time_1;?><?php echo $close_day_1;?></p>
						</li>
						<li>
							<h3>Webフォームから</h3>
							<p class="fmod-contact-mail"><a class="button" href="<?php bloginfo('url');?>/contact/"><i class="fas fa-envelope"></i>お問い合わせ</a></p>
						</li>
					</ul>
				</div>
			</div>
		</section>
		<?php endif;?>

		<section class="footer-wrap"><!-- footer-wrap -->

			<div class="site-footer"><!-- site-footer -->

				<div class="mod-footer-standard">

					<div class="profile-part">

						<p class="footer-name"><?php echo $site_name;?></p>

						<address><i class="fas fa-map-marker-alt"></i><?php echo $zip_1;?> <?php echo $address_1_a;?> <br class="sp-br"><?php echo $address_1_b;?></address>

<?php if( is_pc()|is_tb() ){ ?>
						<p class="tel"><i class="fas fa-phone"></i><?php echo $phone_num_1;?>&emsp;<i class="fas fa-fax"></i><?php echo $fax_num_1;?></p>
<?php };?>

<?php if( is_sp() ){ ?>
						<p class="tel"><a class="button radius" href="tel:<?php echo $phone_num_2;?>"><i class="fas fa-phone"></i><?php echo $phone_num_2;?></a></p>
						<p class="tel"><i class="fas fa-fax"></i><?php echo $fax_num_1;?></a></p>
<?php };?>

						<p class="opentime"><i class="far fa-clock"></i>営業時間：<?php echo $open_time_1;?><?php echo $close_day_1;?></p>

					</div>

					<div class="nav-part">

						<nav class="footer-sitenav">
<?php include ("assets/settings/sitemap.php");?>
						</nav>

						<!--<ul class="footer-sns">
							<li><a href="" target="_blank" rel="nofollow"><i class="fab fa-facebook-square"></i></a></li>
							<li><a href="" target="_blank" rel="nofollow"><i class="fab fa-twitter-square"></i></a></li>
							<li><a href="" target="_blank" rel="nofollow"><i class="fab fa-instagram"></i></a></li>
							<li><a href="" target="_blank" rel="nofollow"><i class="fab fa-line"></i></a></li>
						</ul>-->

					</div>

				</div>

			</div><!-- site-footer -->

		</section><!-- // footer-wrap -->

		<section class="copyright-wrap center">
			<small>Copyright &copy; <?php if( $copyright_issue !== '' ){ echo $copyright_issue . ' - '; };?><?php echo date('Y'); ?> <?php echo $copyright;?> All Rights Reserved.</small>
		</section>

	</footer>

	<div class="pagetop"><a href=".container"><i class="fas fa-arrow-up"></i></a></div>

</div><!-- // contentainer -->
<?php wp_footer();?>
</body>
</html>