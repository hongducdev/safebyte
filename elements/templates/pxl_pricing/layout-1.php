<div class="pxl-pricing pxl-pricing1 <?php echo esc_attr($settings['popular'] == 'yes' ? 'popular' : ''); ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <?php if (!empty($settings['plan'])) : ?>
        <div class="pxl-pricing--top">
            <?php if ($settings['popular'] == 'yes') :?>
                <i class="fas fa-star"></i>
            <?php endif;?>
            <span><?php echo esc_attr($settings['plan']); ?></span>
        </div>
    <?php endif; ?>
    <div class="pxl-pricing--header">
        <div class="pxl-pricing--price">
            <span class="pxl-pricing--currency"><?php echo esc_attr($settings['currency']); ?></span>
            <span><?php echo esc_attr($settings['price']); ?></span>
        </div>
        <div class="pxl-pricing--title pxl-empty"><?php echo esc_attr($settings['title']); ?></div>
    </div>
    <div class="pxl-pricing--subtitle pxl-empty"><?php echo esc_attr($settings['sub_title']); ?></div>
    <?php if (!empty($settings['btn_download_text'])) :?>
        <a class="pxl-pricing--download" href="<?php echo esc_url($settings['btn_download_link']['url']);?>"><span><?php echo esc_attr($settings['btn_download_text']);?></span><i class="far fa-arrow-to-bottom"></i></a>
    <?php endif;?>
    <?php if(isset($settings['feature']) && !empty($settings['feature']) && count($settings['feature'])): ?>
        <ul class="pxl-pricing--feature">
            <?php
                foreach ($settings['feature'] as $key => $link):
                    $feature_text = $widget->parse_text_editor( $link['feature_text'] );
                    $feature_active = $widget->parse_text_editor( $link['feature_active'] );  ?>
                    <li class="<?php echo esc_attr($feature_active == 'yes' ? 'active' : ''); ?>">
                        <?php if ($feature_active == 'yes') :?>
                            <i class="fas fa-check pxl-mr-10"></i>
                        <?php elseif ($feature_active == 'no') :?>
                            <i class="fas fa-times pxl-mr-12"></i>
                        <?php endif;?>
                        <?php echo pxl_print_html($feature_text); ?>
                    </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <?php if ( ! empty( $settings['btn_text'] ) ) {
        $widget->add_render_attribute( 'btn_link', 'href', $settings['btn_link']['url'] );

        if ( $settings['btn_link']['is_external'] ) {
            $widget->add_render_attribute( 'btn_link', 'target', '_blank' );
        }

        if ( $settings['btn_link']['nofollow'] ) {
            $widget->add_render_attribute( 'btn_link', 'rel', 'nofollow' );
        } ?>
        <div class="pxl-pricing--button">
            <a class="btn" <?php pxl_print_html($widget->get_render_attribute_string( 'btn_link' )); ?>><span><?php echo esc_attr($settings['btn_text']); ?></span></a>
        </div>
    <?php } ?>
</div>