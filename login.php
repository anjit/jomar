<!DOCTYPE html>
<html>
  <head>
    <title>Zoomer Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-bg">
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
	              <div class="logo">
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			                <h6>Sign In</h6>
			                <div class="social">
	                           
	                      <?php if(isset($_GET['er'])) {
	                   echo "<p class='text-danger'><strong>username or password invalid</strong></p>";}?>
	                        </div>
			                <form action ='#' method='Post'>
			                <input class="form-control" type="text" placeholder="name" name='name'>
			                <input class="form-control" type="password" placeholder="Password" name='pass'>
			                <div class="action">
			                    <input type='submit' name='submit' value='Login' class="btn btn-primary signup">
			               </form>
			                </div>                
			            </div>
			        </div>

			        <div class="already">
			            <p>Don't have an account yet?</p>
			            <a href="#">Sign Up</a>
			        </div>
			    </div>
			</div>
		</div>
	</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>
<?php
if(isset($_POST['submit']))
{

include('load.php');
 $uname=$_POST['name'];
 $pass=md5($_POST['pass']);
$zoom =new database();
$users=$zoom->select("users","name='$uname' and password='$pass'",'*');
foreach ($users as $user) {
	 $pwd =$user['password'];
}

if($pass==$pwd)
{	
	header("location:dashboard.php");
}
else{ header("location:login.php?er=1");
}
}


?>