<?php

global $instaapp_themename;
global $instaapp_shortname;

/************************************************
*  ENQUQUE CSS AND JAVASCRIPT
************************************************/

//ENQUEUE FRONT SCRIPTS
function instaappointment_lite_theme_stylesheet()
{
	global $instaapp_themename;
	global $instaapp_shortname;
	if ( !is_admin() ) 
	{
		$theme = wp_get_theme();
		wp_enqueue_script('instaapp_componentssimple_slide', get_template_directory_uri() .'/js/custom.js',array('jquery'),'1.0',1 );
		wp_enqueue_script("comment-reply");
		wp_enqueue_script('hoverIntent');

		wp_enqueue_script('instaapp_superfish', get_template_directory_uri().'/js/superfish.js',array('jquery'),true,'1.0');
		wp_enqueue_script('instaapp_AnimatedHeader', get_template_directory_uri().'/js/cbpAnimatedHeader.js',array('jquery'),true,'1.0');
		wp_enqueue_script('instaapp_waypoints',get_template_directory_uri().'/js/waypoints.js',array('jquery'),'1.0',true );

		
		wp_enqueue_style( 'instaapp-style', get_stylesheet_uri() );
		wp_enqueue_style('instaapp-animation-stylesheet', get_template_directory_uri().'/css/instaapp-animation.css', false, $theme->Version);
		wp_enqueue_style( 'instaapp-awesome-theme-stylesheet', get_template_directory_uri().'/css/font-awesome.css', false, $theme->Version);
		
		wp_enqueue_style( 'ie-style',get_template_directory_uri().'/css/ie-style.css', false, $theme->Version  );
		wp_enqueue_style( 'awesome-theme-stylesheet',get_template_directory_uri().'/css/font-awesome-ie7.css', false, $theme->Version  );

		/*SUPERFISH*/
		wp_enqueue_style( 'instaapp-ddsmoothmenu-superfish-stylesheet', get_template_directory_uri().'/css/superfish.css', false, $theme->Version);
		wp_enqueue_style( 'instaapp-bootstrap-responsive-theme-stylesheet', get_template_directory_uri().'/css/bootstrap-responsive.css', false, $theme->Version);
		
		/*GOOGLE FONTS*/
		wp_enqueue_style( 'googleFontsOpensans','//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=latin,cyrillic-ext,greek-ext,greek,vietnamese,latin-ext,cyrillic', false, $theme->Version);
	}
}
add_action('wp_enqueue_scripts', 'instaappointment_lite_theme_stylesheet');

function instaappointment_lite_head() {
	global $instaapp_shortname;
	$instaapp_favicon = "";
	$instaapp_meta = '<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">'."\n";

	if(instaapp_get_option($instaapp_shortname.'_favicon')) {
		$instaapp_favicon = esc_url(instaapp_get_option($instaapp_shortname.'_favicon','instaappointment-lite'));
		$instaapp_meta .= "<link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"$instaapp_favicon\"/>\n";
	}
	echo $instaapp_meta;

	if(!is_admin()) {
		require_once(get_template_directory().'/includes/instaapp-custom-css.php');
	}
	
}
add_action('wp_head', 'instaappointment_lite_head');