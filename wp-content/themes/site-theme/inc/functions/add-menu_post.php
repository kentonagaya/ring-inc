<?php
/**
 * add-menu_post
 *
 * 管理画面のサイドバーに「投稿」メニューを追加
 * ※ サイドバーのカスタム投稿とPOSTの位置が離れて表示されるのを防ぐため
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	function add_page_to_admin_menu() {
		global $post_custom_label;
		add_menu_page( $post_custom_label, $post_custom_label, 'manage_options', 'edit.php', '', 'dashicons-admin-post', 99);
	}
	add_action( 'admin_menu', 'add_page_to_admin_menu' );