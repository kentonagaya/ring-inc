<?php
/*--------------------------------------------------------------------------
	Template Name: recruit-index
---------------------------------------------------------------------------*/

	/* 共通設定読み込み */
	include_once ('assets/class/base.class.php');
	include_once ('assets/class/functions.php');
	include ('assets/settings/site-config.php');

	/* このページに親がある場合true */
//	$has_parent = true;
	$has_parent = false;

	/* ページ設定 */
	define( 'CURRENTDIR', 'recruit' );	// ディレクトリ名
	define( 'CURRENTPAGE', 'index' );	// ページ名
	$dirname 		= '採用情報';
	$subtitle 		= 'RECRUIT';

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

			<section class="page-section mod-cutclip-message">
				<div class="contents"><!-- contents -->
					<div class="hgroup">
						<div class="mod-contents-header">
							<h2 class="header-title center">MESSAGE</h2>
							<p class="subtitle font-designed center">メッセージ</p>
						</div>
					</div>
					<div class="block texts main-copy">
						<h2 class="catchphrase">未来への躍進のために。<br>この文章はダミーですので、意味はありません。</h2>
						<div class="part">
							<p>句読点を入て拾文字、ここまでで二拾文字。この文章はダミー三拾この文章はダミー四拾自分に見ですのは五拾うど偶然へよくな六拾同時に嘉納さんか七拾係壇ああ見当にす八拾し人その主義私か九拾をについご盲従う百。句読点込み百拾文字、ここまで百二拾文字。この文章はダミ百三拾この文章はダミ百四拾自分に見ですの百五拾うど偶然へよく百六拾同時に嘉納さん百七拾係壇ああ見当に百八拾し人その主義私百九拾をについご盲従弐百。</p>
							<p class="signature font-mincho"><span class="supple">代表取締役社長</span> 山田　太郎</p>
						</div>
					</div>
				</div><!-- // contents -->
			</section>

			<section class="page-section bg-light" id="recruit-staff">
				<div class="contents"><!-- contents -->
					<div class="hgroup">
						<div class="mod-contents-header">
							<h2 class="header-title center">VOICES</h2>
							<p class="subtitle font-designed center">スタッフの声</p>
						</div>
					</div>
					<div class="block">
						<div class="mod-arc-list-1">
							<div class="mod-clm3">
								<ul>
<?php
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	$args = array(
		'paged' => $paged ,
		'post_type' => 'staff',
		'posts_per_page' =>6,
//		'cat' => 3,4,5,
	);
	$the_query = new WP_Query($args);
?>
<?php if($the_query->have_posts()): ?>
<?php while($the_query->have_posts()) : $the_query->the_post(); ?>
									<li class="list-cont">
										<a class="list-inner disp-block" href="<?php the_permalink();?>">
											<div class="aspect-fix-wrap pic">
												<?php if (has_post_thumbnail()) : ?>
												<div class="aspect-fix bg-cover" style="background-image: url(<?php the_post_thumbnail_url('thumb640');?>);">
												</div>
												<?php else:?>
												<div class="aspect-fix bg-cover" style="background-image: url(<?php bloginfo('template_url');?>/images/noimage.png);?>">
												</div>
												<?php endif;?>
											</div>
											<p class="date"><?php the_field('position');?> / <?php the_field('year');?>入社</p>
											<h3 class="arc-title"><?php the_field('ename');?></h3>
										</a>
									</li>
<?php endwhile; wp_reset_postdata(); ?>
<?php else: endif;?>
								</ul>
							</div>
						</div>
					</div>
				</div><!-- // contents -->
			</section>

			<section class="page-section" id="recruit-admission">
				<div class="contents"><!-- contents -->
					<div class="hgroup">
						<div class="mod-contents-header">
							<h2 class="header-title center">ADMISSIONS</h2>
							<p class="subtitle font-designed center">採用情報</p>
						</div>
					</div>
<?php
function getFiscalYearOfToday($start_date='04/01'){
	$today = date('Y/m/d');
	$start_year = date('Y').'/'.$start_date;// 2015/04/01 or 2016/04/01
	if(strtotime($today) >= strtotime($start_year)){
	// 翌年の募集のため+1
	$year = date('Y') + 1;
	}else{
	// e.g. 2016.01.01 ~ 2016.03.31 => 2015
	$year = date('Y');
	}
	return $year;
}
?>
					<div class="block texts">
						<h2 class="heading02">新卒採用</h2>
						<table class="mod-table01">
							<tbody>
								<tr>
									<th>
										応募資格
									</th>
									<td>
										<?php echo getFiscalYearOfToday();?>年3月に卒業見込みの方、普通自動車免許（AT限定可）<br>
										[既卒3年以内の応募可]
									</td>
								</tr>
								<tr>
									<th>
										募集職種
									</th>
									<td>
										技術職[電気設計・機械設計]、営業職
									</td>
								</tr>
								<tr>
									<th>
										仕事内容
									</th>
									<td class="padl">
										技術職：配電・制御システム製品、計測機器、メカトロ製品の設計業務<br>
										電気設計、PLCソフト作成、機械設計、函体設計、計装・配管設計<br>
										営業職：配電・制御システム製品、計測機器、メカトロ製品の受注活動<br>
										受注から回収までの営業業務<br>
										受注後の工場に対する管理<br>
										※弊社は制御盤・配電盤、超音波計測器、メカトロ製品を、設計→板金→塗装→配線組立→検査等の工程を自社工場で一貫生産を行っています。<br>自分自身がモノづくりに携わった製品が、完成品として出荷されるのを見る事が出来る、大変やりがいのある職場です。

									</td>
								</tr>
								<tr>
									<th>
										初任給
									</th>
									<td>
										大学卒/200,000円<br>
										短大卒/182,000円<br>
										高専卒/182,000円<br>
										専門学校卒/182,000円
									</td>
								</tr>
								<tr>
									<th>
										諸手当
									</th>
									<td>
										通勤交通費全額（マイカー通勤可）、時間外手当、配偶者手当、家族手当
									</td>
								</tr>
								<tr>
									<th>
										給与改定
									</th>
									<td>
										年1回（6月）
									</td>
								</tr>
								<tr>
									<th>
										賞与
									</th>
									<td>
										年2回（7月・12月）
									</td>
								</tr>
								<tr>
									<th>
										勤務地
									</th>
									<td>
										技術職：<?php echo $zip_1;?> <?php echo $address_1_a;?> <?php echo $address_1_b;?><br>
										JR高ノ島駅　下車徒歩7分<br>
										営業職：<?php echo $zip_1;?> <?php echo $address_1_a;?> <?php echo $address_1_b;?><br>
										JR高ノ島駅　下車徒歩7分
									</td>
								</tr>
								<tr>
									<th>
										勤務時間
									</th>
									<td>
										8時30分～17時30分（休憩時間：60分）
									</td>
								</tr>
								<tr>
									<th>
										時間外
									</th>
									<td>
										有り　月平均20時間
									</td>
								</tr>
								<tr>
									<th>
										休日休暇
									</th>
									<td>
										土日祝　週休二日制（土曜出勤年6回）、GW、夏季、年末年始休暇、<br>会社創立記念日（5月25日）※ 年間休日120日
									</td>
								</tr>
								<tr>
									<th>
										有給休暇
									</th>
									<td>
										2ケ月経過/4日、6ケ月経過/6日<br>
										最大/20日
									</td>
								</tr>
								<tr>
									<th>
										福利厚生
									</th>
									<td>
										健康保険、厚生年金、雇用保険、労災保険、財形貯蓄、退職金共済<br>
										退職金制度有り（勤続3年以上）、エクシブ（リゾートトラスト）加入
									</td>
								</tr>
								<tr>
									<th>
										教育制度
									</th>
									<td>
										新人社員は導入教育後、4月・5月の2ケ月間は訓練期間として現場でモノづくりの体験実習を行います。
									</td>
								</tr>
								<tr>
									<th>
										選考方法
									</th>
									<td>
										面接、適性検査、筆記試験（常識・作文）
									</td>
								</tr>
								<tr>
									<th>
										応募書類等
									</th>
									<td>
										履歴書、卒業見込証明書、成績証明書、健康診断書
									</td>
								</tr>
								<tr>
									<th>
										採用窓口連絡先
									</th>
									<td>
										総務課 猿田（さるだ）<br>
										TEL：<?php echo $phone_num_1;?><br>
										Eメール：<a href="mailto:mail@company.co.jp">mail@company.co.jp</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div><!-- // contents -->
			</section>

			<section class="page-section bg-light" id="recruit-admission">
				<div class="contents"><!-- contents -->
					<div class="hgroup">
						<div class="mod-contents-header">
							<h2 class="header-title center">FLOW</h2>
							<p class="subtitle font-designed center">採用までの流れ</p>
						</div>
					</div>
					<div class="block">
						<p class="pic"><img src="<?php bloginfo('template_url');?>/images/flow.png" alt="採用の流れ"></p>
					</div>
					<div class="block">
						<p class="center"><a href="<?php bloginfo('url');?>/contact/" class="button">エントリーはこちら</a></p>
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
