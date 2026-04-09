<?php
/*
Plugin Name: Site Preferences Plugin for EF WP Templates
Plugin URI:
Description: EF WP Templates 用のサイト基本設定プラグイン（v11以降）
Version: 1.0.0
Author: Yoshiharu Terajima
Author URI: https://endesign-factory.net
License:
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * 設定ページの表示
 */
add_action('admin_menu', 'my_add_admin_preferences_page');
function my_add_admin_preferences_page() {
	add_menu_page('サイト設定', 'サイト設定', 'manage_options', 'site-preferences', 'preferences_main_page', 'dashicons-admin-generic', 90);
	//add_action('admin_init', 'my_register_setting');
}
function preferences_main_page() {
	$return_url = '../wp-content/plugins/site-preferences/pages/index.php';
	require $return_url;
}

/**
 * 設定ファイルを読み込んで各種情報設定
 */

// ファイルパス
$file_path = dirname(__FILE__) . "/pages/data/data-base.txt";
//ファイルからデータを取り出す
$data_serialize = file_get_contents($file_path);
//元のデータに戻る
$get_data = unserialize($data_serialize);

// サイト基本情報
define( 'DIST', $get_data["ss-dist"] );
define( 'GUTENBERG', $get_data["ss-gutenberg"] );
define( 'HEADER_FIX', $get_data["ss-headerfix"] );
define( 'HEADER_TRANS', $get_data["ss-headertrans_top"] );
define( 'HEADER_TRANS_SUB', $get_data["ss-headertrans_sub"] );
define( 'BREADCRUMB', $get_data["ss-breadcrumb"] );
define( 'TITLE_AREA', $get_data["ss-titlearea"] );
define( 'HTML_MINIFY', $get_data["ss-compress"] );
define( 'TOP_LOADER', $get_data["ss-loader"] );
define( 'COOKIE_BANNER', $get_data["ss-cookiebanner"] );
define( 'VIEWPORT', $get_data["ss-viewport"] );
define( 'WPUPDATE', $get_data["ss-wpupdate"] );
define( 'SITE_NAME', $get_data["ss-sitename"] );
define( 'COMPANY_NAME', $get_data["ss-cname"] );
define( 'ZIP', $get_data['ss-czip'] );
define( 'ADDRESS1', $get_data['ss-caddress1'] );
define( 'ADDRESS2', $get_data['ss-caddress2'] );
define( 'PHONE', $get_data['ss-ctel'] );
define( 'PHONE_TEXT', $get_data['ss-ctelsuff'] );
define( 'FAX', $get_data['ss-cfax'] );
define( 'OPEN_TIME', $get_data['ss-opentime'] );
define( 'CLOSE_DAY', $get_data['ss-close'] );
define( 'SITE_URL', get_bloginfo( 'url' ) );
define( 'COPYRIGHT', $get_data["ss-copyright"] );
define( 'COPYRIGHT_ISSUE', $get_data["ss-copyright_issue"] );
define( 'TAX_RATE', $get_data["ss-taxrate"] );
define( 'THEME_COLOR', $get_data["ss-themecolor"] );
