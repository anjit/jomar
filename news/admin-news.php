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
					<div class="panel-title">All News</div>
				 <a href="add-news.php"><button class="btn btn-success  glyphicon-plus">Add News</button></a>
				</div>
  				<div class="panel-body">
  			
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr>
								<th>S.No</th>
							  <th>News Title</th>
                <th>Description</th>
								<th>News Image</th>
                <th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php $news=$zoom->all('news','*');
						  foreach ($news as $nys) {
						?>

							<tr class="gradeA">
								<td>1</td>
                <td><?php echo $nys['title'];?></td>
								<td width="25%"><?php echo $zoom->excerpt($nys['description'],'100');?></td>
								<td width="20%"><img src="<?php echo $nys['image'];?>" width='25%'/></td>
								<td class="center"><input type="checkbox" checked data-toggle="toggle" data-on="Activated" data-off="Not Activated" data-onstyle="success" data-offstyle="danger"></td>
								<td class="center">
		<a class="btn btn-primary glyphicon glyphicon-pencil" href="edit-news.php?page=<?php echo $nys['id'];?>"> Edit</a>
<form method="POST" action=".php" accept-charset="UTF-8" style="display:inline">
    <input type='hidden' value='<?php echo $nys['id'];?>' name='id' /> 
    <input type='hidden' value='news' name='table' /> 
  <a class="btn btn-success glyphicon glyphicon-eye-open" href="view-news.php?page=<?php echo $nys['id'];?>"> View</a>
    <button class="btn  btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Page" data-message="Are you sure you want to delete this Page ?">
        <i class="glyphicon glyphicon-trash"></i> Delete
    </button>
</form>
</td>
							</tr>

				<?php 
			}
				?>			
								
						</tbody>
					</table>
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
 <link href="https://gitcdn.github.io/bootstrap-toggle/2.0.0/css/bootstrap-toggle.min.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="js/custom.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.0.0/js/bootstrap-toggle.min.js"></script>

   <script>

  $(function() {
    $('#toggle-two').bootstrapToggle({
      on: 'Enabled',
      off: 'Disabled'
    });
  })
</script>
<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Delete Parmanently</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure about this ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirm">Delete</button>
      </div>
    </div>
  </div>
</div>
<!-- Dialog show event handler -->
<script type="text/javascript">
  $('#confirmDelete').on('show.bs.modal', function (e) {
      $message = $(e.relatedTarget).attr('data-message');
      $(this).find('.modal-body p').text($message);
      $title = $(e.relatedTarget).attr('data-title');
      $(this).find('.modal-title').text($title);

      // Pass form reference to modal for submission on yes/ok
      var form = $(e.relatedTarget).closest('form');
      $(this).find('.modal-footer #confirm').data('form', form);
  });
   $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
      $(this).data('form').submit();
  });
</script>
<!-- Modal Dialog -->

  </body>
</html>