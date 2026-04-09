<?php
/**
 * hide-page-editor
 *
 * 固定ページ管理画面のエディタを非表示にする
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	function post_output_css() {
		global $disp_editor;
		$pt = get_post_type();
		$post_id = $_GET['post'];
		if ($pt == 'page') {
			if ( !in_array( $post_id, $disp_editor, true )  ){
				$hide_postdiv_css = '<style type="text/css">#postdiv, #postdivrich { display: none; }</style>';
				echo $hide_postdiv_css;
			}
		}
	}
	add_action('admin_head', 'post_output_css');