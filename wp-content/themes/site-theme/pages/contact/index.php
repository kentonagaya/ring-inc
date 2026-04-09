<?php
/**
 * page template
 *
 * @since site theme X 10.0
 */

	// ページタイトル表示用ディレクトリ名
	define('DIR_NAME',		'お問い合わせ');
	define('PAGE_SUBTITLE',	'CONTACT');

	// サイドバー（不要の場合は値を空白）
	$sidebar_position	= '';

	require ( THEMEPATH.'pages/'.get_currentdir_slug().'/form-settings.php' );

	// ヘッダーを読み込み
	get_header();
?>

		<main class="l-main">

			<section class="l-section" id="section_form">
				<div class="l-contents"><!-- contents -->

<?php if( $step !== 'confirm' ):?>
					<div class="l-block">
						<div class="u-part u-texts u-center">
							<p>ご不明な点などございましたら、下記フォームより何でもお気軽にお問合せ下さい。<br>追ってご連絡いたしますので宜しくお願いいたします。</p>
						</div>
					</div>

					<div class="l-block">
						<div class="u-part">

							<div class="p-form_contacts">
								<div class="_pc">
									<p class="_telnum t-font_1 u-fa_before"><i class="fas fa-phone"></i><?=PHONE?></p>
									<p><i class="far u-fa_before"></i>営業時間 <?=OPEN_TIME?><?=CLOSE_DAY?></p>
								</div>
								<div class="_sp">
									<p><a class="c-btn -bc_ghost" href="<?=HOME?>privacy/">個人情報保護方針</a></p>
									<p><a class="c-btn t-font_1 u-fa_before" href="tel:<?=PHONE?>"><i class="fas fa-phone"></i><?=PHONE?></a></p>
								</div>
							</div>

						</div>
					</div>
<?php else:?>
					<div class="l-block">
						<div class="u-part u-texts u-center">
							<p>入力内容をご確認いただき、よろしければ送信ボタンをクリックしてください。</p>
						</div>
					</div>
<?php endif;?>

<?php
	if( $step !== 'confirm' ){
		$heading = 'お問い合わせフォーム';
	} else {
		$heading = '送信内容のご確認';
	}
?>
<?php
	// フォームパーツの読み込み
	include_once ( THEMEPATH.'inc/mailform/form-parts-normal.php');
?>

				</div><!-- // contents -->
			</section>


		</main>

		<?=get_aside()?>

<?php
	// フッターを読み込み
	get_footer();
?>