<?php
  /*
  Template Name: division
  */

    $arg= array('post_type' => 'divisions',
                    'posts_per_page' => -1
                );
    $terminos_toaxonomias = get_terms(array('taxonomy' => 'tipo-Producto'));
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
                     foreach( $terminos_toaxonomias as $terminos_toaxonomia):
                        $image = get_field('img_taxonomia', $terminos_toaxonomia);
                        $link = get_term_link($terminos_toaxonomia);
                        ?>
                    
                    <div class="col-lg-6 col-md-12 col-xs-12">
                        <div class="main-items">
                            <div class="hovereffect col-centered">
                                <img class="img-responsive" src="<?php echo $image;?>" alt="">
                                <div class="overlay text-center">
                                
                                    <h2><a href="<?php echo $link;?>" class="oxygen">
                                        <?php echo $terminos_toaxonomia->name;?>
                                    </a>
                                    </h2>
                                    <a href="<?php echo $link; ?>" class="info oxygen">
                                        click
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php    endforeach;?>
                </div>

</div>
<?php get_footer();?>