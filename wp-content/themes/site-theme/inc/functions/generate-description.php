<?php
/**
 * generate-description
 *
 * meta description の生成
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	function get_meta_description(){

		// トップページの場合
		if( is_front_page() or is_home() ){
			if( META_D_TOP ){
				// TOPページ専用指定があればそれを代入
				$meta_d = META_D_TOP;
			} else {
				// TOPページ専用指定がない場合は共通設定を代入
				$meta_d = META_D;
			}
		}

		// 固定ページの場合
		elseif( is_page() ){
			if( get_field('page-meta_description') ){
				// ページ個別指定があればそれを代入
				$meta_d = get_field('page-meta_description');
			} else {
				// ページ個別指定がない場合は共通設定を代入
				$meta_d = META_D;
			}
		}

		// シングルページの場合
		elseif(is_single()){
			if( get_field('page-meta_description') ){
				// ページ個別指定があればそれを代入
				$meta_d = get_field('page-meta_description');
			} elseif(SINGLE_META) {
				// 「共通設定を利用する」にチェックがあれば共通設定を代入
				$meta_d = META_D;
			} else {
				// 上記以外は、概要を代入
				$meta_d = str_replace(array("\r\n","\r","\n"), '', mb_substr( get_the_excerpt(), 0, 110 ));
			}
		}

		// カテゴリーページの場合
		elseif(is_category()){
			global $cat;
			$seo_description = get_field ('page-meta_description', 'category_'.$cat);
			if($seo_description){
				$meta_d = $seo_description;
			} else {
				$meta_d = META_D;
			}
		}

		// タクソノミーページの場合
		elseif(is_tax()){
			global $taxonomy;
			$tax_slug = get_taxonomy($taxonomy)->name;
			$term_id = get_queried_object_id();
			$seo_description = get_field ('page-meta_description', $tax_slug.'_'.$term_id);
			if($seo_description){
				$meta_d = $seo_description;
			} else {
				$meta_d = META_D;
			}
		}

		// アーカイブページの場合
		elseif(is_archive()){
			global $site_seo_id;
			// 投稿タイプスラッグを取得
			$cp_slug = get_query_var('post_type');
			// SEO基本設定の情報を取得
			$seo_arr = get_field('seo-archives',$site_seo_id);
			if($seo_arr){
				foreach($seo_arr as $arr) {
					if($arr['seo-archives_name'] == $cp_slug) {
						// SEO基本設定のカスタム投稿名が一致した場合の概要を表示
						$meta_d = $arr['seo-archives_description'];
					} else {
						// 一致しない場合は通常の概要を表示
						$meta_d = META_D;
					}
				}
			} else {
				// 指定されていない場合は通常の概要を表示
				$meta_d = META_D;
			}
		}

		// 上記以外の場合
		else {
			$meta_d = META_D;
		}

		echo $meta_d;

	}