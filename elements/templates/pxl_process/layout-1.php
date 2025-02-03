<div class="pxl-process pxl-process1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
	<?php if ( !empty($settings['pxl_icon']['value']) ) : ?>
        <div class="pxl-item--icon">
            <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
            <div class="pxl-item--number"><?php echo esc_attr($settings['number']); ?></div>
        </div>
    <?php endif; ?>
	<h5 class="pxl-item--title pxl-empty"><?php echo pxl_print_html($settings['title']); ?></h5>
	<div class="pxl-item--desc pxl-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
</div>