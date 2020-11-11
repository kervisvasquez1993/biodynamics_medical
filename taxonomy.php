<?php 
get_header();
$termino_actual = get_queried_object();
//print_r($termino_actual);
$taxonomia = get_taxonomy($termino_actual->taxonomy);
$slug_actual =$termino_actual->slug;
$a;
if($busqueda == '')
{
	$a = 'OR';
}else{
	$a ='AND';
}
			
$args = array(
	'posts_per_page' => -1,
	'post_type' => 'Productos',
	'order' => 'ASC',
	'order_by' => 'title',
	'tax_query' => array(
		'relation' => $a,
		[
			'taxonomy'         => 'tipo-Producto',
			'field'            => 'slug',
			'terms'            => $slug_actual,
		],
		[
			'taxonomy'         => 'categoria-producto',
			'field'            => 'slug',
			'terms'            => $busqueda,
		],
	),
  );

?>
<div class="item active responsive">
    <img src="<?php echo get_template_directory_uri();?>/img/banner-seccion-division.jpg" alt="">
</div>
<div class="container">
<?php $farmaco = new WP_Query($args);  
        if($farmaco->have_posts()) : $elemento_arr = []; 
                         while($farmaco->have_posts()): $farmaco->the_post();
                         $terms = wp_get_post_terms(get_the_ID(), 'categoria-producto');
                         $name  = $terms[0]->name;
                         array_push($elemento_arr, $name);
                         ?>
                        <?php endwhile; wp_reset_postdata();
                        $menu_categorias = array_unique($elemento_arr);
                        ?>
                        <div class="flex-row row">
                                <?php
                                foreach($menu_categorias as $menu):?>
                                    <div class="col-xs-2 col-sm-3 col-lg-3">
                                      <div class="thumbanil">
                                        <div class="caption product-description NewsCycle">
                                             <h4> 
                                                <?php echo $menu;?>
                                            </h4>
                                        </div>
                                     </div>
                                    </div>
                                <?php endforeach;?>
                        </div>

                        <!--comenzamos la seccion de post de cada productos -->
                        <div class="flex-row row">
                             <?php while($farmaco->have_posts()): $farmaco->the_post();
                              $terms = wp_get_post_terms(get_the_ID(), 'categoria-producto');
                              $id_tax = $terms[0];
                              $imagen_categoria_producto = get_field('img_taxonomia',$id_tax);
                              ?>
                              <div class="col-xs-6 col-sm-4 col-lg-4">
                                <div class="thumbanil">
				                     <div class="card_wrap filtr-item" data-category="<?php echo $terms[0]->term_taxonomy_id?>">
					                    <?php the_post_thumbnail();?>
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
                            </div>
			                 <?php endwhile; wp_reset_postdata();?>
			           
 <?php endif;?>
</div>
<?php 

 get_footer();?>