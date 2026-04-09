<?php
/*******************************************************************************************

	functions.php

	@package  entem-04.0
	@author   endesign-factory.com

	@history
		2008-08-13 新規作成

*******************************************************************************************/

/*--------------------------------------------------------------------
	基本設定
--------------------------------------------------------------------*/

	// タイムゾーン
	date_default_timezone_set( 'Asia/Tokyo' );

/*--------------------------------------------------------------------
	カスタム投稿
--------------------------------------------------------------------*/

	add_action('init', 'register_post_type_and_taxonomy');

	function register_post_type_and_taxonomy() {

		// News
		register_post_type('news',
			array(
				'labels' => array(
					'name' => '最新情報',
					'add_new_item' => '最新情報を追加',
					'view_item' => '最新情報を表示',
					'edit_item' => '最新情報の編集'
				),

				'public' => true,
				'hierarchical' => true,
				'has_archive' => true,
				'menu_position' => 6,
				'supports' => array (
					'title',
					'editor',
					'excerpt',
					'custum-fields',
					'thumbnail',
					'page-attributes',
					'rewrite' => true,
				),
			)
		);

	}

	## カスタム投稿タクソノミー

	// News
	add_action('init', 'create_news_taxonomies');
	function create_news_taxonomies() {
		register_taxonomy('news_category','news',
			array(
				'hierarchical' => true,
				'update_count_callback' => '_update_post_term_count',
				'label' => '最新情報のカテゴリー',
				'singular_label' => '最新情報のカテゴリー',
				'public' => true,
				'show_ui' => true
			)
		);
	}

	
	// カスタム投稿タイプでカテゴリ未選択時にデフォルトカテゴリーを設定
	function add_defaultcategory_automatically($post_ID) {
	    global $wpdb;
	    // 設定されているカスタム分類のタームを取得
		$curTerm_1 = wp_get_object_terms($post_ID, 'news_category');
		// $curTerm_2 = wp_get_object_terms($post_ID, 'faq_category');
	    // $curTerm_3 = wp_get_object_terms($post_ID, 'works_category');
	    if (0 == count($curTerm_1)) {
	        // ターム ID
	        $defaultTerm= array(2);
	        wp_set_object_terms($post_ID, $defaultTerm, 'news_category');
		}
		// if (0 == count($curTerm_2)) {
	    // 	// ターム ID
	    //     $defaultTerm= array(8);
	    //     wp_set_object_terms($post_ID, $defaultTerm, 'faq_category');
	    // }
	    // if (0 == count($curTerm_3)) {
	    // 	// ターム ID
	    //     $defaultTerm= array(5);
	    //     wp_set_object_terms($post_ID, $defaultTerm, 'works_category');
	    // }
	}
	add_action('publish_news', 'add_defaultcategory_automatically');
	// add_action('publish_faq', 'add_defaultcategory_automatically');
	// add_action('publish_works', 'add_defaultcategory_automatically');


	// カスタム投稿の絞り込み機能
	function add_post_taxonomy_restrict_filter() {
		global $post_type;

		if ( 'news' == $post_type ) { // news
			?>
			<select name="news_category">
				<option value="">カテゴリー指定なし</option>
				<?php
				$terms = get_terms('news_category');
				foreach ($terms as $term) { ?>
					<option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
				<?php } ?>
			</select>
			<?php
		} elseif ( 'works' == $post_type ) { // works
			?>
			<select name="works_category">
				<option value="">カテゴリー指定なし</option>
				<?php
				$terms = get_terms('works_category');
				foreach ($terms as $term) { ?>
					<option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
				<?php } ?>
			</select>
			<?php
		}
	}
	add_action( 'restrict_manage_posts', 'add_post_taxonomy_restrict_filter' );

	// サイドバーのカスタム投稿を非表示
	function remove_menus () {

	if (!current_user_can('administrator')) { //管理者ではない場合
		global $menu;
		global $submenu;
		unset($menu[6]); // 最新情報
		unset($menu[7]); // 施工実績
		unset($menu[8]); // よくある質問
		unset($menu[9]); // スタッフ紹介
		//unset($menu[20]); // 固定ページ非表示
		//unset($menu[25]); // コメント非表示
		//unset($menu[15]); // リンク
		//unset($menu[26]); // お問合わせ非表示
		//unset($menu[70]); // プロフィール非表示
		//unset($menu[75]); // ツール非表示
		//unset($menu[80]); // 設定非表示
	}

	}
	add_action('admin_menu', 'remove_menus');

/*--------------------------------------------------------------------
	Author.php
--------------------------------------------------------------------*/

	// weblogのauthor.php でページネーションを有効化
	function custom_author_archive( &$query ) {
	if ($query->is_author)
		$query->set( 'post_type', array( 'post', 'weblog' ) );
	}
	add_action( 'pre_get_posts', 'custom_author_archive' );

/*--------------------------------------------------------------------
	検索設定
--------------------------------------------------------------------*/

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


/*--------------------------------------------------------------------
	ダッシュボード設定
--------------------------------------------------------------------*/

	function cmn_admin_head_setting() {
		global $post_type;

		$tag = '';
		$tag .= '<link rel="stylesheet" href="'. get_template_directory_uri() .'/css/wp-custom.css" type="text/css" media="screen" />'."\n";
//		$tag .= '<script type="text/javascript" src="'.TEMPLATE_DIR.'/js/wp-custom.js"></script>'."\n";

		if( get_current_blog_id() == 1 ){
			if( isset( $post_type ) && $post_type == 'page' ){
				$tag .= '<script type="text/javascript" src="'. get_template_directory_uri() .'/js/admin/page.js"></script>'."\n";
			}
		}
		echo $tag;
	}
	add_action( 'admin_head', 'cmn_admin_head_setting' );


	## DASHBOARD

	function remove_dashboard_widgets() {
		if( !is_super_admin() ){
			global $wp_meta_boxes;
			unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // 現在の状況
			unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // 最近のコメント
			unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // 被リンク
			unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // プラグイン
			unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']); // アクティビティ
			unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // クイック投稿
			unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // 最近の下書き
			unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPressブログ
			unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // WordPressフォーラム
		}
	}
	add_action('wp_dashboard_setup', 'remove_dashboard_widgets');
	// add_filter('pre_site_transient_update_core', '__return_zero');
	// add_filter('site_option__site_transient_update_plugins', '__return_zero');

	//ウィジェットの追加
	function nav_dashboard_widget_function() {
		$menu_array = array();
		$menu_array[] = array( '/wp-admin/edit.php?post_type=news', '最新情報' );
		$tag = '';
		$tb = "\t\t\t\t";
		$tag .= $tb . "" . '<div>' . "\n";
		$tag .= $tb . "\t" . '<ul class="custom-nav">' . "\n";
		foreach( $menu_array as $navi ){
			$tag .= $tb . "\t\t\t" . '<li><a href="'.get_site_url().$navi[0].'">'.$navi[1].'</a></li>' . "\n";
		}
		$tag .= $tb . "\t" . '</ul>' . "\n";
		$tag .= $tb . "" . '</div>' . "\n";

		echo $tag;
	}

	function add_dashboard_widgets() {
		$global_menu_title = '更新管理メニュー';
		wp_add_dashboard_widget('nav_dashboard_widget', $global_menu_title, 'nav_dashboard_widget_function');
		global $wp_meta_boxes;
		$normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
		$nav_widget_backup = array('nav_dashboard_widget' => $normal_dashboard['nav_dashboard_widget']);
		unset($normal_dashboard['nav_dashboard_widget']);
		$sorted_dashboard = array_merge($nav_widget_backup, $normal_dashboard);
		$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
	}
	add_action('wp_dashboard_setup', 'add_dashboard_widgets' );


	// スクリーンレイアウト表示
	function add_select_dashboard_columns() {
		add_screen_option( 'layout_columns', array( 'max' => 3, 'default' => 1 ) );
	}
	add_action( 'admin_head-index.php', 'add_select_dashboard_columns' );

/*--------------------------------------------------------------------
	アイキャッチ画像
--------------------------------------------------------------------*/

	// アイキャッチ画像の設定
	add_theme_support( 'post-thumbnails' );

	// アイキャッチの切り抜きモード
	add_image_size( 'thumb100', 100, 100, true );
	add_image_size( 'thumb640', 640, 425, true );
	add_image_size( 'thumb300', 300, 300, true );

/*--------------------------------------------------------------------
	ウィジェット関連
--------------------------------------------------------------------*/

	register_sidebar(array(
		'name'=>'サイドバー1',
		'id' => 'sidebar-1'
	));

	//ウィジェットの有効化
	register_sidebar(array(
		'name'=>'サイドバー2',
		'id' => 'sidebar-2'
	));

	//カスタム投稿タイプ用カレンダー
	function get_cpt_calendar($cpt, $initial = true, $echo = true) {
		global $wpdb, $m, $monthnum, $year, $wp_locale, $posts;

		$cache = array();
		$key = md5( $m . $monthnum . $year );
		if ( $cache = wp_cache_get( 'get_calendar', 'calendar' ) ) {
			if ( is_array($cache) && isset( $cache[ $key ] ) ) {
				if ( $echo ) {
					echo apply_filters( 'get_calendar',  $cache[$key] );
					return;
				} else {
					return apply_filters( 'get_calendar',  $cache[$key] );
				}
			}
		}

		if ( !is_array($cache) )
			$cache = array();

		// Quick check. If we have no posts at all, abort!
		if ( !$posts ) {
			$gotsome = $wpdb->get_var("SELECT 1 as test FROM $wpdb->posts WHERE post_type = '$cpt' AND post_status = 'publish' LIMIT 1");
			if ( !$gotsome ) {
				$cache[ $key ] = '';
				wp_cache_set( 'get_calendar', $cache, 'calendar' );
				return;
			}
		}

		if ( isset($_GET['w']) )
			$w = ''.intval($_GET['w']);

		// week_begins = 0 stands for Sunday
		$week_begins = intval(get_option('start_of_week'));

		// Let's figure out when we are
		if ( !empty($monthnum) && !empty($year) ) {
			$thismonth = ''.zeroise(intval($monthnum), 2);
			$thisyear = ''.intval($year);
		} elseif ( !empty($w) ) {
			// We need to get the month from MySQL
			$thisyear = ''.intval(substr($m, 0, 4));
			$d = (($w - 1) * 7) + 6; //it seems MySQL's weeks disagree with PHP's
			$thismonth = $wpdb->get_var("SELECT DATE_FORMAT((DATE_ADD('{$thisyear}0101', INTERVAL $d DAY) ), '%m')");
		} elseif ( !empty($m) ) {
			$thisyear = ''.intval(substr($m, 0, 4));
			if ( strlen($m) < 6 )
					$thismonth = '01';
			else
					$thismonth = ''.zeroise(intval(substr($m, 4, 2)), 2);
		} else {
			$thisyear = gmdate('Y', current_time('timestamp'));
			$thismonth = gmdate('m', current_time('timestamp'));
		}

		$unixmonth = mktime(0, 0 , 0, $thismonth, 1, $thisyear);
		$last_day = date('t', $unixmonth);

		// Get the next and previous month and year with at least one post
		$previous = $wpdb->get_row("SELECT MONTH(post_date) AS month, YEAR(post_date) AS year
			FROM $wpdb->posts
			WHERE post_date < '$thisyear-$thismonth-01'
			AND post_type = '$cpt' AND post_status = 'publish'
				ORDER BY post_date DESC
				LIMIT 1");
		$next = $wpdb->get_row("SELECT MONTH(post_date) AS month, YEAR(post_date) AS year
			FROM $wpdb->posts
			WHERE post_date > '$thisyear-$thismonth-{$last_day} 23:59:59'
			AND post_type = '$cpt' AND post_status = 'publish'
				ORDER BY post_date ASC
				LIMIT 1");

		/* translators: Calendar caption: 1: month name, 2: 4-digit year */
		$calendar_caption = _x('%1$s %2$s', 'calendar caption');
		$calendar_output = '<table id="wp-calendar">
		<caption>' . sprintf($calendar_caption, $wp_locale->get_month($thismonth), date('Y', $unixmonth)) . '</caption>
		<thead>
		<tr>';

		$myweek = array();

		for ( $wdcount=0; $wdcount<=6; $wdcount++ ) {
			$myweek[] = $wp_locale->get_weekday(($wdcount+$week_begins)%7);
		}

		foreach ( $myweek as $wd ) {
			$day_name = (true == $initial) ? $wp_locale->get_weekday_initial($wd) : $wp_locale->get_weekday_abbrev($wd);
			$wd = esc_attr($wd);
			$calendar_output .= "\n\t\t<th scope=\"col\" title=\"$wd\">$day_name</th>";
		}

		$calendar_output .= '
		</tr>
		</thead>

		<tfoot>
		<tr>';

		if ( $previous ) {
			$calendar_output .= "\n\t\t".'<td colspan="3" id="prev"><a href="' . get_month_link($previous->year, $previous->month) . '?post_type='.$cpt.'" title="' . esc_attr( sprintf(__('View posts for %1$s %2$s'), $wp_locale->get_month($previous->month), date('Y', mktime(0, 0 , 0, $previous->month, 1, $previous->year)))) . '">&laquo; ' . $wp_locale->get_month_abbrev($wp_locale->get_month($previous->month)) . '</a></td>';
		} else {
			$calendar_output .= "\n\t\t".'<td colspan="3" id="prev" class="pad">&nbsp;</td>';
		}

		$calendar_output .= "\n\t\t".'<td class="pad">&nbsp;</td>';

		if ( $next ) {
			$calendar_output .= "\n\t\t".'<td colspan="3" id="next"><a href="' . get_month_link($next->year, $next->month) . '?post_type='.$cpt.'" title="' . esc_attr( sprintf(__('View posts for %1$s %2$s'), $wp_locale->get_month($next->month), date('Y', mktime(0, 0 , 0, $next->month, 1, $next->year))) ) . '">' . $wp_locale->get_month_abbrev($wp_locale->get_month($next->month)) . ' &raquo;</a></td>';
		} else {
			$calendar_output .= "\n\t\t".'<td colspan="3" id="next" class="pad">&nbsp;</td>';
		}

		$calendar_output .= '
		</tr>
		</tfoot>

		<tbody>
		<tr>';

		// Get days with posts
		$dayswithposts = $wpdb->get_results("SELECT DISTINCT DAYOFMONTH(post_date)
			FROM $wpdb->posts WHERE post_date >= '{$thisyear}-{$thismonth}-01 00:00:00'
			AND post_type = '$cpt' AND post_status = 'publish'
			AND post_date <= '{$thisyear}-{$thismonth}-{$last_day} 23:59:59'", ARRAY_N);
		if ( $dayswithposts ) {
			foreach ( (array) $dayswithposts as $daywith ) {
				$daywithpost[] = $daywith[0];
			}
		} else {
			$daywithpost = array();
		}

		if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'camino') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'safari') !== false)
			$ak_title_separator = "\n";
		else
			$ak_title_separator = ', ';

		$ak_titles_for_day = array();
		$ak_post_titles = $wpdb->get_results("SELECT ID, post_title, DAYOFMONTH(post_date) as dom "
			."FROM $wpdb->posts "
			."WHERE post_date >= '{$thisyear}-{$thismonth}-01 00:00:00' "
			."AND post_date <= '{$thisyear}-{$thismonth}-{$last_day} 23:59:59' "
			."AND post_type = '$cpt' AND post_status = 'publish'"
		);
		if ( $ak_post_titles ) {
			foreach ( (array) $ak_post_titles as $ak_post_title ) {

					/** This filter is documented in wp-includes/post-template.php */
					$post_title = esc_attr( apply_filters( 'the_title', $ak_post_title->post_title, $ak_post_title->ID ) );

					if ( empty($ak_titles_for_day['day_'.$ak_post_title->dom]) )
						$ak_titles_for_day['day_'.$ak_post_title->dom] = '';
					if ( empty($ak_titles_for_day["$ak_post_title->dom"]) ) // first one
						$ak_titles_for_day["$ak_post_title->dom"] = $post_title;
					else
						$ak_titles_for_day["$ak_post_title->dom"] .= $ak_title_separator . $post_title;
			}
		}

		// See how much we should pad in the beginning
		$pad = calendar_week_mod(date('w', $unixmonth)-$week_begins);
		if ( 0 != $pad )
			$calendar_output .= "\n\t\t".'<td colspan="'. esc_attr($pad) .'" class="pad">&nbsp;</td>';

		$daysinmonth = intval(date('t', $unixmonth));
		for ( $day = 1; $day <= $daysinmonth; ++$day ) {
			if ( isset($newrow) && $newrow )
				$calendar_output .= "\n\t</tr>\n\t<tr>\n\t\t";
			$newrow = false;

			if ( $day == gmdate('j', current_time('timestamp')) && $thismonth == gmdate('m', current_time('timestamp')) && $thisyear == gmdate('Y', current_time('timestamp')) )
				$calendar_output .= '<td id="today">';
			else
				$calendar_output .= '<td>';

			if ( in_array($day, $daywithpost) ) // any posts today?
					$calendar_output .= '<a href="' . get_day_link( $thisyear, $thismonth, $day ) . '?post_type='.$cpt.'" title="' . esc_attr( $ak_titles_for_day[ $day ] ) . "\">$day</a>";
			else
				$calendar_output .= $day;
			$calendar_output .= '</td>';

			if ( 6 == calendar_week_mod(date('w', mktime(0, 0 , 0, $thismonth, $day, $thisyear))-$week_begins) )
				$newrow = true;
		}

		$pad = 7 - calendar_week_mod(date('w', mktime(0, 0 , 0, $thismonth, $day, $thisyear))-$week_begins);
		if ( $pad != 0 && $pad != 7 )
			$calendar_output .= "\n\t\t".'<td class="pad" colspan="'. esc_attr($pad) .'">&nbsp;</td>';

		$calendar_output .= "\n\t</tr>\n\t</tbody>\n\t</table>";

		$cache[ $key ] = $calendar_output;
		wp_cache_set( 'get_calendar', $cache, 'calendar' );

		if ( $echo )
			echo apply_filters( 'get_calendar',  $calendar_output );
		else
			return apply_filters( 'get_calendar',  $calendar_output );

	}

/*--------------------------------------------------------------------
	wp-rewrite
--------------------------------------------------------------------*/

	global $wp_rewrite;
	// flush_rules() を $wp_rewrite オブジェクトのメソッドとして呼び出す
	$wp_rewrite->flush_rules( false );

/*--------------------------------------------------------------------
	misc
--------------------------------------------------------------------*/

	// 管理画面にファビコンを表示
	function admin_favicon() {
		echo '<link rel="shortcut icon" type="image/x-icon" href="'. get_template_directory_uri() .'/images/favicons/favicon.ico" />';
	}
	add_action('admin_head', 'admin_favicon');

?>
