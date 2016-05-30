<?php
/**
 * The template for displaying all pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<h1><?php single_term_title(); ?></h1>
			<div class="taxonomy-description">
				<p><?php echo term_description(); ?></p>
			</div>
			
			<div class="taxonomy-product-list">
				<?php while ( have_posts() ) : the_post(); ?>

					<div class="taxonomy-product-item">
						<div class="taxonomy-product-image-link">	
							<?php if ( has_post_thumbnail()) : ?>
								<a href="<?php echo get_permalink() ?>">
									<?php the_post_thumbnail( 'large' ); ?>
								</a>
							<?php endif; ?>
						</div>

						<div class="taxonomy-product-item-info">
							<span class="taxonomy-product-title"><?php the_title() ?></span>
							<span class="taxonomy-product-price">$<?php echo CFS()->get('price') ?></span>
						</div><!-- .entry-content -->
					</div><!-- #post-## -->


				<?php endwhile; // End of the loop. ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>