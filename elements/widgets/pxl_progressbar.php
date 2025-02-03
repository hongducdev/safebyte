<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_progressbar',
        'title' => esc_html__( 'Case Progress Bar', 'safebyte' ),
        'icon' => 'eicon-skill-bar',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'pxl-progressbar',
            'safebyte-progressbar',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_layout',
                    'label' => esc_html__('Layout', 'safebyte' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'safebyte' ),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'safebyte' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/img/pxl_progressbar/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__( 'Content', 'safebyte' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'progressbar',
                            'label' => esc_html__( 'Progress Bar', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'safebyte' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__( 'Title', 'safebyte' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'percent',
                                    'label' => esc_html__( 'Percentage', 'safebyte' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'default' => [
                                        'size' => 50,
                                        'unit' => '%',
                                    ],
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                        array(
                            'name' => 'item_max_width',
                            'label' => esc_html__('Item Max Width', 'safebyte' ),
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
                                '{{WRAPPER}} .pxl-progressbar' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'item_space',
                            'label' => esc_html__('Item Spacer', 'safebyte' ),
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
                                '{{WRAPPER}} .pxl-progressbar .pxl--item + .pxl--item' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'style_l1',
                            'label' => esc_html__('Style', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => 'Style 1',
                                'style-2' => 'Style 2',
                            ],
                            'default' => 'style-1',
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_title',
                    'label' => esc_html__( 'Title', 'safebyte' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__( 'Title Color', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .pxl--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__( 'Title Typography', 'safebyte' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}}  .pxl-progressbar .pxl--title',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_percentage',
                    'label' => esc_html__( 'Percentage', 'safebyte' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'percentage_color',
                            'label' => esc_html__( 'Percentage Color', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .pxl--percentage' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'percentage_typography',
                            'label' => esc_html__( 'Percentage Typography', 'safebyte' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-progressbar .pxl--percentage',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_bar',
                    'label' => esc_html__( 'Bar', 'safebyte' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'bar_color',
                            'label' => esc_html__( 'Bar Color', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .pxl--progressbar' => 'background: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bar_bg_color',
                            'label' => esc_html__( 'Bar Background Color', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .pxl-progressbar--wrap' => 'background: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bar_height',
                            'label' => esc_html__('Bar Height', 'safebyte' ),
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
                                '{{WRAPPER}} .pxl-progressbar-1 .pxl-progressbar--wrap, {{WRAPPER}} .pxl-progressbar-1 .pxl--progressbar' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'bar_radius',
                            'label' => esc_html__('Bar Radius', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar-1 .pxl-progressbar--wrap, {{WRAPPER}} .pxl-progressbar-1 .pxl--progressbar' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => ['1'],
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