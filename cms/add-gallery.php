<?php
include('header.php');
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

			  						<form action="#" name='update' method='post'  enctype="multipart/form-data">
									<fieldset>
										<div class="form-group">
											<label>Title</label>
											<input class="form-control" placeholder="Title" type="text"  name='post_title'>
										</div>
										
									
								<div class="form-group">
											<label>Image</label>
											<div class="fileinput fileinput-new" data-provides="fileinput">
  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
  <div>
    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="url"></span>
    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
  </div>
</div>
										</div>
								<div class="form-group">
											<label>Content</label>
											 <textarea id="ckeditor_full" name='post_content'>
</textarea>

										</div>
																																		
								
									</fieldset>
									<div>
										<div>
											<input type='submit' name='Add' Value='Add' class="btn btn-primary">
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
  

    <script src="js/custom.js"></script>
    <script src="js/editors.js"></script>
<script src="http://jasny.github.io/bootstrap/dist/js/jasny-bootstrap.min.js"></script>
  </body>
</html>			
<?php
if(isset($_POST['Add'])){
ob_start();
$post_title=$_POST['post_title'];
$url= $zoom->image_upload();
$post_content=$_POST['post_content'];
$page=$zoom->insert('posts',array('post_title','post_content','url','post_type','post_category'),array("'$post_title'","'$post_content'","'$url'",5,"'site_gallery'"));
//$zoom->redirect('menus.php');
}

?>