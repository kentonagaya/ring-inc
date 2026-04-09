<?php
/**
 * page template
 *
 * @since site theme X 10.0
 */

	// ページタイトル表示用ディレクトリ名
	define('DIR_NAME',		'資料請求');
	define('PAGE_SUBTITLE',	'REQUEST');

	// サイドバー（不要の場合は値を空白）
	$sidebar_position	= '';

	require ( THEMEPATH.'pages/'.get_currentdir_slug().'/form-settings.php' );

	// ヘッダーを読み込み
	get_header();
?>

		<main class="l-main">

			<section class="l-section" id="section_form">
				<div class="l-contents"><!-- contents -->

<?php if( $step !== 'confirm' ):?>
					<div class="l-block">
						<div class="u-part u-texts u-center">
							<p>【これは自由構築タイプのメールフォームです】</p>
							<p>ご不明な点などございましたら、下記フォームより何でもお気軽にお問合せ下さい。<br>追ってご連絡いたしますので宜しくお願いいたします。</p>
						</div>
					</div>

					<div class="l-block">
						<div class="u-part">

							<div class="p-form_contacts">
								<div class="_pc">
									<p class="_telnum t-font_1 u-fa_before"><i class="fas fa-phone"></i><?=PHONE?></p>
									<p><i class="far u-fa_before"></i>営業時間 <?=OPEN_TIME?><?=CLOSE_DAY?></p>
								</div>
								<div class="_sp">
									<p><a class="c-btn -bc_ghost" href="<?=HOME?>privacy/">個人情報保護方針</a></p>
									<p><a class="c-btn t-font_1 u-fa_before" href="tel:<?=PHONE?>"><i class="fas fa-phone"></i><?=PHONE?></a></p>
								</div>
							</div>

						</div>
					</div>
<?php else:?>
					<div class="l-block">
						<div class="u-part u-texts u-center">
							<p>入力内容をご確認いただき、よろしければ送信ボタンをクリックしてください。</p>
						</div>
					</div>
<?php endif;?>

<?php
	if( $step !== 'confirm' ){
		$heading = 'お問い合わせフォーム';
	} else {
		$heading = '送信内容のご確認';
	}
?>
<?php
	// フォームパーツの読み込み
	include_once ( THEMEPATH.'inc/mailform/form-parts-custom.php');
?>

<?php /* jpostal */?>
<script>var $ = jQuery.noConflict();</script>
<script src="//jpostal-1006.appspot.com/jquery.jpostal.js" type="text/javascript"></script>

<script>

	jQuery(function($){

		$('#form_zip').jpostal({
			postcode : [
				'#fid_zip'
			],
			address : {
				'#fid_address1'  : '%3%4%5'
			}
		});

		$.validator.addMethod("valueNotEquals", function(value, element, arg){
			return arg != value;
		}, "必須項目です");

		$('form').validate({

			rules:{
				"form_name" 	:{ required: true },
				"form_email" 	:{ required: true, email: true },
				"form_tel" 		:{ required: true },
				"form_zip" 		:{ required: true },
				"form_address1" :{ required: true },
				"form_address2" :{ required: true },
				"form_check1[]" :{ required: true },
				"form_radio1" 	:{ required: true },
				"form_select1" 	:{ valueNotEquals: "選択してください" },
				"form_date" 	:{ required: true },
				"form_file" 	:{ required: true },
				"form_message" 	:{ required: true },
			},

			messages:{
				"form_name" 	:{ required: 'お名前をご入力ください' },
				"form_email" 	:{ required: 'メールアドレスをご入力ください' },
				"form_tel" 		:{ required: '電話番号をご入力ください' },
				"form_zip" 		:{ required: '未入力の項目があります' },
				"form_address1" :{ required: '未入力の項目があります' },
				"form_address2" :{ required: '未入力の項目があります' },
				"form_check1[]" :{ required: '選択してください' },
				"form_radio1" 	:{ required: '選択してください' },
				"form_date" 	:{ required: '日付を入力してください' },
				"form_file" 	:{ required: 'ファイルが選択されていません' },
				"form_message" 	:{ required: '未入力です' },
			},

			errorPlacement: function (error, element) {
				if( element.attr("type") == "text" ){
					error.insertAfter(element);
				}
				/* チェックボックスの場合はアラートを差し替え */
				else if ( element.attr("name") === "form_check1[]" ) {
					error.insertAfter("#err_place_form_check1");
				}
				/* ラジオボタンの場合はアラートを差し替え */
				else if ( element.attr("name") === "form_radio1" ) {
					error.insertAfter("#err_place_form_radio1");
				}
				else {
					error.insertAfter(element);
				}
			},

		});

	});

</script>

					<div class="l-block" id="form_block"><!-- #form_block -->
						<h2 class="u-h2"><?=$heading;?></h2>

						<div class="p-form_set">
							<form id="<?=$form_id;?>" method="post" action="<?=$action;?>" enctype="multipart/form-data">

								<div class="u-box _item">
									<fieldset>
										<div class="_fieldset">
											<div class="_head">
												<legend>
													<p>お名前</p>
													<p class="u-right"><span class="u-tx_icon u-round">必須</span></p>
												</legend>
											</div>
											<div class="_cont">
												<p>
													<?php
														// form_text( 名前, サイズ, プレースホルダー )
														form_text('name','','お名前');
													?>
												</p>
											</div>
										</div>
										<div class="_fieldset">
											<div class="_head">
												<legend>
													<p>メールアドレス</p>
													<p class="u-right"><span class="u-tx_icon u-round">必須</span></p>
												</legend>
											</div>
											<div class="_cont">
												<p>
													<?php
														// form_text( 名前, サイズ, プレースホルダー )
														form_email('email','','working@mail.address');
													?>
												</p>
											</div>
										</div>
										<div class="_fieldset">
											<div class="_head">
												<legend>
													<p>電話番号</p>
													<p class="u-right"><span class="u-tx_icon u-round">必須</span></p>
												</legend>
											</div>
											<div class="_cont">
												<p>
													<?php
														// form_text( 名前, サイズ, プレースホルダー )
														form_tel('tel','','078-123-4567');
													?>
												</p>
											</div>
										</div>
										<div class="_fieldset">
											<div class="_head">
												<legend>
													<p>ご住所</p>
													<p class="u-right"><span class="u-tx_icon u-round">必須</span></p>
												</legend>
											</div>
											<div class="_cont">
												<p>〒 <?php form_text('zip','size-m','');?></p>
												<p><?php form_text('address1','','都道府県市区町村');?></p>
												<p><?php form_text('address2','','番地・ビル名等');?></p>
											</div>
										</div>
										<div class="_fieldset">
											<div class="_head">
												<legend>
													<p>チェックボックス</p>
													<p class="u-right"><span class="u-tx_icon u-round">必須</span></p>
												</legend>
											</div>
											<div class="_cont">
												<p>
													<?php
														// form_checkbox( 名前, アイテム[カンマ区切り], 選択済みにする番号 )
														form_checkbox('check1','チェックボックス1,チェックボックス2,チェックボックス3,チェックボックス4','');
													?>
												</p>
											</div>
										</div>
										<div class="_fieldset">
											<div class="_head">
												<legend>
													<p>ラジオボタン</p>
													<p class="u-right"><span class="u-tx_icon u-round">必須</span></p>
												</legend>
											</div>
											<div class="_cont">
												<p>
													<?php
														// form_radio( 名前, アイテム[カンマ区切り], 選択済みにする番号 )
														form_radio('radio1','ラジオボタン1,ラジオボタン2,ラジオボタン3,ラジオボタン4','');
													?>
												</p>
											</div>
										</div>
										<div class="_fieldset">
											<div class="_head">
												<legend>
													<p>セレクトボックス</p>
													<p class="u-right"><span class="u-tx_icon u-round">必須</span></p>
												</legend>
											</div>
											<div class="_cont">
												<p>
													<?php
														// form_select( 名前, アイテム[カンマ区切り], 選択済みにする番号 )
														form_select('select1','選択してください,選択肢1,選択肢2,選択肢3,選択肢4','1');
													?>
												</p>
											</div>
										</div>
										<div class="_fieldset">
											<div class="_head">
												<legend>
													<p>日付選択</p>
													<p class="u-right"><span class="u-tx_icon u-round">必須</span></p>
												</legend>
											</div>
											<div class="_cont">
												<p>
													<?php
														// form_date( 名前 )
														form_date('date');
													?>
												</p>
											</div>
										</div>
										<div class="_fieldset">
											<div class="_head">
												<legend>
													<p>添付ファイル</p>
													<p class="u-right"><span class="u-tx_icon u-round">必須</span></p>
												</legend>
											</div>
											<div class="_cont">
												<p>
													<?php
														// form_file( 名前, 許可するファイル拡張子 )
														form_file('file','.jpg, .jpeg, .gif, .png, .tiff');
													?>
												</p>
											</div>
										</div>
										<div class="_fieldset">
											<div class="_head">
												<legend>
													<p>テキストエリア</p>
													<p class="u-right"><span class="u-tx_icon u-round">必須</span></p>
												</legend>
											</div>
											<div class="_cont">
												<p>
													<?php
														// form_textarea( 名前, クラス, プレースホルダー )
														form_textarea('message','','コメント');
													?>
												</p>
											</div>
										</div>
									</fieldset>
								</div>

								<div class="_submitset">
									<?php if( $step !== 'confirm' ):?>
									<input class="c-btn" type="submit" value="<?=$confirm_button;?>">
									<?php else:?>
									<input class="c-btn -back" type="button" onclick="history.back();" value="<?=$back_button;?>">
									<input type="hidden" name="token" value="<?=$token;?>">
									<input id="submit" class="c-btn -disabled" type="submit" name="send" value="<?=$send_button;?>" <?php if( $caution == true ){ echo "disabled";};?>>
									<?php endif;?>
								</div>

							</form>
						</div>
					</div>

				</div><!-- // contents -->
			</section>

		</main>

		<?=get_aside()?>

<?php
	// フッターを読み込み
	get_footer();
?>