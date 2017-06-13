<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package wp-gov-brasil
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="main-sidebar" class="widget-area col-md-2" role="complementary">
	<section id="sidebar-section" class="rows">
		<nav class="menu-apoio pull-right">
        	<?php  wp_nav_menu( array( 'theme_location' => 'nav-apoio' ) ); ?>
    	</nav>

		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</section>
	
</aside>