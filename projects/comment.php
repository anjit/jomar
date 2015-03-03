<?php
include('load.php');
$action=$_POST['action'];
$project_id=$_POST['pro_id'];
$posts=$_POST['posts'];

if($action=='comment'){
$comment_id =$zoom->insert('comments',array('project_id','description','author_name'),array("'$project_id'","'$posts'","'ak'"));
$comments=$zoom->select('comments',"id='$comment_id'",'*');
foreach ($comments as $comment) {
?>
  <div class="comment"><p><div><h4><?php echo $comment['author_name'];?></h4>posted by: zac on <?php echo date('M-d',strtotime($comment['date']));?>
     <p><div class="alert alert-warning" role="alert"><i class="glyphicon glyphicon-comment"></i> <?php echo $comment['description'];?>
 <form action="delete.php" method="post">
 <input type="hidden" name="id" value="<?Php echo $comment_id ;?>"> 
 <input type="hidden" name="table" value="comments"> 
 </br><input type="submit" value="Delete" name="Delete" class="btn  btn-danger glyphicon-trash">
   </form>  </div></p> 
</div>

<?php }}?>