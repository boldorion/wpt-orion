<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
 
/**
 * Let's pull the child theme styles
 */
$orionv = "1.0.2"; 
 
function hello_elementor_child_enqueue_scripts() {
	wp_enqueue_style(
		'orion-base',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'orion-base',
		],
		$orionv
	);
	
   // Style extensions
  if (file_exists(get_stylesheet_directory_uri() . '/css/style.css'))
  {
	wp_enqueue_style(
		'orion-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'orion-style',
		],
		$orionv
	);
  }
	
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20 );

/**
 * Check for updates from Github to keep the core up to date.
 */
 
require 'updater/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/boldorion/wpt-orion/',
	__FILE__,
	'orion'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('master');

/**
 * Let's see if any theme customizations exist, and pull them in.
 */
 
 // Functions extensions
 if (file_exists(get_stylesheet_directory_uri() . '/extended.php'));
  include (get_stylesheet_directory_uri() . '/extended.php');
  
