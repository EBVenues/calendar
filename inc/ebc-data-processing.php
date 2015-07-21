<?php

/***********************
* data processing
***********************/

function ebc_get_eventbrite_events() {
	global $ebc_options;
	
	// first check if data is being sent and that it is the data we want
  	if ( isset( $_POST["post_var"] ) ) {
		// now set our response var equal to that of the POST var (this will need to be sanitized based on what you're doing with with it)
		
		$response = $_POST["post_var"];
		
		// send the response back to the front end		
		
		$org_id = $ebc_options['eb_organizer_id'];
		
		if($org_id != ''){
			$events = new Eventbrite_Query( 
				apply_filters( 'eventbrite_query_args', array(
					'organizer_id' => intval($org_id), 
					'display_private' => true
				)));
		}
		
		$events_array = get_object_vars($events);
		$all_events = $events_array['posts'];
		$event_holder = array();
		
		$i = 0;
		foreach ($all_events as &$value) {
			$temp_event = get_object_vars($all_events[$i]);
			$temp = array(
				"date" => $temp_event['post_date'],
				"title" => $temp_event['post_title'],
				"url" => $temp_event['url'],
			);
		    $event_holder[$i] = $temp;
		    $i++;
		}
		echo wp_send_json($event_holder);
		die();
	}
}
add_action('wp_ajax_nopriv_test_response', 'ebc_get_eventbrite_events');
add_action('wp_ajax_test_response', 'ebc_get_eventbrite_events');