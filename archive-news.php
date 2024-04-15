<?php get_header(); 
$post_id = get_the_ID();

?>
<main>
  <div class="container container--sub-page">
    <!-- パンくず -->
    <?php get_template_part( 'parts/breadcrumbs' ); ?>

    <!-- News -->
    <section class="news">
      <?php echo get_heading_title(menu_news, slug_news, true); ?>
      <div class="news__inner">
        <?php
              $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
              $args = array(
                  "post_type" => "news",
                  "posts_per_page" => 5,
                  "paged" => $paged
              );
              $the_query = new WP_Query($args);
          ?>
          <?php if ($the_query->have_posts()) : ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
              <div class="news__posts">
                <?php get_template_part( 'parts/content-news' ); ?>
              </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <!-- ページネーション -->
            <?php get_template_part( 'parts/pagination' ); ?>
          <?php else : ?>
            <p>記事が投稿されていません</p>
          <?php endif; ?>
        </div>
      </div>
    </section>
  </div>
</main>

<?php get_footer(); ?>