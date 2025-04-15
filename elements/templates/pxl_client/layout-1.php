<div class="pxl-client <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-client--images">
        <?php foreach ($settings['images'] as $image) : ?>
            <div class="pxl-client--image" style="background-image: url('<?php echo esc_url($image['image']['url']); ?>');"></div>
        <?php endforeach; ?>
    </div>
    <div class="pxl-client--content">
        <div class="pxl-counter--number">
            <span class="pxl-counter--value effect-default" data-duration="2000" data-startnumber="1" data-endnumber="<?php echo esc_attr($settings['number']); ?>" data-to-value="<?php echo esc_attr($settings['number']); ?>">1</span>
            <?php if(!empty($settings['suffix'])) : ?>
                <span class="pxl-counter--suffix"><?php echo pxl_print_html($settings['suffix']); ?></span>
            <?php endif; ?>
        </div>
        <div class="pxl-counter--title"><?php echo esc_html($settings['title']); ?></div>
    </div>
</div>