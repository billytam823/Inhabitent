<?php
/**
 * The template for the about pages.
 * Template Name: About Page
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>
			   <?php while ( have_posts() ) : the_post(); ?>
			      
			    <div class="about-splash">
			    	<h1><?php the_title(); ?></h1>
				</div>

				<div class="small-container">
			      <?php the_content(); ?>
				</div>

			   <?php endwhile; ?>
			   
			   <?php the_posts_navigation(); ?>
		
			<?php else : ?>
		
			   <h2>Nothing found!</h2>
		
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>
