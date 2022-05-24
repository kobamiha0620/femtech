<!DOCTYPE html>
<!--htmlで書かれていることを宣言-->
<html lang="ja">
<!--日本語のサイトであることを指定-->

<head>
	<meta charset="utf-8">
	<!--エンコードがUTF-8であることを指定-->

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--viewportの設定-->

	<!--スタイルシートの呼び出し-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
		integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<!--font-awesomeのスタイルシートの呼び出し-->

	  <!-- </div>end container -->

	  <!-- TOPページのみ -->
	  <?php if ( is_home() || is_front_page() ) : ?>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick-theme.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/top.css" media="screen" />
		<?php endif; ?>


	<!--システム・プラグイン用-->
	<?php wp_head(); ?>

</head>

<body <?php body_class( ['drawer', 'drawer--left'] ) ; ?> style="background-color:#FFF; ">   
	<header id="header">
		<!-- ヘッダーここから -->
		<div class="newHeader__inner">
			<!-- ナビゲーションの中身 -->
			<nav class="drawer-nav newHeader__drawer" role="navigation">
				<div class="newHeader__drawer--inner">
					<!-- メニューの読み込み -->
					<?php wp_nav_menu( array(
						'theme_location' => 'top_menu',
						'menu' => 'メイン',
						'menu_class' => 'drawer-menu',
						'depth' => 1
					));
					?>

				<button type="button" class="drawer-toggle drawer-hamburger" id="navopen">
					<div class="hamburger" style="position: relative;">
						<span class="hamburger__line hamburger__line--1"></span>
						<span class="hamburger__line hamburger__line--2"></span>
						<span class="hamburger__line hamburger__line--3"></span>
					</div>
				</button>

				<ul class="newHeader__drawer--sns">
				<li><a href="https://www.instagram.com/femtechtv_official/" target="_blank" class="newHeader__drawer--snsin">Instagram</a></li>

					<li><a href="https://www.tiktok.com/@femtechtv_official" target="_blank" class="newHeader__drawer--snstk">Tiktok</a></li>
					<li><a href="https://twitter.com/femtechtv_" target="_blank" class="newHeader__drawer--snstw">Twitter</a></li>
				</ul>

				<div class="newHeader__drawer--about">
					<figure class="logo"></figure>
					<p>生理、PMS、セクシャルな問題など自分のカラダについて、たった1人で悩んでいる皆さんへ。大切なのは、「知る」「共有する」こと。このフェムテックtvは、自分のカラダについての“知らなかった”をなくすためのフェムテック情報共有サイトです。毎日をイキイキと、自分らしく過ごすために。正しい情報を知って、話して、整える輪を広め、悩める女性がいなくなる世の中を目指します。</p>
				</div>
				
				<div class="newHeader__drawer--doctor">
					<p class="newHeader__drawer--doctor-ttl">Doctor</p>
					<div class="newHeader__drawer--doctor-intro">
						<div class="newHeader__drawer--doctor-introimg">池田先生</div>
						<p class="newHeader__drawer--doctor-name">池田 裕美枝 （いけだ ゆみえ）</p>
					</div>
					<div class="newHeader__drawer--doctor-resume"> 
					<p>・医師（京都大学大学院医学研究科社会健康医学系専攻健康情報学分野博士課程）</p>
					<p>・NPO法人女性医療ネットワーク副理事長</p>
					<p>・京都大学リプロダクティブヘルス＆ライツライトユニット代表</p>
					<p>・ソーシャルワークプラットフォームKYOTO SCOPE事務局代表</p>
					</div>
					<p class="newHeader__drawer--doctor-txt">京都大学医学部卒業後、産婦人科として勤務。現在、博士課程にて女性の社会的孤立や月経前症候群による社会的インパクトなどを研究している。</p>
				</div>

				<ul class="newHeader__drawer--otherlink">
					<li><a href="/company-information/">会社概要</a></li>
					<li><a href="/ad/">メディア関係者・取材依頼</a></li>
					<li><a href="/privacy/">プライバシーポリシー</a></li>
					<li><a href="/contact-us/">お問い合わせ</a></li>
				</ul>

				</div>
			</nav>
			<!-- /ナビゲーションの中身 -->

			<div class="spNav">
				<section class="newHeader__spnav">
					<div class="sp">
					<button type="button" class="drawer-toggle drawer-hamburger" id="navSpclose">
						<div class="hamburger" style="position: relative;">
							<span class="hamburger__line hamburger__line--1"></span>
							<span class="hamburger__line hamburger__line--2"></span>
							<span class="hamburger__line hamburger__line--3"></span>
						</div>
					</button>
					</div>
					<p class="newHeader__logo" id="js-logo"><a href="/">フェムテックtv</a></p>
					<div class="sp">
						<a class="newHeader__spnav--search" id="js-searchBtn">検索</a>	
					</div>

				</section>

				<div class="newHeader__wrapper" id="js-newHeader">

					<div class="newHeader__contents">
						<div class="newHeader__contents--right">
							<!-- ハンバーガーボタン -->
							<button type="button" class="drawer-toggle drawer-hamburger" id="navclose">
								<div class="hamburger" style="position: relative;">
									<span class="hamburger__line hamburger__line--1"></span>
									<span class="hamburger__line hamburger__line--2"></span>
									<span class="hamburger__line hamburger__line--3"></span>
								</div>
							</button>
							
							<div class="newHeader__cate--wrapper">
								<!--ヘッダーメニュー-->
								<?php wp_nav_menu( array(
								'theme_location' => 'top_menu',
								'menu' => 'メイン',
								'container' => 'nav',
								'depth' => 1,
								'container_class' => 'newHeader__cate',
								'container_id' => 'newHeader__cate'
							) ); ?>
							</div>

						</div>

						<!-- 検索窓 -->
						<div class="pc">

						<button id="js-search" class="newHeader__pcbtn"></button>

						<div class="newHeader__search--blc" id="js-pcsearchblc">
						<div class="newHeader__search">
							<?php get_template_part('template_parts/search'); ?>

						</div>
						</div>

					</div>


					</div>

				</div>
			</div>

			<!--end header-inner-->
			<!-- ヘッダーここまで -->


		</div>

	</header>


	<div class="sp">
	   <div class="search__bg hide" id="js-searchBg">
			<div class="search__blc"> 
				<?php get_template_part('template_parts/search'); ?>	
			</div>
		</div>

	</div>

	<!-- padding調整 -->
	<div class="adjpadding"></div>
	<!-- padding調整 -->


	<div class="container__wrapper">

