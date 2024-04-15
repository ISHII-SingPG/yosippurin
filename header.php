<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php if (is_404()) : ?>
      <meta http-equiv="refresh" content=" 5; url=<?php echo esc_url(home_url("")); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="header js-header">
      <div class="header__inner">
        <div class="header__title">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header__title-link">
            <img src="<?php echo esc_url(get_theme_file_uri("/images/logo-header.svg")); ?>"  class="header__logo" alt="ヘッダーロゴ">
          </a>
        </div>
        <nav class="header__nav md-none">
          <ul class="header__items">
              <li class="header__item">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>#<?php echo slug_about ?>" class="header__link">
                  <?php echo menu_about ?>
                </a>
              </li>
              <li class="header__item">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>#<?php echo slug_news ?>" class="header__link">
                  <?php echo menu_news ?>
                </a>
              </li>
              <li class="header__item">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>#<?php echo slug_commitment ?>" class="header__link">
                  <?php echo menu_commitment ?>
                </a>
              </li>
              <li class="header__item">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>#<?php echo slug_products ?>" class="header__link">
                  <?php echo menu_products ?>
                </a>
              </li>
              <li class="header__item">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>#<?php echo slug_access ?>" class="header__link">
                  <?php echo menu_access ?>
                </a>
              </li>
              <li class="header__item">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>#<?php echo slug_contact ?>" class="header__link">
                  <?php echo menu_contact ?>
                </a>
              </li>
          </ul>
        </nav>
      </div>

      <!-- ハンバーガーメニュー -->
      <div class="hamburger js-hamburger md-show" role="button" aria-expanded="false" aria-controls="drawer-menu">
        <span class="hamburger__line"></span>
        <span class="hamburger__line"></span>
        <span class="hamburger__line"></span>
      </div>

      <!-- ドロワーメニュー -->
      <nav class="drawer-menu js-drawer" id="drawer-menu" role="navigation" aria-hidden="true"> 
        <div class="drawer-menu__inner">
          <img src="<?php echo esc_url(get_theme_file_uri("/images/logo-footer.svg")); ?>"  class="drawer-menu__logo" alt="ロゴ">
          <ul class="drawer-menu__items">
            <li class="drawer-menu__item">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>#<?php echo slug_about ?>" class="drawer-menu__link">
                <?php echo menu_about ?>
              </a>
            </li>
            <li class="drawer-menu__item">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>#<?php echo slug_news ?>" class="drawer-menu__link">
                <?php echo menu_news ?>
              </a>
            </li>
            <li class="drawer-menu__item">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>#<?php echo slug_commitment ?>" class="drawer-menu__link">
                <?php echo menu_commitment ?>
              </a>
            </li>
            <li class="drawer-menu__item">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>#<?php echo slug_products ?>" class="drawer-menu__link">
                <?php echo menu_products ?>
              </a>
            </li>
            <li class="drawer-menu__item">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>#<?php echo slug_access ?>" class="drawer-menu__link">
                <?php echo menu_access ?>
              </a>
            </li>
            <li class="drawer-menu__item">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>#<?php echo slug_contact ?>" class="drawer-menu__link">
                <?php echo menu_contact ?>
              </a>
            </li>
          </ul>
          <a href="shop.html" class="drawer-menu__shop-button">オンラインショップはこちら</a>
          <ul class="drawer-menu-sns__items">
            <li class="drawer-menu-sns__item">
              <a href="#" class="drawer-menu-sns__link">
                <i class="fa-brands fa-facebook"></i>
              </a>
            </li>
            <li class="drawer-menu-sns__item">
              <a href="#" class="drawer-menu-sns__link">
                <i class="fa-brands fa-x-twitter"></i>
              </a>
            </li>
            <li class="drawer-menu-sns__item">
              <a href="#" class="drawer-menu-sns__link">
                <i class="fa-brands fa-instagram"></i>
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="circle-bg"></div>
  </header>