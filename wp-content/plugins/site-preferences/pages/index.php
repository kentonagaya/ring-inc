<script>
	// 設定反映の確認のため１回だけリロード
	window.onload = function () {
		if (window.name != "any") {
			location.reload();
			window.name = "any";
		} else {
			window.name = "";
		}
	}
</script>
<link rel="stylesheet" href="../wp-content/plugins/site-preferences/pages/css/efstyle.css">
<link rel="stylesheet" href="../wp-content/plugins/site-preferences/pages/css/style.css">
<?php
	// ファイルパス
	$file_path = dirname(__FILE__) . "/data/data-base.txt";
	//ファイルからデータを取り出す
	$data_serialize = file_get_contents($file_path);
	//元のデータに戻る
	$get_data = unserialize($data_serialize);
?>
<div class="content-wrap">
	<div class="container">
		<?php
			//var_dump($get_data);
		?>
		<form action="" method="post" name="ss_form">

			<section class="u-block">
				<h1 class="u-h3 u-bold">サイト基本設定</h1>
				<table class="preference-table">
					<tr>
						<th>公開状態にする</th>
						<td>
							<label class="toggle-button">
								<input type="checkbox" name="ss-dist" value="1"<?php if($get_data["ss-dist"]){echo ' checked';};?>>
							</label>
						</td>
					</tr>
					<tr>
						<th>Gutenbergを有効にする</th>
						<td>
							<label class="toggle-button">
								<input type="checkbox" name="ss-gutenberg" value="1"<?php if($get_data["ss-gutenberg"]){echo ' checked';};?>>
							</label>
						</td>
					</tr>
					<tr>
						<th>PCとタブレットは同じ見た目にする</th>
						<td>
							<label class="toggle-button">
								<input type="checkbox" name="ss-viewport" value="1"<?php if($get_data["ss-viewport"]){echo ' checked';};?>>
							</label>
						</td>
					</tr>
					<tr>
						<th>ヘッダーを固定する</th>
						<td>
							<label class="toggle-button">
								<input type="checkbox" name="ss-headerfix" value="1"<?php if($get_data["ss-headerfix"]){echo ' checked';};?>>
							</label>
						</td>
					</tr>
					<tr>
						<th>トップページのヘッダーを透明化する</th>
						<td>
							<label class="toggle-button">
								<input type="checkbox" name="ss-headertrans_top" value="1"<?php if($get_data["ss-headertrans_top"]){echo ' checked';};?>>
							</label>
						</td>
					</tr>
					<tr>
						<th>下層ページのヘッダーを透明化する</th>
						<td>
							<label class="toggle-button">
								<input type="checkbox" name="ss-headertrans_sub" value="1"<?php if($get_data["ss-headertrans_sub"]){echo ' checked';};?>>
							</label>
						</td>
					</tr>
					<tr>
						<th>トップページのローダーを有効にする</th>
						<td>
							<label class="toggle-button">
								<input type="checkbox" name="ss-loader" value="1"<?php if($get_data["ss-loader"]){echo ' checked';};?>>
							</label>
						</td>
					</tr>
					<tr>
						<th>ぱんくずリストを表示する</th>
						<td>
							<label class="toggle-button">
								<input type="checkbox" name="ss-breadcrumb" value="1"<?php if($get_data["ss-breadcrumb"]){echo ' checked';};?>>
							</label>
						</td>
					</tr>
					<tr>
						<th>下層ページのタイトルエリアを表示する</th>
						<td>
							<label class="toggle-button">
								<input type="checkbox" name="ss-titlearea" value="1"<?php if($get_data["ss-titlearea"]){echo ' checked';};?>>
							</label>
						</td>
					</tr>
					<tr>
						<th>Cookie承認バナーを表示する</th>
						<td>
							<label class="toggle-button">
								<input type="checkbox" name="ss-cookiebanner" value="1"<?php if($get_data["ss-cookiebanner"]){echo ' checked';};?>>
							</label>
						</td>
					</tr>
					<tr>
						<th>Wordpressのアップデート通知を有効にする</th>
						<td>
							<label class="toggle-button">
								<input type="checkbox" name="ss-wpupdate" value="1"<?php if($get_data["ss-wpupdate"]){echo ' checked';};?>>
							</label>
						</td>
					</tr>
					<tr>
						<th>htmlを圧縮する</th>
						<td>
							<label class="toggle-button">
								<input type="checkbox" name="ss-compress" value="1"<?php if($get_data["ss-compress"]){echo ' checked';};?>>
							</label>
						</td>
					</tr>
				</table>
			</section>

			<section class="u-block">
				<h1 class="u-h3 u-bold">サイト基本情報</h1>
				<div class="u-part">
					<div class="u-frame -noborder u-radius u-bg_white">
						<h2 class="u-h6 u-bold">サイト名</h2>
						<input type="text" name="ss-sitename" value="<?=$get_data["ss-sitename"]?>">
					</div>
				</div>
				<div class="u-part">
					<div class="u-frame -noborder u-radius u-bg_white">
						<h2 class="u-h6 u-bold">会社・組織名</h2>
						<input type="text" name="ss-cname" value="<?=$get_data["ss-cname"]?>">
					</div>
				</div>
				<div class="u-part">
					<div class="u-frame -noborder u-radius u-bg_white">
						<h2 class="u-h6 u-bold">住所</h2>
						<p>〒&nbsp;<input type="text" class="size-m" name="ss-czip" value="<?=$get_data["ss-czip"]?>"></p>
						<p><input type="text" name="ss-caddress1" value="<?=$get_data["ss-caddress1"]?>" placeholder="都道府県・市区町村・番地"></p>
						<p><input type="text" name="ss-caddress2" value="<?=$get_data["ss-caddress2"]?>" placeholder="ビル名など"></p>
						<p><input type="text" class="size-m" name="ss-ctel" value="<?=$get_data["ss-ctel"]?>" placeholder="電話番号">&nbsp;<input type="text" class="size-m" name="ss-ctelsuff" value="<?=$get_data["ss-ctelsuff"]?>" placeholder="（代）など"></p>
						<p><input type="text" class="size-m" name="ss-cfax" value="<?=$get_data["ss-cfax"]?>" placeholder="FAX番号"></p>
					</div>
				</div>
				<div class="u-part">
					<div class="u-frame -noborder u-radius u-bg_white">
						<h2 class="u-h6 u-bold">営業時間</h2>
						<input type="text" name="ss-opentime" value="<?=$get_data["ss-opentime"]?>">
					</div>
				</div>
				<div class="u-part">
					<div class="u-frame -noborder u-radius u-bg_white">
						<h2 class="u-h6 u-bold">定休日</h2>
						<input type="text" name="ss-close" value="<?=$get_data["ss-close"]?>">
					</div>
				</div>
				<div class="u-part">
					<div class="u-frame -noborder u-radius u-bg_white">
						<h2 class="u-h6 u-bold">コピーライト</h2>
						<input type="text" name="ss-copyright" value="<?=$get_data["ss-copyright"]?>">
					</div>
				</div>
				<div class="u-part">
					<div class="u-frame -noborder u-radius u-bg_white">
						<h2 class="u-h6 u-bold">コピーライトの発行年</h2>
						<p><input type="text" name="ss-copyright_issue" value="<?=$get_data["ss-copyright_issue"]?>"></p>
						<p class="u-supple u-mb0">※ 記入しない場合は最新年度が表示されます</p>
					</div>
				</div>
				<div class="u-part">
					<div class="u-frame -noborder u-radius u-bg_white">
						<h2 class="u-h6 u-bold">消費税率</h2>
						<input type="text" name="ss-taxrate" class="size-m" value="<?=$get_data["ss-taxrate"]?>">&nbsp;％
					</div>
				</div>
				<div class="u-part">
					<div class="u-frame -noborder u-radius u-bg_white">
						<h2 class="u-h6 u-bold">テーマカラー</h2>
						<input type="color" name="ss-themecolor" value="<?=$get_data["ss-themecolor"]?>">
					</div>
				</div>
			</section>

			<section class="u-center">
				<input type="submit" name="ss-submit" class="c-btn -max -huge" value="設定内容を更新">
			</section>

		</form>
	</div>
</div>

<?php

if( !empty(@$_POST['ss-submit']) ) {
	$data = array(
		"ss-dist" => $_POST['ss-dist'],
		"ss-gutenberg" => $_POST['ss-gutenberg'],
		"ss-viewport" => $_POST['ss-viewport'],
		"ss-headerfix" => $_POST['ss-headerfix'],
		"ss-headertrans_top" => $_POST['ss-headertrans_top'],
		"ss-headertrans_sub" => $_POST['ss-headertrans_sub'],
		"ss-loader" => $_POST['ss-loader'],
		"ss-breadcrumb" => $_POST['ss-breadcrumb'],
		"ss-titlearea" => $_POST['ss-titlearea'],
		"ss-cookiebanner" => $_POST['ss-cookiebanner'],
		"ss-wpupdate" => $_POST['ss-wpupdate'],
		"ss-compress" => $_POST['ss-compress'],
		"ss-sitename" => $_POST['ss-sitename'],
		"ss-cname" => $_POST['ss-cname'],
		"ss-czip" => $_POST['ss-czip'],
		"ss-caddress1" => $_POST['ss-caddress1'],
		"ss-caddress2" => $_POST['ss-caddress2'],
		"ss-ctel" => $_POST['ss-ctel'],
		"ss-ctelsuff" => $_POST['ctelsuff'],
		"ss-cfax" => $_POST['ss-cfax'],
		"ss-opentime" => $_POST['ss-opentime'],
		"ss-close" => $_POST['ss-close'],
		"ss-copyright" => $_POST['ss-copyright'],
		"ss-copyright_issue" => $_POST['ss-copyright_issue'],
		"ss-taxrate" => $_POST['ss-taxrate'],
		"ss-themecolor" => $_POST['ss-themecolor'],
	);

	//シリアル化
	$data_serialize = serialize($data);
	//ファイルに保存
	file_put_contents($file_path, $data_serialize, LOCK_EX);
	//保存したファイルのパーミッションを644にする
	chmod($file_path, 0644);
}
?>