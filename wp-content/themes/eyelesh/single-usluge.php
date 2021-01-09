<?php

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container">

						<?php  while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php the_title( '<h1>','</h1>' );  ?>
						
							<div class="entry-content"><?php the_content(); ?></div>
						</article>


				<?= $post->opis?>

				<?php 
						the_post_navigation(
									array(
										'prev_text' =>  '</span>%title</span>',
										'next_text' =>  '</span>%title</span>',
									)
								);

								?>				

						<?php endwhile; ?>

			</div>					

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
