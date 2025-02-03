<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_contact_box',
        'title' => esc_html__('Case Contact Box', 'safebyte' ),
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
                            'name' => 'title',
                            'label' => esc_html__('Title', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'pxl_content',
                            'label' => esc_html__('Content', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Button Link', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'safebyte' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-box .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'label' => esc_html__('Title Typography', 'safebyte' ),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-contact-box .pxl-item--title',
                        ),
                        array(
                            'name' => 'content_color',
                            'label' => esc_html__('Content Color', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-box .pxl-item--content' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'content_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'label' => esc_html__('Content Typography', 'safebyte' ),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-contact-box .pxl-item--content',
                        ),
                    ),
                ),
                safebyte_widget_animation_settings(),
            ),
        ),
    ),
    safebyte_get_class_widget_path()
);