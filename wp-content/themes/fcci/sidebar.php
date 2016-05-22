<?php if(!is_front_page()){ ?>
			</div><!-- #content -->
		</div><!-- #primary -->
<?php } else {} ?>
<?php
/**
 * The Sidebar containing the main widget area.
 */

?>
		<div class="secondary widget-area">
			<?php if (!is_front_page()) {?>
			<div class="sidebarModule">
				<?php include('moduleTaxSaver.php'); ?>
			</div>
			<?php } else {} ?>

			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->
		
