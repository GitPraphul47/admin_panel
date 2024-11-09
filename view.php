<?php
// session_start();
include('conflict/connection.php'); 

  // if(isset($_POST['edit'])){
  //   $id = $_id['id'];
    
  //   $select1 = "SELECT * FROM `register_users` WHERE `id`='$id'";
  
  //   $run2 = mysqli_query($conn, $select1);
  //   $data1 = mysqli_fetch_array($run2);
  
  //   // $id = $data['id'];
  
  //   $_SESSION['id'] = $data1['id'];
  
  //   if(mysqli_num_rows($run)){
  //     header('Location:update.php');
  //   }
  
  
  // }

  if($_GET['Updated']=='updated'){
    echo '<script type="text/javascript">alert("updated");</script>' ;
  }

//   else {

//   }


?>
<?php 
      

  


?>

<!DOCTYPE html>
<html>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <head>
      <title>VIEW_table_users</title>
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
      <!--Dropdown discription js-->
   </head>
   <body>
      <!--Top Bar-->
      <section>
         <div class="row">
            <div class="">
               <?php require('include/menu-navigation.php'); ?>
               <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" style="padding:0;background:#e7e7e7;">
                  <div class="page-wrapper">
                     <div id="menu" style="padding:17px;background:#3c8dbc;">
                        <a href="log_out_admin.php" class="pull-right text-decoration-none ms-5" style="font-size: 16px;"> LOG OUT </a>
                        <div class="pull-right text-decoration-none me-5 p-0" >
                           <nav class="navbar navbar-light ">
                              <form class="form-inline" method="post">
                                 <input class="form-control  m-0" type="search" placeholder="Search" aria-label="Search" name="search_input">
                                 <button class="btn btn-outline-success   m-0" type="submit" name="search">Search</button>
                              </form>
                           </nav>
                     
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div  class="bg-">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           &nbsp; 
                        </div>
                        <div class="page-wrapper">
                           <div class="content container-fluid">
                              <div class="page-header">
                                 <div class="row align-items-center">
                                    <div class="col">
                                       <div class="mt-5">
                                          <h4 class="card-title float-left mt-2 ">VIEW ALL USERS</h4>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <table class="table table-striped">
                                 <thead  class="thead-dark">
                                    <tr class="h-25">
                                       <th scope="col" class="fs-3" >S.no</th>
                                       <th scope="col" class="fs-3" >img</th>
                                       <th scope="col" class="fs-3" >Name</th>
                                       <th scope="col" class="fs-3" >Username</th>
                                       <th scope="col" class="fs-3" >Email</th>
                                       <th scope="col" class="fs-3" >Phone</th>
                                       <!-- <th scope="col" class="fs-3" > Birthday </th>
                                       <th scope="col" class="fs-3" >Gender</th>
                                       <th scope="col" class="fs-3" >Education</th> -->
                                       <th scope="col" class="fs-3" >Address</th>
                                       <th scope="col" class="fs-3" >Password</th>
                                       <th scope="col" class="fs-3" >Update & Delete</th>
                                    </tr>
                                 </thead>
                                 <tbody class="table-stripped table-info">
                                    <tr class="table-primary">
                                      <?php
                                        $s = 1;
                                         // total number of results you want at the page 
                                         $page_results = 2 ;
                                        
                                         // page number visitor is currently on  
                                           if (isset($_GET['page']) ) {  
                                              $page = $_GET['page'];  
                                        } else {  
                                             $page = 1;   
                                        }  
                                        // LIMIT starting number for the results on the displayin page 
                                        $first_page = ($page-1) * $page_results ;

                                        if(isset($_REQUEST['search'])){

                                          $search = $_POST['search_input'];
                                 
                                          $select = "SELECT * FROM `register_users` WHERE `email` LIKE '%$search%' OR `fname` LIKE '%$search' OR `phone` LIKE '%$search%' LIMIT {$first_page},{$page_results}";
                                           $run = mysqli_query($conn, $select);
                                          
                                        }
                                       else {
                                         


                                          $select = "SELECT * FROM `register_users` LIMIT {$first_page},{$page_results} ";}
                                          $run = mysqli_query($conn, $select);
                                          while($data = mysqli_fetch_array($run)){
                                            $id = $data['id'];
                                              $image = $data['image'];
                                              $fname = $data['fname'];
                                              $lname = $data['lname'];
                                              $username = $data['username'];
                                              $email = $data['email'];
                                              $phone = $data['phone'];
                                             //  $birthday = $data['birthday'];
                                             //  $gender = $data['gender'];
                                             //  $education = $data['education'];
                                              $city = $data['city'];
                                              $district = $data['district'];
                                              $pincode = $data['pincode'];
                                              $password = $data['password'];

                                         
                                      ?>
                                      <td class="fs-4"><?php echo $s ; ?></td>
                                      <td class="fs-4"><img src="<?php echo $image ;?>" alt="" class="h-50 w-50"></td>
                                      <td class="fs-4"><?php echo $fname." ".$lname ; ?></td>
                                      <td class="fs-4"><?php echo $username ; ?></td>
                                      <td class="fs-4"><?php echo $email ; ?></td>
                                      <td class="fs-4"><?php echo $phone ; ?></td>
                                      <!-- <td class="fs-4"><?php //echo $birthday ; ?></td>
                                      <td class="fs-4"><?php //echo $gender ; ?></td>
                                      <td class="fs-4"><?php //echo $education ; ?></td> -->
                                      <td class="fs-4"><?php echo $city.",<br>".$district.",<br>".$pincode ; ?></td>
                                      <td class="fs-4"><?php echo $password ; ?></td>
                                      <td class="fs-4">
                                        <button class="btn p-0" name="edit" type="submit"><a href="update_admin.php?id=<?php echo $id; ?>" class="text-decoration-none text-success"><i class="fa fa-edit fs-2 m-0 "></i> </a></button> <br>
                                        <button class="btn p-0" name="delete" type="submit"><a href="delte.php?id=<?php echo $id; ?>" class="text-decoration-none "><i class="fa fa-trash text-danger fs-2 m-0 "></i> </a></button>
                                      </td>
                                    </tr>
                                    <?php
                                        $s++; 
                                          }
                                    ?>
                                    <tr class=" mt-5 p-0 text-center w-50 ">
                                       <td class="m-0 p-0 position-relative" colspan="4"></td>
                                       <td class="m-0 p-0 position-relative ps-5" colspan="2">
                                          <?php
                                             
                                        

                                             // fetching data from databse 
                                             $fetch_data = "SELECT * FROM `register_users`";
                                             $run_page = mysqli_query($conn, $fetch_data);
                                            if(mysqli_num_rows($run_page)> 0){
                                             $total = mysqli_num_rows($run_page) ;

                                             // find  the total number of pages
                                        $number_of_page = ceil($total/$page_results);

                                            }
                                          



                                      echo '<ul class="pagination m-0    ms-3 ">';
                                      if($page >= 2){
                                       echo '<li class="page-item" name=""><a class="page-link" href="view.php?page='.($page-1).'">Prev</a></li>';
                                      }
                                         

                                      for($i = 1 ; $i <= $number_of_page; $i++){
                                        echo     '<li class="page-item"><a class="page-link" href="view.php?page='.$i.'">'. $i.'</a></li>';

                                      }
                                      if($page < $number_of_page){
                                       echo '<li class="page-item" name=""><a class="page-link" href="view.php?page='.($page+1).'">Next</a></li>';
                                      }
                                              
                                        echo  '</ul>';

                                          ?>
                                       </td>
                                       <td class="m-0 p-0 position-relative" colspan="3"></td>
                                    </tr>

                                 </tbody>
                              </table>
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
   </body>
</html>