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
											<input class="form-control" placeholder="title" type="text"  name='title'>
									
										</div>
		    																		
									<div class="form-group">
											<label>Description</label>
<textarea class="form-control" placeholder="Textarea" rows="3"  name='Description'></textarea>
										</div>
																		<div class="form-group">
											<label>News image</label>
											<div class="fileinput fileinput-new" data-provides="fileinput">
  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
    </div>
  <div>
    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="url"></span>
    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
  </div>



										</div>
								

																																		
								
									</fieldset>
									<div>
										<div>
											<input type='submit' name='Add'   class="btn btn-primary">
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
        <link rel="stylesheet" type="text/css" href="http://jasny.github.io/bootstrap/dist/css/jasny-bootstrap.min.css"></link> 
<link href="vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
   <link href="vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">
     <script src="vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script> 
    <script src="vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>

    <script src="js/custom.js"></script>
 <script src="http://jasny.github.io/bootstrap/dist/js/jasny-bootstrap.min.js"></script>
<script>
$( document ).ready(function() {
  $('.calendar').click(function e(){ t =$('.bfh-datepicker input').val();
$('.dob').attr('value',t);
})
});
</script>
  </body>
</html>			
<?php
if(isset($_POST['Add'])){
ob_start();
//print_r($_POST) ;
$url= $zoom->image_upload();
foreach ($_POST as $key => $value) {
$fields[]=$key;
$values[]= '"'.$value.'"';
}
array_pop($fields);
array_pop($values);
array_push($fields,'image');
array_push($values,"'$url'");  
$zoom->insert('news',$fields,$values);
}
?>
