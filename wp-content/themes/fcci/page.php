<?php get_header(); ?>
				<?php while ( have_posts() ) : the_post(); ?>
						<h1><?php the_title(); ?></h1>
					<?php the_content(); ?> 
					<ol>
					<?php
					global $id;
					wp_list_pages("title_li=&child_of=$id&show_date=modified
					&date_format=$date_format"); ?>
				</ol>
				<?php endwhile; // end of the loop. ?>

				<?php 
					$thePageID = get_the_id();
					
					//ID is 630 for Careerss, this lists all the jobs 
					if($thePageID == '630'){
					$wp_query = new WP_Query(
						array(
						'orderby'   => 'menu_order',
						'order'     => 'ASC',
						'post_type' => 'job',
						'posts_per_page' =>-1
						)
					);
				?>

				<h4>Our Current Opportunities</h4>
				<ol>
				<?php while ( have_posts() ) : the_post(); ?>
				
					<li><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; // end of the loop. ?>
				</ol>
			    <?php wp_reset_query(); } ?>


<?php 
if($thePageID == '276'){?>
 	
 	</div><!-- #content -->
		</div><!-- #primary -->
		<div class="secondary"></div>
 <?php 
} else {get_sidebar();}
?>
<?php get_footer(); ?>