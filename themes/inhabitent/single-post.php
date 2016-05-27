<?php
/**
 * The template for displaying all single posts product.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container" role="main">


		<?php while ( have_posts() ) : the_post(); ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
			
					<!-- Prints the Thumbnail of the Post -->
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'large' ); ?>
					<?php endif; ?>

					<!-- Prints the tTitle -->
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>


					<!-- Entry Meta, Posted on / Comment / Author -->
					<div class="entry-meta">
						<?php red_starter_posted_on(); ?> / <?php red_starter_comment_count(); ?> / <?php red_starter_posted_by(); ?>
					</div>
				</header>


				<!-- Prints the Content -->
				<div class="entry-content">
					<?php the_content(); ?>
				</div>

			</article>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
