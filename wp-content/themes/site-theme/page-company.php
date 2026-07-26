<?php
/*--------------------------------------------------------------------------
	Template Name: company-index
---------------------------------------------------------------------------*/

	/* 共通設定読み込み */
	include_once ('assets/class/base.class.php');
	include_once ('assets/class/functions.php');
	include ('assets/settings/site-config.php');

	/* このページに親がある場合true */
//	$has_parent = true;
	$has_parent = false;

	/* ページ設定 */
	define( 'CURRENTDIR', 'company' );	// ディレクトリ名
	define( 'CURRENTPAGE', 'index' );	// ページ名
	$dirname 		= '会社案内';
	$subtitle 		= 'COMPANY';

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

			<section class="page-section ">
				<div class="contents block"><!-- contents -->
					<div class="hgroup">
						<div class="mod-contents-header mbcut">
							<h1 class="header-title center font-designed">MESSAGE</h1>
							<p class="subtitle font-designed center">ご挨拶</p>
						</div>
					</div>
					<div class="mod-image-texts">
						<div class="image-cont">
							<p class="pic"><img src="<?php bloginfo('template_url');?>/images/message.png" alt="ご挨拶"></p>
						</div>
						<div class="texts-cont texts">
							<h3 class="heading03">地域社会のコーディネーター</h3>
							<p>株式会社リングは平成28年に医療職に特化した人材紹介サービス事業を主として誕生しました。<br>
								現在は【高齢者トータルサポート】【有料職業紹介】【不動産】の3つの事業を軸としてお客様の人生に寄り添う【真心】と【おもてなし】のサービスを提供しております。
								お客様と地域社会が求めるものを、お客様のパートナーとして、また地域社会のコーディネーターとして皆様に必要とされ、
								愛される企業になるために社員一丸となり日々精進致します。</p>
						</div>
					</div>
				</div><!-- // contents -->
			</section>

			<section class="contents-wrap page-section" id="company-info">
				<article class="contents">
					<div class="hgroup">
						<div class="mod-contents-header">
							<h1 class="header-title center font-designed">COMPANY INFO</h1>
							<p class="subtitle font-designed center">会社概要</p>
						</div>
					</div>
					<div class="area mbcut">
						<div class="mod-even-layout <?php echo switch_ua('eq-height','eq-height','');?>">
							<div class="layout-cont item-eq-height pic-part bg-cover" style="background-image: url(<?php bloginfo('template_url');?>/images/company-photo.jpg);"></div>
							<div class="layout-cont item-eq-height texts-part texts">
								<div class="text-inner">
									<table class="mod-table02">
										<tr>
											<th>会社名</th>
											<td><?php bloginfo('name');?></td>
										</tr>
										<tr>
											<th>本社</th>
											<td>
											<p><i class="fas fa-map-marker-alt"></i><?php echo $zip_1;?> <?php echo $address_1_a;?> <br class="sp-br"><?php echo $address_1_b;?></p>
											<p><i class="fas fa-phone"></i><?php echo $phone_num_1;?>&emsp;<i class="fas fa-fax"></i><?php echo $fax_num_1;?></p>
											</td>
										</tr>
										<tr>
											<th>営業部</th>
											<td>
											<p><i class="fas fa-map-marker-alt"></i><?php echo $zip_2;?> <?php echo $address_2_a;?></p>
											<p><i class="fas fa-phone"></i>06-4300-3823&emsp;<i class="fas fa-fax"></i>06-4300-3824</p></td>
										</tr>
										<tr>
											<th>代表者</th>
											<td>代表取締役　西村　愛未</td>
										</tr>
										<tr>
											<th>資本金</th>
											<td>1,500万円</td>
										</tr>
										<tr>
											<th>設立</th>
											<td>平成28年4月15日</td>
										</tr>
										<tr>
											<th>主な業務内容</th>
											<td>
												<ul>
													<li>高齢者トータルサポート、福祉用具相談</li>
													<li>宅地建物取引業　売買・賃貸・仲介<br>大阪府知事(2)　第61103号</li>
													<li>有料職業紹介業<br>厚生労働大臣27-ユ-302006</li>
													<li>転職、就職支援サービス</li>
													<li>整理、リサイクル事業</li>
												</ul>
											</td>
										</tr>
										<tr>
											<th>所属団体</th>
											<td>
												<ul>
													<li>公益社団法人全日本不動産協会 会員</li>
													<li>公益社団法人不動産保証協会 会員</li>
													<li>公益社団法人近畿地区不動産公正取引協議会 会員</li>
												</ul>
											</td>
										</tr>					
									</table>
								</div>
							</div>
						</div>
					</div>
				</article>
			</section>

			<!--<section class="page-section">
				<div class="contents narrow-contents">
					<div class="hgroup">
						<div class="mod-contents-header">
							<h1 class="header-title center">HISTORY</h1>
							<p class="subtitle font-designed center">沿革</p>
						</div>
					</div>
					<div class="block texts">
						<table class="mod-table02">
							<tr>
								<th>2000年4月1日</th>
								<td>株式会社設立</td>
							</tr>
							<tr>
								<th>2000年4月1日</th>
								<td>起こった出来事</td>
							</tr>
							<tr>
								<th>2000年4月1日</th>
								<td>起こった出来事</td>
							</tr>
							<tr>
								<th>2000年4月1日</th>
								<td>起こった出来事</td>
							</tr>
							<tr>
								<th>2000年4月1日</th>
								<td>起こった出来事</td>
							</tr>
							<tr>
								<th>2000年4月1日</th>
								<td>起こった出来事</td>
							</tr>
						</table>
					</div>
				</div>
			</section>-->

			<section class="page-section">
				<div class="contents"><!-- contents -->
					<div class="hgroup">
						<div class="mod-contents-header">
							<h1 class="header-title center font-designed">ACCESS MAP</h1>
							<p class="subtitle font-designed center">アクセスマップ</p>
						</div>
					</div>
					<div class="block texts">
						<div class="access-map-columns">

							<div class="mod-access-map">
								<h3 class="access-map-title">本社</h3>
								<address class="addr-text"><i class="fas fa-map-marker-alt"></i><?php echo $zip_1;?> <?php echo $address_1_a;?> <br class="sp-br"><?php echo $address_1_b;?></address>
								<div class="part map-container">
									<iframe class="gmap" width="100%" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.jp/maps?q=<?php echo $address_1_a;?>&output=embed&t=m&z=16"></iframe>
								</div>
								<p class="right"><a class="button btn-small" href="https://maps.google.co.jp/maps/search/<?php echo $address_1_a;?>" target="_blank" rel="nofollow"><i class="fas fa-map-marked-alt"></i>Google Mapで見る</a></p>
							</div>

							<div class="mod-access-map">
								<h3 class="access-map-title">営業部</h3>
								<address class="addr-text"><i class="fas fa-map-marker-alt"></i><?php echo $zip_2;?> <?php echo $address_2_a;?></address>
								<div class="part map-container">
									<iframe class="gmap" width="100%" height="450" style="border:0;" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3281.0995624250922!2d135.50462947525313!3d34.677436584461624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e73d45e1b4e5%3A0xea66fae420f0a8c1!2z44CSNTQyLTAwODEg5aSn6Ziq5bqc5aSn6Ziq5biC5Lit5aSu5Yy65Y2X6Ii55aC077yR5LiB55uu77yR77yW4oiS77yS!5e0!3m2!1sja!2sjp!4v1785108505244!5m2!1sja!2sjp"></iframe>
								</div>
								<p class="right"><a class="button btn-small" href="https://maps.google.co.jp/maps/search/<?php echo $address_2_a;?>" target="_blank" rel="nofollow"><i class="fas fa-map-marked-alt"></i>Google Mapで見る</a></p>
							</div>

						</div>
					</div>
					<!--<div class="block">
						<div class="mod-access-route">
							<div class="mod-left-right">
								<div class="left-cont texts">
									<h3 class="access-heading icon_train"><i class="fa fa-train" aria-hidden="true"></i>公共交通機関ご利用の場合</h3>
									<ul>
										<li>【JR】 この文章はダミーです、レイアウトを確認するための文章ですので意味はありません。</li>
									
									</ul>
								</div>
								<div class="right-cont texts">
									<h3 class="access-heading icon_car"><i class="fa fa-car" aria-hidden="true"></i>お車でお越しの場合</h3>
									<ul>
										<li>駐車場はございませんので、近隣のコインパーキングをご利用ください。</li>
									</ul>
								</div>
							</div>
						</div>
					</div>-->
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
