<?php
/**
 * @package See-the-sign-wp
 * @version 1.0.0
 */
/*
Plugin Name: See the sign
Plugin URI: http://sign.js-ing.com/
Description: The Wordpress plugin for J&S Adnetwork The Sign 
Author: Jäger & Schweizer Ingenieure
Version: 1.0.0
Author URI: http://www.js-ing.com/
*/

require_once('lib/STS.php');

class STS_Shotcode
{
  function init()
	{
	  add_filter('widget_text', 'do_shortcode');
		add_shortcode('see_the_sign', array(__CLASS__, 'see_the_sign'));
		wp_enqueue_style('sts-syle', plugins_url('/lib/css/style.css', __FILE__));
	}
	
	function see_the_sign(){
	  echo STS::getAdd();
	}
}

STS_Shotcode::init();


 
class STS_Widget extends WP_Widget
{
  function STS_Widget()
  {
    $widget_ops = array('classname' => 'STS_Widget', 'description' => 'See the Sign advertising network Wordpress Plugin');
    $this->WP_Widget('STS_Widget', 'See the Sign', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args((array) $instance, array( 'title' => '' ));
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
    $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
    echo STS::getAdd();
 
    echo $after_widget;
  }
}
add_action( 'widgets_init', create_function('', 'return register_widget("STS_Widget");') );

?>
