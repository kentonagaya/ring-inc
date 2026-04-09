<?php
/**
 * hide-adminmenu
 *
 * adminmenu を非表示
 *
 * @version 1.0
 * @since site theme X 10.0
 */
/*--------------------------------------------------------------------
	サイドバーの項目を非表示
--------------------------------------------------------------------*/

	add_action( 'admin_menu', 'remove_menus' );
	function remove_menus(){
		//remove_menu_page( 'index.php' ); //ダッシュボード
		remove_menu_page( 'edit.php' ); //投稿メニュー
		//remove_menu_page( 'upload.php' ); //メディア
		//remove_menu_page( 'edit.php?post_type=page' ); //ページ追加
		//remove_menu_page( 'edit-comments.php' ); //コメントメニュー
		//remove_menu_page( 'themes.php' ); //外観メニュー
		//remove_menu_page( 'plugins.php' ); //プラグインメニュー
		//remove_menu_page( 'tools.php' ); //ツールメニュー
		//remove_menu_page( 'options-general.php' ); //設定メニュー
	}