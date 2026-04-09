<?php
/*************************************************************************

	メールフォーム作成ファイル

	@package	form_config_xxx.php
	@author		endesign-factory.com
	@since		PHP 7.3
	@ver		1.0

	2020-09-20	新規作成

**************************************************************************/

/*======================================================================
	メールフォーム項目
======================================================================*/

	$form_content = array(

		array(
			// テキストボックス
			'title'			=> '会社名',
			'type'			=> 'text',
			'name' 			=> 'company',
			'placeholder' 	=> '',
			'size'			=> '',
			'required' 		=> true,
			'notice'		=> ''
		),

		array(
			// テキストボックス
			'title'			=> 'お名前',
			'type'			=> 'text',
			'name' 			=> 'name',
			'placeholder' 	=> '',
			'size'			=> '',
			'required' 		=> true,
			'notice'		=> ''
		),

		array(
			// メールアドレス
			'title'			=> 'メールアドレス',
			'type'			=> 'email',
			'name'	 		=> 'email',
			'placeholder' 	=> '',
			'size'			=> '',
			'required' 		=> true,
			'notice'		=> ''
		),

		array(
			// 電話番号
			'title'			=> '電話番号',
			'type'			=> 'tel',
			'name'	 		=> 'tel',
			'placeholder' 	=> '',
			'size'			=> '',
			'required' 		=> false,
			'notice'		=> ''
		),

		array(
			// 住所セット
			'title'			=> 'ご住所',
			'type'			=> 'address',
			'name'			=> 'address',
			'required' 		=> false,
			'notice'		=> ''
		),

		array(
			// テキストエリア（ノーマル）
			'title'			=> 'お問い合わせ内容',
			'type'			=> 'textarea',
			'name'	 		=> 'message',
			'placeholder' 	=> 'お問い合わせ内容をご入力ください',
			'size'			=> '',
			'required' 		=> false,
			'notice'		=> ''
		)

	);

	// フィールドに添付ファイル領域があるか検索し判定
	if( in_array('file', array_column($form_content, 'type')) ){
		$attach_field = true;
	}

/*======================================================================
	ボタンのテキスト
======================================================================*/

	$confirm_button = '送信内容のご確認';
	$back_button 	= '戻って修正する';
	$send_button	= 'この内容で送信';

/*======================================================================
	同意ボタンの表示 / 非表示
======================================================================*/

	$agree_button 	= true; // 表示:true / 非表示:false
	$agree_name 	= 'プライバシーポリシー';
	$agree_heading 	= 'プライバシーポリシーのご確認と同意をお願いします';
	$agree_text 	= 'を確認し、同意しました';
	$agree_url		= 'privacy';

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
	$confirm_form_id = 'form-confirm';

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
	自動返信用 本文設定
----------------------------------------------------------------*/

	// 本文用モジュール読み込み
	require_once ( THEMEPATH.'inc/mailform/form-mail-text.php');

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

	if( $attach_field ) {
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
	if( $attach_field ) {
		$text .= "--__BOUNDARY__\n";
	} else {
		$text .= "";
	}

	// 添付ファイル領域
	$attachment = in_array('file', array_column( $form_content, 'type' ));
	if( $attachment ) {
		foreach( $form_content as $row ){
			if( $row['type'] == 'file' ) {
				$text .= "--__BOUNDARY__\n";
				for( $i = 1; $i <= $_POST['repeat_' . $row['name'] . '_num']; $i++ ){
					$postedfile = $_POST[ 'form_' . $row['name'] . '_' . $i ];
					//$postedfile = mb_encode_mimeheader( $_POST[ 'form_' . $row['name'] . '_' . $i ], "ISO-2022-JP", "UTF-8" );
					if( $_POST['form_' . $row['name'] . '_' . $i] ){ // マルチパート生成
						$text .= "Content-Type: application/octet-stream; name=\"{$postedfile}\"\n";
						$text .=  "Content-Disposition: attachment; filename=\"{$postedfile}\"\n";
						$text .= 'Content-Transfer-Encoding: base64' ."\n";
						$text .= "\n";
						$text .= chunk_split(base64_encode(file_get_contents( './dist/temp/attachment/' . $postedfile )));
						$text .= "--__BOUNDARY__\n";
					}
				}
			}
		}
	}

	$admin_reply_text = $text;

	// メール送信機能読読み込み
	require_once ( THEMEPATH.'inc/mailform/func-sendmail.php');


/*======================================================================
	メールフォーム項目（コピペ用：必ずコメントアウトしてください）
======================================================================*/

/*

$form_content = array(

	array(
		// ラジオボタン（項目選択スイッチ用）
		'title'			=> 'お問い合わせ種別',
		'type'			=> 'radio',
		'name' 			=> 'kind',
		'required' 		=> true, // 項目選択スイッチの場合は必ずtrueにしてください
		'option' 		=> 'ラジオボタンを表示,チェックボックスを表示',
		'horizontal'	=> true,
		'selected' 		=> '',
		'switch'		=> true, // 要素の表示。非表示
		'target'		=> array( '1' => 'kind-radio', '2' => 'check' ), // 表示・非表示を切り替える対象
		'notice'		=> 'ここに注釈を記載できます。'
	),

	array(
		// ラジオボタン（ノーマル）
		'title'			=> 'ラジオボタン',
		'type'			=> 'radio',
		'name' 			=> 'kind-radio',
		'required' 		=> false,
		'option' 		=> 'ラジオボタン１,ラジオボタン２',
		'horizontal'	=> true,
		'selected' 		=> '',
		'notice'		=> 'ここに注釈を記載できます。'
	),

	array(
		// チェックボックス（ノーマル）
		'title'			=> 'チェックボックス',
		'type'			=> 'checkbox',
		'name' 			=> 'check',
		'required' 		=> false,
		'option' 		=> '選択肢1,選択肢2,選択肢3',
		'horizontal'	=> false,
		'selected' 		=> '',
		//'notice'		=> 'ここに注釈を記載できます。'
	),

	array(
		// チェックボックス（オプション付き）
		'title'			=> 'チェックボックス（オプション有）',
		'type'			=> 'checkbox',
		'name' 			=> 'check2',
		'required' 		=> false,
		'option' 		=> '選択肢1,選択肢2,選択肢3',
		'horizontal'	=> false,
		'selected' 		=> '',
		'add_field'		=> array(
			// チェックボックスを選択したら現れるフィールド（不要な場合は以下の配列をコメントアウトするか削除）
			array(
				'option_num' 	=> '1',
				'title' 		=> '選択肢1を選んだ方は以下にもご記入ください',
				'type'			=> 'text', // text, textarea のみ対応
				'name' 			=> 'kind1-text',
				'placeholder' 	=> 'プレースホルダー',
				'conf_text'		=> '選択肢1の理由',
				'size'			=> '',
				'required' 		=> true
			),
			array(
				'option_num' 	=> '2',
				'title' 		=> '選択肢2を選んだ方は以下にもご記入ください',
				'type'			=> 'textarea', // text, textarea のみ対応
				'name' 			=> 'kind2-text',
				'placeholder' 	=> 'プレースホルダー',
				'conf_text'		=> '選択肢2の理由',
				'size'			=> '',
				'required' 		=> false
			),
			array(
				'option_num' 	=> '3',
				'title' 		=> '選択肢3を選んだ方は以下にもご記入ください',
				'type'			=> 'text', // text, textarea のみ対応
				'name' 			=> 'kind3-text',
				'placeholder' 	=> 'プレースホルダー',
				'conf_text'		=> '選択肢3の理由',
				'size'			=> '',
				'required' 		=> false
			)

		),
		'notice'		=> 'ここに注釈を記載できます。'
	),

	array(
		// セレクトボックス
		'title'			=> 'セレクトボックス',
		'type'			=> 'select',
		'name' 			=> 'select',
		'required' 		=> false,
		'option' 		=> '選択してください,選択肢A,選択肢B,選択肢C',
		'selected' 		=> '1',
		'notice'		=> 'ここに注釈を記載できます。'
	),

	array(
		// 日付選択
		'title'			=> '日付選択',
		'type'			=> 'date',
		'name' 			=> 'date',
		'required' 		=> false,
		'notice'		=> 'ここに注釈を記載できます。'
	),

	array(
		// 添付ファイル
		'title'			=> '添付ファイル',
		'type'			=> 'file',
		'name' 			=> 'file',
		'required' 		=> false,
		'accept'		=> 'image/*, .pdf, .xls, .xlsx, .doc, .docx, .ppt, .pptx', // アップロードできるファイルの種類を指定
		'accept-text'	=> '<i class="fas fa-exclamation-circle"></i>画像ファイル全般と.pdf, .xls, .xlsx, .doc, .docx, .ppt, .pptxが添付可能です。', // アップロードできるファイルの種類に関するコメント
		'repeat'		=> '3', // 添付ファイルの個数
		'notice'		=> 'ここに注釈を記載できます。'
	),

	array(
		// テキストボックス
		'title'			=> '会社名',
		'type'			=> 'text',
		'name' 			=> 'company',
		'placeholder' 	=> 'プレースホルダー',
		'size'			=> '',
		'required' 		=> false,
		'notice'		=> 'ここに注釈を記載できます。'
	),

	array(
		// テキストボックス
		'title'			=> 'お名前',
		'type'			=> 'text',
		'name' 			=> 'name',
		'placeholder' 	=> 'プレースホルダー',
		'size'			=> '',
		'required' 		=> false,
		'notice'		=> 'ここに注釈を記載できます。'
	),

	array(
		// ラジオボタン（ノーマル）
		'title'			=> '性別',
		'type'			=> 'radio',
		'name' 			=> 'sex',
		'required' 		=> false,
		'option' 		=> '男性,女性,その他',
		'horizontal'	=> true,
		'selected' 		=> '',
		'notice'		=> 'ここに注釈を記載できます。'
	),

	array(
		// メールアドレス
		'title'			=> 'メールアドレス',
		'type'			=> 'email',
		'name'	 		=> 'email',
		'placeholder' 	=> '',
		'size'			=> '',
		'required' 		=> true,
		'notice'		=> 'ここに注釈を記載できます。'
	),

	array(
		// 電話番号
		'title'			=> '電話番号',
		'type'			=> 'tel',
		'name'	 		=> 'tel',
		'placeholder' 	=> '',
		'size'			=> '',
		'required' 		=> false,
		'notice'		=> 'ここに注釈を記載できます。'
	),

	array(
		// 住所セット
		'title'			=> 'ご住所',
		'type'			=> 'address',
		'name'			=> 'address',
		'required' 		=> false,
		'notice'		=> 'ここに注釈を記載できます。'
	),

	array(
		// テキストエリア（ノーマル）
		'title'			=> 'お問い合わせ内容',
		'type'			=> 'textarea',
		'name'	 		=> 'message',
		'placeholder' 	=> 'お問い合わせ内容をご入力ください',
		'size'			=> '',
		'required' 		=> false,
		'notice'		=> 'ここに注釈を記載できます。'
	)

);
*/
?>
