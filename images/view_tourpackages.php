<?php
ob_start();
session_start();
include('config/connection_config.php');

if(isset($_POST['not_hot']))
{   $hotid = $_POST['hotid']; 
	mysqli_query($con,"update using_tb set hot='1' where id='".$hotid."'");
    header("location:view_tourpackages.php");
	exit();	
}
else
if(isset($_POST['hot']))
{   $hotid = $_POST['hotid']; 
    mysqli_query($con,"update using_tb set `hot` =  '0' where id='".$hotid."'");
	if($con){
	mysqli_query($con,"update using_tb set `date_time` =  '000-00-00 00:00:00' where id='".$hotid."'");
	}
	
    header("location:view_tourpackages.php");
	exit();	
}
?>

<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title>View Tour Packages, Admin Panel</title>
<!--Bootstrap css-->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css'>
<!--/Bootstrap css-->
<!--Dropdown discription js-->
    <script type="text/javascript" src="js/left-dropdown/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/left-dropdown/bootstrap.min.js"></script>
<!--Dropdown discription js-->
<!--our css-->
  <link href="css/mycss.css" rel='stylesheet' type='text/css'>
<!--/our css-->
<!-- JQUERY ON/OFF BTN-->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script type="text/javascript">
	// JQUERY: Plugin "autoSumbit"
	(function($) {
		$.fn.autoSubmit = function(options) {
			return $.each(this, function() {
				// VARIABLES: Input-specific
				var input = $(this);
				var column = input.attr('name');
	
				// VARIABLES: Form-specific
				var form = input.parents('form');
				var method = form.attr('method');
				var action = form.attr('action');

				// VARIABLES: Where to update in database
				var where_val = form.find('#where').val();
				var where_col = form.find('#where').attr('name');
	
				// ONBLUR: Dynamic value send through Ajax
				input.bind('blur', function(event) {
					// Get latest value
					var value = input.val();
					// AJAX: Send values
					$.ajax({
						url: action,
						type: method,
						data: {
							val: value,
							col: column,
							w_col: where_col,
							w_val: where_val
						},
						cache: false,
						timeout: 10000,
						success: function(data) {
							// Alert if update failed
							if (data) {
								alert(data);
							}
							// Load output into a P
							else {
								$('#notice').text('Updated');
								$('#notice').fadeOut().fadeIn();
							}
						}
					});
					// Prevent normal submission of form
					return false;
				})
			});
		}
	})(jQuery);
	// JQUERY: Run .autoSubmit() on all INPUT fields within form
	$(function(){
		$('#ajax-form INPUT').autoSubmit();
	});
	</script>
<!-- /JQUERY ON/OFF BTN-->
</head>
<style type="text/css">
span.glyphicon.glyphicon-pencil{color:green;}
span.glyphicon.glyphicon-remove{color:red;}
.panel{background-image: linear-gradient(to bottom,orange 0,darkorange 100%);}
.panel-body {
    padding: 20px;
    background: white;
margin: 5px 20px 20px 20px;}
h2{color:white}
span.label.label-sm.label-danger a {
    color: white;
font-size: 12px;}
th {
    font-size: 15px;
}
td {
    font-size: 15px;
}
form {
    margin: 0;
    padding: 0; background:none;
}
input.btn.btn-danger, input.btn.btn-success{    padding: .2em .6em .3em;font-size: 10px;
    font-weight: bold;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25em;}
	</style>
	
<!--Top Bar-->
<section>
  <div class="row">
    <div class="">
	
      <?php require('include/menu-navigation.php'); ?>
	  
	  <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" style="padding:0;background:#e7e7e7;">
        
		<div>
    <div id="menu" style="padding:14px;background:#3c8dbc;">
	   <a href="Log-Out.php" class="pull-right"> log out </a>
     <div class="clearfix"></div>
	</div> 
 	
    <div>
	
        <div class="col-md-12"> <br>
        <div class="panel panel-violet">
        <div class="panel-heading clearfix">
		<h2 class="pull-left">View Tour Packages </h2>
		<form action="view_tourpackages.php" id="search_form" method="GET">
		<p><input name="keyword" placeholder="search keyword" autocomplete="off" id="list_search" type="search" required class="search form-control pull-right" style="width: 250px;;"/></p>
		</form> 
		</div>
		<div class="panel-body">
			<div style="overflow: scroll;height: 600px;">
			<table class="table table-hover table-striped">
				<thead>
	<tr>
		<th>Tour Id</th>
		<th>Tour Name</th>
		<th>Hot/Note Hote</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>
	<tr>
<?php
if(isset($_GET['keyword'])){
	$keyword = $_GET['keyword'];
    $q = "Select * from using_tb where tour_id LIKE '%$keyword%' && main_category='Tour Packages' order by date_time desc";  
	}else{
	$q = "Select * from using_tb where tour_category='Tour Packages' order by date_time desc";
    }
$run = mysqli_query($con,$q);
while($row = mysqli_fetch_array($run)){
$id = $row['id'];
$tour_id = $row['tour_id'];
$hot = $row['hot'];
$home = $row['home'];
?>  
  
		<td><?php  echo $id; ?></td>
		<td><a data-toggle="collapse" data-parent="#accordion" href="#<?php  echo $id; ?>" class="pull-left" style="margin: 0 5px 0 0;">
			 <center> <h6 class="label label-danger"> view</h6> </center> 
		</a>
		<?php  $sql = "Select * from tour_tb where id='$tour_id' ";
		$row = mysqli_fetch_assoc( mysqli_query($con, $sql) );
		echo $title = $row['tour_name']; ?>
		</td>
		<td> 
		  <center>
		      <?php 
			   if(($hot=='0') || ($hot=='')) 
				{
					?>
                    <form action="" method="post">
					  <input class="hide" type="text" name="hotid" value="<?php echo $id; ?>">
					  <input class="btn btn-danger" type="submit" name="not_hot" value="Not Hot">
					</form>
					
					<?php
					
				}
				else{
					
						?>

					<form action="" method="post">
					  <input class="hide"  type="text" name="hotid" value="<?php echo $id; ?>">
					  <input class="btn btn-success" type="submit" name="hot" value="hot">
					</form>
					
					<?php
				}


?>
		<form id="ajax-form" class="autosubmit" method="POST" action="updated-toggle/ajax-update.php">
	    <?php if($home=='0'){ ?>
		<label class="switch">
		  <input type="checkbox" value="1" name="home">
		  <span class="slider round"></span>
		</label>
        <?php }else 
		 if($home=='1'){ ?>
		<label class="switch">
		  <input type="checkbox" value="0" name="home" checked>
		  <span class="slider round"></span>
		</label>
        <?php } ?>
		<input id="where" type="hidden" name="id" value="<?php echo $id; ?>" />
        </form>
		<p id="notice"></p>	   
		</center> 
			   
		</td>
		<td width="90">
		 <center> 
		    <a href="update_using.php?page_id=<?php echo $id;?>"> <img src="images/edit.png" width="20"> </a>  
          | <a href="view_tourpackages.php?del=<?php echo $id;?>" onclick="return confirm('Are you sure you want to remove this row?')"> <img src="images/delete.png" width="15"> </a>  
		  </center>
		</td>
	</tr>
    
	<tr>
	<td colspan="9" style="padding: 0;">
	<?php 	
	$sql = "Select * from tour_tb where id='$tour_id' ";
	$row = mysqli_fetch_assoc( mysqli_query($con, $sql) );
	$link = $row['link'];
	$tour_name = $row['tour_name'];
	$discription = $row['discription'];
	$banner_image = $row['banner_image'];
	$thumb_banner_image = $row['thumb_banner_image'];
	?> 
    <div class="panel-group" id="accordion">
		<div id="<?php  echo $id; ?>" class="panel-collapse collapse out">
		<div class="list-group" style="padding:10px;">
		
		<div class="clearfix"></div><br>
		
		<?php if(!$link=='') { ?>
		 <strong>link :</strong> <?php  echo $link; ?><br><br>
		<?php } ?>
		
		<?php if(!$title=='') { ?>
		 <strong>title:</strong> <?php  echo $title; ?><br><br>
		<?php } ?>
		
		<?php if(!$discription=='') { ?>
		<strong>Discription :</strong> <?php  echo $discription; ?>
		<?php } ?>
		</div>
		</div>
		</div>
	</td>
    </tr>							
	<?php
}
?>									
		
			</tbody>
		</table>
	</div>
	</div>
		</div>
		
</div>
			
		<!--footer-->
<div class="clearfix"></div>
  
  <div class="row panel-footer" style="background:#000; color:#FFF;">
    Copyright © 2016. <span class="pull-right"> Powered By <a href=""> Arc Solutions </a> </span>
  </div>
  
<!--/footer-->	
		
		</div>
		
      </div>
      
    </div>
	
      </div>
	  
    </div>
  </div>
</section>
<!--/Top Bar-->
    
<!-- keywrd seacching script -->
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script type="text/javascript">
$(document).ready(function(){
	$(document).on('keyup','#list_search',function(){   
		var value = $(this).val();
		$.getJSON('../ajax_search_list.php?keyword='+value, function (data) {
			var availableTags = data;
			$( "#list_search" ).autocomplete({
				source: availableTags,
				select: function(event, ui) {
				$(event.target).val(ui.item.value);
				$('#search_form').submit();
				return false;
			},
			 });
		});
		
	});
});
</script>
</body>
</html>
<?php
if(isset($_GET['del'])){
	$id = $_GET["del"];
	
    $d = "delete from using_tb where id=".$id;
	
    $del = mysqli_query($con,$d);
	if($del){		
       header("location:view_tourpackages.php?n=1");
	   exit();
	}

}

?>

<?php
 if(isset($_GET['n']))
 {
 if($_GET['n']==1)
 {
 ?>
 <script>alert("Row is deleted!");</script>
 <?php
 }
 }
 
 
 if(isset($_GET['u']))
 {
 if($_GET['u']==1)
 {
 ?>
 <script>alert("Row is updated!");</script>
 <?php
 }
 }

?>

<?php
 
ob_flush();

?>
