<?php
  /*
  Template Name: Entradas
  */

    $arg= array(
                    'post_type' => 'divisions',
                    'posts_per_page' => -1
                );
    $division = new WP_Query($arg);
    get_header();
    ?>
<div class="coriusel-inner" role="listbox">
    <div class="item active responsive">
        <img src="<?php echo get_the_post_thumbnail_url();?>" class="img-fluid" alt="">
    </div>
</div>
<div class="container">
    <span class="ruta-interna abel">
    <a href="<?php the_field('url-home');?>" class="black"><?php the_field('inicio_palabra')?></a> /
       <a href="<?php the_field('url-divisiones');?>" class="here"><?php the_field('divisiones_palabra');?></a> /

    </span>

    <div class="row row-centered">
        <?php
        while(
            $division->have_posts()): $division->the_post();
            $enlaces = get_field('enlaces_division');
            
            ?>
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="main-items">
                    <div class="hovereffect col-centered">
                        <img class="img-responsive" src="<?php the_post_thumbnail_url('small')?>" alt="">
                        <div class="overlay text-center">
                            <h2><a href="<?php echo get_category_link( $enlaces ); ?>" class="oxygen">
                                    <?php the_title();?>
                                </a>
                            </h2>
                            <a href="<?php echo get_category_link( $enlaces ); ?>" class="info oxygen">
                                click
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile;
         wp_reset_postdata();
        ?>
    </div>

</div>
<?php get_footer();?>