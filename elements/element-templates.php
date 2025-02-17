<?php

if (!function_exists('safebyte_get_post_grid')) {
    function safebyte_get_post_grid($posts = [], $settings = [])
    {
        if (empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)) {
            return false;
        }
        switch ($settings['layout']) {
            case 'post-1':
                safebyte_get_post_grid_layout1($posts, $settings);
                break;

            case 'portfolio-1':
                safebyte_get_portfolio_grid_layout1($posts, $settings);
                break;

            case 'portfolio-2':
                safebyte_get_portfolio_grid_layout2($posts, $settings);
                break;

            case 'service-1':
                safebyte_get_service_grid_layout1($posts, $settings);
                break;


            default:
                return false;
                break;
        }
    }
}

// Start Post Grid
//--------------------------------------------------
function safebyte_get_post_grid_layout1($posts = [], $settings = [])
{
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '600x438';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if (isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if ($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if ($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if (!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if (!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else
                $filter_class = '';
            $current_user = wp_get_current_user();
            $post_video_link = get_post_meta($post->ID, 'post_video_link', true); ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img          = pxl_get_image_by_size(array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size
                        ));
                        $thumbnail    = $img['thumbnail'];
                    ?>
                        <div class="pxl-post--featured hover-imge-effect2">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                            <?php if (!empty($post_video_link)) : ?>
                                <a href="<?php echo esc_url($post_video_link); ?>" class="post-button-video pxl-action-popup"><i class="caseicon-play1"></i></a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <h3 class="pxl-post--title"><a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h3>
                    <div class="pxl-post--meta">
                        <?php if ($show_author == 'true'): ?>
                            <div class="pxl-post--author pxl-mr-10">
                                <i class="flaticon-user text-gradient pxl-mr-7"></i>
                                <?php echo esc_html__('by', 'safebyte'); ?>&nbsp;<?php echo esc_attr($current_user->user_login); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($show_comment) : ?>
                            <div class="pxl-item--comment pxl-mr-10">
                                <i class="flaticon-chat text-gradient pxl-mr-7"></i>
                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>#comments">
                                    <?php echo comments_number(esc_html__('No Comments', 'safebyte'), esc_html__('1 Comment', 'safebyte'), esc_html__('% Comments', 'safebyte')); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if ($show_date == 'true'): ?>
                            <div class="pxl-post--date pxl-mr-10">
                                <i class="flaticon-calendar text-gradient pxl-mr-7"></i>
                                <?php echo get_the_date('d M', $post->ID); ?>/<?php echo get_the_date('y', $post->ID); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if ($show_excerpt == 'true'): ?>
                        <div class="pxl-post--content">
                            <?php echo wp_trim_words($post->post_excerpt, $num_words, $more = null); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($show_button == 'true') : ?>
                        <div class="pxl-post--button">
                            <a class="btn" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                <?php if (!empty($button_text)) {
                                    echo esc_attr($button_text);
                                } else {
                                    echo esc_html__('Read More', 'safebyte');
                                } ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php
        endforeach;
    endif;
}

// End Post Grid
//--------------------------------------------------

// Start Portfolio Grid
//--------------------------------------------------
function safebyte_get_portfolio_grid_layout1($posts = [], $settings = [])
{
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '587x383';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if (isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if ($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if ($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if (!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if (!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                        <?php $img_id = get_post_thumbnail_id($post->ID);
                        $img          = pxl_get_image_by_size(array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size
                        ));
                        $thumbnail    = $img['thumbnail'];
                        ?>
                        <div class="pxl-post--featured hover-imge-effect3">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                            <?php if ($show_button == 'true'): ?>
                                <a class="pxl-post--readmore pxl-fl-middle" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                    <i class="flaticon-right-arrow-2"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="pxl-post--holder">
                            <div class="pxl-post--meta">
                                <?php if ($show_category == 'true'): ?>
                                    <div class="pxl-post--category link-none">
                                        <?php the_terms($post->ID, 'portfolio-category', '', ' '); ?>
                                    </div>
                                <?php endif; ?>
                                <h5 class="pxl-post--title"><?php echo esc_attr(get_the_title($post->ID)); ?></h5>
                            </div>
                            <?php if ($show_button == 'true'): ?>
                                <a class="pxl-post--readmore pxl-fl-middle <?php if ($button_box_gradient == 'style-2') : ?>pxl-gradient-rotate<?php endif; ?>" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                    <i class="flaticon-right-arrow-2"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php endforeach;
    endif;
}

function safebyte_get_portfolio_grid_layout2($posts = [], $settings = [])
{
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '600x600';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if (isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if ($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if ($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if (!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if (!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            $portfolio_excerpt = get_post_meta($post->ID, 'portfolio_excerpt', true);
            if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                        <?php $img_id = get_post_thumbnail_id($post->ID);
                        $img          = pxl_get_image_by_size(array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size
                        ));
                        $thumbnail    = $img['thumbnail'];
                        $gradient_from = safebyte()->get_opt('gradient_color', ['from' => '#6000ff'])['from'];
                        $gradient_to = safebyte()->get_opt('gradient_color', ['to' => '#fe0054'])['to'];
                        ?>
                        <div class="pxl-post--featured hover-imge-effect3">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                        </div>
                        <div class="pxl-post--holder">
                            <svg class="pxl-post--angle" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none">
                                <path stroke="" stroke-width="0" d="M0 100 L100 0 L200 100"></path>
                            </svg>
                            <?php if ($show_category == 'true'): ?>
                                <div class="pxl-post--category link-none">
                                    <?php the_terms($post->ID, 'portfolio-category', '', ' '); ?>
                                </div>
                            <?php endif; ?>
                            <h5 class="pxl-post--title"><?php echo esc_attr(get_the_title($post->ID)); ?></h5>
                            <?php if ($show_excerpt == 'true' && !empty($portfolio_excerpt)): ?>
                                <div class="pxl-post--content">
                                    <?php echo wp_trim_words($portfolio_excerpt, $num_words, $more = null); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($show_button == 'true'): ?>
                                <div class="pxl-post--readmore">
                                    <a class="btn btn-text-parallax btn-icon-box" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                        <span class="pxl--btn-text"><?php if (!empty($button_text)) {
                                                                        echo esc_attr($button_text);
                                                                    } else {
                                                                        echo esc_html__('Read More', 'safebyte');
                                                                    } ?></span>
                                        <span class="pxl--btn-icon"><i class="flaticon-up-right-arrow"></i></span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach;
    endif;
}

// End Portfolio Grid
//--------------------------------------------------

// Start Service Grid
//--------------------------------------------------
function safebyte_get_service_grid_layout1($posts = [], $settings = [])
{
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '600x472';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if (isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if ($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if ($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if (!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if (!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else
                $filter_class = '';

            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true); ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img          = pxl_get_image_by_size(array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size
                        ));
                        $thumbnail    = $img['thumbnail'];
                    ?>
                        <div class="pxl-post--featured">
                            <?php echo wp_kses_post($thumbnail); ?>
                            <?php if ($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                                <div class="pxl-post--icon pxl-fl-middle">
                                    <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                                </div>
                            <?php endif; ?>
                            <?php if ($service_icon_type == 'image' && !empty($service_icon_img)) :
                                $icon_img = pxl_get_image_by_size(array(
                                    'attach_id'  => $service_icon_img['id'],
                                    'thumb_size' => 'full',
                                ));
                                $icon_thumbnail = $icon_img['thumbnail'];
                            ?>
                                <div class="pxl-post--icon pxl-fl-middle">
                                    <?php echo wp_kses_post($icon_thumbnail); ?>
                                </div>
                            <?php endif; ?>
                            <a class="pxl-post--link" href="<?php if (!empty($service_external_link)) {
                                                                echo esc_url($service_external_link);
                                                            } else {
                                                                echo esc_url(get_permalink($post->ID));
                                                            } ?>"></a>
                        </div>
                    <?php endif; ?>
                    <div class="pxl-post--holder">
                        <h3 class="pxl-post--title">
                            <a href="<?php if (!empty($service_external_link)) {
                                            echo esc_url($service_external_link);
                                        } else {
                                            echo esc_url(get_permalink($post->ID));
                                        } ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                        </h3>
                        <?php if ($show_button == 'true') : ?>
                            <div class="pxl-post--readmore">
                                <div class="pxl-post--category"><?php the_terms($post->ID, 'service-category', '', ' '); ?></div>
                                <i class="flaticon-long-arrow-right rtl-reverse"></i>
                                <a class="pxl-post--link" href="<?php if (!empty($service_external_link)) {
                                                                    echo esc_url($service_external_link);
                                                                } else {
                                                                    echo esc_url(get_permalink($post->ID));
                                                                } ?>"></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach;
    endif;
}
// End Service Grid
//-------------------------------------------------

// Start Product Grid
//--------------------------------------------------
// End Product Grid
//--------------------------------------------------

add_action('wp_ajax_safebyte_load_more_post_grid', 'safebyte_load_more_post_grid');
add_action('wp_ajax_nopriv_safebyte_load_more_post_grid', 'safebyte_load_more_post_grid');
function safebyte_load_more_post_grid()
{
    if (! check_ajax_referer('_ajax_nonce', 'wpnonce') || empty(sanitize_text_field(wp_unslash($_POST['wpnonce'])))) {
        wp_send_json(
            array(
                'status' => false,
                'message' => esc_attr__('Nonce error, please reload.', 'safebyte'),
                'data' => array(),
            )
        );
    }

    try {
        if (!isset($_POST['settings'])) {
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'safebyte'));
        }

        $settings = isset($_POST['settings']) ? $_POST['settings'] : null;

        $source = isset($settings['source']) ? $settings['source'] : '';
        $term_slug = isset($settings['term_slug']) ? $settings['term_slug'] : '';
        if (!empty($term_slug) && $term_slug != '*') {
            $term_slug = str_replace('.', '', $term_slug);
            $source = [$term_slug . '|' . $settings['tax'][0]];
        }
        if (isset($_POST['handler_click']) && sanitize_text_field(wp_unslash($_POST['handler_click'])) == 'filter') {
            set_query_var('paged', 1);
            $settings['paged'] = 1;
        } else {
            set_query_var('paged', $settings['paged']);
        }
        extract(pxl_get_posts_of_grid(
            $settings['post_type'],
            [
                'source' => $source,
                'orderby' => isset($settings['orderby']) ? $settings['orderby'] : 'date',
                'order' => isset($settings['order']) ? $settings['order'] : 'desc',
                'limit' => isset($settings['limit']) ? $settings['limit'] : '6',
                'post_ids' => isset($settings['post_ids']) ? $settings['post_ids'] : [],
                'post_not_in' => isset($settings['post_not_in']) ? $settings['post_not_in'] : [],
            ],
            $settings['tax']
        ));

        ob_start();
        safebyte_get_post_grid($posts, $settings);
        $html = ob_get_clean();

        $pagin_html = '';
        if (isset($settings['pagination_type']) && $settings['pagination_type'] == 'pagination') {
            ob_start();
            safebyte()->page->get_pagination($query,  true);
            $pagin_html = ob_get_clean();
        }
        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'safebyte'),
                'data' => array(
                    'html' => $html,
                    'pagin_html' => $pagin_html,
                    'paged' => $settings['paged'],
                    'posts' => $posts,
                    'max' => $max,
                ),
            )
        );
    } catch (Exception $e) {
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}

function safebyte_get_post_list($posts = [], $settings = [])
{
    if (empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)) {
        return;
    }
    extract($settings);

    switch ($settings['layout']) {
        case 'post-1':
            safebyte_get_post_list_layout1($posts, $settings);
            break;

        default:
            return false;
            break;
    }
}
function safebyte_get_post_list_layout1($posts = [], $settings = [])
{
    extract($settings);
    foreach ($posts as $key => $post):

        if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) {
            $img_id = get_post_thumbnail_id($post->ID);
            if ($img_id) {
                $img = pxl_get_image_by_size(array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $img_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $img_size);
            }
        } else {
            $thumbnail = '';
        }

        $author = get_user_by('id', $post->post_author);
        $readmore_text = !empty($readmore_text) ? $readmore_text : esc_html__('Continue Reading', 'safebyte');
        $date_format = get_option('date_format');

        $data_settings = '';
        $animate_cls = '';
        if (!empty($item_animation)) {
            $animate_cls = ' pxl-animate pxl-invisible animated-' . $item_animation_duration;
            $data_animation =  json_encode([
                'animation'      => $item_animation,
                'animation_delay' => (float)$item_animation_delay
            ]);
            $data_settings = 'data-settings="' . esc_attr($data_animation) . '"';
        }


        $flag = false;
        $post_format = get_post_format($post->ID) == false ? 'format-standard' : 'format-' . get_post_format($post->ID);
        ?>
        <div class="<?php echo esc_attr('list-item w-100 ' . $post_format); ?> <?php echo esc_attr($animate_cls) ?>" <?php pxl_print_html($data_settings); ?>>
            <div class="grid-item-inner item-inner-wrap row  <?php echo esc_attr($post_format) ?>">
                <?php
                if (has_post_format('quote', $post->ID)) {
                    $quote_text = get_post_meta($post->ID, 'featured-quote-text', true);
                    $quote_cite = get_post_meta($post->ID, 'featured-quote-cite', true);
                ?>
                    <div class="col-12">
                        <div class="quote-wrap">
                            <div class="pxl-hl-image"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/fm-qt.png'); ?>" /></div>
                            <div class="quote-inner-wrap">

                                <div class="link-inner ">
                                    <div class="link-icon">
                                        <span>“</span>
                                    </div>
                                    <div class="content-right">
                                        <div class="item-post-metas ">
                                            <div class="meta-inner  align-items-center">
                                                <?php if ($show_date == 'true') : ?>
                                                    <span class="post-date">
                                                        <?php echo get_the_date('d M', $post->ID); ?>
                                                    </span>
                                                <?php endif; ?>
                                                <?php if ($show_category == 'true') : ?>
                                                    <span class="meta-item post-category  d-flex">
                                                        <?php the_terms($post->ID, 'category', '', ', ', ''); ?>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <a class="quote-text" href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo esc_html($quote_text); ?></a>
                                    </div>
                                </div>
                                <div class="quote-footer ">
                                    <div class="quote-cite "><?php echo esc_html($quote_cite); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                } elseif (has_post_format('link', $post->ID)) {
                    $link_url = get_post_meta($post->ID, 'featured-link-url', true);
                    $link_text = get_post_meta($post->ID, 'featured-link-text', true);
                ?>
                    <div class="col-12">
                        <div class="link-wrap">
                            <div class="pxl-hl-image"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/fm-qt.png'); ?>" /></div>
                            <div class="link-inner-wrap">
                                <div class="link-inner ">
                                    <div class="link-icon">
                                        <a href="<?php echo esc_url($link_url); ?>">
                                            <svg version="1.1" id="Glyph" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                                <path d="M192.5,240.5c20.7-21,56-23,79,0h0.2c6.4,6.4,11,14.2,13.8,22.6c6.7-1.1,12.6-4,17.1-8.5l22.1-21.9
                                        c-5-9.6-11.4-18.4-19-26.2c-42-41.1-106.9-40-147.2,0l-80,80c-40.6,40.9-40.6,106.3,0,147.2c40.9,40.6,106.3,40.6,147.2,0l75.4-75.4
                                        c-22,3.6-43.1,1.6-62.7-5.3l-46.7,46.6c-21.1,21.3-57.9,21.3-79.2,0c-21.8-21.8-21.8-57.3,0-79C113.9,318.9,197.8,235.1,192.5,240.5
                                        L192.5,240.5z" />
                                                <path d="M319.5,271.5c-21,21.3-56.3,22.7-79,0c-0.2,0-0.2,0-0.2,0c-6.4-6.4-11-14.2-13.8-22.6c-6.7,1.1-12.6,4-17.1,8.5l-22.1,21.9
                                        c5,9.6,11.4,18.4,19,26.2c42,41.1,106.9,40,147.2,0l80-80c40.6-40.9,40.6-106.3,0-147.2c-40.9-40.6-106.3-40.6-147.2,0L211,153.8
                                        c22-3.6,43.1-1.6,62.7,5.3l46.7-46.6c21.1-21.3,57.9-21.3,79.2,0c21.8,21.8,21.8,57.3,0,79C398.1,193.1,314.2,276.9,319.5,271.5
                                        L319.5,271.5z" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="content-right">
                                        <div class="item-post-metas ">
                                            <div class="meta-inner  align-items-center">
                                                <?php if ($show_date == 'true') : ?>
                                                    <span class="post-date">
                                                        <?php echo get_the_date('d M', $post->ID); ?>
                                                    </span>
                                                <?php endif; ?>
                                                <?php if ($show_category == 'true') : ?>
                                                    <span class="meta-item post-category  d-flex">
                                                        <?php the_terms($post->ID, 'category', '', ', ', ''); ?>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <h3 class="link-title"><a href="<?php echo esc_url($link_url); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_the_title($post->ID); ?></a></h3>
                                    </div>
                                </div>
                                <div class="link-footer">
                                    <a class="link-text" target="_blank" href="<?php echo esc_url($link_url); ?>"><?php echo esc_html($link_text); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    if (!empty($thumbnail)) {
                        $flag = true;
                        $featured_video = get_post_meta($post->ID, 'featured-video-url', true);
                        $audio_url = get_post_meta($post->ID, 'featured-audio-url', true);
                    ?>
                        <div class="item-featured col-lg-5">
                            <div class="post-image hover-imge-effect2">
                                <?php echo wp_kses_post($thumbnail); ?>
                                <?php if (has_post_format('audio', $post->ID)) {
                                    $audio = get_post_meta($post->ID, 'featured-audio-url', true);
                                ?>
                                    <a class="btn-volumn" href="<?php echo esc_url($audio); ?>" target="_blank"><i class="fas fa-volume"></i></a>
                                <?php } ?>

                                <?php if (has_post_format('video', $post->ID)) {
                                    $video = get_post_meta($post->ID, 'featured-video-url', true);
                                ?>
                                    <a class="video-play-button pxl-action-popup" href="<?php echo esc_url($video); ?>">
                                        <i class="caseicon-play1"></i>
                                    </a>

                                <?php } ?>
                                <?php
                                if ($show_date == 'true') : ?>
                                    <div class="pxl-item--date">
                                        <span class="pxl-item--date-day"><?php echo get_the_date('d', $post->ID); ?></span>
                                        <span class="pxl-item--date-month"><?php echo get_the_date('M', $post->ID); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php
                    } else {
                        if (has_post_format('video', $post->ID)) {
                            $flag = true;
                            global $wp_embed;
                            $featured_video = get_post_meta($post->ID, 'featured-video-url', true);
                            if (!empty($featured_video)) {
                                echo '<div class="item-featured col-lg-5">';
                                echo '<div class="feature-video">';
                                echo do_shortcode($wp_embed->autoembed($featured_video));
                                echo '</div>';
                                echo '</div>';
                            }
                        } elseif (has_post_format('audio', $post->ID)) {

                            $flag = true;
                            global $wp_embed;
                            $audio_url = get_post_meta($post->ID, 'featured-audio-url', true);
                            if (!empty($audio_url)) {
                                echo '<div class="item-featured col-lg-5">';
                                echo '<div class="feature-audio">';
                                echo do_shortcode($wp_embed->autoembed($audio_url));
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                    }
                    ?>
                    <?php $col_cls = ($flag = true) ? 'col-lg-7' : 'col'; ?>
                    <div class="wrap-item-content <?php echo esc_attr($col_cls) ?>">
                        <div class="item-content">
                            <?php
                            if ($show_author == 'true' || $show_category == 'true' || $show_comment == 'true') {
                            ?>
                                <div class="pxl-item--meta pxl-blog-meta">
                                    <div class="pxl-blog-meta-inner">
                                        <?php if ($show_author == 'true') : ?>
                                            <div class="pxl-item--author">
                                                <span class="icon-post pxl-mr-8"><i class="fas fa-user"></i></span>
                                                <?php echo esc_html__('By', 'safebyte'); ?>&nbsp;<?php the_author_posts_link(); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($show_category == 'true') : ?>
                                            </span>
                                            <div class="pxl-item--category">
                                                <span class="icon-post pxl-mr-8"><i class="fas fa-tag"></i></span>
                                                <?php the_terms($post->ID, 'category', '', ', ', ''); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($show_comment == 'true') : ?>
                                            <div class="pxl-item--comment">
                                                <span class="icon-post pxl-mr-8"><i class="fas fa-comment"></i></span>
                                                <a href="<?php the_permalink(); ?>#comments">
                                                    <?php echo comments_number(esc_html__('No Comments', 'safebyte'), esc_html__('1 Comment', 'safebyte'), esc_html__('% Comments', 'safebyte')); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <h3 class="pxl-item--title"><a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h3>
                            <?php if ($show_excerpt == 'true'): ?>
                                <div class="item-excerpt">
                                    <?php
                                    if (!empty($post->post_excerpt)) {
                                        echo wp_trim_words($post->post_excerpt, $num_words, null);
                                    } else {
                                        $content = strip_shortcodes($post->post_content);
                                        $content = apply_filters('the_content', $content);
                                        $content = str_replace(']]>', ']]&gt;', $content);
                                        echo wp_trim_words($content, $num_words, null);
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>
                            <?php
                            if ($show_readmore == 'true' || $post_share == 'true') : ?>
                                <div class="blog-post-footer">
                                    <?php if ($show_readmore == 'true'): ?>
                                        <div class="post-readmore ">
                                            <a class="btn btn-glossy" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                                <span class="pxl-button-text"><?php echo safebyte_html($readmore_text); ?></span>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <?php
                                    if (($settings['post_share'] == 'true')):
                                    ?>
                                        <div class="post-shares">
                                            <span class="label">
                                                <i class="fas fa-share-alt"></i>
                                                <?php echo esc_html__('Share:', 'safebyte') ?>
                                            </span>
                                            <div class="social-share">
                                                <div class="social ">
                                                    <a class="pxl-icon icon-facebook fab fa-facebook" title="<?php echo esc_attr__('Facebook', 'safebyte'); ?>" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink($post->ID)); ?>"></a>
                                                    <a class="pxl-icon icon-twitter fab fa-twitter" title="<?php echo esc_attr__('Twitter', 'safebyte'); ?>" target="_blank" href="https://twitter.com/intent/tweet?original_referer=<?php echo urldecode(home_url('/')); ?>&url=<?php echo urlencode(get_permalink($post->ID)); ?>&text=<?php echo get_the_title($post->ID); ?>%20"></a>
                                                    <a class="pxl-icon icon-skype fab fa-skype" title="<?php echo esc_attr__('Skype', 'safebyte'); ?>" target="_blank" href="https://web.skype.com/share?url=<?php echo urlencode(get_permalink($post->ID)); ?>&text=<?php echo get_the_title($post->ID); ?>%20"></a>
                                                    <a href="https://t.me/share/url?url=<?php echo urlencode(get_permalink($post->ID)); ?>" class="telegram-share pxl-icon fab fa-telegram" title="<?php echo esc_attr__('Telegram', 'safebyte'); ?>" target="_blank" data-href="https://t.me/share/url?url=<?php echo urlencode(get_permalink($post->ID)); ?>" data-lang="en-US" data-text="<?php echo get_the_title($post->ID); ?>"></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
<?php
    endforeach;
}
