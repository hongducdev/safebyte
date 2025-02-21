<div class="pxl-global">
    <div class="pxl-global-inner"></div>
    <?php foreach ($settings['supports'] as $support) : ?>
        <div class="pxl-global-support elementor-repeater-item-<?php echo $support['_id']; ?>">
            <span class="pxl-global-support-icon">
                <i class="fas fa-check"></i>
            </span>
            <span class="pxl-global-support-title"><?php echo $support['title']; ?></span>
        </div>
    <?php endforeach; ?>
</div>