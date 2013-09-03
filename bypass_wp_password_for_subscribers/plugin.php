<?php
/*
Plugin Name: Ondesign Login
Plugin URI: TODO
Description: This plugin creates a widget that allows Subscribers to login without using a password.
Version: 1.0
Author: Fueled By Dreams
Author URI: http://fueledbydreams.com
Author Email: info@fueledbydreams.com
Text Domain: widget-name-locale
Domain Path: /lang/
Network: false
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Copyright 2013 Fueled By Dreams (info@fueledbydreams.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class OnDesign_Login extends WP_Widget {

	/*--------------------------------------------------*/
	/* Constructor
	/*--------------------------------------------------*/

	/**
	 * Specifies the classname and description, instantiates the widget,
	 * loads localization files, and includes necessary stylesheets and JavaScript.
	 */
	public function __construct() {

		// Hooks fired when the Widget is activated and deactivated
		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );

		// TODO:	update classname and description
		// TODO:	replace 'widget-name-locale' to be named more plugin specific. Other instances exist throughout the code, too.
		parent::__construct(
			'ondesign-login-id',
			__( 'Ondesign Login', 'ondesign-login-locale' ),
			array(
				'classname'		=>	'ondesign-login-class',
				'description'	=>	__( 'Subscribers login form.', 'ondesign-login-locale' )
			)
		);

		// Register site styles and scripts
		add_action( 'wp_enqueue_scripts', array( $this, 'register_widget_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_widget_scripts' ) );

	} // end constructor

	/*--------------------------------------------------*/
	/* Widget API Functions
	/*--------------------------------------------------*/

	/**
	 * Outputs the content of the widget.
	 *
	 * @param	array	args		The array of form elements
	 * @param	array	instance	The current instance of the widget
	 */
	public function widget( $args, $instance ) {

		extract( $args, EXTR_SKIP );

		echo $before_widget;

		include( plugin_dir_path( __FILE__ ) . '/views/widget.php' );

		echo $after_widget;

	} // end widget

	/*--------------------------------------------------*/
	/* Public Functions
	/*--------------------------------------------------*/

	/**
	 * Registers and enqueues widget-specific styles.
	 */
	public function register_widget_styles() {

		// TODO:	Change 'widget-name' to the name of your plugin
		wp_enqueue_style( 'ondesign-login-styles', plugins_url( 'ondesign-login/css/widget.css' ) );

	} // end register_widget_styles

} // end class

// TODO:	Remember to change 'Widget_Name' to match the class name definition
add_action( 'widgets_init', create_function( '', 'register_widget("OnDesign_Login");' ) );