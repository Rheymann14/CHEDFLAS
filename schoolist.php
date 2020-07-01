<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<title>School List</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<link rel="shortcut icon" type="image/x-icon" href="images/logo.ico"/>
<link href="css/navbarstyle.css" rel="stylesheet">
<link href="css/dropdown.css" rel="stylesheet">
<link href="css/hero.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
<link rel="stylesheet" href="jquery.dataTables.min.css"></style>
<script type="text/javascript" src="jquery.dataTables.min.js"></script>


<style type="text/css">
.wrapper{
width: 1050px;
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

<div id="grad1"></div>

<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="page-header clearfix">
<h2 class="pull-left">Schools</h2>
<a href="signup.php" class="btn btn-success pull-right">Add New Schools</a>
<a href="curic.php" class="btn btn-success pull-right">Add New Schools</a>
</div>





<?php

// Include config file
require_once "server.php";
                    
// Attempt select query execution
$sql = "SELECT * FROM users";
if($result = mysqli_query($db, $sql)){
if(mysqli_num_rows($result) > 0){
echo "<table class='table table-bordered table-striped' id='empTable'>";
echo "<thead>";
echo "<tr>";
echo "<th>UII</th>";
echo "<th>School Name</th>";
echo "<th>City/Municipality</th>";
echo "<th>Email</th>";
echo "<th>Username</th>";
echo "<th>Password</th>";   
echo "<th>Action</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

while($row = mysqli_fetch_array($result)){

echo "<tr>";
echo "<td>" . $row['school_id'] . "</td>";
echo "<td>" . $row['schoolname'] . "</td>";
echo "<td>" . $row['city'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['password'] . "</td>";
echo "<td>";
echo "<a href='read.php?id=". $row['school_id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
echo "<a href='update.php?id=". $row['school_id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
echo "<a href='delete.php?id=". $row['school_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
echo "</td>";
echo "</tr>";
}
echo "</tbody>";                            
echo "</table>";

// Free result set
mysqli_free_result($result);
} else{
echo "<p class='lead'><em>No records were found.</em></p>";
}
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
 
// Close connection
mysqli_close($db);
?>
</div>
<a href="index.php" class="btn btn-success pull-left">Back</a>
               
</div>        
</div>
</div>

</body>

</html>