<?php
/**
 * html head
 *
 * @since site theme X 10.0
 * @author Yoshiharu terajima
 */

 	// ヘッダーの透明化ステータス取得
	if( HEADER_TRANS == '1' ){
		if( is_home() || is_front_page() ) {
			$trans_status = '-header_trans';
		} else {
			$trans_status = '';
		}
	} elseif( HEADER_TRANS == '2' ){
		$trans_status = '-header_trans';
	} else {
		$trans_status = '';
	};

	// viewportの切り分け
	if(VIEWPORT){
		// 設定で「 PCとタブレットは同じViewportを設定」にチェックがある場合
		if( is_pc()|is_tb() ){
			$viewport = '<meta name="viewport" content="width=1240">';
		} else {
			$viewport = '<meta name="viewport" content="width=device-width, initial-scale=1">';
		}
	} else {
		// チェックがない場合は、全デバイスで同じViewportを入れる
		$viewport = '<meta name="viewport" content="width=device-width, initial-scale=1">';
	}

?>
<!DOCTYPE html>
<html lang="ja" class="no-js">
<head>
<meta charset="UTF-8">
<?=$viewport?>
<link rel="stylesheet" href="<?=HOME?>dist/css/style.css">
<script src="<?=HOME?>dist/js/jquery.min.js"></script>
<script src="<?=HOME?>dist/js/bundle.js"></script>
<link rel="icon" href="<?=HOME?>dist/favicons/favicon.ico">
<link rel="apple-touch-icon" href="<?=HOME?>dist/favicon/apple-touch-icon.png">
<meta name="theme-color" content="<?=THEME_COLOR?>">
<?=insert_noindex()?>
<?=wp_head()?>
</head>
