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

//Changes the logo off wordpress in the login page
function my_custom_login_logo() {
     echo '
     <style type="text/css">                                                                   
         h1 a { background-image:url('.get_stylesheet_directory_uri().'/images/logos/inhabitent-logo-text-dark.svg) !important; background-size:300px !important; width:auto !important;}                          

     </style>';
}
add_action('login_head', 'my_custom_login_logo');

//Links the logo to the homepage
function inhabitent_login_logo( $url ) {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'inhabitent_login_logo' );

//
function inhabitent_login_logo_url_title(){
	return 'Inhabitent';
}

add_filter( 'login_message', 'inhabitent_login_logo_url_title');