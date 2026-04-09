<?php

/*************************************************************************

	メールフォーム作成クラス

	@package	form.colass
		send_form_mail
		formset
	@author		oldoffice.com
	@since		PHP 5
	@ver		6.4.4

	2008-11-27	送信先設定を「thanks.php」から「form.config.php」に変更
	2008-11-27	複数送信先設定を可能に"CC","BCC"
	2011-03-02	受信時の不具合修正
	2011-03-02	受信時の不具合修正
	2012-10-04	classを send_form_mail に変更
				記述全体変更 [ver4]
	2015-02-17	PHP5対応,confirm機能付加
				記述全体変更 [ver5]
	---
	2015-02-27	確認用クラスを追記 [ver6]
	2015-03-03	サイズ指定クラスなどをスペースなしで引数に記載できるよう変更
	2015-03-04	checkboxtextのテキスト設定を削除 *CSSで対応
	2015-03-04	thanksへのアクションをコンストラクターで設定できるよう変更
				バグ修正（res_handole,selectの引数）
	---
	2015-03-05	セキュリティ強化
				ヌルバイト除去,タグ除去,半角カナ修正 [ver6.2]
	2015-03-09	thanksページリロードに対応 send_form_mail [ver6.3]
	2015-03-09	checkbox,selectにelements_valueを追加 [ver6.3.2]
	2015-03-09	typeにhiddenを追加 [ver6.3.3]
	2015-03-09	must_check_arr のバグ修正 [ver6.3.4]
	2015-03-30	$this->send_comp : メッセージ完了を変数(boolien)に設定 [ver6.3.5]
				※ 送信完了メッセージ表示後1回のみ
	2015-04-01	確認画面から送信画面へ戻る際のデータ保持 [ver.6.4.1]
	2015-04-10	checkbox が空の場合の送信画面データ保持に関する修正 [ver.6.4.2]
	2015-05-14	formのidを引数で変更できるように修正 N [ver.6.4.3]
	2015-07-28  textareaにplaceholderを設定できるように引数を追加 K
	2015-08-25  selectのselected不具合修正 N [ver.6.4.4]

**************************************************************************/

session_cache_limiter('private_no_expire');

/*** send_form_mail ***/
class send_form_mail extends base {

	public $send_comp;

	private $post;
	private $act;

	private $mail_to;
	private $title;
	private $contents;
	private $mail_from;

	private $ok_message;
	private $error_message;
	private $no_open_message;
	private $reload_message = 'The message has already been sent';

	private $auto_return;
	private $return_mail_from;
	private $return_title;
	private $return_contents;
	private $BCC;
	private $BCC_mail_to;

	### constructor

	function __construct( $setting_file_name = '/elements/settings/contact_config.php' ) {

		// $_POST取得
		$this->post = ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) ? $_POST : array();
		// sanitize
		$this->post = parent::sanitize_server_request( $this->post );
		foreach( $this->post as $k => $v ) {
			$$k = $v;
		}

		// act_check
		if( isset( $this->act ) && ( $this->act ) ) {
			$this->act = $this->act;
		} elseif( isset( $act ) && $act ) {
			$this->act = $act;
		} else {
			$this->act = 'error';
		}

		// 設定ファイル情報
		include_once( $setting_file_name );

		$this->mail_to          = isset( $mail_to ) && ( $mail_to )                   ? $mail_to          : '';
		$this->title            = isset( $title ) && ( $title )                       ? $title            : '';
		$this->contents         = isset( $contents ) && ( $contents )                 ? $contents         : '';
		$this->mail_from        = isset( $mail_from ) && ( $mail_from )               ? $mail_from        : '';

		$this->ok_message       = isset( $ok_message ) && ( $ok_message )             ? $ok_message       : '';
		$this->error_message    = isset( $error_message ) && ( $error_message )       ? $error_message    : '';
		$this->no_open_message  = isset( $no_open_message ) && ( $no_open_message )   ? $no_open_message  : '';

		$this->auto_return      = isset( $auto_return ) && ( $auto_return )           ? $auto_return      : '';
		$this->return_mail_from = isset( $return_mail_from ) && ( $return_mail_from ) ? $return_mail_from : '';
		$this->return_title     = isset( $return_title ) && ( $return_title )         ? $return_title     : '';
		$this->return_contents  = isset( $return_contents ) && ( $return_contents )   ? $return_contents  : '';

		$this->BCC              = isset( $BCC ) && ( $BCC )                           ? $BCC              : '';
		$this->BCC_mail_to      = isset( $BCC_mail_to ) && ( $BCC_mail_to )           ? $BCC_mail_to      : array();

		// 送信状況
		$this->send_comp = false;
	}

	/* 完了画面メッセージ表示（ 1.不正アクセスを判別 > 2.送信 > 3.表示） */

	public function disp_message() {

		if( $this->act != 'on' ) {
			$result_message = $this->no_open_message;
		} else {
			// リロードによる再送信停止
			if( isset( $_SESSION[ 'ticket' ], $this->post[ 'ticket' ] ) && $_SESSION[ 'ticket' ] === $this->post[ 'ticket' ] ) {
				// session
				unset( $_SESSION[ 'ticket' ] );

				// 複数のメール送信先設定
				$add_mail_header = 'From:' . $this->mail_from;
				if( $this->BCC == 'on' ) {
					for( $i = 0; $i < count( $this->BCC_mail_to ); $i++ ) {
						$add_mail_header .= "\n" . 'Bcc:' . $this->BCC_mail_to[ $i ];
					}
				}
				// 文字コード変換 & メール送信
				mb_language('English' );
				mb_internal_encoding( 'UTF-8' );
				if( mb_send_mail( $this->mail_to, $this->title, $this->contents, $add_mail_header ) ) {
					$result_message = $this->ok_message;
					$this->send_comp = true;
					if( $this->auto_return == "on" ) {
						mb_send_mail( $this->mail_from, $this->return_title, $this->return_contents, 'From:' . $this->return_mail_from );
					}
				} else {
					$result_message = $this->error_message;
				}
			} else {
				$result_message = $this->reload_message;
			}
		}
		echo $result_message;
	}
}

/*** formset ***/
class formset extends base {

	public $debug_repotr;

	public $step;
	public $form_id;
	public $form_action;
	public $is_sp;
	public $is_tb;
	public $is_pc;
	public $post = array();
	public $session;
	public $direct_target_value;
	public $must_check_array = array();

	private $def_class_size_arr = array(
		'l'  => 'size-l',
		'm'  => 'size-m',
		's'  => 'size-s',
		'ss' => 'size-ss'
	);
	private $def_confirm_error_mesasge = '※ This is a required item';
	private $check_type_arr = array(
		'text',
		'textarea',
		'email',
		'tel',
		'date',
		'number',
		'radio',
		'checkbox',
		'select',
		'pref',
		'hidden'
	);
	// for datepicker
	public $jq_ui_theme_name = 'ui-lightness'; // datepicker color for pc
	private $theme_style_arr = array(
		'red'    => 'blitzer',
		'orange' => 'ui-lightness',
		'brown'  => 'humanity',
		'mono'   => 'smoothness',
		'dark'   => 'ui-darkness',
		'blue1'  => 'redmond',
		'blue2'  => 'cupertino',
		'green'  => 'south-street'
	);
	// radio_sync
	private $radio_sync = array();

	### constructor

	function __construct( $fpath_thanks = '/contact/thanks/', $arg_form_id = 'contact_form', $tb = "\t\t\t\t\t\t\t\t\t\t" ) {

		// def
		$this->step = 'step_form';
		$this->form_id = $arg_form_id;
		$this->form_action = '';

		// post
		if( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
			$this->post = $_POST;
			// sanitize
			$this->post = parent::sanitize_server_request( $this->post );
		}

		// session
		if( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
			if( isset( $_SESSION ) ) {
				$this->session = array_merge( $_SESSION, $this->post ); // post優先
			} else {
				$this->session = $this->post;
			}
			$_SESSION = $this->session;
		}

//$this->debug_repotr .=  '$_SESSION'.'：'.nl2br(var_export($_SESSION,true)).'<br>';

		// confirm
		if( isset( $this->post[ 'step' ] ) && $this->post[ 'step' ] == 'step_confirm' ) {
			$this->step = 'step_confirm';
			$this->form_id = 'confirm_form';
			$this->form_action = $fpath_thanks;
		}
		// def tb
		$this->tb = $tb;
	}

	### function

	/* form要素disp */

	public function disp ( $type, $id, $arg01 = '', $arg02 = '', $arg03 = '', $arg04 = '', $arg05 = '' ) {

		switch( $type ) {
			case 'text':
			case 'email':
			case 'tel':
			case 'number':
			case 'date':
				echo $this->res_input_text( $type, $id, $arg01, $arg02, $arg03, $arg04, $arg05 );
				break;
			case 'textarea':
				echo $this->res_textarea( $type, $id, $arg01, $arg02, $arg03, $arg04, $arg05 );
				break;
			case 'radio':
				echo $this->res_input_radio( $type, $id, $arg01, $arg02, $arg03, $arg04, $arg05 );
				break;
			case 'checkbox':
				echo $this->res_input_checkbox( $type, $id, $arg01, $arg02, $arg03 );
				break;
			case 'select':
				echo $this->res_select( $type, $id, $arg01, $arg02, $arg03 );
				break;
			case 'pref':
				echo $this->res_pref( $type, $id );
				break;
			case 'hidden':
				echo $this->res_hidden( $type, $id, $arg01 );
				break;
			default:
				echo 'type error';
		}
	}

	/* form submit disp */

	public function submit ( $class_send = 'bc_blue', $class_back = 'bc_white', $data_theme_send = 'b', $data_theme_back = 'a' ) {

		$tag = "\n";
		$tb = $this->tb;

		$tag_back   = $tb . "\t" . '<a href="javascript:history.back();" id="submit_back" class="button bc-ghost' . $this->add_space( $class_back ) . '" data-ajax="false" data-role="button" data-theme="' . $data_theme_back . '">Returns to the input screen</a>' . "\n";
		$tag_submit = $tb . "\t" . '<input type="submit" id="submit_thanks" value="Send with the above contents" class="submit_send button' . $this->add_space( $class_send ) . '" data-theme="' . $data_theme_send . '">' . "\n";

		if( $this->is_form() ) {
			$tag .= $tb . "\t" . '<input type="hidden" name="step" value="step_confirm">' . "\n";
			$tag .= $tb . "\t" . '<input type="submit" id="submit_confirm" value=" Confirmation of input contents" class="submit_send button' . $this->add_space( $class_send ) . '" data-theme="' . $data_theme_send . '">' . "\n";
		} elseif( $this->is_confirm_error() ) {
				$tag .= $tag_back;
		} elseif( $this->is_confirm()  ) {
			$_SESSION[ 'ticket' ] = md5( uniqid() . mt_rand() );
			$tag .= $tb . "\t" . '<input type="hidden" id="ticket" name="ticket" value="' . htmlspecialchars( $_SESSION[ 'ticket' ], ENT_QUOTES ) . '">' . "\n";
			$tag .= $tb . "\t" . '<input type="hidden" id="act" name="act" value="on">' . "\n";
			if( $this->is_pc ) {
				$tag .= $tag_back . $tag_submit;
			} elseif( $this->is_sp ) {
				$tag .= $tag_submit . $tag_back;
			} elseif( $this->is_tb ) {
				$tag .= $tag_back . $tag_submit;
			}
		}
		echo $tag . $tb;
	}

	/* 必須表記 */

	//public function must($id, $str = '<span class="tx-icon must-input">必須</span>' ) {
	public function must($id, $str = '<span class="tx-icon must-input">Required</span>' ) {
		$tag = '<span class="must">' . $str . '</span><span id="form_' . $id . '_err"></span>';
		echo $tag;
	}

	/* 表示・非表示切換（ターゲット） */

	public function switch_disp( $handle_name, $handle_num, $init_disp = 'show' ) {
		$attr = $handle_name . '_' . $this->keta2( $handle_num );
		if( isset( $_SESSION[ 'form_' . $handle_name ] ) ) {
			$init_disp_css = ( $attr === $_SESSION[ 'form_' . $handle_name ] ) ? '' : ' style="display:none;"';
		} else {
			$init_disp_css = ( $init_disp === 'hide' ) ? ' style="display:none;"' : '';
		}
		$tag =' data-target="' . $attr . '"' . $init_disp_css;
		echo $tag;
	}

	/* 表示・非表示切換（直指定ハンドル-クラス）※ラジオ以外 */

	public function switch_handle_add_class( $handle_name, $handle_num, $class_on = 'current', $class_off = '', $current = false ) {
		$str = $handle_name . '_' . $this->keta2( $handle_num );
		if( isset( $_SESSION[ 'form_' . $handle_name ] ) && $_SESSION[ 'form_' . $handle_name ] ) {
			if( $_SESSION[ 'form_' . $handle_name ] == $str ) {
				$tag = $this->add_space( $str ) . $this->add_space( $class_on );
				$this->direct_target_value = $str;
			} else {
				$tag = $this->add_space( $str ) . $this->add_space( $class_off );
			}
		} else {
			if( $current ) {
				$tag = $this->add_space( $str ) . $this->add_space( $class_on );
				$this->direct_target_value = $str;
			} else {
				$tag = $this->add_space( $str ) . $this->add_space( $class_off );
			}
		}
		if( ! $this->direct_target_value ) {
			$this->direct_target_value = $_SESSION[ 'form_' . $handle_name ];
		}
		echo $tag;
	}

	/* 状態判定 */
	// 初期フォーム
	public function is_form() {
		if( $this->step == 'step_form' ) {
			return true;
		} else {
			return false;
		}
	}

	// 確認画面
	public function is_confirm() {
		if( $this->step == 'step_confirm' ) {
			return true;
		} else {
			return false;
		}
	}

	// 確認画面エラー
	public function is_confirm_error() {
		if( $this->step == 'step_confirm' ) {
			$temp_res = false;
			$arr = $this->must_check_array;
			for( $i = 0; $i < count( $arr ); $i++ ) {
				if( ! isset( $this->post[ 'form_' . $arr[ $i ] ] ) || $this->post[ 'form_' . $arr[ $i ] ] = '' ) {
					$temp_res = true;
					break;
				}
			}
			return $temp_res;
		} else {
			return false;
		}
	}

	// detepicker用 カラー設定
	public function detepicker_theme_color( $color_name = 'orange' ) {
		$arr = $this->theme_style_arr;
		if( isset( $arr[ $color_name ] ) ) {
			$this->jq_ui_theme_name = $arr[ $color_name ];
		} else {
			$this->jq_ui_theme_name = $arr[ 'orange' ];
		}
	}

	### tag_form_elements

	// text, email, tel, date, number
	private function res_input_text( $type, $id, $must, $class_size, $input_cover, $confirm_cover, $placeholder ) {

		$add_datepicker_class = '';
		$res_type = 'text';
		if( $type == 'text' ) {
			$res_type = 'text';
		} elseif( $type == 'email' ) {
			$res_type = 'text';
		} elseif( $type == 'tel' ) {
			$res_type = 'tel';
		} elseif( $type == 'date' ) {
			$res_type = 'date';
			$add_datepicker_class = ' datepicker';
		} elseif( $type == 'number' ) {
			$res_type = 'number';
		}
		$id = ( $type == 'email' ) ? 'email' : $id ;
		$class_size  = ( $class_size ) ? $this->add_space( $class_size ) : $this->add_space( $this->def_class_size_arr[ 'l' ] );
		$placeholder = ( $placeholder ) ? ' placeholder="' . $placeholder . '"' : '' ;

		if( $this->step == 'step_form' ) {
			$tag = '<input type="' . $res_type . '" id="' . $id . '" name="form_' . $id . '" class="input_text' . $class_size . $add_datepicker_class . '" value="' . $this->session_val( $id ) . '"' . $placeholder . '>';
			$tag = $this->cover_tag( $tag, $input_cover );
		} elseif( $this->step == 'step_confirm' ) {
			$temp_post = isset( $this->post[ 'form_' . $id ] ) ? $this->post[ 'form_' . $id ] : '';
			$tag = $this->confirm_tag( $id, $temp_post, $must );
			$tag = $this->cover_tag( $tag, $confirm_cover );
		}
		$this->must_arr_push( $id, $must );
		return $tag;
	}

	// textarea
	private function res_textarea( $type, $id, $must, $class_size, $placeholder ) {

		$class_size  = ( $class_size ) ? $this->add_space( $class_size ) : $this->add_space( $this->def_class_size_arr[ 'l' ] );
		$placeholder = ( $placeholder ) ? ' placeholder="' . $placeholder . '"' : '' ;

		if( $this->step == 'step_form' ) {
			$tag = '<textarea id="' . $id . '" name="form_' . $id . '" class="textarea' . $class_size . '"' . $placeholder . '>' . $this->session_val( $id ) . '</textarea>';
		} elseif( $this->step == 'step_confirm' ) {
			$temp_post = isset( $this->post[ 'form_' . $id ] ) ? $this->post[ 'form_' . $id ] : '';
			$tag = $this->confirm_tag( $id, $temp_post, $must, 'nl2br' );
		}
		$this->must_arr_push( $id, $must );
		return $tag;
	}

	// radio
	private function res_input_radio( $type, $id, $elements, $checked_num, $handle_name, $elements_value, $sync ) {

		$arr = explode( ',', $elements);
		$arr_value = explode( ',', $elements_value);

		// sync（他のradio群と連結する場合）
		if( isset( $this->radio_sync[ $id ] ) && $sync > 0 ) {
			$preset_elements_num = count( $this->radio_sync[ $id ] );
		} else {
			$preset_elements_num = 0;
			$this->radio_sync[ $id ] = array();
		}
//if( !empty( $sync ) && $sync > 0) {
//$this->debug_report .= ' $sync ' . ':' . ( $sync ) . '</br>';
//$this->debug_report .= 'before_class_func $this->radio_sync[ $id ]' . ':' . implode('/', $this->radio_sync[ $id ]) . '</br>';
//}

		if( $this->step == 'step_form' ) {
			$tag = "\n";
			$tb = $this->tb . "\t\t";
			for( $i = 0; $i < count( $arr ); $i++ ) {
				$res_handle_name = ( $handle_name ) ? $this->add_space( $handle_name ) . '_' . $this->keta2( $i + 1 ) : '';
				$val = ( $elements_value ) ? $arr_value[ $i ] : $arr[ $i ];
				if( isset( $_SESSION[ 'form_' . $id ] ) ) {
					if( $_SESSION[ 'form_' . $id ] === $val ) {
						$checked = ' checked';
						$current_handle_name = $handle_name . '_' . $this->keta2( $i + 1 );
					} else {
						$checked = '';
					}
				} else {
					if( $checked_num > 0 && ( $i + 1 ) == $checked_num ) {
						$checked = ' checked';
						$current_handle_name = $handle_name . '_' . $this->keta2( $i + 1 );
					} elseif( !$checked_num && $i == 0 ) {
						$checked = ' checked';
						$current_handle_name = $handle_name . '_' . $this->keta2( $i + 1 );
					} else {
						$checked = '';
					}
				}
				$tag .= $tb . "\t" . '<input type="radio" id="' . $id . $this->keta2( $i + $preset_elements_num + 1 ) . '" name="form_' . $id . '" value="' . $val . '" class="input_check' . $res_handle_name . '"' . $checked . '><label for="' . $id . $this->keta2( $i + 1 ) . '" class="check_label">' . $arr[ $i ] . '</label>' . "\n";
			}
			if( $handle_name != '' ) {
				$tag .= $tb . "\t" . '<input type="hidden" id="' . $handle_name . '" name="form_' . $handle_name . '" value="' . $current_handle_name . '">' . "\n";
			}
			$tag .= $tb;
		} elseif( $this->step == 'step_confirm' ) {
			$tag = $this->confirm_tag( $id, $this->post[ 'form_' . $id ] );
		}
		// for sync
		if( !empty( $sync ) && $sync > 0) {
			$this->radio_sync[ $id ] = array_merge( $arr, $this->radio_sync[ $id ] );
//$this->debug_report .= 'after_class_func $this->radio_sync[ $id ]' . ':' . implode('/', $this->radio_sync[ $id ]) . '</br>';
		}
		return $tag;
	}

	// checkbox
	private function res_input_checkbox( $type, $id, $elements, $checked_num, $elements_value ) {

		$arr = explode( ',', $elements);
		$arr_value = explode( ',', $elements_value);
		$checked_num_arr = ( $checked_num === '' ) ? array() : explode( ',', $checked_num );
		$session_array = ( isset( $_SESSION[ 'form_' . $id ] ) && is_array( $_SESSION[ 'form_' . $id ] ) ) ? $_SESSION[ 'form_' . $id ] : array();

		if( $this->step == 'step_form' ) {
			$tag = "\n";
			$tb = $this->tb . "\t\t";
			for( $i = 0; $i < count( $arr ); $i++ ) {
				$val = isset( $arr_value[ $i ] ) && ( $arr_value[ $i ] ) ? $arr_value[ $i ] : $arr[ $i ];
				if( isset( $session_array ) && $session_array ) {
					$checked = in_array( $val, $session_array ) ? ' checked' : '';
				} else {
					$checked = in_array( ( $i + 1 ), $checked_num_arr ) ? ' checked' : '';
				}
				$tag .= $tb . "\t" . '<input type="checkbox" id="' . $id . $this->keta2( $i + 1 ) . '" name="form_' . $id . '[]" value="' . $val . '" class="input_check"' . $checked . '><label for="' . $id . $this->keta2( $i + 1 ) . '" class="check_label">' . $arr[ $i ] . '</label>' . "\n";
			}
			$tag .= $tb;
		} elseif( $this->step == 'step_confirm' ) {
			$post_merge = ( isset( $this->post[ 'form_' . $id ] ) && is_array( $this->post[ 'form_' . $id ] ) ) ? implode( ' , ', $this->post[ 'form_' . $id ] ) : '';
			$tag = $this->confirm_tag( $id, $post_merge );
		}
		return $tag;
	}

	// select
	private function res_select( $type, $id, $elements, $default, $elements_value ) {

		$arr = explode( ',', $elements);
		$arr_value = explode( ',', $elements_value);

		if( $this->step == 'step_form' ) {
			$tag = "\n";
			$tb = $this->tb . "\t\t";
			$tag .= $tb . "\t" . '<select id="' . $id . '" name="form_' . $id . '">' . "\n";
			if( $default ) {
				$selected = ( isset( $_SESSION[ 'form_' . $id ] ) ) ? '' : ' selected';
				$tag .= $tb . "\t\t" . '<option' . $selected . ' >' . $default . '</option>' . "\n";
			}
			for( $i = 0; $i < count( $arr ); $i++ ) {
				$add_disabled = '';
				$add_class = '';
				if( preg_match( '/^(disabled)/',  $arr[ $i ] ) ) {
					$arr[ $i ] = preg_replace( '/^(disabled)/', '', $arr[ $i ] );
					$add_disabled = ' disabled="disabled"';
					$add_class = ' class="disabled"';
				}
				$val = ( $elements_value ) ? $arr_value[ $i ] : $arr[ $i ];
				if( isset( $_SESSION[ 'form_' . $id ] ) ) {
					$selected = ( $val == $_SESSION[ 'form_' . $id ] ) ? ' selected' : '';
				} else {
					$selected = ( $i == 0 && ! $default ) ? ' selected' : '';
				}
				$tag .= $tb . "\t\t" . '<option value="' . $val . '"' . $selected . '' . $add_disabled . $add_class . '>' . $arr[ $i ] . '</option>' . "\n";
			}
			$tag .= $tb . "\t" . '</select>' . "\n" . $tb;
		} elseif( $this->step == 'step_confirm' ) {
			$tag = $this->confirm_tag( $id, $this->post[ 'form_' . $id ] );
		}
		return $tag;
	}

	// pref
	private function res_pref( $type, $id ) {

		$arr = array( '北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県', '茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県', '新潟県', '山梨県', '長野県', '富山県', '石川県', '福井県', '岐阜県', '静岡県', '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県', '鳥取県', '島根県', '岡山県', '広島県', '山口県', '徳島県', '香川県', '愛媛県', '高知県', '福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県' );

		if( $this->step == 'step_form' ) {
			$tag = "\n";

			$tb = $this->tb . "\t\t";
			$tag .= $tb . "\t" . '<select id="' . $id . '" name="form_' . $id . '">' . "\n";
			for( $i = 0; $i < count( $arr ); $i++ ) {
				if( isset( $_SESSION[ 'form_' . $id ] ) ) {
					$selected = ( in_array( $_SESSION[ 'form_' . $id ], $arr ) ) ? ' selected' : '';
				} else {
					$selected = ( $i == 0 ) ? ' selected' : '';
				}
				$tag .= $tb . "\t\t" . '<option value="' . $arr[ $i ] . '"' . $selected . '>' . $arr[ $i ] . '</option>' . "\n";
			}
			$tag .= $tb . "\t" . '</select>' . "\n" . $tb;
		} elseif( $this->step == 'step_confirm' ) {
			$tag = $this->confirm_tag( $id, $this->post[ 'form_' . $id ] );
		}

		return $tag;
	}

	// hidden
	private function res_hidden( $type, $id, $val = '' ) {

		if( $this->step == 'step_form' ) {
			$tag = '<input type="hidden" id="' . $id . '" name="form_' . $id . '" value="' . $val . '">';
		} elseif( $this->step == 'step_confirm' ) {
			$tag = $this->confirm_tag( $id, $this->post[ 'form_' . $id ] );
		}

		return $tag;
	}

	### module

	// keta2
	private function keta2( $int ) {
		return ( $int < 10 ) ? '0' . $int : $int;
	}

	// add_space
	private function add_space( $str ) {
		if( isset( $str ) && ! empty( $str ) ) {
			$str = ' ' . $str;
		} else {
			$str = '';
		}
		return $str;
	}

	// session_val
	private function session_val( $id ) {
		if( isset( $_SESSION[ 'form_' . $id ] ) ) {
			$str = $_SESSION[ 'form_' . $id ];
		} else {
			$str = '';
		}
		return $str;
	}

	// session_checked

	// cover_tag
	private function cover_tag( $tag, $cover_str, $delimiter = ',' ) {

		$cover_arr = explode( ',', $cover_str);
		$cover_start = isset( $cover_arr[ 0 ] ) ? '<span class="input_cover_start">' . $cover_arr[ 0 ] . '</span>' : '';
		$cover_end = isset( $cover_arr[ 1 ] ) ? '<span class="input_cover_end">' . $cover_arr[ 1 ] . '</span>' : '';
		return $cover_start . $tag . $cover_end;
	}

	// confirm_tag
	private function confirm_tag( $id, $post, $must = '', $nl2br = '' ) {

		if( $must == 'must' && $post == '' ) {
			$tag = $this->def_confirm_error_mesasge;
		} elseif( $nl2br == 'nl2br' ) {
			$tag = nl2br( $post ) . '<input type="hidden" id="' . $id . '" name="form_' . $id . '" value="' . $post . '">';
		} else {
			$tag = $post . '<input type="hidden" id="' . $id . '" name="form_' . $id . '" value="' . $post . '">';
		}
		return $tag;
	}

	// must_array_push
	private function must_arr_push( $id, $must ) {
		if( $must && ! in_array( $id, $this->must_check_array ) ){
			array_push( $this->must_check_array, $id );
		}
	}
}

?>