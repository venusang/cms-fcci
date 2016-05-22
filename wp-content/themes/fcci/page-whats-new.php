<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
		<div id="primary">
			<div id="content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
						<h1><?php the_title(); ?></h1>
				<?php endwhile; // end of the loop. ?>

			<?php
				$wp_query = new WP_Query(
				array(
				// 'orderby' => 'menu_order',	//use this if you want to control the order by clicking and dragging items
				'orderby' => 'menu_order', //'asc' sorts the What's New articles based on when they were created
				'order' => 'ASC',
				'post_type' => 'whats-new',
				'posts_per_page' => -1
				)
				);
			?>
				<?php while ( have_posts() ) : the_post(); ?>

					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php the_excerpt(); ?>
					<hr />
				<?php endwhile; // end of the loop. ?>
			    <?php wp_reset_query(); ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>