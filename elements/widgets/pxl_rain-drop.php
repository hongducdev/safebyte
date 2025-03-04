<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_rain_drop',
        'title' => esc_html__('Case Rain Drop', 'safebyte'),
        'icon' => 'eicon-ai',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'quantity',
                            'label' => esc_html__('Quantity', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 4,
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => 'Style 1',
                                'style-2' => 'Style 2',
                            ],
                            'default' => 'style-1',
                        )
                    )
                ),
            )
        )
    ),
    safebyte_get_class_widget_path()
);
