<?php
/**
 * The template for displaying all pages
 */

get_header(); ?>

<main id="primary" class="site-main">
    <?php
    while (have_posts()) :
        the_post();
        the_content(); // This function displays the content from the Gutenberg editor, including ACF Blocks

        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;

    endwhile; // End of the loop.
    ?>
</main>

<?php
get_sidebar();
get_footer(); 