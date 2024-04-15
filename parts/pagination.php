<?php
    $args = array(
        'mid_size' => 1,
        'prev_text' => '<i class="fa-solid fa-angle-left fa-lg pagination__arrow"></i>',
        'next_text' => '<i class="fa-solid fa-angle-right fa-lg pagination__arrow"></i>',
    );
    the_posts_pagination($args);
?>