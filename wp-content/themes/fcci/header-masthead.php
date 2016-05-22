<div id="masthead">
	<header>
		<hgroup>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>
		
		<?php include('clientLogin.php'); ?>
		
		<nav id="access" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #access -->
	</header>
</div><!-- masthead -->