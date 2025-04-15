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

            case 'portfolio-3':
                safebyte_get_portfolio_grid_layout3($posts, $settings);
                break;

            case 'service-1':
                safebyte_get_service_grid_layout1($posts, $settings);
                break;

            case 'industries-1':
                safebyte_get_industries_grid_layout1($posts, $settings);
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

    $images_size = !empty($img_size) ? $img_size : '375x168';

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
?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-inner-content <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
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
                                        <?php if (!empty($button_text)) {
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
                                'thumb_size' => $images_size
                            ));
                            $thumbnail    = $img['thumbnail']; ?>
                            <div class="item--featured hover-imge-effect2">
                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
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

    $images_size = !empty($img_size) ? $img_size : '410x520';

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
                        $portfolio_excerpt = get_post_meta($post->ID, 'portfolio_excerpt', true);
                        ?>
                        <div class="pxl-post--featured">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                            <div class="pxl-post--holder">
                                <div class="pxl-post--meta">
                                    <?php if ($show_category == 'true'): ?>
                                        <div class="pxl-post--category link-none">
                                            <?php the_terms($post->ID, 'portfolio-category', '', ', '); ?>
                                        </div>
                                    <?php endif; ?>
                                    <h5 class="pxl-post--title"><?php echo esc_html(get_the_title($post->ID)); ?></h5>
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
                    </div>
                </div>
            <?php endif; ?>
            <?php endforeach;
    endif;
}

function safebyte_get_portfolio_grid_layout2($posts = [], $settings = [])
{
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '638x368';

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
                        ?>
                        <div class="pxl-post--featured hover-imge-effect3">
                            <?php echo wp_kses_post($thumbnail); ?>
                            <?php if ($show_category == 'true'): ?>
                                <div class="pxl-post--category link-none">
                                    <?php the_terms($post->ID, 'portfolio-category', '', ' '); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="pxl-post--holder">
                            <h5 class="pxl-post--title">
                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a>
                            </h5>
                            <div class="pxl-post-divider"></div>
                            <?php if ($show_excerpt == 'true' && !empty($portfolio_excerpt)): ?>
                                <div class="pxl-post--content">
                                    <?php echo wp_trim_words($portfolio_excerpt, $num_words, $more = null); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($show_button == 'true'): ?>
                                <div class="pxl-post--readmore">
                                    <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                        <?php if (!empty($button_text)) {
                                            echo esc_attr($button_text);
                                        } else {
                                            echo esc_html__('Read More', 'safebyte');
                                        } ?>
                                        <i class="flaticon-right-arrow-long"></i>
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

function safebyte_get_portfolio_grid_layout3($posts = [], $settings = [])
{
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '378x272';

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
                        ?>
                        <div class="pxl-post--holder">
                            <?php if ($show_category == 'true'): ?>
                                <div class="pxl-post--category link-none">
                                    <?php the_terms($post->ID, 'portfolio-category', '', '-'); ?>
                                </div>
                            <?php endif; ?>
                            <h5 class="pxl-post--title">
                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a>
                            </h5>
                            <div class="pxl-post-divider"></div>
                            <?php if ($show_excerpt == 'true' && !empty($portfolio_excerpt)): ?>
                                <div class="pxl-post--content">
                                    <?php echo wp_trim_words($portfolio_excerpt, $num_words, $more = null); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="pxl-post--featured hover-imge-effect3">
                            <?php echo wp_kses_post($thumbnail); ?>
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
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
            $index = $key + 1; ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <div class="pxl-post--header">
                        <div class="pxl-post--icon">
                            <?php if ($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                                <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                            <?php endif; ?>
                            <?php if ($service_icon_type == 'image' && !empty($service_icon_img)) :
                                $icon_img = pxl_get_image_by_size(array(
                                    'attach_id'  => $service_icon_img['id'],
                                    'thumb_size' => 'full',
                                ));
                                $icon_thumbnail = $icon_img['thumbnail'];
                            ?>
                                <img src="<?php echo esc_url($icon_thumbnail); ?>" alt="<?php echo esc_attr(get_the_title($post->ID)); ?>">
                            <?php endif; ?>
                        </div>

                        <span class="pxl-post--number">
                            <?php if ($index < 10) : ?>
                                0<?php echo esc_attr($index); ?>
                            <?php else: ?>
                                <?php echo esc_attr($index); ?>
                                <?php endif; ?>.
                        </span>
                    </div>
                    <div class="pxl-post--holder">
                        <h3 class="pxl-post--title">
                            <a href="<?php if (!empty($service_external_link)) {
                                            echo esc_url($service_external_link);
                                        } else {
                                            echo esc_url(get_permalink($post->ID));
                                        } ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a>
                        </h3>
                        <?php if ($show_excerpt == 'true') : ?>
                            <div class="pxl-post--excerpt">
                                <?php echo esc_attr(wp_trim_words(get_the_excerpt($post->ID), $num_words, '...')); ?>
                            </div>
                        <?php endif; ?>
                        <div class="pxl-item--divider"></div>
                        <?php if ($show_button == 'true') : ?>
                            <div class="pxl-post--readmore">
                                <a href="<?php if (!empty($service_external_link)) {
                                                echo esc_url($service_external_link);
                                            } else {
                                                echo esc_url(get_permalink($post->ID));
                                            } ?>">
                                    <?php echo esc_html__(!empty($button_text) ? $button_text : 'Read More', 'safebyte'); ?>
                                    <i class="flaticon-right-arrow-long rtl-reverse"></i>
                                </a>
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

// Start Industries Grid
//--------------------------------------------------
function safebyte_get_industries_grid_layout1($posts = [], $settings = [])
{
    extract($settings);
    $images_size = !empty($img_size) ? $img_size : 'full';
    if (is_array($posts)):
        $count_pos = 1;
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
            $industries_excerpt = get_post_meta($post->ID, 'industries_excerpt', true);
            $industries_external_link = get_post_meta($post->ID, 'industries_external_link', true);
            $industries_icon_type = get_post_meta($post->ID, 'industries_icon_type', true);
            $industries_icon_font = get_post_meta($post->ID, 'industries_icon_font', true);
            $industries_icon_img = get_post_meta($post->ID, 'industries_icon_img', true);
            if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                if ($img_id) {
                    $img = pxl_get_image_by_size(array(
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size,
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                } else {
                    $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
                }
            endif; ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <div class="content-top">
                        <?php if ($industries_icon_type == 'icon' && !empty($industries_icon_font)) : ?>
                            <div class="pxl-post--icon">
                                <i class="<?php echo esc_attr($industries_icon_font); ?>"></i>
                            </div>
                        <?php endif; ?>
                        <?php if ($industries_icon_type == 'image' && !empty($industries_icon_img)) :
                            $icon_img = pxl_get_image_by_size(array(
                                'attach_id'  => $industries_icon_img['id'],
                                'thumb_size' => 'full',
                            ));
                            $icon_thumbnail = $icon_img['thumbnail'];
                        ?>
                            <div class="pxl-post--icon">
                                <?php echo wp_kses_post($icon_thumbnail); ?>
                            </div>
                        <?php endif; ?>
                        <div class="pxl-post--featured hover-imge-effect3">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>
                        </div>
                    </div>
                    <div class="pxl-holder-content">
                        <h3 class="pxl-post--title">
                            <a href="<?php if (!empty($industries_external_link)) {
                                            echo esc_url($industries_external_link);
                                        } else {
                                            echo esc_url(get_permalink($post->ID));
                                        } ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a>
                        </h3>

                        <?php if ($show_excerpt == 'true'): ?>
                            <div class="pxl-post--content">
                                <?php if ($show_excerpt == 'true'): ?>
                                    <?php echo wp_trim_words($post->post_excerpt, $num_words, null); ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach;
    endif;
}
// End Industries Grid
//--------------------------------------------------


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

// End Load More Post Grid
//--------------------------------------------------

// Start Post List
//--------------------------------------------------

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

        $post_format = get_post_format($post->ID) == false ? 'format-standard' : 'format-' . get_post_format($post->ID);
        ?>
        <div class="<?php echo esc_attr('list-item w-100 ' . $post_format); ?> <?php echo esc_attr($animate_cls) ?>" <?php pxl_print_html($data_settings); ?>>
            <div class="grid-item-inner item-inner-wrap row <?php echo esc_attr($post_format) ?>">
                <?php if (!empty($thumbnail)) : ?>
                    <div class="item-featured col-lg-5">
                        <div class="post-image hover-imge-effect2">
                            <?php echo wp_kses_post($thumbnail); ?>
                            <?php if ($show_date == 'true') : ?>
                                <div class="pxl-item--date">
                                    <span class="pxl-item--date-day"><?php echo get_the_date('d', $post->ID); ?></span>
                                    <span class="pxl-item--date-month"><?php echo get_the_date('M', $post->ID); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="wrap-item-content <?php echo !empty($thumbnail) ? 'col-lg-7' : 'col'; ?>">
                    <div class="item-content">
                        <?php if ($show_author == 'true' || $show_category == 'true' || $show_comment == 'true') : ?>
                            <div class="pxl-item--meta pxl-blog-meta">
                                <div class="pxl-blog-meta-inner">
                                    <?php if ($show_author == 'true') : ?>
                                        <div class="pxl-item--author">
                                            <span class="icon-post pxl-mr-8"><i class="fas fa-user"></i></span>
                                            <?php echo esc_html__('By', 'safebyte'); ?>&nbsp;
                                            <a href="<?php echo esc_url(get_author_posts_url($post->post_author)); ?>">
                                                <?php echo esc_html(get_the_author_meta('display_name', $post->post_author)); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($show_category == 'true') : ?>
                                        <div class="pxl-item--category">
                                            <span class="icon-post pxl-mr-8"><i class="fas fa-tag"></i></span>
                                            <?php 
                                            $categories = get_the_terms($post->ID, 'category');
                                            if (!empty($categories) && !is_wp_error($categories)) {
                                                $category_links = array();
                                                foreach ($categories as $category) {
                                                    $category_links[] = '<a href="' . esc_url(get_term_link($category)) . '">' . esc_html($category->name) . '</a>';
                                                }
                                                echo implode(', ', $category_links);
                                            }
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($show_comment == 'true') : ?>
                                        <div class="pxl-item--comment">
                                            <span class="icon-post pxl-mr-8"><i class="fas fa-comment"></i></span>
                                            <a href="<?php echo esc_url(get_permalink($post->ID) . '#comments'); ?>">
                                                <?php 
                                                $comments_count = get_comments_number($post->ID);
                                                if ($comments_count == 0) {
                                                    echo esc_html__('No Comments', 'safebyte');
                                                } elseif ($comments_count == 1) {
                                                    echo esc_html__('1 Comment', 'safebyte');
                                                } else {
                                                    printf(esc_html__('%d Comments', 'safebyte'), $comments_count);
                                                }
                                                ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <h3 class="pxl-item--title"><a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a></h3>

                        <?php if ($show_excerpt == 'true') : ?>
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

                        <?php if ($show_readmore == 'true' || $post_share == 'true') : ?>
                            <div class="blog-post-footer">
                                <?php if ($show_readmore == 'true') : ?>
                                    <div class="post-readmore">
                                        <a class="btn btn-glossy" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                            <span class="pxl-button-text"><?php echo safebyte_html($readmore_text); ?></span>
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <?php if ($settings['post_share'] == 'true') : ?>
                                    <div class="post-shares">
                                        <span class="label">
                                            <i class="fas fa-share-alt"></i>
                                            <?php echo esc_html__('Share:', 'safebyte') ?>
                                        </span>
                                        <div class="social-share">
                                            <div class="social">
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
            </div>
        </div>
<?php endforeach;
}

// End Post List
//--------------------------------------------------

add_action('wp_ajax_safebyte_load_more_post_list', 'safebyte_load_more_post_list');
add_action('wp_ajax_nopriv_safebyte_load_more_post_list', 'safebyte_load_more_post_list');
function safebyte_load_more_post_list()
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
        safebyte_get_post_list($posts, $settings);
        $html = ob_get_clean();

        $pagin_html = '';
        if (isset($settings['pagination_type']) && $settings['pagination_type'] == 'pagination') {
            ob_start();
            safebyte()->page->get_pagination($query,  true);
            $pagin_html = ob_get_clean();
        }

        $result_count = '';
        if (isset($settings['show_toolbar']) && $settings['show_toolbar'] == 'show') {
            $limitpage = ($settings['limit'] >= $total) ? $total : $settings['limit'];
            $result_count = sprintf(
                '<span class="result-count">%1$s %2$s %3$s %4$s %5$s</span>',
                esc_html__('Showing','safebyte'),
                '1-'.$limitpage,
                esc_html__('of','safebyte'),
                $total,
                esc_html__('results','safebyte')
            );
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
                    'result_count' => $result_count
                ),
            )
        );
    } catch (Exception $e) {
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}

