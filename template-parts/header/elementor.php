<?php
$logo_m = safebyte()->get_opt('logo_m', ['url' => get_template_directory_uri() . '/assets/img/logo.png', 'id' => '']);
$logo_light_m = safebyte()->get_opt('logo_light_m', ['url' => get_template_directory_uri() . '/assets/img/logo-light.png', 'id' => '']);
$p_menu = safebyte()->get_page_opt('p_menu');
$header_mobile = safebyte()->get_page_opt('header_mobile', 'show');
$sticky_scroll = safebyte()->get_opt('sticky_scroll');

$header_layout = safebyte()->get_opt('header_layout');
$post_header = get_post($header_layout);
$header_type = get_post_meta($post_header->ID, 'header_type', true);
$header_sidebar_style = get_post_meta($post_header->ID, 'header_sidebar_style', true);
$page_mobile_style = safebyte()->get_page_opt('page_mobile_style');
$opt_mobile_style = safebyte()->get_opt('opt_mobile_style');
$header_display = safebyte()->get_opt('header_display');
$mobile_display = safebyte()->get_opt('mobile_display');
if (isset($page_mobile_style) && !empty($page_mobile_style) && $page_mobile_style != 'inherit') {
    $opt_mobile_style = $page_mobile_style;
}
$header_mobile_layout = safebyte()->get_opt('header_mobile_layout');
$header_mobile_layout_count = (int)safebyte()->get_opt('header_mobile_layout');
$post_header_mobile = get_post($header_mobile_layout);
?>
<header id="pxl-header-elementor" class="is-sticky pxl-header-<?php echo esc_attr($header_display); ?>">
    <?php if (isset($args['header_layout']) && $args['header_layout'] > 0) : ?>
        <div class="pxl-header-elementor-main <?php echo esc_attr($header_type); ?> <?php echo esc_attr($header_sidebar_style); ?>">
            <?php if ($header_sidebar_style == 'px-header-sidebar-style2') {
                echo '<div class="px-header-sidebar-inner">';
            } ?>
            <div class="pxl-header-content">
                <div class="row">
                    <div class="col-12">
                        <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display($args['header_layout']); ?>
                    </div>
                </div>
            </div>
            <?php if ($header_sidebar_style == 'px-header-sidebar-style2') {
                echo '</div>';
            } ?>
        </div>
    <?php endif; ?>
    <?php if (isset($args['header_layout_sticky']) && $args['header_layout_sticky'] > 0) : ?>
        <div class="pxl-header-elementor-sticky pxl-onepage-sticky <?php echo esc_attr($sticky_scroll); ?>">
            <div class="pxl-header-content">
                <div class="row">
                    <div class="col-12">
                        <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display($args['header_layout_sticky']); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($mobile_display == 'show') : ?>
        <div id="pxl-header-mobile" class="style-<?php echo esc_attr($opt_mobile_style); ?>">
            <div id="pxl-header-main" class="pxl-header-main">
                <div class="container">
                    <div class="row">
                        <?php if ($header_mobile_layout_count <= 0 || !class_exists('Pxltheme_Core') || !is_callable('Elementor\Plugin::instance')) { ?>
                            <div class="pxl-header-mobile-default">
                                <div class="pxl-header-branding">
                                    <?php
                                    if ($logo_m['url']) {
                                        printf(
                                            '<a href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
                                            esc_url(home_url('/')),
                                            esc_attr(get_bloginfo('name')),
                                            esc_url($logo_m['url'])
                                        );
                                    }
                                    ?>
                                </div>
                                <div id="pxl-nav-mobile">
                                    <div class="pxl-nav-mobile-button pxl-anchor-divider pxl-cursor--cta">
                                        <span class="pxl-icon-line pxl-icon-line1"></span>
                                        <span class="pxl-icon-line pxl-icon-line2"></span>
                                        <span class="pxl-icon-line pxl-icon-line3"></span>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="pxl-header-mobile-elementor <?php echo esc_attr($header_mobile_type); ?>">
                                <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display($header_mobile_layout); ?>
                            </div>
                        <?php } ?>
                        <div class="pxl-header-menu">
                            <div class="pxl-header-menu-scroll">
                                <div class="pxl-menu-close pxl-hide-xl pxl-close"></div>
                                <div class="pxl-logo-mobile pxl-hide-xl">
                                    <?php
                                    if ($logo_m['url']) {
                                        printf(
                                            '<a class="pxl-logo--dark" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
                                            esc_url(home_url('/')),
                                            esc_attr(get_bloginfo('name')),
                                            esc_url($logo_m['url'])
                                        );
                                    }
                                    ?>
                                    <?php
                                    if ($logo_light_m['url']) {
                                        printf(
                                            '<a class="pxl-logo--light" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
                                            esc_url(home_url('/')),
                                            esc_attr(get_bloginfo('name')),
                                            esc_url($logo_light_m['url'])
                                        );
                                    }
                                    ?>
                                </div>
                                <?php safebyte_header_mobile_search_form(); ?>
                                <nav class="pxl-header-nav">
                                    <?php
                                    if (has_nav_menu('primary-mobile')) {
                                        wp_nav_menu(array(
                                            'theme_location' => 'primary',
                                            'container'  => '',
                                            'menu_id'    => '',
                                            'menu_class' => 'pxl-menu-primary clearfix',
                                            'link_before'     => '<span>',
                                            'link_after'      => '</span>',
                                            'walker'         => class_exists('PXL_Mega_Menu_Walker') ? new PXL_Mega_Menu_Walker : '',
                                        ));
                                    } elseif (has_nav_menu('primary')) {

                                        $attr_menu = array(
                                            'theme_location' => 'primary',
                                            'container'  => '',
                                            'menu_id'    => '',
                                            'menu_class' => 'pxl-menu-primary clearfix',
                                            'link_before'     => '<span>',
                                            'link_after'      => '</span>',
                                            'walker'         => class_exists('PXL_Mega_Menu_Walker') ? new PXL_Mega_Menu_Walker : '',
                                        );
                                        if (isset($p_menu) && !empty($p_menu)) {
                                            $attr_menu['menu'] = $p_menu;
                                        }
                                        wp_nav_menu($attr_menu);
                                    } else { ?>
                                        <ul class="pxl-menu-primary">
                                            <?php wp_list_pages(array(
                                                'depth'        => 0,
                                                'show_date'    => '',
                                                'date_format'  => get_option('date_format'),
                                                'child_of'     => 0,
                                                'exclude'      => '',
                                                'title_li'     => '',
                                                'echo'         => 1,
                                                'authors'      => '',
                                                'sort_column'  => 'menu_order, post_title',
                                                'link_before'  => '',
                                                'link_after'   => '',
                                                'item_spacing' => 'preserve',
                                                'walker'       => '',
                                            )); ?>
                                        </ul>
                                    <?php }
                                    ?>
                                </nav>
                            </div>
                        </div>
                        <div class="pxl-header-menu-backdrop"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</header>