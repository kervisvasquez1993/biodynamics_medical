<?php
/**
 *
 */

/*do_action( 'storefront_loop_before' );
/*
while ( have_posts() ) :
	the_post();

	/**
	 * Include the Post-Format-specific template for the content.
	 * If you want to override this in a child theme, then include a file
	 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
	 */
/*	get_template_part( 'content', get_post_format() );

endwhile;
*/
?>

    <div class="item active responsive">
        <img class="img-responsive img-fluid" src="<?php echo get_template_directory_uri();?>/img/banner-seccion-contacto.jpg" alt="Responsive image">

    </div>
    <section class="container">
        <div class="row">
            <?php while(have_posts()): the_post();?>
            <div class="col-xs-6 col-sm-4 col-lg-4">
                 <div class="thumbnail ">

                 <?php
                           $img_html = "<img src=". get_field('imagen_principal_producto') ." alt=''>";
                           $img_html = apply_filters( 'bj_lazy_load_html', $img_html );
                           echo $img_html;
                ?>

                

                </div>
            <div class="caption product-description">
                    <?php get_template_part( 'content', get_post_format() );?>
            </div>
            <?php endwhile;?>

            </div>
        </div>
    </section>



