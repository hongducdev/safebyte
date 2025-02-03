<div class="pxl-pricing pxl-pricing1">
    <?php if (!empty($settings['popular'])) : ?>
        <div class="pxl-pricing--top pxl-text-right">
            <span><?php echo esc_attr($settings['popular']); ?></span>
        </div>
    <?php endif; ?>
    <div class="pxl-pricing--price">
        <span class="pxl-pricing--currency"><?php echo esc_attr($settings['currency']); ?></span>
        <span><?php echo esc_attr($settings['price']); ?></span>
    </div>
    <div class="pxl-pricing--title pxl-empty"><?php echo esc_attr($settings['title']); ?></div>
    <div class="pxl-pricing--subtitle pxl-empty"><?php echo esc_attr($settings['sub_title']); ?></div>
    <?php if(isset($settings['feature']) && !empty($settings['feature']) && count($settings['feature'])): ?>
        <ul class="pxl-pricing--feature">
            <?php
                foreach ($settings['feature'] as $key => $link):
                    $feature_text = $widget->parse_text_editor( $link['feature_text'] );
                    $feature_active = $widget->parse_text_editor( $link['feature_active'] );  ?>
                    <li>
                        <i class="flaticon-checked text-gradient pxl-mr-12"></i>
                        <?php if($feature_active == 'no') { echo '<del>'; } ?>
                        <?php echo pxl_print_html($feature_text); ?>
                        <?php if($feature_active == 'no') { echo '</del>'; } ?>
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
            <a class="btn" <?php pxl_print_html($widget->get_render_attribute_string( 'btn_link' )); ?>><span><?php echo esc_attr($settings['btn_text']); ?></span><i class="flaticon-right-arrow-1 pxl-ml-18"></i></a>
        </div>
    <?php } ?>
</div>