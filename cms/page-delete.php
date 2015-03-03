<?php
include('header.php');
?>
<?php
$id=$_POST['id'];
echo $id;
$zoom->delete('posts',"id='$id'");
$zoom->delete('meta',"post_id='$id'");
header("location:pages.php");
?>