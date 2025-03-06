<?php
if (!class_exists('ReduxFramework')) {
    return;
}
if (class_exists('ReduxFrameworkPlugin')) {
    remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
}

$opt_name = safebyte()->get_option_name();
$version = safebyte()->get_version();

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => '', //$theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $version,
    // Version that appears at the top of your panel
    'menu_type'            => 'submenu', //class_exists('Pxltheme_Core') ? 'submenu' : '',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('Theme Options', 'safebyte'),
    'page_title'           => esc_html__('Theme Options', 'safebyte'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => false,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-generic',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => true,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    'show_options_object' => false,
    // OPTIONAL -> Give you extra features
    'page_priority'        => 80,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'pxlart', //class_exists('Safebyte_Admin_Page') ? 'case' : '',
    // For a full list of options, visit: //codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'pxlart-theme-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
);

Redux::SetArgs($opt_name, $args);

/*--------------------------------------------------------------
# Colors
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Global Colors', 'safebyte'),
    'icon'       => 'el el-filter',
    'fields' => array(
        array(
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color', 'safebyte'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'secondary_color',
            'type'        => 'color',
            'title'       => esc_html__('Secondary Color', 'safebyte'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'third_color',
            'type'        => 'color',
            'title'       => esc_html__('Third Color', 'safebyte'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'dark_color',
            'type'        => 'color',
            'title'       => esc_html__('Dark Color', 'safebyte'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'      => 'link_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Link Colors', 'safebyte'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'  => ''
            ),
            'output'  => array('a')
        ),
        array(
            'id'          => 'gradient_first_color',
            'type'        => 'color',
            'title'       => esc_html__('Gradient First Color', 'safebyte'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'gradient_color',
            'type'        => 'color_gradient',
            'title'       => esc_html__('Gradient Color', 'safebyte'),
            'transparent' => false,
            'default'  => array(
                'from' => '',
                'to'   => '', 
            ),
        ),
        array(
            'id'          => 'gradient_color2',
            'type'        => 'color_gradient',
            'title'       => esc_html__('Gradient Color 2', 'safebyte'),
            'transparent' => false,
            'default'  => array(
                'from' => '',
                'to'   => '', 
            ),
        ),
    )
));

/*--------------------------------------------------------------
# Typography
--------------------------------------------------------------*/
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Typography', 'safebyte'),
    'icon'   => 'el-icon-text-width',
    'fields' => array(

        array(
            'id'          => 'font_body',
            'type'        => 'typography',
            'title'       => esc_html__('Body Font', 'safebyte'),
            'google'      => true,
            'font-backup' => false,
            'all_styles'  => true,
            'line-height'  => true,
            'font-size'  => true,
            'text-align'  => false,
            'output'      => array('body'),
            'units'       => 'px',
        ),
        
        array(
            'id'          => 'font_heading_h1',
            'type'        => 'typography',
            'title'       => esc_html__('Heading H1', 'safebyte'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'line-height' => true,
            'font-size'   => true,
            'font-backup' => false,
            'font-style'  => false,
            'output'      => array('h1'),
            'units'       => 'px',
        ),

        array(
            'id'          => 'font_heading_h2',
            'type'        => 'typography',
            'title'       => esc_html__('Heading H2', 'safebyte'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'line-height' => true,
            'font-size'   => true,
            'font-backup' => false,
            'font-style'  => false,
            'output'      => array('h2'),
            'units'       => 'px',
        ),

        array(
            'id'          => 'font_heading_h3',
            'type'        => 'typography',
            'title'       => esc_html__('Heading H3', 'safebyte'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'line-height' => true,
            'font-size'   => true,
            'font-backup' => false,
            'font-style'  => false,
            'output'      => array('h3'),
            'units'       => 'px',
        ),

        array(
            'id'          => 'font_heading_h4',
            'type'        => 'typography',
            'title'       => esc_html__('Heading H4', 'safebyte'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'line-height' => true,
            'font-size'   => true,
            'font-backup' => false,
            'font-style'  => false,
            'output'      => array('h4'),
            'units'       => 'px',
        ),

        array(
            'id'          => 'font_heading_h5',
            'type'        => 'typography',
            'title'       => esc_html__('Heading H5', 'safebyte'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'line-height' => true,
            'font-size'   => true,
            'font-backup' => false,
            'font-style'  => false,
            'output'      => array('h5'),
            'units'       => 'px',
        ),

        array(
            'id'          => 'font_heading_h6',
            'type'        => 'typography',
            'title'       => esc_html__('Heading H6', 'safebyte'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'line-height' => true,
            'font-size'   => true,
            'font-backup' => false,
            'font-style'  => false,
            'output'      => array('h6'),
            'units'       => 'px',
        ),

        array(
            'id'          => 'f_secondary',
            'type'        => 'typography',
            'title'       => esc_html__('Secondary', 'safebyte'),
            'google'      => true,
            'font-backup' => false,
            'all_styles'  => false,
            'line-height'  => false,
            'font-size'  => false,
            'color'  => false,
            'font-style'  => false,
            'font-weight'  => false,
            'text-align'  => false,
            'units'       => 'px',
            'output'      => array('.ft-secondary'),
        ),

    )
));

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('General', 'safebyte'),
    'icon'   => 'el el-wrench',
    'fields' => array(
        array(
            'id'       => 'site_loader',
            'type'     => 'button_set',
            'title'    => esc_html__('Site Loader', 'safebyte'),
            'options'  => array(
                'on' => esc_html__('On', 'safebyte'),
                'off' => esc_html__('Off', 'safebyte'),
            ),
            'default'  => 'off',
        ),
        array(
            'id'       => 'site_loader_style',
            'type'     => 'button_set',
            'title'    => esc_html__('Site Loader Style', 'safebyte'),
            'options'  => array(
                'style-1' => esc_html__('Style 1', 'safebyte'),
                'style-2' => esc_html__('Style 2', 'safebyte'),
            ),
            'default'  => 'style-1',
            'required' => array( 0 => 'site_loader', 1 => 'equals', 2 => 'on' ),
            'force_output' => true
        ),
        array(
            'id'       => 'site_loader_icon',
            'type'     => 'media',
            'title'    => esc_html__('Site Loader Icon', 'safebyte'),
            'default' => '',
            'url'      => false,
            'required' => array( 0 => 'site_loader', 1 => 'equals', 2 => 'on' ),
            'force_output' => true
        ),
        array(
            'id'       => 'mouse_move_animation',
            'type'     => 'button_set',
            'title'    => esc_html__('Mouse Move Animation', 'safebyte'),
            'options'  => array(
                'on' => esc_html__('On', 'safebyte'),
                'off' => esc_html__('Off', 'safebyte'),
            ),
            'default'  => 'off',
        ),
        array(
            'id'       => 'smooth_scroll',
            'type'     => 'button_set',
            'title'    => esc_html__('Smooth Scroll', 'safebyte'),
            'options'  => array(
                'on' => esc_html__('On', 'safebyte'),
                'off' => esc_html__('Off', 'safebyte'),
            ),
            'default'  => 'off',
        ),

        array(
            'id'       => 'cookie_policy',
            'type'     => 'button_set',
            'title'    => esc_html__('Cookie Policy', 'safebyte'),
            'options'  => array(
                'show' => esc_html__('Show', 'safebyte'),
                'hide' => esc_html__('Hide', 'safebyte'),
            ),
            'default'  => 'hide',
        ),
        array(
            'id'      => 'cookie_policy_description',
            'type'    => 'text',
            'title'   => esc_html__('Cookie Description', 'safebyte'),
            'default' => '',
            'required' => array( 0 => 'cookie_policy', 1 => 'equals', 2 => 'show' ),
        ),
        array(
            'id'          => 'cookie_policy_description_typo',
            'type'        => 'typography',
            'title'       => esc_html__('Cookie Description Font', 'safebyte'),
            'google'      => true,
            'font-backup' => false,
            'all_styles'  => true,
            'line-height'  => true,
            'font-size'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('.pxl-cookie-policy .pxl-item--description'),
            'units'       => 'px',
            'required' => array( 0 => 'cookie_policy', 1 => 'equals', 2 => 'show' ),
        ),
        array(
            'id'      => 'cookie_policy_btntext',
            'type'    => 'text',
            'title'   => esc_html__('Cookie Button Text', 'safebyte'),
            'default' => '',
            'required' => array( 0 => 'cookie_policy', 1 => 'equals', 2 => 'show' ),
        ),
        array(
            'id'    => 'cookie_policy_link',
            'type'  => 'select',
            'title' => esc_html__( 'Cookie Button Link', 'safebyte' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'cookie_policy', 1 => 'equals', 2 => 'show' ),
        ),

        array(
            'id'       => 'subscribe',
            'type'     => 'button_set',
            'title'    => esc_html__('Subscribe', 'safebyte'),
            'options'  => array(
                'show' => esc_html__('Show', 'safebyte'),
                'hide' => esc_html__('Hide', 'safebyte'),
            ),
            'default'  => 'hide',
        ),
        array(
            'id'      => 'subscribe_layout',
            'type'    => 'select',
            'title'   => esc_html__('Subscribe Layout', 'safebyte'),
            'desc'    => sprintf(esc_html__('Please create your layout before choosing. %sClick Here%s','safebyte'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '">','</a>'),
            'options' => safebyte_get_templates_option('popup'),
            'required' => array( 0 => 'subscribe', 1 => 'equals', 2 => 'show' ),
        ),
        array(
            'id'    => 'popup_effect',
            'type'  => 'select',
            'title' => esc_html__('Subscribe Popup Effect', 'safebyte'),
            'options' => [
                'fade'           => esc_html__('Fade', 'safebyte'),
                'fade-slide'           => esc_html__('Fade Slide', 'safebyte'),
                'zoom'           => esc_html__('Zoom', 'safebyte'),
            ],
            'default' => 'fade',
            'required' => array( 0 => 'subscribe', 1 => 'equals', 2 => 'show' ),
        ),
    )
));


/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Header', 'safebyte'),
    'icon'   => 'el el-indent-left',
    'fields' => array_merge(
        safebyte_header_opts(),
        array(
            array(
                'id'       => 'sticky_scroll',
                'type'     => 'button_set',
                'title'    => esc_html__('Sticky Scroll', 'safebyte'),
                'options'  => array(
                    'pxl-sticky-stt' => esc_html__('Scroll To Top', 'safebyte'),
                    'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'safebyte'),
                ),
                'default'  => 'pxl-sticky-stb',
            ),
        )
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Mobile', 'safebyte'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array_merge(
        safebyte_header_mobile_opts(),
        array(
            array(
                'id'       => 'mobile_display',
                'type'     => 'button_set',
                'title'    => esc_html__('Display', 'safebyte'),
                'options'  => array(
                    'show'  => esc_html__('Show', 'safebyte'),
                    'hide'  => esc_html__('Hide', 'safebyte'),
                ),
                'default'  => 'show'
            ),
            array(
                'id'       => 'opt_mobile_style',
                'type'     => 'button_set',
                'title'    => esc_html__('Style', 'safebyte'),
                'options'  => array(
                    'light'  => esc_html__('Light', 'safebyte'),
                    'dark'  => esc_html__('Dark', 'safebyte'),
                ),
                'default'  => 'light',
                'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
            ),
            array(
                'id'       => 'logo_m',
                'type'     => 'media',
                'title'    => esc_html__('Logo Dark in Menu Sidebar', 'safebyte'),
                 'default' => array(
                    'url'=>get_template_directory_uri().'/assets/img/logo.png'
                ),
                'url'      => false,
                'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
            ),
            array(
                'id'       => 'logo_light_m',
                'type'     => 'media',
                'title'    => esc_html__('Logo Light in Menu Sidebar', 'safebyte'),
                'default' => array(
                    'url'=>get_template_directory_uri().'/assets/img/logo-light.png'
                ),
                'url'      => false,
                'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
            ),
            array(
                'id'       => 'logo_height',
                'type'     => 'dimensions',
                'title'    => esc_html__('Logo Height', 'safebyte'),
                'width'    => false,
                'unit'     => 'px',
                'output'    => array('#pxl-header-default .pxl-header-branding img, #pxl-header-default #pxl-header-mobile .pxl-header-branding img, #pxl-header-elementor #pxl-header-mobile .pxl-header-branding img, .pxl-logo-mobile img'),
                'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
            ),
            array(
                'id'       => 'search_mobile',
                'type'     => 'switch',
                'title'    => esc_html__('Search Form', 'safebyte'),
                'default'  => true,
                'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
            ),
            array(
                'id'      => 'search_placeholder_mobile',
                'type'    => 'text',
                'title'   => esc_html__('Search Text Placeholder', 'safebyte'),
                'default' => '',
                'subtitle' => esc_html__('Default: Search...', 'safebyte'),
                'required' => array( 0 => 'search_mobile', 1 => 'equals', 2 => true ),
            )
        )
    )
));


/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Footer', 'safebyte'),
    'icon'   => 'el el-website',
    'fields' => array_merge(
        safebyte_footer_opts(),
        array(
            array(
                'id'       => 'back_totop_on',
                'type'     => 'switch',
                'title'    => esc_html__('Button Back to Top', 'safebyte'),
                'default'  => false,
            ),
            array(
                'id'       => 'footer_fixed',
                'type'     => 'button_set',
                'title'    => esc_html__('Footer Fixed', 'safebyte'),
                'options'  => array(
                    'on' => esc_html__('On', 'safebyte'),
                    'off' => esc_html__('Off', 'safebyte'),
                ),
                'default'  => 'off',
            ),
        ) 
    )
    
));

/*--------------------------------------------------------------
# Page Title area
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Page Title', 'safebyte'),
    'icon'   => 'el-icon-map-marker',
    'fields' => array_merge(
        safebyte_page_title_opts(),
        array(
            array(
                'id'       => 'ptitle_scroll_opacity',
                'title'    => esc_html__('Scroll Opacity', 'safebyte'),
                'type'     => 'switch',
                'default'  => false,
            ),
        )
    )
));

/*--------------------------------------------------------------
# WordPress default content
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog', 'safebyte'),
    'icon'  => 'el el-edit',
    'fields'     => array(
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog Archive', 'safebyte'),
    'icon'  => 'el-icon-pencil',
    'subsection' => true,
    'fields'     => array_merge(
        safebyte_sidebar_pos_opts([ 'prefix' => 'blog_']),
        array(
            array(
                'id'       => 'archive_date',
                'title'    => esc_html__('Date', 'safebyte'),
                'subtitle' => esc_html__('Display the Date for each blog post.', 'safebyte'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'archive_author',
                'title'    => esc_html__('Author', 'safebyte'),
                'subtitle' => esc_html__('Display the Author for each blog post.', 'safebyte'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'archive_category',
                'title'    => esc_html__('Category', 'safebyte'),
                'subtitle' => esc_html__('Display the Category for each blog post.', 'safebyte'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'archive_comment',
                'title'    => esc_html__('Comment', 'safebyte'),
                'subtitle' => esc_html__('Display the Comment for each blog post.', 'safebyte'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'      => 'featured_img_size',
                'type'    => 'text',
                'title'   => esc_html__('Featured Image Size', 'safebyte'),
                'default' => '',
                'subtitle' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
            ),
            array(
                'id'      => 'archive_excerpt_length',
                'type'    => 'text',
                'title'   => esc_html__('Excerpt Length', 'safebyte'),
                'default' => '',
                'subtitle' => esc_html__('Default: 50', 'safebyte'),
            ),
            array(
                'id'      => 'archive_readmore_text',
                'type'    => 'text',
                'title'   => esc_html__('Read More Text', 'safebyte'),
                'default' => '',
                'subtitle' => esc_html__('Default: Read more', 'safebyte'),
            ),
        )
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Post', 'safebyte'),
    'icon'       => 'el el-icon-pencil',
    'subsection' => true,
    'fields'     => array_merge(
        safebyte_sidebar_pos_opts([ 'prefix' => 'post_']),
        array(
            array(
                'id'       => 'sg_post_title',
                'type'     => 'button_set',
                'title'    => esc_html__('Page Title Type', 'safebyte'),
                'options'  => array(
                    'default' => esc_html__('Default', 'safebyte'),
                    'custom_text' => esc_html__('Custom Text', 'safebyte'),
                ),
                'default'  => 'default',
            ),
            array(
                'id'      => 'sg_post_title_text',
                'type'    => 'text',
                'title'   => esc_html__('Page Title Text', 'safebyte'),
                'default' => 'Blog Details',
                'required' => array( 0 => 'sg_post_title', 1 => 'equals', 2 => 'custom_text' ),
            ),
            array(
                'id'      => 'sg_featured_img_size',
                'type'    => 'text',
                'title'   => esc_html__('Featured Image Size', 'safebyte'),
                'default' => '',
                'subtitle' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
            ),
            array(
                'id'       => 'post_date',
                'title'    => esc_html__('Date', 'safebyte'),
                'subtitle' => esc_html__('Display the Date for blog post.', 'safebyte'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_author',
                'title'    => esc_html__('Author', 'safebyte'),
                'subtitle' => esc_html__('Display the Author for blog post.', 'safebyte'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_comment',
                'title'    => esc_html__('Comment', 'safebyte'),
                'subtitle' => esc_html__('Display the Comment for blog post.', 'safebyte'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_category',
                'title'    => esc_html__('Category', 'safebyte'),
                'subtitle' => esc_html__('Display the Category for blog post.', 'safebyte'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_tag',
                'title'    => esc_html__('Tags', 'safebyte'),
                'subtitle' => esc_html__('Display the Tag for blog post.', 'safebyte'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_navigation',
                'title'    => esc_html__('Navigation', 'safebyte'),
                'subtitle' => esc_html__('Display the Navigation for blog post.', 'safebyte'),
                'type'     => 'switch',
                'default'  => false,
            ),
            array(
                'title' => esc_html__('Social', 'safebyte'),
                'type'  => 'section',
                'id' => 'social_section',
                'indent' => true,
            ),
            array(
                'id'       => 'post_social_share',
                'title'    => esc_html__('Social', 'safebyte'),
                'subtitle' => esc_html__('Display the Social Share for blog post.', 'safebyte'),
                'type'     => 'switch',
                'default'  => false,
            ),
            array(
                'id'       => 'social_facebook',
                'title'    => esc_html__('Facebook', 'safebyte'),
                'type'     => 'switch',
                'default'  => true,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'social_twitter',
                'title'    => esc_html__('Twitter', 'safebyte'),
                'type'     => 'switch',
                'default'  => true,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'social_skype',
                'title'    => esc_html__('Skype', 'safebyte'),
                'type'     => 'switch',
                'default'  => true,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'social_telegram',
                'title'    => esc_html__('Telegram', 'safebyte'),
                'type'     => 'switch',
                'default'  => true,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
        )
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Portfolio', 'safebyte'),
    'icon'       => 'el el-briefcase',
    'fields'     => array(
        array(
            'id'       => 'portfolio_display',
            'type'     => 'button_set',
            'title'    => esc_html__('Portfolio', 'safebyte'),
            'options'  => array(
                'on' => esc_html__('On', 'safebyte'),
                'off' => esc_html__('Off', 'safebyte'),
            ),
            'default'  => 'on',
        ),
        array(
            'id'       => 'sg_portfolio_title',
            'type'     => 'button_set',
            'title'    => esc_html__('Page Title Type', 'safebyte'),
            'options'  => array(
                'default' => esc_html__('Default', 'safebyte'),
                'custom_text' => esc_html__('Custom Text', 'safebyte'),
            ),
            'default'  => 'default',
            'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'on' ),
            'force_output' => true
        ),
        array(
            'id'      => 'sg_portfolio_title_text',
            'type'    => 'text',
            'title'   => esc_html__('Page Title Text', 'safebyte'),
            'default' => 'Single Portfolio',
            'required' => array( 0 => 'sg_portfolio_title', 1 => 'equals', 2 => 'custom_text' ),
        ),
        array(
            'id'      => 'portfolio_slug',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Slug', 'safebyte'),
            'default' => '',
            'desc'     => 'Default: portfolio',
            'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'on' ),
            'force_output' => true
        ),
        array(
            'id'      => 'portfolio_name',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Name', 'safebyte'),
            'default' => '',
            'desc'     => 'Default: Portfolio',
            'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'on' ),
            'force_output' => true
        ),
        array(
            'id'    => 'archive_portfolio_link',
            'type'  => 'select',
            'title' => esc_html__( 'Custom Archive Page Link', 'safebyte' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'on' ),
            'force_output' => true
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Service', 'safebyte'),
    'icon'       => 'el el-cog',
    'fields'     => array(
        array(
            'id'       => 'service_display',
            'type'     => 'button_set',
            'title'    => esc_html__('Service', 'safebyte'),
            'options'  => array(
                'on' => esc_html__('On', 'safebyte'),
                'off' => esc_html__('Off', 'safebyte'),
            ),
            'default'  => 'on',
        ),
        array(
            'id'       => 'sg_service_title',
            'type'     => 'button_set',
            'title'    => esc_html__('Page Title Type', 'safebyte'),
            'options'  => array(
                'default' => esc_html__('Default', 'safebyte'),
                'custom_text' => esc_html__('Custom Text', 'safebyte'),
            ),
            'default'  => 'default',
            'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'on' ),
            'force_output' => true
        ),
        array(
            'id'      => 'sg_service_title_text',
            'type'    => 'text',
            'title'   => esc_html__('Page Title Text', 'safebyte'),
            'default' => 'Single Service',
            'required' => array( 0 => 'sg_service_title', 1 => 'equals', 2 => 'custom_text' ),
        ),
        array(
            'id'      => 'service_slug',
            'type'    => 'text',
            'title'   => esc_html__('Service Slug', 'safebyte'),
            'default' => '',
            'desc'     => 'Default: service',
            'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'on' ),
            'force_output' => true
        ),
        array(
            'id'      => 'service_name',
            'type'    => 'text',
            'title'   => esc_html__('Service Name', 'safebyte'),
            'default' => '',
            'desc'     => 'Default: Services',
            'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'on' ),
            'force_output' => true
        ),
        array(
            'id'    => 'archive_service_link',
            'type'  => 'select',
            'title' => esc_html__( 'Custom Archive Page Link', 'safebyte' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'on' ),
            'force_output' => true
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Industry', 'safebyte'),
    'icon'       => 'el el-cog',
    'fields'     => array(
        array(
            'id'       => 'industries_display',
            'type'     => 'button_set',
            'title'    => esc_html__('Industry', 'safebyte'),
            'options'  => array(
                'on' => esc_html__('On', 'safebyte'),
                'off' => esc_html__('Off', 'safebyte'),
            ),
            'default'  => 'on',
        ),
        array(
            'id'       => 'sg_industries_title',
            'type'     => 'button_set',
            'title'    => esc_html__('Page Title Type', 'safebyte'),
            'options'  => array(
                'default' => esc_html__('Default', 'safebyte'),
                'custom_text' => esc_html__('Custom Text', 'safebyte'),
            ),
            'default'  => 'default',
            'required' => array( 0 => 'industries_display', 1 => 'equals', 2 => 'on' ),
            'force_output' => true
        ),
        array(
            'id'      => 'sg_industries_title_text',
            'type'    => 'text',
            'title'   => esc_html__('Page Title Text', 'safebyte'),
            'default' => 'Single Industry',
            'required' => array( 0 => 'sg_industries_title', 1 => 'equals', 2 => 'custom_text' ),
        ),
        array(
            'id'      => 'industries_slug',
            'type'    => 'text',
            'title'   => esc_html__('Industry Slug', 'safebyte'),
            'default' => '',
            'desc'     => 'Default: industries',
            'required' => array( 0 => 'industries_display', 1 => 'equals', 2 => 'on' ),
            'force_output' => true
        ),
        array(
            'id'      => 'industries_name',
            'type'    => 'text',
            'title'   => esc_html__('Industry Name', 'safebyte'),
            'default' => '',
            'desc'     => 'Default: Industries',
            'required' => array( 0 => 'industries_display', 1 => 'equals', 2 => 'on' ),
            'force_output' => true
        ),
        array(
            'id'    => 'archive_industries_link',
            'type'  => 'select',
            'title' => esc_html__( 'Custom Archive Page Link', 'safebyte' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'industries_display', 1 => 'equals', 2 => 'on' ),
            'force_output' => true
        ),
    )
));

/*--------------------------------------------------------------
# Shop
--------------------------------------------------------------*/
if(class_exists('Woocommerce')) {
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Shop', 'safebyte'),
        'icon'   => 'el el-shopping-cart',
    ));

    Redux::setSection($opt_name, array(
        'title' => esc_html__('Product Archive', 'safebyte'),
        'icon'  => 'el-icon-pencil',
        'subsection' => true,
        'fields'     => array_merge(
            safebyte_sidebar_pos_opts([ 'prefix' => 'shop_']),
            array(
                array(
                    'id'      => 'shop_featured_img_size',
                    'type'    => 'text',
                    'title'   => esc_html__('Featured Image Size', 'safebyte'),
                    'default' => '',
                    'subtitle' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                ),
                array(
                    'title'         => esc_html__('Products displayed per row', 'safebyte'),
                    'id'            => 'products_columns',
                    'type'          => 'slider',
                    'subtitle'      => esc_html__('Number product to show per row', 'safebyte'),
                    'default'       => 3,
                    'min'           => 2,
                    'step'          => 1,
                    'max'           => 5,
                    'display_value' => 'text',
                ),
                array(
                    'title'         => esc_html__('Products displayed per page', 'safebyte'),
                    'id'            => 'product_per_page',
                    'type'          => 'slider',
                    'subtitle'      => esc_html__('Number product to show', 'safebyte'),
                    'default'       => 9,
                    'min'           => 3,
                    'step'          => 1,
                    'max'           => 50,
                    'display_value' => 'text'
                ),
                array(
                    'title'         => esc_html__('Number words excerpt', 'safebyte'),
                    'id'            => 'product_number_words_excerpt',
                    'type'          => 'slider',
                    'subtitle'      => esc_html__('Number words to show in excerpt', 'safebyte'),
                    'default'       => 25,
                    'min'           => 3,
                    'step'          => 1,
                    'max'           => 50,
                    'display_value' => 'text',
                ),
            )
        )
    ));

    Redux::setSection($opt_name, array(
        'title' => esc_html__('Single Product', 'safebyte'),
        'icon'  => 'el-icon-pencil',
        'subsection' => true,
        'fields'     => array_merge(
            safebyte_sidebar_pos_opts([ 'prefix' => 'single_product_']),
            array(
                array(
                    'id'       => 'single_img_size',
                    'type'     => 'dimensions',
                    'title'    => esc_html__('Image Size', 'safebyte'),
                    'unit'     => 'px',
                ),
                array(
                    'id'       => 'sg_product_ptitle',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Page Title Type', 'safebyte'),
                    'options'  => array(
                        'default' => esc_html__('Default', 'safebyte'),
                        'custom_text' => esc_html__('Custom Text', 'safebyte'),
                    ),
                    'default'  => 'default',
                ),
                array(
                    'id'      => 'sg_product_ptitle_text',
                    'type'    => 'text',
                    'title'   => esc_html__('Page Title Text', 'safebyte'),
                    'default' => 'Shop Details',
                    'required' => array( 0 => 'sg_product_ptitle', 1 => 'equals', 2 => 'custom_text' ),
                ),
                array(
                    'id'       => 'product_title',
                    'type'     => 'switch',
                    'title'    => esc_html__('Product Title', 'safebyte'),
                    'default'  => false
                ),
                array(
                    'id'       => 'product_social_share',
                    'type'     => 'switch',
                    'title'    => esc_html__('Social Share', 'safebyte'),
                    'default'  => false
                ),
            ),
        )
    ));
}