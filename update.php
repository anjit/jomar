<?php
 include('load.php');

$act= $_GET['action'];
$doc_id= $_GET['doc_id'];
$pro_id= $_GET['project_id'];
$table= $_GET['table'];
$type= $_GET['type'];

if($act=='blank'){
$zoom->update("$table","doc_id='$doc_id'","attachement","");
unlink('uploads/'.$page_id.".".$type);
}
if($act=='pblank'){
$zoom->update("$table","project_id='$pro_id'","attachements","");
unlink('uploads/doucments/'.$pro_id.".".$type);
}

if($_POST['action']=='astatus'){
$id=$_POST['id'];
$tab =$_POST['table'];
$status=$_POST['status'];
if($status=='on'){
 $st=1;
}
else
{
$st=0;
}
$zoom->update("$tab","id='$id'","status","$st");

}


?>