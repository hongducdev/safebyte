<?php $html_id = pxl_get_element_id($settings);
$is_new = \Elementor\Icons_Manager::is_migration_allowed();

$services = get_posts([
    'post_type' => 'service',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'ASC'
]);

if (count($services) > 0) :
    $tab_bd_ids = [];
    $count_items = count($services);
    $limit = $settings['limit'];
    $tab_active = 1; ?>
    <div class="pxl-tabs pxl-tabs3 <?php echo esc_attr($settings['style_l2'] . ' ' . $settings['tab_effect'] . ' ' . $settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <div class="pxl-tabs--inner">
            <div class="pxl-tabs--title">
                <div>
                    <span class="pxl-item--title-box">
                        <?php echo esc_html__($settings['title_box'], 'safebyte'); ?>
                    </span>
                </div>
                <?php foreach (array_slice($services, 0, $limit) as $key => $service) : ?>
                    <span class="pxl-tab--title pxl-cursor--cta <?php echo esc_attr(($tab_active == $key + 1) ? 'active' : ''); ?>" data-target="#<?php echo esc_attr($html_id . '-' . $service->ID); ?>">
                        <div class="pxl-title--order">
                            <?php echo esc_html($key + 1); ?><span>/</span>
                        </div>
                        <span class="pxl-title--text">
                            <?php echo esc_html($service->post_title); ?>
                        </span>
                        <i class="fas fa-angle-right"></i>
                        <?php
                        $service_label = get_post_meta($service->ID, 'service_label', true);
                        if (!empty($service_label)) : ?>
                            <label class="pxl-empty"><?php echo esc_html($service_label); ?></label>
                        <?php endif; ?>
                    </span>
                <?php endforeach; ?>
                <div class="pxl-tab--control"></div>
            </div>

            <div class="pxl-tabs--content">
                <?php if (!empty($services) && is_array($services)) : ?>
                    <?php foreach (array_slice($services, 0, $limit) as $key => $service) : ?>
                        <div id="<?php echo esc_attr($html_id . '-' . $service->ID); ?>" class="pxl-tab--content <?php echo esc_attr(($tab_active == $key + 1) ? 'active' : ''); ?>" <?php echo esc_attr(($tab_active == $key + 1) ? 'style="display: block;"' : ''); ?>>
                            <h3 class="pxl-content--title">
                                <?php echo esc_html($service->post_title); ?>
                            </h3>
                            <p class="pxl-content--text"><?php echo wp_kses_post($service->post_excerpt); ?></p>

                            <?php
                            $service_feature = get_post_meta($service->ID, 'service_feature', true);
                            if (!empty($service_feature)) : ?>
                                <ul class="pxl-content--feature">
                                    <?php foreach ($service_feature as $feature) : ?>
                                        <li>
                                            <span><?php echo wp_kses_post($feature); ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                            <a href="<?php echo esc_url(get_permalink($service->ID)); ?>"
                                class="btn pxl-content--btn">
                                <?php echo esc_html__('View Details', 'safebyte'); ?>
                                <i class="flaticon flaticon-right-arrow-long"></i>
                            </a>

                            <div class="pxl-icon--service">
                                <?php
                                $service_icon_type = get_post_meta($service->ID, 'service_icon_type', true);
                                $service_icon_font = get_post_meta($service->ID, 'service_icon_font', true);
                                $service_icon_img = get_post_meta($service->ID, 'service_icon_img', true);

                                if ($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                                    <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                                <?php endif; ?>

                                <?php if ($service_icon_type == 'image' && !empty($service_icon_img) && filter_var($service_icon_img, FILTER_VALIDATE_URL)) : ?>
                                    <img src="<?php echo esc_url($service_icon_img); ?>" alt="<?php echo esc_attr($service->post_title); ?>">
                                <?php endif; ?>
                            </div>

                            <div class="pxl-tabs--content-blurry-light"></div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>