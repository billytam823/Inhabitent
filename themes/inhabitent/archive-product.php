<?php
/**
 * The template for displaying all pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main" role="main">

				<h1> Shop Stuff </h1>
				
				<!-- Custom Loop for getting the 4 categories -->
				<?php
				   $args = array( 'post_type' => 'product-type', 
				   				  'order' => 'ASC',
				   				  'posts_per_page' => 4	 );
				   $product_posts = get_posts( $args ); // returns an array of posts
				?>

				<?php foreach ( $product_type as $post ) : setup_postdata( $post ); ?>
					<
											
				<?php endforeach; wp_reset_postdata(); ?>

				<!-- Custom Loop for getting 16 products for display -->
				<?php
				   $args = array( 'post_type' => 'product', 
				   				  'order' => 'DSC',
				   				  'posts_per_page' => 16	 );
				   $product_posts = get_posts( $args ); // returns an array of posts
				?>
				
				<div class="product-list">
					<?php foreach ( $product_posts as $post ) : setup_postdata( $post ); ?>

							<div class="product-item">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'large' ); ?>
								<?php endif; ?>
								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							</div><!-- .entry-content -->
					<?php endforeach; wp_reset_postdata(); ?>
				</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
