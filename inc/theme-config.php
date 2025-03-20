<?php if(!function_exists('safebyte_configs')){
    function safebyte_configs($value){
        $primary_darker = safebyte()->get_opt('primary_color', '#5f2dde');
        $primary_darker_10 = pxl_darker_color($primary_darker, $primary_darker_10=1);
        $primary_darker_20 = pxl_darker_color($primary_darker, $primary_darker_20=1.3);
        $primary_darker_30 = pxl_darker_color($primary_darker, $primary_darker_30=3);
        $primary_darker_40 = pxl_darker_color($primary_darker, $primary_darker_40=4);

        $configs = [
            'theme_colors' => [
                'primary'   => [
                    'title' => esc_html__('Primary', 'safebyte'), 
                    'value' => safebyte()->get_opt('primary_color', '#164ac8')
                ],
                'gradient-first'   => [
                    'title' => esc_html__('Gradient First', 'safebyte'), 
                    'value' => safebyte()->get_opt('gradient_first_color', '#0d2565')
                ],
                'secondary'   => [
                    'title' => esc_html__('Secondary', 'safebyte'), 
                    'value' => safebyte()->get_opt('secondary_color', '#0d2665')
                ],
                'third'   => [
                    'title' => esc_html__('Third', 'safebyte'), 
                    'value' => safebyte()->get_opt('third_color', '#0e4eeb')
                ],
                'dark'   => [
                    'title' => esc_html__('Dark', 'safebyte'), 
                    'value' => safebyte()->get_opt('dark_color', '#000')
                ],
                'body-bg'   => [
                    'title' => esc_html__('Body Background Color', 'safebyte'), 
                    'value' => safebyte()->get_page_opt('body_bg_color', '#fff')
                ],
                'primary-darker-10'   => [
                    'title' => esc_html__('Primary Darker Color 10', 'safebyte'),
                    'value' => $primary_darker_10
                ],
                'primary-darker-20'   => [
                    'title' => esc_html__('Primary Darker Color 20', 'safebyte'), 
                    'value' => $primary_darker_20
                ],
                'primary-darker-30'   => [
                    'title' => esc_html__('Primary Darker Color 30', 'safebyte'), 
                    'value' => $primary_darker_30
                ],
                'primary-darker-40'   => [
                    'title' => esc_html__('Primary Darker Color 40', 'safebyte'), 
                    'value' => $primary_darker_40
                ]
            ],
            'link' => [
                'color' => safebyte()->get_opt('link_color', ['regular' => '#204ab0'])['regular'],
                'color-hover'   => safebyte()->get_opt('link_color', ['hover' => '#0d2565'])['hover'],
                'color-active'  => safebyte()->get_opt('link_color', ['active' => '#0d2565'])['active'],
            ],
            'gradient' => [
                'color-from' => safebyte()->get_opt('gradient_color', ['from' => '#0d2565'])['from'],
                'color-to' => safebyte()->get_opt('gradient_color', ['to' => '#204ab0'])['to'],
            ],
            'gradient2' => [
                'color-from' => safebyte()->get_opt('gradient_color2', ['from' => '#8c92f6'])['from'],
                'color-to' => safebyte()->get_opt('gradient_color2', ['to' => '#f9d78f'])['to'],
            ],
        ];
        return $configs[$value];
    }
}
if(!function_exists('safebyte_inline_styles')) {
    function safebyte_inline_styles() {  
        
        $theme_colors      = safebyte_configs('theme_colors');
        $link_color        = safebyte_configs('link');
        $gradient_color    = safebyte_configs('gradient');
        $gradient_color2   = safebyte_configs('gradient2');

        ob_start();
        echo ':root{';
            
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color-rgb: %2$s;', str_replace('#', '',$color),  safebyte_hex_rgb($value['value']));
            }
            foreach ($link_color as $color => $value) {
                printf('--link-%1$s: %2$s;', $color, $value);
            }
            foreach ($gradient_color as $color => $value) {
                printf('--gradient-%1$s: %2$s;', $color, $value);
            }
            foreach ($gradient_color2 as $color => $value) {
                printf('--gradient-%1$s2: %2$s;', $color, $value);
            }

        echo '}';

        return ob_get_clean();
    }
}
