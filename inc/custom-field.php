<?php 
add_action( 'cmb2_admin_init', 'biodynamics_medical' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function biodynamics_medical()
{
	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$biodynamics_campos = new_cmb2_box( array(
		'id'            => 'biodynamics_campos',
		'title'         => esc_html__( 'Campos para imagen y url', 'cmb2' ),
		'object_types'  => array( 'post' ), // Post type
		// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
        // 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
		) );
		

        $biodynamics_campos->add_field( array(
            'name'         => esc_html__( 'Seleciones las Imagenes', 'cmb2' ),
            'desc'         => esc_html__( 'Upload or add multiple images/attachments.', 'cmb2' ),
            'id'           => 'galeria_biodynamics',
            'type'         => 'file_list',
            'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
		) );
	
	
		
	

}