		<aside id="aside" data-frix-scroll-margin-top="<?php echo $side_top_margin;?>">

			<div class="fixedmenu <?php if( $header_type == 'gnav' ){ echo 'header-gnav-in'; };?>">

				<div class="side-contents"><!-- side-contents -->

					<h3 class="heading-side">CONTENTS</h3>

					<nav class="mod-sidenav-standard">
						<ul>
							<li>
								<a <?php if ( is_page('recruit') ) { echo ' class="current" '; } ?> href="<?php bloginfo('url'); ?>/<?php echo CURRENTDIR;?>/">採用情報</a>
							</li>
							<li>
								<a <?php if ( is_page('xxxx') ) { echo ' class="current" '; } ?> href="<?php bloginfo('url'); ?>/<?php echo CURRENTDIR;?>/xxxx/">XXXX</a>
							</li>
						</ul>
					</nav>

				</div><!-- //side-contents -->

<?php include ('mod-side-common.php');?>

			</div>

		</aside>
