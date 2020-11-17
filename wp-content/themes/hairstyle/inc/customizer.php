<?php
/**
 * Hairstyle Theme Customizer
 *
 * @package Hairstyle
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hairstyle_customize_register( $wp_customize ) {

function hairstyle_format_for_editor( $text, $default_editor = null ) {
    if ( $text ) {
        $text = htmlspecialchars( $text, ENT_NOQUOTES, get_option( 'blog_charset' ) );
    }
 
    /**
     * Filter the text after it is formatted for the editor.
     *
     * @since 4.3.0
     *
     * @param string $text The formatted text.
     */
    return apply_filters( 'hairstyle_format_for_editor', $text, $default_editor );
}

function hairstyle_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

//Add a class for titles
    class hairstyle_info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	$wp_customize->remove_control('header_textcolor');
	
	$wp_customize->add_setting('color_scheme', array(
		'default' => '#f86868',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','hairstyle'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	$wp_customize->add_section('appoint_sec',array(
		'title'	=> __('Contact Details','hairstyle'),
		'description'	=> __('Add contact details here.','hairstyle'),
		'priority'		=> null
	));
	
	$wp_customize->add_setting('firstcol_text',array(
		'default'	=> __('12 8888 6666','hairstyle'),
		'sanitize_callback'	=> 'hairstyle_format_for_editor'
	));
	
	$wp_customize->add_control('firstcol_text',array(
		'label'	=> __('Add phone number here','hairstyle'),
		'section'	=> 'appoint_sec',
		'setting'	=> 'firstcol_text',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('secondcol_text',array(
		'default'	=> __('info@sitename.com','hairstyle'),
		'sanitize_callback'	=> 'hairstyle_format_for_editor'
	));
	
	$wp_customize->add_control('secondcol_text',array(
		'label'	=> __('Add email address here','hairstyle'),
		'section'	=> 'appoint_sec',
		'setting'	=> 'secondcol_text',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('thirdcol_text',array(
		'default'	=> __('MAKE AN APPOINTMENT','hairstyle'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('thirdcol_text',array(
		'label'	=> __('Add appointment text here','hairstyle'),
		'section'	=> 'appoint_sec',
		'setting'	=> 'thirdcol_text',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('thirdcol_link',array(
		'default'	=> __('#','hairstyle'),
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('thirdcol_link',array(
		'label'	=> __('Add appointment link here','hairstyle'),
		'section'	=> 'appoint_sec',
		'setting'	=> 'thirdcol_link',
		'type'		=> 'text'
	));
	
	$wp_customize->add_section('slider_section',array(
		'title'	=> __('Slider Settings','hairstyle'),
		'priority'		=> null
	));
	
	$wp_customize->add_setting('slide_hide',array(
		'sanitize_callback'	=> 'hairstyle_sanitize_checkbox'
	));
	
	$wp_customize->add_control('slide_hide',array(
			'label'	=> __('Check this to enable slider','hairstyle'),
			'setting'	=> 'slide_hide',
			'section'	=> 'slider_section',
			'type'	=> 'checkbox'
	));
	
	// Slide Image 1
	$wp_customize->add_setting('slide_image1',array(
		'default'	=> get_template_directory_uri().'/images/slides/slider1.jpg',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'slide_image1',
        array(
            'label' => __('Slide Image 1 (1440x700)','hairstyle'),
            'section' => 'slider_section',
            'settings' => 'slide_image1'
        )
    )
);
	
	// Slide Image 2
	$wp_customize->add_setting('slide_image2',array(
		'default'	=> get_template_directory_uri().'/images/slides/slider2.jpg',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'slide_image2',
        array(
            'label' => __('Slide Image 2 (1440x700)','hairstyle'),
            'section' => 'slider_section',
            'settings' => 'slide_image2'
        )
    )
);
	
	// Slide Image 3
	$wp_customize->add_setting('slide_image3',array(
		'default'	=> get_template_directory_uri().'/images/slides/slider3.jpg',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'slide_image3',
        array(
            'label' => __('Slide Image 3 (1440x700)','hairstyle'),
            'section' => 'slider_section',
            'settings' => 'slide_image3'
        )
    )
);
	
	$wp_customize->add_section('footer_section',array(
		'title'	=> __('Footer Text','hairstyle'),
		'description'	=> __('Add some text for footer like copyright etc.','hairstyle'),
		'priority'	=> null
	));
	
	$wp_customize->add_setting('footer_copy',array(
		'default'	=> __('Hairstyle 2016 | All Rights Reserved.','hairstyle'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	
	$wp_customize->add_control('footer_copy',array(
		'label'	=> __('Copyright Text','hairstyle'),
		'section'	=> 'footer_section',
		'type'		=> 'text'
	));
	
	
}
add_action( 'customize_register', 'hairstyle_customize_register' );

function hairstyle_css(){
		?>
        <style>
				a, 
				.tm_client strong,
				.postmeta a:hover,
				#sidebar ul li a:hover,
				.blog-post h3.entry-title,
				.woocommerce ul.products li.product .price,
				.main-nav ul li a:hover,
				.main-nav ul li a:hover{
					color:<?php echo esc_html(get_theme_mod('color_scheme','#f86868')); ?>;
				}
				a.blog-more:hover,
				.nav-links .current, 
				.nav-links .current:hover
				#commentform input#submit,
				input.search-submit,
				.nivo-controlNav a.active,
				.blog-date .date,
				a.read-more,
				.contact-strip{
					background-color:<?php echo esc_html(get_theme_mod('color_scheme','#f86868')); ?>;
				}
				#header .para-shaper{
					border-top:80px solid <?php echo esc_html(get_theme_mod('color_scheme','#f86868')); ?>;
				}
				.para-foot-shaper{
					border-top:64px solid <?php echo esc_html(get_theme_mod('color_scheme','#f86868')); ?>;
				}
		</style>
	<?php }
add_action('wp_head','hairstyle_css');

function hairstyle_custom_customize_enqueue() {
	wp_enqueue_script( 'hairstyle-custom-customize', get_template_directory_uri() . '/js/custom.customize.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'hairstyle_custom_customize_enqueue' );