<?php
/**
 * disable-gutenberg
 *
 * gutenbergの無効化
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	add_filter( 'use_block_editor_for_post', '__return_false' );
	function remove_gutenberg_style() {
		wp_dequeue_style( 'wp-block-library' );
	}