<?php
	$default_settings = [
        'date' => '2030/10/10',
        'pxl_day' => '',
        'pxl_hour' => '',
        'pxl_minute' => '',
        'pxl_second' => '',
	];
	$html_id = pxl_get_element_id($settings);
	$settings = array_merge($default_settings, $settings);
	extract($settings); 
	$month = esc_html__('Month', 'safebyte');
	$months = esc_html__('Months', 'safebyte');
	$day = esc_html__('Day', 'safebyte');
	$days = esc_html__('Days', 'safebyte');
	$hour = esc_html__('Hour', 'safebyte');
	$hours = esc_html__('Hours', 'safebyte');
	$minute = esc_html__('Min', 'safebyte');
	$minutes = esc_html__('Mins', 'safebyte');
	$second = esc_html__('Sec', 'safebyte');
	$seconds = esc_html__('Secs', 'safebyte');
?>
<div class="pxl-countdown pxl-countdown-layout1 <?php echo esc_attr($pxl_day.' '.$pxl_hour.' '.$pxl_minute.' '.$pxl_second); ?>"
	data-month="<?php echo esc_attr($month) ?>"
	data-months="<?php echo esc_attr($months) ?>"
	data-day="<?php echo esc_attr($day) ?>"
	data-days="<?php echo esc_attr($days) ?>"
	data-hour="<?php echo esc_attr($hour) ?>"
	data-hours="<?php echo esc_attr($hours) ?>"
	data-minute="<?php echo esc_attr($minute) ?>"
	data-minutes="<?php echo esc_attr($minutes) ?>"
	data-second="<?php echo esc_attr($second) ?>"
	data-seconds="<?php echo esc_attr($seconds) ?>">
	<div class="pxl-countdown-inner" data-count-down="<?php echo esc_attr($date);?>"></div>
</div>