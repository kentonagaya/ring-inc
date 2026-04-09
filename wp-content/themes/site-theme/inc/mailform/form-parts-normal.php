<?php
/*************************************************************************

	メールフォーム

	@package	formparts-normal.php
	@author		endesign-factory.com
	@since		PHP 7.3
	@ver		1.0

	2020-09-20	新規作成

**************************************************************************/
?>
					<script>var $ = jQuery.noConflict();</script>
					<script src="//jpostal-1006.appspot.com/jquery.jpostal.js" type="text/javascript"></script>
					<div class="l-block" id="form_block"><!-- #form_block -->
						<h2 class="u-h2"><?=$heading;?></h2>

						<div class="p-form_set">
							<form id="<?=$form_id;?>" method="post" action="<?=$action;?>" enctype="multipart/form-data">

								<div class="u-box _item">
<?php
	// form_config_contact.php の内容を読み込み
	foreach( $form_content as $row ):
?>
									<fieldset id="fieldset_<?=$row['name'];?>">
										<div class="_fieldset">
											<div class="_head">
												<legend>
													<p><?=$row['title'];?></p>
													<p class="u-right"><?=$row['required']==true?'<span class="u-tx_icon u-round">必須</span>':'';?></p>
												</legend>
											</div>
											<div class="_cont">
<?php
	/*------------------------------------------------------------------------
		%text, %email, %tel
	--------------------------------------------------------------------------*/
	if( $row['type'] == 'text' or $row['type'] == 'email' or $row['type'] == 'tel' ):?>
	<?php
	// 送信画面の表示
	if( $step !== 'confirm' ):?>
												<p>
													<input type="<?=$row['type'];?>" name="form_<?=$row['name'];?>" id="fid_<?=$row['name'];?>" placeholder="<?=$row['placeholder'];?>">
													<span id="err_place_<?=$row['name'];?>"></span>
												</p>
												<?php if( $row['notice'] ):?><p class="u-supple"><?=$row['notice'];?></p><?php endif;?>
	<?php
	// 確認画面の表示
	else:?>
												<p>
													<span class="_conftext"><?=$_POST['form_'.$row['name']];?><input type="hidden" name="form_<?=$row['name'];?>" value="<?=$_POST['form_'.$row['name']];?>"></span>
												</p>
	<?php endif;?>
<?php
	/*------------------------------------------------------------------------
		%date
	--------------------------------------------------------------------------*/
	elseif( $row['type'] == 'date' ):?>
	<?php
	// 送信画面の表示
	if( $step !== 'confirm' ):?>
												<p>
													<input type="date" name="form_<?=$row['name'];?>" id="fid_<?=$row['name'];?>">
													<span id="err_place_<?=$row['name'];?>"></span>
												</p>
												<?php if( $row['notice'] ):?><p class="u-supple"><?=$row['notice'];?></p><?php endif;?>
	<?php
	// 確認画面の表示
	else:?>
												<p>
													<span class="_conftext"><?=$_POST['form_'.$row['name']];?><input type="hidden" name="form_<?=$row['name'];?>" value="<?=$_POST['form_'.$row['name']];?>"></span>
												</p>
	<?php endif;?>
<?php
	/*------------------------------------------------------------------------
		%file
	--------------------------------------------------------------------------*/
	elseif( $row['type'] == 'file' ):?>
	<?php
	// 送信画面の表示
	if( $step !== 'confirm' ):?>
												<p class="u-supple u-fa_before"><?=$row['accept-text'];?></p>
												<?php
													for( $i = 1 ; $i <= $row['repeat']; $i++ ):
												?>
												<p>
													<span class="_fileinput" id="f_<?=$row['name'];?>_<?=$i;?>">
														<input type="file" name="form_<?=$row['name'];?>_<?=$i;?>" id="fid_<?=$row['name'];?>_<?=$i;?>" class="f_<?=$row['name'];?>" accept="<?=$row['accept'];?>" value="">
														<input type="button" class="c-btn -small -bc_gray round fas" value="&#xf2ed; クリア" onclick="clearFileField('f_<?=$row['name'];?>_<?=$i;?>'); clearFileData('fdata_<?=$row['name'];?>_<?=$i;?>');">
													</span>
												</p>
												<span id="err_place_<?=$row['name'];?>"></span>
												<?php endfor;?>
												<?php if( $row['notice'] ):?><p class="u-supple"><?=$row['notice'];?></p><?php endif;?>
	<?php
	// 確認画面の表示
	else:?>
												<?php
													$attatchment = array();
													for( $i = 1 ; $i <= $row['repeat']; $i++ ):
												?>
												<div class="u-texts">
													<span class="_conftext">
														<?php
														// 一時ファイル
														$tmp_file = $_FILES['form_'.$row['name'].'_'.$i]['tmp_name'];
														// オリジナルファイル名
														$org_file_name = $_FILES['form_'.$row['name'].'_'.$i]['name'];
														// ファイル名を成形（不要なドットを取り除く）
														$set_file_name = preg_replace('/\.[^.]*$/', '', $org_file_name);
														// 拡張子を取得
														$extention = substr( $org_file_name, strrpos($org_file_name, '.') + 1);
														if ( is_uploaded_file( $tmp_file ) ) {
															//list( $file_name, $file_type ) = explode( ".", $set_file_name );
															$copy_file = $row['name'] . '-' . date("Ymd-His") . '_' . $i . "." . $extention;
															if ( move_uploaded_file( $tmp_file, "./dist/temp/attachment/" . $copy_file ) ) {
																chmod( "./dist/temp/attachment/" . $copy_file, 0644); //パーミッション設定
															} else {
																echo $i."個目のファイルをアップロードできません。";
															}
															} else {
																//echo $i."個目のファイルは選択されていません。";
															}
														?>
													</span>
													<?php if( $_FILES['form_'.$row['name'].'_'.$i]['name'] ):?>
													<input type="text" name="form_<?=$row['name'].'_'.$i;?>" value="<?=$copy_file;?>">
													<dl class="_attachmentlist">
														<dt><img src="<?=HOME."dist/temp/attachment/" . $copy_file;?>"></dt>
														<dd>ファイル名は <?=$copy_file;?>に変換されました</dd>
													</dl>
													<?php endif;?>
												</div>
												<?php
													$attatchment[] = $_FILES['form_'.$row['name'].'_'.$i]['name'];
													endfor;
													// 配列を文字列に変換
													$attatchment_data = implode($attatchment);
												?>
												<?php // 添付ファイルの配列と繰り返し個数を渡す ?>
												<input type="hidden" name="form_<?=$row['name'];?>_array" value="<?=$attatchment_data;?>">
												<input type="hidden" name="repeat_<?=$row['name'];?>_num" value="<?=$row['repeat'];?>">
												<?php
													if( $row['required'] ){
														if( empty($attatchment_data) ) {
															$caution = true;
															echo '<span class="_fileinputerror round u-fa_before"><i class="fa-exclamation-circle"></i>添付ファイルは必須項目です。戻って修正してください。</span>';
														}
													}
												?>
	<?php endif;?>
<?php
	/*------------------------------------------------------------------------
		%textarea
	--------------------------------------------------------------------------*/
	elseif( $row['type'] == 'textarea' ):?>
	<?php
	// 送信画面の表示
	if( $step !== 'confirm' ):?>
												<p>
													<textarea name="form_<?=$row['name'];?>" id="fid_<?=$row['name'];?>" placeholder="<?=$row['placeholder'];?>"></textarea>
													<span id="err_place_<?=$row['name'];?>"></span>
												</p>
												<?php if( $row['notice'] ):?><p class="u-supple"><?=$row['notice'];?></p><?php endif;?>
	<?php
	// 確認画面の表示
	else:?>
												<p>
													<span class="_conftext"><?=nl2br( $_POST['form_'.$row['name']] );?><input type="hidden" name="form_<?=$row['name'];?>" value="<?=$_POST['form_'.$row['name']];?>"></span>
												</p>
	<?php endif;?>
<?php
	/*------------------------------------------------------------------------
		%radio
	--------------------------------------------------------------------------*/
	elseif( $row['type'] == 'radio' ):?>
	<?php
	// 送信画面の表示
	if( $step !== 'confirm' ):?>
		<?php
			$option_array = explode(',',$row['option']);
			foreach( $option_array as $i => $value ):
			$optnum = $i+1;
		?>
												<p <?=$row['horizontal'] == true?'class="horizontal"':'';?>><input type="radio" name="form_<?=$row['name'];?>" id="fid_<?=$row['name'].$optnum;?>" value="<?=$value;?>"<?=$row['selected'] == $optnum ? ' checked' : '' ;?>><label class="check-label" for="fid_<?=$row['name'].$optnum;?>"><span><?=$value;?></span></label></p>
		<?php endforeach;?>
												<?php if( $row['notice'] ):?><p class="u-supple"><?=$row['notice'];?></p><?php endif;?>
												<span id="err_place_<?=$row['name'];?>"></span>
	<?php
	// 確認画面の表示
	else:?>
		<?php
			if( $row['switch'] ){
				// オプションを配列に格納
				$option_array = explode(',',$row['option']);
				// オプション配列のレコードと入力値が一致した配列番号を取得
				$match = array_search( $_POST['form_'.$row['name']], $option_array );
				// ターゲットになる要素名を取得
				$target_name = current(array_slice($row['target'], $match, 1, true));
			}
		?>
		<script>
			jQuery(function($){
				$('#fieldset_<?=$target_name;?>').css('display','block');
			});
		</script>
												<p>
													<span class="_conftext">
														<?=$_POST['form_'.$row['name']];?><input type="hidden" name="form_<?=$row['name'];?>" value="<?=$_POST['form_'.$row['name']];?>">
													</span>
												</p>
	<?php endif;?>
<?php
	/*------------------------------------------------------------------------
		%checkbox
	--------------------------------------------------------------------------*/
	elseif( $row['type'] == 'checkbox' ):?>
<?php
	// 送信画面の表示
	if( $step !== 'confirm' ):?>
	<?php
		$opttion_array = explode(',',$row['option']);
		foreach( $opttion_array as $i => $value ):
		$optnum = $i+1;
	?>
												<p <?=$row['horizontal'] == true?'class="horizontal"':'';?>><input type="checkbox" name="form_<?=$row['name'];?>[]" id="fid_<?=$row['name'].$optnum;?>" value="<?=$value;?>"<?=$row['selected'] == $optnum ? ' checked' : '' ;?>><label class="check-label" for="fid_<?=$row['name'].$optnum;?>"><span><?=$value;?></span></label></p>
		<?php
			// 追加フィールド
			if( $row['add_field'] ):
			$add_field = $row['add_field'];
			foreach( $add_field as $af => $opt ):
			if( $optnum == $opt['option_num'] ):
		?>
		<script>
			$(window).on("load",function(){
				/* 表示切り替えのターゲットを最初から一旦非表示にする */
				$('#cb_option_<?=$opt['name'];?>').addClass('_swicthnodisp');
				/* チェックすると・・・ */
				$('input:checkbox[id="fid_<?=$row['name'].$optnum;?>"]').change( function() {
					var checked_value = $('[id=fid_<?=$row['name'].$optnum;?>]:checked').val();
					if( $('[id=fid_<?=$row['name'].$optnum;?>]:checked').val()=='<?=$value;?>'){
						$('#cb_option_<?=$opt['name'];?>').fadeIn();
					} else {
						$('#cb_option_<?=$opt['name'];?>').fadeOut();
						/* 隠れた要素の入力値をクリア */
						$('#cb_option_<?=$opt['name'];?>').find( "textarea, :text").val("").end().find("select").val("選択してください").end().find(":checked").prop("checked", false);
					}
				});
				/* ブラウザバック時でもchangeイベントを保持 */
				$('input:checkbox[id="fid_<?=$row['name'].$optnum;?>"]').change();

			});
		</script>
												<p id="cb_option_<?=$opt['name'];?>">
													<label class="_optlabel"><?php if( $opt['required'] ){ echo '<span class="u-tx_icon round">必須</span>'; };?><?=$opt['title'];?></label>
													<?php if( $opt['type'] == 'text' ):?>
													<input type="text" name="form_<?=$opt['name'];?>" id="fid_<?=$opt['name'];?>" placeholder="<?=$opt['placeholder'];?>">
													<?php elseif( $opt['type'] == 'textarea' ):?>
													<textarea name="form_<?=$opt['name'];?>" id="fid_<?=$opt['name'];?>" placeholder="<?=$opt['placeholder'];?>"></textarea>
													<?php endif;?>
												</p>
												<?php endif; endforeach; endif;?>
		<?php endforeach;?>
												<?php if( $row['notice'] ):?><p class="u-supple"><?=$row['notice'];?></p><?php endif;?>
												<span id="err_place_<?=$row['name'];?>"></span>
	<?php
	// 確認画面の表示
	else:?>
		<?php if ( isset( $_POST['form_'.$row['name']]) && is_array($_POST['form_'.$row['name']] ) ) {
			$cbtext = implode(", ", $_POST['form_'.$row['name']]);
		}?>
												<p><span class="confirm-text"><?=$cbtext;?><input type="hidden" name="form_<?=$row['name'];?>[]" value="<?=$cbtext;?>"></span></p>
			<?php
				// 追加フィールド
				$opttion_array = explode(',',$row['option']);
				foreach( $opttion_array as $i => $value ):
				$optnum = $i+1;
				if( $row['add_field'] ):
				$add_field = $row['add_field'];
				foreach( $add_field as $af => $opt ):
				if( $optnum == $opt['option_num'] && $_POST['form_'.$opt['name']] ):
			?>
												<p class="_optconf">
													<span class="confirm-text">
														<?=$opt['conf_text'];?> : <?=$_POST['form_'.$opt['name']];?>
														<input type="hidden" name="form_<?=$opt['name'];?>" value="<?=$opt['conf_text'];?> : <?=$_POST['form_'.$opt['name']];?>">
													</span>
												</p>
			<?php endif; endforeach; endif; endforeach;?>
	<?php endif;?>
<?php
	/*------------------------------------------------------------------------
		%select
	--------------------------------------------------------------------------*/
	elseif( $row['type'] == 'select' ):?>
	<?php
	// 送信画面の表示
	if( $step !== 'confirm' ):?>
												<p>
													<select name="form_<?=$row['name'];?>" id="fid_<?=$row['name'];?>">
		<?php
			$opttion_array = explode(',',$row['option']);
			foreach( $opttion_array as $i => $value ):
			$potnum = $i+1;
		?>
														<option value="<?=$value;?>" <?=$row['selected'] == $potnum ? ' selected' : '' ;?>><?=$value;?></option>
		<?php endforeach;?>
													</select>
												</p>
												<?php if( $row['notice'] ):?><p class="supple"><?=$row['notice'];?></p><?php endif;?>
												<span id="err_place_<?=$row['name'];?>"></span>
	<?php
	// 確認画面の表示
	else:?>
												<p><span class="confirm-text"><?=$_POST['form_'.$row['name']];?><input type="hidden" name="form_<?=$row['name'];?>" value="<?=$_POST['form_'.$row['name']];?>"></span></p>
	<?php endif;?>
<?php
	/*------------------------------------------------------------------------
		%address
	--------------------------------------------------------------------------*/
	elseif( $row['type'] == 'address' ):?>
	<?php
	// 送信画面の表示
	if( $step !== 'confirm' ):?>
												<p>〒 <input type="text" id="fid_<?=$row['name'];?>_zip" name="form_<?=$row['name'];?>_zip" class="size-m"></p>
												<p><input type="text" id="fid_<?=$row['name'];?>1" name="form_<?=$row['name'];?>1" value="" placeholder="都道府県 市区町村"></p>
												<p><input type="text" id="fid_<?=$row['name'];?>2" name="form_<?=$row['name'];?>2" value="" placeholder="番地"></p>
												<p><input type="text" id="fid_<?=$row['name'];?>3" name="form_<?=$row['name'];?>3" value="" placeholder="マンション名等"></p>
												<span id="err_place_<?=$row['name'];?>"></span>
												<?php if( $row['notice'] ):?><p class="supple"><?=$row['notice'];?></p><?php endif;?>
	<?php
	// 確認画面の表示
	else:?>
												<p>
													<span class="_conftext">
														〒<?=$_POST['form_'.$row['name'].'_zip'];?><input type="hidden" name="form_<?=$row['name'].'_zip';?>" value="<?=$_POST['form_'.$row['name'].'_zip'];?>">&nbsp;
														<?=$_POST['form_'.$row['name'].'1'];?><input type="hidden" name="form_<?=$row['name'].'1';?>" value="<?=$_POST['form_'.$row['name'].'1'];?>">&nbsp;
														<?=$_POST['form_'.$row['name'].'2'];?><input type="hidden" name="form_<?=$row['name'].'2';?>" value="<?=$_POST['form_'.$row['name'].'2'];?>">&nbsp;
														<?=$_POST['form_'.$row['name'].'3'];?><input type="hidden" name="form_<?=$row['name'].'3';?>" value="<?=$_POST['form_'.$row['name'].'3'];?>">
													</span>
												</p>
	<?php endif;?>
<?php endif;?>
											</div>
										</div>
									</fieldset>
<?php endforeach;?>
								</div>

<?php
	/*------------------------------------------------------------------------
		%submit
	--------------------------------------------------------------------------*/
	if( $agree_button && $step == 'confirm' ):?>

								<div class="u-box p-contact_agreebox u-texts u-center">
									<div class="u-narrowcont">
										<div class="u-frame">
											<h3 class="u-h4"><?=$agree_heading;?></h3>
											<p class="_check"><input type="checkbox" name="" class="agree_cb" id="agree_check" value=""><label class="_checklabel" for="agree_check"><span><?=$agree_name;?><?=$agree_text;?></span></label></p>
											<p><a href="<?=HOME?><?=$agree_url;?>" class="c-btn" target="_blank"><?=$agree_name;?></a></p>
										</div>
									</div>
								</div>

<?php endif;?>
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

<?php
	/*------------------------------------------------------------------------
		%validation script & other
	--------------------------------------------------------------------------*/
?>
						<script>

jQuery(function($){

	$(window).ready( function() {
		$('#form_address_zip').jpostal({
			postcode : [
				'#fid_address_zip'
			],
			address : {
				'#fid_address1'  : '%3%4%5'
			}
		});
	});

	/* 画面遷移時の画面表示位置 */
	var hwh = $('.l_header').outerHeight();
	var headerHeight = hwh;
<?php if( $step == 'confirm' ):?>
	$("html,body").animate({scrollTop:$('#section_form').offset().top - headerHeight});
<?php else:?>
	$("html,body").animate({scrollTop:$('#section_form').offset().top - headerHeight});

<?php endif;?>

	$.validator.addMethod("valueNotEquals", function(value, element, arg){
		return arg != value;
	}, "必須項目です");

	$('form').validate({

		rules:{
<?php foreach( $form_content as $row ):?>
<?php
	// チェックボックスの追加フィールド
	if( $row['type'] == 'checkbox' && $row['add_field'] ):
	$add_field = $row['add_field'];
	foreach( $add_field as $af => $opt ):
	if( $opt['required'] ):
?>
			"form_<?=$opt['name'];?>" :{ required: true },
<?php endif; endforeach; endif;?>
<?php if( $row['required'] ):?>
<?php if( $row['type'] == 'email' ):?>
			"form_<?=$row['name'];?>" :{ required: true, email: true },
<?php elseif( $row['type'] == 'file' ):?>
			"form_<?=$row['name'];?>_1" :{ required: true },
<?php elseif( $row['type'] == 'select' ):?>
			"form_<?=$row['name'];?>" :{ valueNotEquals: "選択してください" },
<?php elseif( $row['type'] == 'radio' ):?>
			"form_<?=$row['name'];?>" :{ required: true },
<?php elseif( $row['type'] == 'checkbox' ):?>
			"form_<?=$row['name'];?>[]" :{ required: true },
<?php elseif( $row['type'] == 'address' ):?>
			"form_<?=$row['name'];?>_zip" :{ required: true },
			"form_<?=$row['name'];?>1" :{ required: true },
			"form_<?=$row['name'];?>2" :{ required: true },
<?php else:?>
			"form_<?=$row['name'];?>" :{ required: true },
<?php endif;?>
<?php endif;?>

<?php endforeach;?>
		},

		messages:{
<?php foreach( $form_content as $row ):?>
<?php
	// チェックボックスの追加フィールド
	if( $row['type'] == 'checkbox' && $row['add_field'] ):
	$add_field = $row['add_field'];
	foreach( $add_field as $af => $opt ):
	if( $opt['required'] ):
?>
			"form_<?=$opt['name'];?>" :{ required: '未入力の項目があります' },
<?php endif; endforeach; endif;?>
<?php if( $row['type'] == 'email' ):?>
			"form_<?=$row['name'];?>" :  { required: 'メールアドレスをご入力ください' },
<?php elseif( $row['type'] == 'file' ):?>
			"form_<?=$row['name'];?>_1" :  { required: '添付ファイルを選択してください' },
<?php elseif( $row['type'] == 'select' ):?>
			"form_<?=$row['name'];?>" :  { required: '必須項目です' },
<?php elseif( $row['type'] == 'radio' ):?>
			"form_<?=$row['name'];?>" :  { required: '選択してください' },
<?php elseif( $row['type'] == 'checkbox' ):?>
			"form_<?=$row['name'];?>[]" :  { required: '選択してください' },
<?php elseif( $row['type'] == 'address' ):?>
			"form_<?=$row['name'];?>_zip" :  { required: '未入力の項目があります' },
			"form_<?=$row['name'];?>1" :  { required: '未入力の項目があります' },
			"form_<?=$row['name'];?>2" :  { required: '未入力の項目があります' },
<?php else:?>
			"form_<?=$row['name'];?>" :  { required: '未入力の項目があります' },
<?php endif;?>
<?php endforeach;?>
		},

		errorPlacement: function (error, element) {
			if( element.attr("type") == "text" ){
				error.insertAfter(element);
<?php foreach( $form_content as $row ):?>
<?php if( $row['type'] == 'checkbox' ):?>
			} else if ( element.attr("name") === "form_<?=$row['name'];?>[]" ) {
				error.insertAfter("#err_place_<?=$row['name'];?>");
<?php else:?>
			} else if ( element.attr("name") === "form_<?=$row['name'];?>" ) {
				error.insertAfter("#err_place_<?=$row['name'];?>");
<?php endif;?>
<?php endforeach;?>
			} else {
				error.insertAfter(element);
			}
		},

	});

<?php
// ラジオボタンのチェックで表示・非表示
foreach( $form_content as $row ):
?>
<?php
	if( $row['type'] == 'radio' && $row['switch'] ):
	// ターゲットになる要素の配列を取得
	$target_array = $row['target'];
	// オプションを配列化
	$option_array = explode(',',$row['option']);
	foreach( $target_array as $k => $v ):
	// オプション番号からオプション項目を取得
	$target_option = current(array_slice($option_array, $k-1, 1, true));
?>
	$(window).on("load",function(){
		/* 表示切り替えのターゲットを最初から一旦非表示にする */
		$('#fieldset_<?=$v;?>').addClass('_swicthnodisp');

		/* ラジオボタンをチェックすると・・・  */
		$('input:radio[name="form_<?=$row['name'];?>"]').change( function() {
			var checked_value = $('[id=fid_<?=$row['name'];?><?=$k;?>]:checked').val();
			if( $('[id=fid_<?=$row['name'];?><?=$k;?>]:checked').val()=='<?=$target_option;?>'){
				$('#fieldset_<?=$v;?>').fadeIn();
			} else {
				$('#fieldset_<?=$v;?>').fadeOut();
				/* 隠れた要素の入力値をクリア */
				$('#fieldset_<?=$v;?>').find( "textarea, :text, tel, :file ").val("").end().find("select").val("選択してください").end().find(":checked").prop("checked", false);
			}
		});
		$('input:radio[name="form_<?=$row['name'];?>"]').change();
	});
<?php endforeach; endif;?>

<?php endforeach;?>

<?php
	// 同意ボタン
	if( $agree_button && $step == 'confirm' ):?>

	$('#submit').prop('disabled', true);
	$('#submit').addClass('disabled');

    $('#agree_check').on('click', function() {
        if ($(this).prop('checked') == false) {
			$('#submit').prop('disabled', true);
			$('#submit').removeClass('disabled');
        } else {
			$('#submit').prop('disabled', false);
			$('#submit').addClass('disabled');
        }
	});

<?php endif;?>
});
<?php //添付ファイルのクリアボタン ?>
function clearFileField(id) {
	var area = document.getElementById(id);
	var temp = area.innerHTML;
	area.innerHTML = temp;
}
</script>

					</div><!-- / #form-block -->
