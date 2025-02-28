<?php
$active = intval($settings['active']);
$accordion = $widget->get_settings('accordion');
$wg_id = pxl_get_element_id($settings);
if(!empty($accordion)) : ?>
    <div class="pxl-accordion pxl-accordion2 <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php foreach ($accordion as $key => $value):
            $is_active = ($key + 1) == $active;
            $pxl_id = isset($value['_id']) ? $value['_id'] : '';
            $title = isset($value['title']) ? $value['title'] : '';
            $job_description = isset($value['job_description']) ? $value['job_description'] : '';
            $request = isset($value['request']) ? $value['request'] : '';
            $salary_received = isset($value['salary_received']) ? $value['salary_received'] : '';
            $button_text = isset($value['button_text']) ? $value['button_text'] : '';
            $button_link = isset($value['button_link']) ? $value['button_link'] : '';
            $button_link_key = $widget->get_repeater_setting_key( 'button_link', 'value', $key );
            $widget->add_render_attribute( $button_link_key, 'href', $button_link['url'] );
            $link_attributes = $widget->get_render_attribute_string( $button_link_key );
            ?>
            <div class="pxl--item <?php echo esc_attr($is_active ? 'active' : ''); ?>">
                <<?php pxl_print_html($settings['title_tag']); ?> class="pxl-accordion--title" data-target="<?php echo esc_attr('#'.$wg_id.'-'.$pxl_id); ?>">
                    <span class="pxl-title--text"><?php echo wp_kses_post($title); ?></span>
                    <span class="pxl-icon--action">
                        <i class="caseicon-angle-arrow-down"></i>
                    </span>
                </<?php pxl_print_html($settings['title_tag']); ?>>
                <div id="<?php echo esc_attr($wg_id.'-'.$pxl_id); ?>" class="pxl-accordion--content" <?php if($is_active){ ?>style="display: block;"<?php } ?>>
                    <div class="pxl-accordion--content-inner">
                        <div class="pxl-accordion--content-item">
                            <span>Job description</span>
                            <p><?php echo wp_kses_post($job_description); ?></p>
                        </div>
                        <div class="pxl-accordion--content-item">
                            <span>Request:</span><?php echo wp_kses_post($request); ?>
                        </div>
                        <div class="pxl-accordion--content-item">
                            <span>Salary received:</span><?php echo wp_kses_post($salary_received); ?>
                        </div>

                        <?php if(!empty($button_link)) : ?>
                            <a <?php pxl_print_html($link_attributes); ?> class="btn"><?php echo esc_html($button_text); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>