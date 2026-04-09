			<div class="mod-breadcrumb">
				<nav>
					<ul>
						<li><a href="<?php bloginfo('url');?>/<?php echo $top_dir;?>"><i class="fas fa-home"></i></a></li>
<?php if ( $current_layer == 2 ) {?>
						<li><?php echo $dirname;?></li>
<?php };?>
<?php if ( $current_layer == 3 ) {?>
						<li><a href="<?php bloginfo('url');?>/<?php echo CURRENTDIR;?>"><?php echo $dirname;?></a></li>
						<li>
							<?php
								if(mb_strlen($post->post_title, 'UTF-8')>20){
									$title= mb_substr($post->post_title, 0, 14, 'UTF-8');
									echo $title.'…';
								}else{
									echo $post->post_title;
								}
							?>
						</li>
<?php };?>
<?php if ( $current_layer >= 4 ) {?>
						<li><a href="<?php bloginfo('url');?>/<?php echo CURRENTDIR;?>/"><?php echo $dirname;?></a></li>
						<li><a href="<?php bloginfo('url');?>/<?php echo CURRENTDIR;?>/<?php echo $parent_dir_name;?>/"><?php echo $parent_layer_name;?></a></li>
						<li>
							<?php
								if(mb_strlen($post->post_title, 'UTF-8')>20){
									$title= mb_substr($post->post_title, 0, 14, 'UTF-8');
									echo $title.'…';
								}else{
									echo $post->post_title;
								}
							?>
						</li>
<?php };?>
					</ul>
				</nav>
			</div><!-- // breadcrumb -->
