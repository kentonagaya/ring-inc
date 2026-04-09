<?php
/*--------------------------------------------------------------------------
	Template Name: contact-thanks
---------------------------------------------------------------------------*/

	/* 共通設定読み込み */
	include_once ('assets/class/base.class.php');
	include_once ('assets/class/functions.php');
	include ('assets/settings/site-config.php');

	/* このページに親がある場合true */
	$has_parent = true;
//	$has_parent = false;

	/* ページ設定 */
	define( 'CURRENTDIR', 'contact' );	// ディレクトリ名
	define( 'CURRENTPAGE', 'thanks' );	// ページ名
	$dirname 		= 'お問い合わせ';
	$subtitle 		= 'CONTACT';

	/* form_setting */
	$config_fname = get_template_directory() . '/assets/settings/contact-config.php' ;

	/* contents_module */
	require_once( 'assets/class/form.class.php' );
	session_start();
	$SENDMAIL = new send_form_mail( $config_fname );

	/* ページ専用CSS */
	$css = '';
	//$css .= '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/' . CURRENTDIR . '.css" media="all">' . "\n";

	/* ページ専用JS */
	$js = '';
	//$js .= '<script src="' . get_template_directory_uri() . '/js/' . CURRENTDIR . '.js" charset="utf-8"></script>' . "\n";

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
			$current_layer		= 3;			// 階層指定
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

					<div class="block">
						<h2 class="heading02 center">送信が完了しました。</h2>
						<div class="part cover texts radius">
							<p class="center"><?php $SENDMAIL->disp_message(); ?></p>
						</div>
					</div>

					<div class="block">
						<p class="center"><a class="button" href="<?php bloginfo('url');?>/<?php echo $top_link;?>">TOPページに戻る</a></p>
					</div>

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
