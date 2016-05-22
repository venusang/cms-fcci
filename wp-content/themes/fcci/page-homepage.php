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


		<?php while ( have_posts() ) : the_post(); ?>
			<div id="homeModuleIntro">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</div>
			<div id="homeModuleTaxSaver"><?php include('moduleTaxSaver.php'); ?></div><!-- homeModuleTaxSaver -->
		<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->
</div><!-- #primary -->
<div id="border"></div>

<div id="homepageModuleRow">
	<?php include('sidebar.php'); ?>
</div>
<?php get_footer(); ?>

