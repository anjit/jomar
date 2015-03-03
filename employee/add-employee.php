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
											<label>first Name</label>
											<input class="form-control" placeholder="First Name" type="text"  name='first_name'>
										<input class="form-control" value="<?php $emp_id=$zoom->all('employee','id','1'); 
											foreach ($emp_id as $emp) {
												$emp= $emp['id']+1;
												echo 'JEMP00'.$emp;
											}
										?>" type="hidden"  name='emp_id'>
										</div>
		      <div class="form-group">
											<label>Last Name</label>
											<input class="form-control" placeholder="last Name" type="text"  name='last_name'>
										</div> 
										<div class="form-group">
											<label>Date Of Birth</label>
<div class="bfh-datepicker" data-format="y-m-d" data-date="today" name="dob"></div>
									<input type="hidden" name='dob' value='' class="dob"> 			
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
											<input class="form-control" placeholder="Blood Group" type="text"  name='blood'>
										</div>
									<div class="form-group">
											<label>Address</label>
											<textarea class="form-control" placeholder="Textarea" rows="3"  name='address'></textarea>
										</div>
											<div class="form-group">
											<label>Phone</label>
											<input class="form-control" placeholder="Phone" type="text"  name='phone'>
										</div>											
										<div class="form-group">
											<label>Email</label>
											<input class="form-control" placeholder="Title" type="email"  name='email'>
										</div>
								<div class="form-group">
											<label>Profile Pic</label>
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
											<input type='submit' name='Add'  class="btn btn-primary">
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
$values[]= "'".$value."'";
}
array_pop($fields);
array_pop($values);
array_push($fields,'image_url');
array_push($values,"'$url'");  
$zoom->insert('employee',$fields,$values);
}
?>