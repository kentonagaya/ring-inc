<?php
/**
 * get-page-slug
 *
 * 表示中のページスラッグを取得
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	// get page slug
	function get_currentdir_slug() {

		global $post;
		global $post_custom_name;

		if(is_home() || is_front_page()) {
			// トップページの場合
			$prefix = 'home';
		}

		elseif(is_page()){
			// 固定ページの場合
			$ancestors = array_reverse(get_post_ancestors( $post->ID ));
			$ancestor_slug = get_post_field( 'post_name', $ancestors[0] );
			$prefix = $ancestor_slug;
		}

		elseif(is_tax()){
			$taxonomy = get_query_var('taxonomy');
			$prefix = get_taxonomy($taxonomy)->object_type[0];
		}

		elseif(is_category()){
			$prefix = $post_custom_name;
		}

		elseif(is_archive()){
			// アーカイブページの場合
			$prefix = get_query_var('post_type');
			if($prefix == 'post' ){
				// [post]の場合はfunctions.phpで指定したスラッグに変更
				$prefix = $post_custom_name;
			} else {
				$prefix = $prefix;
			}
		}

		elseif(is_single()){
			// シングルページの場合
			$prefix = get_post_type( $post );
			if($prefix == 'post' ){
				// [post]の場合はfunctions.phpで指定したスラッグに変更
				$prefix = $post_custom_name;
			} else {
				$prefix = $prefix;
			}
		}

		elseif(is_404()){
			$prefix = 'error';
		}

		else{
			$prefix = 'page';
		}

		return $prefix;

	}

	// get this page slug
	function get_this_page_slug() {

		global $post;
		global $post_custom_name;
		global $template;

		if(is_home() || is_front_page()) {
			// トップページの場合
			$prefix = 'index';
		}

		elseif(is_page()){
			// 固定ページの場合
			if(get_currentdir_slug() == $post->post_name){
				// currentdirとページスラッグ名が同じ場合はindexを返す
				$prefix = 'index';
			} else {
				$prefix = $post->post_name;
				// 上記以外はページスラッグを返す
			}
		}

		elseif(is_search()){
			$prefix = 'search';
		}

		elseif(is_tax()){
			$queried_object = get_queried_object();
			$prefix = $queried_object->slug;
		}

		elseif(is_category()){
			$queried_object = get_queried_object();
			$prefix = $queried_object->slug;
		}

		elseif(is_archive()){
			// アーカイブページの場合
			$prefix = 'archive';
		}

		elseif(is_single()){
			$prefix = 'single';
		}

		elseif(is_404()){
			$prefix = 'error';
		}

		else{
			$prefix = 'page';
		}

		return $prefix;

	}
