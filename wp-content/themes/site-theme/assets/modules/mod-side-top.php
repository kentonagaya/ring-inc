		<aside id="aside" data-frix-scroll-margin-top="<?php echo $side_top_margin;?>">

			<div class="fixedmenu <?php if( $header_type == 'gnav' ){ echo 'header-gnav-in'; };?>">

				<div class="side-contents"><!-- side-contents -->

					<h3 class="heading-side">CONTENTS</h3>

					<nav class="mod-sidenav-standard">
						<ul>
							<li>
								<a href="">ウェストンの初登攀を登る</a>
							</li>
							<li>
								<a href="">鯖街道を一昼夜で駆け抜ける失われた道</a>
							</li>
							<li>
								<a href="">ある登攀を追いかけて</a>
							</li>
							<li class="has-child">
								<a href="">黒部奥山廻りの失われた道</a>
								<div class="child">
									<a href="">火を持ち歩くということ</a>
									<a href="">小川温泉</a>
									<a href="">多部の測量記述</a>
								</div>
							</li>
						</ul>
					</nav>

				</div><!-- //side-contents -->

				<div class="side-contents"><!-- side-contents -->

					<div class="mod-side-banner">
						<ul>
							<li class="btn"><a href=""><img src="<?php bloginfo('template_url'); ?>/images/common/side-banner1.png" alt=""></a></li>
							<li class="btn"><a href=""><img src="<?php bloginfo('template_url'); ?>/images/common/side-banner2.png" alt=""></a></li>
						</ul>
					</div>

				</div><!-- // side-contents -->

			</div>

<?php include ('mod-side-common.php');?>

		</aside>
