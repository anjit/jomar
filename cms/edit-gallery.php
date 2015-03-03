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
					            <div class="panel-title"><?php $title=$zoom->select('posts',"id='$page_id'",'*');
					           foreach ($title as $title) {
					           echo $title['post_title'];
					           }
					            ?></div>
					          				            
					        </div>
			  				<div class="panel-body">
			  		<?php $images=$zoom->select('posts',"id='$page_id'",'*');
			  		   	foreach ($images as $image) {
			  						  						  			
			  		?>			
			  						<form action="#" name='update' method='post'  enctype="multipart/form-data">
									<fieldset>
										<div class="form-group">
											<label>Title</label>
											<input class="form-control" placeholder="Text field" type="text" value="<?php echo $image['post_title']; ?>" name='post_title'>
										</div>
										<div class="form-group">
								<input class="form-control" placeholder="Text field" type="hidden" value="<?php echo $page_id; ?>" name='page_id'>
										</div>
						                <div class="form-group">
											<label>Image</label>
											<div class="fileinput fileinput-new" data-provides="fileinput">
  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
<img src="<?php echo $image['url']; ?>" />
  </div>
  <div>
    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="url"></span>
    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
  </div>


										</div>
								<div class="form-group">
											<label>Content</label>
									 <textarea id="ckeditor_full" name='post_content'>
									 	<?php echo $image['post_content'];?>
</textarea>		
											</div>
		<?php }?>								
									</fieldset>
									<div>
										<div>
											<input type='submit' name='Update' Value='Update' class="btn btn-primary">
										</div>
									</div>
								</form>

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

    <script type="text/javascript" src="vendors/tinymce/js/tinymce/tinymce.min.js"></script>

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
$url= $zoom->image_upload();
$zoom->update('posts',"id='$page_id'","url","$url");
}
$page_id=$_POST['page_id'];
$total= count($values);
$i=0;

foreach ($values as $key => $value) {
 $zoom->update('posts',"id='$page_id'","$key","$value");

$i++;
if($i==$total)
	{ 
$zoom->redirect("edit-gallery.php?page=$page_id");
}

}
}

?>