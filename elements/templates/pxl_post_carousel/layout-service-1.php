<?php
$html_id = pxl_get_element_id($settings);
$select_post_by = $widget->get_setting('select_post_by', '');
$source = $post_ids = [];
if($select_post_by === 'post_selected'){
    $post_ids = $widget->get_setting('source_'.$settings['post_type'].'_post_ids', '');
}else{
    $source  = $widget->get_setting('source_'.$settings['post_type'], '');
}
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$settings['layout']    = $settings['layout_'.$settings['post_type']];
extract(pxl_get_posts_of_grid('service', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));

$pxl_animate = $widget->get_setting('pxl_animate', '');
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = (int)$widget->get_setting('col_md', '');
if($col_md == 'custom') {
    $col_md = $widget->get_setting('col_md_custom', '');
}
$col_lg = (int)$widget->get_setting('col_lg', '');
if($col_lg == 'custom') {
    $col_lg = $widget->get_setting('col_lg_custom', '');
}
$col_xl = (int)$widget->get_setting('col_xl', '');
if($col_xl == 'custom') {
    $col_xl = $widget->get_setting('col_xl_custom', '');
}
$col_xxl = (int)$widget->get_setting('col_xxl', '');
if($col_xxl == 'custom') {
    $col_xxl = $widget->get_setting('col_xxl_custom', '');
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');

$arrows = $widget->get_setting('arrows', false);
$pagination = $widget->get_setting('pagination', false);
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover', false);
$autoplay = $widget->get_setting('autoplay', false);
$autoplay_speed = $widget->get_setting('autoplay_speed', 5000);
$infinite = $widget->get_setting('infinite', false);
$speed = $widget->get_setting('speed', 500);
$drap = $widget->get_setting('drap', false);
$show_button = $widget->get_setting('show_button');
$button_text = $widget->get_setting('button_text');
$show_excerpt = $widget->get_setting('show_excerpt');
$num_words = $widget->get_setting('num_words', 25);
$style_layout = $widget->get_setting('style_layout', 'style-1');

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1, 
    'slide_percolumnfill'           => 1, 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => $col_xl, 
    'slides_to_show_xxl'            => $col_xxl, 
    'slides_to_show_lg'             => $col_lg, 
    'slides_to_show_md'             => $col_md, 
    'slides_to_show_sm'             => (int)$col_sm, 
    'slides_to_show_xs'             => (int)$col_xs, 
    'slides_to_scroll'              => (int)$slides_to_scroll,  
    'slides_gutter'                 => 30, 
    'arrow'                         => (bool)$arrows,
    'pagination'                    => (bool)$pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => (bool)$autoplay,
    'pause_on_hover'                => (bool)$pause_on_hover,
    'pause_on_interaction'          => true,
    'delay'                         => (int)$autoplay_speed,
    'loop'                          => (bool)$infinite,
    'speed'                         => (int)$speed,
];

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]); ?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-slider pxl-service-carousel pxl-service-carousel1 <?php echo esc_attr($style_layout); ?>" <?php if($drap !== false): ?>data-cursor-drap="<?php echo esc_attr__('DRAG', 'safebyte'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">

            <?php if($arrows !== false): ?>
                <div class="pxl-swiper-arrow-wrap style-1">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="flaticon-next rtl-icon"></i></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="flaticon-next rtl-icon"></i></div>
                </div>
            <?php endif; ?>

            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                        foreach ($posts as $post):
                        $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
                        $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
                        $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
                        $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                        $index = array_search($post, $posts) + 1;
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>">
                                <div class="pxl-post--header">
                                    <div class="pxl-post--icon">
                                        <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                                            <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                                        <?php endif; ?>
                                        <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                                            $icon_img = pxl_get_image_by_size( array(
                                                'attach_id'  => $service_icon_img['id'],
                                                'thumb_size' => 'full',
                                            ));
                                            $icon_thumbnail = $icon_img['thumbnail'];
                                            ?>
                                            <img src="<?php echo esc_url($icon_thumbnail); ?>" alt="<?php echo esc_attr(get_the_title($post->ID)); ?>">
                                        <?php endif; ?>
                                    </div>

                                    <span class="pxl-post--number">
                                        <?php if($index < 10) : ?>
                                            0<?php echo esc_attr($index); ?>
                                        <?php else: ?>
                                            <?php echo esc_attr($index); ?>
                                        <?php endif; ?>.
                                    </span>
                                </div>
                                <div class="pxl-post--holder">
                                    <h3 class="pxl-post--title">
                                        <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a>
                                    </h3>
                                    <?php if($show_excerpt == 'true') : ?>
                                        <div class="pxl-post--excerpt">
                                            <?php echo esc_attr(wp_trim_words(get_the_excerpt($post->ID), $num_words, '...')); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="pxl-item--divider"></div>
                                    <?php if($show_button == 'true') : ?>
                                        <div class="pxl-post--readmore">
                                            <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                                <?php echo esc_html__(!empty($button_text) ? $button_text : 'Read More', 'safebyte'); ?>
                                                <i class="flaticon-right-arrow-long rtl-reverse"></i>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>    
                    <?php endforeach; ?>
                </div> 
            </div>
            
            <?php if($pagination !== false): ?>
                <div class="pxl-swiper-dots-wrap">
                    <div class="pxl-swiper-dots style-1"></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>