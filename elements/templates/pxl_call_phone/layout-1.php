<?php 
if ( ! empty( $settings['phone_link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['phone_link']['url'] );

    if ( $settings['phone_link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['phone_link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}
?>
<div class="pxl-call-phone pxl-call-phone1 <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <?php if ( !empty($settings['pxl_icon']['value']) ) : ?>
            <a class="pxl-item--icon pxl-fl-middle pxl-mr-20" <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?>>
                <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
            </a>
        <?php endif; ?>
        <div class="pxl-item--meta">
            <div class="pxl-item--title pxl-empty"><?php echo esc_attr($settings['title']); ?></div>
            <div class="pxl-item--number pxl-empty"><?php echo esc_attr($settings['number']); ?></div>
        </div>
        <?php if ( !empty($settings['button_text']) ) : ?>
            <a class="pxl-item--button pxl-fl-middle pxl-mr-20" <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?>>
                <?php echo esc_attr($settings['button_text']); ?>
            </a>
        <?php endif; ?>
    </div>
</div>