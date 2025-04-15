<div class="pxl-global">
    <div class="pxl-global-inner"></div>
    <?php foreach ($settings['supports'] as $support) : ?>
        <div class="pxl-global-support elementor-repeater-item-<?php echo esc_attr($support['_id']); ?>">
            <span class="pxl-global-support-icon">
                <i class="fas fa-check"></i>
            </span>
<<<<<<< HEAD
            <span class="pxl-global-support-title"><?php echo esc_attr($support['title']); ?></span>
=======
            <span class="pxl-global-support-title"><?php echo esc_html($support['title']); ?></span>
>>>>>>> 5ceaa66ccb0e329f82d0f7ba873ebd08506a50ac
        </div>
    <?php endforeach; ?>
</div>