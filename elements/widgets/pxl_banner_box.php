<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_banner_box',
        'title' => esc_html__('Case Banner Box', 'safebyte'),
        'icon' => 'eicon-posts-ticker',
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
                                    'image' => get_template_directory_uri() . '/elements/assets/img/pxl_banner_box/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'safebyte' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/img/pxl_banner_box/layout2.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content Top', 'safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'main_img',
                            'label' => esc_html__('Main Image', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'secondary_img',
                            'label' => esc_html__('Secondary Image', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'layout' => ['1','2'],
                            ],
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'number',
                            'label' => esc_html__('Number', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 100,
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'suffix',
                            'label' => esc_html__('Number Suffix', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'layout' => ['2'],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content_bottom',
                    'label' => esc_html__('Content Bottom', 'safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => '1',
                    ],
                    'controls' => array(
                        array(
                            'name' => 'third_img',
                            'label' => esc_html__('Image', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 't_title',
                            'label' => esc_html__('Title', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 't_number',
                            'label' => esc_html__('Number', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 100,
                        ),
                        array(
                            'name' => 't_suffix',
                            'label' => esc_html__('Number Suffix', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                    ),
                ),
                array(
                    'name' => 'banner_style',
                    'label' => esc_html__('Style', 'safebyte' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-banner .pxl-counter--wrap .pxl-counter--title' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'safebyte' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-banner .pxl-counter--wrap .pxl-counter--title',
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'number_color',
                            'label' => esc_html__('Number Color', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-banner .pxl-counter--wrap .pxl-counter--number' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'number_typography',
                            'label' => esc_html__('Number Typography', 'safebyte' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-banner .pxl-counter--wrap .pxl-counter--number',
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    safebyte_get_class_widget_path()
);