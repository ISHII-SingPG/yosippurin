<?php get_header(); 
$post_id = get_the_ID();
$post_word = "商品";

?>

  <main>
    <div class="container container--sub-page">
      <!-- パンくず -->
      <?php get_template_part( 'parts/breadcrumbs' ); ?>
  
      <!-- Products -->
      <section class="products">
        <?php echo get_heading_title(menu_products, slug_products, true); ?>
        <div class="products__inner inner">
            <div class="products__cards">
              <?php
                  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                  $args = array(
                      "post_type" => "products",
                      "posts_per_page" => -1,
                      "paged" => $paged
                  );
                  $the_query = new WP_Query($args);
              ?>
              <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                  <div class="products__card card">
                    <?php get_template_part( 'parts/content-products' ); ?>
                  </div>
                <?php endwhile; ?>
              <?php endif; ?>      
            </div> 
            <?php wp_reset_postdata(); ?>
            <!-- ページネーション -->
            <?php get_template_part( 'parts/pagination' ); ?>
        </div>
      </section>
    </div>
</main>

<?php get_footer(); ?>