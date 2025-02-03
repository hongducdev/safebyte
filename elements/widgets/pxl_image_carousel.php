<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );
pxl_add_custom_widget(
    array(
        'name' => 'pxl_image_carousel',
        'title' => esc_html__('Case Image Carousel', 'safebyte'),
        'icon' => 'eicon-image-box',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__('Content', 'safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'imgs',
                            'label' => esc_html__('Content', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'safebyte' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'item_link',
                                    'label' => esc_html__('Link Details', 'safebyte'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            ),
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'link_type',
                            'label' => esc_html__('Link Type', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'external' => 'External',
                                'media-popup' => 'Media File - Popup',
                            ],
                            'default' => 'external',
                        ),
                    ),
                ),

                array(
                    'name' => 'section_carousel_settings',
                    'label' => esc_html__('Carousel Settings', 'safebyte'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                        ),
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_sm',
                            'label' => esc_html__('Columns SM Devices', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns MD Devices', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                                '7' => '7',
                                '8' => '8',
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                '7' => '7',
                                '8' => '8',
                            ],
                        ),
                        array(
                            'name' => 'col_xxl',
                            'label' => esc_html__('Columns XXL Devices', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                '7' => '7',
                                '8' => '8',
                            ],
                        ),

                        array(
                            'name' => 'slides_to_scroll',
                            'label' => esc_html__('Slides to scroll', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                '7' => '7',
                                '8' => '8',
                            ],
                        ),
                        array(
                            'name' => 'arrows',
                            'label' => esc_html__('Show Arrows', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                        array(
                            'name' => 'pagination',
                            'label' => esc_html__('Show Pagination', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'bullets',
                            'options' => [
                                'bullets' => 'Bullets',
                                'fraction' => 'Fraction',
                                'progressbar' => 'Progressbar',
                            ],
                            'condition' => [
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                        array(
                            'name' => 'autoplay_speed',
                            'label' => esc_html__('Autoplay Delay', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5000,
                            'condition' => [
                                'autoplay' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                        array(
                            'name' => 'drap',
                            'label' => esc_html__('Show Scroll Drap', 'safebyte'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                        array(
                            'name' => 'item_spacer',
                            'label' => esc_html__('Item Spacer', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-container .pxl-swiper-slide' => 'padding: 0 {{SIZE}}px;',
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-container' => 'margin: 0 -{{SIZE}}px;',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'safebyte' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'border_radius',
                            'label' => esc_html__('Border Radius', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-carousel .pxl-item--image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                safebyte_widget_animation_settings(),
            ),
        ),
    ),
    safebyte_get_class_widget_path()
);