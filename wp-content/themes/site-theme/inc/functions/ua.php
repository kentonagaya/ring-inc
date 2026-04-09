<?php
/**
 * ua
 *
 * UA判定と、UAによる表示切り替え機能
 *
 * @version 1.0
 * @since site theme X 10.0
 */

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

	/* switch_ua ( pcのみ表示文字列 || tbのみ表示文字列 || spのみ表示文字列 ) */
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