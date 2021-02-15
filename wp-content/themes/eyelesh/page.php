<?php

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container">

						<?php  while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<div class="mb-4 mt-5">
								<?php the_title( '<h3>','</h3>' );?>
							</div>
							
							<div> <?php the_post_thumbnail(); ?></div>
							<div class="entry-content"><?php the_content(); ?></div>
						</article>

						<?php endwhile; ?>

			</div>					
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
