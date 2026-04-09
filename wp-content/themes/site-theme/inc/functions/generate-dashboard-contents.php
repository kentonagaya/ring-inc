<?php
/**
 * generate-dashboard-contents
 *
 * コンテンツ管理ダッシュボードの生成
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	function cmn_admin_head_setting() {
		global $post_type;
		$tag = '';
		$tag .= '<link rel="stylesheet" href="'. get_template_directory_uri() .'/css/wp-custom.css" type="text/css" media="screen" />'."\n";
		echo $tag;
	}
	add_action( 'admin_head', 'cmn_admin_head_setting' );

	function nav_dashboard_widget_function() {
		$menu_array = array();
		global $menu_array_contents;
		$tag = '';
		$tb = "\t\t\t\t";
		$tag .= $tb . "" . '<div>' . "\n";
		$tag .= $tb . "\t" . '<ul class="custom-nav">' . "\n";
		foreach( $menu_array_contents as $navi ){
			$tag .= $tb . "\t\t\t" . '<li><a class="'.$navi[2].'" href="'.get_site_url().$navi[0].'"><span>'.$navi[1].'</span></a></li>' . "\n";
		}
		$tag .= $tb . "\t" . '</ul>' . "\n";
		$tag .= $tb . "" . '</div>' . "\n";
		echo $tag;
	}
	function add_dashboard_widgets() {
		global $dashboard_menu_contents;
		wp_add_dashboard_widget('nav_dashboard_widget', $dashboard_menu_contents, 'nav_dashboard_widget_function');
		global $wp_meta_boxes;
		$normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
		$nav_widget_backup = array('nav_dashboard_widget' => $normal_dashboard['nav_dashboard_widget']);
		unset($normal_dashboard['nav_dashboard_widget']);
		$sorted_dashboard = array_merge($nav_widget_backup, $normal_dashboard);
		$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
	}
	add_action('wp_dashboard_setup', 'add_dashboard_widgets' );
	function add_select_dashboard_columns() {
		add_screen_option( 'layout_columns', array( 'max' => 3, 'default' => 1 ) );
	}
	add_action( 'admin_head-index.php', 'add_select_dashboard_columns' );