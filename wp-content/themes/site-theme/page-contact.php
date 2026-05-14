<?php
/*--------------------------------------------------------------------------
	Template Name: contact-index
---------------------------------------------------------------------------*/

	/* 共通設定読み込み */
	include_once ('assets/class/base.class.php');
	include_once ('assets/class/functions.php');
	include ('assets/settings/site-config.php');

	/* このページに親がある場合true */
//	$has_parent = true;
	$has_parent = false;

	/* ページ設定 */
	define( 'CURRENTDIR', 'contact' );	// ディレクトリ名
	define( 'CURRENTPAGE', 'index' );	// ページ名
	$dirname 		= 'お問い合わせ';
	$subtitle 		= 'CONTACT';

	/* form_setting */
	$fpath_thanks = get_site_url() . '/contact/thanks/';
	$form_id = 'contact_form';
	$detepicker_theme_color = 'blue1'; // red  brown  orange  mono  dark  blue1  blue2  green

	/* contents_module */
	require_once('assets/class/form.class.php');
	session_start();
	$FS = new formset( $fpath_thanks, $form_id );
	$FS->is_sp = is_sp();
	$FS->is_pc = is_pc();
	$FS->is_tb = is_tb();
	$FS->detepicker_theme_color( $detepicker_theme_color );

	/* ページ専用CSS */
	$css = '';
	//$css .= '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/' . CURRENTDIR . '.css" media="all">' . "\n";

	/* ページ専用JS */
	$js = '';
	$js .= '<script src="' . get_template_directory_uri() . '/js/lib/jquery.validate.min.js"></script>' . "\n";
	$js .= '<script src="//jpostal-1006.appspot.com/jquery.jpostal.js" type="text/javascript"></script>' . "\n";
	$js .= '<script src="' . get_template_directory_uri() . '/js/' . CURRENTDIR . '.js" charset="utf-8"></script>' . "\n";

	/* ページ専用SEO */
	$page_org_title	= '';
	$page_meta_d	= '';
	$page_meta_k	= '';

	// レイアウト個別指定
	$layout			= 'one-column';
//	$layout			= 'has-side';

	// オリジナルヘッダータグ
//	$page_org_tag = '<meta name="robots" content="noindex">';
	$page_org_tag = '';

	# header読み込み
	include ("assets/common/html-header.php");
	get_header();

?>
	<section class="title-wrap <?php if ( $header_fix == true ) { echo "header-fix"; };?> <?php if( $header_type == 'standard' ){ echo 'has-gnav'; };?>">

<?php
	// page title
	include ('assets/modules/mod-pagetitle.php');
?>

<?php if ( $breadcrumb == true ) {?>
		<div class="breadcrumb-wrap">
<?php
			$current_layer		= 2;			// 階層指定
			$parent_dir_name	= 'directory';	// 階層数が`4`の場合のみ指定
			$parent_layer_name	= '親階層名';		// 階層数が`4`の場合のみ指定
			include ("assets/modules/breadcrumb.php");
?>
		</div>
<?php };?>

	</section><!-- // title-wrap -->

	<div class="contents-wrap <?php echo $layout;?>"><!-- contents-wrap -->

		<main>

			<section class="page-section">
				<div class="contents"><!-- contents -->

<?php
	/******* 送信画面 *******/
	if( $FS->is_form() ){
		$heading = 'お問い合わせフォーム';
?>
					<div class="block">
						<div class="part texts center">
							<p>ご不明な点などございましたら、下記フォームより何でもお気軽にお問合せ下さい。<br>追ってご連絡いたしますので宜しくお願いいたします。</p>
						</div>
					</div>

					<div class="block">
						<div class="part">

							<!--$$$$$$$$$$ MODここから $$$$$$$$$$-->
							<div class="mod-contact-page-tel">
								<p class="tel-num font-designed"><i class="fas fa-phone"></i><?php echo $phone_num_f;?></p>
								<p><i class="far fa-clock"></i>営業時間 <?php echo $open_time_1;?><?php echo $close_day_1;?></p>
							</div><!-- // mod-contact-page-tel -->
							<!--$$$$$$$$$$ MODここまで $$$$$$$$$$-->

							<!--$$$$$$$$$$ MODここから $$$$$$$$$$-->
							<div class="mod-contact-page-tel-sp">
								<p><a class="button bc-ghost" href="<?php bloginfo('url');?>/contact/privacy/">個人情報保護方針</a></p>
								<p><a class="button font-designed" href="tel:<?php echo $phone_num_f;?>"><i class="fas fa-phone"></i><?php echo $phone_num_f;?></a></p>
							</div><!-- // mod-contact-page-tel-sp -->
							<!--$$$$$$$$$$ MODここまで $$$$$$$$$$-->

						</div>
					</div>
<?php
	}
	/******* 確認画面 *******/
	elseif( $FS->is_confirm() ){
		$heading = '入力内容のご確認';
?>
					<div class="block">
						<div class="part">
							<p class="text">入力内容をご確認いただき、よろしければ送信ボタンをクリックしてください。</p>
						</div>
					</div>
<?php
	}
	/********* end *********/
?>
					<div class="block">
						<h2 class="heading02"><?php echo $heading;?></h2>
						<div class="part form-set02">
							<form id="<?php echo $FS->form_id; ?>" method="post" action="<?php echo $FS->form_action; ?>">
								<div class="form-input-set">
									
									<div class="form-fieldset">
										<div class="form-legend">
											<p><?php $FS->must( 'name' ); ?>お名前</p>
										</div>
										<div class="form-cont">
											<p><?php $FS->disp( 'text', 'name', 'must' ); ?></p>
										</div>
									</div>
									<div class="form-fieldset">
										<div class="form-legend">
											<p><?php $FS->must( 'email' ); ?>メールアドレス</p>
										</div>
										<div class="form-cont">
											<p><?php $FS->disp( 'email', 'email', 'must' ); ?></p>
										</div>
									</div>
									<div class="form-fieldset">
										<div class="form-legend">
											<p>電話番号</p>
										</div>
										<div class="form-cont">
											<p><?php $FS->disp( 'tel', 'tel' ); ?></p>
										</div>
									</div>
									<div class="form-fieldset">
										<div class="form-legend">
											<p>お問い合わせ内容</p>
										</div>
										<div class="form-cont multiline">
											<p><?php $FS->disp( 'textarea', 'message' ); ?></p>
										</div>
									</div>
								</div>
								<div class="form-submit-set">
									<div class="form-buttons"><?php $FS->submit(); ?></div>
								</div>
								<input type="hidden" name="form_cname" value="<?php bloginfo('name');?>">
								<input type="hidden" name="form_czip" value="<?php echo $zip_1;?>">
								<input type="hidden" name="form_caddress1" value="<?php echo $address_1_a;?>">
								<input type="hidden" name="form_caddress2" value="<?php echo $address_1_b;?>">
								<input type="hidden" name="form_ctel1" value="<?php echo $phone_num_1;?>">
								<input type="hidden" name="form_ctel2" value="<?php echo $fax_num_1;?>">
							</form>
						</div>
					</div>
<?php
/********************* is_pc is_tb ************************/
	if( is_pc()|is_tb() ){
?>
					<div class="block">
						<div class="part">
							<div class="mod-privacy-box cover radius center">
								<p class="text"><?php echo $site_name;?>は、お客様の個人情報の重要性を認識し大切に扱います。</p>
								<a class="ref button bc-ghost" href="<?php bloginfo('url');?>/contact/privacy/">個人情報保護方針</a>
							</div>
						</div>
					</div>
<?php
	}
/********************* end **************************/
?>

				</div><!-- // contents -->
			</section>



		</main>

<?php
	if ( $layout == 'has-side' ) {
		include ('assets/modules/mod-side-' . CURRENTDIR . '.php');
	};
?>

	</div><!-- // contents-wrap -->

<?php get_footer();?>
