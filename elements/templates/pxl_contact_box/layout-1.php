<?php 
	if ( ! empty( $settings['link']['url'] ) ) {
	    $widget->add_render_attribute( 'button', 'href', $settings['link']['url'] );

	    if ( $settings['link']['is_external'] ) {
	        $widget->add_render_attribute( 'button', 'target', '_blank' );
	    }

	    if ( $settings['link']['nofollow'] ) {
	        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
	    }
	}
?>
<div class="pxl-contact-box pxl-contact-box1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
	<div class="pxl-contact--inner">
		<?php if(!empty($settings['button_text'])) : ?>
			<div class="pxl-item--button">
				<a class="btn btn-gradient-horizontal" <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?>><?php echo esc_attr($settings['button_text']); ?></a>
			</div>
		<?php endif; ?>
		<div class="pxl-item--holder">
			<?php if(!empty($settings['pxl_icon'])) {  ?>
				<div class="pxl-item--icon pxl-mr-18">
					<?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
				</div>
			<?php } ?>
			<div class="pxl-item--meta">
				<h6 class="pxl-item--title el-empty"><?php echo esc_attr($settings['title']); ?></h6>
				<div class="pxl-item--content el-empty"><?php echo pxl_print_html($settings['pxl_content']); ?></div>
			</div>
		</div>
	</div>
</div>