<?php

function biodynamics_guardar(){

    global $wpdb;

    if(isset($_POST['contactanos']) && $_POST['oculto']== "1"):
        $nombre = sanitize_text_field($_POST['nombrecompleto']);
        $email= sanitize_text_field($_POST['email']);
        $telefono = sanitize_text_field($_POST['telefono']);
        $mensaje = sanitize_text_field($_POST['mensaje']);





        $datos = array(
            'nombrecompleto' => $nombre,
            'email' => $email,
            'telefono' => $telefono,
            'mensaje' => $mensaje

        );


        $tabla= $wpdb->prefix.'contacto';
        $wpdb->insert($tabla,$datos);

        $url = get_page_by_title('gracias');
        wp_redirect(get_permalink($url->ID));
        exit();

    endif;
}

add_action('init','biodynamics_guardar');