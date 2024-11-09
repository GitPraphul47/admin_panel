<?php
session_start();
include('conflict/connection.php');
if(isset($_REQUEST['login'])){
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	
	$select = "SELECT * FROM `admin_panel` WHERE `email`='$email' AND `password`='$password'";

	$run = mysqli_query($conn, $select);
	$data = mysqli_fetch_array($run);

	// $id = $data['id'];

	$_SESSION['id'] = $data['id'];

	if(mysqli_num_rows($run)){
		header('Location:home.php?login="login"');
		
	}


}
?>
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title>Login panel, Admin Panel</title>

<!--Bootstrap css-->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css'>
<!--/Bootstrap css-->
<!--/our css-->
  <link href="css/mycss.css" rel='stylesheet' type='text/css'>
  <link href="css/set2.css" rel='stylesheet' type='text/css'>
<!--/our css-->

</head>
<style type="text/css">
body{padding-top:50px; background:black;}
form{background: none; margin:0; padding: 0 30px;}
input.btn.btn-danger.pull-right {
    width: 100%;
    height: 46px;
    font-size: 22px;
}
</style>
<body>

<!--/Content-->
<section id="content">
  
<div class="row">
<div class="container">	

	<div class="col-md-3"></div>
	<div class="col-md-6">
	<div class="panel panel-default">
	<div class="list-group"> <div class="list-group-item active clearfix" href=""> 
	<h2 class="pull-left">ADMIN PANEL LOGIN</h2> <img class="pull-right" src="images/login-icon.png" width="70px">  </div> </div>
	  <div class="panel-body">
	  <?php //if($message!="") { echo "<div class='alert alert-danger'>" .$message. "</div>"; } ?>
		 <div class="grid">
			<figure class="effect-julia">
				<center> <img class="img-circle" src="images/login_icon.png" style="border:3px solid #999; width:30%; padding:10px; margin:10px 0 30px 0;"> </center> 
			</figure>
		</div>
		 <div class="grid"> 
		 <form action="" method="post">
			<div class="input-group input-group-lg">
			<span class="input-group-addon" id="sizing-addon1"> <img src="images/user.png" width="20">  </span>
			<input type="email" class="form-control" name="email" placeholder="Email" aria-describedby="sizing-addon1" required>
			</div> <br>
			<div class="input-group input-group-lg">
			<span class="input-group-addon" id="sizing-addon1"> <img src="images/pw.png" width="20"> </span>
			<input type="password" class="form-control" name="password" placeholder="Password" aria-describedby="sizing-addon1" required>
			</div>
			<br>
			<input class="btn btn-danger pull-right" type="submit" value="Login" name="login">
		</form>
		</div>
	   </div>
	</div>
	</div>
		
</div>    
</div>

</section>
<!--Content-->

</body>
</html>



