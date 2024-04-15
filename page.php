<?php get_header(); 

?>
<main>
    <div class="container container--sub-page">
      <!-- パンくず -->
      <?php get_template_part( 'parts/breadcrumbs' ); ?>

      <div class="site-content">
        <?php echo get_heading_title(get_the_title(), get_field("sub-title")); ?>
        <div class="contents__wrap-1col">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
</main>

<?php get_footer(); ?>