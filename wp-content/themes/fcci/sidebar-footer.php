<?php
/**
 * The Footer widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<?php
	/* The footer widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'sidebar-3'  )
		&& ! is_active_sidebar( 'sidebar-4' )
		&& ! is_active_sidebar( 'sidebar-5'  )
	)
		return;
	// If we get this far, we have widgets. Let do this.

	//NOTE TO SELF:  I modified wp-includes/nav-menu-template.php line 140 to remove the extra div wrappers that WP was generating
?>
	<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
	<div class="widget-area">
		<?php dynamic_sidebar( 'sidebar-3' ); ?>
	</div>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
	<div class="widget-area">
		<?php dynamic_sidebar( 'sidebar-4' ); ?>
	</div>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
	<div class="widget-area">
		<?php dynamic_sidebar( 'sidebar-5' ); ?>
	</div>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?>
	<div class="widget-area">
		<?php dynamic_sidebar( 'sidebar-6' ); ?>
	</div>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-7' ) ) : ?>
	<div class="widget-area">
		<?php dynamic_sidebar( 'sidebar-7' ); ?>
	</div>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-8' ) ) : ?>
	<div id="widget-area">
		<?php dynamic_sidebar( 'sidebar-8' ); ?>
	</div>
	<?php endif; ?>
	
	<?php if ( is_active_sidebar( 'sidebar-9' ) ) : ?>
	<div id="copyright">
		<?php dynamic_sidebar( 'sidebar-9' ); ?>
	</div>
	<?php endif; ?>
