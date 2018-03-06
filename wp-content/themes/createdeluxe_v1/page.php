<?php get_header(); ?>

  <div class="container">

    <?php
      if (have_posts()) :
        while (have_posts()) : the_post(); ?>

          <article class="post page">
            <h3><?php the_title(); ?></h3>
            <?php the_content(); ?>
          </article>

        <?php endwhile;

      else :
        echo '<p>No content found</p>';

      endif;
    ?>

  </div><!-- /container -->


<?php get_footer(); ?>
