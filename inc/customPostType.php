<?php 

add_action( 'init', 'divisions' );
function divisions() {
    $labels = array(
        'name'               => _x( 'lineas', 'biodinamicsmedical' ),
        'singular_name'      => _x( 'lineas', 'post type singular name', 'biodinamicsmedical' ),
        'menu_name'          => _x( 'lineas', 'admin menu', 'biodinamicsmedical' ),
        'name_admin_bar'     => _x( 'linea', 'add new on admin bar', 'biodinamicsmedical' ),
        'add_new'            => _x( 'Add New', 'linea', 'biodinamicsmedical' ),
        'add_new_item'       => __( 'Add New linea', 'biodinamicsmedical' ),
        'new_item'           => __( 'New linea', 'biodinamicsmedical' ),
        'edit_item'          => __( 'Edit linea', 'biodinamicsmedical' ),
        'view_item'          => __( 'View linea', 'biodinamicsmedical' ),
        'all_items'          => __( 'All lineas', 'biodinamicsmedical' ),
        'search_items'       => __( 'Search lineas', 'biodinamicsmedical' ),
        'parent_item_colon'  => __( 'Parent liuneas:', 'biodinamicsmedical' ),
        'not_found'          => __( 'No division found.', 'biodinamicsmedical' ),
        'not_found_in_trash' => __( 'No division found in Trash.', 'biodinamicsmedical' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'biodinamicsmedical' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'division' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
      
    );

    register_post_type( 'divisions', $args );
}

add_action( 'init', 'blog' );
function blog() {
    $labels = array(
        'name'               => _x( 'Entadas del Blog ', 'biodinamicsmedical' ),
        'singular_name'      => _x( 'Entadas del Blog ', 'post type singular name', 'biodinamicsmedical' ),
        'menu_name'          => _x( 'Entadas del Blog ', 'admin menu', 'biodinamicsmedical' ),
        'name_admin_bar'     => _x( 'linea', 'add new on admin bar', 'biodinamicsmedical' ),
        'add_new'            => _x( 'Add New', 'linea', 'biodinamicsmedical' ),
        'add_new_item'       => __( 'Add New linea', 'biodinamicsmedical' ),
        'new_item'           => __( 'New linea', 'biodinamicsmedical' ),
        'edit_item'          => __( 'Edit linea', 'biodinamicsmedical' ),
        'view_item'          => __( 'View linea', 'biodinamicsmedical' ),
        'all_items'          => __( 'All Entadas del Blog ', 'biodinamicsmedical' ),
        'search_items'       => __( 'Search Entadas del Blog ', 'biodinamicsmedical' ),
        'parent_item_colon'  => __( 'Parent liuneas:', 'biodinamicsmedical' ),
        'not_found'          => __( 'No division found.', 'biodinamicsmedical' ),
        'not_found_in_trash' => __( 'No division found in Trash.', 'biodinamicsmedical' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'biodinamicsmedical' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'blog' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
      
    );

    register_post_type( 'blog', $args );
}



function blog_query($cantidad)
{

    $args = array( 'post_type' => 'blog', 'posts_per_page' => $cantidad);
    $q = new WP_Query( $args );
   
    while( $q->have_posts()): $q->the_post();
            ?>
            <div class="wrappers ">
              
                <h3 class="color-titulos titulo-3 medium"><?php the_title();?></h3>
                <p class="light">
                 
                </p>
                <a href="<?php the_permalink();?>" class="btn  background-boton">LEER MAS</a>
            </div>
            <div class= "product-destacado">
                <?php the_post_thumbnail( 'mediano', array('class' => 'card-img-top') );?>
            </div>
    <?php
    endwhile;
    wp_reset_postdata();
  
 
}




?>