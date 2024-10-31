<?php
/*
Plugin Name: PHP to Page
Plugin URI: http://studio.bloafer.com/wordpress-plugins/php-to-page/
Description: Keep your PHP and WordPress seperate, using the shortcode [php-to-page] you can include PHP files in your pages.
Version: 0.3
Author: Kerry James
Author URI: http://studio.bloafer.com/
*/

function php_to_page_shortcode_handler( $args, $content = null ){
	$output = "";
	if( is_feed() )
		return '';
	
	if(!isset($args["file"])){
		$args["file"] = false;
	}
	if($args["file"]){	
		if(file_exists($args["file"])){
			ob_start();
			include $args["file"];
			$output = ob_get_contents();
			ob_end_clean();
		}
	}
	return html_entity_decode($output);
}

add_shortcode('php-to-page', 'php_to_page_shortcode_handler');

?>