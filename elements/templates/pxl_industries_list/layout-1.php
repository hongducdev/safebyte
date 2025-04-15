<?php
$args = array(
    'post_type' => 'industries',
    'posts_per_page' => $settings['limit'],
    'order' => $settings['order'],
);
$query = new WP_Query($args);
$posts = $query->posts;
$index = 0;
?>

<div class="pxl-industries-list">
    <?php foreach ($posts as $key => $post): 
        $index++;
        ?>
        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-industries-item wow fadeInUp" data-wow-duration="<?php echo esc_attr(300 + ($index * 100)); ?>ms">
            <div class="pxl-industries-item-thumbnail">
                <?php echo get_the_post_thumbnail($post->ID, 'full'); ?>
            </div>
            <div class="pxl-industries-item-title">
                <?php echo esc_html($post->post_title); ?>
            </div>
        </a>
    <?php endforeach; ?>
    <?php if ($settings['show_view_all'] == true): ?>
        <div class="pxl-industries-view-all wow fadeInUp" data-wow-duration="<?php echo esc_attr(300 + ($index * 100)); ?>ms">
            <a href="<?php echo esc_url($settings['link_view_all']['url']); ?>">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>
    <?php endif; ?>
</div>