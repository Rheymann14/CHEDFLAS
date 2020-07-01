<?php include 'filesLogic.php'; ?>
<?php include('uploadmodal.php'); ?>
<?php include('notification/functions.php'); ?>
<?php
if (!isset($_SESSION['username'])) {
$_SESSION['msg'] = "You must log in first";
header('location: login.php');
}
if (isset($_SESSION['usertype'])) {
  if ($_SESSION['usertype'] != 'school') {
    header('location: login.php');
  }
}

if (isset($_GET['logout'])) {
session_destroy();
// unset($_SESSION['username']);
header("location: login.php");
}
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" type="image/x-icon" href="images/logo.ico"/>
<link href="css/navbarstyle.css" rel="stylesheet">
<link href="css/dropdown.css" rel="stylesheet">
<link href="css/hero.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/pdfmodal.css">


<title>CHEDFLAS - School Archive</title>

<link rel="shortcut icon" href="images/favicon.ico">

</head>

<body>

<style>

table {
position: absolute;
border-collapse: collapse;
margin-left: 230px;
width: 70%;
margin-top: 200px;
}

th, td {
text-align: center;
padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
background-color: #0c2245;
color: white;
}



h4{
text-align: center;

}


.btn-sm1 {background-color: #f44336;}

.notif{
  margin-right: 50px;
  margin-top: 10px;
  position: static;
  float: right;
}


</style>


<div class="topnav" id="myTopnav">

<div class="dropdown">
<?php if (isset($_SESSION['success'])) : ?>
                                   
<?php 
                                 
unset($_SESSION['success']);
?>
                                     
<?php endif ?>
<?php  if (isset($_SESSION['username'])) : ?>
<button class="dropbtn" >Welcome <strong><?php echo $_SESSION['username']; ?></strong><?php endif ?> &nbsp

</button>

</div> 
  
      
<a href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notification <?php
                $query = "SELECT * from `notifications` where `status` = 'unread' order by `date` DESC";
                if(count(fetchAll($query))>0){
                ?>
                <span class="badge badge-light"><?php echo count(fetchAll($query)); ?></span>
              <?php
                }
                    ?>
</a>

  <div class="dropdown-menu" aria-labelledby="dropdown01">
                <?php
                $query = "SELECT * from `notifications` order by `date` DESC";
                 if(count(fetchAll($query))>0){
                     foreach(fetchAll($query) as $i){
                ?>
              <a style ="
                         <?php
                            if($i['status']=='unread'){
                                echo "font-weight:bold;";
                            }
                         ?>
                         " class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter" href="view.php?id=<?php echo $i['id'] ?>">
                <small><i><?php echo date('F j, Y, g:i a',strtotime($i['date'])) ?></i></small><br/>
                  <?php 
                  
                if($i['type']=='comment'){
                    echo "Feedback Received";
                    echo $i['id'];
                }else if($i['type']=='like'){
                    echo ucfirst($i['name'])." liked your post.";
                }
                  
                  ?>
                </a>
              <div class="dropdown-divider"></div>
                <?php
                     }
                 }else{
                     echo "&nbsp No Feedback yet.";
                 }
                     ?>
            </div>




<a type="button"  data-toggle="modal" data-target="#addnew1">Upload File</a> 
<a href="index.php?logout='1'"onclick="javascript:return confirm('Are you sure you want to log out?');" style="float: right;">Logout</a>
<a href="javascript:void(0);" class="icon" onclick="myFunction()">

<i class="fa fa-bars"></i>

</a>

</div>





<div id="grad1">

<!-- <div align="right" class="notif">
  

<button type="button"  data-toggle="modal" data-target="#addnew1" class="btn btn-primary">Upload File</button> 
<button type="button" class="btn btn-success">Notification <i class="fa fa-bell" aria-hidden="true"> <i id="noti_number"></i></i></button>
</div>
 -->
<iframe src="schoolend.php" width="1520" height="768"></iframe>
</div>



<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
   
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</body>



</html>
<script>
  $(document).ready(function (){
    // alert()
    $("#tablefiles").on('click', 'tr', function (){
      // alert($(this).closest('tr').find('td:nth-child(1)').text())
      // alert($(this).closest('tr').find('td:nth-child(1)').text())
      $("#showDocument").attr('src', 'Uploads/' + $(this).closest('tr').find('td:nth-child(2)').text().split('.').slice(0, -1).join('.') + '.pdf')
    })
    // $("#modalDocoment").on('show.bs.modal', function (){
      
    // })

  })
</script>

<!-- <script type="text/javascript">
 function loadDoc() {
  

  setInterval(function(){

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("noti_number").innerHTML = this.responseText;
    }
   };
   xhttp.open("GET", "data.php", true);
   xhttp.send();

  },1000);


 }
 loadDoc();
</script> -->

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

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

   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>