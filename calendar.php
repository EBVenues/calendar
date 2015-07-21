<?php
/*
Plugin Name: Eventbrite Events Calendar
Plugin URI: http://otterlydesigns.com
Description: Dynamic calendar for Eventbrite Events.
Version: 1.0
Author: Erica Sivak
Author URI: http://otterlydesigns.com
License: GPLv2
*/

/***********************
* global variables
***********************/
$ebc_prefix = "ebc_";
$ebc_plugin_name = "Eventbrite Calendar";

$ebc_options = get_option('ebc_settings'); //retrieve plugin settings from the options table

/***********************
* includes
***********************/
include('inc/ebc-scripts.php'); //controls all js/css
include('inc/ebc-admin-page.php'); //controls all js/css
include('inc/ebc-shortcodes.php'); //registers shortcodes for calendar
include('inc/ebc-data-processing.php'); //handles ajax calls and interfaces with Eventbrite API plugin