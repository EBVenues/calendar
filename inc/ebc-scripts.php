<?php

/***********************
* scripts
***********************/

//load eventbrite calendar scripts
function ebc_load_scripts($hook) {
    global $post;

	//plugin style definitions
    wp_register_style('clndrStyle', plugins_url('css/clndr.css', __FILE__));
    wp_enqueue_style('clndrStyle');

    wp_register_style('calendarStyle', plugins_url('css/calendar.css', __FILE__));
    wp_enqueue_style('calendarStyle');
    
    //plugin scripts
	wp_register_script('jsn', plugins_url('js/json2.js', __FILE__), array('jquery'));
	wp_enqueue_script('jsn');

	wp_register_script('moment', plugins_url('js/moment-2.8.3.js', __FILE__), array('jquery'));
	wp_enqueue_script('moment');
 
	wp_register_script('clndrPlugin', plugins_url('js/clndr.js', __FILE__), array('jquery', 'moment', 'underscore'));
	wp_enqueue_script('clndrPlugin');
 
 	wp_enqueue_script('siteScript', plugins_url('js/site.js', __FILE__), array('jquery', 'clndrPlugin', 'moment', 'underscore', 'jsn'));
       
    // make the ajaxurl var available to the above script
	wp_localize_script( 'siteScript', 'the_ajax_script', 
		array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce('ebc-nonce')
	) );
 }
 
add_action('wp_enqueue_scripts', 'ebc_load_scripts');

