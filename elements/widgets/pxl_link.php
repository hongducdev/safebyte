<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_link',
        'title' => esc_html__('Case Links', 'safebyte'),
        'icon' => 'eicon-editor-link',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'safebyte'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                    'description' => 'Create Highlight text with shortcode: [highlight text="Text"]',
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'safebyte'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'safebyte' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                            ),
                            'title_field' => '{{{ text }}}',
                        ),
                        array(
                            'name' => 'l_width',
                            'label' => esc_html__('Max Width', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-link' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'wg_title',
                            'label' => esc_html__('Widget Title', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_link',
                    'label' => esc_html__('Link', 'safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'type',
                            'label' => esc_html__('Type', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'type-vertical' => 'Vertical',
                                'type-horizontal' => 'Horizontal',
                            ],
                            'default' => 'type-vertical',
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => 'Default',
                                'style-hover-divider' => 'Hover Divider 1',
                                'style-hover-divider2' => 'Hover Divider 2',
                                'style-hover-divider3' => 'Hover Divider 3',
                                'style-square-shape1' => 'Square Shape 1',
                                'style-characters' => 'Characters',
                                'style-round-box' => 'Round Box',
                            ],
                            'default' => 'style-default',
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
                                'justify' => [
                                    'title' => esc_html__( 'Justified', 'safebyte' ),
                                    'icon' => 'eicon-text-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-link' => 'text-align: {{VALUE}}; justify-content: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'link_color',
                            'label' => esc_html__('Color', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-link a:not(:hover)' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'link_color_hover',
                            'label' => esc_html__('Color Hover', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-link a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_divider',
                            'label' => esc_html__('Color Divider', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-link a span:before, {{WRAPPER}} .pxl-link a span:after' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'style' => ['style-hover-divider','style-hover-divider2'],
                            ],
                        ),
                        array(
                            'name' => 'color_divider_vertical',
                            'label' => esc_html__('Color Divider Vertical', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-link .pxl-item--link::after' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'style' => ['style-hover-divider','style-hover-divider2'],
                            ],
                        ),
                        array(
                            'name' => 'weight_divider',
                            'label' => esc_html__('Weight Divider', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 10000,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-link a span:before, {{WRAPPER}} .pxl-link a span:after' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'style' => ['style-hover-divider','style-hover-divider2'],
                            ],
                        ),
                        array(
                            'name' => 'link_typography',
                            'label' => esc_html__('Typography', 'safebyte' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-link a',
                        ),
                        array(
                            'name' => 'link_typography_hover',
                            'label' => esc_html__('Typography Hover', 'safebyte' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-link a:hover',
                        ),
                        array(
                            'name' => 'bottom_spacer',
                            'label' => esc_html__('Vertical Spacer', 'safebyte' ),
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
                                '{{WRAPPER}} .pxl-link.type-vertical li + li' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'type' => ['type-vertical'],
                            ],
                        ),
                        array(
                            'name' => 'left_spacer',
                            'label' => esc_html__('Horizontal Spacer Left', 'safebyte' ),
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
                                '{{WRAPPER}} .pxl-link.type-horizontal li' => 'margin-left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'type' => ['type-horizontal'],
                            ],
                        ),
                        array(
                            'name' => 'right_spacer',
                            'label' => esc_html__('Horizontal Spacer Right', 'safebyte' ),
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
                                '{{WRAPPER}} .pxl-link.type-horizontal li' => 'margin-right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'type' => ['type-horizontal'],
                            ],
                        ),
                        array(
                            'name' => 'align_items',
                            'label' => esc_html__('Align Items', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'flex-start' => [
                                    'title' => esc_html__( 'Flex Start', 'safebyte' ),
                                    'icon' => 'far fa-arrow-alt-to-top',
                                ],
                                'Center' => [
                                    'title' => esc_html__( 'Center', 'safebyte' ),
                                    'icon' => 'far fa-arrows-alt-v',
                                ],
                                'flex-end' => [
                                    'title' => esc_html__( 'Flex End', 'safebyte' ),
                                    'icon' => 'far fa-arrow-alt-to-bottom',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-link li a' => 'align-items: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_icon',
                    'label' => esc_html__('Icon', 'safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style!' => ['style-round-box'],
                    ],
                    'controls' => array_merge(
                        safebyte_widget_color_type([
                            'prefix' => 'icon',
                            'selectors_class' => '.pxl-link a .pxl-link--icon i',
                        ]),
                        safebyte_widget_bgcolor_type([
                            'prefix' => 'bg_icon',
                            'selectors_class' => '.pxl-link a .pxl-link--icon',
                        ]),
                        array(
                            array(
                                'name' => 'icon_space_top',
                                'label' => esc_html__('Top Spacer', 'safebyte' ),
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
                                    '{{WRAPPER}} .pxl-link a .pxl-link--icon' => 'margin-top: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'icon_space_left',
                                'label' => esc_html__('Left Spacer', 'safebyte' ),
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
                                    '{{WRAPPER}} .pxl-link a .pxl-link--icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'icon_space_right',
                                'label' => esc_html__('Right Spacer', 'safebyte' ),
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
                                    '{{WRAPPER}} .pxl-link a .pxl-link--icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                                ],
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
                                    '{{WRAPPER}} .pxl-link a .pxl-link--icon' => 'font-size: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .pxl-link a .pxl-link--icon svg' => 'height: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'icon_width',
                                'label' => esc_html__('Box Width', 'safebyte' ),
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
                                    '{{WRAPPER}} .pxl-link a .pxl-link--icon' => 'min-width: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'icon_box_width',
                                'label' => esc_html__('Box Height', 'safebyte' ),
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
                                    '{{WRAPPER}} .pxl-link a .pxl-link--icon' => 'height: {{SIZE}}{{UNIT}};justify-content: center; align-items: center;',
                                ],
                            ),
                            array(
                                'name' => 'icon_border_radius',
                                'label' => esc_html__('Box Border Radius', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-link a .pxl-link--icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name'         => 'icon_box_shadow',
                                'label' => esc_html__( 'Icon Shadow', 'safebyte' ),
                                'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .pxl-link a .pxl-link--icon',
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'section_style_highlight',
                    'label' => esc_html__('Highlight', 'safebyte' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'highlight_color',
                                'label' => esc_html__('Color', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-link .pxl-title--highlight' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'highlight_typography',
                                'label' => esc_html__('Typography', 'safebyte' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-link .pxl-title--highlight',
                            ),
                        )
                    ),
                ),
                safebyte_widget_animation_settings(),
            ),
        ),
    ),
    safebyte_get_class_widget_path()
);