<?php
/**
 * wp-title-tag
 *
 * タイトルタグを整形
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	function my_title_parts( $title ) {
		$title['site'] = '';
		return $title;
	}
	add_filter( 'document_title_parts', 'my_title_parts', 10, 2 );
