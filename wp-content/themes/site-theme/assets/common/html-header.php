<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta name="author" content="<?php bloginfo('name');?>">
<?php
// META DESCRIPTION
//------------------------------------------------------------------------------
if( $page_meta_d !== '' ) {?>
<meta name="description" content="<?php echo $page_meta_d;?>">
<?php } else { ?>
<meta name="description" content="<?php bloginfo( 'description' ); ?>">
<?php };?>
<?php
// META OG
//------------------------------------------------------------------------------?>
<meta property="og:locale" content="ja_JP">
<meta property="og:site_name" content="<?php bloginfo('name');?>">
<?php if( is_front_page() ):?>
<meta property="og:title" content="<?php bloginfo('name');?>">
<?php else:?>
<meta property="og:title" content="<?php the_title();?>">
<?php endif;?>
<meta property="og:type" content="website">
<meta property="og:url" content="<?php bloginfo('url'); ?>/">
<meta property="og:image" content="<?php bloginfo('template_url'); ?>/images/og_img.jpg" />
<?php if( $fb_appID !== '' ) {?>
<meta property='fb:app_id' content='<?php echo $fb_appID;?>'>
<?php };?>
<?php if( $page_meta_d !== '' ) {?>
<meta property="og:description" content="<?php echo $page_meta_d;?>">
<?php } else { ?>
<meta property="og:description" content="<?php bloginfo( 'description' ); ?>">
<?php };?>
<meta name="format-detection" content="telephone=no,address=no,email=no">
<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/images/favicons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url'); ?>/images/favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url'); ?>/images/favicons/favicon-16x16.png">
<link rel="manifest" href="<?php bloginfo('template_url'); ?>/images/favicons/site.webmanifest">
<link rel="mask-icon" href="<?php bloginfo('template_url'); ?>/images/favicons/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="<?php echo $site_theme_color;?>">
<meta name="theme-color" content="<?php echo $site_theme_color;?>">
<?php
// 公開時以外はGOOGLEにINDEXしない
//------------------------------------------------------------------------------
	if( $status !== 'released' ):
?>
<meta name="robots" content="noindex,nofollow,noarchive">
<?php endif;?>
<?php
if( CURRENTDIR == 'top' and $page_org_title == '' ) {
	// トップページでオリジナルタイトルなし
	echo "<title>".get_bloginfo('name')."</title>";
} elseif ( CURRENTDIR == 'top' and $page_org_title !== '' ) {
	// トップページでオリジナルタイトルあり
	echo "<title>".$page_org_title."</title>";
} elseif( is_single() ){
	// シングルページ
	echo "<title>".get_the_title()." | ".$dirname." | ".get_bloginfo('name')."</title>";
} elseif( is_category() or is_tax() ) {
	// カテゴリー一覧、あるいはタクソノミー一覧ページ
	echo "<title>[".single_tag_title( '', false )."]の一覧 | ".$dirname." | ".get_bloginfo('name')."</title>";
} elseif( $has_parent == true and $page_org_title == '' ){
	// 固定ページ：親ページがある場合で、オリジナルタイトルなし
	echo "<title>".get_the_title()." | ".$dirname." | ".get_bloginfo('name')."</title>";
} elseif( $has_parent == true and $page_org_title !== '' ){
	// 固定ページ：親ページがある場合で、オリジナルタイトルあり
	echo "<title>".$page_org_title." | ".$dirname." | ".get_bloginfo('name')."</title>";
} elseif( $page_org_title == '' ){
	// 固定ページ：オリジナルタイトルなし
	echo "<title>".get_the_title()." | ".get_bloginfo('name')."</title>";
} elseif( $page_org_title !== '' ){
	// 固定ページ：オリジナルタイトルあり
	echo "<title>".$page_org_title." | ".get_bloginfo('name')."</title>";
} else {
	// 上記以外の場合
	echo "<title>".get_the_title()." | ".get_bloginfo('name')."</title>";
}
?>
<?php echo $css;?>
<?php //wp_deregister_script('jquery'); // WPのjqueryとの競合回避 ?>
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/lib/drawer.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/lib/fontawesome/css/all.min.css">
<script src="https://kit.fontawesome.com/20d944a9b2.js" crossorigin="anonymous"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/base.js"></script>
<?php if( $layout == 'has-side' && $side_fix == true && is_pc()|is_tb() ) {?>
<script src="<?php bloginfo('template_url'); ?>/js/lib/jquery.frix.min.js"></script>
<script>
	$(document).ready( function() { $("#aside").frix(); });
</script>
<?php };?>
<?php if( is_sp() ){ ?>
<script src="<?php bloginfo('template_url'); ?>/js/lib/jquery.drawer.min.js"></script>
<?php };?>
<?php echo $js;?>
<?php
// GOOGLE ANALYTICS
//------------------------------------------------------------------------------?>
<?php if( $status == 'released' ) {?>
<?php include_once ( get_template_directory() .'/assets/settings/ga.php' );?>
<?php };?>
<?php if( $page_org_tag !== '' ) {?>
<?php echo $page_org_tag."\n";?>
<?php };?>
</head>
