<!DOCTYPE html>
<html lang="ja" prefix="og: https://ogp.me/ns#">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">

	<title>TF-30</title>
	<meta name="description" content="">

	<meta property="og:title" content="TF-30">
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://example.com/">
	<meta property="og:image" content="https://example.com/img/ogp.png">
	<meta property="og:site_name" content="TF-30">
	<meta property="og:description" content="">
	<meta name="twitter:card" content="summary_large_image">

	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css?ver=5.8.2">
	<link rel="stylesheet" href="./css/style.css"> -->
  <?php wp_head(); ?><!-- ↑2行を←に置き換える -->

	<link rel="icon" href="./img/icon-home.png">

</head>

<body>

	<!-- header -->
	<header id="header">
		<div class="inner">

			<!-- トップページのとき -->
			<?php if ( is_home() || is_front_page() ) : ?>
				<!-- h1 -->
				<h1 class="header-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1><!-- /header-logo -->
			<?php else : ?>
				<!-- div -->
				<div class="header-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></div><!-- /header-logo -->
			<?php endif; ?>
			<!-- ブログの description を表示 -->
			<div class="header-sub"><?php bloginfo( 'description' ); ?></div><!-- /header-sub -->

			<!-- drawer -->
			<div class="drawer">
				<div class="drawer-icon">
					<span class="drawer-open"><i class="fas fa-bars"></i></span><!-- /drawer-open -->
					<span class="drawer-close"><i class="fas fa-times"></i></span><!-- drawer-close -->
				</div><!-- /drawer-icon -->

				<!-- drawer-content -->
				<div class="drawer-content">
					<!-- スマホ用メニューを動的に表示する -->
					<?php
						wp_nav_menu(
							array(
								'container'       => 'nav',// メニューを囲むコンテナタグ(div,nav,false)
								'container_class' => 'drawer-nav',// メニューを囲むコンテナクラス名
								'menu_class'      => 'drawer-list',// メニューを構成するul要素に適用されるクラス名
								'depth'           => 1,
								'theme_location'  => 'drawer',
							)
						);

						?>
				</div><!-- /drawer-content -->
			</div><!-- /drawer -->

		</div><!-- /inner -->
	</header><!-- /header -->

	<!-- header-nav -->
	<nav class="header-nav">
		<div class="inner">
			<!-- PC用メニューを動的に表示する -->
			<?php
				wp_nav_menu(
					array(
						'container'      => false,
						'menu_class'     => 'header-list',
						'depth'          => 1,
						'theme_location' => 'global',
					)
				);
				?>
		</div><!-- /inner -->
	</nav><!-- header-nav -->
