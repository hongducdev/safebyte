<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Case-Themes
 */
$post_tag = safebyte()->get_theme_opt( 'post_tag', true );
$post_navigation = safebyte()->get_theme_opt( 'post_navigation', false );
$post_social_share = safebyte()->get_theme_opt( 'post_social_share', false );
$tags_list = get_the_tag_list();
$sg_post_title = safebyte()->get_theme_opt('sg_post_title', 'default');
$sg_featured_img_size = safebyte()->get_theme_opt('sg_featured_img_size', '960x545');
$post_video_link = get_post_meta(get_the_ID(), 'post_video_link', true);
?>
<article id="pxl-post-<?php the_ID(); ?>" <?php post_class('pxl---post'); ?>>
    <?php safebyte()->blog->get_post_metas(); ?>

    <?php if(is_singular('post') && $sg_post_title == 'custom_text') { ?>
        <h2 class="pxl-item--title">
            <?php the_title(); ?>
        </h2>
    <?php } ?>
    <div class="pxl-item--content clearfix">
        <?php
            the_content();
            wp_link_pages( array(
                'before'      => '<div class="page-links">',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) );
        ?>
    </div>

    <?php if($post_tag && $tags_list || $post_social_share ) :  ?>
        <div class="pxl--post-footer">
            <?php if($post_tag) { safebyte()->blog->get_tagged_in(); } ?>
            <?php if($post_social_share) { safebyte()->blog->get_socials_share(); } ?>
        </div>
    <?php endif; ?>
    <?php if($post_navigation) { safebyte()->blog->get_post_nav(); } ?>
</article><!-- #post -->