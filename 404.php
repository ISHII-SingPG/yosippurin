<?php get_header(); ?>

<main>
  <!-- メインビュー -->
  <div class="p-404">
    <div class="inner-md p-404__inner">
      <h2 class="p-404__title">404 Not Found</h2>
      <img src="<?php echo esc_url(get_theme_file_uri("/images/404/404.png")); ?>" class="p-404__img" alt="少年たちがプリンがないと慌てている様子">
      <p class="p-404__text text">
        お探しのページはURLが誤っているか、削除された可能性があります。<br>
        5秒後にTOPページに遷移します。
      </p>
      <div class="p-404__button">
        <a href="./" class="c-button">
          <span>トップへ戻る</span>
        </a> 
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>