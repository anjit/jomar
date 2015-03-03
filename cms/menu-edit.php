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
			  		<?php $nav_menus=$zoom->select('posts',"id='$page_id'",'*');
			  		   	foreach ($nav_menus as $nav_menu) {
			  				$metas=$zoom->get_metas($nav_menu['id']);
			  							  			
			  		?>			
			  						<form action="#" name='update' method='post'>
									<fieldset>
										<div class="form-group">
											<label>Menu Title</label>
											<input class="form-control" placeholder="Text field" type="text" value="<?php echo $nav_menu['post_title']; ?>" name='post_title'>
										</div>
										<div class="form-group">
								<input class="form-control" placeholder="Text field" type="hidden" value="<?php echo $page_id; ?>" name='page_id'>
										</div>
						                <div class="form-group">
											<label>Menu Url</label>
											<input class="form-control" placeholder="<?php echo $meta['type'];?>" type="text" value="<?php echo $nav_menu['url'];?>" name='url'>
										</div>
								<div class="form-group">
											<label>Parent</label>
											<input class="form-control" placeholder="<?php echo $meta['type'];?>" type="text" value="<?php echo $nav_menu['post_parent'];?>" name='post_parent'>
										</div>
									<div class="form-group">
											<label>Position</label>
											<input class="form-control" placeholder="<?php echo $meta['type'];?>" type="text" value="<?php echo $nav_menu['post_content'];?>" name='post_content'>
										</div>
								<?php foreach ($metas as $meta) {
									
								?>						
								<div class="form-group">
											<label>Class</label>
											<input class="form-control" placeholder="<?php echo $meta['type'];?>" type="text" value="<?php echo $meta['meta'];?>" name='<?php echo $meta['type'];?>'>
										</div>
									<?php }} ?>
										
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
if(isset($_POST['Update'])){
ob_start();
$values=$_POST;
print_r($values);
$page_id=$_POST['page_id'];
$total= count($values);
$i=0;
foreach ($values as $key => $value) {
	if(!in_array($key,array('class','page_id'))){
	
	$zoom->update('posts',"id='$page_id'","$key","$value");

}
else{
	$zoom->update('meta',"post_id='$page_id' and type='$key'","meta","$value");	
}
$i++;
if($i==$total)
	{ 
	$zoom->redirect("menu-edit.php?page=$page_id");
}

}
}

?>