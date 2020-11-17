<?php get_header();
 
               $nombre_division_arr = get_field('nombre_division');
               $nombre_link_arr = get_field('link_linea');
                // link del router interno 
               $category_link = get_category_link( $nombre_division_arr );
               $category_link1 = get_category_link( $nombre_link_arr );
            ?>
<div class="item active responsive">
    <img src="<?php echo get_template_directory_uri();?>/img/banner-seccion-division.jpg" alt="">
</div>
<?php while(have_posts()): the_post(); ?>
    <div class="container" id="single">

    <a href="<?php echo esc_url(home_url('/'))?>"></a>
<!-- pagina normal-->
<span class="ruta-interna abel">
       <a href="<?php the_field('url-home'); ?>" class="black"><?php the_field('inicio_palabra');?></a> /
       <a href="<?php the_field('url-divisiones');?>" class="black"><?php the_field('divisiones_palabra');?></a> /
       <a href="<?php echo esc_url( $category_link1 );?>" class="black"><?php echo catName($nombre_link_arr);?></a> /
       <a href="<?php echo esc_url( $category_link ); ?>" class="black"><?php echo catName($nombre_division_arr);?></a> /
       
        <a class="here black" href=""><?php the_title(); ?></a>
   </span>


    <div class="row">
        <div class="carousel-row no-gutter">
             <div class=" row slide-row">
                <div class="col-md-6 col-lg-6">
                    <div class="slide-content">
                        <?php the_content();?>
                    </div>
                </div>
                <?php 
                $imagenes = get_post_meta( get_the_ID(), 'galeria_biodynamics',true );
            foreach($imagenes as  $id => $imagen): 
            endforeach; 
             
            ?>
    <?php if(count($imagenes)>0):?>
    <div class="col-md-6 col-lg-6 test-back">
        <div id="carousel-1" class="carousel slide carousel slide carousel-fade slide-carousel" data-ride="carousel">
           <!-- Indicators -->
               <ul class="carousel-indicators">
                     <?php $cnt=0; $slider = 0; foreach($imagenes as  $id => $imagen):?>
                     <li data-target="#carousel-1" data-slide-to="<?php echo $slider?>" class="<?php if($cnt==0){ echo 'active'; }?>"></li>
                        <?php $cnt++; $slider++; endforeach; ?>
               </ul>

                        <!-- The slideshow -->
        <div class="carousel-inner">
            <?php $cnt=0; foreach($imagenes as  $id => $imagen):?>
            <div class="carousel-item  <?php if($cnt==0){ echo 'active'; }?>">
                <img src="<?php echo $imagen; ?>"  class="<?php the_field('alt_imagenes');?>" alt="Los Angeles">
            </div>
            <?php $cnt++; endforeach; ?> 

        </div>
                     </div>
    </div>
   <?php endif; ?>
        </div>
    </div>
    </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse0" aria-expanded="true" aria-controls="collapse0"
                                   title="Read More" id="click_toggle">
                                    <i class="more-less fa fa-plus" aria-hidden="true" id="menos"></i>
                                    <p><?php the_field('indicaciones_text');?></p>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingO">
                            <div class="panel-body NewsCycle">
                                <?php the_field('indicaciones')?>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse0" title="Read More" id="click_toggle2">
                                    <i class="more-less fa fa-plus" aria-hidden="true" id="menos2"></i>
                                    <p><?php the_field('beneficiosCaracteristica_text');?></p>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingO">
                            <div class="panel-body NewsCycle">
                                <?php the_field('beneficios_y_caracteristicas')?>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse0" title="Read More" id="click_toggle3">
                                    <i class="more-less fa fa-plus" aria-hidden="true" id="menos3"></i>
                                    <p><?php the_field('caracteristicasTecnicas_text');?></p>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingO">
                            <div class="panel-body NewsCycle">
                                <?php the_field('caracteristicas_tecnicas')?>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true" aria-controls="collapse0" title="Read More" id="click_toggle4">
                                    <i class="more-less fa fa-plus" aria-hidden="true" id="menos4"></i>
                                    <p><?php the_field('archivos_text');?></p>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingO">
                            <div class="panel-body NewsCycle">
                                <a href="<?php the_field('archivo')?>" class="btn btn-secondary btn-lg">downloader pdf <?php the_title(); ?></a>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
</div>
<?php endwhile;?>



<?php get_footer();?>
