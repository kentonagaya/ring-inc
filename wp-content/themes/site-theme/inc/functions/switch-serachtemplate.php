<?php
/**
 * switch-searchtemplate
 *
 * 投稿タイプ別に検索テンプレートを自動で切り変える
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	add_filter('template_include','custom_search_template');
	function custom_search_template($template){
		if ( is_search() ){
			$post_types = get_query_var('post_type');
			foreach ( (array) $post_types as $post_type )
				$templates[] = "search-{$post_type}.php";
			$templates[] = 'search.php';
			$template = get_query_template('search',$templates);
		}
		return $template;
	}