<?php
/**
 * set-eyecatch
 *
 * アイキャッチを使用可能にする
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	add_theme_support( 'post-thumbnails' );
	add_image_size( 'thumb100', 100, 100, true );
	add_image_size( 'thumb640', 640, 425, true );
	add_image_size( 'thumb300', 300, 300, true );
	add_image_size( 'thumb1200', 1200, 630, true );