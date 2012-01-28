<?php
require_once('simple_html_dom.php');
class STS
{
  public static function getAdd(){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://sign.js-ing.com/a.php");
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $ch_data = curl_exec($ch);
    curl_close($ch);

    return str_get_html($ch_data);
  }
}
?>