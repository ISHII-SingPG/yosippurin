<footer class="footer">
    <div class="footer__nav-wrap">
      <nav class="footer__nav">
        <ul class="footer__items">
            <li class="footer__item">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>#<?php echo slug_about ?>" class="footer__link">
                <?php echo menu_about ?>
              </a>
            </li>
            <li class="footer__item">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>#<?php echo slug_news ?>" class="footer__link">
                <?php echo menu_news ?>
              </a>
            </li>
            <li class="footer__item">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>#<?php echo slug_commitment ?>" class="footer__link">
                <?php echo menu_commitment ?>
              </a>
            </li>
            <li class="footer__item">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>#<?php echo slug_products ?>" class="footer__link">
                <?php echo menu_products ?>
              </a>
            </li>
            <li class="footer__item">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>#<?php echo slug_access ?>" class="footer__link">
                <?php echo menu_access ?>
              </a>
            </li>
            <li class="footer__item">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>#<?php echo slug_contact ?>" class="footer__link">
                <?php echo menu_contact ?>
              </a>
            </li>
        </ul>
      </nav>
      <div class="footer__deco">
        <img src="<?php echo esc_url(get_theme_file_uri("/images/footer-deco.svg")); ?>" class="footer__deco-img" alt="プリンを手に入れて喜ぶ少年2人">
      </div>
    </div>   
    <div class="footer__content">
      <div class="footer__content-inner inner">
        <img src="<?php echo esc_url(get_theme_file_uri("/images/logo-footer.svg")); ?>" class="footer__logo" alt="フッターロゴ">
        <ul class="footer-sns__items">
          <li class="footer-menu-sns__item">
            <a href="#" class="footer-menu-sns__link">
              <i class="fa-brands fa-facebook"></i>
            </a>
          </li>
          <li class="footer-menu-sns__item">
            <a href="#" class="footer-menu-sns__link">
              <i class="fa-brands fa-x-twitter"></i>
            </a>
          </li>
          <li class="footer-menu-sns__item">
            <a href="#" class="footer-menu-sns__link">
              <i class="fa-brands fa-instagram"></i>
            </a>
          </li>
        </ul>
        <a href="<?php echo esc_url( home_url( 'privacy-policy' ) ); ?>" class="footer__privacy-policy-link">プライバシーポリシー</a>
        <samll class="footer__copyright">&copy;<?php echo wp_date("Y");?>&nbsp;yosippurin&nbsp;all&nbsp;rights&nbsp;reserved</samll>
      </div>
    </div>
  </footer>

  <?php get_template_part( 'parts/fixed-menu' ); ?>
<?php wp_footer(); ?>
</body>

</html>