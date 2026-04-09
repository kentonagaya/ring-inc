<?php
/**
 * generate-customposts
 *
 * カスタム投稿の生成
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	// カスタム投稿の追加
	add_action('init', 'register_post_type_and_taxonomy');
	function register_post_type_and_taxonomy() {
		global $cpost;
		foreach( $cpost as $type => $arg ){
			register_post_type( $type,
				array(
					'labels' => array(
						'name' => $arg['name'],
						'add_new_item' => $arg['name'] . 'を追加',
						'view_item' => $arg['name'] . 'を表示',
						'edit_item' => $arg['name'] . 'の編集'
					),
					'public' => true,
					'hierarchical' => true,
					'has_archive' => $arg['has_archive'],
					'menu_position' => $arg['position']+3,
					'supports' => $arg['supports'],
					'show_in_rest'  => true,
				)
			);
		}
	}

	// カスタム投稿のカテゴリー
	global $cpost;
	foreach( $cpost as $type => $arg ){
		if($arg['has_category']){
			register_taxonomy(
				$type.'_cat',
				$type,
				array(
					'rewrite' => array( 'slug' => $type . '_cat' ),
					'label' => $arg['name'].'のカテゴリー',
					'labels' => array(
						'menu_name' =>  'カテゴリー'
					),
					'public' => true,
					'hierarchical' => true,
					'has_archive' => true,
					'query_var' => true,
					'show_admin_column' => true,
				)
			);
		}
	}

	// カスタム投稿のタグ
	global $cpost;
	foreach( $cpost as $type => $arg ){
		if($arg['has_tag']){
			register_taxonomy(
				$type.'_tag',
				$type,
				array(
					'rewrite' => array( 'slug' => $type . '_tag' ),
					'label' => $arg['name'].'のタグ',
					'labels' => array(
						'menu_name' =>  'タグ'
					),
					'public' => true,
					'hierarchical' => false, //カテゴリのように扱う場合はtrue
					'has_archive' => true,
					'query_var' => true,
					'show_admin_column' => true,
				)
			);
		}
	}

	// カスタム投稿の絞り込み機能
	function add_post_taxonomy_restrict_filter() {
		global $post_type;
		global $cpost;
		foreach( $cpost as $type => $arg ){
			if ( $type == $post_type ) { // news
				?>
				<select name="<?=$type;?>_cat">
					<option value="">カテゴリー指定なし</option>
					<?php
					$terms = get_terms($type.'_cat');
					foreach ($terms as $term) { ?>
						<option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
					<?php } ?>
				</select>
				<?php
			}
		}
	}
	add_action( 'restrict_manage_posts', 'add_post_taxonomy_restrict_filter' );

	// 記事件数指定
	function change_posts_per_page($query) {
		if ( is_admin() || ! $query->is_main_query() ) {
			return;
		}
		global $post_type;
		global $cpost;
		foreach( $cpost as $type => $arg ){
			if ( $query->is_post_type_archive($type) ) {
				$query->set( 'posts_per_page', $arg['posts_per_page'] );
			}
			if ($query->is_tax($type.'_cat')) {
				$query->set( 'posts_per_page', $arg['posts_per_page'] );
			}
		}
	}
	add_action( 'pre_get_posts', 'change_posts_per_page' );

	// 管理画面で日付順にする
	add_action( 'pre_get_posts', 'change_posts_per_page' );
		add_filter( 'pre_get_posts',
		function( $query ) {
			if ( is_admin() ) {
				if (isset($query->query['post_type'])) {
					global $post_type;
					global $cpost;
					foreach( $cpost as $type => $arg ){
						if($type === $query->query['post_type']){
							$query->set( 'orderby', 'date' );
							$query->set( 'order', 'DESC' );
						}
					}
				}
			}
		}
	);
