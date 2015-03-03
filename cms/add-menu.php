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

			  						<form action="#" name='update' method='post'>
									<fieldset>
										<div class="form-group">
											<label>Menu Title</label>
											<input class="form-control" placeholder="Title" type="text"  name='post_title'>
										</div>
										
								<div class="form-group">
											<label>Menu Url</label>
											<input class="form-control" placeholder="Url" type="text"  name='url'>
										</div>
										
								<div class="form-group">
											<label>Parent</label>
											<input class="form-control" placeholder="Parent" type="text"  name='post_parent'>
										</div>
								<div class="form-group">
											<label>Position</label>
											<input class="form-control" placeholder="Position" type="text" name='post_content'>
										</div>
								<div class="form-group">
											<label>Class</label>
											<input class="form-control" placeholder="Class" type="text" name='Description'>
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

  </body>
</html>			
<?php
if(isset($_POST['Add'])){
ob_start();
$post_title=$_POST['post_title'];
$url=$_POST['url'];

if($_POST['post_parent']!=''){$post_parent=$_POST['post_parent'];}else{$post_parent=null;}
$Description=$_POST['Description'];
$post_content=$_POST['post_content'];
$page=$zoom->insert('posts',array('post_title','post_content','url','post_type','post_parent','post_category'),array("'$post_title'","'$post_content'","'$url'",2,"'$post_parent'","'site_menu'"));
$zoom->insert('meta',array('meta','type','post_id'),array("'$Description'","'class'",$page));
$zoom->redirect('menus.php');
}

?>