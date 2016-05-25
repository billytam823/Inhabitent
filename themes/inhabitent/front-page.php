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
					<div class="shop-stuff-item">
						<img src="<?php bloginfo('template_directory'); ?>/images/product-type-icons/do.svg">
						<p>Get back to nature with all the tools and toys you need to enjoy the great outdoors.</p>
						<a href="#">Do Stuff</a>
					</div>
					<div class="shop-stuff-item">
						<img src="<?php bloginfo('template_directory'); ?>/images/product-type-icons/eat.svg">
						<p>Nothing beats food cooked over a fire. We have all you need for good camping eat.</p>
						<a href="#">Eat Stuff</a>
					</div>
					<div class="shop-stuff-item">
						<img src="<?php bloginfo('template_directory'); ?>/images/product-type-icons/sleep.svg">
						<p>Get a good night's rest in home away from home that travels well</p>
						<a href="#">Sleep Stuff</a>
					</div>
					<div class="shop-stuff-item">
						<img src="<?php bloginfo('template_directory'); ?>/images/product-type-icons/wear.svg">
						<p>From flannel shirts to toques, looks the part while roughing it in the great outdoors.</p>
						<a href="#">Wear Stuff</a>
					</div>
				</div>
			</div>
			


			<!-- Inhabitent Journal Section -->
			<div class="inhabitent-journal-section container">
				<h2>Inhabitent Journal</h2>
				
				<div class="inhabitent-journal-container">
					
					<?php
					   $args = array( 'post_type' => 'post', 
					   				  'order' => 'DSC',
					   				  'posts_per_page' => 3	 );
					   $product_posts = get_posts( $args ); // returns an array of posts
					?>

					<?php foreach ( $product_posts as $post ) : setup_postdata( $post ); ?>


					<div class="inhabitent-journal-item">
						<?php the_post_thumbnail(); ?>
						<div class="inhabitent-journal-item-info">
							<span><?php red_starter_posted_on(); ?> / <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?> / <?php red_starter_posted_by(); ?></span>
							<h3><?php the_title() ?></h3>
							<a href="#">Read Entry</a>
						</div>
					</div>

					<?php endforeach; wp_reset_postdata(); ?>


				</div>
			</div>

			<!-- getting the posts for adventure -->
			<?php
			   $args = array( 'post_type' => 'post', 
			   				  'order' => 'DSC',
			   				  'posts_per_page' => 3	 );
			   $product_posts = get_posts( $args ); // returns an array of posts
			?>

			<?php foreach ( $product_posts as $post ) : setup_postdata( $post ); ?>
		
			   <?php 
			   		echo '<div class="blog-image">' . get_the_post_thumbnail() . '</div>';
			   		echo '<div class="blog-titles">' . get_the_title() . '</div>';
			   		echo '<a href="#">READ MORE</a>';
			    ?>

			<?php endforeach; wp_reset_postdata(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
