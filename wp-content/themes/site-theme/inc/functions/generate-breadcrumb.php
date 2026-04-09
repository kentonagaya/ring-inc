<?php
/**
 * generate-breadcrumb
 *
 * パンくずリスト生成
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	function breadcrumb($arg = '-preset'){
		global $post;
		global $post_custom_name;
		global $post_custom_label;
		global $post_type;
		$cpost_label = esc_html( get_post_type_object( get_post_type() )->label );
		$cpost_name = esc_html( get_post_type_object( get_post_type() )->name);

		if($arg) {
			$class = $arg;
		} else {
			$class = '';
		}

		// カテゴリーページの場合
		if(is_category()){
			$link = $post_custom_name;
			$name = $post_custom_label;
			$str = '<li><a href="'.home_url().'/'.$link.'">'.$name.'</a></li>';
			$str .= '<li>カテゴリー「'.single_cat_title("", false).'」の一覧</li>';
		}
		// タクソノミーページの場合
		elseif(is_tax()){
			$link = $cpost_name;
			$name = $cpost_label;
			$str = '<li><a href="'.home_url().'/'.$link.'">'.$name.'</a></li>';
			$str .= '<li>カテゴリー「'.single_cat_title("", false).'」の一覧</li>';
		}
		// 検索結果ページの場合
		elseif(is_search()){
			if( $post_type == 'post' ) {
				$link = $post_custom_name;
				$name = $post_custom_label;
			} else {
				$link = $post_type;
				$name = DIR_NAME;
			}
			$str = '<li><a href="'.home_url().'/'.$link.'">'.$name.'</a></li>';
			$str .= '<li>検索結果</li>';
		}
		// アーカイブページの場合
		elseif(is_archive()){
			if( $cpost_name == 'post' ) {
				$name = $post_custom_label;
			} else {
				$name = $cpost_label;
			}
			$str = '<li>'.$name.'</li>';
		}
		// 固定ページの場合
		elseif(is_page()){
			$ancestors = array_reverse(get_post_ancestors( $post->ID ));
			if($ancestors){
				// 子ページの場合
				foreach($ancestors as $ascestor) {
					$parent_slug = get_post($ascestor)->post_name;
					$parent_title = get_post($ascestor)->post_title;
					$str .= '<li><a href="'.home_url().'/'.$parent_slug.'">'.$parent_title.'</a></li>';
				}
				$str .= '<li>'.$post->post_title.'</li>';

			} else {
				$str = '<li>'.$post->post_title.'</li>';
			}
		}
		// シングルページの場合
		elseif(is_single()){
			if( $cpost_name == 'post' ) {
				$link = $post_custom_name;
				$name = $post_custom_label;
			} else {
				$link = $cpost_name;
				$name = $cpost_label;
			}
			$str = '<li><a href="'.home_url().'/'.$link.'">'.$name.'</a></li>';
			$str .= '<li>'.get_the_title().'</li>';
		}

		$disp_breadcrumb = $str;

		// トップページと、設定で非表示の場合は表示しない
		if(!is_home() && BREADCRUMB && !is_404() ){
			echo "\t".'<div class="l-breadcrumb '.$class.'">'."\n";
			echo "\t\t".'<nav class="p-breadcrumb">'."\n";
			echo "\t\t\t".'<ul>'."\n";
			echo "\t\t\t\t".'<li><a href="'.home_url().'"><i class="fas fa-home"></i></a></li>'."\n";
			echo "\t\t\t\t".$disp_breadcrumb."\n";
			echo "\t\t\t".'</ul>'."\n";
			echo "\t\t".'</nav>'."\n";
			echo "\t".'</div>'."\n";
		}

	}