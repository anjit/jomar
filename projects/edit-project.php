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
					            <div class="panel-title"></div>
					          				            
					        </div>
			  				<div class="panel-body">
<?php $pros=$zoom->select('projects',"id='$page_id'",'*');
                foreach ($pros as $pro) {
                                          
            ?>
			  						<form action="#" name='add' method='post'  enctype="multipart/form-data">
									<fieldset>
									<div class="form-group">
											<label>Name</label>
			<input class="form-control" placeholder="Name" type="text"  name='name' value="<?php echo $pro['name'];?>">
										</div>
								
										<div class="form-group">
											<label>Title</label>
											<input class="form-control" placeholder="Title" type="text"  name='title' value="<?php echo $pro['title'];?>">
										<input class="form-control" value="<?php echo $pro['id'];	?>" type="hidden"  name='page_id'>
										<input class="form-control" value="<?php echo $pro['project_id'];	?>" type="hidden"  name='doc_id'>
										</div>
										
									
								<div class="form-group">
											<label>file/image</label>
									<?php $types= $pro['attachements'];
 $type=explode(".",$types);
?>			
<div class="fileinput fileinput-new" data-provides="fileinput">
  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
<img src="images/<?php echo $type['1'] ;?>.jpg">
  </div>
  <div>
    <span class="btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="url"></span>
    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
  </div>
</div>
										</div>

										<div class="form-group">
 
 <button class="btn remove btn-danger" type="button">
        <i class="glyphicon glyphicon-minus-sign"></i>Remove</button>

											</div>
								<div class="form-group">
											<label>File Description</label>
         <input class="form-control" placeholder="File Description" type="text"  name='file_description' value="<?php echo $pro['file_description'];?>">
										</div>
								<div class="form-group">
											<label>Description</label>
											 <textarea id="ckeditor_full" name='description'><?php echo $pro['description'];?></textarea>

										</div>
																																		
								
									</fieldset>
									<div>
										<div>
											<input type='submit' name='Update' Value='Update' class="btn btn-primary">
										</div>
									</div>
								</form>
<?php } ?>
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
        <link rel="stylesheet" type="text/css" href="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link> 
        <link rel="stylesheet" type="text/css" href="http://jasny.github.io/bootstrap/dist/css/jasny-bootstrap.min.css"></link> 


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>

    <script src="vendors/ckeditor/ckeditor.js"></script>
    <script src="vendors/ckeditor/adapters/jquery.js"></script>
   <script src="bootstrap/js/jasny-bootstrap.min.js"></script>
   <script>
$(document).ready(function(){
 
  $(".remove").click(function(){
  	     $.ajax({url:"update.php?action=pblank&&project_id=<?php echo $pro['project_id'] ;?>&&table=projects&&type=<?php echo $type['1'];?>",success:function(result){
     $(".filetype").hide();
        }});
  });
});
</script>
    <script src="js/custom.js"></script>
    <script src="js/editors.js"></script>
<script src="http://jasny.github.io/bootstrap/dist/js/jasny-bootstrap.min.js"></script>
  </body>
</html>			
<?php
if(isset($_POST['Update'])){
ob_start();
$values=$_POST;
if($_FILES["url"]['name']!=''){
$url= $zoom->file_upload();
$zoom->update('projects',"id='$page_id'","attachements","$url");
}
 $page_id=$_POST['page_id'];
$total= count($values);
$i=0;

foreach ($values as $key => $value) {
 $zoom->update('projects',"id='$page_id'","$key","$value");

$i++;
if($i==$total)
	{ 
		
$zoom->redirect("edit-project.php?page=".$page_id);
}

}
}

?>
