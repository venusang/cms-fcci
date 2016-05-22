<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
	</div><!-- #main -->
</div><!-- #page -->

<footer>
	<div id="footerWrapper">
		<?php get_sidebar( 'footer' ); ?>
	</div>
</footer><!-- #colophon -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<?php $includesUrl =  includes_url(); ?>
<script type="text/javascript" src="http://fast.fonts.com/jsapi/2938be8a-2b87-42d5-af7f-0f6a632fc8ab.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/fcci.js"></script>
<?php
if ( is_front_page() ) { ?>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/slider/slider-plugins.js" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/slider/homepage-sliders.js" type="text/javascript"></script>

<?php } else {} ?>


<!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script>
 -->



</body>
</html>