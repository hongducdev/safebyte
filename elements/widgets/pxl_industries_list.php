<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_industries_list',
        'title' => esc_html__('Case Industries List', 'safebyte' ),
        'icon' => 'eicon-form-vertical',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'tab_settings',
                    'label'    => esc_html__( 'Settings', 'safebyte' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'order',
                                'label' => esc_html__('Sort Order', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'desc',
                                'options' => [
                                    'desc' => esc_html__('Descending', 'safebyte' ),
                                    'asc' => esc_html__('Ascending', 'safebyte' ),
                                ],
                            ),
                            array(
                                'name' => 'limit',
                                'label' => esc_html__('Total items', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                            ),
                            array(
                                'name' => 'show_view_all',
                                'label' => esc_html__('Show View All', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                                'default' => true,
                            ),
                            array(
                                'name' => 'link_view_all',
                                'label' => esc_html__('Link View All', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::URL,
                            ),
                            array(
                                'name' => 'align',
                                'label' => esc_html__('Alignment', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::CHOOSE,
                                'options' => [
                                    'start' => [
                                        'title' => esc_html__( 'Start', 'safebyte' ),
                                        'icon' => 'eicon-text-align-left',
                                    ],
                                    'center' => [
                                        'title' => esc_html__( 'Center', 'safebyte' ),
                                        'icon' => 'eicon-text-align-center',
                                    ],
                                    'end' => [
                                        'title' => esc_html__( 'End', 'safebyte' ),
                                        'icon' => 'eicon-text-align-right',
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-industries-list' => 'justify-content: {{VALUE}};',
                                ],
                            ),
                        )
                    ),
                ),
            ),
        ),
    ),
    safebyte_get_class_widget_path()
);