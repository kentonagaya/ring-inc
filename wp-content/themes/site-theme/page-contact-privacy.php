<?php
/*--------------------------------------------------------------------------
	Template Name: contact-privacy
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
	define( 'CURRENTPAGE', 'privacy' );	// ページ名
	$dirname 		= 'お問い合わせ';
	$subtitle 		= 'CONTACT';

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

					<div class="page-title">
						<h2 class="heading01">個人情報保護方針</h2>
					</div>
					<div class="block">
						<div class="part texts">
							<p>個人情報保護のため以下のプライバシーポリシーを定め周知徹底を図ります。</p>
						</div>
						<div class="part texts">
							<h4 class="heading03">個人情報の適切な収集について</h4>
							<p>必要な範囲で個人情報を収集し、収集した情報はガイドラインに則り利用します。</p>
						</div>
						<div class="part texts">
							<h4 class="heading03">個人情報の安全管理について</h4>
							<p>個人情報の漏えい･滅失･き損を防ぐため、必要かつ適切な安全管理措置を講じるとともに継続的な改善に努めます。</p>
						</div>
						<div class="part texts">
							<h4 class="heading03">個人情報に関する法令及びその他の規範の遵守について</h4>
							<p>個人情報の取扱いについて、個人情報の保護に関する法律、その他個人情報保護関連法令を遵守します。</p>
						</div>
						<div class="part texts">
							<p>以上のプライバシーポリシーを改定することがあります。その場合の改定内容は当WEBサイトに記載いたします。</p>
						</div>
					</div>
					<div class="block">
						<h2 class="heading02">WEBサイトでお客様にお伺いする情報について</h2>
						<div class="part texts">
							<p>当WEBサイトをご利用される場合、一部のコンテンツでは個人情報をお伺いする場合があります。これらは任意かつ自主的にご提供いただくものです。</p>
							<p>お伺いする情報は、お名前･メールアドレス･電話番号といったものが主なものになります。</p>
							<p>また、それ以外の質問をさせていただく場合がありますが、これは必要最低限の項目を除いて選択可能なものになっており、任意でご提供いただけるものとしています。</p>
							<p>なお、同意なしにお伺いした情報を改変することはありません。</p>
							<p>お伺いした情報は同意いただいた場合、または正当な理由がある場合を除き第三者に開示または提供しません。</p>
						</div>
					</div>
					<div class="block">
						<h2 class="heading02">保障及び責任制限</h2>
						<div class="part texts">
							<p>当WEBサイトの利用は、アクセスいただいた皆様の責任において行われるものとします。</p>
							<p>また、当WEBサイトにリンクが設定されている他のウェブサイトから取得された各種情報の利用によって生じたあらゆる損害に関しては一切の責任を負うことはできません。</p>
						</div>
					</div>
					<div class="block">
						<h2 class="heading02">準拠法</h2>
						<div class="part texts">
							<p>当WEBサイトは法律の異なる全世界の国々からアクセスすることが可能ですが、法律原理の違いに関わらず日本国の法律に拘束されることに同意するものとします。</p>
							<p>また当WEBサイトのコンテンツが適切であるかなどの記述や表示は一切行いません。当サイトへのアクセスは自由意志によるものとし、当サイトの利用に関しての責任はアクセスいただいた皆様にあるものとします。</p>
						</div>
					</div>

					<div class="block">
						<h2 class="heading02">Googleアナリティクスの使用について</h2>
						<div class="part texts">
							<p>当サイトでは、より良いサービスの提供、またユーザビリティの向上のため、Googleアナリティクスを使用し、当サイトの利用状況などのデータ収集及び解析を行っております。
							その際、「Cookie」を通じて、Googleがお客様のIPアドレスなどの情報を収集する場合がありますが、「Cookie」で収集される情報は個人を特定できるものではありません。
							収集されたデータはGoogleのプライバシーポリシーにおいて管理されます。</p>
							<p>なお、当サイトのご利用をもって、上述の方法・目的においてGoogle及び当サイトが行うデータ処理に関し、 お客様にご承諾いただいたものとみなします。</p>
							<p><a href="http://www.google.com/intl/ja/policies/privacy/" targt="_blank">Googleのプライバシーポリシー</a></p>
							<p><a href="https://www.google.com/intl/ja/policies/privacy/partners/" targt="_blank">Googleのテクノロジー</a></p>
						</div>
					</div>

					<div class="block">
						<p class="center"><a href="<?php bloginfo('url');?>/contact/" class="button bc-ghost">お問い合わせフォームに戻る<i class="fas fa-undo-alt"></i></a></p>
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
