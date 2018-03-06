<article class="post <?php if ( has_post_thumbnail() ) { ?>has-thumbnail <?php } ?>">

        <!-- post-thumbnail -->
        <div class="post-thumbnail">
            <!-- display post featured image -->
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
        </div><!-- /post-thumbnail -->

        <!-- display post title -->
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

        <!-- display post date and author -->
        <p class="post-info"><?php the_time('F jS Y'); ?> | <?php the_author_posts_link(); ?> | Posted in 
        
        <!-- display categories -->
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
            <a href="<?php the_permalink(); ?>">Read more &raquo;</a>
            </p>
        
        <?php } else {
            // if post has excerpt
            if ($post->post_excerpt) { ?>
                <!-- display excerpt and read more -->
                <p>
                    <?php echo get_the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>">Read more &raquo;</a>
                </p>

            <?php } else {
                // if post has no excerpt display full content
                the_content();
            }

        } ?>
        
</article>