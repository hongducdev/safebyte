<?php
$pt_supports = ['post'];
use Elementor\Controls_Manager;
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_post_list',
        'title'      => esc_html__('Case Post List', 'safebyte' ),
        'icon'       => 'eicon-post-list',
        'categories' => array('pxltheme-core'),
        'scripts'    => [
            'pxl-post-grid',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'safebyte' ),
                    'tab'      => 'layout',
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'post_type',
                                'label'    => esc_html__( 'Select Post Type', 'safebyte' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => safebyte_get_post_type_options($pt_supports),
                                'default'  => 'post'
                            )
                        ),
                        safebyte_get_post_list_layout($pt_supports)
                    ),
                ),
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source', 'safebyte' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'select_post_by',
                                'label'    => esc_html__( 'Select posts by', 'safebyte' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => [
                                    'term_selected' => esc_html__( 'Terms selected', 'safebyte' ),
                                    'post_selected' => esc_html__( 'Posts selected ', 'safebyte' ),
                                ],
                                'default'  => 'term_selected'
                            ) 
                        ),
                        safebyte_get_term_by_post_type($pt_supports, ['custom_condition' => ['select_post_by' => 'term_selected']]),
                        safebyte_get_ids_by_post_type($pt_supports, ['custom_condition' => ['select_post_by' => 'post_selected']]),
                        safebyte_get_ids_unselected_by_post_type($pt_supports, ['custom_condition' => ['select_post_by' => 'term_selected']]),
                        array(
                            array(
                                'name'    => 'orderby',
                                'label'   => esc_html__('Order By', 'safebyte' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'default' => 'date',
                                'options' => [
                                    'date'   => esc_html__('Date', 'safebyte' ),
                                    'ID'     => esc_html__('ID', 'safebyte' ),
                                    'author' => esc_html__('Author', 'safebyte' ),
                                    'title'  => esc_html__('Title', 'safebyte' ),
                                    'rand'   => esc_html__('Random', 'safebyte' ),
                                ],
                            ),
                            array(
                                'name'    => 'order',
                                'label'   => esc_html__('Sort Order', 'safebyte' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'default' => 'desc',
                                'options' => [
                                    'desc' => esc_html__('Descending', 'safebyte' ),
                                    'asc'  => esc_html__('Ascending', 'safebyte' ),
                                ],
                            ),
                            array(
                                'name'    => 'limit',
                                'label'   => esc_html__('Total items', 'safebyte' ),
                                'type'    => \Elementor\Controls_Manager::NUMBER,
                                'default' => '6',
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'general_section',
                    'label' => esc_html__('General Settings', 'safebyte' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'    => 'show_toolbar',
                                'label'   => esc_html__('Show Toolbar', 'safebyte' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'default' => 'hide',
                                'options' => [
                                    'show' => esc_html__('Show', 'safebyte' ),
                                    'hide'   => esc_html__('Hide', 'safebyte' )
                                ],
                                'condition' => ['post_type' => 'post','layout_post' => 'post-1' ],
                            ),
                            array(
                                'name'        => 'img_size',
                                'label'       => esc_html__('Image Size', 'safebyte' ),
                                'type'        => \Elementor\Controls_Manager::TEXT,
                                'description' =>  esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: full).', 'safebyte')
                            ),
                            array(
                                'name'    => 'pagination_type',
                                'label'   => esc_html__('Pagination Type', 'safebyte' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'default' => 'false',
                                'options' => [
                                    'pagination' => esc_html__('Pagination', 'safebyte' ),
                                    'loadmore'   => esc_html__('Loadmore', 'safebyte' ),
                                    'false'      => esc_html__('Disable', 'safebyte' ),
                                ],
                            ),
                            array(
                                'name'      => 'loadmore_text',
                                'label'     => esc_html__( 'Load More text', 'safebyte' ),
                                'type'      => \Elementor\Controls_Manager::TEXT,
                                'default'   => esc_html__('Load More','safebyte'),
                                'condition' => [
                                    'pagination_type' => 'loadmore'
                                ]
                            ),
                            array(
                                'name'     => 'view_all_button',
                                'label'    => esc_html__('View All Button','safebyte' ),
                                'type'     => \Elementor\Controls_Manager::SWITCHER,
                                'default'  => 'true',
                                'condition' => ['post_type' => 'post','layout_post' => 'post-2' ],
                            ),
                            array(
                                'name'      => 'view_all_text',
                                'label'     => esc_html__( 'View All text','safebyte' ),
                                'type'      => \Elementor\Controls_Manager::TEXT,
                                'condition' => [
                                    'view_all_button' => 'true'
                                ]
                            ),
                            array(
                                'name'      => 'view_all_link',
                                'label'     => esc_html__( 'View All Link','safebyte' ),
                                'type'      => \Elementor\Controls_Manager::URL,
                                'condition' => [
                                    'view_all_button' => 'true'
                                ]
                            ),
                            array(
                                'name'         => 'pagination_alignment',
                                'label'        => esc_html__( 'Pagination Alignment', 'safebyte' ),
                                'type'         => 'choose',
                                'control_type' => 'responsive',
                                'options' => [
                                    'start' => [
                                        'title' => esc_html__( 'Start', 'safebyte' ),
                                        'icon'  => 'eicon-text-align-left',
                                    ],
                                    'center' => [
                                        'title' => esc_html__( 'Center', 'safebyte' ),
                                        'icon'  => 'eicon-text-align-center',
                                    ],
                                    'end' => [
                                        'title' => esc_html__( 'End', 'safebyte' ),
                                        'icon'  => 'eicon-text-align-right',
                                    ]
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-grid-pagination, {{WRAPPER}} .pxl-load-more' => 'justify-content: {{VALUE}};'
                                ],
                                'default'      => 'start',
                                'condition' => [
                                    'pagination_type' => ['pagination', 'loadmore'],
                                ],
                            ),
                            array(
                                'name' => 'title_hover',
                                'label' => esc_html__('Title Color', 'safebyte' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .layout-post-list-2 .item-content .item-title' => 'color: {{VALUE}};'
                                ],
                                'condition' => ['post_type' => 'post','layout_post' => 'post-2' ],
                            ), 
                            array(
                                'name' => 'title_hover_color',
                                'label' => esc_html__('Title Hover Color', 'safebyte' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .layout-post-list-2 .item-content .item-title:hover' => 'color: {{VALUE}};'
                                ],
                                'condition' => ['post_type' => 'post','layout_post' => 'post-2' ],
                            ), 
                        ),
                    )
                ),
                array(
                    'name' => 'display_post_section',
                    'label' => esc_html__('Display Options', 'safebyte' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'      => 'post_date',
                            'label'     => esc_html__('Show Date', 'safebyte' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                        ),
                        array(
                            'name'      => 'post_author',
                            'label'     => esc_html__('Show Author', 'safebyte' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                        ),
                        array(
                            'name'      => 'post_category',
                            'label'     => esc_html__('Show Category', 'safebyte' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'false',
                        ),
                        array(
                            'name'      => 'post_comment',
                            'label'     => esc_html__('Show Comment', 'safebyte' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                            'condition' => ['post_type' => 'post','layout_post' => 'post-1' ],
                        ),
                        array(
                            'name'      => 'post_excerpt',
                            'label'     => esc_html__('Show Excerpt', 'safebyte' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                        ),
                        array(
                            'name'      => 'post_num_words',
                            'label'     => esc_html__('Number of Words', 'safebyte' ),
                            'type'      => \Elementor\Controls_Manager::NUMBER,
                            'condition' => [
                                'post_excerpt' => 'true',
                            ],
                        ),
                        array(
                            'name'      => 'post_readmore',
                            'label'     => esc_html__('Show Readmore', 'safebyte' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                        ),
                        array(
                            'name'      => 'post_readmore_text',
                            'label'     => esc_html__('Button Text', 'safebyte' ),
                            'type'      => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'post_readmore' => 'true',
                            ],
                        ),
                        array(
                            'name'      => 'post_share',
                            'label'     => esc_html__('Show Social Share', 'safebyte' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                            'condition' => ['post_type' => 'post','layout_post' => 'post-1' ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    safebyte_get_class_widget_path()
);