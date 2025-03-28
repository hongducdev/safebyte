<?php
$default_settings = [
    'current' => '',
    'menu_item' => '',
    'dropdown_position' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
?>
<?php if (!empty($current) && isset($menu_item) && !empty($menu_item) && count($menu_item)): ?>
    <div class="pxl-language-switcher1 <?php echo esc_attr($dropdown_position); ?> <?php echo esc_attr($style_layout); ?>">
        <div class="current--item">
            <label><?php echo esc_html($current); ?></label>
            <?php if ($style_layout == 'style-2' && !empty($current_flag) && isset($current_flag['id'])):
                $flag = pxl_get_image_by_size(array(
                    'attach_id'  => $current_flag['id'],
                    'thumb_size' => 'full',
                    'class' => 'no-lazyload'
                ));

                if (!empty($flag) && isset($flag['thumbnail'])) {
                    $thumbnail_flag = $flag['thumbnail'];
                    echo pxl_print_html($thumbnail_flag);
                }
            endif; ?>
        </div>
        <ul>
            <?php
            foreach ($menu_item as $key => $item):
                $flag_icon = isset($item['flag']) ? $item['flag'] : '';
                $link_key = $widget->get_repeater_setting_key('title', 'value', $key);
                if (! empty($item['link']['url'])) {
                    $widget->add_render_attribute($link_key, 'href', $item['link']['url']);

                    if ($item['link']['is_external']) {
                        $widget->add_render_attribute($link_key, 'target', '_blank');
                    }

                    if ($item['link']['nofollow']) {
                        $widget->add_render_attribute($link_key, 'rel', 'nofollow');
                    }
                }
                $link_attributes = $widget->get_render_attribute_string($link_key);
            ?>
                <li>
                    <a <?php echo implode(' ', [$link_attributes]); ?>>
                        <?php
                        if ($style_layout == 'style-2'):
                            $flag_img = pxl_get_image_by_size(array(
                                'attach_id'  => $flag_icon['id'],
                                'thumb_size' => 'full',
                            ));
                            $thumbnail = $flag_img['thumbnail'];
                            echo pxl_print_html($thumbnail);
                        endif;
                        ?>
                        <?php echo pxl_print_html($item['text']); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>