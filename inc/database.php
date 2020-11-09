<?php

function biodynamics_database(){
    global $wpdb;
    global $biodynamics_dbversiones;
    $biodynamics_dbversiones = '0.1';
    $tabla = $wpdb->prefix.'contacto';
    $charset = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $tabla (
        id mediumint(9) not null auto_increment,
        nombrecompleto varchar(50) not null,
        email varchar(50) NOT NULL,
        telefono varchar(11) not null, 
        mensaje varchar(500) not null,
        primary key (id)) $charset; ";

    require_once(ABSPATH. 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    add_option('biodinamics_dbversiones', $biodynamics_dbversiones);
    //actualizar en caso de ser necesario

    $version_actual = get_option( 'biodynamics_dbversiones');
    if($biodynamics_dbversiones != $version_actual){
        $tabla = $wpdb->prefix.'contacto';

        $sql = "CREATE TABLE $tabla (
        id mediumint(9) not null auto_increment,
        nombrecompleto varchar(50) not null,
        email varchar(50) NOT NULL,
        telefono varchar(11) not null,
        mensaje longtext(500) not null,
        primary key (id)) $charset; ";
        require_once(ABSPATH. 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
        update_option( 'biodynamics_dbversiones', $biodynamics_dbversiones );
    }
}

add_action('after_setup_theme', 'biodynamics_database');