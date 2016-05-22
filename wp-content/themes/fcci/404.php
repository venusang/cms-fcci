<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

	<div id="primary">
		<div id="content" role="main">
			<h1>Page Not Found</h1>
			<p>
			Our apologies, but we can't seem to find the page you are looking for. Please try doing a keyword search:
			<?php get_search_form( $echo ); ?>
			</p>
			<hr />
			<p>
			Or, take a look at our <strong>Site Map</strong> below.
			</p>
			<strong>Site Map:</strong>
			<?php wp_nav_menu(); ?>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>