<?php
/**
 * @package Case-Themes
 */
get_header(); ?>
<div class="row content-row">
    <div id="pxl-content-area" class="pxl-content-area col-12">
        <main id="pxl-content-main">
            <div class="pxl-error-inner">
                <div class="pxl-error--col-1">
                    <img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/image-404.png'); ?>" />
                </div>
                <div class="pxl-error--col-2">
                    <div class="pxl-error--content">
                        <h3 class="pxl-error--title">
                            Oopsie!
                        </h3>
                        <h3 class="pxl-error--subtitle">Something's Missing...</h3>
                        <div class="pxl-error--divider"></div>
                        <p class="pxl-error--description">
                            The page you are looking for doesn't exist. It may have been moved or removed altogether. Please try searching for some other page, or return to the website's homepage to find what you're looking for.
                        </p>
                        <div>
                            <a class="btn" href="<?php echo esc_url(home_url('/')); ?>">
                                <span class="pxl--btn-text"><?php echo esc_html__('Back To Homepage', 'safebyte'); ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<?php get_footer();
