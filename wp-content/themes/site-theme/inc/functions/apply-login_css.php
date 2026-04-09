<?php
/**
 * apply-login_css
 *
 * ログイン画面のカスタマイズ用CSSを適用
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	function my_login_style() {
		wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/css/wp-login.css' );
	}
	add_action( 'login_enqueue_scripts', 'my_login_style' );