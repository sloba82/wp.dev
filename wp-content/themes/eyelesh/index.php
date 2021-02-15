<?php get_header(); ?>


<!-- About-->
<section class="page-section bg-primary" id="about">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mt-0">We've got what you need!</h2>
                <hr class="divider light my-4" />
                <p class="text-white-50 mb-4">Start Bootstrap has everything you need to get your new website up and
                    running in no time! Choose one of our open source, free to download, and easy to use themes! No
                    strings attached!</p>
                <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>
            </div>
        </div>
    </div>
</section>

<!-- Services-->
<section class="page-section" id="services">
    <div class="container">
        <h2 class="text-center mt-0">Usluge</h2>
        <hr class="divider my-4" />
        <div class="row">

<?php
$loop = new WP_Query( array(
    'post_type' => 'usluge',
    'posts_per_page' => 10
  )
);
?>
            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        
            <div class="col-sm-6 col-md-4">
                    <div class="thumbnail box">
                        <div class="caption">
                            <div class="mb-4 mt-2">
                                <h3 class="text-center"><?php the_title(); ?></h3>
                            </div>
                            <div class="thumbnail-center"> 
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <p>
                                <?= substr($post->opis, 0, 124);?> ...
                            </p>  
                            <!-- <p><a href="<?php // echo get_permalink();?>" class="btn btn-primary" role="button">Button</a> -->
                            <a href="<?php echo get_permalink() . "#post-". get_the_ID();?>" class="stretched-link">Saznaj više</a>
                        </div>
                    </div>
            </div>
           
            <?php endwhile; wp_reset_query(); ?>

        </div>
    </div>
</section>
<?php
$page = get_page_by_title( 'Home' );

$content = apply_filters('the_content', $page->post_content); 
echo $content;
?>

<!-- Portfolio-->
<!-- <div id="portfolio">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box"
                    href="<?php bloginfo('template_directory'); ?>/assets/img/portfolio/fullsize/1.jpg">
                    <img class="img-fluid"
                        src="<?php bloginfo('template_directory'); ?>/assets/img/portfolio/thumbnails/1.jpg" alt="" />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">Category</div>
                        <div class="project-name">Project Name</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box"
                    href="<?php bloginfo('template_directory'); ?>/assets/img/portfolio/fullsize/2.jpg">
                    <img class="img-fluid"
                        src="<?php bloginfo('template_directory'); ?>/assets/img/portfolio/thumbnails/2.jpg" alt="" />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">Category</div>
                        <div class="project-name">Project Name</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box"
                    href="<?php bloginfo('template_directory'); ?>/assets/img/portfolio/fullsize/3.jpg">
                    <img class="img-fluid"
                        src="<?php bloginfo('template_directory'); ?>/assets/img/portfolio/thumbnails/3.jpg" alt="" />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">Category</div>
                        <div class="project-name">Project Name</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box"
                    href="<?php bloginfo('template_directory'); ?>/assets/img/portfolio/fullsize/4.jpg">
                    <img class="img-fluid"
                        src="<?php bloginfo('template_directory'); ?>/assets/img/portfolio/thumbnails/4.jpg" alt="" />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">Category</div>
                        <div class="project-name">Project Name</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box"
                    href="<?php bloginfo('template_directory'); ?>/assets/img/portfolio/fullsize/5.jpg">
                    <img class="img-fluid"
                        src="<?php bloginfo('template_directory'); ?>/assets/img/portfolio/thumbnails/5.jpg" alt="" />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">Category</div>
                        <div class="project-name">Project Name</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box"
                    href="<?php bloginfo('template_directory'); ?>/assets/img/portfolio/fullsize/6.jpg">
                    <img class="img-fluid"
                        src="<?php bloginfo('template_directory'); ?>/assets/img/portfolio/thumbnails/6.jpg" alt="" />
                    <div class="portfolio-box-caption p-3">
                        <div class="project-category text-white-50">Category</div>
                        <div class="project-name">Project Name</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div> -->
<!-- Call to action-->
<section class="page-section bg-dark text-white">
    <div class="container text-center">
        <h2 class="mb-4">Free Download at Start Bootstrap!</h2>
        <a class="btn btn-light btn-xl" href="https://startbootstrap.com/theme/creative/">Download Now!</a>
    </div>
</section>

<?php
get_footer();