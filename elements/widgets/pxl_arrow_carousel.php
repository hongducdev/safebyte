<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_arrow_carousel',
        'title' => esc_html__('Case Nav Carousel', 'safebyte'),
        'icon' => 'eicon-animation',
        'categories' => array('pxltheme-core'),
        'scripts' => array(),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'style_section',
                    'label' => esc_html__('Style', 'safebyte' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => 'Style 1',
                            ],
                            'default' => 'style-1',
                        ),
                    ),
                ),
            ),
        ),
    ),
    safebyte_get_class_widget_path()
);