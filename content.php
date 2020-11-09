<?php
/**
 * Template used to display post content.
 *
 * @package storefront
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <h2 class="spantaran color-principal"><?php the_title();?></h2>
    <p><?php the_excerpt();?></p>
    <a href="<?php the_permalink();?>" class="montserrat-dos color-principal">Read more</a>
    </div>


    
</article><!-- #post-## -->
