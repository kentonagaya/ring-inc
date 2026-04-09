<?php

/*************************************************************************

	基本モジュールクラス

	@package	base.class
		base_module
			sanitize_server_request
			UserAgent
	@author		endesign factory
	@since		PHP 5.3
	@ver		1.1.1

	2016-04-15	新規制作N(1.1.1)

**************************************************************************/


class base {

	### function

	// sanitize_server_request(ヌルバイトの除去・タグの除去)
	public function sanitize_server_request( $sanitized ) {
		if( is_array( $sanitized) ) {
			return array_map( array( 'base', 'sanitize_server_request' ), $sanitized);
		}
		// nullバイト除去
		$sanitized = str_replace( "\0", '', $sanitized );
		// [magic_quotes_gpc = On] => エスケープ解除
		// if( get_magic_quotes_gpc() ) {
		// 	$sanitized = stripslashes( $sanitized );
		// }
		// タグ除去
		$sanitized = htmlspecialchars( $sanitized, ENT_QUOTES );
		$sanitized = mb_convert_kana( $sanitized, 'KV', 'UTF-8' );
		return $sanitized;
	}
}

/* User Agent Class */

class UserAgent{
	private $ua;
	private $device;
	public function set(){
		$this->ua = mb_strtolower($_SERVER['HTTP_USER_AGENT']);
		if(strpos($this->ua,'iphone') !== false){
			$this->device = 'mobile';
		}elseif(strpos($this->ua,'ipod') !== false){
			$this->device = 'mobile';
		}elseif((strpos($this->ua,'android') !== false) && (strpos($this->ua, 'mobile') !== false)){
			$this->device = 'mobile';
		}elseif((strpos($this->ua,'windows') !== false) && (strpos($this->ua, 'phone') !== false)){
			$this->device = 'mobile';
		}elseif((strpos($this->ua,'firefox') !== false) && (strpos($this->ua, 'mobile') !== false)){
			$this->device = 'mobile';
		}elseif(strpos($this->ua,'blackberry') !== false){
			$this->device = 'mobile';
		}elseif(strpos($this->ua,'ipad') !== false){
			$this->device = 'tablet';
		}elseif((strpos($this->ua,'windows') !== false) && (strpos($this->ua, 'touch') !== false && (strpos($this->ua, 'tablet pc') == false))){
			$this->device = 'tablet';
		}elseif((strpos($this->ua,'android') !== false) && (strpos($this->ua, 'mobile') === false)){
			$this->device = 'tablet';
		}elseif((strpos($this->ua,'firefox') !== false) && (strpos($this->ua, 'tablet') !== false)){
			$this->device = 'tablet';
		}elseif((strpos($this->ua,'kindle') !== false) || (strpos($this->ua, 'silk') !== false)){
			$this->device = 'tablet';
		}elseif((strpos($this->ua,'playbook') !== false)){
			$this->device = 'tablet';
		}else{
			$this->device = 'others';
		}
		return $this->device;
	}
}

?>
