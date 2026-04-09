<?php
/**
 * define-uri
 *
 * サイトURLの定義
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	define( 'HOME', esc_url( home_url( '/' ) ) ); // サイトURL : HOME
	define( 'THEMEDIR', esc_url( get_template_directory_uri()).'/' ); // テーマディレクトリURL : THEMEDIR
	define( 'THEMEPATH', esc_url( get_template_directory()).'/' ); // テーマディレクトリへのサーバーパス : THEMEPATH