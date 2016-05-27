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
				
				<div class="product-taxonomy-links container">
				<!-- Loop for retrieving Product Taxonomy links -->
				<?php $terms = get_terms( array('taxonomy' => 'product_type') );
				   foreach ( $terms as $term ): ?>
								
						<?php echo
							'<a href="/inhabitent/product-type/'
							. $term->slug .'">'
							. $term ->slug . '</a>';
						?>		

				<?php endforeach; wp_reset_postdata(); ?>
				</div>

				<!-- Custom Loop for getting 16 products for display -->
				<?php
				   $args = array( 'post_type' => 'product', 
				   				  'order' => 'ASC',
				   				  'posts_per_page' => 16	 );
				   $product_posts = get_posts( $args ); // returns an array of posts
				?>

				
				<div class="product-list">
					<?php foreach ( $product_posts as $post ) : setup_postdata( $post ); ?>
							
							<div class="product-item">
									<?php if ( has_post_thumbnail() ) : ?>
										
										<div class="product-image-link">
										<a href="'<?php echo esc_url(get_permalink()) ?>'">
										<?php echo the_post_thumbnail( 'large' ); ?>
										</a></div>

									<?php endif; ?>

									<div class="product-item-info">
										<span><?php the_title() ?></span>
										<span><?php echo CFS()->get('price') ?></span>
									</div>
							

							</div><!-- .entry-content -->

					<?php endforeach; wp_reset_postdata(); ?>
				</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
