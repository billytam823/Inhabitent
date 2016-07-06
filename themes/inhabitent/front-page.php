<?php
/**
 * The template for displaying he front page.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<!-- front page splash area -->
			<div class="splash-image">
				<img src="<?php bloginfo('template_directory'); ?>/images/logos/inhabitent-logo-full.svg">
			</div>
		

			<!-- Shop Stuff Section -->
			<div class="shop-stuff-section container">
				<h2>Shop Stuff</h2>
				<div class="shop-stuff-container">

					<!-- getting the posts for adventure -->
						<?php
						   $terms = get_terms( array('taxonomy' => 'product_type') );
						?>

						<?php foreach ( $terms as $term ): ?>
							<div class="shop-stuff-item">
								
								<?php echo //Getting the Image using the Taxonomy Array
								'<img src="'
								. get_bloginfo('template_directory') . '/images/product-type-icons/'
								. $term->slug . '.svg">';
								?>
				
								<p><?php echo $term->description ?></p>

								<?php echo //Getting the link using the Taxonomy Array
									'<a href="'. get_term_link($term, 'product_type') .'">'
									. $term ->slug . ' Stuff</a>';
								?>
							</div>								
						<?php endforeach; ?>
				</div>
			</div>
			


			<!-- Inhabitent Journal Section -->
			<div class="home-journal-section container">
				<h2>Inhabitent Journal</h2>
				
				<div class="home-journal-container">
					
					<?php
					   $args = array( 'post_type' => 'post', 
					   				  'order' => 'DSC',
					   				  'posts_per_page' => 3	 );
					   $product_posts = get_posts( $args ); // returns an array of posts
					?>

					<?php foreach ( $product_posts as $post ) : setup_postdata( $post ); ?>

					<div class="home-journal-item">
						<?php the_post_thumbnail(); ?>
						<div class="home-journal-item-info">
							<span><?php red_starter_posted_on(); ?> / <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?> / <?php red_starter_posted_by(); ?></span>
							<h3><a href="<?php echo get_permalink() ?>"><?php the_title() ?></a></h3>
							<a class="read-more" href="<?php echo get_permalink() ?>">Read Entry</a>
						</div>
					</div>

					<?php endforeach; wp_reset_postdata(); ?>


				</div>
			</div>

			<!-- getting the posts for adventure -->
			<?php
			   $args = array( 'post_type' => 'adventure', 
			   				  'order' => 'ASC',
			   				  'posts_per_page' => 4	 );
			   $adventure_posts = get_posts( $args ); // returns an array of posts
			?>
			<div class="latest-adventure-section container">
				
				<h2>Latest Adventure</h2>

				<div class="adventure-flex-1">

					<!-- Inside First Flex Box -->	
					<div class="adventure-content" style="background:url(<?php echo get_the_post_thumbnail_url( $adventure_posts[0]-> ID); ?>);">
						 <div class="adventure-info">
							 <h2><a href="<?php echo $adventure_posts[0]->guid; ?>"><?php echo $adventure_posts[0]->post_title; ?></a></h2>
							 <a class="read-more" href="<?php echo $adventure_posts[0]->guid; ?>">Read More</a>
						 </div>
					</div>
					
					<div class="adventure-flex-2">

						<!-- Inside Second Flex Box -->
						<div class="adventure-content" style="background:url(<?php echo get_the_post_thumbnail_url( $adventure_posts[1]-> ID); ?>);">
							 <div class="adventure-info">
								 <h2><a href="<?php echo $adventure_posts[1]->guid; ?>"><?php echo $adventure_posts[1]->post_title; ?></a></h2>
								 <a class="read-more" href="<?php echo $adventure_posts[1]->guid; ?>">Read More</a>
							 </div>
						</div>
						
						<div class="adventure-flex-3">

							<!-- INside Third Flex Box -->
							<div class="adventure-content" style="background:url(<?php echo get_the_post_thumbnail_url( $adventure_posts[2]-> ID); ?>);">
								 <div class="adventure-info">
									 <h2><a href="<?php echo $adventure_posts[2]->guid; ?>"><?php echo $adventure_posts[2]->post_title; ?></a></h2>
									 <a class="read-more" href="<?php echo $adventure_posts[2]->guid; ?>">Read More</a>
								 </div>
							</div>

							<div class="adventure-content" style="background:url(<?php echo get_the_post_thumbnail_url( $adventure_posts[3]-> ID); ?>);">
								 <div class="adventure-info">
									 <h2><a href="<?php echo $adventure_posts[3]->guid; ?>"><?php echo $adventure_posts[3]->post_title; ?></a></h2>
									 <a class="read-more" href="<?php echo $adventure_posts[3]->guid; ?>">Read More</a>
								 </div>
							</div>
						</div>
					</div>
				
				</div>
			<a class="read-more read-more-adventures" href="">More Adventures</a>
			
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
