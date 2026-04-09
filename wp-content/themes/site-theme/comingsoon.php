<?php
/*--------------------------------------------------------------------------
	Template Name: comingsoon
---------------------------------------------------------------------------*/
	include ('assets/settings/site-config.php');

	// ページ説明
	$page_desc 	= true; // ページ説明を表示する場合true
//	$page_desc 	= false;
	$tw_url		= '';	// twitterページのRURL
	$fb_url		= '';	// facebookページのRURL
?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">

<!-- サイトに合わせてキーワード、紹介文、タイトルを変更 -->
	<meta name="keywords" content="<?php echo $meta_keywords;?>">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<title>Coming Soon</title>

<!-- 外部ファイル -->
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/comingsoon/style.css" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:600" rel="stylesheet">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/lib/jquery.countdown.pack.js"></script>
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

<!-- カウントダウン -->
	<script type="text/javascript">
		$(function () {
			// 例：2013年9月28日
			// "-1"は気にしなくてOK
			$('#countdown').countdown({until: new Date(2018,12 - 1, 28)});
		});
	</script>
</head>

<body>
<div id="wrapper">
	<header>
		<h1><?php bloginfo('name');?></h1>
		<h2>COMING SOON</h2>
		<p>申し訳ございませんが、このWebサイトはただいま準備中です。</p>
	</header>

	<section id="timer">
		<p>Webサイト公開まで残り:</p>
		<div id="countdown"></div>
	</section>

<!-- どんなサイトになるのか？簡単に紹介文を掲載。不要なら消去。 -->
<?php if( $page_desc == true ):?>
	<p id="about">
		<?php bloginfo('name');?>は、<?php bloginfo( 'description' ); ?><br>
		<a href="http://twitter.com/webcreatorbox">Twitter</a>や
		<a href="http://facebook.com/webcreatorbox.fb">Facebookページ</a>もチェック！
	</p>
<?php endif;?>
	<footer>
		<p>Copyright &copy; <?php echo date('Y'); ?> <?php echo $copyright;?> All Rights Reserved.</p>
	</footer>

</div><!-- /#wrapper -->
</body>
</html>