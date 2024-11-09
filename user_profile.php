<?php
session_start(); //starting session 
include('conflict/connection.php'); // including connection
 $id = $_SESSION['id']; //geting id from login page through session 

 $select = "SELECT * FROM `register_users` WHERE  `id` ='$id'"; // select query for retrieving data from database 
$run = mysqli_query($conn, $select);// to run the query we took run variable with two parrameters 
$data = mysqli_fetch_array($run);

            $fname = $data['fname'];
            $lname = $data['lname'];
            $username = $data['username'];
            $image = $data['image'];
            $email = $data['email'];
            $phone = $data['phone'];
            $birthday = $data['birthday'];
            $district = $data['district'];
            $city = $data['city'];
            $pincode = $data['pincode'];
            $password = $data['password'];
            $gender = $data['gender'];
            $education = $data['education'];

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
            margin: 10em  auto;

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
                            <a href="log_out_admin.php?id=<?php echo $id; ?>" class="pull-right text-decoration-none" style="font-size: 16px;"> LOG OUT </a>
                            <div class="clearfix"></div>
                        </div>
                        <div  class="bg-">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            &nbsp; 
                            </div>
                            <div class="page-wrapper ">
                            <div class="content container-fluid  fs-2 ">
                              <div class="center d-flex">
                                <div class="card d-flex p-3  ">
                                    <div class="card-img ">
                                        <img src="<?php echo $image ;?>" height="200px " alt="" class="rounded-circle">
                                    </div>
                                    <div class=" text-justify">
                                        
                                    </div>
                                    
                                </div>
                                <div class="card p-3 pe-0">
                                        <p class="h3"> Personal Inforamtion -</p>
                                        <p class="" > <span> Name -</span>  <?php echo $fname." ".$lname ;?></p>
                                        <p class="" ><span> Username - </span> <?php echo $username ;?></p>
                                        <p class="" >Email -<?php echo $email ;?></p>
                                        <p class="" > Phone - <?php echo $phone   ;?></p>
                                        <p class="" > Birthday - <?php echo $birthday   ;?></p>
                                        <p class="" > Gender - <?php echo $gender   ;?></p>
                                        
                                </div>
                                <div class="card p-4 ">
                                        <p class="h3" > Education Qualification -</p><p><?php echo $education ;?></p>
                                        
                                        <p class="h3 ">Address - </p>
                                         
                                        <p class=""> City - <?php echo $city ?> </p>
                                        <p class=""> District -  <?php echo $district ?> </p>
                                        <p class=""> Pincode - <?php echo $pincode ?> </p>
                                        
                                        
                                </div>
                                <div class="card p-5 ">
                                        <p class="h3">Crucial Information -</p>
                                        
                                        <p class="">Password - <input  type="password" value="<?php echo $password?>" ></p>
                                        <p class="position-absolute bottom-0  end-0 float-end me-5"> 
                                            <a href="update_user.php" class=""><i class="fa fa-edit "></i></a> 
                                        </p>
                                        <p class="  position-absolute bottom-0 end-50 float-end ms-5 ps-5"> 
                                            <a href="log_out_user.php?id=<?php echo $id; ?>" class="  ms-5  "><i class="fa fa-sign-out "></i></a> 
                                        </p>
                                </div> 
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