<?php

	// テキスト
	function form_text( $form_name, $form_size, $form_replace ){
		global $step;
		$f_name = 'form_'.$form_name;
		$f_id	= 'fid_'.$form_name;
		if($step !== 'confirm'){
			echo '<input type="text" name="'.$f_name.'" id="'.$f_id.'" placeholder="'.$form_replace.'" class="'.$form_size.'">';
		} else {
			$val = $_POST[$f_name];
			echo '<span class="_conftext">'.$val.'<input type="hidden" name="'.$f_name.'" value="'.$val.'"></span>';
		}
	}

	// テキストエリア
	function form_textarea( $form_name, $form_size, $form_replace ){
		global $step;
		$f_name = 'form_'.$form_name;
		$f_id	= 'fid_'.$form_name;
		if($step !== 'confirm'){
			echo '<textarea name="'.$f_name.'" id="'.$f_id.'" placeholder="'.$form_replace.'" class="'.$form_size.'"></textarea>';
		} else {
			$val = $_POST[$f_name];
			echo '<span class="_conftext">'.$val.'<input type="hidden" name="'.$f_name.'" value="'.$val.'"></span>';
		}
	}

	// Eメール
	function form_email( $form_name, $form_size, $form_replace ){
		global $step;
		$f_name = 'form_'.$form_name;
		$f_id	= 'fid_'.$form_name;
		if($step !== 'confirm'){
			echo '<input type="email" name="'.$f_name.'" id="'.$f_id.'" placeholder="'.$form_replace.'" class="'.$form_size.'">';
		} else {
			$val = $_POST[$f_name];
			echo '<span class="_conftext">'.$val.'<input type="hidden" name="'.$f_name.'" value="'.$val.'"></span>';
		}
	}

	// TEL
	function form_tel( $form_name, $form_size, $form_replace ){
		global $step;
		$f_name = 'form_'.$form_name;
		$f_id	= 'fid_'.$form_name;
		if($step !== 'confirm'){
			echo '<input type="tel" name="'.$f_name.'" id="'.$f_id.'" placeholder="'.$form_replace.'" class="'.$form_size.'">';
		} else {
			$val = $_POST[$f_name];
			echo '<span class="_conftext">'.$val.'<input type="hidden" name="'.$f_name.'" value="'.$val.'"></span>';
		}
	}

	// チェックボックス
	function form_checkbox( $form_name, $form_item, $form_selected ){
		global $step;
		$f_name = 'form_'.$form_name;
		$f_id	= 'fid_'.$form_name;
		$opttion_array = explode(',',$form_item);
		if($step !== 'confirm'){
			foreach( $opttion_array as $i => $value ){
				$optnum = $i+1;
				if($form_selected == $optnum){
					$selected = 'checked';
				}else{
					$selected = '';
				}
				echo '<input type="checkbox" name="'.$f_name.'[]" id="'.$f_id.$optnum.'" value="'.$value.'" '.$selected.'><label class="check-label" for="'.$f_id.$optnum.'"><span>'.$value.'</span></label>';
			}
			echo '<span class="u-disp_b" id="err_place_'.$f_name.'"></span>';
		} else {
			if ( isset( $_POST[$f_name]) && is_array($_POST[$f_name] ) ) {
				$cbtext = implode(", ", $_POST[$f_name]);
			}
			echo '<span class="confirm-text">'.$cbtext.'<input type="hidden" name="'.$f_name.'" value="'.$cbtext.'"></span>';
		}
	}

	// ラジオボタン
	function form_radio( $form_name, $form_item, $form_selected ){
		global $step;
		$f_name = 'form_'.$form_name;
		$f_id	= 'fid_'.$form_name;
		$opttion_array = explode(',',$form_item);
		if($step !== 'confirm'){
			foreach( $opttion_array as $i => $value ){
				$optnum = $i+1;
				if($form_selected == $optnum){
					$selected = 'checked';
				}else{
					$selected = '';
				}
				echo '<input type="radio" name="'.$f_name.'" id="'.$f_id.$optnum.'" value="'.$value.'" '.$selected.'><label class="check-label" for="'.$f_id.$optnum.'"><span>'.$value.'</span></label>';
			}
			echo '<span class="u-disp_b" id="err_place_'.$f_name.'"></span>';
		} else {
			$val = $_POST[$f_name];
			echo '<span class="confirm-text">'.$val.'<input type="hidden" name="'.$f_name.'" value="'.$val.'"></span>';
		}
	}

	// セレクトボックス
	function form_select( $form_name, $form_item, $form_selected ){
		global $step;
		$f_name = 'form_'.$form_name;
		$f_id	= 'fid_'.$form_name;
		$opttion_array = explode(',',$form_item);
		if($step !== 'confirm'){
			echo '<select name="'.$f_name.'" id="'.$f_id.'">';
			foreach( $opttion_array as $i => $value ){
				$optnum = $i+1;
				$form_selected;
				if($form_selected == $optnum){
					$selected = 'selected';
				}else{
					$selected = '';
				}
				echo '<option value="'.$value.'" '.$selected.'>'.$value.'</option>';
			}
			echo '</select>';
		} else {
			$val = $_POST[$f_name];
			echo '<span class="confirm-text">'.$val.'<input type="hidden" name="'.$f_name.'" value="'.$val.'"></span>';
		}
	}

	// DATE
	function form_date( $form_name ){
		global $step;
		$f_name = 'form_'.$form_name;
		$f_id	= 'fid_'.$form_name;
		if($step !== 'confirm'){
			echo '<input type="date" name="'.$f_name.'" id="'.$f_id.'">';
		} else {
			$val = $_POST[$f_name];
			echo '<span class="_conftext">'.$val.'<input type="hidden" name="'.$f_name.'" value="'.$val.'"></span>';
		}
	}

	// FILE
	function form_file( $form_name, $form_accept ){
		global $step;
		$f_name = 'form_'.$form_name;
		$f_id	= 'fid_'.$form_name;
		if($step !== 'confirm'){
			echo '<input type="file" name="'.$f_name.'" id="'.$f_id.'" accept="'.$form_accept.'">';
			echo '<input type="button" class="c-btn -small -bc_gray u-round fas" value="&#xf2ed;クリア" onclick="clearFileField(\''.$f_id.'\');">';
			if($form_accept){
				echo '<span class="u-disp_b u-fa_before u-supple u-mt5"><i class="fas fa-exclamation-circle"></i>拡張子が'.$form_accept.'のファイルのみアップロード可能です</span>';
			}
		} else {
			$val = $_POST[$f_name];
			echo '<span class="_conftext">'.$val.'<input type="hidden" name="'.$f_name.'" value="'.$val.'"></span>';
			// 一時ファイル
			$tmp_file = $_FILES[$f_name]['tmp_name'];
			// オリジナルファイル名
			$org_file_name = $_FILES[$f_name]['name'];
			// ファイル名を成形（不要なドットを取り除く）
			$set_file_name = preg_replace('/\.[^.]*$/', '', $org_file_name);
			// 拡張子を取得
			$extention = substr( $org_file_name, strrpos($org_file_name, '.') + 1);
			if ( is_uploaded_file( $tmp_file ) ) {
				$copy_file = $form_name . '-' . date("Ymd-His") . "." . $extention;
				if ( move_uploaded_file( $tmp_file, "./dist/temp/attachment/" . $copy_file ) ) {
					chmod( "./dist/temp/attachment/" . $copy_file, 0644); //パーミッション設定
				} else {
					echo '<span class="_conftext">ファイルをアップロードできません。</span>';
				}
			}
			if( $_FILES[$f_name]['name'] ){
				echo '<input type="hidden" name="'.$f_name.'" value="'.$copy_file.'">
				<dl class="_attachmentlist">
					<dt><img src='.HOME.'"dist/temp/attachment/'.$copy_file.'"></dt>
					<dd>ファイル名は'.$copy_file.'に変換されました</dd>
				</dl>';
			}
			echo '<input type="hidden" name="'.$f_name.'" value="'.$copy_file.'">';
		}
	}

?>

<script>

	/* 添付ファイルのクリアボタン */
	function clearFileField(id) {
		var area = document.getElementById(id);
		area.value = '';
	}

</script>