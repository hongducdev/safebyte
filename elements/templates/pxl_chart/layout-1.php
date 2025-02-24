<?php
$html_id = pxl_get_element_id($settings);
if(isset($settings['pxl_chart']) && !empty($settings['pxl_chart']) && count($settings['pxl_chart'])): ?>
    <div class="pxl-chart pxl-chart-1" data-labels="<?php echo esc_attr($settings['x_axis_labels']); ?>">
        <?php foreach ($settings['pxl_chart'] as $key => $value):
            $chart_title = isset($value['chart_title']) ? $value['chart_title'] : '';
            $chart_value = isset($value['chart_value']) ? $value['chart_value'] : '';
            $chart_color = isset($value['chart_color']) ? $value['chart_color'] : '';
            $chart_data = isset($value['chart_data']) ? $value['chart_data'] : '';
            ?>
            <span class="pxl-chart-item"
                data-title='<?php echo esc_attr($chart_title); ?>'
                data-color='<?php echo esc_attr($chart_color); ?>'
                data-values='<?php echo esc_attr($chart_data); ?>'>
            </span>
        <?php endforeach; ?>
        <div class="chart-container">
            <canvas id="<?php echo esc_attr($html_id); ?>"></canvas>
        </div>
    </div>
<?php endif; ?>