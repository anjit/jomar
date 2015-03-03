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
<?php $emps=$zoom->select('employee',"id='$page_id'",'*');
			  		   	foreach ($emps as $emp) {
			  						  						  			
			  		?>
			  						<form action="#" name='update' method='post'  enctype="multipart/form-data">
									<fieldset>
										<div class="form-group">
											<label>first Name</label>
											<input class="form-control" placeholder="First Name" type="text"  name='first_name' value="<?php echo $emp['first_name'];?>">
									<input class="form-control" placeholder="Text field" type="hidden" value="<?php echo $page_id; ?>" name='page_id'>
										</div>
		      <div class="form-group">
											<label>Last Name</label>
											<input class="form-control" placeholder="last Name" type="text"  name='last_name' value="<?php echo $emp['last_name'];?>">
										</div> 
										<div class="form-group">
											<label>Date Of Birth</label>
<div class="bfh-datepicker" data-format="y-m-d" data-date="today" name="dob"></div>
									<input type="hidden" name='dob' value='<?php echo $emp['dob'];?>' class="dob"> 			
													</div>
										<div class="form-group">
											<label>Gender</label>
										<label class="radio">
													<input type="radio" name="gender" Value="male">Male</label>
												<label class="radio radio-inline">
													<input type="radio" name="gender" Value="female">Female</label>
													</div>
										<div class="form-group">
											<label>Blood Group</label>
											<input class="form-control" placeholder="Blood Group" type="text"  name='blood' value="<?php echo $emp['blood'];?>">
										</div>
									<div class="form-group">
											<label>Address</label>
<textarea class="form-control" placeholder="Textarea" rows="3"  name='address'><?php echo $emp['address'];?></textarea>
										</div>
											<div class="form-group">
											<label>Phone</label>
											<input class="form-control" placeholder="Phone" type="text"  name='phone' value="<?php echo $emp['phone'];?>">
										</div>											
										<div class="form-group">
											<label>Email</label>
											<input class="form-control" placeholder="Title" type="email"  name='email' value="<?php echo $emp['email'];?>">
										</div>
								<div class="form-group">
											<label>Profile Pic</label>
											<div class="fileinput fileinput-new" data-provides="fileinput">
  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
  	<img src="<?php echo $emp['image_url']; ?>" />
  </div>
  <div>
    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="url"></span>
    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
  </div>

<?php }?>

										</div>
								

																																		
								
									</fieldset>
									<div>
										<div>
											<input type='submit' name='Update'  class="btn btn-primary">
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
if(isset($_POST['Update'])){
ob_start();
$values=$_POST;

if($_FILES["url"]['name']!=''){
$url= $zoom->image_upload();
$zoom->update('employee',"id='$page_id'","image_url","$url");
}
$page_id=$_POST['page_id'];
$total= count($values);
$i=0;

foreach ($values as $key => $value) {
 $zoom->update('employee',"id='$page_id'","$key","$value");

$i++;
if($i==$total)
	{ 
$zoom->redirect("edit-employee.php?page=$page_id");
}

}
}

?>
