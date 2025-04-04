<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_showcase',
        'title' => esc_html__('Case Showcase', 'safebyte'),
        'icon' => 'eicon-parallax',
        'categories' => array('pxltheme-core'),
        'script' => ['safebyte-showcase'],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style-layout',
                            'label' => esc_html__('Style','safebyte'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => esc_html__('Style 1','safebyte'),
                                'style-2' => esc_html__('Style 2','safebyte'),
                            ],
                            'default' => 'style-1',
                        ),
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Image', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link','safebyte'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'safebyte' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-showcase .pxl-item--title',
                            'condition' => [
                                'layout' => '2',
                            ],
                        ),
                        array(
                            'name' => 'btn_text',
                            'label' => esc_html__('Button Text 1', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'coming_soon' => 'no',
                                'style-layout' => 'style-1',
                            ],
                        ),
                        array(
                            'name' => 'btn_link',
                            'label' => esc_html__('Button Link 1', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'label_block' => true,
                            'condition' => [
                                'coming_soon' => 'no',
                                'style-layout' =>'style-1',
                            ],
                        ),
                        array(
                            'name' => 'btn_text2',
                            'label' => esc_html__('Button Text 2', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'coming_soon' => 'no',
                                'style-layout' =>'style-1'
                            ],
                        ),
                        array(
                            'name' => 'btn_link2',
                            'label' => esc_html__('Button Link 2', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'label_block' => true,
                            'condition' => [
                                'coming_soon' => 'no',
                                'style-layout' =>'style-1'
                            ],
                        ),
                        array(
                            'name' => 'coming_soon',
                            'label' => esc_html__('Coming Soon', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'no',
                        )
                    ),
                ),
                array(
                    'name' =>'section_style', 
                    'label' => esc_html__('Style','safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'border_type',
                            'label' => esc_html__( 'Border Type', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__( 'None', 'safebyte' ),
                                'solid' => esc_html__( 'Solid', 'safebyte' ),
                                'double' => esc_html__( 'Double', 'safebyte' ),
                                'dotted' => esc_html__( 'Dotted', 'safebyte' ),
                                'dashed' => esc_html__( 'Dashed', 'safebyte' ),
                                'groove' => esc_html__( 'Groove', 'safebyte' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase' => 'border-style: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'border_width',
                            'label' => esc_html__( 'Border Width', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                            'responsive' => true,
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__( 'Border Color', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase' => 'border-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                        ),
                    ),
                ),
                safebyte_widget_animation_settings(),
            ),
        ),
    ),
    safebyte_get_class_widget_path()
);