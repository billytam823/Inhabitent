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


