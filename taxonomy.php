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
<span class="ruta-interna abel">
    <a href="<?php echo esc_url(home_url('/'));?>" class="black">Inicio</a> /
    <a href="#" class="here"><?php echo $termino_actual->name;?></a> 

    </span>
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
                      <div class="container">
                          <div class="row search-row">
                               Buscar Producto
                               <input
                                 type="text"
                                 class="search-field form-control fltr-controls filtr-search"
                                 name="filtr-search"
                                 placeholder="Buscar"
                                 data-search
                               />
                          </div>
                      </div>
                      <div class="flex-row row simplefilter">
                                <div class="fltr-controls col-xs-2 col-sm-3 col-lg-3" data-filter="all">
                                  <div class="thumbanil">
                                      <div class="caption product-description NewsCycle">
                                          <h4> 
                                            Todos los Productos
                                          </h4>
                                      </div>
                                  </div>
                                </div>
                          <?php
                            for($n; $n <= $longitud ; $n++):
                              if($numeros[$n] != ''):
                            ?>
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
                            endif;
                            endfor;
                          ?>
                      </div>
                      <!--comenzamos la seccion de post de cada productos -->
                      <div class="flex-row row ">
                        <div class="filtr-container">
                             <?php while($biodynamics->have_posts()): $biodynamics->the_post();
                              $terms = wp_get_post_terms(get_the_ID(), 'categoria-producto');
                              $id_tax = $terms[0];
                              $imagen_categoria_producto = get_field('img_taxonomia',$id_tax);
                              ?>
                                  <div class="card col-12 col-sm-6 col-lg-4 filtr-item" data-category="<?php echo $terms[0]->term_taxonomy_id?>">
                                        <img class="card-img-top" src="<?php the_post_thumbnail_url();?>" alt="Card image cap">
                                        <div class="card-body">
                                          <h5 class="card-title"><?php the_title();?></h5>
                                          
                                          <a href="<?php the_permalink();?>" class="btn product-description">Ver Producto</a>
                                        </div>
                                  </div>
                             <?php endwhile; wp_reset_postdata();?>
                             <!--fin del ciclo de -->
                        </div>
                      </div>          
              <?php endif;?>
              <!--footer taxonomia-->

<?php 

 get_footer();?>