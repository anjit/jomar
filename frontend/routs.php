<?php
require_once('../load.php');
$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$url = $_SERVER['REQUEST_URI']; //returns the current URL
$parts = explode('/',$url);
$ptitle=end($parts);
$page_title= str_replace('-',' ',$ptitle);
$pages=$zoom->select('posts',"post_title='$page_title' and post_type='4'",'*');
$posts= get_object_vars($pages);
?>