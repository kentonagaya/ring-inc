<?php
	// メールフォームに設定した項目が本文に自動で反映される
	foreach( $form_content as $row ){
		if( $row['type'] == 'checkbox' ) {
			if ( isset( $_POST['form_'.$row['name']]) && is_array($_POST['form_'.$row['name']] ) ) {
				$cbtext = implode(", ", $_POST['form_'.$row['name']]);
			}
			if( $cbtext ){
				$text .= '[' . $row['title'] . ']' . "\n";
				$text .= $cbtext . "\n";
			}
			$opttion_array = explode(',',$row['option']);
			foreach( $opttion_array as $i => $value ){
				$optnum = $i+1;
				if( $row['add_field'] ){
					$add_field = $row['add_field'];
					foreach( $add_field as $af => $opt ){
						if( $optnum == $opt['option_num'] && $_POST['form_' . $opt['name']] ){
							$text .= $_POST['form_' . $opt['name']] . "\n";
						}
					}
				}
			}
			$text .= "\n";
		} elseif( $row['type'] == 'address' ) {
			if( $_POST['form_' . $row['name'] . '_zip'] or $_POST['form_' . $row['name'] . '1'] or $_POST['form_' . $row['name'] . '2'] or $_POST['form_' . $row['name'] . '3'] ){
				$text .= '[' . $row['title'] . ']' . "\n";
				$text .= "〒" . $_POST['form_' . $row['name'] . '_zip'] . ' ' . $_POST['form_' . $row['name'] . '1'] . ' ' . $_POST['form_' . $row['name'] . '2'] . '' . $_POST['form_' . $row['name'] . '3'] . "\n\n";
			}
		} elseif( $row['type'] == 'file' ) {
			if( !empty( $_POST['form_' . $row['name'] . '_array'] ) ) {
				$text .= '[' . $row['title'] . ']' . "\n";
				for( $i = 1; $i <= $row['repeat']; $i++){
					$text .= $_POST['form_' . $row['name'].'_'.$i] . "\n";
				}
				$text .= "\n";
			}
		}  elseif( $row['type'] == 'select' ) {
			if( $_POST['form_' . $row['name']] !== '選択してください' ){
				$text .= '[' . $row['title'] . ']' . "\n";
				$text .= $_POST['form_' . $row['name']] . "\n\n";
				$text .= "\n";
			}
		} else {
			if( $_POST['form_' . $row['name']] ){
				$text .= '[' . $row['title'] . ']' . "\n";
				$text .= $_POST['form_' . $row['name']] . "\n\n";
			}
		}
	}

	$contents = $text;
?>