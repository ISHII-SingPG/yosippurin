<?php get_header(); ?>

<main>
  <div class="container container--sub-page">
    <!-- パンくず -->
    <?php get_template_part( 'parts/breadcrumbs' ); ?>

    <!-- News -->
    <section class="news">
      <?php echo get_heading_title(menu_news, slug_news); ?>
      <div class="news__inner">
        <?php
              $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
              // タクソノミーのスラッグを指定
              $kind_slug = get_query_var('kind');
              $args = array(
                  "post_type" => "news",
                  "posts_per_page" => 5,
                  "paged" => $paged,
                  'tax_query' => array(
                    array(
                        // タクソノミーのスラッグを指定
                        'taxonomy' => 'kind',
                        'field'    => 'slug',
                        'terms'    => $kind_slug,
                    ),
                  ),
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
            <p><?php echo msg_post_not_found ?></p>
          <?php endif; ?>
        </div>
      </div>
    </section>
  </div>
</main>

<?php get_footer(); ?>