<?php global $instaapp_shortname; ?>
<div id="full-division-box" class="instaapp-section">
	<div class="container full-content-box" >
		<div class="row-fluid">
			<div class="span12">
				<?php if(instaapp_get_option($instaapp_shortname."_para_content_left")) { echo esc_attr(instaapp_get_option($instaapp_shortname."_para_content_left")); } ?>
			</div>
		</div>
	</div>
</div>