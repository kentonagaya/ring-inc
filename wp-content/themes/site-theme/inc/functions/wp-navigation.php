<?php
/**
 * wp-navigation
 *
 * WP テーマにあるナビゲーション機能を有効化
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	function register_my_menus() {
		register_nav_menus( array(
			'main-menu' => 'Main Menu',
			'footer-menu'  => 'Footer Menu',
		));
	}
	add_action( 'after_setup_theme', 'register_my_menus' );
	// idを削除
	function remove_menu_id( $id ){
		return $id = array();
	}
	add_filter('nav_menu_item_id', 'remove_menu_id', 10);