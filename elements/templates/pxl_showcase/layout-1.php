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
if ( ! empty( $settings['btn_link2']['url'] ) ) {
    $widget->add_render_attribute( 'button2', 'href', $settings['btn_link2']['url'] );

    if ( $settings['btn_link2']['is_external'] ) {
        $widget->add_render_attribute( 'button2', 'target', '_blank' );
    }

    if ( $settings['btn_link2']['nofollow'] ) {
        $widget->add_render_attribute( 'button2', 'rel', 'nofollow' );
    }
}

if (! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'link', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'link', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'link','rel', 'nofollow' ); 
    }
}
?>
<div class="pxl-showcase pxl-showcase1 <?php echo esc_attr($settings['pxl_animate']); ?> <?php echo esc_attr($settings['style-layout']); ?>  <?php if($settings['coming_soon'] == 'true') { echo 'pxl-wg-coming-soon'; } ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <?php if(!empty($settings['image']['id'])) :
        $img = pxl_get_image_by_size( array(
            'attach_id'  => $settings['image']['id'],
            'thumb_size' => 'full',
        ));
        $thumbnail = $img['thumbnail']; ?>
        <div class="pxl-item--image">
            <?php echo pxl_print_html($thumbnail); ?>
            <div class="pxl-item--overlay">
                <div class="pxl-item--meta">
                    <?php if(!empty($settings['btn_text'])) : ?>
                        <div class="pxl-item--readmore">
                            <a <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?>><?php echo esc_html($settings['btn_text']); ?></a>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($settings['btn_text2'])) : ?>
                        <div class="pxl-item--readmore">
                            <a <?php pxl_print_html($widget->get_render_attribute_string( 'button2' )); ?>><?php echo esc_html($settings['btn_text2']); ?></a>
                        </div>
                    <?php endif; ?>
                    <?php if($settings['coming_soon'] == 'true') : ?>
                        <div class="pxl-item--readmore">
                            Coming Soon
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if($settings['style-layout'] == 'style-1') :?>
        <a class="pxl-item--link" <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?>>
            <span>
                <?php echo esc_attr($settings['title']); ?>
            </span>
        </a>
    <?php else :?>
        <a class="pxl-item--link" <?php pxl_print_html($widget->get_render_attribute_string('link'));?>>
            <span>
                <?php echo esc_attr($settings['title']); ?>
            </span>
        </a>
    <?php endif;?>
</div>