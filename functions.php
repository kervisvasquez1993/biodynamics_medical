<?php
/*
 * agregamos funciones para crear tabla en base de datos
*/


/* Start your code here */
require_once dirname( __FILE__ ).'/cmb2.php';
require get_template_directory().'/inc/database.php';
require get_template_directory().'/inc/contacto.php';
require get_template_directory().'/inc/option.php';
require get_template_directory().'/inc/customPostType.php';

/* fin de script para crear tabla en base de datos*/
// agregar soportes a las imagenes
  
        function img_suport(){
            // Add Thumbnail Theme Support
            add_theme_support('post-thumbnails');
            add_image_size('large', 700, '422', true); // Large Thumbnail
            add_image_size('medium', 350, '250', true); // Medium Thumbnail
            add_image_size('small', 120, '', true); // Small Thumbnail
            add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

        }

    

    
// fin de soporte de imagenes
/*filtrar los resultados de busquedas*/
function add_custom_pt( $query ) {
    if ( !is_admin() && $query->is_main_query() ) {
        if ( $query->is_search ) {
            $query->set( 'category', array('trauma', 'otros_productos', 'columna', 'maxilofacial' ) );
        }
    }
}

add_action( 'pre_get_posts', 'add_custom_pt' );

/*fin de filtro de resultados de busquedas*/

// Cargar los estilos y los script de la pagina


    function style()
    {
        
        wp_enqueue_style('raleweay','https://fonts.googleapis.com/css?family=Raleway&display=swap',array(), '1.0.0'.'all');
        wp_enqueue_style('Oxygen','https://fonts.googleapis.com/css?family=Oxygen&display=swap',array(),'1.0.0','all');
        wp_enqueue_style('quicksand','https://fonts.googleapis.com/css?family=Quicksand&display=swap',array(),'1.0.0','all');
        wp_enqueue_style('abel','https://fonts.googleapis.com/css?family=Abel&display=swap', array(),'1.0.0','all');
        wp_enqueue_style('News Cycle','https://fonts.googleapis.com/css?family=News+Cycle&display=swap',array(),'1.0.0','all');
       // wp_enqueue_style('normalize','https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css', array(),'8.0.1','all');
        //wp_enqueue_style('normalize-map','https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css.map', array(),'8.0.1','all');
        wp_enqueue_style('bootstraps','https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(),'4.2.3','all');
        wp_enqueue_style('font-awesome','https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(),'4.7.0'.'all');
        wp_enqueue_script( 'filter', get_template_directory_uri() . '/js/jquery.filterizr.min.js', array('jquery'), '1.0.0', true );
        // wp_enqueue_style('fontawesome',get_template_directory_uri().'/css/font-awesome.css',array(),'4','all');
        wp_enqueue_style('style',get_stylesheet_uri());
        //wp_enqueue_script('sc6',get_template_directory_uri().'/js/es6.js',array(),'1.0.0',true);
        wp_enqueue_script('popper','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array('jquery'),'4.2.3',true);
        wp_enqueue_script('bootstrap-js','https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('popper'),'4.2.3', true);
        wp_enqueue_script('scripts', get_template_directory_uri().'/js/scripts.js',array(),'1.0.0', true);
    }
    add_action('wp_enqueue_scripts','style');


//creacion de menu

    function menus(){
        register_nav_menus( 
        array
        (
            'header_menu' => __('header_menu', 'biodynamicsmedical'),
            'trauma_menu' => __('trauma_menu', 'biodynamicsmedical')
        ));
    }
    add_action( 'init', 'menus' );
add_action('init','biodynamics_menu');


function change_posts_order( $query ) {
if ( $query-is_home() && $query-is_main_query() ) {
$query-set( 'orderby', 'title' );
$query-set( 'order', 'ASC' );
}
}
add_action( 'pre_get_posts', ' change_posts_order ' );


    function biodynamicsmedical_setup(){
        add_theme_support('post-thumbnails');
        add_image_size('index', 437, 291, true);

    }

    add_action('after_setup_theme','biodynamicsmedical_setup');

// configuracion de longitud del extracto
function extracto_longitud($length){
    return 20;
}
add_filter( 'excerpt_length','extracto_longitud',999 );


// fin de longitud de extracto

// invocacion de widget

    function biodynamics_widget(){
        register_sidebar(
            array(
                'name' => 'form_widget',
                'id' => 'form',
                'before_widget' => '<div class="widget">',
                'after_widget' => '</div>',
                'before_title' => '<h3>',
                'after_title' => '</h3>'
            ));

    }

// fin de widget
add_action('widgets_init','biodynamics_widget');

/*filtro de busqueda
function my_custom_searchengine($query) {
    if ($query->is_search && !is_admin()) {
        $query->set('post_type', array('post'));
    }
    return $query;
}
add_filter('pre_get_posts', 'my_custom_searchengine');
*/
// fin de busqueda

add_filter('pll_get_post_types', 'mi_pll_con_custom_post_types');
function mi_pll_con_custom_post_types($types) {
    return array_merge($types, array('trauma' => 'trauma'));
}

foreach ( array( 'pre_term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_filter_kses' );
}

foreach ( array( 'term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_kses_data' );
}
//custom posts type para la primera seccion trauma


foreach ( array( 'pre_term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_filter_kses' );
}

foreach ( array( 'term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_kses_data' );
}


//Renombrar el nombre de menú post o entradas por Noticias
/*function modificar_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Productos';
    $submenu['edit.php'][5][0] = 'Productos';
    $submenu['edit.php'][10][0] = 'A&ntilde;adir Producto';

    echo '';
}
*/

//modificar el nombre de las entradas
/*function modificar_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Productos';
    $labels->singular_name = 'Productos';
    $labels->add_new = 'A&ntilde;adir Nueva';
    $labels->add_new_item = 'A&ntilde;adir Nuevo Producto';
    $labels->edit_item = 'Editar Producto';
    $labels->new_item = 'Nueva Producto';
    $labels->view_item = 'Ver Productos';
    $labels->search_items = 'Buscar Productos';
    $labels->not_found = 'No se han encontrado Producto';
    $labels->not_found_in_trash = 'No se han encontrado Producto en la papelera';
    $labels->all_items = 'Todas los Productos';
    $labels->menu_name = 'Productos';
    $labels->name_admin_bar = 'Productos';
}
*/
add_action( 'admin_menu', 'modificar_post_label' );
//add_action( 'init', 'modificar_post_object' );

function my_custom_searchengine($query) {
    if ($query->is_search && !is_admin()) {
      $query->set('post_type', array('post'));
    }
    return $query;
  }
  



  /***** Numbered Page Navigation (Pagination) Code.
      Tested up to WordPress version 3.1.2 *****/
  
/* Function that Rounds To The Nearest Value.
   Needed for the pagenavi() function */
function round_num($num, $to_nearest) {
    /*Round fractions down (http://php.net/manual/en/function.floor.php)*/
    return floor($num/$to_nearest)*$to_nearest;
 }
   
 /* Function that performs a Boxed Style Numbered Pagination (also called Page Navigation).
    Function is largely based on Version 2.4 of the WP-PageNavi plugin */
 function pagenavi($before = '', $after = '') {
     global $wpdb, $wp_query;
     $pagenavi_options = array();
     $pagenavi_options['pages_text'] = ('Page %CURRENT_PAGE% de %TOTAL_PAGES%:');
     $pagenavi_options['current_text'] = '%PAGE_NUMBER%';
     $pagenavi_options['page_text'] = '%PAGE_NUMBER%';
     $pagenavi_options['first_text'] = ('First');
     $pagenavi_options['last_text'] = ('Last');
     $pagenavi_options['next_text'] = 'Next &raquo;';
     $pagenavi_options['prev_text'] = '&laquo; Previous';
     $pagenavi_options['dotright_text'] = '...';
     $pagenavi_options['dotleft_text'] = '...';
     $pagenavi_options['num_pages'] = 5; //continuous block of page numbers
     $pagenavi_options['always_show'] = 0;
     $pagenavi_options['num_larger_page_numbers'] = 0;
     $pagenavi_options['larger_page_numbers_multiple'] = 5;
   
     //If NOT a single Post is being displayed
     /*http://codex.wordpress.org/Function_Reference/is_single)*/
     if (!is_single()) {
         $request = $wp_query->request;
         //intval — Get the integer value of a variable
         /*http://php.net/manual/en/function.intval.php*/
         $posts_per_page = intval(get_query_var('posts_per_page'));
         //Retrieve variable in the WP_Query class.
         /*http://codex.wordpress.org/Function_Reference/get_query_var*/
         $paged = intval(get_query_var('paged'));
         $numposts = $wp_query->found_posts;
         $max_page = $wp_query->max_num_pages;
   
         //empty — Determine whether a variable is empty
         /*http://php.net/manual/en/function.empty.php*/
         if(empty($paged) || $paged == 0) {
             $paged = 1;
         }
   
         $pages_to_show = intval($pagenavi_options['num_pages']);
         $larger_page_to_show = intval($pagenavi_options['num_larger_page_numbers']);
         $larger_page_multiple = intval($pagenavi_options['larger_page_numbers_multiple']);
         $pages_to_show_minus_1 = $pages_to_show - 1;
         $half_page_start = floor($pages_to_show_minus_1/2);
         //ceil — Round fractions up (http://us2.php.net/manual/en/function.ceil.php)
         $half_page_end = ceil($pages_to_show_minus_1/2);
         $start_page = $paged - $half_page_start;
   
         if($start_page <= 0) {
             $start_page = 1;
         }
   
         $end_page = $paged + $half_page_end;
         if(($end_page - $start_page) != $pages_to_show_minus_1) {
             $end_page = $start_page + $pages_to_show_minus_1;
         }
         if($end_page > $max_page) {
             $start_page = $max_page - $pages_to_show_minus_1;
             $end_page = $max_page;
         }
         if($start_page <= 0) {
             $start_page = 1;
         }
   
         $larger_per_page = $larger_page_to_show*$larger_page_multiple;
         //round_num() custom function - Rounds To The Nearest Value.
         $larger_start_page_start = (round_num($start_page, 10) + $larger_page_multiple) - $larger_per_page;
         $larger_start_page_end = round_num($start_page, 10) + $larger_page_multiple;
         $larger_end_page_start = round_num($end_page, 10) + $larger_page_multiple;
         $larger_end_page_end = round_num($end_page, 10) + ($larger_per_page);
   
         if($larger_start_page_end - $larger_page_multiple == $start_page) {
             $larger_start_page_start = $larger_start_page_start - $larger_page_multiple;
             $larger_start_page_end = $larger_start_page_end - $larger_page_multiple;
         }
         if($larger_start_page_start <= 0) {
             $larger_start_page_start = $larger_page_multiple;
         }
         if($larger_start_page_end > $max_page) {
             $larger_start_page_end = $max_page;
         }
         if($larger_end_page_end > $max_page) {
             $larger_end_page_end = $max_page;
         }
         if($max_page > 1 || intval($pagenavi_options['always_show']) == 1) {
             /*http://php.net/manual/en/function.str-replace.php */
             /*number_format_i18n(): Converts integer number to format based on locale (wp-includes/functions.php*/
             $pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pagenavi_options['pages_text']);
             $pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
             echo $before.'<div class="pagenavi">'."\n";
   
             if(!empty($pages_text)) {
                 echo '<span class="pages">'.$pages_text.'</span>';
             }
             //Displays a link to the previous post which exists in chronological order from the current post.
             /*http://codex.wordpress.org/Function_Reference/previous_post_link*/
             previous_posts_link($pagenavi_options['prev_text']);
   
             if ($start_page >= 2 && $pages_to_show < $max_page) {
                 $first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['first_text']);
                 //esc_url(): Encodes < > & " ' (less than, greater than, ampersand, double quote, single quote).
                 /*http://codex.wordpress.org/Data_Validation*/
                 //get_pagenum_link():(wp-includes/link-template.php)-Retrieve get links for page numbers.
                 echo '<a href="'.esc_url(get_pagenum_link()).'" class="first" title="'.$first_page_text.'">1</a>';
                 if(!empty($pagenavi_options['dotleft_text'])) {
                     echo '<span class="expand">'.$pagenavi_options['dotleft_text'].'</span>';
                 }
             }
   
             if($larger_page_to_show > 0 && $larger_start_page_start > 0 && $larger_start_page_end <= $max_page) {
                 for($i = $larger_start_page_start; $i < $larger_start_page_end; $i+=$larger_page_multiple) {
                     $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                     echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a>';
                 }
             }
   
             for($i = $start_page; $i  <= $end_page; $i++) {
                 if($i == $paged) {
                     $current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
                     echo '<span class="current">'.$current_page_text.'</span>';
                 } else {
                     $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                     echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a>';
                 }
             }
   
             if ($end_page < $max_page) {
                 if(!empty($pagenavi_options['dotright_text'])) {
                     echo '<span class="expand">'.$pagenavi_options['dotright_text'].'</span>';
                 }
                 $last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['last_text']);
                 echo '<a href="'.esc_url(get_pagenum_link($max_page)).'" class="last" title="'.$last_page_text.'">'.$max_page.'</a>';
             }
             next_posts_link($pagenavi_options['next_text'], $max_page);
   
             if($larger_page_to_show > 0 && $larger_end_page_start < $max_page) {
                 for($i = $larger_end_page_start; $i <= $larger_end_page_end; $i+=$larger_page_multiple) {
                     $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                     echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a>';
                 }
             }
             echo '</div>'.$after."\n";
         }
     }
 }

 function the_slug($echo=true){
    $slug = basename(get_permalink());
    do_action('before_slug', $slug);
    $slug = apply_filters('slug_filter', $slug);
    if( $echo ) echo $slug;
    do_action('after_slug', $slug);
    return $slug;
  }

  
  function catName($cat_id)
 {
   $cat_id = (int) $cat_id;
   $category = &get_category($cat_id);
   return $category->name;
 }

 