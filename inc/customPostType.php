<?php 
function crear_post_type(){
    $labels = array(
        'name'               => _x( 'Productos Biodynamics', 'biodynamicsmedical' ),
        'singular_name'      => _x( 'Producto Biodynamics', 'Post Type Singular Name', 'biodynamicsmedical' ),
        'menu_name'          => _x( 'Productos Biodynamics', 'admin menu', 'surgery' ),
        'name_admin_bar'     => _x( 'Productos Biodynamics', 'add new on admin bar', 'biodynamicsmedical' ),
        'add_new'            => _x( 'Agregar Nuevo', 'Producto', 'biodynamicsmedical' ),
        'add_new_item'       => __( 'Agreagr Nuevo Producto', 'biodynamicsmedical' ),
        'new_item'           => __( 'Nuevo Producto', 'biodynamicsmedical' ),
        'edit_item'          => __( 'Editar Producto', 'biodynamicsmedical' ),
        'view_item'          => __( 'Ver Producto', 'biodynamicsmedical' ),
        'all_items'          => __( 'Todos los Productos', 'biodynamicsmedical' ),
        'search_items'       => __( 'Buscar Producto', 'biodynamicsmedical' ),
        'parent_item_colon'  => __( 'Parent Producto:', 'biodynamicsmedical' ),
        'not_found'          => __( 'Producto No encontrado', 'biodynamicsmedical' ),
        'not_found_in_trash' => __( 'No encontrado en la papelera', 'biodynamicsmedical' )
    );

    // Otras opciones para el post 
    $arg = array(
        'label' => __('Productos','biodynamicsmedical'),
        'descripcion' => __('Productos de biodynamicsmedical','biodynamicsmedical'),
        'labels' => $labels,
        'supports' => array('title','editor', 'excerpt','author', 'thumbnail',  'comments', 'revisions','custom-fields'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_menu' => true,
        'show_in_admin_bar' =>true,
        'menu_position' => 6,
        'menu_icon'           => 'dashicons-store',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'capibility_type' => 'page',
        );
        register_post_type('Productos', $arg);
        
}
add_action('init', 'crear_post_type', 0);


function taxonomia_tipo_producto(){
    $labels = array(
        'name'              => _x( 'Linea del Producto', 'taxonomy general name' ),
        'singular_name'     => _x( 'Linea del Producto', 'taxonomy singular name' ),
        'search_items'      => __( 'Buscar Linea de Producto' ),
        'all_items'         => __( 'Todos los Linea de Productos' ),
        'parent_item'       => __( 'Linea del Producto Padre' ),
        'parent_item_colon' => __( 'Linea del Producto Padre:' ),
        'edit_item'         => __( 'Editar Linea del Producto' ),
        'update_item'       => __( 'Actualizar Linea del Producto' ),
        'add_new_item'      => __( 'Agregar Nuevo Linea del Producto' ),
        'new_item_name'     => __( 'Nuevo Linea del Producto' ),
        'menu_name'         => __( 'Linea del Producto' ),
    );
    
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite' => array( 'slug' => 'Linea-Producto' ),
    );
    
    register_taxonomy( 'tipo-Producto', array( 'productos' ), $args );
}

add_action('init', 'taxonomia_tipo_producto');


function categoria_biodynamicsmedical(){
   
    $labels = array(
        'name'              => _x( 'Categoria de Producto', 'taxonomy general name' ),
        'singular_name'     => _x( 'Categoria de Producto', 'taxonomy singular name' ),
        'search_items'      => __( 'Buscar Categoria de Producto' ),
        'all_items'         => __( 'Todos los Categoria de Productoss' ),
        'parent_item'       => __( 'Categoria de Producto Padre' ),
        'parent_item_colon' => __( 'Categoria de Producto Padre:' ),
        'edit_item'         => __( 'Editar Categoria de Producto' ),
        'update_item'       => __( 'Actualizar Categoria de Producto' ),
        'add_new_item'      => __( 'Agregar Nuevo Categoria de Producto' ),
        'new_item_name'     => __( 'Nuevo Categoria de Producto' ),
        'menu_name'         => __( 'Categoria de Producto' ),
    );
    
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite' => array( 'slug' => 'categoria-producto' ),
    );
    
    register_taxonomy( 'categoria-producto', array( 'productos' ), $args );

}

add_action('init', 'categoria_biodynamicsmedical');