<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_client',
        'title' => esc_html__('Case Client', 'safebyte'),
        'icon' => 'eicon-person',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'elementor-waypoints',
            'jquery-numerator',
            'pxl-counter',
            'pxl-counter-slide',
            'safebyte-counter',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'images',
                            'label' => esc_html__('Images', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'safebyte'),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                            ),
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'number',
                            'label' => esc_html__('Number', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 100,
                        ),
                        array(
                            'name' => 'suffix',
                            'label' => esc_html__('Number Suffix', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'border_type',
                            'label' => esc_html__('Border Type', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__('None', 'safebyte'),
                                'solid' => esc_html__('Solid', 'safebyte'),
                                'double' => esc_html__('Double', 'safebyte'),
                                'dotted' => esc_html__('Dotted', 'safebyte'),
                                'dashed' => esc_html__('Dashed', 'safebyte'),
                                'groove' => esc_html__('Groove', 'safebyte'),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-client .pxl-client--image' => 'border-style: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'border_width',
                            'label' => esc_html__('Border Width', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-client .pxl-client--image' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                            'responsive' => true,
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__('Border Color', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-client .pxl-client--image' => 'border-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'safebyte' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-client .pxl-client--content',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-client .pxl-client--content' => 'color: {{VALUE}};',
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
