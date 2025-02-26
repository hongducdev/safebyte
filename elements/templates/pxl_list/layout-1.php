<?php if(isset($settings['lists']) && !empty($settings['lists']) && count($settings['lists'])): ?>
    <div class="pxl-list pxl-list1 pxl-list-<?php echo esc_attr($settings['list_direction']); ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php foreach ($settings['lists'] as $key => $value): ?>
            <div class="pxl--item <?php echo esc_attr($settings['list_type']); ?>">
                <div class="pxl-item--meta">
                    <?php if($settings['list_type'] == 'list-number') : ?>
                        <div class="pxl-item--number <?php if($settings['box_shadow_number'] == 'true') { echo 'pxl-box-shadow'; } ?>"><?php echo esc_html($value['number']); ?></div>
                    <?php endif; ?>
                    <?php if ( $settings['icon_type'] == 'icon' && !empty($settings['pxl_icon']['value']) ) : ?>
                        <div class="pxl-item--icon <?php echo esc_attr($settings['icon_box']) ? 'pxl-icon--box' : ''; ?> <?php if($settings['icon_color_type'] == 'gradient') { echo 'pxl-icon-color-gradient'; } ?>">
                            <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ( $settings['icon_type'] == 'image' && !empty($settings['icon_image']['id']) ) : 
                        $img_icon  = pxl_get_image_by_size( array(
                            'attach_id'  => $settings['icon_image']['id'],
                            'thumb_size' => 'full',
                        ) );
                        $thumbnail_icon    = $img_icon['thumbnail']; ?>
                        <div class="pxl-item--icon"><?php echo pxl_print_html($thumbnail_icon); ?></div>
                    <?php endif; ?>
                </div>
                <div class="pxl-item--content">
                    <label class="pxl-empty"><?php echo esc_html($value['label']); ?></label>
                    <?php echo pxl_print_html($value['content'])?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>