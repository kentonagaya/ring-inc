<?php
/*--------------------------------------------------------------------------
	Template Name: footer
---------------------------------------------------------------------------*/
	include ("assets/settings/site-config.php");
?>
<body id="<?php echo CURRENTDIR;?>-body" class="<?php echo switch_ua('','','drawer drawer--top');?>">
<?php if( is_home() && $top_loading == true ):?>
<script>
	$(window).load(function(){
		$('.loading').delay(0).fadeOut(500);
	});
	function stopload(){
		$('.loading').delay(0).fadeOut(500);
	}
	setTimeout('stopload()',10000);
</script>
<div class="loading">
	<img src="<?php bloginfo('template_url'); ?>/images/lib/default-gray.svg" alt="Now Loading">
</div>
<?php endif;?>
<div class="container" id="<?php echo CURRENTDIR;?>-<?php echo CURRENTPAGE;?>-container"><!-- contentainer -->

	<header id="page-header" class="<?php if ( $header_fix == true ) { echo "header-fix"; };?> <?php if ( $gnav_pos == 'header-fixed' ) { echo "gn-header-fix"; };?>">

<?php
	// スクロールでヘッダーの背景色を変更
	//$scroll_changebg = true;
	$scroll_changebg = false;
?>
		<section class="header-wrap <?php if($scroll_changebg == true){ echo 'scroll-change-headerbg'; }?> <?php echo switch_ua('pc-header','pc-header','');?>"><!-- header-wrap -->
			<div class="site-header fullwidth"><!-- site-header -->

				<div class="mod-header-gnav"><!-- mod-header-scroll-cc -->
					<div class="logo-part">
						<p class="header-logo">
							<a href="<?php bloginfo('url'); ?>/<?php echo $top_dir;?>">
								<?php if( CURRENTDIR == 'top' && is_pc() | is_tb() && $gnav_pos !== 'header-fixed' && $scroll_changebg == true ):?>
									<img src="<?php bloginfo('template_url'); ?>/images/header-logo-white.svg" alt="<?php echo $site_name;?>">
								<?php else:?>
								<img src="<?php bloginfo('template_url'); ?>/images/header-logo-normal.svg" alt="<?php echo $site_name;?>">
				<?php endif;?>
							</a>
						</p>
					</div>

					
					<div class="modules-part">
					<div class="modules-part">

						<div class="modules-part">

							<?php if( $header_type == 'gnav' ): ?>
								<div class="row gnav-part">
									<nav class="mod-gnav-in-header">
										<?php include ("assets/settings/sitemap.php");?>
									</nav>
								</div>
							<?php endif;?>

							<?php if( $header_type == 'standard' ): ?>
								<div class="row mod-header-phone">
									<p class="phone-number font-designed fa-before"><i class="fas fa-phone"></i><?php echo $phone_num_1;?></p>
									<p class="opentime">営業時間：<?php echo $open_time_1;?><?php echo $close_day_1;?></p>
								</div>
							<?php endif;?>

								<div class="row contact-part">
									<a href="<?php bloginfo('url'); ?>/contact/" class="button fa-before"><i class="fas fa-envelope"></i>お問い合わせ</a>
								</div>
						</div>
					
				</div><!-- // mod-header-scroll-cc -->
			</div><!-- // site-header -->

		</section><!-- // header-wrap -->

<?php if( $header_type == 'standard' && $gnav_pos == 'header-fixed' ): // TOP用分岐 ?>
		<section class="gnav-wrap"><!-- gnav-wrap -->
			<div class="gnav">
				<nav class="mod-gnav-standard">
<?php include ("assets/settings/sitemap.php");?>
				</nav>
			</div>
		</section><!-- // gnav-wrap -->
<?php elseif( CURRENTDIR !== 'top' && $header_type == 'standard' ): // 下層用指定 ?>
		<section class="gnav-wrap"><!-- gnav-wrap -->
			<div class="gnav">
				<nav class="mod-gnav-standard">
<?php include ("assets/settings/sitemap.php");?>
				</nav>
			</div>
		</section><!-- // gnav-wrap -->
<?php endif;?>

<?php if( is_sp() ){ ?>
<script>
	$(function() {
		$(document).ready(function() {
			$('.drawer').drawer();
		});
	});
</script>
		<div class="mod-gnav-sp">
			<button type="button" class="drawer-toggle drawer-hamburger">
				<span class="sr-only">メニュー</span>
				<span class="drawer-hamburger-icon"></span>
			</button>

			<div class="drawer-nav" role="navigation">
				<div class="drawer-menu-container">
					<h3 class="font-designed">MENU</h3>
					<nav class="drawer-menu">
						<p class="drawer-menu-contents">
							<?php include ("assets/settings/sitemap.php");?>
						</p>
					</nav>
					<ul>
						<li class="sp-tel"><a class="button radius" href="tel:<?php echo $phone_num_2;?>"><i class="fas fa-phone"></i><?php echo $phone_num_2;?></a></li>
						<li class="sp-tel"><a class="button radius" href="<?php bloginfo('url'); ?>/contact/"><i class="fas fa-envelope"></i>お問い合わせ</a></li>
					</ul>
				</div>
			</div>

		</div>

<?php };?>

	</header>
