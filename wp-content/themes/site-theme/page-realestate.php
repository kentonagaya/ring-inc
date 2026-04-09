<?php
/*--------------------------------------------------------------------------
	Template Name: realestate-index
---------------------------------------------------------------------------*/

	/* 共通設定読み込み */
	include_once ('assets/class/base.class.php');
	include_once ('assets/class/functions.php');
	include ('assets/settings/site-config.php');

	/* このページに親がある場合true */
//	$has_parent = true;
	$has_parent = false;

	/* ページ設定 */
	define( 'CURRENTDIR', 'realestate' );	// ディレクトリ名
	define( 'CURRENTPAGE', 'index' );	// ページ名
	$dirname 		= '不動産紹介事業';
	$subtitle 		= 'REALESTATE ';

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
					<div class="hgroup">
						<div class="mod-contents-header">
							<h1 class="header-title center font-designed"><?php echo $subtitle;?></h1>
							<p class="subtitle font-designed center"><?php echo $dirname;?></p>
						</div>
                    </div>

					<div class="block">
						<p class="text <?php echo switch_ua( 'center', 'center', '' );?>">経験豊富なスタッフが一人一人のニーズに合わせてきめ細やかな対応でサポート致します。売りたい時、買いたい時。貸したい時、借りたい時。<br>
						その間に立ち、皆さまに満足していただける安心で安全な取引をかなえます。</p>
					</div>

					<div class="mod-split-box">
                        <div class="split-cont split-image" style="background-image: url(<?php bloginfo('template_url');?>/images/pic-5.jpg)"></div>
                            <div class="split-cont split-text">
                                <div class="split-inner">
                                    <h3 class="heading03 underline center">理想に寄り添ったお住まい探し</h3>
                                    <p class="text">現在のお住まいで生涯を過ごすことに不安を感じる方に、一生涯安心できる暮らしをご提案したい。
									たとえ健康であっても、今後を見据えて、バリアフリーに特化した物件や、外部サービスと連携のある物件を選ぶという選択肢があります。
									年金生活で資産に余裕がないとお悩みの方、不動産に関する知識に自信がない方等、すべて正直にお話しください。
									全国に及ぶ豊富な不動産情報をもって、現場経験のある相談員がご提供に至るまで全面的にサポート致します。</p>
                                </div>
                            </div>
                        </div>
                        <div class="mod-split-box txt-img">
                            <div class="split-cont split-text">
                                <div class="split-inner">
                                    <h3 class="heading03 underline center">新たな生活への準備こそプロの力を</h3>
                                    <p class="text">大切な住まいだからこそ頭を悩ませる話ではありますが、現在のお住まいについて、今後を検討することは、
									将来の生活に不安を残さないために重要なことです。当社では、引っ越しから不用品回収、処分・不動産売却・身元保証までトータルサポート致します。</p>
                                </div>
                            </div>
                             <div class="split-cont split-image" style="background-image: url(<?php bloginfo('template_url');?>/images/pic-6.jpg)"></div>
                        </div>
				</div><!-- // contents -->
			</section>

			<section class="page-section" id="realestate-point">
				<div class="contents block">

					<h3 class="heading01 center">当社の強み</h3>

					<div class="cover">
						<p>
						お客様にとって住み慣れた住まいや思い出の場所があると思います。<br>
						お客様の心安らぐ豊かな暮らしを目指しをお手伝いします。
						トータル的なサポートで、一貫した管理のもと関西全域から全国の土地・建物にご対応可能。
						また一軒家・マンション・アパート賃貸のお取り扱いも可能です。引っ越しで不要、今後の扱い方がわからない等何でも相談を承ります。
						引っ越しの整理・リサイクル・処分でお困りのことがございましたらまずはご連絡を提携先企業との連携で早期の対応が可能です。
						</p>
					</div>
				</div>
			</section>

			<section class="page-section bg-light" id="realestate-flow">
				<div class="contents block">
					<div class="part">
						<h3 class="heading01 center">不動産紹介事業の流れ</h3>
					</div>
					<div class="mod-flow-box">
						<div class="mod-image-texts">
							<div class="image-cont">
								<p class="pic"><img src="<?php bloginfo('template_url');?>/images/flow01.jpg" alt=""></p>
							</div>
							<div class="texts-cont texts">
								<h3 class="heading03"><span class="step font-designed">step<em>01</em></span> 問い合わせ</h3>
								<p>メール、お電話どちらでもお気軽にお問い合わせください。ここからお客様のサポートが開始となります。</p>
							</div>
						</div>
						<div class="mod-image-texts">
							<div class="image-cont">
								<p class="pic"><img src="<?php bloginfo('template_url');?>/images/flow02.jpg" alt=""></p>
							</div>
							<div class="texts-cont texts">
								<h3 class="heading03"><span class="step font-designed">step<em>02</em></span> 相談</h3>
								<p>日程を調整し、直接お話しさせていただきます。出張相談可能のため遠方のお客様もぜひご連絡ください。
								売りたい、買いたい、賃貸したい、等ご要望・ご相談をお聞かせください。</p>
							</div>
						</div>
						<div class="mod-image-texts">
							<div class="image-cont">
								<p class="pic"><img src="<?php bloginfo('template_url');?>/images/flow-r03.jpg" alt=""></p>
							</div>
							<div class="texts-cont texts">
								<h3 class="heading03"><span class="step font-designed">step<em>03</em></span> 土地調査</h3>
								<p>専任の宅地建物取引氏にて土地調査を実施いたします。
								調査結果が上がり次第、ご報告させていただきます。気になる点や内容などございましたらご説明させていただきます。</p>
							</div>
						</div>
						<div class="mod-image-texts last">
							<div class="image-cont">
								<p class="pic"><img src="<?php bloginfo('template_url');?>/images/flow-r04.jpg" alt=""></p>
							</div>
							<div class="texts-cont texts">
								<h3 class="heading03"><span class="step font-designed">step<em>04</em></span> 商談成立</h3>
								<p>商談成立の際は専任の宅地建物取引士にて説明を行い、ご契約から各種お手続きまでさせていただきます。</p>
							</div>
						</div>						
					</div>
				</div>

			</section>

		</main>

<?php
	if ( $layout == 'has-side' ) {
		include ('assets/modules/mod-side-' . CURRENTDIR . '.php');
	};
?>

	</div><!-- // contents-wrap -->

<?php get_footer();?>
