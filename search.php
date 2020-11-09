<?php
/**
 * The template for displaying search results pages.
 *
 *
 */
get_header(); ?>



<?php if ( have_posts() ) : ?>
    <?php
    /* translators: %s: search term
    printf( esc_attr__( 'Search Results for: %s', 'storefront' ), '<span>' . get_search_query() . '</span>' );
*/

    ?>
    </h1>

    </header><!-- .page-header -->
    <?php
        get_template_part( 'loop' );
        ?>
        <div class="text-center">
            <div class="navigation"><?php if(function_exists('pagenavi')) { pagenavi(); } ?></div>
       </div>
        <?php
        else:
            get_template_part( 'content', 'none' );
        endif;

    
?>


<?php
get_footer();
