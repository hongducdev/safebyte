<?php
$templates_df = ['0' => esc_html__('None', 'safebyte')];
$templates_lv1 = ['1' => esc_html__('Hidden Panel Mobile', 'safebyte')];
$templates = $templates_df + $templates_lv1 + safebyte_get_templates_option('hidden-panel');
pxl_add_custom_widget(
    array(
        'name' => 'pxl_anchor',
        'title' => esc_html__('Case Anchor', 'safebyte'),
        'icon' => 'eicon-anchor',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'content_template',
                            'label' => esc_html__('Select Template', 'safebyte'),
                            'type' => 'select',
                            'options' => $templates,
                            'default' => 'df',
                            'description' => 'Add new tab template: "<a href="' . esc_url(admin_url('edit.php?post_type=pxl-template')) . '" target="_blank">Click Here</a>"',
                        ),
                        array(
                            'name' => 'icon_type',
                            'label' => esc_html__('Icon Type', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'default' => 'Default',
                                'icon' => 'Icon Font',
                                'icon-theme' => 'Icon Theme Style',
                            ],
                            'default' => 'default',
                        ),
                        array(
                            'name' => 'style_icon_theme',
                            'label' => esc_html__('Style', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => 'Style 1',
                                'style-2' => 'Style 2',
                            ],
                            'default' => 'style-1',
                            'condition' => [
                                'icon_type' => ['icon-theme'],
                            ],
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Select Icon', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'icon_type' => ['icon'],
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-button .pxl-icon-line::before, {{WRAPPER}} .pxl-anchor-button .pxl-icon-line::after' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-anchor-button' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-anchor-button span' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'background_color',
                            'label' => esc_html__('Background Color', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-button .pxl-anchor-theme-style1.style-1' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'icon_type' => ['icon-theme'],
                            ],
                        ),
                        array(
                            'name' => 'icon_font_size',
                            'label' => esc_html__('Icon Font Size', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-button' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'icon_type' => ['icon'],
                            ],
                        ),
                        array(
                            'name' => 'label',
                            'label' => esc_html__('Label', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'icon_type' => ['icon'],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => 'Default',
                                'style-2' => 'Round Box',
                                'style-box' => 'Custom Box',
                            ],
                            'default' => 'style-1',
                            'condition' => [
                                'icon_type' => ['default', 'icon'],
                            ],
                        ),
                        array(
                            'name' => 'round_box_color',
                            'label' => esc_html__('Box Color', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-button.style-2' => 'border-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-anchor-button.style-2:hover' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'style' => 'style-2',
                            ],
                        ),
                        array(
                            'name' => 'icon_color_hover',
                            'label' => esc_html__('Icon Hover Color', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-button:hover' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'icon_type' => ['icon'],
                            ],
                        ),
                        array(
                            'name' => 'box_width',
                            'label' => esc_html__('Box Width', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-button.style-box' => 'width: {{SIZE}}{{UNIT}}; align-items: center; justify-content: center; display: inline-flex;',
                            ],
                            'condition' => [
                                'style' => 'style-box',
                            ],
                        ),
                        array(
                            'name' => 'box_height',
                            'label' => esc_html__('Box Height', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-button.style-box' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'style' => 'style-box',
                            ],
                        ),
                        array(
                            'name' => 'box_border_radius',
                            'label' => esc_html__('Border Radius', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => ['px'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-button.style-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'style' => 'style-box',
                            ],
                        ),
                        array(
                            'name' => 'box_color',
                            'label' => esc_html__('Box Color', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-button.style-box' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'style' => 'style-box',
                            ],
                        ),
                        array(
                            'name' => 'label_color',
                            'label' => esc_html__('Label Color', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-button label' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'icon_type' => ['icon'],
                            ],
                        ),
                        array(
                            'name' => 'label_typography',
                            'label' => esc_html__('Label Typography', 'safebyte'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-anchor-button label',
                            'condition' => [
                                'icon_type' => ['icon'],
                            ],
                        ),
                        array(
                            'name' => 'pxl_close_animate_delay',
                            'label' => esc_html__('Close Popup - Animation Delay', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => 'Enter number. Default 0ms',
                        ),
                    ),
                ),
                safebyte_widget_animation_settings(),
            ),
        ),
    ),
    safebyte_get_class_widget_path()
);
