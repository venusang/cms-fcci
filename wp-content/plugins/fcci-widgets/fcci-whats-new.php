<?php

/*
Plugin Name: FCCI Whats New Widget
Plugin URI: http://jamesbruce.me/
Description: FCCI What's New Widget grabs a random FCCI Whats New Post and displays a Whats New post title,  thumbnail and excerpt
Author: Venus Jacobson inspired by James Bruce
Version: 1
Author URI: http://jamesbruce.me/
*/


class WhatsNewWidget extends WP_Widget
{

  function WhatsNewWidget()
  {
    $widget_ops = array('classname' => 'WhatsNewWidget', 'description' => 'Displays a random Whats New post with thumbnail and excerpt' );
    $this->WP_Widget('WhatsNewWidget', 'FCCI MODULE - Whats New', $widget_ops);
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
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    query_posts( array( 
            'post_type' => 'page',
            'slug' => 'whats-new',
            'posts_per_page' => 1)
        ); 



  if (!empty($title))
    echo "<div class=\"sidebarModule\">";
    
    if (have_posts()) : 
    while (have_posts()) : the_post(); 
      echo $before_title . $title ." | <a id=\"btnViewAll\" href='".get_permalink(487)."''>VIEW ALL</a>". $after_title;
   endwhile;
   endif; 
    wp_reset_query();
    // WIDGET CODE GOES HERE
    query_posts( array( 
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'post_type' => 'whats-new',
            'posts_per_page' => 1)
        ); 
   if (have_posts()) : 
    while (have_posts()) : the_post(); 
      $theThumbnail = get_the_post_thumbnail();
      echo "<div class=\"featuredPostImg\">";
      if($theThumbnail){
        echo "<a href='".get_permalink()."'>".$theThumbnail."</a>";
      } else { 
        echo "<a href='".get_permalink()."'><img src=\"http://lorempixel.com/300/100/city/FPO\" /></a>";
      }
      echo "</div>";
      echo "<h3><a href='".get_permalink()."'>".get_the_title()."</a></h3>";
      echo get_the_excerpt();
      echo "</div>";
    endwhile;
endif; 
wp_reset_query();
  }
}//end of WhatsNewWidget 

add_action( 'widgets_init', create_function('', 'return register_widget("WhatsNewWidget");') );
?>