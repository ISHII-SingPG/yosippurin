<article class="news-post">
    <a href="<?php the_permalink(); ?>" class="news-post__thumbnail__link">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail( 'full', array( 'class' => 'news-post__thumbnail' ) ); ?>
        <?php else : ?>
            <img src="<?php echo esc_url(get_theme_file_uri( "/images/noimage.jpg" )); ?>)" class="news-post__thumbnail" alt="NoImage画像" />
        <?php endif ; ?>
    </a>
    <div class="news-post__body">
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
        <time class="news-post__date" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time>
        <a href="<?php the_permalink(); ?>" class="news-post__link post__link">
            <span class="post__title"><?php echo get_post_title(); ?></span>
        </a>
    </div>
</article>