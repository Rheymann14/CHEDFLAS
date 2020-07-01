
<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<title>User Registration</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<link rel="shortcut icon" type="image/x-icon" href="images/logo.ico"/>
<link href="css/navbarstyle.css" rel="stylesheet">
<link href="css/dropdown.css" rel="stylesheet">
<link href="css/hero.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
<link rel="stylesheet" href="jquery.dataTables.min.css"></style>
<link rel="stylesheet" href="style.css">
<script type="text/javascript" src="jquery.dataTables.min.js"></script>


<style type="text/css">



.wrapper{
width: 1280px;
margin: 0 auto;
}
.page-header h2{
margin-top: 0;
}
table tr td:last-child a{
margin-right: 15px;
}
</style>

<script type="text/javascript">
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();   
$('#empTable').dataTable();

});




</script>

</head>

<body>

<div class="logo_area">
<a><img src="images/logo.png" alt="" width="100" height="100"></a>
</div>

<div class="hero img">
<a><img src="images/logoname.png" alt="" height="60"></a>
</div>

<div id="grad1">
	<a href="updateschool.php" class="btn btn-success " style="float: right; margin-right: 160px; margin-top: 50px;">Add New User</a>
	<!-- <a href="index.php" class="btn btn-default " style="float: right; margin-right: 5px; margin-top: 50px;">Home</a> -->
	<br>
	<br>

<br>	
<br>
<br>
<br>
<br>
<br>


	<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">



<div style="height:50px;"></div>
<table class="table table-striped table-bordered table-responsive table-hover" 
id="empTable" >
<thead style="background-color: #0c2245; color: #fff;" >
<th><center>UII</center></th>
<th><center>School Name</center></th>
<th><center>City/Municipality</center></th>
<th><center>Email</center></th>
<!--<th><center>Username</center></th>-->
<th><center>Action</center></th>
</thead>
<tbody>
<?php
include('database.php');
$result=$mysqli->query("select * from users");
while($row=$result->fetch_assoc()){
//$img = "profile_images/".$row['id']. ".jpg";
?>
<tr>
<!--<td> <img src='<?php echo $img ?>' height="50px" width="70px" /></td>-->
<td><?php echo $row['school_id']; ?></td>
<td><?php echo $row['schoolname']; ?></td>
<td><?php echo $row['city']; ?></td>
<td><?php echo $row['email']; ?></td>
<!--<td><?php echo $row['username']; ?></td>-->
<td>
<a href="#detail<?php echo $row['id']; ?>" 
data-toggle="modal" class="btn btn-primary btn-sm">
<span class="glyphicon glyphicon-eye-open">
</span> Detail</a>&nbsp;

<a href="#edit<?php echo $row['id']; ?>" 
data-toggle="modal" class="btn btn-warning btn-sm">
<span class="glyphicon glyphicon-edit">
</span> Edit</a>&nbsp;

<a href="#del<?php echo $row['id']; ?>" 
data-toggle="modal" class="btn btn-danger btn-sm">
<span class="glyphicon glyphicon-trash">
</span> Delete</a>

<!-- include edit modal -->
<?php include('show_detail_modal_users.php'); ?>
<?php include('show_edit_modal_users.php'); ?>
<?php include('show_delete_modal_users.php'); ?>
<!-- End -->
<!-- include edit modal -->

<!-- End -->
</td>
</tr>
<?php } ?>
</tbody>
</table>
<div class="fb-customerchat"
 page_id="136676453660489">
</div>
</div>



</div>
</div>
</div>

&nbsp 

</div>



</body>
  
</html>