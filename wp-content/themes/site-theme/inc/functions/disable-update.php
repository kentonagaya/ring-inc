<?php
/**
 * disable-update
 *
 * 各種アップデート機能の無効化
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	// プラグインの更新
	add_action('admin_menu', 'remove_counts');
	function remove_counts(){
		global $menu,$submenu;
		$menu[65][0] = 'プラグイン';
		$submenu['index.php'][10][0] = '更新';
	}

	// アップデート
	if( $wpupdate == false ){
		add_filter('pre_site_transient_update_core', '__return_zero');
		add_filter('site_option__site_transient_update_plugins', '__return_zero');
	}