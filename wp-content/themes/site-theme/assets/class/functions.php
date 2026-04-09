<?php
/*--------------------------------------------------------------

	mod_base

	@package	functions.php
	@author		endesign factory
	@since		PHP 5.3
	@ver		01.2.1

	@history
		2016-04-29 新規作成 Terajima

---------------------------------------------------------------*/

/*--------------------------------------------------------------
	UA判定
---------------------------------------------------------------*/

/* is_pc ( mode:pcの判定 ) */
function is_pc() {
	$ua = new UserAgent();
	if($ua->set() === "others") {
		return true;
	} else {
		return false;
	}
}

/* is_sp ( mode:spの判定 ) */
function is_sp() {
	$ua = new UserAgent();
	if($ua->set() === "mobile") {
		return true;
	} else {
		return false;
	}
}

/* is_tb ( mode:tbの判定 ) */
function is_tb() {
	$ua = new UserAgent();
	if($ua->set() === "tablet") {
		return true;
	} else {
		return false;
	}
}

/*--------------------------------------------------------
	PC, SP, TB 切り替え機能
--------------------------------------------------------*/

/*
switch_ua ( pcのみ表示文字列 || tbのみ表示文字列 || spのみ表示文字列 )
*/

function switch_ua( $word_pc = '', $word_tb = '', $word_sp = '' ){
	$ua = new UserAgent();
	if( $ua->set() === 'others' && $word_pc ){
		return $word_pc;
	}
	if( $ua->set() === 'tablet' && $word_tb ){
		return $word_tb;
	}
	if( $ua->set() === 'mobile' && $word_sp ){
		return $word_sp;
	}
}

/*--------------------------------------------------------
	消費税計算機能
--------------------------------------------------------*/

function tax( $attr ) {

	$tax_rate			= 1.08;
	$tax_include		= 'include'; 	// 税込み
	//$tax_include		= 'exclude'; 	// 税別

	$tax_str 			= 'on';			// 税抜 / 込 表示をする
//	$tax_str 			= 'off';		// 税抜 / 込 表示をしない

	$tax_str1			= '（税込）';
	$tax_str2			= '（税別）';

	if ( $tax_include == 'include' && $tax_str == 'on' ){
		$price = floor( $attr * $tax_rate );
		$price = number_format( $price );
		echo '<em class="font-designed">&yen; ' . $price . '</em><span class="tax-str">' . $tax_str1 . '</span>';
	};

	if ( $tax_include == 'exclude' && $tax_str == 'on' ){
		$price = floor( $attr / $tax_rate );
		$price = number_format( $price );
		echo '<em class="font-designed">&yen; ' . $price . '</em><span class="tax-str">' . $tax_str2 . '</span>';
	};
	if ( $tax_include == 'include' && $tax_str == 'off' ){
		$price = floor( $attr * $tax_rate );
		$price = number_format( $price );
		echo '<em class="font-designed">&yen; ' . $price . '</em>';
	};

	if ( $tax_include == 'exclude' && $tax_str == 'off' ){
		$price = floor( $attr / $tax_rate );
		$price = number_format( $price );
		echo '<em class="font-designed">&yen; ' . $price . '</em>';
	};
};

?>