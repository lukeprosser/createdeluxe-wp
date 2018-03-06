<?php

/*
Template Name: Special Layout
*/

get_header();

if (have_posts()) :
    while (have_posts()) : the_post(); ?>

    <article class="post page">
        <h2><?php the_title(); ?></h2>

        <!-- info-box -->
        <div class="info-box">
            <h4>Disclaimer Title</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl pretium fusce id velit ut tortor pretium viverra suspendisse. Viverra accumsan in nisl nisi scelerisque eu ultrices vitae. Ut pharetra sit amet aliquam id diam. Pellentesque habitant morbi tristique senectus et netus et. Mattis nunc sed blandit libero volutpat. Gravida arcu ac tortor dignissim convallis aenean et tortor. Facilisis volutpat est velit egestas. Id faucibus nisl tincidunt eget nullam. Tincidunt augue interdum velit euismod. Et sollicitudin ac orci phasellus egestas tellus. Eu volutpat odio facilisis mauris sit amet massa vitae. Ultrices vitae auctor eu augue ut lectus.</p>
        </div><!-- /info-box -->

        <?php the_content(); ?>
    </article>

    <?php endwhile;

    else :
        echo '<p>No content found</p>';

    endif;

get_footer();

?>