<?php get_header(); ?>

<main>
  <div class="container container--sub-page">
    <!-- パンくず -->
    <?php get_template_part( 'parts/breadcrumbs' ); ?>

    <div class="contents__wrap-1col">
      <time class="news-post__date" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time>
      <div class="news-post__categorys">
        <?php
            $taxonomy_terms = get_the_terms($post->ID, 'kind');
            if ( ! empty( $taxonomy_terms ) ) {
                foreach( $taxonomy_terms as $taxonomy_term ) {
                    echo '<a href="' . get_term_link( $taxonomy_term->term_id ) . '" class="news-post__category">' . esc_html( $taxonomy_term->name ) . '</a>';
                }
            }
          ?>
      </div>
      <h2 class="enrty__title"><?php the_title(); ?></h2>
      <div class="entry__body">
        <div class="post__eyecatchbox">
          <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('full', array('class' => 'detail__thumbnail')); ?>
          <?php endif; ?>
        </div>
        <div class="detail-content">
          <?php the_content(); ?>
        </div>
        <div class="single-nav-wrapper">
          <div class="nav-previous">
            <?php echo get_prev_next_nav(true); ?>
          </div>
          <div class="nav-list">
            <a href="<?php echo esc_url( home_url( 'news' ) ); ?>" class="c-button c-button--list">
              <span>一覧に戻る</span>
            </a> 
          </div>
          <div class="nav-next">
            <?php echo get_prev_next_nav(false); ?>
          </div>
        </div>
      </div>
    </div> 
  </div>
</main>
<?php get_footer(); ?>