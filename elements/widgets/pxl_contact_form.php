<?php
if(class_exists('WPCF7')) {
    $cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');

    $contact_forms = array();
    if ($cf7) {
        foreach ($cf7 as $cform) {
            $contact_forms[$cform->ID] = $cform->post_title;
        }
    } else {
        $contact_forms[esc_html__('No contact forms found', 'safebyte')] = 0;
    }

    pxl_add_custom_widget(
        array(
            'name' => 'pxl_contact_form',
            'title' => esc_html__('Case Contact Form', 'safebyte'),
            'icon' => 'eicon-form-horizontal',
            'categories' => array('pxltheme-core'),
            'params' => array(
                'sections' => array(
                    array(
                        'name' => 'tab_content',
                        'label' => esc_html__('Content', 'safebyte'),
                        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                        'controls' => array(
                            array(
                                'name' => 'form_id',
                                'label' => esc_html__('Select Form', 'safebyte'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => $contact_forms,
                            ),
                        ),
                    ),
                    array(
                        'name' => 'tab_style_input',
                        'label' => esc_html__('Input', 'safebyte'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'controls' => array(
                            array(
                                'name' => 'input_typography',
                                'label' => esc_html__('Typography', 'safebyte' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight',
                            ),
                            array(
                                'name' => 'input_color',
                                'label' => esc_html__('Color', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'input_bg_color',
                                'label' => esc_html__('Background Color', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'input_padding',
                                'label' => esc_html__('Padding Input', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-textarea), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'input_border_radius',
                                'label' => esc_html__('Border Radius', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name'         => 'input_box_shadow',
                                'label' => esc_html__( 'Box Shadow', 'safebyte' ),
                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight'
                            ),
                            array(
                                'name' => 'border_type',
                                'label' => esc_html__( 'Border Type', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    '' => esc_html__( 'None', 'safebyte' ),
                                    'solid' => esc_html__( 'Solid', 'safebyte' ),
                                    'double' => esc_html__( 'Double', 'safebyte' ),
                                    'dotted' => esc_html__( 'Dotted', 'safebyte' ),
                                    'dashed' => esc_html__( 'Dashed', 'safebyte' ),
                                    'groove' => esc_html__( 'Groove', 'safebyte' ),
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-acceptance), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'border-style: {{VALUE}} !important;',
                                ],
                            ),
                            array(
                                'name' => 'border_width',
                                'label' => esc_html__( 'Border Width', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                ],
                                'condition' => [
                                    'border_type!' => '',
                                ],
                                'responsive' => true,
                            ),
                            array(
                                'name' => 'border_color',
                                'label' => esc_html__( 'Border Color', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'default' => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'border-color: {{VALUE}} !important;',
                                ],
                                'condition' => [
                                    'border_type!' => '',
                                ],
                            ),
                            array(
                                'name' => 'input_height',
                                'label' => esc_html__('Input Height', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 300,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-textarea), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'textarea_height',
                                'label' => esc_html__('Textarea Height', 'safebyte' ),
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
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'textarea_padding',
                                'label' => esc_html__('Padding Textarea', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'textarea_border_type',
                                'label' => esc_html__( 'Textarea Border Type', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    '' => esc_html__( 'None', 'safebyte' ),
                                    'solid' => esc_html__( 'Solid', 'safebyte' ),
                                    'double' => esc_html__( 'Double', 'safebyte' ),
                                    'dotted' => esc_html__( 'Dotted', 'safebyte' ),
                                    'dashed' => esc_html__( 'Dashed', 'safebyte' ),
                                    'groove' => esc_html__( 'Groove', 'safebyte' ),
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea' => 'border-style: {{VALUE}} !important;',
                                ],
                            ),
                            array(
                                'name' => 'textarea_border_width',
                                'label' => esc_html__( 'Textarea Border Width', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                ],
                                'condition' => [
                                    'textarea_border_type!' => '',
                                ],
                                'responsive' => true,
                            ),
                            array(
                                'name' => 'textarea_typography',
                                'label' => esc_html__('Textarea Typography', 'safebyte' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea',
                            ),
                            array(
                                'name' => 'textarea_color',
                                'label' => esc_html__('Textarea Color', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'input_spacer_bottom',
                                'label' => esc_html__('Item Spacer Bottom', 'safebyte' ),
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
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'input_spacer_left',
                                'label' => esc_html__('Item Spacer Left', 'safebyte' ),
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
                                    '{{WRAPPER}} .pxl-contact-form .row [class*="col-"]' => 'padding-left: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .pxl-contact-form .row' => 'margin-left: -{{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'input_spacer_right',
                                'label' => esc_html__('Item Spacer right', 'safebyte' ),
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
                                    '{{WRAPPER}} .pxl-contact-form .row [class*="col-"]' => 'padding-right: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .pxl-contact-form .row' => 'margin-right: -{{SIZE}}{{UNIT}};',
                                ],
                            ),
                        ),
                    ),
                    array(
                        'name' => 'tab_style_input_hover',
                        'label' => esc_html__('Input Hover', 'safebyte'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'controls' => array(
                            array(
                                'name' => 'input_color_hover',
                                'label' => esc_html__('Color', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):hover, {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight:hover, {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight.active' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'input_bg_color_hover',
                                'label' => esc_html__('Background Color', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):hover' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name'         => 'input_box_shadow_hover',
                                'label' => esc_html__( 'Box Shadow', 'safebyte' ),
                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):hover'
                            ),
                            array(
                                'name' => 'border_type_hover',
                                'label' => esc_html__( 'Border Type', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    '' => esc_html__( 'None', 'safebyte' ),
                                    'solid' => esc_html__( 'Solid', 'safebyte' ),
                                    'double' => esc_html__( 'Double', 'safebyte' ),
                                    'dotted' => esc_html__( 'Dotted', 'safebyte' ),
                                    'dashed' => esc_html__( 'Dashed', 'safebyte' ),
                                    'groove' => esc_html__( 'Groove', 'safebyte' ),
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):hover, {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight:hover' => 'border-style: {{VALUE}} !important;',
                                ],
                            ),
                            array(
                                'name' => 'border_width_hover',
                                'label' => esc_html__( 'Border Width', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):hover, {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight:hover' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                ],
                                'condition' => [
                                    'border_type_hover!' => '',
                                ],
                                'responsive' => true,
                            ),
                            array(
                                'name' => 'border_color_hover',
                                'label' => esc_html__( 'Border Color', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'default' => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):hover, {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight:hover' => 'border-color: {{VALUE}} !important;',
                                ],
                                'condition' => [
                                    'border_type_hover!' => '',
                                ],
                            ),
                        ),
                    ),
                    array(
                        'name' => 'tab_style_button',
                        'label' => esc_html__('Button', 'safebyte'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'controls' => array_merge(
                            array(
                                array(
                                    'name' => 'button_typography',
                                    'label' => esc_html__('Button Typography', 'safebyte' ),
                                    'type' => \Elementor\Group_Control_Typography::get_type(),
                                    'control_type' => 'group',
                                    'selector' => '{{WRAPPER}} .pxl-contact-form .wpcf7-submit, {{WRAPPER}} .pxl-contact-form button',
                                ),
                                array(
                                    'name' => 'button_color',
                                    'label' => esc_html__('Button Color', 'safebyte' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit' => 'color: {{VALUE}};',
                                    ],
                                ),
                                array(
                                    'name' => 'button_color_hover',
                                    'label' => esc_html__('Button Color Hover', 'safebyte' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit:hover, {{WRAPPER}} .pxl-contact-form .wpcf7-submit:focus' => 'color: {{VALUE}};',
                                    ],
                                ),
                                array(
                                    'name' => 'button_bg_color',
                                    'label' => esc_html__('Button Background Color', 'safebyte' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit' => 'background: {{VALUE}};',
                                    ],
                                ),
                                array(
                                    'name' => 'button_bg_color_hover',
                                    'label' => esc_html__('Button Background Color Hover', 'safebyte' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit:hover, {{WRAPPER}} .pxl-contact-form .wpcf7-submit:focus' => 'background-color: {{VALUE}};',
                                    ],
                                ),
                            ),
                            array(
                                array(
                                    'name' => 'button_padding',
                                    'label' => esc_html__('Padding', 'safebyte' ),
                                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px' ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit, {{WRAPPER}} .pxl-contact-form button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                                    'control_type' => 'responsive',
                                ),
                                array(
                                    'name' => 'button_margin',
                                    'label' => esc_html__('Margin', 'safebyte' ),
                                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px' ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit, {{WRAPPER}} .pxl-contact-form button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                                    'control_type' => 'responsive',
                                ),
                                array(
                                    'name' => 'button_border_radius',
                                    'label' => esc_html__('Border Radius', 'safebyte' ),
                                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px' ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit, {{WRAPPER}} .pxl-contact-form button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                                    'control_type' => 'responsive',
                                ),
                                array(
                                    'name'         => 'button_box_shadow',
                                    'label' => esc_html__( 'Box Shadow', 'safebyte' ),
                                    'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                    'control_type' => 'group',
                                    'selector'     => '{{WRAPPER}} .pxl-contact-form .wpcf7-submit, {{WRAPPER}} .pxl-contact-form button'
                                ),
                                array(
                                    'name' => 'button_border_type',
                                    'label' => esc_html__( 'Border Type', 'safebyte' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        '' => esc_html__( 'None', 'safebyte' ),
                                        'solid' => esc_html__( 'Solid', 'safebyte' ),
                                        'double' => esc_html__( 'Double', 'safebyte' ),
                                        'dotted' => esc_html__( 'Dotted', 'safebyte' ),
                                        'dashed' => esc_html__( 'Dashed', 'safebyte' ),
                                        'groove' => esc_html__( 'Groove', 'safebyte' ),
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit' => 'border-style: {{VALUE}};',
                                    ],
                                ),
                                array(
                                    'name' => 'button_border_width',
                                    'label' => esc_html__( 'Border Width', 'safebyte' ),
                                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                                    'condition' => [
                                        'button_border_type!' => '',
                                    ],
                                    'responsive' => true,
                                ),
                                array(
                                    'name' => 'button_border_color',
                                    'label' => esc_html__( 'Border Color', 'safebyte' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'default' => '',
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit' => 'border-color: {{VALUE}};',
                                    ],
                                    'condition' => [
                                        'button_border_type!' => '',
                                    ],
                                ),
                                array(
                                    'name' => 'btn_width',
                                    'label' => esc_html__( 'Width', 'safebyte' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'btn-w-auto' => 'Auto',
                                        'btn-w-full' => '100%',
                                    ],
                                    'default' => 'btn-w-auto',
                                ),
                                array(
                                    'name' => 'btn_spacer_top',
                                    'label' => esc_html__('Spacer Top', 'safebyte' ),
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
                                        '{{WRAPPER}} .pxl-contact-form .wpcf7-submit' => 'margin-top: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                            ),
                        ),
                    ),

                    safebyte_widget_animation_settings(),

                    array(
                        'name' => 'extra',
                        'label' => esc_html__('Extra', 'safebyte'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'controls' => array(
                            array(
                                'name' => 'f_width',
                                'label' => esc_html__('Form Max Width', 'safebyte' ),
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
                                    '{{WRAPPER}} .pxl-contact-form' => 'max-width: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'notification_color',
                                'label' => esc_html__('Notification Color', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form .wpcf7-response-output' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'validate_color',
                                'label' => esc_html__('Validate Color', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-not-valid-tip' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'label_color',
                                'label' => esc_html__('Label Color', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .pxl--item > label, {{WRAPPER}} .pxl-contact-form .pxl--item .pxl-form--label' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'label_typography',
                                'label' => esc_html__('Label Typography', 'safebyte' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-contact-form .pxl--item > label, {{WRAPPER}} .pxl-contact-form .pxl--item .pxl-form--label',
                            ),
                            array(
                                'name' => 'label_spacer_bottom',
                                'label' => esc_html__('Label Spacer Bottom', 'safebyte' ),
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
                                    '{{WRAPPER}} .pxl-contact-form .pxl--item > label, {{WRAPPER}} .pxl-contact-form .pxl--item .pxl-form--label' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'icon_color',
                                'label' => esc_html__('Icon Color', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .pxl--form-icon' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'icon_space',
                                'label' => esc_html__('Icon Spacer', 'safebyte' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .pxl--form-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name'         => 'radio_box_shadow',
                                'label' => esc_html__( 'Radio Box Shadow', 'safebyte' ),
                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .pxl-contact-form .pxl-radio--button .wpcf7-radio .wpcf7-list-item [type="radio"]:checked + .wpcf7-list-item-label',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        safebyte_get_class_widget_path()
    );
}