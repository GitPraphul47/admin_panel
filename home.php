<?php
session_start(); //starting session 
include('conflict/connection.php'); // including connection
 $id = $_SESSION['id']; //geting id from login page through session 
 if($_GET['login'] =='login'){
  echo '<script type="text/javascript"> alert("updated");</script>';
}
?>
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title>Welcome to Admin Panel</title>
<!--Bootstrap css-->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css'>
<!--/Bootstrap css-->
  <link href="css/mycss.css" rel='stylesheet' type='text/css'>
  <link href="css/set2.css" rel='stylesheet' type='text/css'>
<!--/our css-->

<!--Dropdown discription js-->
    <script type="text/javascript" src="js/left-dropdown/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/left-dropdown/bootstrap.min.js"></script>
<!--Dropdown discription js-->

</head>
<body>

<!--Top Bar-->
<section>
  <div class="row">
    <div class="">
	
      <?php  include('include/menu-navigation.php'); ?>
	  
	  <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" style="padding:0;background:#e7e7e7;">
        
		<div>
    <div id="menu" style="padding:17px;background:#3c8dbc;">
      <a href="Change_Password.php?id=<?php echo $id; ?>" class="text-decoration-none fs-2 "> CHANGE PASSWORD</a>
	   <a href="log_out_admin.php?id=<?php echo $id; ?>" class="pull-right" style="font-size: 16px;"> LOG OUT </a>
     <div class="clearfix"></div>
	</div> 
 	
    <div>
	
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        &nbsp; 
		
		

</div>
		
		<div class="col-lg-12 col-md-3 col-sm-3 col-xs-12">
          <div class="panel panel-default">
		  <div class="panel-body">
		  <center>
		  <img src="images/welcome.jpg" width="80%"><br>
		  <img src="images/user.jpg" style="border-radius: 50%;border:5px solid orange;
    width: 150px;
    height: 150px;"><br>
		  <h1 style="color: #3c8dbc;"> <?php //echo $username;?> </h2>
		  </center>
		</div>
		
          </div>
		</div>
		
				
	
		
		</div>
		
      </div>
      
    </div>
	
      </div>
	  
    </div>
  </div>
</section>
		<!--footer-->
<div class="clearfix"></div>
  
  <div class="row panel-footer" style="background:#000; color:#FFF;">
    Copyright © 2022. <span class="pull-right"> Powered By <a href=""> Infonix Service Technology </a> </span>
  </div>
  
<!--/footer-->	
<!--/Top Bar-->


</body>
</html>