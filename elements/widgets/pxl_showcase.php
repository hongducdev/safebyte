<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_showcase',
        'title' => esc_html__('Case Showcase', 'safebyte'),
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
                            'name' => 'layout',
                            'label' => esc_html__('Layout', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '1' => 'Layout 1',
                                '2' => 'Layout 2',
                            ],
                            'default' => '1',
                        ),
                        array(
                            'name' => 'style_l1',
                            'label' => esc_html__('Style', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => 'Style 1',
                                'style-2' => 'Style 2',
                            ],
                            'default' => 'style-1',
                        ),
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Image', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => '2',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'safebyte' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-showcase .pxl-item--title',
                            'condition' => [
                                'layout' => '2',
                            ],
                        ),
                        array(
                            'name' => 'btn_text',
                            'label' => esc_html__('Button Text 1', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'btn_link',
                            'label' => esc_html__('Button Link 1', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'btn_text2',
                            'label' => esc_html__('Button Text 2', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => '1',
                            ],
                        ),
                        array(
                            'name' => 'btn_link2',
                            'label' => esc_html__('Button Link 2', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'label_block' => true,
                            'condition' => [
                                'layout' => '1',
                            ],
                        ),
                        array(
                            'name' => 'active',
                            'label' => esc_html__('Active', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => 'No',
                                'yes' => 'Yes',
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'active_label',
                            'label' => esc_html__('Active Label', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'active' => 'yes',
                            ],
                        ),
                        array(
                            'name' => 'label_typography',
                            'label' => esc_html__('Label Typography', 'safebyte' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-showcase .pxl-item--label',
                        ),
                    ),
                ),
                safebyte_widget_animation_settings(),
            ),
        ),
    ),
    safebyte_get_class_widget_path()
);