<?php
// session_start();
include('conflict/connection.php');
$id = $_REQUEST['id'];

$select = "SELECT * FROM `register_users` WHERE `id` = '$id'";

$querry = mysqli_query($conn, $select);
 $data = mysqli_fetch_array($querry);
  $fname = $data['fname'];
  $lname = $data['lname'];
  $username = $data['username'];
  $email = $data['email'];
  $image = $data['image'];
  $phone = $data['phone'];
  $birthday = $data['birthday'];
  $gender = $data['gender'];
  $education = explode(",", $data['education']);
  $city = $data['city'];
  $district = $data['district'];
  $pincode = $data['pincode'];
  $password = $data['password'];
  $c_password = $data['password'];

  if(isset($_POST['update'])){
        $my_fname = trim(ucwords(mysqli_real_escape_string($conn, $_POST['my_fname'])));
        $my_lname = trim(ucwords(mysqli_real_escape_string($conn,$_POST['my_lname'])));
        $my_username = $_POST['my_username'];
        if($my_username ==""){
            $my_username = $my_fname.rand(20,500);
        }
        $my_email = $_POST['my_email'];

        $filename = $_FILES['my_image']['name'];
        $tempname = $_FILES['my_image']['tmp_name'];
        if(empty($filename)){
            $my_image = $image;
        }
        else{
        $my_image = "./images/" . $filename;
        }
        move_uploaded_file($tempname, $my_image);
        
        $my_phone = mysqli_real_escape_string($conn, $_POST['my_phone']);
        $my_birthday = mysqli_real_escape_string($conn, $_POST['my_birthday']);
        $my_gender = mysqli_real_escape_string($conn, $_POST['my_gender']);
        $my_education = implode(",",$_POST['my_education']);
        $my_city = mysqli_real_escape_string($conn, $_POST['my_city']);
        $my_district = mysqli_real_escape_string($conn, $_POST['my_district']);
        $my_pincode = mysqli_real_escape_string($conn, $_POST['my_pincode']);
        $my_password = md5(mysqli_real_escape_string($conn, $_POST['my_password']));
        $my_c_password = md5(mysqli_real_escape_string($conn, $_POST['my_c_password']));

        if($my_fname !="" && $my_lname !="" && $my_email !="" && $my_phone !="" && $my_pincode !="" && $my_password !="" ){

            if($my_password == $my_c_password){

        $update ="UPDATE `register_users` SET `fname`='$my_fname', `lname`='$my_lname', `username`='$my_username', `email`='$my_email', `image`='$my_image', `phone`='$my_phone', `birthday`='$my_birthday', `gender`='$my_gender', `education`='$my_education', `city`='$my_city', `district`='$my_district', `pincode`='$my_pincode', `password`='$my_password' WHERE `id`='$id'";

        $query_run = mysqli_query($conn, $update);
        if($query_run){
            header("Location: user_profile.php?Updated=message");
        }
      }
      else{
           ?> 
           <script> alert('confirm password does not match ')</script>;
          <?php  
      }
    }
    else{
        echo "<script> alert('please fill the empty entries !!')</script>";
    }
  }

?>
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title>UPDATE_user</title>
<!--Bootstrap css-->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                  <a href="log_out_admin.php" class="pull-right text-decoration-none fs-3" style="font-size: 16px;"> LOG OUT </a>
                  <div class="clearfix"></div>
               </div>
               <div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     &nbsp; 
                  </div>
                  <div class="col-lg-12 col-md-3 col-sm-3 col-xs-12">
                     <div class="panel panel-default">
                        <div class="panel-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="d-flex w-100">
                                <div class="w-75"> 
                                    <div class="form-group d-flex">
                                    <label for="Name" class="fs-3 w-25">First Name:</label>
                                    <input type="text" class="form-control fs-3"  placeholder="Enter First Name" name="my_fname" value="<?php echo $fname; ?>">
                                    </div>
                                    <div class="form-group d-flex">
                                    <label for="name" class="fs-3 w-25">Last Name:</label>
                                    <input type="text" class="form-control fs-3"  placeholder="Enter Last Name" name="my_lname" value="<?php echo $lname; ?>">
                                    </div>
                                    <div class="form-group d-flex">
                                    <label for="username" class="fs-3 w-25">Username:</label>
                                    <input type="text" class="form-control fs-3"  placeholder="Enter Username" name="my_username" value="<?php echo $username ; ?>">
                                    </div>
                                    <div class="form-group d-flex">
                                    <label for="email" class="fs-3 w-25">Email:</label>
                                    <input type="email" class="form-control fs-3 " id="email" placeholder="Enter email" name="my_email" value="<?php echo $email ; ?>">
                                    </div>
                                </div>
                                <div class="w-25 m-3  mt-0 ">
                                    <div class="form-group ">
                                        <div class="m-2 p-3 text-center">
                                            <img src="<?php echo $image ;  ?>" alt="" class="" height="150px" width="130px" >
                                        </div>
                                        <input type="file" class="form-control fs-3" name="my_image">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex w-100">
                                <div class="form-group d-flex w-50">
                                    <label for="email" class="fs-3 w-25 me-5 pe-3">Phone:</label>
                                    <input type="number" minlength="10" maxlength="11" class="form-control fs-3 ms-5"  placeholder="Enter Your number " name="my_phone" value="<?php echo $phone; ?>">
                                </div>
                                <div class="form-group d-flex w-50 ">
                                    <label for="email" class="fs-3 w-25 ms-5">Birthday :</label>
                                    <input type="date" class="form-control fs-3"  placeholder="Enter your birthday" name="my_birthday" value="<?php echo $birthday; ?>">
                                </div>
                            </div>
                            <div class=" d-flex">
                                <div class="form-group d-flex w-50 ">
                                    <label for="gender" class="fs-3  w-25">Gender:</label>
                                    <input type="radio" class="m-3 fs-3 ms-5"    name="my_gender" value="Male"<?php  if($gender == 'Male') { echo 'checked="checked"';} ?> >
                                    <label for="gender" class="fs-3">Male</label>
                                    <input type="radio" class="m-3 fs-3"   name="my_gender" value="Female"<?php  if($gender == 'Female') { echo 'checked="checked"';} ?>>
                                    <label for="gender" class="fs-3">Female</label>
                                    <input type="radio" class="m-3 fs-3"   name="my_gender" value="Other"<?php  if($gender == 'Other') { echo 'checked="checked"';} ?> >
                                    <label for="email" class="fs-3">Other</label>
                                </div>
                                <div class="form-group d-flex w-50 ps-4">
                                    <label for="education" class="fs-3 m-3 ms-4">Education:</label>
                                    <input type="checkbox" class=" fs-3 m-3 ms-5 me-1" value="10th"<?php if(in_array('10th', $education)) echo 'checked="checked"'; ?>  name="my_education[]">
                                    <label for="education" class="fs-3 m-3 me-5">10th</label>
                                    <input type="checkbox" class=" fs-3 m-3 me-1" value="12th"<?php if(in_array('12th', $education)) echo 'checked="checked"'; ?>  name="my_education[]">
                                    <label for="education" class="fs-3 m-3 me-5 ">12th</label>
                                    <input type="checkbox" class=" fs-3 m-3 me-1" value="Graduation"<?php if(in_array('Graduation', $education)) echo 'checked="checked"'; ?>  name="my_education[]">
                                    <label for="education" class="fs-3 m-3">Graduation</label>
                                </div>
                            </div>

                            <!-- further code for address part  -->
                            <div class="d-flex w-100">
                                <label for="address" class="fs-2 m-1 ms-1 me-5 pe-5"> Address :</label>
                                <!-- city code starts here  -->
                                <div class="form-group d-flex w-25 ms-4">
                                    <label for="cityname" class="fs-3 m-2">City :</label>
                                    <select name="my_city"  value="" class=" fs-3 p-2 ps-3">
                                        <option value="" class="">Select your city</option>
                                        <option value="Dehradun"<?php if($city == 'Dehradun') echo 'selected="selected"'; ?> class="">Dehradun</option>
                                        <option value="Rudraprayag"<?php if($city == 'Rudraprayag') echo 'selected="selected"'; ?> class="">Rudraprayag</option>
                                        <option value="Srinagar"<?php if($city == 'Srinagar') echo 'selected="selected"'; ?> class="">Srinagar</option>
                                        <option value="Guptakashi"<?php if($city == 'Guptakashi') echo 'selected="selected"'; ?> class="">Guptakashi</option>
                                    </select>
                                </div>
                                <!-- city code ends here  -->
                                <!-- distict code starts here  -->
                                <div class="form-group d-flex w-25">
                                    <label for="DistrictName" class="fs-3 m-2 ">District :</label>
                                    <select name="my_district" id="" class="fs-3 p-2 ">
                                        <option value="" class="">Select Your District</option>
                                        <option value="Dehradun"<?php if($district == 'Dehradun') echo 'selected="selected"'; ?> class="">Dehradun</option>
                                        <option value="Rudraprayag"<?php if($district == 'Rudraprayag') echo 'selected="selected"'; ?> class="">Rudraprayag</option>
                                        <option value="Pauri"<?php if($district == 'Pauri') echo 'selected="selected"'; ?> class="">Pauri</option>
                                        <option value="Chamoli"<?php if($district == 'Chamoli') echo 'selected="selected"'; ?> class="">Chamoli</option>
                                        <option value="Haridwar"<?php if($district == 'Haridwar') echo 'selected="selected"'; ?> class="">Haridwar</option>
                                    </select>
                                </div>
                                <!-- district code ends here  -->
                                <!-- pincode/zipcode code starts here  -->
                                <div class="form-group d-flex w-25">
                                <label for="email" class="fs-3 m-2">Pincode:</label>
                                <input type="text" class="p-2 ms-4 fs-3 "  name="my_pincode" minlength="6" maxlength="6" value="<?php echo $pincode ; ?>">
                                </div>
                                <!-- pincode/zipcode code ends here  -->
                            </div>
                            <!-- address code ends here  -->
                            <!-- password code starts here  -->
                            <div class="form-group  w-100">
                                <!-- password  -->
                                <div class="form-group d-flex w-75">
                                    <label for="pwd" class="fs-3 w-25">Password:</label>
                                    <input type="password" class="form-control fs-3" id="pwd" placeholder="Enter password" name="my_password" value="<?php echo $password ;?>">
                                </div>
                                <!-- confirm password -->
                                <div class="form-group d-flex w-75">
                                    <label for="pwd" class="fs-3 w-25">Confirm Password:</label>
                                    <input type="password" class="form-control fs-3" id="pwd" placeholder="Confirm password" name="my_c_password" value="<?php echo $c_password; ?>">
                                </div>
                            </div>
                            <!-- password code ends here  -->
                            <button type="submit" class="btn btn-primary  fs-3" name="update" value="">Update</button>
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