<?php
$post_term_options = pxl_get_grid_term_options('post');
pxl_add_custom_widget(
    array(
        'name' => 'pxl_recent_news',
        'title' => esc_html__('Case Recent News', 'safebyte' ),
        'icon' => 'eicon-posts-ticker',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_source',
                    'label' => esc_html__('Source', 'safebyte' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'source',
                            'label' => esc_html__('Select Categories', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT2,
                            'multiple' => true,
                            'options' => $post_term_options,
                        ),
                        array(
                            'name' => 'orderby',
                            'label' => esc_html__('Order By', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'date',
                            'options' => [
                                'date' => esc_html__('Date', 'safebyte' ),
                                'ID' => esc_html__('ID', 'safebyte' ),
                                'author' => esc_html__('Author', 'safebyte' ),
                                'title' => esc_html__('Title', 'safebyte' ),
                                'rand' => esc_html__('Random', 'safebyte' ),
                            ],
                        ),
                        array(
                            'name' => 'order',
                            'label' => esc_html__('Sort Order', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'desc',
                            'options' => [
                                'desc' => esc_html__('Descending', 'safebyte' ),
                                'asc' => esc_html__('Ascending', 'safebyte' ),
                            ],
                        ),
                        array(
                            'name' => 'limit',
                            'label' => esc_html__('Total items', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => '4',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_display',
                    'label' => esc_html__('Display Options', 'safebyte' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'show_date',
                            'label' => esc_html__('Show Date', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'show_author',
                            'label' => esc_html__('Show Author', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'show_comment',
                            'label' => esc_html__('Show Comment', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'show_excerpt',
                            'label' => esc_html__('Show Excerpt', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'num_words',
                            'label' => esc_html__('Number of Words', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 25,
                            'condition' => [
                                'show_excerpt' => ['true'],
                            ],
                        ),
                        array(
                            'name' => 'show_button',
                            'label' => esc_html__('Show Button Readmore', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'safebyte' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'show_button' => ['true'],
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    safebyte_get_class_widget_path()
);