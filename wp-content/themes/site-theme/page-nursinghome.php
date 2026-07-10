<?php
/*--------------------------------------------------------------------------
	Template Name: nursinghome-index
---------------------------------------------------------------------------*/

	/* 共通設定読み込み */
	include_once ('assets/class/base.class.php');
	include_once ('assets/class/functions.php');
	include ('assets/settings/site-config.php');

	/* このページに親がある場合true */
//	$has_parent = true;
	$has_parent = false;

	/* ページ設定 */
	define( 'CURRENTDIR', 'nursinghome' );	// ディレクトリ名
	define( 'CURRENTPAGE', 'index' );	// ページ名
	$dirname 		= '高齢者トータルサポート';
	$subtitle 		= 'TOTAL SUPPORT for SENIORS';

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
						<p class="text center">医療現場で勤務経験のある専門スタッフが在住しており、専門的な相談が可能です。お客様のニーズに応じて心安らぐ、最適な施設のご紹介をさせて頂きます。</p>
					</div>
					
					<div class="mod-split-box">
                        <div class="split-cont split-image" style="background-image: url(<?php bloginfo('template_url');?>/images/pic-3.jpg)"></div>
                            <div class="split-cont split-text">
                                <div class="split-inner">
                                    <h3 class="heading03 underline center">「安心」を感じられる、心豊かな生活を見つける</h3>
                                    <p class="text">老人ホームにおける多くの専門性や特徴をニーズに応じて柔軟にご提案させていただくために、
									無料出張相談を実施し、ご見学に同行いたします。ご希望エリア、ご予算、介護度、ご希望のサービス内容を正確に把握し、最適な施設をご提案させて頂きます。
									利用者様、ご家族様と同じ視点から内容を確認させていただき、ご契約に至るまでしっかりと弊社のスタッフにてサポートを行います。
</p>
                                </div>
                            </div>
                        </div>
                        <div class="mod-split-box txt-img">
                            <div class="split-cont split-text">
                                <div class="split-inner">
                                    <h3 class="heading03 underline center">入居決定後もつづく信頼のサポート</h3>
                                    <p class="text">ご入居時における必要書類、役所の手続きも必要に応じて対応させて頂きます。
									引っ越し、不用品回収、不動産売却、身元保証も提携先企業とともに安心のトータルサポートでご支援させて頂きます。
									ご入居後のケアも担当スタッフと共に全面バックアップ致します。伝えにくい本音やお困りごと、相談事項がありましたら、お気軽にご相談ください。</p>
                                </div>
                            </div>
                             <div class="split-cont split-image" style="background-image: url(<?php bloginfo('template_url');?>/images/pic-4.jpg)"></div>
                        </div>
				</div><!-- // contents -->
			</section>

			<section class="page-section" id="nursing-point">
				<div class="contents block">
					<div class="part">
						<h3 class="heading01 center">当社の強み</h3>
					</div>
					<div class="mod-clm4 sp-clear">
						<ul class="eq-height">
							<li class="list-cont">
								<div class="list-inner texts">
									<p class="pic"><img src="<?php bloginfo('template_url');?>/images/nursing-point01.png" alt=""></p>
									<h3 class="heading03 center item-eq-height">専門スタッフが在住</h3>
									<p class="texts">専門的な相談も可能で施設との連携もスムーズ</p>
								</div>
							</li>
							<li class="list-cont">
								<div class="list-inner texts">
									<p class="pic"><img src="<?php bloginfo('template_url');?>/images/nursing-point02.png" alt=""></p>
									<h3 class="heading03 center item-eq-height">無料出張相談</h3>
									<p class="texts">ヒアリング、案内同行、役所手続き、入居までサポート</p>
								</div>
							</li>
							<!-- <li class="list-cont">
								<div class="list-inner texts">
									<p class="pic"><img src="<?php bloginfo('template_url');?>/images/nursing-point03.png" alt=""></p>
									<h3 class="heading03 center item-eq-height">お祝い支度金</h3>
									<p class="texts">ご入居が決定したら最大10万円の支度金をキャッシュバック</p>
								</div>
							</li> -->
							<li class="list-cont">
								<div class="list-inner texts">
									<p class="pic"><img src="<?php bloginfo('template_url');?>/images/nursing-point04.png" alt=""></p>
									<h3 class="heading03 center item-eq-height">情報力と提案力</h3>
									<p class="texts">関西全域から全国の施設情報で多様なケースに対応可能</p>
								</div>
							</li>
							<li class="list-cont">
								<div class="list-inner texts">
									<p class="pic"><img src="<?php bloginfo('template_url');?>/images/nursing-point05.png" alt=""></p>
									<h3 class="heading03 center item-eq-height">トータルサポート</h3>
									<p class="texts">引っ越し、不用品回収、不動産売却・身元保証も提携先企業とともにサポート</p>
								</div>
							</li>
						</ul>
					</div>
				</div>

			</section>


			<section class="page-section bg-light" id="nursing-flow">
				<div class="contents block">
					<div class="part">
						<h3 class="heading01 center">ご入居までの流れ</h3>
					</div>
					<div class="mod-flow-box">
						<div class="mod-image-texts">
							<div class="image-cont">
								<p class="pic"><img src="<?php bloginfo('template_url');?>/images/flow01.jpg" alt="ご相談"></p>
							</div>
							<div class="texts-cont texts">
								<h3 class="heading03"><span class="step font-designed">step<em>01</em></span> ご相談・面談</h3>
								<p>始めに電話・メール・HPでのお問い合わせをしていただきます。相談内容を伺い、面談日の調整を行います。
									ご希望エリア、ご予算、介護度、希望のサービス内容を正確に把握し、ニーズに合った施設をご提案させていただきます。
								</p>
							</div>
						</div>
						<div class="mod-image-texts">
							<div class="image-cont">
								<p class="pic"><img src="<?php bloginfo('template_url');?>/images/flow-n02.jpg" alt="ご見学同行"></p>
							</div>
							<div class="texts-cont texts">
								<h3 class="heading03"><span class="step font-designed">step<em>02</em></span> ご見学同行</h3>
								<p>見学日程を調整し、ご指定場所までお迎えに伺います。必要に応じて介護タクシーも手配致します。
									見学同行では、利用者様と同じ視点から内容を確認させていただきサポートいたします。</p>
							</div>
						</div>
						<div class="mod-image-texts">
							<div class="image-cont">
								<p class="pic"><img src="<?php bloginfo('template_url');?>/images/flow-n03.jpg" alt="ご入居決定"></p>
							</div>
							<div class="texts-cont texts">
								<h3 class="heading03"><span class="step font-designed">step<em>03</em></span> ご入居決定・施設面談</h3>
								<p>ご見学を終え、最もニーズに合った施設がございましたらお申し込みを行います。
									ご入居時における必要書類、役所の手続きも必要に応じ、対応させて頂きます。
									ご契約までしっかりと弊社のスタッフにてサポートいたします。
								</p>
							</div>
						</div>						
						<div class="mod-image-texts last">
							<div class="image-cont">
								<p class="pic"><img src="<?php bloginfo('template_url');?>/images/flow-n04.jpg" alt="ご入居後のフォロー"></p>
							</div>
							<div class="texts-cont texts">
								<h3 class="heading03"><span class="step font-designed">step<em>04</em></span> ご入居・ご入居後のフォロー</h3>
								<p>実際にご入居いただき、ご感想をお聞かせください。
									またその他相談事項がございましたら是非お気軽にご相談ください。
									（引っ越し、不用品回収・処分、不動産売却、身元保証等）
								</p>
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
