<?php get_header(); ?>

  <div class="container padding-top">

    <div class="blog-grid">

      <div class="main-column">

        <?php
          if (have_posts()) :
            while (have_posts()) : the_post();

              get_template_part('content', get_post_format());

            endwhile;

          else :
            echo '<p>No content found</p>';

          endif;
        ?>

      </div><!-- /main-column -->

      <?php get_sidebar(); ?>

    </div><!-- /blog-grid -->

  </div><!-- /container -->

<?php get_footer(); ?>
