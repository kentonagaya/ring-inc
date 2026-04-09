<?php
/**
 * customize-post
 *
 * POST の名称の変更と、それに伴うアーカイブページスラッグ名設定
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	// 「投稿」の名前変更
	function change_post_menu_label() {
		global $menu;
		global $submenu;
		global $post_custom_label;
		$menu[5][0] = $post_custom_label;
		$submenu['edit.php'][5][0] =  $post_custom_label;
		$submenu['edit.php'][10][0] = '新規追加';
		$submenu['edit.php'][16][0] = 'タグ';
	}
	function change_post_object_label() {
		global $wp_post_types;
		global $post_custom_label;
		$labels = &$wp_post_types['post']->labels;
		$labels->name = $post_custom_label;
		$labels->singular_name = $post_custom_label;
		$labels->add_new = _x('追加', $post_custom_label);
		$labels->add_new_item = $post_custom_label.'の新規追加';
		$labels->edit_item = $post_custom_label.'の編集';
		$labels->new_item = '新規'.$post_custom_label;
		$labels->view_item = $post_custom_label.'を表示';
		$labels->search_items = $post_custom_label.'を検索';
		$labels->not_found = '記事が見つかりませんでした';
		$labels->not_found_in_trash = 'ゴミ箱に記事は見つかりませんでした';
	}
	add_action( 'init', 'change_post_object_label' );
	add_action( 'admin_menu', 'change_post_menu_label' );

	// 投稿アーカイブページの設定
	function post_has_archive( $args, $post_type ) {
		global $post_custom_name;
		if ( 'post' == $post_type ) {
			$args['rewrite'] = true;
			$args['has_archive'] = $post_custom_name; //任意のスラッグ名
		}
		return $args;
	}
	add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );