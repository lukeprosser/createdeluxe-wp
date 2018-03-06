<?php

get_header();

if (have_posts()) :
    while (have_posts()) : the_post();

    // if no post format assigned
    if (get_post_format() == false) {
        // display standard single post
        get_template_part('content', 'single');
    } else {
        // display assigned post format
        get_template_part('content', get_post_format());
    }

    endwhile;

    else :
        echo '<p>No content found</p>';

    endif;

get_footer();

?>