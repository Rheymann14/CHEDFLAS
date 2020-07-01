
<?php include 'filesLogic.php';?>

<?php 

//session_start(); 

if (!isset($_SESSION['username'])) {
$_SESSION['msg'] = "You must log in first";
header('location: login.php');
}
if (isset($_SESSION['usertype'])) {

  }
}

if (isset($_GET['logout'])) {
session_destroy();
 unset($_SESSION['username']);
header("location: login.php");
}


?>

<!DOCTYPE html>

<html lang="en">

<head>

<title>CHEDFLAS - CHED Flexible Learning Assessment System</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" type="image/x-icon" href="images/logo.ico"/>
<link href="css/navbarstyle.css" rel="stylesheet">
<link href="css/dropdown.css" rel="stylesheet">
<link href="css/hero.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="topnav" id="myTopnav">

<div class="dropdown">
<?php if (isset($_SESSION['success'])) : ?>
                                   
<?php 
                                 
unset($_SESSION['success']);
?>
                                     
<?php endif ?>
<?php  if (isset($_SESSION['username'])) : ?>
<button onclick="home()" class="dropbtn">Welcome <strong><?php echo $_SESSION['username']; ?></strong><?php endif ?> &nbsp
<i class="fa fa-caret-down"></i>
</button>

<div class="dropdown-content">

<a href="signup.php">User Registration</a>


</div>
</div> 
<a onclick="school()" class="nav-link">Registered Schools</a>	
<a onclick="userreg()" class="nav-link">Registered Supervisors</a>


<script>
function userreg() {
  document.getElementById("myFrame").src = "userreg.php";
}
function home() {
  document.getElementById("myFrame").src = "dashboard/dash.php";
}
function school() {
  document.getElementById("myFrame").src = "schoolist2.php";
}
</script>


<a href="index.php?logout='1'" onclick="javascript:return confirm('Are you sure you want to log out?');" style="float:right;">Logout</a>

<!-- <a href="schoolist2.php">Registered Schools</a> -->

<a href="javascript:void(0);" class="icon" onclick="myFunction()">

<i class="fa fa-bars"></i>


</a>

</div>

<!-- <div class="logo_area">
<a><img src="images/logo.png" alt="" width="100" height="100"></a>
</div>

<div class="hero img">
<a><img src="images/logoname.png" alt="" height="60"></a>
</div>

<div id="grad1"> -->
	


	<iframe id="myFrame" src="dashboard/dash.php" width="1520" height="768"></iframe>
<!-- </div> -->
<!-- <div class="content">

<div class="container">
<div class="row">
<form action="index.php" method="post" enctype="multipart/form-data" >

<h3>Upload File</h3>
<input type="file" name="myfile"><br>
<button type="submit" name="save">upload</button>
<p><?php
//echo $test


?></p>


</form>
</div>
</div> -->

<script>
function myFunction() {
var x = document.getElementById("myTopnav");
if (x.className === "topnav") {
x.className += " responsive";
} else {
x.className = "topnav";
}
}
</script>

</body>

</html>