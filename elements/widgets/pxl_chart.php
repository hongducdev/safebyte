<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_chart',
        'title' => esc_html__('Case Chart', 'safebyte'),
        'icon' => 'eicon-skill-bar',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'safebyte-chart'
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'chart_section',
                    'label'    => esc_html__('Chart Content', 'safebyte'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'    => 'pxl_chart',
                                'label'   => esc_html__('Chart Items', 'safebyte'),
                                'type'    => \Elementor\Controls_Manager::REPEATER,
                                'controls' => array(
                                    array(
                                        'name'  => 'chart_title',
                                        'label' => esc_html__('Title', 'safebyte'),
                                        'type'  => \Elementor\Controls_Manager::TEXT,
                                    ),
                                    array(
                                        'name'  => 'chart_value',
                                        'label' => esc_html__('Value', 'safebyte'),
                                        'type'  => \Elementor\Controls_Manager::NUMBER,
                                    ),
                                    array(
                                        'name'  => 'chart_color',
                                        'label' => esc_html__('Color', 'safebyte'),
                                        'type'  => \Elementor\Controls_Manager::COLOR,
                                        'default' => '#000000',
                                    ),
                                    array(
                                        'name'  => 'chart_data',
                                        'label' => esc_html__('Data Points (comma separated)', 'safebyte'),
                                        'type'  => \Elementor\Controls_Manager::TEXT,
                                        'description' => esc_html__('Enter values separated by commas. Example: 10,20,35,25,40', 'safebyte'),
                                    ),
                                ),
                                'title_field' => '{{{ chart_title }}} ({{{ chart_value }}})',
                                'separator'   => 'after',
                            ),
                            array(
                                'name' => 'h_width',
                                'label' => esc_html__('Max Width', 'safebyte'),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => ['px', '%'],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 3000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-chart ' => 'width: {{SIZE}}{{UNIT}} !important;',
                                ],
                            ),
                            array(
                                'name'  => 'x_axis_labels',
                                'label' => esc_html__('X-Axis Labels (comma separated)', 'safebyte'),
                                'type'  => \Elementor\Controls_Manager::TEXT,
                                'description' => esc_html__('Enter labels separated by commas. Example: Jan,Feb,Mar,Apr,May', 'safebyte'),
                            ),
                        )
                    )
                ),
                array(
                    'name'     => 'style_section',
                    'label'    => esc_html__('Style Settings', 'safebyte'),
                    'tab'      => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => [
                        array(
                            'name'  => 'chart_border_color',
                            'label' => esc_html__('Line Color', 'safebyte'),
                            'type'  => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name'         => 'pxl_chart_dimensions',
                            'label'        => esc_html__('Chart Dimensions', 'safebyte'),
                            'type'         => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 100,
                                    'max' => 1000,
                                ]
                            ],
                            'condition' => [
                                'layout' => ['2'],
                            ],
                            'default' => [
                                'size' => 400
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-chart canvas' => 'height:{{SIZE}}px !important;',
                                '{{WRAPPER}} .pxl-chart .chart-bar' => 'width:{{SIZE}}px !important;',
                            ],
                            'separator' => 'before'
                        ),
                        array(
                            'name'         => 'chart_border_width',
                            'label'        => esc_html__('Chart Border Width (Line Width) ', 'safebyte'),
                            'description' => ' Value > 0',
                            'type'         => \Elementor\Controls_Manager::NUMBER,
                            'control_type' => 'responsive',
                            'separator' => 'before'
                        ),
                        array(
                            'name' => 'boxcolor',
                            'label' => esc_html__('Box Color', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-chart' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name'  => 'width_chart',
                            'label' => esc_html__('Cutout', 'safebyte'),
                            'type'  => \Elementor\Controls_Manager::NUMBER,
                            'condition' => [
                                'layout' => ['2'],
                            ],
                        ),
                        array(
                            'name'  => 'line_tension',
                            'label' => esc_html__('Line Smoothness', 'safebyte'),
                            'type'  => \Elementor\Controls_Manager::SLIDER,
                            'range' => [
                                'min' => 0,
                                'max' => 1,
                                'step' => 0.1,
                            ],
                            'default' => [
                                'size' => 0.4,
                            ],
                        ),
                    ]
                ),
                array(
                    'name'     => 'style_section_tyle',
                    'label'    => esc_html__('Title Style', 'safebyte'),
                    'tab'      => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout' => ['2'],
                    ],
                    'controls' => [
                        array(
                            'name' => 'tl_typography',
                            'label' => esc_html__('Typography', 'safebyte'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-chart .list-content .title',
                        ),
                        array(
                            'name' => 'color_tl',
                            'label' => esc_html__('Color', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-chart .list-content .title' => 'color: {{VALUE}};',
                            ],
                        ),
                    ]
                ),
                safebyte_widget_animation_settings(),
            ),
        ),
    ),
    safebyte_get_class_widget_path()
);
