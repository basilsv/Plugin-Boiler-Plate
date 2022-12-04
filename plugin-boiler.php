<?php
/**
 * Plugin Name: Plugin Boiler Plate
 * Description: This is a plugin as a Plugin Boiler Plate.
 * Plugin URI:  https://basilsvportfolio.netlify.app/
 * Version:     1.0.0
 * Author:      Basil Varghese
 * Author URI:  https://basilsvportfolio.netlify.app/
 * Text Domain: plugin-boiler
 * Settings URI: #
 */
 
 if ( ! defined( 'ABSPATH' ) ) exit;
 
 
define( 'PLUGIN_BOILER_PLUGIN', '1.0.0' );
define( 'PLUGIN_BOILER_PREVIOUS_STABLE_VERSION', '1.0.0' );

define( 'PLUGIN_BOILER__FILE__', __FILE__ );
define( 'PLUGIN_BOILER_PLUGIN_BASE', plugin_basename( PLUGIN_BOILER__FILE__ ) );
define( 'PLUGIN_BOILER_PATH', plugin_dir_path( PLUGIN_BOILER__FILE__ ) );

define( 'PLUGIN_BOILER_MODULES_PATH', PLUGIN_BOILER_PATH . 'modules/' );
define( 'PLUGIN_BOILER_URL', plugins_url( '/', PLUGIN_BOILER__FILE__ ) );
define( 'PLUGIN_BOILER_ASSETS_URL', PLUGIN_BOILER_URL . 'assets/' );
define( 'PLUGIN_BOILER_MODULES_URL', PLUGIN_BOILER_URL . 'modules/' );
 


 
class PLUGIN_BOILER {

	private $replacements;

	private $settings;
	public function __construct() {
		
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}
	
	public function init() {
		
		add_action( 'wp_enqueue_scripts', array( $this, 'PLUGIN_BOILER_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_PLUGIN_BOILER_js' ) );
	}
	


public function PLUGIN_BOILER_scripts() {

	$asset_file_js = array('dependencies' => array('wp-hooks'), 'version' => date("h:i:s"));
	wp_register_script(
		'client-js-injection',
		PLUGIN_BOILER_ASSETS_URL . 'js/client-plugin-boiler.js' ,
		$asset_file_js['dependencies'],
		$asset_file_js['version'],
		false
	);
	wp_enqueue_script( 'client-js-injection' );

	$asset_file_css = array('version' => date("h:i:s"));
    wp_register_style(
		'client-css-injection',
		PLUGIN_BOILER_ASSETS_URL . 'css/client-plugin-boiler.css',
		null,
		$asset_file_css['version'],
		false
	);
	wp_enqueue_style( 'client-css-injection' );
 }

 public function admin_PLUGIN_BOILER_js(){

	$admin_details_array = [1,1,3,5,8,13,21];
	wp_register_script( 'admin_backend_js_PLUGIN_BOILER', PLUGIN_BOILER_ASSETS_URL . 'js/admin-plugin-boiler.js', array ( 'jquery' ), date("h:i:s"), true);
	wp_localize_script('admin_backend_js_PLUGIN_BOILER', 'admin_details_array', $admin_details_array);
	wp_enqueue_script('admin_backend_js_PLUGIN_BOILER');
	wp_register_style( 'admin_PLUGIN_BOILER_css',PLUGIN_BOILER_ASSETS_URL . 'css/admin-plugin-boiler.css', false, date("h:i:s") );
    wp_enqueue_style( 'admin_PLUGIN_BOILER_css' );

 }







	
	
	
	
} 

// Instantiate Referral Replace Content.
new PLUGIN_BOILER();
