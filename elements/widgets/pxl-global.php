<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_global',
        'title' => esc_html__('Case Global', 'safebyte'),
        'icon' => 'eicon-globe',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'supports',
                            'label' => esc_html__('Supports', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'test',
                                    'label' => esc_html__('Test', 'safebyte'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'default' => '{{CURRENT_ITEM}}',
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'safebyte'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'top',
                                    'label' => esc_html__('Top', 'safebyte'),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => array('px', '%'),
                                    'range' => array(
                                        'px' => array(
                                            'min' => 0,
                                            'max' => 1000,
                                            'step' => 1,
                                        ),
                                        '%' => array(
                                            'min' => 0,
                                            'max' => 100,
                                            'step' => 1,
                                        ),
                                    ),
                                    'control_type' => 'responsive',
                                    'selectors' => [
                                        '{{WRAPPER}} {{CURRENT_ITEM}}' => 'top: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'left',
                                    'label' => esc_html__('Left', 'safebyte'),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => array('px', '%'),
                                    'range' => array(
                                        'px' => array(
                                            'min' => 0,
                                            'max' => 1000,
                                            'step' => 1,
                                        ),
                                        '%' => array(
                                            'min' => 0,
                                            'max' => 100,
                                            'step' => 1,
                                        ),
                                    ),
                                    'control_type' => 'responsive',
                                    'selectors' => [
                                        '{{WRAPPER}} {{CURRENT_ITEM}}' => 'left: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'right',
                                    'label' => esc_html__('Right', 'safebyte'),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => array('px', '%'),
                                    'range' => array(
                                        'px' => array(
                                            'min' => 0,
                                            'max' => 1000,
                                            'step' => 1,
                                        ),
                                        '%' => array(
                                            'min' => 0,
                                            'max' => 100,
                                            'step' => 1,
                                        ),
                                    ),
                                    'control_type' => 'responsive',
                                    'selectors' => [
                                        '{{WRAPPER}} {{CURRENT_ITEM}}' => 'right: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'bottom',
                                    'label' => esc_html__('Bottom', 'safebyte'),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => array('px', '%'),
                                    'range' => array(
                                        'px' => array(
                                            'min' => 0,
                                            'max' => 1000,
                                            'step' => 1,
                                        ),
                                        '%' => array(
                                            'min' => 0,
                                            'max' => 100,
                                            'step' => 1,
                                        ),
                                    ),
                                    'control_type' => 'responsive',
                                    'selectors' => [
                                        '{{WRAPPER}} {{CURRENT_ITEM}}' => 'bottom: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        )
                    )
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'background_image_width',
                            'label' => esc_html__('Background Image Width', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => array('px', '%'),
                            'range' => array(
                                'px' => array(
                                    'min' => 0,
                                    'max' => 1000,
                                    'step' => 1,
                                ),
                                '%' => array(
                                    'min' => 0,
                                    'max' => 100,
                                    'step' => 1,
                                ),
                            ),
                            'default' => array(
                                'unit' => '%',
                                'size' => 100,
                            ),
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-global-inner' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'background_image_height',
                            'label' => esc_html__('Background Image Height', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => array('px', '%'),
                            'range' => array(
                                'px' => array(
                                    'min' => 0,
                                    'max' => 1000,
                                    'step' => 1,
                                ),
                                '%' => array(
                                    'min' => 0,
                                    'max' => 100,
                                    'step' => 1,
                                ),
                            ),
                            'default' => array(
                                'unit' => 'px',
                                'size' => 380,
                            ),
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-global' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        )
                    ),
                )
            )
        )
    ),
    safebyte_get_class_widget_path()
);
