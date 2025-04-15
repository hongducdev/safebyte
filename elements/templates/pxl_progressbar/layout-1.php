<?php
if(isset($settings['progressbar']) && !empty($settings['progressbar'])): 
    $is_new = \Elementor\Icons_Manager::is_migration_allowed(); ?>
    <div class="pxl-progressbar pxl-progressbar-1 <?php echo esc_attr($settings['style_l1']); ?>">
        <?php foreach ($settings['progressbar'] as $key => $progressbar): 
            $icon_key = $widget->get_repeater_setting_key( 'pxl_icon', 'icons', $key );
            $widget->add_render_attribute( $icon_key, [
                'class' => $progressbar['pxl_icon'],
                'aria-hidden' => 'true',
            ] ); ?>
            <div class="pxl--item <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                <div class="pxl--holder pxl-flex-grow">
                    <div class="pxl--meta pxl-flex-middle">
                        <div class="pxl--title pxl-flex-grow el-empty pxl-mr-10"><?php echo pxl_print_html($progressbar['title']); ?></div>
                        <div class="pxl--percentage"><?php echo esc_html($progressbar['percent']['size']); ?>%</div>
                    </div>
                    <div class="pxl-progressbar--wrap">
                        <div class="pxl--progressbar" role="progressbar" data-valuetransitiongoal="<?php echo esc_attr($progressbar['percent']['size']); ?>"></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>