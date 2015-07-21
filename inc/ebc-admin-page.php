<?php

/***********************
* admin page
***********************/

//options page content
function ebc_options_page(){

	global $ebc_options;

	ob_start(); ?>
	
	<div class="wrap">
		<h2>Eventbrite Calendar Plugin Options</h2>
		
		<form method="post" action="options.php">
			
			<?php settings_fields('ebc_settings_group');?>
			
			<h4><?php _e('Eventbrite Information', 'ebc_domain');?></h4>
			<p>
				<label class="description" for="ebc_settings[eb_organizer_id]"><?php _e('Enter your Eventbrite Organizer ID', 'ebc_domain');?></label>
				<input id="ebc_settings[eb_organizer_id]" name="ebc_settings[eb_organizer_id]" type="text" value="<?php echo $ebc_options['eb_organizer_id'];?>"/>
			</p>
				
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Options', 'ebc_domain');?>"/>
			</p>
		</form>
	</div><!--.wrap-->
	
	<?php
	echo ob_get_clean();
}

//registers menu link under settings
function ebc_add_options_link(){
	add_options_page('Eventbrite Calendar Options', 'Evenbrite Calendar', 'manage_options', 'ebc-options', 'ebc_options_page');
}
add_action('admin_menu', 'ebc_add_options_link');

//registers settings to be located in wp_options table
function ebc_register_settings(){
	register_setting('ebc_settings_group','ebc_settings');
}
add_action('admin_init', 'ebc_register_settings');