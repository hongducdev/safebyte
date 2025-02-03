<?php

if( !defined( 'ABSPATH' ) )
	exit; 

class Safebyte_Admin_Templates extends Safebyte_Base{

	public function __construct() {
		$this->add_action( 'admin_menu', 'register_page', 20 );
	}
 
	public function register_page() {
		add_submenu_page(
			'pxlart',
		    esc_html__( 'Templates', 'safebyte' ),
		    esc_html__( 'Templates', 'safebyte' ),
		    'manage_options',
		    'edit.php?post_type=pxl-template',
		    false
		);
	}
}
new Safebyte_Admin_Templates;
