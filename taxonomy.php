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
/*
 Array ([name] => Sistema Biolock® 3.5 [id] => 115 ) 
 Array ( [name] => Sistema Biolock® MIS [id] => 120 ) 
 Array ( [name] => Sistema DHS / DCS [id] => 118 )
 Array ( [name] => Sistema Biolock® 3.5 [id] => 115 )
 Array ( [name] => Sistema Biolock® 3.5 [id] => 115 ) 
 Array ( [name] => Sistema Biolock® MIS [id] => 120 ) 
 Array ( [name] => Sistema Biolock® 3.5 [id] => 115 ) 
 Array ( [name] => Sistema Biolock® MIS [id] => 120 )

Array ( [0] => Array ( [0] => Sistema Biolock® 3.5 [1] => 115 ) 
        [1] => Array ( [0] => Sistema Biolock® MIS [1] => 120 )
        [2] => Array ( [0] => Sistema DHS / DCS [1] => 118 )
        [3] => Array ( [0] => Sistema Biolock® 3.5 [1] => 115 )
        [4] => Array ( [0] => Sistema Biolock® 3.5 [1] => 115 )
        [5] => Array ( [0] => Sistema Biolock® MIS [1] => 120 ) 
        [6] => Array ( [0] => Sistema Biolock® 3.5 [1] => 115 ) 
        [7] => Array ( [0] => Sistema Biolock® MIS [1] => 120 )
     )
 */
?>
<div class="item active responsive">
    <img src="<?php echo get_template_directory_uri();?>/img/banner-seccion-division.jpg" alt="">
</div>
<div class="container">
<?php $biodynamics = new WP_Query($args);  
        if($biodynamics->have_posts()) :
                     $elemento_arr        = [];
                     $array_nuevo_letra   = [];
                     $array_nuevo_numero  = [];
                     $i                   =  0; 
                        while($biodynamics->have_posts()): $biodynamics->the_post();
                              $terms = wp_get_post_terms(get_the_ID(), 'categoria-producto');
                              $name  = [$terms[0]->name , $terms[0]->term_id];
                              array_push($elemento_arr, $name);
                              array_push($array_nuevo_letra,$elemento_arr[$i][0]);
                              array_push($array_nuevo_numero,$elemento_arr[$i][1]);
                              $entradas = array_unique($array_nuevo_letra);
                              $numeros  = array_unique($array_nuevo_numero);                        
                              $i++;
                              ?>
                <?php   endwhile; wp_reset_postdata();
                        
                        $longitud = sizeof($entradas);
                        $n = 0;
                        ?>
                       <div class="flex-row row simplefilter">
                            <?php
                              for($n; $n < $longitud ; $n++):?>
                                <div class="fltr-controls col-xs-2 col-sm-3 col-lg-3" data-filter="<?php echo $numeros[$n];?>">
                                    <div class="thumbanil">
                                        <div class="caption product-description NewsCycle">
                                            <h4> 
                                              <?php echo $entradas[$n]; ?>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                endfor;
                            ?>
                        </div>
                        <!--comenzamos la seccion de post de cada productos -->
                        <div class="flex-row row multifilter">
                             <?php while($biodynamics->have_posts()): $biodynamics->the_post();
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