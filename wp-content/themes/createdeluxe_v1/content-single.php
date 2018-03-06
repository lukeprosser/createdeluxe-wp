<article class="post">

  <!-- display post featured image -->
  <?php the_post_thumbnail('small-thumbnail'); ?>

  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

  <p class="post-info">By <?php the_author_posts_link(); ?> | Posted in

  <?php

      $categories = get_the_category();
      $separator = ", ";
      $output = '';

      if ($categories) {
          foreach ($categories as $category) {
              $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $separator;
          }
          echo trim($output, $separator);
      }

  ?>

  </p>

  <?php the_content(); ?>

</article>
