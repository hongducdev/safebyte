<div class="pxl-image-scroll pxl-image-scroll1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-scroll-image">
        <?php foreach ($settings['contents'] as $content) : ?>
            <div class="pxl-item-image" style="background-image: url('<?php echo esc_url($content['image']['url']); ?>');">
            </div>
        <?php endforeach; ?>
    </div>
    <div class="pxl-scroll-title">
        <?php foreach ($settings['contents'] as $content) : ?>
            <div class="pxl-item-title">
                <?php echo esc_html($content['title']); ?>
            </div>
        <?php endforeach; ?>
        <a href="<?php echo esc_url($settings['btn_link']['url']); ?>" class="btn btn-view-all">
            <?php if(!empty($settings['btn_text'])): ?>
                <?php echo esc_html($settings['btn_text']); ?>
            <?php else: ?>
                <?php echo esc_html__('View All Solutions', 'safebyte'); ?>
            <?php endif; ?>
        </a>
    </div>
    <div class="pxl-scroll-content">
        <?php foreach ($settings['contents'] as $content) : ?>
            <div class="pxl-item-content">
                <h3 class="pxl-item-title-seco">
                    <?php echo esc_html($content['title_2']); ?>
                </h3>
                <?php echo wp_kses_post($content['content']); ?>
                <div class="pxl-item-list">
                    <?php echo wp_kses_post($content['list']); ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>