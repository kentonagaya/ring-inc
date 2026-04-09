<?php
/*----------------------------------------------------------------
	## メール送信機能
----------------------------------------------------------------*/

	// セッション開始
	session_start();

	global $attachment;
	global $attach_field;

	// 確認画面かどうかをURLパラーメタから判定
	if(isset($_GET['step'])) {
		$step = $_GET['step'];
	}

	// 確認画面の場合
	if( $step == 'confirm' ) {

		// action指定
		$action = $fpath_thanks;

		// 確認画面用フォームID
		$form_id = $confirm_form_id;

		// ユニークIDでトークンを発行
		$token = uniqid('', true);

		// トークンをセッションに追加
		$_SESSION['token'] = $token;

	} else { // 入力画面の場合

		// action指定
		$action = $fpath_confirm;

		//入力画面用フォームID
		$form_id = $input_form_id;
	}

	// 送信機能：ページスラッグが「thanks」の場合にだけ発動
	if( get_post_field( 'post_name', get_the_ID()) == 'thanks' ) {

		// POSTされたトークンを取得
		$token = isset($_POST["token"]) ? $_POST["token"] : "";

		// セッション変数のトークンを取得
		$session_token = isset($_SESSION["token"]) ? $_SESSION["token"] : "";

		// セッション変数のトークンを削除
		unset($_SESSION["token"]);

		## 日本語の使用宣言
		mb_language("ja");
		mb_internal_encoding("UTF-8");

		## ヘッダー情報（自動返信用）
		$header  	= "MIME-Version: 1.0\n";
		if( $attachment ) {
			$header 	.= "Content-Type: multipart/mixed;boundary=\"__BOUNDARY__\"\n";
		}
		$header 	.= "From:" . mb_encode_mimeheader( $from_name ) . "<" . $mail_to . ">" . "\n";
		$header 	.= "Reply-to: " . $mail_to . "\n";
		$header 	.= "X-Mailer: PHP/". phpversion();

		## ヘッダー情報（運営者宛用）
		$admin_reply_header  	= "MIME-Version: 1.0\n";
		if( $attachment ) {
			$admin_reply_header 	.= "Content-Type: multipart/mixed;boundary=\"__BOUNDARY__\"\n";
		}
		if( $CC_mail_to ){
			$admin_reply_header .= "Cc:" . implode( ",", $CC_mail_to ) . "\n";
		}
		if( $BCC_mail_to ){
			$admin_reply_header .= "Bcc:" . implode( ",", $BCC_mail_to ) . "\n";;
		}
		$admin_reply_header 	.= "From:". mb_encode_mimeheader( $return_name ) . "<" . $return_mail . ">" . "\n";
		$admin_reply_header 	.= "Reply-to: " . $return_mail . "\n";
		$admin_reply_header 	.= "X-Mailer: PHP/". phpversion();

		// POSTされたトークンとセッション変数のトークンを比較し、同一なら送信
		if( $token != "" && $token == $session_token)  {
			$message = $ok_message;

			//メール送信
			mb_send_mail($_POST['form_email'], $subject, $return_text, $header);

			// 運営側へメール送信
			mb_send_mail($mail_to, $admin_reply_subject, $admin_reply_text, $admin_reply_header);

		} elseif( $token == '' && $session_token == '' ) {
			$message = $error_message;
		} else {
			$message = $reload_message;
		}

	}
?>