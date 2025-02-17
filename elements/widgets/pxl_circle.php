<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_circle',
        'title' => esc_html__('Case Circle', 'safebyte'),
        'icon' => 'eicon-circle-o',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'circle_size',
                            'label' => esc_html__('Circle Size', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 440,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle' => 'width: {{VALUE}}px; height: {{VALUE}}px;',
                                '{{WRAPPER}} .pxl-circle-1' => 'width: {{VALUE}}px; height: {{VALUE}}px;',
                                '{{WRAPPER}} .pxl-circle-2' => 'width: {{VALUE}}px; height: {{VALUE}}px;',
                            ],
                        ),
                        array(
                            'name' => 'circle2_offset_x',
                            'label' => esc_html__('Circle 2 Offset X', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => ['min' => -500, 'max' => 500],
                                '%' => ['min' => -100, 'max' => 100],
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 176,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle-2' => 'left: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'circle2_offset_y',
                            'label' => esc_html__('Circle 2 Offset Y', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => ['min' => -500, 'max' => 500],
                                '%' => ['min' => -100, 'max' => 100],
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 176,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle-2' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'rotation_speed_1',
                            'label' => esc_html__('Circle 1 Rotation Speed (s)', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 15,
                            'min' => 1,
                            'max' => 60,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle-1 .particles' => 'animation-duration: {{VALUE}}s;',
                            ],
                        ),
                        array(
                            'name' => 'rotation_speed_2',
                            'label' => esc_html__('Circle 2 Rotation Speed (s)', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 20,
                            'min' => 1,
                            'max' => 60,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle-2 .particles' => 'animation-duration: {{VALUE}}s;',
                            ],
                        ),
                        array(
                            'name' => 'dot_color',
                            'label' => esc_html__('Dot Color', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#ffffff',
                            'selectors' => [
                                '{{WRAPPER}} .particles span' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'circle_border_color',
                            'label' => esc_html__('Circle Border Color', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#ffffff',
                            'selectors' => [
                                '{{WRAPPER}} .circle-border' => 'border-color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    safebyte_get_class_widget_path()
);