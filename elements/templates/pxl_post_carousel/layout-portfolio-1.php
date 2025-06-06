<?php
extract($settings);
$html_id = pxl_get_element_id($settings);
$tax = ['portfolio-category'];
$select_post_by = $widget->get_setting('select_post_by', '');
$source = $post_ids = [];
if ($select_post_by === 'post_selected') {
    $post_ids = $widget->get_setting('source_' . $settings['post_type'] . '_post_ids', '');
} else {
    $source  = $widget->get_setting('source_' . $settings['post_type'], '');
}
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$settings['layout']    = $settings['layout_' . $settings['post_type']];
extract(pxl_get_posts_of_grid('portfolio', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
    'tax' => $tax,
]));

$pxl_animate = $widget->get_setting('pxl_animate', '');
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = (int)$widget->get_setting('col_md', '');
if ($col_md == 'custom') {
    $col_md = $widget->get_setting('col_md_custom', '');
}
$col_lg = (int)$widget->get_setting('col_lg', '');
if ($col_lg == 'custom') {
    $col_lg = $widget->get_setting('col_lg_custom', '');
}
$col_xl = (int)$widget->get_setting('col_xl', '');
if ($col_xl == 'custom') {
    $col_xl = $widget->get_setting('col_xl_custom', '');
}
$col_xxl = (int)$widget->get_setting('col_xxl', '');
if ($col_xxl == 'custom') {
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
$drap = $widget->get_setting('drap', false);

$img_size = $widget->get_setting('img_size');
$show_category = $widget->get_setting('show_category');
$show_button = $widget->get_setting('show_button');
$show_excerpt = $widget->get_setting('show_excerpt');
$num_words = $widget->get_setting('num_words', 10);
$show_filter = $widget->get_setting('show_filter');
$ft_default_title = $widget->get_setting('ft_default_title');

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

$widget->add_render_attribute('carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]); ?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-slider pxl-portfolio-carousel pxl-portfolio-carousel1 pxl-portfolio-style-1" <?php if ($drap !== false): ?>data-cursor-drap="<?php echo esc_attr__('DRAG', 'safebyte'); ?>" <?php endif; ?>>
        <div class="pxl-inner-top">
            <div class="container">
                <?php if ($show_filter == 'true') { ?>
                    <div class="swiper-filter">
                        <div class="pxl-grid-filter normal style-2">
                            <div class="pxl--filter-inner">
                                <?php if (!empty($ft_default_title)): ?>
                                    <span class="filter-item active" data-filter-target="all">
                                        <span class="cat-name"><?php echo esc_html($ft_default_title); ?></span>
                                        <span class="cat-count">
                                            <?php echo esc_html(count($posts)); ?>
                                        </span>
                                    </span>
                                <?php endif; ?>
                                <?php foreach ($categories as $category):
                                    $category_arr = explode('|', $category);
                                    $term = get_term_by('slug', $category_arr[0], $category_arr[1]);
                                    $count = 0;
                                    foreach ($posts as $post):
                                        if (has_term($term->slug, $term->taxonomy, $post->ID)) {
                                            $count++;
                                        }
                                    endforeach;
                                ?>
                                    <span class="filter-item" data-filter-target="<?php echo esc_attr($term->slug); ?>">
                                        <span class="cat-name"><?php echo esc_html($term->name); ?></span>
                                        <span class="cat-count">
                                            <?php echo esc_html($count); ?>
                                        </span>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php  } ?>
            </div>
        </div>

        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string('carousel')); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                    $image_size = !empty($img_size) ? $img_size : '420x520';
                    foreach ($posts as $post): 
                        $filter_class = '';
                        if ($select_post_by === 'term_selected') {
                            $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
                        }
                    ?>
                        <div class="pxl-swiper-slide wow fadeInRight" data-filter="<?php echo esc_attr($filter_class); ?>">
                            <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>">
                                <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                                    $img_id = get_post_thumbnail_id($post->ID);
                                    $img          = pxl_get_image_by_size(array(
                                        'attach_id'  => $img_id,
                                        'thumb_size' => $image_size
                                    ));
                                    $thumbnail    = $img['thumbnail'];
                                    $portfolio_excerpt = get_post_meta($post->ID, 'portfolio_excerpt', true);
                                ?>
                                    <div class="pxl-post--featured">
                                        <?php echo wp_kses_post($thumbnail); ?>

                                        <div class="pxl-post--holder">
                                            <div class="pxl-post--meta">
                                                <?php if ($show_category == 'true'): ?>
                                                    <div class="pxl-post--category link-none">
                                                        <?php the_terms($post->ID, 'portfolio-category', '', ', '); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <h3 class="pxl-post--title"><?php echo esc_html(get_the_title($post->ID)); ?></h3>
                                            </div>
                                            <?php if ($show_excerpt == 'true' && !empty($portfolio_excerpt)) : ?>
                                                <div class="pxl-post--content">
                                                    <?php echo wp_trim_words($portfolio_excerpt, $num_words, $more = null); ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($show_button == 'true'): ?>
                                                <a class="pxl-post--readmore pxl-fl-middle" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                                    <span>
                                                        <?php if (!empty($button_text)) {
                                                            echo esc_attr($button_text);
                                                        } else {
                                                            echo esc_html__('Read More', 'safebyte');
                                                        } ?>
                                                    </span>
                                                    <i class="flaticon-next"></i>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php if ($pagination !== false): ?>
                <div class="pxl-swiper-dots-wrap">
                    <div class="pxl-swiper-dots style-1"></div>
                </div>
            <?php endif; ?>

            <?php if ($arrows !== false): ?>
                <div class="pxl-swiper-arrow-wrap style-1">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="caseicon-angle-arrow-left rtl-icon"></i></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="caseicon-angle-arrow-right rtl-icon"></i></div>
                </div>
            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>