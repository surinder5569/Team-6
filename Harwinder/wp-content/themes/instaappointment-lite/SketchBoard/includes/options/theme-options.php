<?php
global $instaapp_themename;
global $instaapp_shortname;

/**
 * Initialize the options before anything else. 
 */
add_action( 'admin_init', 'instaappointment_lite_custom_theme_options', 1 );

/**
 * Theme Mode demo code of all the available option types.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function instaappointment_lite_custom_theme_options() {

global $instaapp_themename;
global $instaapp_shortname;
  
   /**
    * Get a copy of the saved settings array. 
    */
	$saved_settings = get_option( 'option_tree_settings', array() );

	// If using image radio buttons, define a directory path
	$imagepath  =  get_template_directory_uri() . '/images/';
	$sktsiteurl = home_url('/');
	$sktsitenm  = get_bloginfo('name');
	
	// BACKGROUND DEFAULTS
	$background_defaults = array(
		'background-color'     => '#000000',
		'background-image'     => '',
		'background-repeat'    => 'repeat-y',
		'background-position'  => 'center top',
		'background-attachment'=>'fixed' 
	);
	
  /**
   * Create a custom settings array that we pass to 
   * the OptionTree Settings API Class.
   */
  $custom_settings = array(
    'contextual_help' => array(
		'content'       => array( 
			array(
				'id'        => 'general_help',
				'title'     => __('General', 'instaappointment-lite'),
				'content'   => __('<p>Help content goes here!</p>', 'instaappointment-lite')
			)
		),
		'sidebar'     => __('<p>Sidebar content goes here!</p>', 'instaappointment-lite')
		),
		'sections'        => array(
			array(
				'title'   => __( 'General Settings', 'instaappointment-lite' ),
				'id'      => 'general_default'
			),			
			array(
				'title'   => __( 'Header Settings', 'instaappointment-lite' ),
				'id'      => 'header_settings'
			), 
			array(      
				'title'   => __( 'Top Bar Settings', 'instaappointment-lite' ),
				'id'      => 'head_topbar_settings'
			),
		 	array(
				'title'   => __( 'Breadcrumb Settings', 'instaappointment-lite' ),
				'id'      => 'breadcrumb_settings'
			),
			array(
				'title'   => __( 'Home Page Featured Section', 'instaappointment-lite' ),
				'id'      => 'home_feature_settings'
			),
			array(
				'title'   => __( 'Home Page Parallax Section', 'instaappointment-lite' ),
				'id'      => 'home_parallax_settings'
			),				
			array(
				'title'   => __( 'Blog Settings', 'instaappointment-lite' ),
				'id'      => 'blog_settings'
			),
			array(      
				'title'   => __( 'Footer Settings', 'instaappointment-lite' ),
				'id'      => 'footer_section'
			),
		),
		
		'settings'        => array(

		//==================================================================
		// GENERAL SETTINGS SECTION STARTS =================================
		//==================================================================
		
		array(
			'id'          => 'instaapp_welcome_speach',
			'label'       => __('Welcome to InstaAppointment Lite', 'instaappointment-lite'),
			'desc'        => __('<h1>Welcome to InstaAppointment Lite</h1>
			<p>Thank you for using InstaAppointment Lite. Get started below and go through the left tabs to set up your website.</p>', 'instaappointment-lite'),
			'std'         => '',
			'type'        => 'textblock',
			'section'     => 'general_default',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => ''
		),
		array(
			'label'       => __( 'Primary Color Scheme', 'instaappointment-lite'),
			'id'          => $instaapp_shortname.'_primary_color_scheme',
			'type'        => 'colorpicker',
			'desc'        => __('Set primary theme color.', 'instaappointment-lite'),
			'std'         => '#F7CA18',
			'section'     => 'general_default'
		),
		array(
			'label'       => __( 'Upload Favicon', 'instaappointment-lite'),
			'id'          => $instaapp_shortname.'_favicon',
			'type'        => 'upload',
			'desc'        => __('This creates a custom favicon for your website.', 'instaappointment-lite'),
			'std'         => '',
			'section'     => 'general_default'
		),
		
		
		//------ END GENERAL SETTINGS SECTION ------------------------------

		//==================================================================
		// BREADCRUMB SETTINGS SECTION STARTS ==========================
		//==================================================================
		
		array(
			'label'       => __( 'Choose Page Title & Breadcrumb Background Color & Image', 'instaappointment-lite'),
			'id'          => $instaapp_shortname.'_bread_background',
			'std'         => array(
				'background-color'      => '#939393',
				'background-repeat'     => 'no-repeat',
				'background-attachment' => 'scroll',
				'background-position'   => 'center center',
				'background-size'       => 'auto',
				'background-image'      => $imagepath.'title-bg.png',
			),
			'desc'        => __( 'Upload image & color for page title background.', 'instaappointment-lite' ),
			'type'        => 'background',
			'section'     => 'breadcrumb_settings'
		),

		
		//==================================================================
		// HEADER TOP BAR SETTINGS SECTION STARTS ==========================
		//==================================================================
		
		array(
			'id'          => 'head_social_icons',
			'label'       => __('Social Follow Icons', 'instaappointment-lite'),
			'desc'        => __('<h2><b>Social Follow Icons</b></h2>
			<p>Add your social profile URL( eg: <b>http://facebook.com/SketchThemes</b> )</p>', 'instaappointment-lite'),
			'std'         => '',
			'type'        => 'textblock',
			'section'     => 'head_topbar_settings',
		),
		array(
			'label'       => __('Linkedin Link', 'instaappointment-lite'),
			'id'          => $instaapp_shortname.'_linkedin_link',
			'type'        => 'text',
			'desc'        => __('Enter Linkedin link.', 'instaappointment-lite'),
			'std'         => '#',
			'section'     => 'head_topbar_settings'
		),			
		array(
			'label'       => __('Tumblr Link', 'instaappointment-lite'),
			'id'          => $instaapp_shortname.'_tumblr_link',
			'type'        => 'text',
			'desc'        => __('Enter Tumblr link.', 'instaappointment-lite'),
			'std'         => '#',
			'section'     => 'head_topbar_settings'
		),
		array(
			'label'       => __('Twitter Link', 'instaappointment-lite'),
			'id'          => $instaapp_shortname.'_twitter_link',
			'type'        => 'text',
			'desc'        => __('Enter Twitter link.', 'instaappointment-lite'),
			'std'         => '#',
			'section'     => 'head_topbar_settings'
		),
		array(
			'label'       => __('Facebook Link', 'instaappointment-lite'),
			'id'          => $instaapp_shortname.'_fbook_link',
			'type'        => 'text',
			'desc'        => __('Enter Facebook Link.', 'instaappointment-lite'),
			'std'         => '#',
			'section'     => 'head_topbar_settings'
		),
		array(
			'label'       => __('Google Plus ID', 'instaappointment-lite'),
			'id'          => $instaapp_shortname.'_gplus_link',
			'type'        => 'text',
			'desc'        => __('Enter Google plus Id.', 'instaappointment-lite'),
			'std'         => '#',
			'section'     => 'head_topbar_settings'
		),
		array(
			'id'          => 'option_divider',
			'label'       => '',
			'type'        => 'textblock',
			'section'     => 'head_topbar_settings',
		),
	  	array(
			'label'       => __('Call Us Text', 'instaappointment-lite'),
			'id'          => $instaapp_shortname.'_head_callus',
			'type'        => 'text',
			'desc'        => __('Add your contact number ( eg: <b>Call Us - 123456789</b> )', 'instaappointment-lite'),
			'std'         => '+1-888-888-888',
			'section'     => 'head_topbar_settings'
		),
		
		//------ END SOCIAL LINKS SETTINGS SECTION -------------------------
		
		
		//==================================================================
		// HEADER SETTINGS SECTION STARTS ==================================
		//==================================================================
		
		array(
			'label'       => __( 'Change Logo', 'instaappointment-lite'),
			'id'          => $instaapp_shortname.'_logo_img',
			'type'        => 'upload',
			'desc'        => __('This creates a custom logo for your website.', 'instaappointment-lite'),
			'std'         => '',
			'section'     => 'header_settings'
		),
		array(
			'id'          => $instaapp_shortname.'_logo_alt',
			'label'       => __( 'Logo ALT Text', 'instaappointment-lite'),
			'desc'        => __('Enter logo image alt attribute text.', 'instaappointment-lite'),
			'std'         => 'Instaapp Theme',
			'type'        => 'text',
			'section'     => 'header_settings'
		),	
		array(
			'label'       => __( 'Home page Image', 'instaappointment-lite'),
			'id'          => $instaapp_shortname.'_frontslider_stype',
			'type'        => 'upload',
			'desc'        => __('Choose image for home page. Size: Width 1600px and Height 500px.', 'instaappointment-lite'),
			'std'         =>  $imagepath.'slider-1.jpg',
			'section'     => 'header_settings'
		),
		array(
			'id'          => $instaapp_shortname.'_nitify_btn_txt',
			'label'       => __( 'Notify button Text', 'instaappointment-lite'),
			'desc'        => __('Enter Notify button text.', 'instaappointment-lite' ),
			'std'         => '',
			'type'        => 'text',
			'section'     => 'header_settings'
		),	
		array(
			'id'          => $instaapp_shortname.'_nitify_btn_link',
			'label'       => __( 'Notify button link', 'instaappointment-lite'),
			'desc'        => __('Enter Notify button link.', 'instaappointment-lite' ),
			'std'         => '#',
			'type'        => 'text',
			'section'     => 'header_settings'
		),	
		//------ END HEADER SETTINGS SECTION -------------------------------
		
		//==================================================================
		// HOME FEATURED SETTINGS SECTION STARTS ========================s======
		//==================================================================	
		array(
			'id'          => $instaapp_shortname.'_featured_heading',
			'label'       => __( 'Featured Section Heading', 'instaappointment-lite'),
			'desc'        => __('Enter heading for featured box section.', 'instaappointment-lite'),
			'std'         => 'What We Do',
			'type'        => 'text',
			'section'     => 'home_feature_settings'
		),
		array(
			'id'          => $instaapp_shortname.'_fb1_first_part_heading',
			'label'       => __( 'First Featured Box Heading', 'instaappointment-lite'),
			'desc'        => __('Enter heading for first featured box.', 'instaappointment-lite'),
			'std'         => 'Secure Booking',
			'type'        => 'text',
			'section'     => 'home_feature_settings'
		),
		array(
			'id'          => $instaapp_shortname.'_fb1_first_icon_class',
			'label'       => __( 'First Featured Box Icon Class', 'instaappointment-lite'),
			'desc'        => __('Enter First Featured Box Class.', 'instaappointment-lite'),
			'std'         => 'fa-calendar',
			'type'        => 'text',
			'section'     => 'home_feature_settings'
		),
		array(
			'label'       => __('First Featured Box Content', 'instaappointment-lite'),
			'id'          => $instaapp_shortname.'_fb1_first_part_content',
			'type'        => 'textarea-simple',
			'desc'        => __('Enter content for first featured box.', 'instaappointment-lite'),
			'std'         => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been',
			'section'     => 'home_feature_settings'
		),
		array(
			'id'          => $instaapp_shortname.'_fb1_first_part_link',
			'label'       => __( 'First Featured Box Link', 'instaappointment-lite'),
			'desc'        => __('Enter link for first featured box.', 'instaappointment-lite'),
			'std'         => '#',
			'type'        => 'text',
			'section'     => 'home_feature_settings'
		),
		array(
			'id'          => $instaapp_shortname.'_fb2_second_part_heading',
			'label'       => __( 'Second Featured Box Heading', 'instaappointment-lite'),
			'desc'        => __('Enter heading for second featured box.', 'instaappointment-lite'),
			'std'         => 'Reliable Service',
			'type'        => 'text',
			'section'     => 'home_feature_settings'
		),
		array(
			'id'          => $instaapp_shortname.'_fb2_second_icon_class',
			'label'       => __( 'Second Featured Box Icon Class', 'instaappointment-lite'),
			'desc'        => __('Enter Second Featured Box Class.', 'instaappointment-lite'),
			'std'         => 'fa-cogs',
			'type'        => 'text',
			'section'     => 'home_feature_settings'
		),
		array(
			'label'       => __('Second Featured Box Content', 'instaappointment-lite'),
			'id'          => $instaapp_shortname.'_fb2_second_part_content',
			'type'        => 'textarea-simple',
			'desc'        => __('Enter content for second featured box.', 'instaappointment-lite'),
			'std'         => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been',
			'section'     => 'home_feature_settings'
		),
		array(
			'id'          => $instaapp_shortname.'_fb2_first_part_link',
			'label'       => __( 'Second Featured Box Link', 'instaappointment-lite'),
			'desc'        => __('Enter link for second featured box.', 'instaappointment-lite'),
			'std'         => '#',
			'type'        => 'text',
			'section'     => 'home_feature_settings'
		),
		array(
			'id'          => $instaapp_shortname.'_fb3_third_part_heading',
			'label'       => __( 'Third Featured Box Heading', 'instaappointment-lite'),
			'desc'        => __('Enter heading for third featured box.', 'instaappointment-lite'),
			'std'         => 'No Hidden Charges',
			'type'        => 'text',
			'section'     => 'home_feature_settings'
		),
		array(
			'id'          => $instaapp_shortname.'_fb3_third_icon_class',
			'label'       => __( 'Third Featured Box Icon Class', 'instaappointment-lite'),
			'desc'        => __('Enter Third Featured Box Class.', 'instaappointment-lite'),
			'std'         => 'fa-eye-slash',
			'type'        => 'text',
			'section'     => 'home_feature_settings'
		),
		array(
			'label'       => __('Third Featured Box Content', 'instaappointment-lite'),
			'id'          => $instaapp_shortname.'_fb3_third_part_content',
			'type'        => 'textarea-simple',
			'desc'        => __('Enter content for third featured box.', 'instaappointment-lite'),
			'std'         => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been',
			'section'     => 'home_feature_settings'
		),
		array(
			'id'          => $instaapp_shortname.'_fb3_third_part_link',
			'label'       => __( 'Third Featured Box Link', 'instaappointment-lite'),
			'desc'        => __('Enter link for third featured box.', 'instaappointment-lite'),
			'std'         => '#',
			'type'        => 'text',
			'section'     => 'home_feature_settings'
		),
			
		//------ END HOME FEATURED SETTINGS SECTION ---------------------

		//==================================================================
		// PARALLAX SETTINGS SECTION STARTS ==================================
		//==================================================================

		array(
			'label'       => __( 'Parallax Section Background Image (size: width * height (1600x * 1000px) )', 'instaappointment-lite'),
			'id'          => $instaapp_shortname.'_fullparallax_image',
			'type'        => 'upload',
			'desc'        => __('Upload background image for parallax section.', 'instaappointment-lite'),
			'std'         =>  $imagepath.'1600x1000.png',
			'section'     => 'home_parallax_settings'
		),
		array(
			'label'       =>  __( 'Parallax Section Content', 'instaappointment-lite'),
			'id'          => $instaapp_shortname.'_para_content_left',
			'type'        => 'textarea',
			'desc'        => __('Enter content for parallax section', 'instaappointment-lite'),
			'std'         => 'Phasellus facilisis, nunc in laciniaauctor, eros lacus aliquet velit, quis lobortis risus nunc nec nisi maecans et turpis vitae velit.volutpat porttitor
a sit amet est.Phasellus facilisis, nunc in lacinia auctor, eros lacus aliquet velit, quis lobortis risus nunc nec nisi maecans et turpis
vitae velit.volutpat porttitor a sit amet est.Phasellus facilisis, nunc in lacinia auctor, eros lacus aliquet velit, quis lobortis risus nunc nec nisi maecans et turpis
vitae velit.volutpat porttitor a sit amet est.',
			'section'     => 'home_parallax_settings'
		),
		
		//------ END PARALLAX SETTINGS SECTION -------------------------------

		//==================================================================
		// BLOG SETTINGS SECTION STARTS ====================================
		//==================================================================	

		array(
			'id'          => $instaapp_shortname.'_blogpage_heading',
			'label'       => __( 'Enter Blog Page Title', 'instaappointment-lite'),
			'desc'        => __('Enter Blog Page Title text.', 'instaappointment-lite'),
			'std'         => 'Blog',
			'type'        => 'text',
			'section'     => 'blog_settings'
		),
			
		//------ END BLOG SETTINGS SECTION ---------------------------------
		
		//==================================================================
		// FOOTER SETTINGS SECTION STARTS ==================================
		//==================================================================
		
		array(
			'label'       => __('Copyright Text', 'instaappointment-lite'),
			'id'          => $instaapp_shortname.'_copyright',
			'type'        => 'textarea',
			'desc'        => __('You can use HTML for links etc..', 'instaappointment-lite'),
			'std'         => 'Copyright text here',
			'section'     => 'footer_section'
		),			
		
		//------ END FOOTER SETTINGS SECTION -------------------------------
		
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}

?>