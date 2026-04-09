<?php
/*--------------------------------------------------------------------------
	Template Name: error-404
---------------------------------------------------------------------------*/

	/* 共通設定読み込み */
	include_once ('assets/class/base.class.php');
	include_once ('assets/class/functions.php');
	include ('assets/settings/site-config.php');

	/* このページに親がある場合true */
	$has_parent = true;
//	$has_parent = false;

	/* ページ設定 */
	define( 'CURRENTDIR', 'error' );	// ディレクトリ名
	define( 'CURRENTPAGE', '404' );	// ページ名
	$dirname 		= 'ページが見つかりません';
	$subtitle 		= 'Sorry, the file cannnot be found.';

	/* ページ専用CSS */
	$css = '';

	/* ページ専用JS */
	$js = '';

	/* ページ専用SEO */
	$page_org_title	= '';
	$page_meta_d	= '';
	$page_meta_k	= '';

	// レイアウト個別指定
	$layout			= 'one-column';
//	$layout			= 'has-side';

	# header読み込み
	include ("assets/common/html-header.php");
	get_header();

?>
	<section class="title-wrap <?php if ( $header_fix == true ) { echo "header-fix"; };?> <?php if( $header_type == 'standard' ){ echo 'has-gnav'; };?>">

		<div class="mod-title-standard bg-cover">
			<div class="title flex-center">
				<div class="mod-contents-header">
					<h1 class="header-title center"><?php echo $dirname;?></h1>
					<p class="subtitle font-designed center"><?php echo $subtitle;?></p>
				</div>
			</div>
		</div>

	</section><!-- // title-wrap -->

	<div class="contents-wrap <?php echo $layout;?>"><!-- contents-wrap -->

		<main>

			<section class="page-section">
				<div class="contents"><!-- contents -->

					<div class="hgroup">
						<h1 class="heading03 center">お探しのページは表示できませんでした</h1>
					</div>
					<div class="block">
						<script>
							<!--
								setTimeout("location.href='<?php bloginfo('url');?>/<?php echo $top_dir;?>'",1000*10);
							//-->
							</script>
						<div class="part texts">
							<div class="mod-404-error">
								<p class="icon-error center"><i class="far fa-sad-tear"></i></p>
								<p class="center">申し訳ありませんが、あなたがアクセスしようとしたページは見つかりませんでした。<br>お探しのページは削除または移動された可能性があります。<br>または、ご指定のURLが誤っていた可能性があります。</p>
								<p class="center">約10秒でトップページに移動します(移動しない場合は下記ボタンをクリックしてください)。</p>
							</div>
						</div>
					</div>
					<div class="block">
						<div class="part">
							<p class="center"><a class="button" href="<?php bloginfo('url');?>/<?php echo $top_dir;?>">TOPページに戻る</a></p>
						</div>
					</div>


				</div><!-- // contents -->

			</section>

		</main>

	</div><!-- // contents-wrap -->

<?php get_footer();?>