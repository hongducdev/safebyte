<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_countdown',
        'title' => esc_html__('Case Countdown', 'safebyte'),
        'icon' => 'eicon-countdown',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'pxl-countdown',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'countdown_section',
                    'label' => esc_html__('Content', 'safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'typography',
                            'label' => esc_html__('Typography', 'safebyte'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-countdown .countdown-amount span',
                            'selector' => '{{WRAPPER}} .pxl-countdown .countdown-period',
                        ),
                        array(
                            'name' => 'date',
                            'label' => esc_html__('Date', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'default' => '2030/01/01',
                            'description' => esc_html__('Set date count down (Date format: yy/mm/dd)', ' safebyte'),
                        ),
                        array(
                            'name' => 'pxl_day',
                            'label' => esc_html__('Day', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'show-day' => 'True',
                                'hide' => 'False',
                            ],
                            'default' => 'show-day',
                        ),
                        array(
                            'name' => 'pxl_hour',
                            'label' => esc_html__('Hour', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'show-hour' => 'True',
                                'hide' => 'False',
                            ],
                            'default' => 'show-hour',
                        ),
                        array(
                            'name' => 'pxl_minute',
                            'label' => esc_html__('Minute', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'show-minute' => 'True',
                                'hide' => 'False',
                            ],
                            'default' => 'show-minute',
                        ),
                        array(
                            'name' => 'pxl_second',
                            'label' => esc_html__('Second', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'show-second' => 'True',
                                'hide' => 'False',
                            ],
                            'default' => 'show-second',
                        ),
                        array(
                            'name' => 'align',
                            'label' => esc_html__('Alignment', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'flex-start' => [
                                    'title' => esc_html__('Left', 'safebyte'),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'safebyte'),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'flex-end' => [
                                    'title' => esc_html__('Right', 'safebyte'),
                                    'icon' => 'eicon-text-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown' => 'justify-content: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
);
