<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_language_switch',
        'title' => esc_html__('Case Language Switch', 'safebyte'),
        'icon' => 'eicon-kit-parts',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_list',
                    'label' => esc_html__('Content', 'safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style_layout',
                            'label' => esc_html__('Style', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => 'Style 1',
                                'style-2' => 'Style 2',
                            ],
                            'default' => 'style-1',
                        ),
                        array(
                            'name' => 'current',
                            'label' => esc_html__('Current Item', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'current_item_typography',
                            'label' => esc_html__('Current Item Typography', 'safebyte' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-language-switcher1 .current--item',
                        ),
                        array(
                            'name' => 'current_flag',
                            'label' => esc_html__( 'Current Flag', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'style_layout' => 'style-2',
                            ],
                        ),
                        array(
                            'name' => 'current_item_color',
                            'label' => esc_html__('Current Item Color', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-language-switcher1 .current--item' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'menu_item',
                            'label' => esc_html__('Item', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'safebyte'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'safebyte'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'flag',
                                    'label' => esc_html__('Flag', 'safebyte'),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ text }}}',
                        ),
                        array(
                            'name' => 'dropdown_position',
                            'label' => esc_html__('Dropdown Position', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'dr-left' => 'Left',
                                'dr-right' => 'Right',
                            ],
                            'default' => 'dr-left',
                        ),
                    ),
                ),
            ),
        ),
    ),
    safebyte_get_class_widget_path()
);