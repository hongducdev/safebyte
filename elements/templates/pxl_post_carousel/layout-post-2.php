<?php

$html_id = pxl_get_element_id($settings);
$source    = $widget->get_setting('source_' . $settings['post_type']);
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$post_ids = $widget->get_setting('post_ids', '');
$settings['layout']    = $settings['layout_' . $settings['post_type']];
extract(pxl_get_posts_of_grid('post', [
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
$pagination_type = $widget->get_setting('pagination_type', 'bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover', false);
$autoplay = $widget->get_setting('autoplay', false);
$autoplay_speed = $widget->get_setting('autoplay_speed', 5000);
$infinite = $widget->get_setting('infinite', false);
$speed = $widget->get_setting('speed', 500);

$img_size = $widget->get_setting('img_size');
$show_author = $widget->get_setting('show_author');
$show_date = $widget->get_setting('show_date');
$show_category = $widget->get_setting('show_category');
$show_button = $widget->get_setting('show_button');
$button_text = $widget->get_setting('button_text');
$show_excerpt = $widget->get_setting('show_excerpt');
$num_words = $widget->get_setting('num_words');

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_mode'                    => 'slide',
    'slide_percolumn'               => 3,
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

$widget->add_render_attribute('carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]); ?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-slider pxl-post-carousel pxl-post-carousel2" <?php if ($settings['drap'] !== false) : ?>data-cursor-drap="<?php echo esc_attr__('DRAG', 'safebyte'); ?>" <?php endif; ?>>
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string('carousel')); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                    $image_size = !empty($img_size) ? $img_size : '375x168';
                    foreach ($posts as $key => $post):
                        $img_id       = get_post_thumbnail_id($post->ID);
                        $author = get_user_by('id', $post->post_author);
                        $author_avatar = get_avatar($post->post_author, 60, '', $author->display_name, array('class' => '')); ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>">
                                <div class="pxl-item-col-1">
                                    <h3 class="pxl-item--title"><a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a></h3>
                                    <span class="pxl-item-date"><?php echo get_the_date('d M Y', $post->ID); ?></span>
                                    <div class="pxl-item-meta">
                                        <?php if ($show_author == 'true') : ?>
                                            <span class="pxl-item-author">
                                                <?php echo esc_html__('By', 'safebyte'); ?>&nbsp;<?php the_author_posts_link(); ?>
                                            </span>
                                        <?php endif; ?>
                                        <span>/</span>
                                        <?php if ($show_category == 'true') : ?>
                                            <span class="pxl-item-category">
                                                <?php the_terms($post->ID, 'category', '', ', ', ''); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="pxl-item-col-2">
                                    <div class="pxl-item-excerpt">
                                        <?php if (!empty($post->post_excerpt)) {
                                            echo wp_trim_words($post->post_excerpt, $num_words, null);
                                        } else {
                                            $content = strip_shortcodes($post->post_content);
                                            $content = apply_filters('the_content', $content);
                                            $content = str_replace(']]>', ']]&gt;', $content);
                                            echo wp_trim_words($content, $num_words, null);
                                        }
                                        ?>
                                    </div>
                                    <?php if ($show_button == 'true'): ?>
                                        <div class="post-readmore ">
                                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                                <span class="pxl-button-text">
                                                    <?php if(!empty($button_text)) {
                                                        echo esc_attr($button_text);
                                                    } else {
                                                        echo esc_html__('Continue Reading', 'safebyte');
                                                    } ?>
                                                </span>
                                                <i class="flaticon flaticon-right-arrow-long"></i>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="pxl-item-col-3">
                                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                                        $img_id = get_post_thumbnail_id($post->ID);
                                        $img          = pxl_get_image_by_size(array(
                                            'attach_id'  => $img_id,
                                            'thumb_size' => $image_size
                                        ));
                                        $thumbnail    = $img['thumbnail']; ?>
                                        <div class="item--featured hover-imge-effect2">
                                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="pxl-post--footer">
                <?php if ($pagination !== false): ?>
                    <div class="pxl-swiper-dots-wrap">
                        <div class="pxl-swiper-dots style-2"></div>
                    </div>
                <?php endif; ?>
                <div class="pxl-post--viewall">
                    <a class="btn view-all-btn" href="<?php echo esc_url(get_post_type_archive_link('post'));?>">
                        <?php echo esc_html__('View All Blog Posts', 'safebyte'); ?>
                    </a>
                </div>
            </div>

            <?php if ($arrows !== false): ?>
                <div class="pxl-swiper-arrow-wrap style-1">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="caseicon-angle-arrow-left rtl-icon"></i></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="caseicon-angle-arrow-right rtl-icon"></i></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>