<?php
$active = intval($settings['active']);
$accordion = $widget->get_settings('accordion');
$wg_id = pxl_get_element_id($settings);
if(!empty($accordion)) : ?>
    <div class="pxl-accordion pxl-accordion3 <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <div class="pxl-accordion--steps">
            <div class="pxl-accordion--step-arrow"></div>
            <h5 class="pxl-accordion--step-title">
                <?php $total_items = count($accordion); ?>
                <?php echo esc_html($total_items); ?> <?php echo esc_html__('Steps!', 'safebyte'); ?>
            </h5>
            <div class="pxl-accordion--step-arrow"></div>
        </div>
        <div class="pxl-accordion--inner">
            <?php foreach ($accordion as $key => $value):
                $is_active = ($key + 1) == $active;
                $pxl_id = isset($value['_id']) ? $value['_id'] : '';
                $title = isset($value['title']) ? $value['title'] : '';
                $desc = isset($value['desc']) ? $value['desc'] : '';
                $number = isset($value['number']) ? $value['number'] : '';
                $icon_key = $widget->get_repeater_setting_key( 'pxl_icon', 'icons', $key );
                $widget->add_render_attribute( $icon_key, [
                    'class' => $value['pxl_icon'],
                    'aria-hidden' => 'true',
                ] ); ?>
                <div class="pxl--item <?php echo esc_attr($is_active ? 'active' : ''); ?>">
                    <<?php pxl_print_html($settings['title_tag']); ?> class="pxl-accordion--title" data-target="<?php echo esc_attr('#'.$wg_id.'-'.$pxl_id); ?>">
                    <?php if ( ! empty( $value['pxl_icon']['value'] ) ) : ?>
                        <span class="pxl-title--icon">
                            <?php \Elementor\Icons_Manager::render_icon( $value['pxl_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        </span>
                    <?php endif; ?>
                        <span class="pxl-title--text">
                            <span class="pxl-title--number"><?php echo wp_kses_post($number); ?></span>
                            <?php echo wp_kses_post($title); ?>
                        </span>
                        <?php if($settings['style'] == 'style-default') : ?><span class="pxl-icon--action"><span class="pxl-icon--plus"><span></span></span></span><?php endif; ?>
                    </<?php pxl_print_html($settings['title_tag']); ?>>
                    <div id="<?php echo esc_attr($wg_id.'-'.$pxl_id); ?>" class="pxl-accordion--content" <?php if($is_active){ ?>style="display: block;"<?php } ?>><?php echo wp_kses_post(nl2br($desc)); ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>