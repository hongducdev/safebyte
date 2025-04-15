<?php
	$placeholder = !empty($settings['placeholder']) ? $settings['placeholder'] : 'Search...';
?>
<div class="pxl-search-form pxl-search-form1 pxl-search-form-popup">
	<div class="pxl-form-container">
		<div class="pxl-form-inner">			
			<?php get_search_form(); ?>
		</div>
	</div>
</div>