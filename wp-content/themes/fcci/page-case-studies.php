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
				'post_type' => 'case-study',
				'posts_per_page' => -1
				)
				);
			?>
			<ol>
				<?php while ( have_posts() ) : the_post(); ?>
					<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; // end of the loop. ?>
			</ol>
			    <?php wp_reset_query(); ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>