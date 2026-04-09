<?php
/**
 * wp-refresh
 *
 * カスタム投稿パーマリンクのリフレッシュを確実にする
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	global $wp_rewrite;
	$wp_rewrite->flush_rules( false );