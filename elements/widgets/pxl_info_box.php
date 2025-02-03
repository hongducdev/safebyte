<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_info_box',
        'title' => esc_html__('Case Info Box', 'safebyte' ),
        'icon' => 'eicon-info-box',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'safebyte' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'phone_number',
                            'label' => esc_html__('Phone Number', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'phone_link',
                            'label' => esc_html__('Phone Link', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'desc',
                            'label' => esc_html__('Description', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'img_box',
                            'label' => esc_html__('Image Box', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                    ),
                ),
                safebyte_widget_animation_settings(),
            ),
        ),
    ),
    safebyte_get_class_widget_path()
);