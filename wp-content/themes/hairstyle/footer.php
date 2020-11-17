<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Hairstyle
 */
?>

        <div class="copyright-wrapper">
        	<div class="para-foot-shaper">
            </div>
        	<div class="pos-foot-handle">
                <div class="copyright">
                    	<p><?php echo esc_attr(get_theme_mod('footer_copy',__('Hairstyle 2020 | All Rights Reserved.','hairstyle'))); ?></p>               
                </div><!-- copyright -->
                <div class="design-by">
                    	<p><?php echo hairstyle_credit_link(); ?></p>                 
                </div><!-- design-by --><div class="clear"></div>         
            </div><!-- pos-foot-handle -->
        </div>
    </div>
<?php wp_footer(); ?>

</body>
</html>