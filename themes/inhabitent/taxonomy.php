<?php
/**
 * The template for displaying all pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main" role="main">
			
			<h1><?php single_term_title(); ?></h1>
			<div class="taxonomy-description">
				<p><?php echo term_description(); ?></p>
			</div>

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>		<a href="<?php echo get_permalink() ?>">
						<?php if ( has_post_thumbnail() 
						) : ?>
							<?php the_post_thumbnail( 'large' ); ?>
						<?php endif; ?>
						</a>
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->


			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>