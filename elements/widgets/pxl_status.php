<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_status',
        'title' => esc_html__('Case Status', 'safebyte'),
        'icon' => 'eicon-circle',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'status_title',
                            'label' => esc_html__('Status Title', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'status_color',
                            'label' => esc_html__('Status Color', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                        array(
                            'name' => 'status_title_color',
                            'label' => esc_html__('Status Title Color', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                    ),
                ),
                safebyte_widget_animation_settings(),
            ),
        ),
    ),
    safebyte_get_class_widget_path()
);