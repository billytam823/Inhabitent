<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package RED_Starter_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function red_starter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'red_starter_body_classes' );


// Remove "Editor" links from sub-menus
function inhabitent_remove_submenus() {
    remove_submenu_page( 'themes.php', 'theme-editor.php' );
    remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
}
add_action( 'admin_init', 'inhabitent_remove_submenus', 102 );


//Add a stylesheet login page
function inhabitent_custom_login() {
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/build/css/customlogin.css" />';
}
add_action('login_head', 'inhabitent_custom_login');


//Links the logo to the homepage
function inhabitent_login_logo( $url ) {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'inhabitent_login_logo' );


//Changes the "login message"
function inhabitent_login_title(){
    return 'Return to home page';
}

add_filter( 'login_headertitle', 'inhabitent_login_title');


//Custom Function for setting Featured Image as Splash for About Page
function inhabitent_about_splash_bg() {
       	
		if(!is_page_template('page-about.php')){
			return;
		}

        $custom_css = 
        		".about-splash{
                        background:
                        	linear-gradient( 
								rgba(0,0,0,0.4),
								rgba(0,0,0,0.4)
							),
                        	url('". CFS()->get('splash_banner') ."');
                        background-size:cover;
                        background-position:bottom;
                }";
        wp_add_inline_style( 'inhabitent-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'inhabitent_about_splash_bg' );

//Custom function to change query to display more posts altering main query
function inhabitent_filter_product_query($query){

	if( is_post_type_archive('product.php') && !is_admin() && $query->is_main_query() ){
		$query->set('orderby','title');
		$query->set('orderby','ASC');
		$query->set('posts_per_page', 1);
	}

}
add_action( 'pre_get_posts', 'inhabitent_filter_product_query' );

//Custom function to change shop title
function my_category_archive_title() {
    return 'Shop Stuff';
}
add_filter('get_the_archive_title', 'my_category_archive_title');

/**
 * Customize excerpt length and style.
 *
 * @param  string The raw post content.
 * @return string
 */

function red_wp_trim_excerpt( $text ) {
	$raw_excerpt = $text;

	if ( '' == $text ) {
		// retrieve the post content
		$text = get_the_content('');
	
		// delete all shortcode tags from the content
		$text = strip_shortcodes( $text );

		$text = apply_filters( 'the_content', $text );
		$text = str_replace( ']]>', ']]&gt;', $text );
		
		// indicate allowable tags
		$allowed_tags = '<p>,<a>,<em>,<strong>,<blockquote>,<cite>';
		$text = strip_tags( $text, $allowed_tags );
		
		// change to desired word count
		$excerpt_word_count = 50;
		$excerpt_length = apply_filters( 'excerpt_length', $excerpt_word_count );
		
		// create a custom "more" link
		$excerpt_end = '<span>[...]</span><p><a href="' . get_permalink() . '" class="read-more">Read more &rarr;</a></p>'; // modify excerpt ending
		$excerpt_more = apply_filters( 'excerpt_more', ' ' . $excerpt_end );
		
		// add the elipsis and link to the end if the word count is longer than the excerpt
		$words = preg_split( "/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY );
		
		if ( count( $words ) > $excerpt_length ) {
			array_pop( $words );
			$text = implode( ' ', $words );
			$text = $text . $excerpt_more;
		} else {
			$text = implode( ' ', $words );
		}
	}


	return apply_filters( 'wp_trim_excerpt', $text, $raw_excerpt );
}


remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );
add_filter( 'get_the_excerpt', 'red_wp_trim_excerpt' );

?>

	