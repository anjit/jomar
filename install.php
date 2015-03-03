<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>BCORE Admin Dashboard Template | Dashboard </title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
  
    
      
    <!-- END PAGE LEVEL  STYLES -->
     <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body>

    <!-- MAIN WRAPPER -->
  <div class="container">
  <div class="row">
  	<div class="wrapper">
    <div class="text-center">
	
	<h2>Fill below Detail to install</h2>
	<form action='#' method='post' role="form" >
       <div class="form-group">
 	<label for="Server">Server:<input type='text' name='severname'  class="form-control"  required="required" required="required" required="required" required="required"/>
</div>
  <div class="form-group">
<label for="Database">Database name:<input type='text' class="form-control" name='name' required="required" required="required" required="required"/>
</div>
  <div class="form-group">
<label for="User">User name:<input type='text' class="form-control" name='uname' required="required" required="required"/>
</div>
  <div class="form-group">
<label for="Password">Database Password:<input type='password' name='password' class="form-control" />
</div>
  <div class="form-group">
<input type='submit' name='submit' value='Submit' class="btn  btn-success"/>
</form>
  
  </div>
   </div>
  </div>
</div>


   <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

  

</body>

    <!-- END BODY -->
</html>
<?php
if(isset($_POST['submit']))
{

$server=$_POST['severname'];
$db=$_POST['name'];
$uname=$_POST['uname'];
$pass=$_POST['password'];

	$file = 'config.php';
// The new person to add to the file

$content = '<?php error_reporting(0);
$con=mysql_connect("'.$server.'","'.$uname.'","'.$pass.'");
$response=mysql_select_db("'.$db.'",$con); ?>';  
// Write the contents to the file, 
// using the FILE_APPEND flag to append the content to the end of the file
// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
file_put_contents($file, $content, FILE_APPEND | LOCK_EX);
include('config.php');
include('check.php');
}
?>