<?php 
if ( ! empty( $settings['btn_link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['btn_link']['url'] );

    if ( $settings['btn_link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['btn_link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}
?>
<div class="pxl-showcase pxl-showcase2 pxl-hover-parallax <?php echo esc_attr($settings['pxl_animate']); ?> <?php if($settings['active'] == 'yes' && !empty($settings['active_label']) && empty($settings['btn_text'])) { echo 'pxl-wg-active'; } ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <?php if(!empty($settings['image']['id'])) :
            $img = pxl_get_image_by_size( array(
                'attach_id'  => $settings['image']['id'],
                'thumb_size' => 'full',
            ));
            $thumbnail = $img['thumbnail']; ?>
            <div class="pxl-item--image">
                <?php echo pxl_print_html($thumbnail); ?>
            </div>
        <?php endif; ?>
        <?php if(!empty($settings['btn_text'])) : ?>
            <div class="pxl-item--readmore pxl-item-parallax">
                <a <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?>>
                    <span><?php echo esc_attr($settings['btn_text']); ?></span>
                </a>
            </div>
            <div class="pxl-item--overlay"></div>
        <?php endif; ?>
        <?php if(!empty($settings['title'])) : ?>
            <div class="pxl-item--title"><?php echo esc_attr($settings['title']); ?></div>
        <?php endif; ?>
        <?php if($settings['active'] == 'yes' && !empty($settings['active_label']) && empty($settings['btn_text'])) : ?>
            <div class="pxl-item--label"><?php echo esc_attr($settings['active_label']); ?></div>
        <?php endif; ?>
    </div>
</div>