<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_list',
        'title' => esc_html__('Case List', 'safebyte'),
        'icon' => 'eicon-editor-list-ul',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'lists',
                            'label' => esc_html__('Content', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'label',
                                    'label' => esc_html__('Label', 'safebyte' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'rows' => 10,
                                    'show_label' => false,
                                ),
                                array(
                                    'name' => 'content',
                                    'label' => esc_html__('Content', 'safebyte' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                    'show_label' => false,
                                ),
                            ),
                            'title_field' => '{{{ content }}}',
                        ),
                        array(
                            'name' => 'icon_type',
                            'label' => esc_html__('Icon Type', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'icon' => 'Icon',
                                'image' => 'Image',
                            ],
                            'default' => 'icon',
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'icon_type' => 'icon',
                            ],
                        ),
                        array(
                            'name' => 'icon_image',
                            'label' => esc_html__( 'Icon Image', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'icon_type' => 'image',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'safebyte' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        safebyte_widget_color_type([
                            'label' => 'Icon',
                            'prefix' => 'icon',
                            'selectors_class' => '.pxl-list1 .pxl-item--icon',
                        ]),
                        array(
                            array(
                                'name' => 'icon_margin',
                                'label' => esc_html__('Icon Margin', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-list .pxl-item--icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'icon_font_size',
                                'label' => esc_html__('Icon Font Size', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 3000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-list .pxl-item--icon' => 'font-size: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'label_min_width',
                                'label' => esc_html__('Label Min Width', 'safebyte' ),
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
                                    '{{WRAPPER}} .pxl-list label' => 'min-width: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'label_color',
                                'label' => esc_html__('Label Color', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-list label' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'label_typography',
                                'label' => esc_html__('Label Typography', 'safebyte' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-list label',
                            ),

                            array(
                                'name' => 'content_color',
                                'label' => esc_html__('Content Color', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-list .pxl-item--content' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'content_typography',
                                'label' => esc_html__('Content Typography', 'safebyte' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-list .pxl-item--content',
                            ),
                            array(
                                'name' => 'item_spacer',
                                'label' => esc_html__('Item Spacer', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 3000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-list .pxl--item + .pxl--item' => 'margin-top: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'align_items',
                                'label' => esc_html__('Align Items', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::CHOOSE,
                                'control_type' => 'responsive',
                                'options' => [
                                    'flex-start' => [
                                        'title' => esc_html__( 'Flex Start', 'safebyte' ),
                                        'icon' => 'far fa-arrow-alt-to-top',
                                    ],
                                    'Center' => [
                                        'title' => esc_html__( 'Center', 'safebyte' ),
                                        'icon' => 'far fa-arrows-alt-v',
                                    ],
                                    'flex-end' => [
                                        'title' => esc_html__( 'Flex End', 'safebyte' ),
                                        'icon' => 'far fa-arrow-alt-to-bottom',
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-list .pxl--item' => 'align-items: {{VALUE}};',
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