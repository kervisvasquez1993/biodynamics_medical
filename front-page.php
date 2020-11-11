<?php
$arg= array(
    'post_type' => 'divisions',
    'posts_per_page' => -1
);

$division = new WP_Query($arg);
$terminos_toaxonomias = get_terms(array('taxonomy' => 'tipo-Producto'));


                                    

get_header();?>






    <div class="corousel-inner" role="listbox">
        <div class="item active responsive">
            <?php while(have_posts()): the_post(); ?>
            <img class="img-responsive" src="<?php echo get_the_post_thumbnail_url();?>" class="img-fluid" alt="Responsive image">
        </div>

    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-centered col-sm-12 col-lg-4 NewsCycle paddin-top">
                <?php the_content();?>
            </div>
                <?php endwhile;?>
            <div class="col-md-8 col-centered col-sm-12 col-lg-8">
                <div class="page-header text-center">
                    <h3 class="linea-biodynamics oxygen">
                        <?php the_field('lineaProductos');?> </h3>
                </div>
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
                    <?php
                    endforeach;
                    
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php get_footer();?>