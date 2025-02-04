<?php
defined('ABSPATH') or exit(-1);

/**
 * Author Information widgets
 *
 */

if (!function_exists('pxl_register_wp_widget')) return;
add_action('widgets_init', function () {
    pxl_register_wp_widget('PXL_About_Author_Widget');
});
class PXL_About_Author_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'pxl_about_author_widget',
            esc_html__('SafeByte About Author', 'safebyte'),
            array('description' => esc_html__('Show Author Information', 'safebyte'),)
        );
    }

    function widget($args, $instance)
    {
        extract($args);
        $avatar_id = !empty($instance['avatar']) ? $instance['avatar'] : '';
        $avatar_url = wp_get_attachment_image_url($avatar_id, '');
        $name = !empty($instance['name']) ? $instance['name'] : '';
        $position = !empty($instance['position']) ? $instance['position'] : '';
        $description = !empty($instance['description']) ? $instance['description'] : '';
        $facebook_link = !empty($instance['facebook_link']) ? $instance['facebook_link'] : '';
        $twitter_link = !empty($instance['twitter_link']) ? $instance['twitter_link'] : '';
        $instagram_link = !empty($instance['instagram_link']) ? $instance['instagram_link'] : '';

?>
        <div class="pxl-about-author--widget widget">
            <div class="pxl-about-author--inner">
                <div class="pxl-about-author--body">
                    <div class="pxl-about-author--avatar">
                        <img src="<?php echo esc_url($avatar_url) ?>" alt="Avatar">
                    </div>
                    <div class="pxl-about-author--info">
                        <div class="pxl-about-author--name"><?php echo esc_html($name); ?></div>
                        <div class="pxl-about-author--position"><?php echo esc_html($position); ?></div>
                    </div>
                    <div class="pxl-about-author--content">
                        <?php if (!empty($description)): ?>
                            <div class="pxl-about-author--desc"><?php echo esc_html($description); ?></div>
                        <?php endif; ?>
                        <div class="pxl-about-author-social">
                            <?php if (!empty($facebook_link)): ?>
                                <a href="<?php echo esc_attr($facebook_link); ?>" class="pxl-social--facebook">
                                    <span>Facebook</span>
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($twitter_link)): ?>
                                <a href="<?php echo esc_attr($twitter_link); ?>" class="pxl-social--twitter">
                                    <span>Twitter/X</span>
                                    <i class="fab fa-twitter"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($instagram_link)): ?>
                                <a href="<?php echo esc_attr($instagram_link); ?>" class="pxl-social--instagram">
                                    <span>Instagram</span>
                                    <i class="fab fa-instagram"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['avatar'] = strip_tags($new_instance['avatar']);
        $instance['name'] = strip_tags($new_instance['name']);
        $instance['position'] = strip_tags($new_instance['position']);
        $instance['description'] = strip_tags($new_instance['description']);
        $instance['facebook_link'] = strip_tags($new_instance['facebook_link']);
        $instance['twitter_link'] = strip_tags($new_instance['twitter_link']);
        $instance['instagram_link'] = strip_tags($new_instance['instagram_link']);

        return $instance;
    }

    function form($instance)
    {
        $avatar = !empty($instance['avatar']) ? $instance['avatar'] : '';
        $name = !empty($instance['name']) ? $instance['name'] : '';
        $position = !empty($instance['position']) ? $instance['position'] : '';
        $description = !empty($instance['description']) ? $instance['description'] : '';
        $facebook_link = !empty($instance['facebook_link']) ? $instance['facebook_link'] : '';
        $twitter_link = !empty($instance['twitter_link']) ? $instance['twitter_link'] : '';
        $instagram_link = !empty($instance['instagram_link']) ? $instance['instagram_link'] : '';
    ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('avatar')); ?>"><?php esc_html_e('Avatar', 'safebyte'); ?></label>
            <input type="hidden" class="widefat hide-image-url"
                id="<?php echo esc_attr($this->get_field_id('avatar')); ?>"
                name="<?php echo esc_attr($this->get_field_name('avatar')); ?>"
                value="<?php echo esc_attr($avatar) ?>" />
        <div class="pxl-show-image">
            <?php
            if ($avatar != "") {
            ?>
                <img src="<?php echo wp_get_attachment_image_url($avatar) ?>">
            <?php
            }
            ?>
        </div>
        <?php
        if ($avatar != "") {
        ?>
            <a href="#" class="pxl-select-image pxl-btn" style="display: none;"><?php esc_html_e('Select Image', 'safebyte'); ?></a>
            <a href="#" class="pxl-remove-image pxl-btn"><?php esc_html_e('Remove Image', 'safebyte'); ?></a>
        <?php
        } else {
        ?>
            <a href="#" class="pxl-select-image pxl-btn"><?php esc_html_e('Select Image', 'safebyte'); ?></a>
            <a href="#" class="pxl-remove-image pxl-btn" style="display: none;"><?php esc_html_e('Remove Image', 'safebyte'); ?></a>
        <?php
        }
        ?>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('name')); ?>"><?php esc_html_e('Name', 'safebyte'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('name')); ?>" name="<?php echo esc_attr($this->get_field_name('name')); ?>" type="text" value="<?php echo esc_attr($name); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('position')); ?>"><?php esc_html_e('Position', 'safebyte'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('position')); ?>" name="<?php echo esc_attr($this->get_field_name('position')); ?>" type="text" value="<?php echo esc_attr($position); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php esc_html_e('Description', 'safebyte'); ?></label>
            <textarea class="widefat" rows="4" cols="20" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>"><?php echo wp_kses_post($description); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('facebook_link')); ?>"><?php esc_html_e('Facebook Link', 'safebyte'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook_link')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook_link')); ?>" type="text" value="<?php echo esc_attr($facebook_link); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('twitter_link')); ?>"><?php esc_html_e('Twitter Link', 'safebyte'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter_link')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter_link')); ?>" type="text" value="<?php echo esc_attr($twitter_link); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('instagram_link')); ?>"><?php esc_html_e('Instagram Link', 'safebyte'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('instagram_link')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram_link')); ?>" type="text" value="<?php echo esc_attr($instagram_link); ?>" />
        </p>
<?php
    }
}
