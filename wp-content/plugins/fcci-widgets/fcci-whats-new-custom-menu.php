<?php

/*
Plugin Name: FCCI Custom Menu - Whats New 
Plugin URI: http://jamesbruce.me/
Description: FCCI Case Study  Widget displays a random FCCI Case Study post title, thumbnail and excerpt
Author: Venus Jacobson inspired by James Bruce
Version: 1
Author URI: http://jamesbruce.me/
*/


class FCCIWhatsNewCustomMenu extends WP_Widget{

	function FCCIWhatsNewCustomMenu()
	  {
	    $widget_ops = array('classname' => 'FCCIWhatsNewCustomMenu', 'description' => 'Displays 4 links to the 4 most recent Whats New posts' );
	    $this->WP_Widget('FCCIWhatsNewCustomMenu', 'FCCI MODULE - WHATS NEW CUSTOM MENU', $widget_ops);
	  }

	  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<?php
  }

  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }

  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
  // WIDGET CODE GOES HERE
    query_posts( array( 
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'post_type' => 'whats-new',
            'posts_per_page' => 4)
        ); 


    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);

    echo "<ul class=\"menu\">";

    echo "<li><h3><a href='".get_permalink(487)."''>".$title ."</a></h3></li>";
   
    if (have_posts()) : 
      // $linkTitle = the_title();
      while (have_posts()) : the_post(); 
      echo "<li><a title='".get_the_title()."' href='".get_permalink()."'>".get_the_title()."</a></li>";

      endwhile;
    endif;
    
    echo "</ul>"; 
    
    wp_reset_query();

  }

	
}//end of FCCIWhatsNewCustomMenu

add_action( 'widgets_init', create_function('', 'return register_widget("FCCIWhatsNewCustomMenu");') );

?>