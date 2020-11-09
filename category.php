<?php get_header();
 
  $nombre_division_arr = get_field('nombre_division');
  $nombre_link_arr = get_field('link_linea');
  
  
   // link del router interno 
  $category_link = get_category_link( $nombre_division_arr );
  $category_link1 = get_category_link( $nombre_link_arr );


  

$list_subcat = array();
$cat;
$the_query = new WP_Query( array( 'cat' => $cat, 'posts_per_page' => -1 ) );
$parent_cat = get_category_link($cat);
                                  
?>
<div class="item active responsive">
    <img src="<?php echo get_template_directory_uri();?>/img/banner-seccion-division.jpg" alt="">
</div>
<div class="container">

     <span class="ruta-interna abel">
       <a href="<?php the_field('url-home');?>" class="black"><?php the_field('inicio_palabra')?></a> /
       <a href="<?php the_field('url-divisiones');?>" class="black"><?php the_field('divisiones_palabra');?></a> /
       
         
   

    <?php $cat2 = $the_query->query[cat];
    

   
    
    if ( !empty($cat2)):
        $list_subcat = get_categories( ['hide_empty' => false, 'parent' => $cat2] );
       
        
      
    endif;
    if ( count($list_subcat)):?>
   <a href="<?php echo $parent_cat;?>" class="here"><?php  echo catName($cat);?> </a>
   </span>
   <div class="flex-row row">
        <?php foreach ($list_subcat as $item_subcat) :
            $category_link = get_category_link( $item_subcat->term_id );?>
                      <div class="col-xs-6 col-sm-4 col-lg-4">
                           <div class="thumbanil">
                                <?php echo $item_subcat->description ?> 
                                    <div class="caption product-description NewsCycle">
                                         <h4> 
                                            <a href=<?php echo $category_link ?>>  <?php  echo $item_subcat->name ?> </a> 
                                        </h4>
                                    </div>
                            </div>
                       </div>
                       <?php  endforeach ?>

            </div>
            
                       
    <?php else:?>
        <a href="<?php echo esc_url( $category_link1 );?>" class="black"><?php echo catName($nombre_link_arr); ?></a> /
        <a href="<?php   echo  esc_url( $category_link );?>" class="here"><?php echo catName($nombre_division_arr);?></a>
        </span>
    
            
            
        <div class="flex-row row">
        <?php
               
        // En 'cat' deberás colocar el ID de la categoría que deseas mostrar.
        // En 'posts_per_page' deberás colocar la cantidad de posts que deseas mostrar.
        if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="col-xs-6 col-sm-4 col-lg-4">
                    <div class="thumbanil">
                    <?php
                                $img_html = "<img src=". get_field('imagen_principal_producto') ." alt=''>";
                                $img_html = apply_filters( 'bj_lazy_load_html', $img_html );
                                echo $img_html;
                                ?>


                      



                        <div class="caption product-description NewsCycle">
                            <h4><?php the_title(); ?></h4>
                            <p class="intro">
                                <?php the_excerpt();?>
                            </p>
                            <hr>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_field('leer_mas');?>
                            </a>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>

    </div>

    
    <?php  endif;?>
    
    
</div>



<?php get_footer(); ?>
