<!-- HERO -->
<div class="heroWrapper">
	<div id="hero">
		<div id="screens">
			<div id="panel_1">
				<?php
					$wp_query = new WP_Query(
						array(
						'post_type' => 'slides',
						'posts_per_page' => -1,
						'panel' => 'left'
						)
					);
				?>
				<?php while ( have_posts() ) : the_post(); ?>
				<dl> 
					<dt><?php the_post_thumbnail('large'); ?></dt>
				</dl>
				<?php endwhile; // end of the loop. ?>
			    <?php wp_reset_query(); ?>
	    	</div><!-- panel_1 -->

	    	<div id="panel_2">
	    		<?php
					$wp_query = new WP_Query(
						array(
						'post_type' => 'slides',
						'posts_per_page' => -1,
						'panel' => 'middle'
						)
					);
				?>
				<?php while ( have_posts() ) : the_post(); ?>
				<dl> 
					<dt><?php the_post_thumbnail('large'); ?></dt>
				</dl>
				<?php endwhile; // end of the loop. ?>
			    <?php wp_reset_query(); ?>
	    	</div><!-- panel_2 -->

	    	<div id="panel_3">
	    		<?php
					$wp_query = new WP_Query(
						array(
						'post_type' => 'slides',
						'posts_per_page' => -1,
						'panel' => 'right'
						)
					);
				?>
				<?php while ( have_posts() ) : the_post(); ?>
				<dl> 
					<dt><?php the_post_thumbnail('large'); ?></dt>
				</dl>
				<?php endwhile; // end of the loop. ?>
			    <?php wp_reset_query(); ?>
	    	</div><!-- panel_3 -->


		</div><!-- screens -->
		<div id="captionWrapper">
			<div id="panel_captions">
				<?php
					$wp_query = new WP_Query(
						array(
						'sort_order' => 'asc',
						'post_type' => 'slide-captions',
						'posts_per_page' =>-1
						)
					);
				?>
				<?php while ( have_posts() ) : the_post(); ?>
				<dl> 
					<dt><?php the_content(); ?></dt>
				</dl>
				<?php endwhile; // end of the loop. ?>
			    <?php wp_reset_query(); ?>
			</div><!-- panel_captions -->
		</div>
	</div><!-- hero -->
</div><!-- heroWrapper -->
<!-- END OF HERO -->
