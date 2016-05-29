<?php
/**
 * The template for displaying all pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main" role="main">
			
			<div class="product-container">
				<?php while ( have_posts() ) : the_post(); ?>
					
					<div class="product-image">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'large' ); ?>
						<?php endif; ?>
					</div>

					<div class="product-info">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<span class="product-price">$<?php echo CFS()->get('price'); ?></span>
						<?php the_content(); ?>
						<div class="social-media">
							<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i>Like
							</a>
							<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i>Tweet
							</a>
							<a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i>Pin
							</a>
						</div>
					</div><!-- .entry-content -->

				<?php endwhile; // End of the loop. ?>
				
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
