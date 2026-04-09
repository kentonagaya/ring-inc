<?php
/**
 * generate-title
 *
 * titleタグの生成
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	function get_titletag(){

		// 基本のタイトルフォーマット
		$basic_title = wp_get_document_title().' | '.SITE_NAME;

		if(is_front_page() or is_home()){
			// トップページの場合
			if( TITLE_TOP ) {
				// 共通設定でTOPページ専用タイトルの設定があった場合
				$disp_title = TITLE_TOP;
			} else {
				// とくに指定がない場合はサイト名だけを表示
				$disp_title = SITE_NAME;
			}
		}

		// 固定ページの場合
		elseif(is_page()){
			if( get_field('page-org_title') ){
				$disp_title = get_field('page-org_title');
			} else {
				$disp_title = $basic_title;
			}
		}

		// シングルページの場合
		elseif(is_single()){
			if( get_field('page-org_title') ){
				$disp_title = get_field('page-org_title');
			} else {
				$disp_title = $basic_title;
			}
		}

		// カテゴリーページの場合
		elseif(is_category()){
			global $cat;
			$seo_title = get_field ('page-org_title', 'category_'.$cat);
			if($seo_title){
				$disp_title = $seo_title;
			} else {
				$disp_title = $basic_title;
			}
		}

		// タクソノミーページの場合
		elseif(is_tax()){
			global $taxonomy;
			$tax_slug = get_taxonomy($taxonomy)->name;
			$term_id = get_queried_object_id();
			$seo_title = get_field ('page-org_title', $tax_slug.'_'.$term_id);
			if($seo_title){
				$disp_title = $seo_title;
			} else {
				$disp_title = $basic_title;
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
						// SEO基本設定のカスタム投稿名が一致した場合のタイトルを表示
						$disp_title = $arr['seo-archives_title'];
					} else {
						// 一致しない場合は通常タイトルを表示
						$disp_title = $basic_title;
					}
				}
			} else {
				// 指定されていない場合は通常タイトルを表示
				$disp_title = $basic_title;
			}
		}

		// 上記以外の場合
		else {
			$disp_title = $basic_title;
		}

		echo $disp_title;

	}
