<?php
$is_new = \Elementor\Icons_Manager::is_migration_allowed(); ?>
<?php if(isset($settings['item_content']) && !empty($settings['item_content']) && count($settings['item_content'])): ?>
    <div class="pxl-text-marquee pxl-text-marquee1">
        <?php foreach ($settings['item_content'] as $key => $value):
            $text = isset($value['text']) ? $value['text'] : '';
            $icon_img = isset($value['icon_img']) ? $value['icon_img'] : '';
            $icon_key = $widget->get_repeater_setting_key( 'pxl_icon', 'icons', $key );
            $widget->add_render_attribute( $icon_key, [
                'class' => $value['pxl_icon'],
                'aria-hidden' => 'true',
            ] ); ?>
            <div class="pxl-text--marquee">
                <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                    <?php if ( ! empty( $value['pxl_icon'] ) ) : ?>
                        <div class="pxl-item--icon">
                            <?php if ( $is_new ):
                                \Elementor\Icons_Manager::render_icon( $value['pxl_icon'], [ 'aria-hidden' => 'true' ] );
                            elseif(!empty($value['pxl_icon'])): ?>
                                <i class="<?php echo esc_attr( $value['pxl_icon'] ); ?>" aria-hidden="true"></i>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <div class="pxl-item--text pxl-empty"><?php echo esc_attr($text); ?></div>
               </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
