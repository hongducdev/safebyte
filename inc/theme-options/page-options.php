<?php
 
add_action( 'pxl_post_metabox_register', 'safebyte_page_options_register' );
function safebyte_page_options_register( $metabox ) {
 
	$panels = [
		'post' => [
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Options', 'safebyte' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'post_settings' => [
					'title'  => esc_html__( 'Post Options', 'safebyte' ),
					'icon'   => 'el el-cog',
					'fields' => array_merge(
						safebyte_sidebar_pos_opts(['prefix' => 'post_', 'default' => true, 'default_value' => '-1']),
						array(
							array(
					            'id'=> 'post_video_link',
					            'type' => 'text',
					            'title' => esc_html__('Video Link', 'safebyte'),
					            'validate' => 'url',
					            'default' => '',
					        ),
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'safebyte' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
					    )
					)
				]
			]
		],
		'page' => [
			'opt_name'            => 'pxl_page_options',
			'display_name'        => esc_html__( 'Page Options', 'safebyte' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'Header', 'safebyte' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
				        safebyte_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						safebyte_header_mobile_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
				                'id'       => 'header_display',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Header Display', 'safebyte'),
				                'options'  => array(
				                    'show' => esc_html__('Show', 'safebyte'),
				                    'hide'  => esc_html__('Hide', 'safebyte'),
				                ),
				                'default'  => 'show',
				            ),
				            array(
				                'id'       => 'page_mobile_style',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Mobile Style', 'safebyte'),
				                'options'  => array(
				                    'inherit'  => esc_html__('Inherit', 'safebyte'),
				                    'light'  => esc_html__('Light', 'safebyte'),
				                    'dark'  => esc_html__('Dark', 'safebyte'),
				                ),
				                'default'  => 'inherit',
				            ),
				            array(
				           		'id'       => 'logo_m',
					            'type'     => 'media',
					            'title'    => esc_html__('Mobile Logo Dark', 'safebyte'),
					            'default'  => '',
					            'url'      => false,
					        ),
					        array(
				           		'id'       => 'logo_light_m',
					            'type'     => 'media',
					            'title'    => esc_html__('Mobile Logo Light', 'safebyte'),
					            'default'  => '',
					            'url'      => false,
					        ),
					        array(
				                'id'       => 'p_menu',
				                'type'     => 'select',
				                'title'    => esc_html__( 'Menu', 'safebyte' ),
				                'options'  => safebyte_get_nav_menu_slug(),
				                'default' => '',
				                'description' => 'When you select Custom Menu. The custom menu will apply to the entire layout when you use Case Nav Menu widget in Elementor and Menu on header layout in Mobile.'
				            ),
					    ),
					    array(
				            array(
				                'id'       => 'sticky_scroll',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Sticky Scroll', 'safebyte'),
				                'options'  => array(
				                    '-1' => esc_html__('Inherit', 'safebyte'),
				                    'pxl-sticky-stt' => esc_html__('Scroll To Top', 'safebyte'),
				                    'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'safebyte'),
				                ),
				                'default'  => '-1',
				            ),
				            array(
				                'id'       => 'header_margin',
				                'type'     => 'spacing',
				                'mode'     => 'margin',
				                'title'    => esc_html__('Margin', 'safebyte'),
				                'width'    => false,
				                'unit'     => 'px',
				                'output'    => array('#pxl-header-elementor .pxl-header-elementor-main'),
				            ),
				        )
				    )
					 
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'safebyte' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        safebyte_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'safebyte' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						safebyte_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'safebyte' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
					    )
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'safebyte' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        safebyte_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
				                'id'       => 'footer_display',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Footer Display', 'safebyte'),
				                'options'  => array(
				                    'show' => esc_html__('Show', 'safebyte'),
				                    'hide'  => esc_html__('Hide', 'safebyte'),
				                ),
				                'default'  => 'show',
				            ),
							array(
				                'id'       => 'p_footer_fixed',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Footer Fixed', 'safebyte'),
				                'options'  => array(
				                    'inherit' => esc_html__('Inherit', 'safebyte'),
				                    'on' => esc_html__('On', 'safebyte'),
				                    'off' => esc_html__('Off', 'safebyte'),
				                ),
				                'default'  => 'inherit',
				            ),
				            array(
				                'id'       => 'back_top_top_style',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Back to Top Style', 'safebyte'),
				                'options'  => array(
				                    'style-default' => esc_html__('Default', 'safebyte'),
				                    'style-round' => esc_html__('Round', 'safebyte'),
				                ),
				                'default'  => 'style-default',
				            ),
						)
				    )
				],
				'colors' => [
					'title'  => esc_html__( 'Colors', 'safebyte' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        array(
				        	array(
							    'id'        => 'page_body_color',
							    'type'      => 'color',
							    'title'     => esc_html__('Body Background Color', 'safebyte'),
							    'default'   => '',
							    'transparent' => false,
							    'output'    => array(
							        'background-color' => 'body',
							    )
							),
				        	array(
					            'id'          => 'primary_color',
					            'type'        => 'color',
					            'title'       => esc_html__('Primary Color', 'safebyte'),
					            'transparent' => false,
					            'default'     => ''
					        ),
					        array(
					            'id'          => 'gradient_color',
					            'type'        => 'color_gradient',
					            'title'       => esc_html__('Gradient Color', 'safebyte'),
					            'transparent' => false,
					            'default'  => array(
					                'from' => '',
					                'to'   => '', 
					            ),
					        ),
					    )
				    )
				],
				'extra' => [
					'title'  => esc_html__( 'Extra', 'safebyte' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        array(
				        	array(
					            'id' => 'body_custom_class',
					            'type' => 'text',
					            'title' => esc_html__('Body Custom Class', 'safebyte'),
					        ),
					    )
				    )
				]
			]
		],
		'portfolio' => [
			'opt_name'            => 'pxl_portfolio_options',
			'display_name'        => esc_html__( 'Portfolio Options', 'safebyte' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'safebyte' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
					            'id'=> 'portfolio_excerpt',
					            'type' => 'textarea',
					            'title' => esc_html__('Excerpt', 'safebyte'),
					            'validate' => 'html_custom',
					            'default' => '',
					        ),
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Content Spacing Top/Bottom', 'safebyte' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
						)
				    )
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'safebyte' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        safebyte_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
			]
		],
		'service' => [
			'opt_name'            => 'pxl_service_options',
			'display_name'        => esc_html__( 'Service Options', 'safebyte' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'safebyte' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
					            'id'=> 'service_external_link',
					            'type' => 'text',
					            'title' => esc_html__('External Link', 'safebyte'),
					            'validate' => 'url',
					            'default' => '',
					        ),
							array(
					            'id'=> 'service_excerpt',
					            'type' => 'textarea',
					            'title' => esc_html__('Excerpt', 'safebyte'),
					            'validate' => 'html_custom',
					            'default' => '',
					        ),
							array(
								'id' => 'service_feature',
								'type' => 'multi_text',
								'title' => esc_html__('Feature', 'safebyte'),
								'validate' => 'html',
							),
					        array(
					            'id'       => 'service_icon_type',
					            'type'     => 'button_set',
					            'title'    => esc_html__('Icon Type', 'safebyte'),
					            'options'  => array(
					                'icon'  => esc_html__('Icon', 'safebyte'),
					                'image'  => esc_html__('Image', 'safebyte'),
					            ),
					            'default'  => 'icon'
					        ),
					        array(
					            'id'       => 'service_icon_font',
					            'type'     => 'pxl_iconpicker',
					            'title'    => esc_html__('Icon', 'safebyte'),
					            'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'icon' ),
            					'force_output' => true
					        ),
					        array(
					            'id'       => 'service_icon_img',
					            'type'     => 'media',
					            'title'    => esc_html__('Icon Image', 'safebyte'),
					            'default' => '',
					            'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'image' ),
				            	'force_output' => true
					        ),
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Content Spacing Top/Bottom', 'safebyte' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
						),
						safebyte_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'safebyte' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        safebyte_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
			]
		],
		'industries' => [
			'opt_name'            => 'pxl_industries_options',
			'display_name'        => esc_html__( 'Industry Options', 'safebyte' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'safebyte' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
					            'id'=> 'industries_external_link',
					            'type' => 'text',
					            'title' => esc_html__('External Link', 'safebyte'),
					            'validate' => 'url',
					            'default' => '',
					        ),
							array(
					            'id'=> 'industries_excerpt',
					            'type' => 'textarea',
					            'title' => esc_html__('Excerpt', 'safebyte'),
					            'validate' => 'html_custom',
					            'default' => '',
					        ),
					        array(
					            'id'       => 'industries_icon_type',
					            'type'     => 'button_set',
					            'title'    => esc_html__('Icon Type', 'safebyte'),
					            'options'  => array(
					                'icon'  => esc_html__('Icon', 'safebyte'),
					                'image'  => esc_html__('Image', 'safebyte'),
					            ),
					            'default'  => 'icon'
					        ),
					        array(
					            'id'       => 'industries_icon_font',
					            'type'     => 'pxl_iconpicker',
					            'title'    => esc_html__('Icon', 'safebyte'),
					            'required' => array( 0 => 'industries_icon_type', 1 => 'equals', 2 => 'icon' ),
            					'force_output' => true
					        ),
					        array(
					            'id'       => 'industries_icon_img',
					            'type'     => 'media',
					            'title'    => esc_html__('Icon Image', 'safebyte'),
					            'default' => '',
					            'required' => array( 0 => 'industries_icon_type', 1 => 'equals', 2 => 'image' ),
				            	'force_output' => true
					        ),
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Content Spacing Top/Bottom', 'safebyte' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
						),
						safebyte_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'safebyte' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        safebyte_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
			]
		],
		

		'pxl-template' => [ //post_type
			'opt_name'            => 'pxl_hidden_template_options',
			'display_name'        => esc_html__( 'Template Options', 'safebyte' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'safebyte' ),
					'icon'   => 'el-icon-website',
					'fields' => array(
						array(
							'id'    => 'template_type',
							'type'  => 'select',
							'title' => esc_html__('Type', 'safebyte'),
				            'options' => [
				            	'df'       	   => esc_html__('Select Type', 'safebyte'), 
								'header'       => esc_html__('Header Desktop', 'safebyte'),
								'header-mobile'       => esc_html__('Header Mobile', 'safebyte'),
								'footer'       => esc_html__('Footer', 'safebyte'), 
								'mega-menu'    => esc_html__('Mega Menu', 'safebyte'), 
								'page-title'   => esc_html__('Page Title', 'safebyte'), 
								'tab' => esc_html__('Tab', 'safebyte'),
								'hidden-panel' => esc_html__('Hidden Panel', 'safebyte'),
								'popup' => esc_html__('Popup', 'safebyte'),
								'page' => esc_html__('Page', 'safebyte'),
								'slider' => esc_html__('Slider', 'safebyte'),
				            ],
				            'default' => 'df',
				        ),
				        array(
							'id'    => 'header_type',
							'type'  => 'select',
							'title' => esc_html__('Header Type', 'safebyte'),
				            'options' => [
				            	'px-header--default'       	   => esc_html__('Default', 'safebyte'), 
								'px-header--transparent'       => esc_html__('Transparent', 'safebyte'),
								'px-header--left_sidebar'       => esc_html__('Left Sidebar', 'safebyte'),
				            ],
				            'default' => 'px-header--default',
				            'indent' => true,
                			'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'header' ),
				        ),

				        array(
							'id'    => 'header_mobile_type',
							'type'  => 'select',
							'title' => esc_html__('Header Type', 'safebyte'),
				            'options' => [
				            	'px-header--default'       	   => esc_html__('Default', 'safebyte'), 
								'px-header--transparent'       => esc_html__('Transparent', 'safebyte'),
				            ],
				            'default' => 'px-header--default',
				            'indent' => true,
                			'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'header-mobile' ),
				        ),

				        array(
							'id'    => 'hidden_panel_position',
							'type'  => 'select',
							'title' => esc_html__('Hidden Panel Position', 'safebyte'),
				            'options' => [
				            	'top'       	   => esc_html__('Top', 'safebyte'),
				            	'right'       	   => esc_html__('Right', 'safebyte'),
				            ],
				            'default' => 'right',
				            'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'hidden-panel' ),
				        ),
				        array(
				            'id'          => 'hidden_panel_height',
				            'type'        => 'text',
				            'title'       => esc_html__('Hidden Panel Height', 'safebyte'),
				            'subtitle'       => esc_html__('Enter number.', 'safebyte'),
				            'transparent' => false,
				            'default'     => '',
				            'force_output' => true,
				            'required' => array( 0 => 'hidden_panel_position', 1 => 'equals', 2 => 'top' ),
				        ),
				        array(
				            'id'          => 'hidden_panel_boxcolor',
				            'type'        => 'color',
				            'title'       => esc_html__('Box Color', 'safebyte'),
				            'transparent' => false,
				            'default'     => '',
				            'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'hidden-panel' ),
				        ),
				        array(
				            'id'          => 'header_sidebar_width',
				            'type'        => 'slider',
				            'title'       => esc_html__('Header Sidebar Width', 'safebyte'),
				            "default"   => 300,
						    "min"       => 50,
						    "step"      => 1,
						    "max"       => 900,
				            'force_output' => true,
				            'required' => array( 0 => 'header_type', 1 => 'equals', 2 => 'px-header--left_sidebar' ),
				        ),

				        array(
							'id'    => 'header_sidebar_style',
							'type'  => 'select',
							'title' => esc_html__('Header Sidebar Style', 'safebyte'),
				            'options' => [
				            	'px-header-sidebar-style1'      => esc_html__('Style 1', 'safebyte'), 
								'px-header-sidebar-style2'      => esc_html__('Style 2', 'safebyte'),
				            ],
				            'default' => 'px-header-sidebar-style1',
				            'indent' => true,
                			'required' => array( 0 => 'header_type', 1 => 'equals', 2 => 'px-header--left_sidebar' ),
				        ),
					),
				    
				],
			]
		],
	];
 
	$metabox->add_meta_data( $panels );
}
 