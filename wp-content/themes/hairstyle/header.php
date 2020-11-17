 <?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Hairstyle
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
	//wp_body_open hook from WordPress 5.2
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	}else{
		do_action( 'wp_body_open' ); 
	}
?>
<a class="skip-link screen-reader-text" href="#sitemain"><?php _e( 'Skip to content', 'hairstyle' ); ?></a>

    <div class="slider-main">
       <?php
	   		
			$slideimage = '';
			$slideimage = array(
					'1'	=>	get_template_directory_uri().'/images/slides/slider1.jpg',
					'2'	=>  get_template_directory_uri().'/images/slides/slider2.jpg',
					'3'	=>  get_template_directory_uri().'/images/slides/slider3.jpg',
			);
	   
			$slAr = array();
			$m = 0;
			for ($i=1; $i<4; $i++) {
				if ( get_theme_mod('slide_image'.$i, true) != "" ) {
					$imgSrc 	= esc_url(get_theme_mod('slide_image'.$i, $slideimage[$i]));
					if ( strlen($imgSrc) > 4 ) {
						$slAr[$m]['image_src'] = esc_url(get_theme_mod('slide_image'.$i, $slideimage[$i]));
						$m++;
					}
				}
			}
			$slideno = array();
			if( $slAr > 0 ){
				$n = 0;?>
                <div id="slider" class="nivoSlider">
                	<?php if(get_theme_mod('slide_hide') != '') {?>
                <?php 
                foreach( $slAr as $sv ){
                    $n++; ?><img src="<?php echo esc_url($sv['image_src']); ?>" /><?php
                    $slideno[] = $n;
                }
                ?>
                <?php } ?>
                </div>
                </div>
                <div class="clear"></div><?php 
			}
            ?>
        </div>
      </div><!-- slider -->
      
      <div class="contact-strip">
      		<div class="contact-align"><div class="call"><i class="fa fa-phone fa-lg"></i>&nbsp;&nbsp;<?php echo esc_attr(get_theme_mod('firstcol_text','12 8888 6666')); ?></div>
									   <div class="email"><i class="fa fa-envelope-o fa-lg"></i>&nbsp;&nbsp;<a href="mailto:<?php echo esc_attr(get_theme_mod('secondcol_text','info@sitename.com')); ?>"><?php echo esc_attr(get_theme_mod('secondcol_text','info@sitename.com')); ?></a></div>
                                       <?php if(get_theme_mod('thirdcol_link',true) != '') { ?>
                                       <div class="appoint"><a href="<?php echo esc_url(get_theme_mod('thirdcol_link','#')); ?>"><?php echo  esc_attr(get_theme_mod('thirdcol_text',__('MAKE AN APPOINTMENT','hairstyle'))); ?></a></div>
                                       <?php } ?>
            </div><!-- contact-align -->
      </div><!-- contact-strip -->

		<div id="header">
        <div class="para-shaper">
        </div>
            <div class="container">	
            <div class="pos-handle">
				<div class="row">
                    <div class="col-md-4 col-sm-4">
						<div class="logo">
							<?php hairstyle_the_custom_logo(); ?>
						<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr(bloginfo( 'name' )); ?></a></h1>

					<?php $description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p><?php echo esc_attr($description); ?></p>
					<?php endif; ?>
						</div>
                    </div>
					<div class="col-md-8 col-sm-8">					
						<div class="toggle">
							<a class="toggleMenu" href="#"><?php esc_html_e('Menu','hairstyle'); ?></a>
						</div> 
						<div class="main-nav">
							<?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>							
						</div>			
					</div>
				</div><!--row-->
                </div>
            </div><!--container-->               
		</div><!-- header -->
	
      <div class="main-container">
         <?php if( function_exists('is_woocommerce') && is_woocommerce() ) { ?>
		 	<div class="content-area">
                <div class="middle-align content_sidebar">
                	<div id="sitemain" class="site-main">
         <?php } ?>