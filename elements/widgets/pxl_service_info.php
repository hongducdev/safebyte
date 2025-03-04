<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_service_info',
        'title' => esc_html__('Case Service Info', 'safebyte'),
        'icon' => 'eicon-parallax',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Image', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'description',
                            'label' => esc_html__('Description', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                        ),
                        array(
                            'name' => 'icon',
                            'label' => esc_html__('Icon', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::ICONS,
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'lists',
                            'label' => esc_html__('Lists', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'label',
                                    'label' => esc_html__('Label', 'safebyte'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                            ),
                        ),
                    ),
                ),
                safebyte_widget_animation_settings(),
            ),
        ),
    ),
    safebyte_get_class_widget_path()
);
