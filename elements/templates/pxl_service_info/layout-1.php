<?php
if (! empty($settings['link']['url'])) {
    $widget->add_render_attribute('button', 'href', $settings['link']['url']);

    if ($settings['link']['is_external']) {
        $widget->add_render_attribute('button', 'target', '_blank');
    }

    if ($settings['link']['nofollow']) {
        $widget->add_render_attribute('button', 'rel', 'nofollow');
    }
}
?>

<div class="pxl-service-info">
    <div class="pxl-service-info__image">
        <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($settings, 'image', 'image'); ?>
    </div>
    <div class="pxl-service-info__content">
        <div class="pxl-service-info__icon">
            <?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']); ?>
        </div>
        <div class="pxl-servicce-info__wrap">
            <h3 class="pxl-service-info__title">
                <?php echo esc_html($settings['title']); ?>
            </h3>
            <div class="pxl-service-info__description">
                <?php echo esc_html($settings['description']); ?>
            </div>
            <ul class="pxl-service-info__lists">
                <?php foreach ($settings['lists'] as $list) : ?>
                    <li class="pxl-service-info__list">
                        <?php echo esc_html($list['label']); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <?php if ($settings['link']['url']) : ?>
        <a href="<?php echo esc_url($settings['link']['url']); ?>" class="pxl-service-info__link">
            <i class="flaticon-next"></i>
        </a>
    <?php endif; ?>
</div>