<?php
// nameの値を代数化
foreach ($_POST as $name => $value) {
	$$name = $value;
}
/*************************************************************************

	メールフォーム作成ファイル

	@package	form_settings.php
	@author		endesign-factory.com
	@since		PHP 7.3
	@ver		3.0

	2021-05-14	新規作成

**************************************************************************/

/*======================================================================
	添付ファイルの有無
======================================================================*/

	# 添付ファイルフィールドの名称
	# @@@@@@ 添付ファイル領域を使用しない場合は $$attachment = false; としてください @@@@@@

	$attachment = 'form_file';
//	$$attachment = false; //添付ファイルがない場合

/*======================================================================
	メールアドレス設定
======================================================================*/

	## 運営者メールアドレス
	//$mail_to = 'user@site.com';
	$mail_to = 'tera@edfc.jp';

	## CC送信先
	$CC_mail_to = array(
		//'user@site.com'
	);

	## BCC送信先
	$BCC_mail_to = array(
		//'user@site.com'
	);

	## 自動返信用メールヘッダーに記載される名前
	$from_name =  mb_convert_encoding( COMPANY_NAME, 'UTF-8', 'AUTO');
	//$from_name =  mb_convert_encoding('個別指定');

	## 運営者宛のメールヘッダーに記載される送信者のメールアドレス
	$return_mail = $_POST['form_email'];
	//$return_mail = ''; // 個別指定

	## 運営者宛のメールヘッダーに記載される送信者の名前
	$return_name = $_POST['form_name'];
	//$return_name = ''; // 個別指定

/*======================================================================
	ボタンのテキスト
======================================================================*/

	$confirm_button = '送信内容のご確認';
	$back_button 	= '戻って修正する';
	$send_button	= 'この内容で送信';

/*======================================================================
	タイムゾーン
======================================================================*/

	date_default_timezone_set('Asia/Tokyo');

/*======================================================================
	送信完了画面のURLとフォームID
======================================================================*/

	// 確認ページのURL
	$fpath_confirm = HOME.get_currentdir_slug().'?step=confirm';

	// thanksページのURL
	$fpath_thanks = HOME.get_currentdir_slug().'/thanks';

	// 入力画面フォームID
	$input_form_id = 'form-input';

	// 確認画面フォームID
	$fonfirm_form_id = 'form-confirm';

/*======================================================================
	完了画面に表示する文言
======================================================================*/

	## 正常に表示された場合
	$ok_message      = '送信が完了いたしました。<br>お問合せいただきありがとうございました。';

	## エラーの場合
	$error_message   = '不正なアクセスです。';

	## thanksページを再読み込みした場合
	$reload_message  = 'メッセージはすでに送信済です。';

/*======================================================================
	メール本文
======================================================================*/

	## 返信用メールタイトル
	$subject = '【' . COMPANY_NAME . '】お問い合わせありがとうございました';

	## 運営側へ送るメールタイトル
	$admin_reply_subject = '【' . COMPANY_NAME . '】Webサイトにお問い合わせがありました';

/*----------------------------------------------------------------
	本文設定
----------------------------------------------------------------*/

	$contents = "";
	$contents .= "[お名前]\n";
	$contents .= $form_name."\n";
	$contents .= "\n";
	$contents .= "[メールアドレス]\n";
	$contents .= $form_email."\n";
	$contents .= "\n";
	$contents .= "[電話番号]\n";
	$contents .= $form_tel."\n";
	$contents .= "\n";
	$contents .= "[ご住所]\n";
	$contents .= "〒".$form_zip." ".$form_address1." ".$form_address2."\n";
	$contents .= "\n";
	$contents .= "[チェックボックス]\n";
	$contents .= $form_check1."\n";
	$contents .= "\n";
	$contents .= "[ラジオボタン]\n";
	$contents .= $form_radio1."\n";
	$contents .= "\n";
	$contents .= "[セレクトボックス]\n";
	$contents .= $form_select1."\n";
	$contents .= "\n";
	$contents .= "[日付選択]\n";
	$contents .= $form_date."\n";
	$contents .= "\n";
	$contents .= "[添付ファイル]\n";
	$contents .= $form_file."\n";
	$contents .= "\n";
	$contents .= "[テキストエリア]\n";
	$contents .= $form_message."\n";
	$contents .= "\n";

/*----------------------------------------------------------------
	自動返信用 本文設定
----------------------------------------------------------------*/

	$text = "この度はお問い合わせいただき、誠にありがとうございました。\n";
	$text = "下記の内容でお問い合わせを受け付けました。\n";
	$text .= "\n";
	$text .= "--------------------------------------------------------\n";
	$text .= "送信日時 : " . date("Y-m-d H:i") . "\n";
	$text .= "--------------------------------------------------------\n";
	$text .= "\n";
	$text .= $contents;
	$text .= "\n";
	$text .= "--------------------------------------------------------\n";
	$text .= COMPANY_NAME . "\n";
	$text .= ZIP . ' ' . ADDRESS1 . ' ' . ADDRESS2 . "\n";
	$text .= 'TEL : ' . PHONE . PHONE_TEXT . ' / FAX : ' . FAX . "\n";
	$text .= SITE_URL . "\n";
	$text .= "--------------------------------------------------------\n";
	$text .= "\n";

	$return_text = $text;

/*----------------------------------------------------------------
	運営者宛 本文設定
----------------------------------------------------------------*/

	if( $attachment ) {
		$text = "--__BOUNDARY__\n";
	} else {
		$text = "";
	}
	$text .= "ホームページより、下記の内容でお問い合わせがありました。\n";
	$text .= "\n";
	$text .= "--------------------------------------------------------\n";
	$text .= "送信日時 ： " . date("Y-m-d H:i") . "\n";
	$text .= "--------------------------------------------------------\n";
	$text .= "\n";
	$text .= $contents;
	$text .= "\n";
	$text .= "--------------------------------------------------------\n";
	$text .= "\n";
	if( $attachment ) {
		$postedfile = mb_encode_mimeheader( $_POST[$attachment], "ISO-2022-JP", "UTF-8" );
		$text .= "--__BOUNDARY__\n";
		$text .= "Content-Type: application/octet-stream; name=\"{$postedfile}\"\n";
		$text .= "Content-Disposition: attachment; filename=\"{$postedfile}\"\n";
		$text .= "Content-Transfer-Encoding: base64" ."\n";
		$text .= "\n";
		$text .= chunk_split(base64_encode(file_get_contents( './dist/temp/attachment/' . $postedfile )));
		$text .= "--__BOUNDARY__\n";
	} else {
		$text .= "";
	}

	$admin_reply_text = $text;

	// メール送信機能読読み込み
	require_once ( THEMEPATH.'inc/mailform/func-sendmail.php');

?>
