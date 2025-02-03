<?php
$templates_df = ['0' => esc_html__('None', 'safebyte')];
$templates = $templates_df + safebyte_get_templates_option('page') ;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_button',
        'title' => esc_html__('Case Button', 'safebyte' ),
        'icon' => 'eicon-button',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'safebyte' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'btn_style',
                            'label' => esc_html__('Type', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'btn-default',
                            'options' => [
                                'btn-default' => esc_html__('Default', 'safebyte' ),
                                'btn-text-underline' => esc_html__('Text Underline', 'safebyte' ),
                                'btn-gradient-rotate' => esc_html__('Gradient Rotate', 'safebyte' ),
                                'btn-gradient-horizontal' => esc_html__('Gradient Horizontal 1', 'safebyte' ),
                                'btn-gradient-horizontal2' => esc_html__('Gradient Horizontal 2', 'safebyte' ),
                                'btn-icon-box' => esc_html__('Icon Box 1', 'safebyte' ),
                                'btn-icon-box2' => esc_html__('Icon Box 2', 'safebyte' ),
                                'btn-icon-box3' => esc_html__('Icon Box 3', 'safebyte' ),
                                'btn-icon-box4' => esc_html__('Icon Box 4', 'safebyte' ),
                            ],
                        ),
                        array(
                            'name' => 'text',
                            'label' => esc_html__('Text', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Click Here', 'safebyte'),
                        ),
                        array(
                            'name' => 'btn_action',
                            'label' => esc_html__('Action', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'pxl-atc-link',
                            'options' => [
                                'pxl-atc-link' => esc_html__('Link', 'safebyte' ),
                                'pxl-atc-popup' => esc_html__('Popup', 'safebyte' ),
                            ],
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'default' => [
                                'url' => '#',
                            ],
                            'condition' => [
                                'btn_action' => ['pxl-atc-link'],
                            ],
                        ),

                        array(
                            'name' => 'popup_template',
                            'label' => esc_html__('Select Popup Template', 'safebyte'),
                            'type' => 'select',
                            'options' => $templates,
                            'default' => 'df',
                            'description' => 'Add new tab template: "<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '" target="_blank">Click Here</a>"',
                            'condition' => [
                                'btn_action' => ['pxl-atc-popup'],
                            ],
                        ),

                        array(
                            'name' => 'align',
                            'label' => esc_html__('Alignment', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left'    => [
                                    'title' => esc_html__('Left', 'safebyte' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'safebyte' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__('Right', 'safebyte' ),
                                    'icon' => 'fa fa-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__('Justified', 'safebyte' ),
                                    'icon' => 'fa fa-align-justify',
                                ],
                            ],
                            'prefix_class' => 'elementor-align-',
                            'default' => '',
                            'selectors'         => [
                                '{{WRAPPER}} .pxl-button' => 'text-align: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'btn_icon',
                            'label' => esc_html__('Icon', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'label_block' => true,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'icon_align',
                            'label' => esc_html__('Icon Position', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'left',
                            'options' => [
                                'left' => esc_html__('Before', 'safebyte' ),
                                'right' => esc_html__('After', 'safebyte' ),
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button Normal', 'safebyte' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'color',
                                'label' => esc_html__('Color', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_bg_color',
                                'label' => esc_html__('Background Color', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn' => 'background: {{VALUE}};',
                                ],
                                'condition' => [
                                    'btn_style!' => ['btn-text-underline','btn-gradient-rotate','btn-gradient-horizontal','btn-gradient-horizontal2'],
                                ],
                            ),

                            array(
                                'name' => 'btn_typography',
                                'label' => esc_html__('Typography', 'safebyte' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-button .btn',
                            ),
                            array(
                                'name'         => 'btn_box_shadow',
                                'label' => esc_html__( 'Box Shadow', 'safebyte' ),
                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .pxl-button .btn',
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
                                    '{{WRAPPER}} .pxl-button .btn' => 'border-style: {{VALUE}} !important;',
                                ],
                                'condition' => [
                                    'btn_style' => ['btn-default'],
                                ],
                            ),
                            array(
                                'name' => 'border_width',
                                'label' => esc_html__( 'Border Width', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                ],
                                'condition' => [
                                    'border_type!' => '',
                                    'btn_style' => ['btn-default'],
                                ],
                                'responsive' => true,
                            ),
                            array(
                                'name' => 'border_color',
                                'label' => esc_html__( 'Border Color', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'default' => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn' => 'border-color: {{VALUE}} !important;',
                                ],
                                'condition' => [
                                    'border_type!' => '',
                                    'btn_style' => ['btn-default'],
                                ],
                            ),
                        ),

                        array(
                            array(
                                'name' => 'btn_border_radius',
                                'label' => esc_html__('Border Radius', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_padding',
                                'label' => esc_html__('Padding', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'text_inner_margin',
                                'label' => esc_html__('Text Inner Margin', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn .pxl--btn-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'btn_full_width',
                                'label' => esc_html__( 'Full Width', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'btn-block-inline' => esc_html__( 'No', 'safebyte' ),
                                    'btn-block' => esc_html__( 'Yes', 'safebyte' ),
                                ],
                                'default' => 'btn-block-inline',
                            ),
                        )
                    ),
                ),

                array(
                    'name' => 'section_style_button_hover',
                    'label' => esc_html__('Button Hover', 'safebyte' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'color_hover',
                            'label' => esc_html__('Color Hover', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover, {{WRAPPER}} .pxl-button .btn:focus' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color_hover',
                            'label' => esc_html__('Background Color', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover, {{WRAPPER}} .pxl-button .btn:focus' => 'background: {{VALUE}};',
                            ],
                            'condition' => [
                                'btn_style!' => ['btn-text-underline','btn-gradient-rotate','btn-gradient-horizontal','btn-gradient-horizontal2'],
                            ],
                        ),

                        array(
                            'name' => 'border_type_hover',
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
                                '{{WRAPPER}} .pxl-button .btn:hover' => 'border-style: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'btn_style' => ['btn-default'],
                            ],
                        ),
                        array(
                            'name' => 'border_width_hover',
                            'label' => esc_html__( 'Border Width', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'condition' => [
                                'border_type_hover!' => '',
                                'btn_style' => ['btn-default'],
                            ],
                            'responsive' => true,
                        ),
                        array(
                            'name' => 'border_color_hover',
                            'label' => esc_html__( 'Border Color', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover' => 'border-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'border_type_hover!' => '',
                                'btn_style' => ['btn-default'],
                            ],
                        ),

                        array(
                            'name' => 'btn_border_radius_hover',
                            'label' => esc_html__('Border Radius', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover, {{WRAPPER}} .pxl-button .btn:focus' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),

                        array(
                            'name'         => 'btn_box_shadow_hover',
                            'label' => esc_html__( 'Box Shadow', 'safebyte' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-button .btn:hover, {{WRAPPER}} .pxl-button .btn:focus',
                        ),

                        array(
                            'name' => 'btn_text_effect',
                            'label' => esc_html__('Text Effect', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '',
                            'options' => [
                                '' => esc_html__('Default', 'safebyte' ),
                                'btn-text-nina' => esc_html__('Nina', 'safebyte' ),
                                'btn-text-nanuk' => esc_html__('Nanuk', 'safebyte' ),
                                'btn-text-parallax' => esc_html__('Parallax', 'safebyte' ),
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_icon',
                    'label' => esc_html__('Icon', 'safebyte' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Color', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn .pxl--btn-icon' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn svg' => 'fill: {{VALUE}};',
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
                                '{{WRAPPER}} .pxl-button .btn .pxl--btn-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-button .btn svg' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_space_left',
                            'label' => esc_html__('Icon Spacer', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'default' => [
                                'size' => 9,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .pxl-icon--left .pxl--btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'icon_align' => ['left'],
                            ],
                        ),
                        array(
                            'name' => 'icon_space_right',
                            'label' => esc_html__('Icon Spacer', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'default' => [
                                'size' => 9,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .pxl-icon--right .pxl--btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'icon_align' => ['right'],
                            ],
                        ),
                        array(
                            'name' => 'icon_box_color',
                            'label' => esc_html__( 'Box Color Main', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .btn.pxl-icon-active .pxl--btn-icon' => 'background-color: {{VALUE}};--gradient-color-from2: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_box_color_gradient',
                            'label' => esc_html__( 'Box Color Gradient', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .btn.pxl-icon-active .pxl--btn-icon' => '--gradient-color-to2: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_box_width',
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
                                '{{WRAPPER}} .btn.pxl-icon-active .pxl--btn-icon' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_box_height',
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
                                '{{WRAPPER}} .btn.pxl-icon-active .pxl--btn-icon' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_border_radius',
                            'label' => esc_html__('Border Radius', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .btn.pxl-icon-active .pxl--btn-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_margin',
                            'label' => esc_html__('Margin', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .btn.pxl-icon-active .pxl--btn-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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