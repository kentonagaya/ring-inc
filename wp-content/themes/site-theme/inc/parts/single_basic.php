			<section class="l-section">
				<div class="l-contents">

					<div class="l-block">
						<div class="p-singleparts_head">
							<p class="_date u-fa_before u-supple"><i class="far fa-calendar-alt"></i><time datetime="<?php the_time('Y-m-d');?>"><?php the_time('Y.m.d');?></time></p>
							<h1 class="_ttl u-h1 u-center"><?php the_title();?></h1>
						</div>
					</div>

					<div class="l-block u-texts">
						<?php the_content();?>
					</div>

					<div class="l-block">
						<div class="p-singleparts_foot">
							<div class="p-singleparts_foot__tagcat u-supple">
								<div class="p-singleparts_foot__list _cat u-fa_before">
									<?php
										if( $post_type == 'post' ) {
											$terms = get_the_category();
											if( $terms ){
												echo '<i class="fas fa-folder-open"></i>';
												echo '<ul>';
												foreach ( $terms as $term ) {
													echo '<li><a href="' . get_tag_link( $term->term_id ) . '">' . $term->name . '</a></li>';
												}
												echo '</ul>';
											}
										} else {
											$terms = get_the_terms( $post->ID, $post_type.'_cat' );
											if( $terms ){
												echo '<i class="fas fa-folder-open"></i>';
												echo '<ul>';
												foreach ( $terms as $term ) {
													echo '<li><a href="' . get_tag_link( $term->term_id ) . '">' . $term->name . '</a></li>';
												}
												echo '</ul>';
											}
										}
									?>
								</div>
								<div class="p-singleparts_foot__list u-fa_before">
									<?php
										if( $post_type == 'post' && $posttags ) {
											$posttags = get_the_tags();
											if( $posttags ){
												echo '<i class="fas fa-tag"></i>';
												echo '<ul>';
												foreach ( $posttags as $tag ) {
													echo '<li><a href="' . get_tag_link( $tag->term_id ) . '">#' . $tag->name . '</a></li>';
												}
												echo '</ul>';
											}
										} else {
											$tags = get_the_terms( $post->ID, $post_type.'_tag' );
											if( $tags ){
												echo '<i class="fas fa-tag"></i>';
												echo '<ul>';
												foreach ( $tags as $tag ) {
													echo '<li><a href="' . get_tag_link( $tag->term_id ) . '">#' . $tag->name . '</a></li>';
												}
												echo '</ul>';
											}
										}
									?>
								</div>
							</div>
						</div>
					</div>

					<div class="l-block">
						<div class="p-singleparts_prevnext">
<?php
	//普通に「< 前の記事へ」と「次の投稿へ >」
	previous_post_link('%link', '<i class="fas fa-angle-left"></i> 前の記事へ');
	next_post_link('%link', '次の記事へ <i class="fas fa-angle-right"></i>');

	/*
	//デフォルトのまま表示 「« タイトル」と「タイトル »」
	previous_post_link();
	next_post_link();

	//デフォルトと表示は同じだが、「«」 と 「»」をaタグに含める
	previous_post_link('%link', '« %title');
	next_post_link('%link', '%title »');

	//表示は同じだが、aタグの中身はタイトルで、その前に「前の記事 : 」と「»次の記事 : 」をつける
	previous_post_link('前の記事 : %link', '%title');
	next_post_link('次の記事 : %link', '%title');

	//上の例と表示は同じで全てaタグの中に表示
	previous_post_link('%link', '前の記事 : %title');
	next_post_link('%link', '次の記事 : %title');

	//同じカテゴリで「< タイトル」「タイトル >」
	previous_post_link('%link', '< %title', true);
	next_post_link('%link', '%title >', true);

	//同じタグで「< タイトル」「タイトル >」
	previous_post_link('%link', '< %title', true, '', 'post_tag');
	next_post_link('%link', '%title >', true, '', 'post_tag');

	//同じタクソノミーのみで、ID10の記事を除き、「< タイトル」「タイトル >」
	previous_post_link('%link', '< %title', true, 10, 'タクソノミー名');
	next_post_link('%link', '%title >', true, 10, 'タクソノミー名');
	*/
?>
						</div>
					</div>

					<?php if( $wpcomment ):?>
					<div class="l-block">
						<?php comments_template(); ?>
					</div>
					<?php endif;?>

				</div>
			</section>