<?php
/**
 * Filters hook for the theme
 *
 * @package Case-Themes
 */

/* Custom Classs - Body */
function safebyte_body_classes( $classes ) {   

	$classes[] = '';
    if (class_exists('ReduxFramework')) {
        $classes[] = ' pxl-redux-page';

	    $footer_fixed = safebyte()->get_theme_opt('footer_fixed');
	    $p_footer_fixed = safebyte()->get_page_opt('p_footer_fixed');

	    if($p_footer_fixed != false && $p_footer_fixed != 'inherit') {
	    	$footer_fixed = $p_footer_fixed;
	    }

	    if(isset($footer_fixed) && $footer_fixed == 'on') {
	        $classes[] = ' pxl-footer-fixed';
	    }

	    $header_layout = safebyte()->get_opt('header_layout');
	    if(isset($header_layout) && $header_layout) {
		    $post_header = get_post($header_layout);
		    $header_type = get_post_meta( $post_header->ID, 'header_type', true );
		    if(isset($header_type)) {
		    	$classes[] = ' bd-'.$header_type.'';
		    }
		}

	    $get_gradient_color = safebyte()->get_opt('gradient_color');
		if($get_gradient_color['from'] == $get_gradient_color['to'] ) {
		    $classes[] = ' site-color-normal ';
		} else {
			$classes[] = ' site-color-gradient ';
		}

		$shop_layout = safebyte()->get_theme_opt('shop_layout', 'grid');
		if(isset($_GET['shop-layout'])) {
	        $shop_layout = $_GET['shop-layout'];
	    }
		$classes[] = ' woocommerce-layout-'.$shop_layout;

		$body_custom_class = safebyte()->get_page_opt('body_custom_class');
		if(!empty($body_custom_class)) {
			$classes[] = $body_custom_class;
		}
    }
    return $classes;
}
add_filter( 'body_class', 'safebyte_body_classes' );

/* Post Type Support */
function safebyte_add_cpt_support() {
    $cpt_support = get_option( 'elementor_cpt_support' );
    
    if( ! $cpt_support ) {
        $cpt_support = [ 'page', 'post', 'portfolio', 'service', 'industries', 'footer', 'pxl-template' ];
        update_option( 'elementor_cpt_support', $cpt_support );
    }
    
    else if( ! in_array( 'portfolio', $cpt_support ) ) {
        $cpt_support[] = 'portfolio';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

    else if( ! in_array( 'service', $cpt_support ) ) {
        $cpt_support[] = 'service';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

    else if( ! in_array( 'industries', $cpt_support ) ) {
        $cpt_support[] = 'industries';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

    else if( ! in_array( 'footer', $cpt_support ) ) {
        $cpt_support[] = 'footer';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

    else if( ! in_array( 'pxl-template', $cpt_support ) ) {
        $cpt_support[] = 'pxl-template';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

}
add_action( 'after_switch_theme', 'safebyte_add_cpt_support');

add_filter( 'pxl_support_default_cpt', 'safebyte_support_default_cpt' );
function safebyte_support_default_cpt($postypes){
	return $postypes; // pxl-template
}

add_filter( 'pxl_extra_post_types', 'safebyte_add_post_type' );
function safebyte_add_post_type( $postypes ) {
	$portfolio_display = safebyte()->get_theme_opt('portfolio_display', 'on');
	$portfolio_slug = safebyte()->get_theme_opt('portfolio_slug', 'portfolio');
	$portfolio_name = safebyte()->get_theme_opt('portfolio_name', 'Portfolio');
	$service_display = safebyte()->get_theme_opt('service_display', 'on');
	$service_slug = safebyte()->get_theme_opt('service_slug', 'service');
	$service_name = safebyte()->get_theme_opt('service_name', 'Services');
	$industries_display = safebyte()->get_theme_opt('industries_display', 'on');
	$industries_slug = safebyte()->get_theme_opt('industries_slug', 'industries');
	$industries_name = safebyte()->get_theme_opt('industries_name', 'Industries');
	if($portfolio_display == 'on') {
		$portfolio_status = true;
	} else {
		$portfolio_status = false;
	}
	if($service_display == 'on') {
		$service_status = true;
	} else {
		$service_status = false;
	}
	if($industries_display == 'on') {
		$industries_status = true;
	} else {
		$industries_status = false;
	}

	$postypes['portfolio'] = array(
		'status' => $portfolio_status,
		'item_name'  => $portfolio_name,
		'items_name' => $portfolio_name,
		'args'       => array(
			'rewrite'             => array(
                'slug'       => $portfolio_slug,
 		 	),
		),
	);

	$postypes['service'] = array(
		'status' => $service_status,
		'item_name'  => $service_name,
		'items_name' => $service_name,
		'args'       => array(
			'rewrite'             => array(
                'slug'       => $service_slug,
 		 	),
		),
	);

	$postypes['industries'] = array(
		'status' => $industries_status,
		'item_name'  => $industries_name,
		'items_name' => $industries_name,
		'args'       => array(
			'rewrite'             => array(
				'slug'       => $industries_slug,
		 	),
		),
	);
  
	return $postypes;
}

/* Custom Archive Post Type Link */
add_filter( 'post_type_archive_link', 'safebyte_get_post_type_archive_link', 10, 2 );
function safebyte_get_post_type_archive_link($link, $post_type){

	if( $post_type == 'portfolio'){
		$port_archive_link = safebyte()->get_theme_opt('archive_portfolio_link', '');
		    if( !empty($port_archive_link) ){ 
		  	$link = get_permalink($port_archive_link);
		}
	}

	if( $post_type == 'service'){
		$port_archive_link = safebyte()->get_theme_opt('archive_service_link', '');
		    if( !empty($port_archive_link) ){ 
		  	$link = get_permalink($port_archive_link);
		}
	}

	if( $post_type == 'industries'){
		$port_archive_link = safebyte()->get_theme_opt('archive_industries_link', '');
		    if( !empty($port_archive_link) ){ 
		  	$link = get_permalink($port_archive_link);
		}
	}

  return $link;
}

add_filter( 'pxl_extra_taxonomies', 'safebyte_add_tax' );
function safebyte_add_tax( $taxonomies ) {

	$taxonomies['portfolio-category'] = array(
		'status'     => true,
		'post_type'  => array( 'portfolio' ),
		'taxonomy'   => 'Portfolio Categories',
		'taxonomies' => 'Portfolio Categories',
		'args'       => array(
			'rewrite'             => array(
                'slug'       => 'portfolio-category'
 		 	),
		),
		'labels'     => array()
	);

	$taxonomies['service-category'] = array(
		'status'     => true,
		'post_type'  => array( 'service' ),
		'taxonomy'   => 'Service Categories',
		'taxonomies' => 'Service Categories',
		'args'       => array(
			'rewrite'             => array(
                'slug'       => 'service-category'
 		 	),
		),
		'labels'     => array()
	);

	$taxonomies['industries-category'] = array(
		'status'     => true,
		'post_type'  => array( 'industries' ),
		'taxonomy'   => 'Industry Categories',
		'taxonomies' => 'Industry Categories',
		'args'       => array(
			'rewrite'             => array(
                'slug'       => 'industries-category'
		 	),
		),
		'labels'     => array()
	);
	
	return $taxonomies;
}

add_filter( 'pxl_theme_builder_post_types', 'safebyte_theme_builder_post_type' );
function safebyte_theme_builder_post_type($postypes){
	//default are header, footer, mega-menu
	return $postypes;
}

add_filter( 'pxl_theme_builder_layout_ids', 'safebyte_theme_builder_layout_id' );
function safebyte_theme_builder_layout_id($layout_ids){
	//default [], 
	$header_layout        = (int)safebyte()->get_opt('header_layout');
	$header_sticky_layout = (int)safebyte()->get_opt('header_sticky_layout');
	$footer_layout        = (int)safebyte()->get_opt('footer_layout');
	$ptitle_layout        = (int)safebyte()->get_opt('ptitle_layout');
	$product_bottom_content        = (int)safebyte()->get_opt('product_bottom_content');
	if( $header_layout > 0) 
		$layout_ids[] = $header_layout;
	if( $header_sticky_layout > 0) 
		$layout_ids[] = $header_sticky_layout;
	if( $footer_layout > 0) 
		$layout_ids[] = $footer_layout;
	if( $ptitle_layout > 0) 
		$layout_ids[] = $ptitle_layout;
	if( $product_bottom_content > 0) 
		$layout_ids[] = $product_bottom_content;

	$slider_template = safebyte_get_templates_option('slider');
	if( count($slider_template) > 0){
		foreach ($slider_template as $key => $value) {
			$layout_ids[] = $key;
		}
	}

	$tab_template = safebyte_get_templates_option('tab');
	if( count($tab_template) > 0){
		foreach ($tab_template as $key => $value) {
			$layout_ids[] = $key;
		}
	}
	
	$mega_menu_id = safebyte_get_mega_menu_builder_id();
	if(!empty($mega_menu_id))
		$layout_ids = array_merge($layout_ids, $mega_menu_id);

	$page_popup_id = safebyte_get_page_popup_builder_id();
	if(!empty($page_popup_id))
		$layout_ids = array_merge($layout_ids, $page_popup_id);

	return $layout_ids;
}

add_filter( 'pxl_wg_get_source_id_builder', 'safebyte_wg_get_source_builder' );
function safebyte_wg_get_source_builder($wg_datas){
  $wg_datas['tabs'] = ['control_name' => 'tabs', 'source_name' => 'content_template'];
  $wg_datas['slides'] = ['control_name' => 'slides', 'source_name' => 'slide_template'];
  return $wg_datas;
}

/* Update primary color in Editor Builder */
add_action( 'elementor/preview/enqueue_styles', 'safebyte_add_editor_preview_style' );
function safebyte_add_editor_preview_style(){
    wp_add_inline_style( 'editor-preview', safebyte_editor_preview_inline_styles() );
}
function safebyte_editor_preview_inline_styles(){
    $theme_colors = safebyte_configs('theme_colors');
    ob_start();
        echo '.elementor-edit-area-active {';
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
        echo '}';
    return ob_get_clean();
}
 
add_filter( 'get_the_archive_title', 'safebyte_archive_title_remove_label' );
function safebyte_archive_title_remove_label( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = get_the_author();
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_home() ) {
		$title = single_post_title( '', false );
	}

	return $title;
}

add_filter( 'comment_reply_link', 'safebyte_comment_reply_text' );
function safebyte_comment_reply_text( $link ) {
	$link = str_replace( 'Reply', ''.esc_attr__('Reply', 'safebyte').'', $link );
	return $link;
}
add_filter( 'pxl_enable_pagepopup', 'safebyte_enable_pagepopup' );
function safebyte_enable_pagepopup() {
	return false;
}
add_filter( 'pxl_enable_megamenu', 'safebyte_enable_megamenu' );
function safebyte_enable_megamenu() {
	return true;
}
add_filter( 'pxl_enable_onepage', 'safebyte_enable_onepage' );
function safebyte_enable_onepage() {
	return true;
}

add_filter( 'pxl_support_awesome_pro', 'safebyte_support_awesome_pro' );
function safebyte_support_awesome_pro() {
	return true;
}
 
add_filter( 'redux_pxl_iconpicker_field/get_icons', 'safebyte_add_icons_to_pxl_iconpicker_field' );
function safebyte_add_icons_to_pxl_iconpicker_field($icons){
	$custom_icons = []; //'Flaticon' => array(array('flaticon-marker' => 'flaticon-marker')),
	$icons = array_merge($custom_icons, $icons);
	return $icons;
}


add_filter("pxl_mega_menu/get_icons", "safebyte_add_icons_to_megamenu");
function safebyte_add_icons_to_megamenu($icons){
	$custom_icons = []; //'Flaticon' => array(array('flaticon-marker' => 'flaticon-marker')),
	$icons = array_merge($custom_icons, $icons);
	return $icons;
}
 

/**
 * Move comment field to bottom
 */
add_filter( 'comment_form_fields', 'safebyte_comment_field_to_bottom' );
function safebyte_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}


/* ------Disable Lazy loading---- */
add_filter( 'wp_lazy_loading_enabled', '__return_false' );

/* ------ Export Settings ---- */
add_filter( 'pxl_export_wp_settings', 'safebyte_export_wp_settings' );
function safebyte_export_wp_settings($wp_options){
  $wp_options[] = 'mc4wp_default_form_id';
  return $wp_options;
}

/* ------ Theme Info ---- */
add_filter( 'pxl_server_info', 'safebyte_add_server_info');
function safebyte_add_server_info($infos){
  $infos = [
    'api_url' => 'https://api.casethemes.net/',
    'docs_url' => 'https://doc.casethemes.net/safebyte/',
    'plugin_url' => 'https://api.casethemes.net/plugins/',
    'demo_url' => 'https://demo.casethemes.net/safebyte/',
    'support_url' => 'https://casethemes.ticksy.com/',
    'help_url' => 'https://doc.casethemes.net/safebyte',
    'email_support' => 'casethemesagency@gmail.com',
    'video_url' => '#'
  ];
  
  return $infos;
}

/* ------ Template Filter ---- */
add_filter( 'pxl_template_type_support', 'safebyte_template_type_support' );
function safebyte_template_type_support($type) {
	$extra_type = [
		'header'       => esc_html__('Header Desktop', 'safebyte'),
		'header-mobile'          => esc_html__('Header Mobile', 'safebyte'),
        'footer'       => esc_html__('Footer', 'safebyte'), 
        'mega-menu'    => esc_html__('Mega Menu', 'safebyte') ,
		'page-title'          => esc_html__('Page Title', 'safebyte'), 
		'hidden-panel'          => esc_html__('Hidden Panel', 'safebyte'), 
		'tab'          => esc_html__('Tab', 'safebyte'), 
		'popup'          => esc_html__('Popup', 'safebyte'),
		'page'          => esc_html__('Page', 'safebyte'),
		'slider'          => esc_html__('Slider', 'safebyte'),
	];
	return $extra_type;
}

/* Taxonomy Meta Register */ 
add_action( 'pxl_taxonomy_meta_register', 'safebyte_tax_options_register' );
function safebyte_tax_options_register( $metabox ) {
   
	$panels = [
		'category' => [
			'opt_name'            => 'tax_post_option',
			'display_name'        => esc_html__( 'Safebyte Settings', 'safebyte' ),
			'show_options_object' => false,
			'sections'  => [
				'tax_post_settings' => [
					'title'  => esc_html__( 'Safebyte Settings', 'safebyte' ),
					'icon'   => 'el el-refresh',
					'fields' => array(

						array(
				            'id'       => 'bg_category',
				            'type'     => 'media',
				            'title'    => esc_html__('Select Banner', 'safebyte'),
				            'default'  => '',
				            'url'      => false,
				        ),

					)
				]
			]
		],
		    
	];
 
	$metabox->add_meta_data( $panels );
}

/* Switch Swiper Version  */
add_filter( 'pxl-swiper-version-active', 'safebyte_set_swiper_version_active' );
function safebyte_set_swiper_version_active($version){
  $version = '8.4.5'; //5.3.6, 8.4.5, 10.1.0
  return $version;
}

/* Search Result  */
function safebyte_custom_post_types_in_search_results( $query ) {
    if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
        $query->set( 'post_type', array( 'post', 'portfolio', 'service', 'product' ) );
    }
}
add_action( 'pre_get_posts', 'safebyte_custom_post_types_in_search_results' );

/* Add Custom Font Face */
add_filter( 'elementor/fonts/groups', 'safebyte_update_elementor_font_groups_control' );
function safebyte_update_elementor_font_groups_control($font_groups){
  $pxlfonts_group = array( 'pxlfonts' => esc_html__( 'Safebyte Fonts', 'safebyte' ) );
  return array_merge( $pxlfonts_group, $font_groups );
}

add_filter( 'elementor/fonts/additional_fonts', 'safebyte_update_elementor_font_control' );
function safebyte_update_elementor_font_control($additional_fonts){
  $additional_fonts['Julietta-Messie'] = 'pxlfonts';
  $additional_fonts['GTWalsheimPro'] = 'pxlfonts';
  return $additional_fonts;
}

// add custom font to redux
add_filter( 'redux/'.safebyte()->get_option_name().'/field/typography/custom_fonts', 'safebyte_add_redux_option_typo_customfont', 10, 1 ); 
function safebyte_add_redux_option_typo_customfont($fonts){
	$fonts = [
		'Theme Custom Fonts' => [
		]
	];
	return $fonts;
}

/* Edit Popup Elementor Pro */
function safebyte_fix_elementor_popup_location( $that ){
    $loc = $that->get_location('popup');
    
    if( ! $loc['edit_in_content'] ){
        $args = [
            'label'           => $loc['label'],
            'multiple'        => $loc['multiple'],
            'public'          => $loc['public'],
            'edit_in_content' => true,
            'hook'            => $loc['hook'],
        ];
        
        $that->register_location('popup', $args);
    }
}
add_action('elementor/theme/register_locations', 'safebyte_fix_elementor_popup_location', 9999999 );