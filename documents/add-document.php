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
									<input class="form-control" value="<?php $emp_id=$zoom->all('documents','id','1'); 
											foreach ($emp_id as $emp) {
												$emp= $emp['id']+1;
												echo 'JDOC00'.$emp;
											}
										?>" type="hidden"  name='doc_id'>
										</div>
		    																		
											<div class="form-group">
											<label>Attachement</label>
	<div style="position:relative;">
        <a class='btn btn-primary' href='javascript:;'>
            Choose File...
            <input type="file" name="url" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
        </a>
        &nbsp;
        <span class='label label-info' id="upload-file-info"></span>
</div>								</div>
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
  <link rel="stylesheet" type="text/css" href="bootstrap/css/fileinput.min.css"></link> 
<link href="vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>
    <script src="js/custom.js"></script>
 <script src="bootstrap/js/jasny-bootstrap.min.js"></script>
 
 </body>
</html>			
<?php
if(isset($_POST['Add'])){
ob_start();
//print_r($_POST) ;
$url= $zoom->file_upload();
foreach ($_POST as $key => $value) {
$fields[]=$key;
$values[]= '"'.$value.'"';
}
array_pop($fields);
array_pop($values);
array_push($fields,'attachement');
array_push($values,"'$url'"); 
if($url!='') 
{
	$zoom->insert('documents',$fields,$values);
}
}
?>
