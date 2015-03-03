<?php
include('header.php');
$page_id=$_GET['page'];
?>
<div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	  <?php include('sidebar.php');?>
		  </div>
		  <div class="col-md-10">

  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">Project Details</div>
					</div>
  				<div class="panel-body">
  			<?php $pros=$zoom->select('projects',"id='$page_id'",'*');
                foreach ($pros as $pro) {
                                          
            ?>
   
    <div class="row">
        <div class="col-sm-8 col-md-8">
          <p><h2><?php echo $pro['name'];?></h2></p>
          <p><div><h4><?php echo $pro['title'];?></h4>posted by: zac on <?php echo date('M-d',strtotime($pro['date']));?>
          </div>
          </p>
          <p></br><div class="alert alert-warning" role="alert"><?php echo $pro['description'];?></div></p>
    <h3>Comments</h3>
     <hr>
         <div id="comment">
  <?php 
   $project_id= $pro['project_id'];
  $comments =$zoom->select('comments',"project_id='$project_id'  order by id DESC","*");
foreach ($comments as $comment) {
  ?>
 <div class="comment"> <p><h4><?php echo $comment['author_name'];?></h4>posted on <?php echo date('M-d',strtotime($comment['date']));?>
     <p><div class="alert alert-success" role="alert"><i class="glyphicon glyphicon-comment"></i> 
     </br><?php echo $comment['description'];?></div></p> 

<?php if($zoom->is_admin()){?>
   </div>

<form  class="update_form"> 
 <input type="hidden" name="id" value="<?Php echo $comment['id'] ;?>"> 
 <input type="hidden" name="table" value="comments"> 
 <input type="hidden" name="action" value="astatus"> 
<input type="checkbox" <?php if($comment['status']==1){echo 'checked';}else{echo 'unchecked';} ?> data-toggle="toggle" data-on="Activated" data-off="Not Activated" data-onstyle="success" data-offstyle="danger" class="supdate" name="status"> 
</form>

   <form action="delete.php" method="post">
 <input type="hidden" name="id" value="<?Php echo $comment['id'] ;?>"> 
 <input type="hidden" name="table" value="comments"> 
 </br><input type="submit" value="Delete" name="Delete" class="btn  btn-danger glyphicon-trash">
   </form> 
   <?php }?>
<?php }?>

         </div>
   
      <p><button class="btn btn-warning btn-lg" id="adcom"><i class="glyphicon glyphicon-comment"></i> Add Comment</button></p>
    <div id="hidec">
     <form action="comment.php"  id="ajaxform"> 
      <input type="hidden" name="action" value="comment"> 
      <input type="hidden" name="pro_id" value="<?Php echo $project_id;?>"> 
      
        <p>   <textarea id="tinymce_full" name="posts"></textarea>
</p>  
   <p><input type="submit" value="Add Comment" name="submit" class="btn btn-warning btn-lg" id="adcoms"></p> 
       </form>
        </div>
 </div>

        <div class="col-sm-4 col-md-4  well">
        <h4>Project Related documents</h4>
         <?php $types= $pro['attachements'];
 $type=explode(".",$types);
?>
  <p>  <a href="<?php echo $pro['attachements'];?>" target="blank"><img src="images/<?php echo $type['1'] ;?>.jpg" width='25%'/></a>&nbsp;&nbsp;&nbsp; <strong><?php echo $pro['file_description'];?></strong></p>
        </div>
    </div>

  		<?php }?>		
  				</div>
  			</div>



		  </div>
		</div>
    </div>

  			
   <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2014 <a href='#'>Website</a>
            </div>
            
         </div>
      </footer>
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.0.0/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>
    <script src="vendors/ckeditor/ckeditor.js"></script>
     <script type="text/javascript" src="vendors/tinymce/js/tinymce/tinymce.min.js"></script>
 <script src="https://gitcdn.github.io/bootstrap-toggle/2.0.0/js/bootstrap-toggle.min.js"></script>
  <script>
 $("#adcoms").click(function(){

  $("#ajaxform").submit(function(e)
{
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR) 
        {
          $('#comment').append(data);
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            //if fails      
        }
    });
    e.preventDefault(); //STOP default action
    e.unbind(); //unbind. to stop multiple form submit.
});
});


$("#hidec").hide();
$("#adcom").click(function(){
$("#hidec").show(); 

});
</script>
  <script>
$(document).ready(function(){
 $('.toggle',this).change(function(){
 var datastring = $(this).parents("form").serialize();
$.ajax({
  type: "POST",
  data: datastring,
  url:"update.php",success:function(result){
//
        }});


});
});
</script>


    <script src="js/editors.js"></script>
    <script src="js/custom.js"></script>
   


  </body>
</html>