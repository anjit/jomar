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
					     	<?php $docs=$zoom->select('documents',"id='$page_id'",'*');
						  foreach ($docs as $doc) {
						?>
     				            
					        </div>
			  				<div class="panel-body">
			  						<form action="#" name='update' method='post'  enctype="multipart/form-data">
									<fieldset>
										<div class="form-group ">
											<label>Title</label>
							<input type="hidden" name="page_id" value="<?php echo $page_id; ?>"> 				
											<input class="form-control" placeholder="title" type="text"  name='title' value="<?php echo $doc['title'];?>" >
											</div>
		    				<div class="form-group filetype">
											<label>File</label>
											<?php $types= $doc['attachement'];
 $type=explode(".",$types);
?>
                 <img src="images/<?php echo $type['1'] ;?>.jpg" width='25%'/>
                 <div id="div1"></div>
                 <p>Document ID: <strong><?php echo $doc['doc_id'];?></strong></p>
				<input type="hidden" value="<?php echo $doc['doc_id'];?>" name="doc_id"> 						
							
											</div>	

										<div class="form-group">
 
 <button class="btn remove btn-danger" type="button">
        <i class="glyphicon glyphicon-minus-sign"></i>Remove</button>

											</div>				
							
										<div class="form-group" >
											<label>Attachement</label>
	<div style="position:relative;" class="uplaod">
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
					<?php }?>						
											<input type='submit' name='Update'   class="btn btn-primary">
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
 <script>
$(document).ready(function(){
 
  $(".remove").click(function(){
  	     $.ajax({url:"update.php?action=blank&&doc_id=<?php echo $doc['doc_id'] ;?>&&table=documents&&type=<?php echo $type['1'];?>",success:function(result){
     $(".filetype").hide();
        }});
  });
});
</script>
 </body>
</html>			
<?php
if(isset($_POST['Update'])){
ob_start();
$values=$_POST;
if($_FILES["url"]['name']!=''){
$url= $zoom->file_upload();
$zoom->update('documents',"id='$page_id'","attachement","$url");
}
 $page_id=$_POST['page_id'];
$total= count($values);
$i=0;

foreach ($values as $key => $value) {
 $zoom->update('documents',"id='$page_id'","$key","$value");

$i++;
if($i==$total)
	{ 
		
$zoom->redirect("edit-doc.php?page=".$page_id);
}

}
}

?>

