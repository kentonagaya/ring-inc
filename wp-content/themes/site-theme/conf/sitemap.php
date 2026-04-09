<?php
	$nav_array = array(
// 		array(
// 			'name' 		=> 'メニューラベル',
// 			'directory' => 'ディレクトリ名',
// 			'class' 	=> '-nodisp_hnav -nodisp_drawer',
//			'url' 		=> '外部URL',
// 			'external' 	=> false,
// 		),
		array(
			'name' 		=> 'トップページ',
			'directory' => 'home',
			'class' 	=> '',
			'external' 	=> false,
		),
		array(
			'name' 		=> 'サンプル',
			'directory' => 'sample',
			'class' 	=> '',
			'child'		=> array(
				array(
					'name' 		=> 'レイアウト&プロジェクト',
					'directory' => 'layout',
				),
				array(
					'name' 		=> 'jQueryパーツ',
					'directory' => 'jqparts',
				),
				array(
					'name' 		=> 'コンポーネント',
					'directory' => 'component',
				),
				// array(
				// 	'name' 		=> '外部リンク',
				// 	'directory' => '',
				// 	'url' 		=> 'https://www.yahoo.co.jp/',
				// 	'external' 	=> true,
				// ),
			)
		),
		array(
			'name' 		=> '会社概要',
			'directory' => 'company',
			'class' 	=> '',
			'external' 	=> false,
		),
		array(
			'name' 		=> '採用情報',
			'directory' => 'recruit',
			'class' 	=> '',
			'external' 	=> false,
		),
		array(
			'name' 		=> 'よくあるご質問',
			'directory' => 'faq',
			'class' 	=> '',
			'external' 	=> false,
		),
		array(
			'name' 		=> 'お知らせ',
			'directory' => 'news',
			'class' 	=> '-nodisp_hnav -nodisp_drawer',
			'external' 	=> false,
		),
		array(
			'name' 		=> 'ブログ',
			'directory' => 'weblog',
			'class' 	=> '-nodisp_hnav',
			'external' 	=> false,
		),
		array(
			'name' 		=> '外部リンク',
			'directory' => '',
			'class' 	=> '',
			'url' 		=> 'https://www.google.co.jp/',
			'external' 	=> true,
		),
		array(
			'name' 		=> 'お問い合わせ',
			'directory' => 'contact',
			'class' 	=> '-nodisp_hnav',
			'external' 	=> false,
		),
		array(
			'name' 		=> '資料請求',
			'directory' => 'request',
			'class' 	=> '-nodisp_hnav',
			'external' 	=> false,
		),
		array(
			'name' 		=> '個人情報保護方針',
			'directory' => 'privacy',
			'class' 	=> '-nodisp_hnav',
			'external' 	=> false,
		),
	);
?>
						<ul>
<?php
	foreach($nav_array as $nav):
		$menu_name = $nav['name'];
		if($nav['url']){
			$menu_url = $nav['url'];
		} else {
			if($nav['directory'] == 'home'){
				$menu_url = HOME;
			} else {
				$menu_url = HOME.$nav['directory'];
			}
		}
		if($nav['class']){
			$disp_class = $nav['class'];
		} else {
			$disp_class = '';
		}
		if($nav['external']){
			$menu_target = ' target="_blank"';
		} else {
			$menu_target = '';
		}
		if($nav['child']){
			$list_class = ' -has_child';
		} else {
			$list_class = '';
		}
		if(get_currentdir_slug() == $nav['directory']){
			$menu_class = '-current';
		} else {
			$menu_class = '';
		}
?>
							<li class="<?=$disp_class?><?=$list_class?>">
								<a href="<?=$menu_url?>" class="<?=$menu_class?>"<?=$menu_target?>><?=$menu_name?></a>
<?php if($nav['child']):?>
								<span class="_toggle js-nav_toggle"><?=$menu_name?></span>
								<div class="_child">
									<a href="<?=$menu_url?>" class="<?=$menu_class?>"<?=$menu_target?>><?=$menu_name?></a>
<?php
	foreach($nav['child'] as $child):
		$child_name = $child['name'];
		if($child['url']){
			$child_url = $child['url'];
		} else {
			$child_url = HOME.$child['directory'];
		}
		if($child['external']){
			$child_target = ' target="_blank"';
		} else {
			$child_target = '';
		}
?>
									<a href="<?=$child_url?>" <?=$child_target?>><?=$child_name?></a>
<?php endforeach;?>
								</div>
<?php endif;?>
							</li>
<?php endforeach;?>
						</ul>
