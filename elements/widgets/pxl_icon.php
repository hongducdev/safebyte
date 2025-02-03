<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_icon',
        'title' => esc_html__('Case Icons', 'safebyte'),
        'icon' => 'eicon-alert',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'icons',
                            'label' => esc_html__('Icons', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'safebyte' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'icon_link',
                                    'label' => esc_html__('Link', 'safebyte'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'label',
                                    'label' => esc_html__('Label', 'safebyte'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'label_position',
                                    'label' => esc_html__('Label Position', 'safebyte' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'ps-top' => 'Top',
                                        'ps-bottom' => 'Bottom',
                                    ],
                                    'default' => 'ps-top',
                                ),
                                array(
                                    'name' => 'color_item',
                                    'label' => esc_html__( 'Color', 'safebyte' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'default' => '',
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-icon1 {{CURRENT_ITEM}}' => 'color: {{VALUE}};',
                                    ],
                                ),
                                array(
                                    'name' => 'color_item_hover',
                                    'label' => esc_html__( 'Color Hover', 'safebyte' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'default' => '',
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-icon1 {{CURRENT_ITEM}}:hover' => 'color: {{VALUE}};',
                                    ],
                                ),
                            ),
                            'title_field' => '{{{ label }}}',
                        ),
                        array(
                          'name' => 'align',
                            'label' => esc_html__( 'Alignment', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'safebyte' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'safebyte' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'safebyte' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_arrange',
                            'label' => esc_html__( 'Arrange', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'icon-horizontal' => esc_html__( 'Horizontal', 'safebyte' ),
                                'icon-vertical' => esc_html__( 'Vertical', 'safebyte' ),
                            ],
                            'default' => 'icon-horizontal'
                        ),
                    ),
                ),
                
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => 'Style 1',
                                'style-2' => 'Style 2 - Box Gradient',
                            ],
                            'default' => 'style-1',
                        ),
                        array(
                            'name' => 'color',
                            'label' => esc_html__( 'Color', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_hover',
                            'label' => esc_html__( 'Icon Color Hover', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_color',
                            'label' => esc_html__( 'Box Color', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a, {{WRAPPER}} .pxl-icon1 a:before' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_color_hover',
                            'label' => esc_html__( 'Box Color Hover', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a:hover' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_width',
                            'label' => esc_html__('Box Width', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_height',
                            'label' => esc_html__('Box Height', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'         => 'icon_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'safebyte' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-icon1 a',
                        ),
                        array(
                            'name' => 'icon_font_size',
                            'label' => esc_html__('Font Size', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
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
                                '{{WRAPPER}} .pxl-icon1 a' => 'border-style: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'border_width',
                            'label' => esc_html__( 'Border Width', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                                '{{WRAPPER}} .pxl-icon1 a' => 'border-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                        ),
                        array(
                            'name' => 'border_color_hover',
                            'label' => esc_html__( 'Border Color Hover', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a:hover' => 'border-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                        ),
                        array(
                            'name' => 'icon_border_radius',
                            'label' => esc_html__('Border Radius', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_margin',
                            'label' => esc_html__('Margin', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-icon1' => 'margin-left: -{{LEFT}}{{UNIT}};margin-right: -{{RIGHT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                    ),
                ),
                safebyte_widget_animation_settings(),
            ),
        ),
    ),
    safebyte_get_class_widget_path()
);