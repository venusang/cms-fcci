<?php

/*
Plugin Name: FCCI TaxAdvantage Widget
Plugin URI: http://jamesbruce.me/
Description: FCCI TaxAdvantage Widget Displays the TaxAdvantage post with thumbnail and excerpt
Author: Venus Jacobson inspired by James Bruce
Version: 1
Author URI: http://jamesbruce.me/
*/


class TaxAdvantageWidget extends WP_Widget
{

  function TaxAdvantageWidget()
  {
    $widget_ops = array('classname' => 'TaxAdvantageWidget', 'description' => 'Displays the TaxAdvantage post with thumbnail and excerpt' );
    $this->WP_Widget('TaxAdvantageWidget', 'FCCI MODULE - TaxAdvantage', $widget_ops);
  }

  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>
  <p>
    <label for="<?php echo $this->get_field_id('title'); ?>">Title: 
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
    </label>
  </p>
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
    
    // $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);

    $title = $instance['title']; //I replaced line 48 with this so that HTML is accepted in the title
  

    if (!empty($title))
    echo "<div class=\"sidebarModule taxAdvHeader\">";
    echo $before_title . $title . $after_title;
 
    // WIDGET CODE GOES HERE
    query_posts(array('p'=>'11','post_type'=> 'page'));  
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
      echo "<h3 class=\"taxAdvHeader\"><a href='".get_permalink()."'>".get_the_title()."</a></h3>";
      echo get_the_excerpt();
      echo "</div>";
    endwhile;
endif; 
wp_reset_query();
  }
}//end of TaxAdvantageWidget 

add_action( 'widgets_init', create_function('', 'return register_widget("TaxAdvantageWidget");') );
?>
