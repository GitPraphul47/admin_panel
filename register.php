<?php

include('conflict/connection.php'); //connection iclude to database 

if(isset($_POST['submit'])){  
    $fname = trim(ucwords(mysqli_real_escape_string($conn, $_POST['fname']))); // functions #trim for removing extra spacing from begining #ucwords for first word capital, #mysqli_real for safe entry in database 
    $lname = trim(ucwords(mysqli_real_escape_string($conn, $_POST['lname'])));
    $username = trim(mysqli_real_escape_string($conn, $_POST['username']));

    if($username ==""){   
        $username = $fname."_".rand(0,300); // for username if its entry is empty 
    }

    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $filename =rand(1,99). '.' .end(explode(".",$_FILES['image']['name']));
    $tempname = $_FILES['image']["tmp_name"]; //for temporary name for file 
    $image = "./images/" . $filename; // path redirect for file 
    move_uploaded_file($tempname, $image);  // by this function it shows that its file that is being saved 

    $phone = trim(mysqli_real_escape_string($conn, $_POST['phone']));
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $education = implode(",",$_POST['education']); // implode function for array to convert into string 
    $city = $_POST['city'];
    $district = $_POST['district'];
    $pincode = $_POST['pincode'];
    $password = md5($_POST['password']);
    $c_password = md5($_POST['c_password']);
    // for if there is any empty entry in form in required parts 
   if($fname !="" && $lname !="" && $email !="" && $filename !="" && $phone !="" && $pincode !="" && $password !="" ){
    if($password == $c_password){ //for both passwors to match 

        // num_rows for if email is alrady exixts in database 
        $select = "SELECT * FROM `register_users` WHERE `email`= '$email'";
        $run = mysqli_query($conn, $select);
         if(mysqli_num_rows($run) > 0){
            ?>
            <script>alert('email already exists')</script>;
            <?php

             

         }
         else{
           
                   // here starts insert query 
                   $insert =" INSERT INTO `register_users`(`fname`, `lname`, `username`, `email`, `image`, `phone`, `birthday`, `gender`, `education`, `city`, `district`, `pincode`, `password`) VALUES('$fname', '$lname', '$username', '$email', '$image', '$phone', '$birthday', '$gender', '$education', '$city', '$district', '$pincode', '$password')";
                   $query_run = mysqli_query($conn, $insert);
                   
                   if($query_run){
                       ?>
                       <script>alert('your data has been submitted :-) ')</script>
                       <?php
                   }
         }

    }
    else{
        echo "password does not match :-( !!";
    }
}
else{
    echo "<script> please fill empty entries ! </script>";
   
}
   
}

?>

<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title> REGISTER_form</title>
<!--Bootstrap css-->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!--/Bootstrap css-->
  <link href="css/mycss.css" rel='stylesheet' type='text/css'>
  <link href="css/set2.css" rel='stylesheet' type='text/css'>
  <style >
    .d-flex{
        display:inline-flex;
    }

  </style>
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
                  <a href="log_out_admin.php
                  " class="pull-right text-decoration-none fs-3" style="font-size: 16px;"> LOG OUT </a>
                  <div class="clearfix"></div>
               </div>
               <div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     &nbsp; 
                  </div>
                  <div class="col-lg-12 col-md-3 col-sm-3 col-xs-12">
                     <div class="panel panel-default">
                        <div class="panel-body">
                        <form  method="post" enctype="multipart/form-data" >
                            <div class="d-flex w-100">
                                <div class="w-75"> 
                                    <div class="form-group d-flex">
                                    <label for="Name" class="fs-3 w-25">First Name:</label>
                                    <input type="text" class="form-control fs-3"  placeholder="Enter First Name" name="fname">
                                    </div>
                                    <div class="form-group d-flex">
                                    <label for="name" class="fs-3 w-25">Last Name:</label>
                                    <input type="text" class="form-control fs-3"  placeholder="Enter Last Name" name="lname">
                                    </div>
                                    <div class="form-group d-flex">
                                    <label for="username" class="fs-3 w-25">Username:</label>
                                    <input type="text" class="form-control fs-3"  placeholder="Enter Username" name="username">
                                    </div>
                                    <div class="form-group d-flex">
                                    <label for="email" class="fs-3 w-25">Email:</label>
                                    <input type="email" class="form-control fs-3 " id="email" placeholder="Enter email" name="email">
                                    </div>
                                </div>
                                <div class="w-25 m-3 p-5 pt-2">
                                    <!-- <div class=" mt-5"> -->
                                        <label for="email" class="fs-3 text-center">Profile Image:</label>
                                        <input type="file" name="image" class="fs-4">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <div class="d-flex w-100">
                                <div class="form-group d-flex w-50">
                                    <label for="email" class="fs-3 w-25 me-5 pe-3">Phone:</label>
                                    <input type="number" minlength="10" maxlength="10" class="form-control fs-3 ms-5"  placeholder="Enter Your number " name="phone">
                                </div>
                                <div class="form-group d-flex w-50 ">
                                    <label for="email" class="fs-3 w-25 ms-5">Birthday :</label>
                                    <input type="date" class="form-control fs-3"  placeholder="Enter your birthday" name="birthday">
                                </div>
                            </div>
                            <div class=" d-flex">
                                <div class="form-group d-flex w-50 ">
                                    <label for="gender" class="fs-3  w-25">Gender:</label>
                                    <input type="radio" class="m-3 fs-3 ms-5" value="Male"   name="gender">
                                    <label for="gender" class="fs-3">Male</label>
                                    <input type="radio" class="m-3 fs-3" value="Female"   name="gender">
                                    <label for="gender" class="fs-3">Female</label>
                                    <input type="radio" class="m-3 fs-3" value="Other"   name="gender">
                                    <label for="email" class="fs-3">Other</label>
                                </div>
                                <div class="form-group d-flex w-50 ps-4">
                                    <label for="education" class="fs-3 m-3 ms-4">Education:</label>
                                    <input type="checkbox" class=" fs-3 m-3 ms-5 me-1" value="10th"  name="education[]">
                                    <label for="education" class="fs-3 m-3 me-5">10th</label>
                                    <input type="checkbox" class=" fs-3 m-3 me-1" value="12th"  name="education[]">
                                    <label for="education" class="fs-3 m-3 me-5 ">12th</label>
                                    <input type="checkbox" class=" fs-3 m-3 me-1" value="Graduation"  name="education[]">
                                    <label for="education" class="fs-3 m-3">Graduation</label>
                                </div>
                            </div>

                            <!-- further code for address part  -->
                            <div class="d-flex w-100">
                                <label for="address" class="fs-2 m-1 ms-1 me-5 pe-5"> Address :</label>
                                <!-- city code starts here  -->
                                <div class="form-group d-flex w-25 ms-4">
                                    <label for="cityname" class="fs-3 m-2">City :</label>
                                    <select name="city"  value="" class=" fs-3 p-2 ps-3">
                                        <option value="" class="">Select your city</option>
                                        <option value="Dehradun" class="">Dehradun</option>
                                        <option value="Rudraprayag" class="">Rudraprayag</option>
                                        <option value="Srinagar" class="">Srinagar</option>
                                        <option value="Guptakashi" class="">Guptakashi</option>
                                    </select>
                                </div>
                                <!-- city code ends here  -->
                                <!-- distict code starts here  -->
                                <div class="form-group d-flex w-25">
                                    <label for="DistrictName" class="fs-3 m-2 ">District :</label>
                                    <select name="district" id="" class="fs-3 p-2 ">
                                        <option value="" class="">Select Your District</option>
                                        <option value="Dehradun" class="">Dehradun</option>
                                        <option value="Rudraprayag" class="">Rudraprayag</option>
                                        <option value="Pauri" class="">Pauri</option>
                                        <option value="Chamoli" class="">Chamoli</option>
                                        <option value="Haridwar" class="">Haridwar</option>
                                    </select>
                                </div>
                                <!-- district code ends here  -->
                                <!-- pincode/zipcode code starts here  -->
                                <div class="form-group d-flex w-25">
                                <label for="email" class="fs-3 m-2">Pincode:</label>
                                <input type="text" class="p-3 ms-4 fs-3 "  name="pincode" minlength="6" maxlength="6">
                                </div>
                                <!-- pincode/zipcode code ends here  -->
                            </div>
                            <!-- address code ends here  -->
                            <!-- password code starts here  -->
                            <div class="form-group  w-100">
                                <!-- password  -->
                                <div class="form-group d-flex w-75">
                                    <label for="pwd" class="fs-3 w-25">Password:</label>
                                    <input type="password" class="form-control fs-3"  placeholder="Enter password" name="password">
                                </div>
                                <!-- confirm password -->
                                <div class="form-group d-flex w-75">
                                    <label for="pwd" class="fs-3 w-25">Confirm Password:</label>
                                    <input type="password" class="form-control fs-3"placeholder="Confirm password" name="c_password">
                                </div>
                            </div>
                            <!-- password code ends here  -->
                            <button type="submit" class="btn btn-primary  fs-3" name="submit" value="">Submit</button>
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
		<!--footer-->
<div class="clearfix"></div>
  
  <div class="row panel-footer" style="background:#000; color:#FFF;">
    Copyright © 2022. <span class="pull-right"> Powered By <a href=""> Infonix Service Technology </a> </span>
  </div>
  
<!--/footer-->	
<!--/Top Bar-->


</body>
</html>