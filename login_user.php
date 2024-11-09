<?php
session_start();
include('conflict/connection.php');
if(isset($_REQUEST['login_user'])){
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	
	$select = "SELECT * FROM `register_users` WHERE `email`='$email' AND `password`='$password'";

	$run = mysqli_query($conn, $select);
	$data = mysqli_fetch_array($run);
	
    //$id = $data['id'];

	$_SESSION['id'] = $data['id'];

	if(mysqli_num_rows($run)){
		header('Location:user_profile.php');
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER_LOGIN</title>
    <style>
        .center{
            margin: 12em  auto;

        }
    </style>
     <!--Bootstrap css-->
     <link href="css/bootstrap.css" rel='stylesheet' type='text/css'>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <!-- font icon link  -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--/Bootstrap css-->
      <link href="css/mycss.css" rel='stylesheet' type='text/css'>
      <link href="css/set2.css" rel='stylesheet' type='text/css'>
      <!--/our css-->
      <!--Dropdown discription js-->
      <script type="text/javascript" src="js/left-dropdown/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/left-dropdown/bootstrap.min.js"></script>
</head>
<body>
    <main class="container-fluid">
        <!--Top Bar-->
        <section>
            <div class="row">
                <div class="">
                <?php require('include/menu-navigation.php'); ?>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" style="padding:0;background:#e7e7e7;">
                    <div class="page-wrapper">
                        <div id="menu" style="padding:17px;background:#3c8dbc;">
                            <a href="log_out_admin.php" class="pull-right text-decoration-none" style="font-size: 16px;"> LOG OUT </a>
                            <div class="clearfix"></div>
                        </div>
                        <div  class="bg-">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            &nbsp; 
                            </div>
                            <div class="page-wrapper bg-dark ">
                            <div class="content container-fluid bg-dark    p-5">
                            <form class="w-50 center p-5  " method="post">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label fs-2  ">Email address</label>
                                    <input type="email" class="form-control border rounded-pill fs-2 p-3" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label fs-2 ">Password</label>
                                    <input type="password" class="form-control border rounded-pill fs-2 p-3" id="exampleInputPassword1" name="password">
                                </div>
                                
                                     <button type="submit" class="btn btn-primary fs-2 p-2 m-3 ps-4 pe-4  rounded-pill " name="login_user">login</button>
                                
                            </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
      </section>
      <!--/Top Bar-->
      <!--footer-->
      <section>
         <div class="clearfix"></div>
         <div class=" panel-footer" style="background:#000; color:#FFF;">
            Copyright © 2022. <span class="float-end"> Powered By <a href=""> Infonix Service Technology </a> </span>
         </div>
      </section>
      <!--/footer-->	
    </main>
</body>
</html>