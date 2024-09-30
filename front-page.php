<?php get_header(); ?>

<main>
   <!-- メインビュー -->
   <div class="mv">
      <div class="mv__inner slider__fv">
        <div class="mv__slider swiper js-swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <picture>
                <source srcset="<?php echo esc_url(get_theme_file_uri("/images/pc-top-slider1.webp")); ?>" media="(min-width:1024px)">
                <img src="<?php echo esc_url(get_theme_file_uri("/images/sp-top-slider1.webp")); ?>" alt="よしっプリンの写真">
              </picture>
            </div>
            <div class="swiper-slide">
              <picture>
                <source srcset="<?php echo esc_url(get_theme_file_uri("/images/pc-top-slider2.webp")); ?>" media="(min-width:1024px)">
                <img src="<?php echo esc_url(get_theme_file_uri("/images/sp-top-slider2.webp")); ?>" alt="卵と一緒に移るよしっプリンの写真">
              </picture>
            </div>
            <div class="swiper-slide">
              <picture>
                <source srcset="<?php echo esc_url(get_theme_file_uri("/images/pc-top-slider3.webp")); ?>" media="(min-width:1024px)">
                <img src="<?php echo esc_url(get_theme_file_uri("/images/sp-top-slider3.webp")); ?>" alt="上から見たよしっプリンの写真">
              </picture>
            </div>
          </div>
        </div>
        <div class="mv__title-wrap">
          <h1 class="mv__catch-text">
            一口食べれば<br>
            童心に戻れる<br>
            よしっプリン<br>
          </h1>
          <div class="mv__deco">
            <img src="<?php echo esc_url(get_theme_file_uri("/images/top-fv-deco.svg")); ?>" class="mv__deco-img" alt="喜んでいる少年2人のイラスト">
          </div>          
        </div>
      </div>
    </div>

    <!-- About -->
    <section id="about" class="about">
      <?php echo get_heading_title(menu_about, slug_about); ?>
      <div class="about__inner inner">
        <div class="about__img-left">
          <img src="<?php echo esc_url(get_theme_file_uri("/images/top-about-img-left.jpg")); ?>" class="about__img" alt="瓶プリンからスプーンで一口とる様子">
        </div>
        <div class="about__body">
          <p class="about__text text">
            よしっプリンは、創業者「石井 よしまさ」が、<br>「子供の時におやつの時間に食べた気持ちになれる！食べるだけで気持ちが若返る」<br>をコンセプトにお菓子作りが始まりました。
          </p>
          <p class="about__text text">
              卵は日本各地から厳選して、<br>プリンの種類ごとに合うものを使用しています。使用する牛乳も、パティシエが日本全国の牧場に足を運んで牛とコミニケーションをとることからプリンに合う牛乳を選びました。
          </p>
          <p class="about__text text">
            昔懐かしい感じだけど、<br>まったりとした極上の味わいをお楽しみください。
          </p>
        </div>
        <div class="about__img-right">
          <picture>
            <source srcset="<?php echo esc_url(get_theme_file_uri("/images/top-about-img-right-pc_0401.jpg")); ?>" media="(min-width:769px)">
            <img src="<?php echo esc_url(get_theme_file_uri("/images/top-about-img-right-sp_0401.jpg")); ?>" class="about__img" alt="創業者「石井 よしまさ」がプリンを作っている様子">
          </picture>
        </div>
      </div>
        <div class="about__movie">
          <div class="video-wrapper">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/OXbYYmSkapM?si=Qh0d__LA-KPj-IVe" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          </div>
      </div>
    </section>
    <!-- News -->
    <section id="news" class="top-news">
      <?php echo get_heading_title(menu_news, slug_news); ?>
      <div class="news__inner">
        <?php
            $args = array(
                "post_type" => "news",
                "posts_per_page" => 3
            );
            $the_query = new WP_Query($args);
        ?>
        <?php if ($the_query->have_posts()) : ?>
        <div class="news__posts">
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
              <?php get_template_part( 'parts/content-news' ); ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p><?php echo msg_post_not_found ?></p>
            <?php endif; ?>
        </div>
        <div class="top-news__readmore">
          <a href="<?php echo esc_url(home_url('news')); ?>" class="top-news__readmore c-button">
            <span>一覧を見る</span>
          </a> 
        </div>
    </div>
  </section>
  <div class="top-news__bottom"></div>

  <!-- Commitment -->
  <section id="commitment" class="commitment">
    <?php echo get_heading_title(menu_commitment, slug_commitment); ?>
    <div class="commitment__item">
      <picture>
        <source srcset="<?php echo esc_url(get_theme_file_uri("/images/commitment-01-1.svg")); ?>" media="(min-width:769px)">
          <img src="<?php echo esc_url(get_theme_file_uri("/images/commitment-01-1-sp.svg")); ?>" class="commitment__img-left1 fade-left-trigger" alt="牛乳">
      </picture>
      <picture>
        <source srcset="<?php echo esc_url(get_theme_file_uri("/images/commitment-01-2.svg")); ?>" media="(min-width:769px)">
          <img src="<?php echo esc_url(get_theme_file_uri("/images/commitment-01-2-sp.svg")); ?>" class="commitment__img-left2 fade-left-trigger delay-time02" alt="砂糖">
      </picture>
        <picture>
        <source srcset="<?php echo esc_url(get_theme_file_uri("/images/commitment-01-3.svg")); ?>" media="(min-width:769px)">
          <img src="<?php echo esc_url(get_theme_file_uri("/images/commitment-01-3-sp.svg")); ?>" class="commitment__img-right1 fade-right-trigger delay-time04" alt="卵">
      </picture>
      <div class="commitment__inner-01 inner-md">
        <h3 class="commitment__title"><span class="commitment__title-no">01</span>厳選された素材</h3>
        <div class="commitment__body">
          <p class="commitment__text text">
            よしっプリンでは、厳選された新鮮な素材のみを使用しています。<br>
            基本的には卵は栃木県の東神宮寺で作られた国松卵を使用、<br>
            のどごしが良くて自然な味わいで有名な北海道の鳴竹牧場でとれたチェーリー牛乳を使用していますが、プリンの種類によっては、
  素材を全国から厳選してカスタマイズしております。
          </p>
        </div>
      </div>
    </div>
    <div class="commitment__item-top"></div>
    <div class="commitment__item commitment__item--beige">
      <div class="commitment__inner-02 inner-md">
        <h3 class="commitment__title"><span class="commitment__title-no">02</span>自家製キャラメルソース</h3>
        <div class="commitment__body commitment__body--2col">
          <p class="commitment__text text">
            よしっプリンの自慢は、自家製キャラメルソースの贅沢なコクと風味です。<br>
ほどよい甘さと深い味わいが特徴で、プリンとの相性も抜群です！<br>
お客様からキャラメルソースだけ食べたいというお声も頂いております。
          </p>
          <img src="<?php echo esc_url(get_theme_file_uri("/images/commitment-02.svg")); ?>" class="commitment__img-even fade-downup-trigger" alt="キャラメルソース">            
        </div>
      </div>
    </div>
    <div class="commitment__item-bottom"></div>
    <div class="commitment__item">
        <picture>
        <source srcset="<?php echo esc_url(get_theme_file_uri("/images/commitment-03-1.svg")); ?>" media="(min-width:461px)">
          <img src="<?php echo esc_url(get_theme_file_uri("/images/commitment-03-1-sp.svg")); ?>" class="commitment03__img-left1 fade-left-trigger" alt="いちごプリン">
      </picture>
      <picture>
        <source srcset="<?php echo esc_url(get_theme_file_uri("/images/commitment-03-2.svg")); ?>" media="(min-width:461px)">
          <img src="<?php echo esc_url(get_theme_file_uri("/images/commitment-03-2-sp.svg")); ?>" class="commitment03__img-right1 fade-right-trigger delay-time02" alt="マンゴープリン">
      </picture>
      <div class="commitment__inner-03 inner-md">
        <h3 class="commitment__title"><span class="commitment__title-no">03</span>季節の味わいを楽しむ</h3>
        <div class="commitment__body">
          <p class="commitment__text text">
            季節ごとに変わる旬の素材を活かしたプリンもご用意しています。<br>
春は桜、夏はマンゴー、秋はさつまいも、冬はイチゴのように季節の味わいを楽しみながら、より豊かなプリンの世界をご堪能ください。
          </p>
        </div>
      </div>
    </div>

    <div class="commitment__item-top commitment__item-top--yellow"></div>
    <div class="commitment__item commitment__item--yellow">
      <div class="commitment__inner-04 inner-md">
        <h3 class="commitment__title"><span class="commitment__title-no">04</span>温度管理を徹底</h3>
        <div class="commitment__body commitment__body--2col">
          <p class="commitment__text text">
            なめらかなプリンを作るためには、適切な温度管理が重要です。<br>
季節によって差があるため、当店ではなめらかさが変わらないように仕込み後の調温や、型に流した後の温度、季節によるオーブン予熱の設定温度、湯煎の温度を徹底することで、1年中変わらないなめらかプリンを提供することができております。
          </p>
          <img src="<?php echo esc_url(get_theme_file_uri("/images/commitment-04.svg")); ?>" class="commitment__img-even fade-downup-trigger" alt="スプーンからたれそうななめらかなプリン">            
        </div>
      </div>
    </div>
    <div class="commitment__item-bottom commitment__item-bottom--yellow"></div>

    <div class="commitment__item">
      <div class="commitment__img-05-lg-none">
        <img src="<?php echo esc_url(get_theme_file_uri("/images/commitment-05-1_2.svg")); ?>" class="commitment05__img-left1 fade-left-trigger" alt="プリンの製造工程、卵を混ぜている様子">
        <img src="<?php echo esc_url(get_theme_file_uri("/images/commitment-05-2_2.svg")); ?>" class="commitment05__img-right1 fade-right-trigger delay-time02" alt="プリンの製造工程、クリームを混ぜている様子">
        <img src="<?php echo esc_url(get_theme_file_uri("/images/commitment-05-3_2.svg")); ?>" class="commitment05__img-center fade-downup-trigger delay-time04" alt="瓶プリンにプリン液を入れる様子">
      </div>
      <div class="commitment__inner-05 inner-md">
        <h3 class="commitment__title"><span class="commitment__title-no">05</span>想いを込めて一つ一つ手作り</h3>
        <div class="commitment__body">
          <p class="commitment__text text">
            創業者「石井 よしまさ」がプリンをこよなく愛する男だからこそ、当店のプリンは手作りで丁寧に作ることにこだわっています。<br>
「食べた瞬間にお客様が1秒でも笑顔になってほしい！」そういった想いで一つひとつ丁寧に仕上げられた味わいをお届けします。<br>
          </p>
          <div class="commitment__img-05-lg-show">
            <div class="commitment__img-05-left">
              <img src="<?php echo esc_url(get_theme_file_uri("/images/commitment-05-1.png")); ?>" class="commitment__img-05-left1 fade-downup-trigger delay-time04" alt="瓶プリンにプリン液を入れる様子">
            </div>
            <div class="commitment__img-05-right">
              <img src="<?php echo esc_url(get_theme_file_uri("/images/commitment-05-2.png")); ?>" class="commitment__img-05-right1 fade-left-trigger" alt="プリンの製造工程、卵を混ぜている様子">
              <img src="<?php echo esc_url(get_theme_file_uri("/images/commitment-05-3.png")); ?>" class="commitment__img-05-right2 fade-right-trigger delay-time02" alt="プリンの製造工程、クリームを混ぜている様子">             
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

    <!-- Products -->
    <section id="products" class="top-products">
      <?php echo get_heading_title(menu_products, slug_products); ?>
      <div class="top-products__inner js-slider__products">
        <div class="swiper">
            <?php
                $args = array(
                    "post_type" => "products",
                    "posts_per_page" => -1
                );
                $the_query = new WP_Query($args);
            ?>
            <?php if ($the_query->have_posts()) : ?>
              <div class="swiper-wrapper top-products__cards">
                  <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                      <div class="swiper-slide products__card card">
                        <?php get_template_part( 'parts/content-products' ); ?>
                      </div>
                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
              <?php endif; ?>              
          </div>
        </div> 
        <div class="top-products__readmore">
          <a href="<?php echo esc_url(home_url('products')); ?>" class="c-button">
            <span>一覧を見る</span>
          </a> 
        </div>
      </div>
    </section>

    <!-- アクセス -->
    <section id="access" class="access">
      <div class="access__inner">
        <?php echo get_heading_title(menu_access, slug_access); ?>
        <img src="<?php echo esc_url(get_theme_file_uri("/images/shop-outside.jpg")); ?>" class="access__shop md-show" alt="店舗外観の写真">
        <div class="access__map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6489.885632377214!2d139.36732683800744!3d35.57980321495444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018fd66e2bb82b7%3A0xde7e89fae61c5757!2z44CSMjUyLTAyMzEg56We5aWI5bed55yM55u45qih5Y6f5biC5Lit5aSu5Yy655u45qih5Y6f77yU5LiB55uu77yS!5e0!3m2!1sja!2sjp!4v1711292314630!5m2!1sja!2sjp" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <dl class="access__items">
            <div class="access__item">
              <dt class="access__item-label">店舗名</dt>
              <dd class="access__item-value"><?php the_field("shop-name"); ?></dd>
            </div>
            <div class="access__item">
              <dt class="access__item-label">住所</dt>
              <dd class="access__item-value"><?php the_field("shop-address"); ?></dd>
            </div>
            <div class="access__item">
              <?php 
              // カスタムフィールドから取得した日付の値
              $date_start = get_post_meta(get_the_ID(), 'shop-start-time', true);
              $date_end = get_post_meta(get_the_ID(), 'shop-end-time', true);
              
              // am/pmを削除して日付を整形
              $start_time = date('H:i', strtotime($date_start));
              $end_time = date('H:i', strtotime($date_end));
              ?>
              <dt class="access__item-label">営業時間</dt>
              <dd class="access__item-value"><?php echo $start_time . '～' . $end_time ?>（無くなり次第終了いたします）</dd>
            </div>
            <div class="access__item">
              <dt class="access__item-label">電話番号</dt>
              <dd class="access__item-value"><?php the_field("shop-tel"); ?></dd>
            </div>
            <div class="access__item">
              <dt class="access__item-label">駐車場</dt>
              <dd class="access__item-value"><?php the_field("shop-parking"); ?></dd>
            </div>
            <div class="access__item">
              <dt class="access__item-label">定休日</dt>
              <dd class="access__item-value"><?php the_field("shop-regular-holiday"); ?></dd>
            </div>
          </dl>
      </div>
    </section>
    
    <!-- Contact -->
    <section id="contact" class="contact">
      <div class="contact__inner">
        <?php echo get_heading_title(menu_contact, slug_contact); ?>
        <div class="contact__explanation">
          <p class="contact__text">
            商品について、営業有無、取材・報道などのお問い合わせは、以下の電話番号、メールアドレス、お問い合わせフォームからお願いいたします。
          </p>
          <p class="contact__text">
            【取材・報道等に関するお問い合わせについて】<br>
店舗取材についてはお時間など出来る限り対応させていただきます。<br>
掲載や取材にご利用いただけるよう、商品のカット写真等は多数ご用意しております。<br>
HPの写真も使用可能ですが、無断でのご使用はお控えください。
          </p>
          <p class="conatct__tel"><?php the_field("shop-tel"); ?></p>
          <p class="contact__email"><?php the_field("shop-mail"); ?></p>
        </div>
      </div>
      <div class="contact__inner">
        <?php echo do_shortcode('[contact-form-7 id="c0fcfa2" title="お問い合わせ用フォーム"]'); ?>
      </div>
    </section>
</main>
<?php get_footer(); ?>