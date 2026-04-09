<?php
/**
 * generate-page-class
 *
 * wrapperに付加するページ別専用ID,クラスの生成
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	// wrapper ID
	function wrapper_id() {

		global $post;
		global $post_custom_name;

		if( is_home() || is_front_page() ) {
			// トップページの場合
			$prefix = 'home';
		}

		elseif( is_page() ){
			// 固定ページの場合
			if(get_currentdir_slug() == get_post_field('post_name', $post->ID)) {
				$prefix = get_currentdir_slug().'-index';
			} else {
				$prefix = get_currentdir_slug().'-'.get_post_field('post_name', $post->ID);
			}
		}

		elseif(is_tax()){
			$prefix = get_currentdir_slug().'-taxonomy';
		}

		elseif(is_category()){
			$prefix = $post_custom_name.'-taxonomy';
		}

		elseif(is_archive()){
			$prefix = get_currentdir_slug().'-index';
		}
		elseif(is_single()){
			$prefix = get_currentdir_slug().'-single';
		}

		else {
			$prefix = get_currentdir_slug().'-taxonomy';
		}

		echo $prefix.'-wrapper';
	}

	// page class
	function page_class() {

		// ヘッダー固定クラス
		if(HEADER_FIX){
			$header_fix = ' -header_fix';
		} else {
			$header_fix = '';
		}

		// ヘッダーの透明化
		if( HEADER_TRANS == '1' && HEADER_TRANS_SUB !== '1' ){
			if( is_home() || is_front_page() ) {
				$trans_status = ' -header_trans';
			} else {
				$trans_status = '';
			}
		} elseif( HEADER_TRANS == '1' && HEADER_TRANS_SUB == '1' ){
			$trans_status = ' -header_trans';
		} else {
			$trans_status = '';
		};

		// サブページ判定
		if( is_home() || is_front_page() ) {
			// トップページの場合
			$prefix = 'l-home';
		} else {
			$prefix = 'l-subpage';

			if(is_tax()){
				global $term;
				$prefix = 'l-subpage '.get_currentdir_slug().'-taxonomy-'.$term;
			}

			elseif(is_category()){
				global $post_custom_name;
				$prefix = 'l-subpage '.$post_custom_name.'-taxonomy-'.get_query_var('category_name');
			}

		}

		echo $prefix.$header_fix.$trans_status;
	}
