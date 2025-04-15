<?php
global $wp;
$html_id = pxl_get_element_id($settings); ?>
<div class="pxl-link-wrap">
    <h3 class="pxl-widget-title pxl-empty"><?php echo esc_html($settings['wg_title']); ?></h3>
    <?php if(isset($settings['link']) && !empty($settings['link']) && count($settings['link'])): 
        $current_url_path = home_url( add_query_arg( array(), $wp->request ) ); ?>
        <ul id="pxl-link-<?php echo esc_attr($html_id) ?>" class="pxl-link pxl-link-l1 <?php echo esc_attr($settings['style'].' '.$settings['type']); ?>">
            <?php
                foreach ($settings['link'] as $key => $link):
                    $icon_key = $widget->get_repeater_setting_key( 'pxl_icon', 'icons', $key );
                    $widget->add_render_attribute( $icon_key, [
                        'class' => $link['pxl_icon'],
                        'aria-hidden' => 'true',
                    ] );
                    $link_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
                    if ( ! empty( $link['link']['url'] ) ) {
                        $widget->add_render_attribute( $link_key, 'href', $link['link']['url'] );

                        if ( $link['link']['is_external'] ) {
                            $widget->add_render_attribute( $link_key, 'target', '_blank' );
                        }

                        if ( $link['link']['nofollow'] ) {
                            $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                        }
                    }
                    $link_attributes = $widget->get_render_attribute_string( $link_key );
                    $active_cls = '' ;
                    $current_id = get_the_ID();
                    if( $current_id > 0 ){
                        $current_url = get_the_permalink( $current_id, false );
                        if( $link['link']['url'] == $current_url || $link['link']['url'].'/' == $current_url || $link['link']['url'] == $current_url.'/')
                            $active_cls = 'active';
                    }
                    if( $link['link']['url'] == $current_url_path || $link['link']['url'].'/' == $current_url_path || $link['link']['url'] == $current_url_path.'/')
                        $active_cls = 'active';
                    $text = $widget->parse_text_editor( $link['text'] ); ?>
                    <li class="pxl-item--link <?php echo esc_attr($active_cls.' '.$settings['pxl_animate'])?>">
                        <?php if($settings['style'] == 'style-hover-divider'): ?>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" height="24" viewBox="0 0 24 24" width="24"><path d="m19.71 12.71-6 6c-.0932.0932-.2039.1672-.3258.2177-.1218.0504-.2523.0764-.3842.0764s-.2624-.026-.3842-.0764c-.1219-.0505-.2326-.1245-.3258-.2177s-.1672-.2039-.2177-.3257c-.0504-.1219-.0764-.2524-.0764-.3843s.026-.2624.0764-.3842c.0505-.1219.1245-.2326.2177-.3258l4.3-4.29h-11.59c-.26522 0-.51957-.1054-.70711-.2929-.18753-.1875-.29289-.4419-.29289-.7071s.10536-.5196.29289-.7071c.18754-.1875.44189-.2929.70711-.2929h11.59l-4.3-4.29c-.1883-.1883-.2941-.4437-.2941-.71s.1058-.52169.2941-.71c.1883-.1883.4437-.29409.71-.29409s.5217.10579.71.29409l6 6c.0937.093.1681.2036.2189.3254.0508.1219.0769.2526.0769.3846s-.0261.2627-.0769.3846c-.0508.1218-.1252.2324-.2189.3254z" fill="currentColor"></path></svg>
                        <?php endif; ?>
                            <a class="<?php if($settings['icon_color_type'] == 'gradient') { echo 'pxl-icon-color-gradient'; } ?>" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                            <?php if(!empty($link['pxl_icon']['value'])){ ?>
                                <span class="pxl-link--icon bg-<?php echo esc_attr($settings['bg_icon_color_type']); ?>">
                                    <?php \Elementor\Icons_Manager::render_icon( $link['pxl_icon'], [ 'aria-hidden' => 'true' ], 'i' ); ?>
                                </span>
                            <?php } ?>
                            <span class="pxl-link--text"><?php echo pxl_print_html($text); ?></span>
                        </a>
                    </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>