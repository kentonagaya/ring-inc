<?php
/**
 * set-davicon
 *
 * 管理画面にfaviconを反映させる
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	//管理画面
	function admin_favicon() {
		echo '<link rel="shortcut icon" type="image/x-icon" href="'. HOME .'/dist/favicons/favicon.ico">';
	}
	add_action('admin_head', 'admin_favicon');

	// ログイン画面
	add_action( 'login_head', 'wpse_41844_favicon' );
	function wpse_41844_favicon() {
		echo '<link rel="shortcut icon" type="image/x-icon" href="'. HOME .'/dist/favicons/favicon.ico">';
	}