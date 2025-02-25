<div class="pxl-icon-box pxl-icon-box4 <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <?php if ( ! empty( $settings['item_link']['url'] ) ) {
        $widget->add_render_attribute( 'item_link', 'href', $settings['item_link']['url'] );

        if ( $settings['item_link']['is_external'] ) {
            $widget->add_render_attribute( 'item_link', 'target', '_blank' );
        }

        if ( $settings['item_link']['nofollow'] ) {
            $widget->add_render_attribute( 'item_link', 'rel', 'nofollow' );
        } ?>
        <a class="pxl-item--link" <?php pxl_print_html($widget->get_render_attribute_string( 'item_link' )); ?>></a>
    <?php } ?>
    <div class="pxl-item--holder">
        <div class="pxl-item--header">
            <?php if ( $settings['icon_type'] == 'icon' && !empty($settings['pxl_icon']['value']) ) : ?>
                <div class="pxl-item--icon pxl-mr-28">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                </div>
            <?php endif; ?>
            <?php if ( $settings['icon_type'] == 'image' && !empty($settings['icon_image']['id']) ) : ?>
                <div class="pxl-item--icon pxl-mr-28">
                    <?php $img_icon  = pxl_get_image_by_size( array(
                            'attach_id'  => $settings['icon_image']['id'],
                            'thumb_size' => 'full',
                        ) );
                        $thumbnail_icon    = $img_icon['thumbnail'];
                    echo pxl_print_html($thumbnail_icon); ?>
                </div>
            <?php endif; ?>
            <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title el-empty"><?php echo pxl_print_html($settings['title']); ?></<?php echo esc_attr($settings['title_tag']); ?>>
        </div>
        <div class="pxl-item--divider"></div>
        <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
    </div>
</div>