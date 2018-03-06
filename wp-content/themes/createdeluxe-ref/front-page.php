<?php

get_header(); ?>

    <!-- site-content -->
    <div class="site-content clearfix">

        <?php if (have_posts()) :
            while (have_posts()) : the_post();

            the_content();

            endwhile;

            else :
                echo '<p>No content found</p>';

            endif; ?>

        <!-- home-columns -->
        <div class="home-columns clearfix">

            <!-- one-half -->
            <div class="one-half">

                <?php // guest posts loop begins here
                $guestPosts = new WP_Query('cat=4&posts_per_page=2');

                if ($guestPosts->have_posts()) : the_post();
                    
                    while ($guestPosts->have_posts()) : $guestPosts->the_post(); ?>

                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                    <?php the_excerpt(); ?>
                        
                    <?php endwhile;

                    else :
                        // fallback no content message here
                endif;
                // reset url-based queries
                wp_reset_postdata(); ?>

            </div><!-- /one-half -->

            <!-- one-half -->
            <div class="one-half last">

                <?php // tutorial posts loop begins here
                $tutorialPosts = new WP_Query('cat=5&posts_per_page=2');

                if ($tutorialPosts->have_posts()) : the_post();
                    
                    while ($tutorialPosts->have_posts()) : $tutorialPosts->the_post(); ?>

                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                    <?php the_excerpt(); ?>
                        
                    <?php endwhile;

                    else :
                        // fallback no content message here
                endif;
                // reset url-based queries
                wp_reset_postdata(); ?>

            </div><!-- /one-half -->

        </div><!-- /home-columns -->


    </div><!-- /site-content -->

<?php get_footer();

?>