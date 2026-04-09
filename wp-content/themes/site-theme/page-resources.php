<?php
/*--------------------------------------------------------------------------
	Template Name: resources-index
---------------------------------------------------------------------------*/

	/* 共通設定読み込み */
	include_once ('assets/class/base.class.php');
	include_once ('assets/class/functions.php');
	include ('assets/settings/site-config.php');

	/* このページに親がある場合true */
//	$has_parent = true;
	$has_parent = false;

	/* ページ設定 */
	define( 'CURRENTDIR', 'resources' );	// ディレクトリ名
	define( 'CURRENTPAGE', 'index' );	// ページ名
	$dirname 		= '人材紹介';
	$subtitle 		= 'RECRUITMENT';

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
						<!--<p class="text center">豊富な情報力をもって有能で即戦力となる人材をご紹介致します。企業様の経営方針や採用状況を理解し、事業戦略に沿う候補者をご紹介させて頂きます。</p>-->
						<p class="text">人手不足の現代で、中途採用も厳しく、ブランクがある方が働きにくい環境。
						持っている資格を生かしにくい、経験を生かすことができないのが現状！
						当社は事業を専門に行ってきた社員から、他分野を専門としてきた社員まで幅広く在籍。
						様々な視点から、一人一人に合わせた転職＆就職をご提供できます。</p>
					</div>

					<div class="mod-split-box">
                        <div class="split-cont split-image" style="background-image: url(<?php bloginfo('template_url');?>/images/pic-1.jpg)"></div>
                            <div class="split-cont split-text">
                                <div class="split-inner">
									<h3 class="heading05 center">求人者の方へ</h3>
                                    <h3 class="heading03 underline center">選択肢を広げ、さらなる可能性を</h3>
                                    <p class="text">関西エリアを拠点とした地域密着型であり、スタッフの豊富な知識と柔軟な対応により企業様のご要望に最適な人材をご紹介させて頂きます。
									雇用関係の成立を仲介、コンサルティング致します。</p>
                                </div>
                            </div>
                        </div>
                        <div class="mod-split-box txt-img block">
                            <div class="split-cont split-text">
                                <div class="split-inner">
									<h3 class="heading05 center">求職者の方へ</h3>
                                    <h3 class="heading03 underline center">自分らしく仕事に携わる</h3>
                                    <p class="text">自分の経験を活かしたい、スキルアップをしたいなどの思いに寄り添い、希望にあった職場をご提案いたします。 
									新しいことを始めたい、未経験であってもご安心ください。多様な業種のスタッフが在籍しているためカウンセリングを行い、専門的な視点からもご相談を承ります。
									年収、勤務条件、待遇面、ご要望はすべてお気軽にお申し付けください。大きく一歩を踏み出し、『理想とする人生プラン』を実現させるために全力でお手伝いさせて頂きます。
									</p>
                                </div>
                            </div>
                            <div class="split-cont split-image" style="background-image: url(<?php bloginfo('template_url');?>/images/pic-2.jpg)"></div>
                        </div>

				</div><!-- // contents -->
			</section>

			<section class="page-section" id="ring-point">
				<div class="contents block">

					<h3 class="heading01 center">当社の強み</h3>

					<div class="cover">
						<ul>
							<li>幅広い職業に対応可能</li>
							<li>一人ひとりの個性・能力に合わせ、生き生き働ける職場をご提供。</li>
							<li>お悩みを解決しながら、希望・要望をできるだけかなえていくために、新しい職場とのご相談は弊社にお任せください。当社のスタッフが親切・丁寧に対応いたします。</li>
						</ul>
					</div>
				</div>
			</section>
			
			<section class="page-section bg-light" id="resources-flow">
				<div class="contents block">
					<div class="part">
						<h3 class="heading01 center">人材紹介の流れ</h3>
					</div>
					<div class="mod-flow-box">
						<div class="mod-image-texts">
							<div class="image-cont">
								<p class="pic"><img src="<?php bloginfo('template_url');?>/images/flow01.jpg" alt=""></p>
							</div>
							<div class="texts-cont texts">
								<h3 class="heading03"><span class="step font-designed">step<em>01</em></span> 問い合わせ</h3>
								<p>まずは、メールが電話にてご連絡ください。ここからお客様へのサポートが開始します。</p>
							</div>
						</div>
						<div class="mod-image-texts">
							<div class="image-cont">
								<p class="pic"><img src="<?php bloginfo('template_url');?>/images/flow02.jpg" alt=""></p>
							</div>
							<div class="texts-cont texts">
								<h3 class="heading03"><span class="step font-designed">step<em>02</em></span> ご相談</h3>
								<p>相談料無料！！出張相談も可能！</p>
								<p>ヒアリングを行い希望職種や、お客様に合った職業のご提案をさせていただきます。他県への就職希望もあればできる限りお手伝いさせていただきます。</p>
							</div>
						</div>
						
						<div class="mod-image-texts last">
							<div class="image-cont">
								<p class="pic"><img src="<?php bloginfo('template_url');?>/images/flow03.jpg" alt=""></p>
							</div>
							<div class="texts-cont texts">
								<h3 class="heading03"><span class="step font-designed">step<em>03</em></span> 面談調整</h3>
								<p>面談調整を行い、ご面接までご案内。お客様の面接後のご相談や、職場からのご提案までスタッフが窓口になりご対応させていただくため、
								言いにくいことや聞いてみたかった等の後悔もさせません！ヒアリング～就職決定まで完全サポート！大手にはできない手厚いサポートがウリです！</p>
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
