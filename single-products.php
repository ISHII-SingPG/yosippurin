<?php get_header(); 
$post_id = get_the_ID();
$post_word = "商品";

?>
  <main>
    <div class="container container--sub-page">
      <!-- パンくず -->
      <?php get_template_part( 'parts/breadcrumbs' ); ?>

      <?php
          $post_id = get_the_ID();
          $productsStatus = 1;
          if(!get_field("is-sales-now")){
              $productsStatus = 0;
          }
      ?>

      <div class="contents__wrap-1col">
        <div class="products-detail__box">
          <div class="products-detail__top">
          <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail( 'full', array( 'class' => 'products-detail__img' ) ); ?>
          <?php else : ?>
              <img src="<?php echo esc_url(get_theme_file_uri( "/images/products/products-noimage.jpg" )); ?>)" class="products-detail__img" alt="NoImage画像" />
          <?php endif ; ?>
            <!-- <img src="<?php echo esc_url(get_theme_file_uri("/images/product-item02.jpg")); ?>" class="products-detail__img" alt="プレーン"> -->
            <div class="products-detail__body">
              <h2 class="products-detail__title"><?php the_title(); ?></h2>
              <div class="products-detail__status-wrapper">
              <?php if($productsStatus == 1): ?>
                <p class="products-detail__status">販売中</p>
              <?php else: ?>
                <p class="products-detail__status products-detail__status--stop">販売停止中</p>
              <?php endif; ?>
              </div>
              <p class="products-detail__text text">
                <?php echo nl2br(get_field('products-text', $post_id)) ?>
              </p>
              <div class="products-detail__food-info">
                <p><span class="products-detail__price"><?php the_field("price-taxin") ?>円</span>（税込）/　賞味期限：<?php the_field("expiration-date") ?>日</p>   
              </div>
            </div>
          </div>
          <?php if($productsStatus == 1): ?>
            <div class="products-detail__bottom">
              <a href="#" class="c-button c-button--list">
                <span>購入する</span>
              </a> 
            </div>
          <?php endif; ?>
        </div>
        <div class="single-nav-wrapper">
          <div class="nav-previous">
            <?php echo get_prev_next_nav(true, $post_word); ?>
          </div>
          <div class="nav-list">
              <a href="<?php echo esc_url( home_url( 'products' ) ); ?>" class="c-button c-button--list">
                <span>一覧に戻る</span>
              </a> 
          </div>
          <div class="nav-next">
            <?php echo get_prev_next_nav(false, $post_word); ?>
          </div>
        </div>
      </div> 
    </div>
</main>

<?php get_footer(); ?>