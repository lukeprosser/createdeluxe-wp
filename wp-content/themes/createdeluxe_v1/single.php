<?php get_header(); ?>

  <div class="container padding-top">

    <div class="blog-grid">

      <div class="main-column">

        <?php if (have_posts()) :
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

            endif; ?>

      </div><!-- /main-column -->

      <?php get_sidebar(); ?>

    </div><!-- /blog-grid -->

  </div><!-- /container -->


<?php get_footer(); ?>
