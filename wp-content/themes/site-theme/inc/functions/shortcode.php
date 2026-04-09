<?php
/**
 * shirtcode
 *
 * ショートコード
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	// ファイルインクルード
	function my_file_include($params = array()) {
		extract(shortcode_atts(array('file' => 'default', 'id' => 'default'), $params));
		ob_start();
		$form_id = $id;
		include(STYLESHEETPATH . "/$file.php");
		return ob_get_clean();
	}
	add_shortcode('inc_file', 'my_file_include');

?>