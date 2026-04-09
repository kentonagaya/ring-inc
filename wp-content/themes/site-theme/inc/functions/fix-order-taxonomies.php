<?php
/**
 * fix-order-taxonomies
 *
 * 投稿画面でカテゴリーやタクソノミーの並び順を固定する
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	function lig_wp_category_terms_checklist_no_top( $args, $post_id = null ) {
		$args['checked_ontop'] = false;
		return $args;
	}
	add_action( 'wp_terms_checklist_args', 'lig_wp_category_terms_checklist_no_top' );
