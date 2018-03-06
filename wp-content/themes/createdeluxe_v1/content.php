<article class="post">

  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>

  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

  <p class="post-info">by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> | Posted in

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

  <!-- if search or archive page -->
  <?php if ( is_search() OR is_archive() ) { ?>
      <!-- display excerpt and read more -->
      <p>
      <?php echo get_the_excerpt(); ?>
      <a class="btn" href="<?php the_permalink(); ?>">Read More</a>
      </p>

  <?php } else {
      // if post has excerpt
      if ($post->post_excerpt) { ?>
          <!-- display excerpt and read more -->
          <p>
              <?php echo get_the_excerpt(); ?>
              <a class="btn" href="<?php the_permalink(); ?>">Read More</a>
          </p>

      <?php } else {
          // if post has no excerpt display full content
          the_content();
      }

  } ?>

</article>
