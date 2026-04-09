<?php
/**
 * single page template
 *
 * @since site theme X 10.0
 */

	// ページタイトル表示用ディレクトリ名
	define('DIR_NAME',		'個人情報保護方針');
	define('PAGE_SUBTITLE',	'PRIVACY POLICY');

	// サイドバー（不要の場合は値を空白）
	$sidebar_position	= '';

	// ヘッダーを読み込み
	get_header();

?>
		<main class="l-main">

			<section class="l-section">
				<div class="l-contents">

					<div class="l-block">
						<h1 class="u-h1">個人情報保護方針</h1>
					</div>

					<div class="l-block">
						<div class="l-part u-texts">
							<p>個人情報保護のため以下のプライバシーポリシーを定め周知徹底を図ります。</p>
						</div>
						<div class="l-part u-texts">
							<h4 class="u-h3">個人情報の適切な収集について</h4>
							<p>必要な範囲で個人情報を収集し、収集した情報はガイドラインに則り利用します。</p>
						</div>
						<div class="l-part u-texts">
							<h4 class="u-h3">個人情報の安全管理について</h4>
							<p>個人情報の漏えい･滅失･き損を防ぐため、必要かつ適切な安全管理措置を講じるとともに継続的な改善に努めます。</p>
						</div>
						<div class="l-part u-texts">
							<h4 class="u-h3">個人情報に関する法令及びその他の規範の遵守について</h4>
							<p>個人情報の取扱いについて、個人情報の保護に関する法律、その他個人情報保護関連法令を遵守します。</p>
						</div>
						<div class="l-part u-texts">
							<p>以上のプライバシーポリシーを改定することがあります。その場合の改定内容は当WEBサイトに記載いたします。</p>
						</div>
					</div>

					<div class="l-block">
						<h2 class="u-h2">WEBサイトでお客様にお伺いする情報について</h2>
						<div class="l-part u-texts">
							<p>当WEBサイトをご利用される場合、一部のコンテンツでは個人情報をお伺いする場合があります。これらは任意かつ自主的にご提供いただくものです。</p>
							<p>お伺いする情報は、お名前･メールアドレス･電話番号といったものが主なものになります。</p>
							<p>また、それ以外の質問をさせていただく場合がありますが、これは必要最低限の項目を除いて選択可能なものになっており、任意でご提供いただけるものとしています。</p>
							<p>なお、同意なしにお伺いした情報を改変することはありません。</p>
							<p>お伺いした情報は同意いただいた場合、または正当な理由がある場合を除き第三者に開示または提供しません。</p>
						</div>
					</div>

					<div class="l-block">
						<h2 class="u-h2">保障及び責任制限</h2>
						<div class="l-part u-texts">
							<p>当WEBサイトの利用は、アクセスいただいた皆様の責任において行われるものとします。</p>
							<p>また、当WEBサイトにリンクが設定されている他のウェブサイトから取得された各種情報の利用によって生じたあらゆる損害に関しては一切の責任を負うことはできません。</p>
						</div>
					</div>

					<div class="l-block">
						<h2 class="u-h2">準拠法</h2>
						<div class="l-part u-texts">
							<p>当WEBサイトは法律の異なる全世界の国々からアクセスすることが可能ですが、法律原理の違いに関わらず日本国の法律に拘束されることに同意するものとします。</p>
							<p>また当WEBサイトのコンテンツが適切であるかなどの記述や表示は一切行いません。当サイトへのアクセスは自由意志によるものとし、当サイトの利用に関しての責任はアクセスいただいた皆様にあるものとします。</p>
						</div>
					</div>

					<div class="l-block">
						<p class="u-center"><a href="<?=HOME?>" class="c-btn -huge -bc_ghost">トップページに戻る<i class="fas fa-undo-alt"></i></a></p>
					</div>

				</div>
			</section>

		</main>

		<?=get_aside()?>

<?php
	// フッター読み込み
	get_footer();
?>
