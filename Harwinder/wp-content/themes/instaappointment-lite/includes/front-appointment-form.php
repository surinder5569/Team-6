<div class="head_form_main span5">
<?php 
	global $instaapp_shortname;
	if(instaapp_get_option($instaapp_shortname.'_nitify_btn_txt')){ $_nitify_btn_txt = esc_html(instaapp_get_option($instaapp_shortname.'_nitify_btn_txt')); } 
	if(instaapp_get_option($instaapp_shortname.'_nitify_btn_link')){ $_nitify_btn_link = esc_url(instaapp_get_option($instaapp_shortname.'_nitify_btn_link')); } 
?>	
	<div class="header-form-wrap clearfix">
		<div class="head_form_main">
			<img src="<?php echo get_template_directory_uri(); ?>/images/appointment.png" alt="<?php _e('Form image','instaappointment-lite'); ?>"/>
			<?php if(isset($_nitify_btn_link) && ($_nitify_btn_link != '')){ ?>
			<a href="<?php  echo $_nitify_btn_link; ?>" title="<?php _e('Appointment button','instaappointment-lite'); ?>"><?php if(isset($_nitify_btn_txt)){ echo $_nitify_btn_txt; } else { _e('Book Now','instaappointment-lite'); } ?></a>
			<?php } ?>
		</div>	
	</div>
</div>