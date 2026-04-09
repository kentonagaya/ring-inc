<?php
/**
 * generate-ogp_image
 *
 * og:image のリンク生成
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	function insert_noindex(){

		$disp_noindex = '<meta name="robots" content="noindex,nofollow">'."\n";

		if(DIST == 0){
			// 「開発中」の場合は問答無用でnoindexにする
			$noindex = $disp_noindex;
		} else {
			// 「公開」状態ではnoindexを削除
			$noindex = '';
		}

		echo $noindex;

	}