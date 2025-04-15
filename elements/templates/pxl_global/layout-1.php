<div class="pxl-global <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-global-inner"></div>
    <?php
    $index = 0;
    foreach ($settings['supports'] as $support) :
        $index++;
    ?>
        <div class="pxl-global-support elementor-repeater-item-<?php echo esc_attr($support['_id']); ?> wow fadeInUp" data-wow-duration="<?php echo esc_attr(300 + ($index * 100)); ?>ms">
            <span class="pxl-global-support-icon">
                <i class="fas fa-check"></i>
            </span>
            <span class="pxl-global-support-title"><?php echo esc_html($support['title']); ?></span>
        </div>
    <?php endforeach; ?>
</div>