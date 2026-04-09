<?php
/**
 * get-aside
 *
 * サイドバーを表示
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	function container_class() {

		global $sidebar_position;

		if($sidebar_position == 'right') {
			echo ' -has_side_r';
		} elseif($sidebar_position == 'left') {
			echo ' -has_side_l';
		} else {
			echo '';
		}

	}

	function get_aside() {

		global $sidebar_position;
		global $post_type;

		if($sidebar_position == 'right' or $sidebar_position == 'left'){
			if($post_type == 'post'){
				$aside_path = get_template_directory() . '/pages/post/sidebar.php';
			} else {
				$aside_path = get_template_directory() . '/pages/' . get_currentdir_slug() . '/sidebar.php';
			}
		}

		if($sidebar_position) {
			if (file_exists($aside_path)) {
				include($aside_path);
			} else {
				$aside_path = get_template_directory() . '/pages/post/sidebar.php';
			}
		}

	}
