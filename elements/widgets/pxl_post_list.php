<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_list',
        'title' => esc_html__('Case Post List', 'safebyte'),
        'icon' => 'eicon-posts-carousel',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'post_list',
                            'label' => esc_html__('Content', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'number',
                                    'label' => esc_html__('Number', 'safebyte' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'rows' => 10,
                                    'show_label' => false,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'safebyte' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'rows' => 10,
                                    'show_label' => false,
                                ),
                                array(
                                    'name' => 'item_link',
                                    'label' => esc_html__('Link', 'safebyte'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Choose Image', 'safebyte' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'safebyte' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'title_color',
                                'label' => esc_html__('Title Color', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-post-list .pxl-item--title' => '--tab-title-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'title_typography',
                                'label' => esc_html__('Title Typography', 'safebyte' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-post-list .pxl-item--title',
                            ),
                            array(
                                'name' => 't_width',
                                'label' => esc_html__('Title Max Width', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px', '%' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 3000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-post-list .pxl-item--title span' => 'max-width: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                        )
                    ),
                ),
                safebyte_widget_animation_settings(),
            ),
        ),
    ),
    safebyte_get_class_widget_path()
);