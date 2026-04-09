<?php
/**
 * hide-tags
 *
 * WPの不要なタグを削除
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	// wp_head
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'parent_post_rel_link');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'rel_canonical');
	remove_action('wp_head','rest_output_link_wp_head');
	remove_action('wp_head','wp_oembed_add_discovery_links');
	remove_action('wp_head','wp_oembed_add_host_js');
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles', 10);

	// js, css のバージョン
	function vc_remove_wp_ver_css_js( $src ) {
		if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
			$src = remove_query_arg( 'ver', $src );
		return $src;
	}
	add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
	add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

	// dns-prefetch
	add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );
	function remove_dns_prefetch( $hints, $relation_type ) {
		if ( 'dns-prefetch' === $relation_type ) {
			return array_diff( wp_dependencies_unique_hosts(), $hints );
		}
		return $hints;
	}

	// gutenberg css
	add_action( 'wp_enqueue_scripts', 'remove_gutenberg_style' );
	function dequeue_plugins_style() {
		wp_dequeue_style('wp-block-library');
	}
	add_action( 'wp_enqueue_scripts', 'dequeue_plugins_style', 9999);

	// global-styles-inline-cssを排除
	add_action( 'wp_enqueue_scripts', 'remove_my_global_styles' );
	function remove_my_global_styles() {
		wp_dequeue_style( 'global-styles' );
	}

	// classic-theme-styles を削除
	add_action( 'wp_enqueue_scripts', 'remove_classic_theme_style' );
	function remove_classic_theme_style() {
		wp_dequeue_style( 'classic-theme-styles' );
	}