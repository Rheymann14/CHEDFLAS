

<?php include 'filesLogicsup.php'; 
?>
<?php include('uploadmodal.php'); ?>
<?php

$tess=$_SESSION['username']; 

if (isset($_SESSION['usertype'])) {
  if ($_SESSION['usertype'] != 'supervisor') {
    header('location: login.php');
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

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" type="image/x-icon" href="images/logo.ico"/>
<link href="css/navbarstyle.css" rel="stylesheet">
<link href="css/dropdown.css" rel="stylesheet">
<link href="css/hero.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/pdfmodal.css">
<script src="jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap.min.css" />
<script src="bootstrap.min.js"></script>
<link rel="stylesheet" href="jquery.dataTables.min.css"></style>
<script type="text/javascript" src="jquery.dataTables.min.js"></script>
<script type="text/javascript" src="bootstrap-filestyle.min.js"> </script>
<link href="fonts.css" rel="stylesheet">

<title>CHEDFLAS - Supervisor Page</title>



<link rel="shortcut icon" type="image/x-icon" href="images/logo.ico"/>



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
th {
  text-align: center;
}
td{
  text-align: center;
}
.btn-sm1 {background-color: #f44336;}

.notif{
  margin-right: 50px;
  margin-top: 10px;
  position: static;
  float: right;
}

@media screen and (min-width: 1240px) {
.modal-dialog {
width: 1240px; 
}
.modal-sm {
width: 1240px; 
}
}
@media screen and (min-width: 1240px) {
.modal-lg {
width: 1240px; 
}
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
<!--  <a href="index.php?logout='1'" onclick="javascript:return confirm('Are you sure you want to log out?');" class="btn btn-danger " style=" float: right; margin-right: 80px; margin-top: 50px;">Logout</a> -->



<?php  if (isset($_SESSION['username'])) : ?>
<a href="index.php?logout='1'" onclick="javascript:return confirm('Are you sure you want to log out?');" class="btn btn-danger" style="font-family: verdana;   float: right; margin-right: 130px; margin-top: 50px; color: white;" data-toggle="tooltip" title="Logout">WELCOME <strong><?php echo $_SESSION['username']; ?></strong><?php endif ?> </a>

	<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">



<div style="height:130px;"></div>
<table class="table table-striped table-bordered table-responsive table-hover" 
id="empTable" >
<thead style="background-color: #0c2245; color: #fff;" >
<th>UII</th>
<th>School Name</th>
<th>Filename</th>
<!--<th>size (in mb)</th>-->
<th>Program</th>
<th>Document Type</th>

<th>Action</th>
</thead>
<tbody id="tablefiles">
<?php foreach ($files as $file): ?>


<tr>

<td><?php echo $file['uii']; ?></td>
<td><?php echo $file['schoolname']; ?></td>
<td><?php echo $file['name']; $_SESSION['filename'] = $file['name']; ?></td>
<!--<td><?php //echo floor($file['size'] / 1000) . ' KB'; ?></td>-->
<td><?php echo $file['program']; ?></td>
<td><?php echo $file['filetype']; ?></td>
<td>
  <a href="supervisorend.php?file_id=<?php echo $file['id'] ?>" class="btn btn-primary" style="margin:1px;"><span class="glyphicon glyphicon-download-alt" data-toggle="tooltip" title="Download"></span></a>

<button type="button"  data-toggle="modal" data-target="#modalDocument" class="btn btn-warning" style="margin:1px;"><span class="glyphicon glyphicon-modal-window" data-toggle="tooltip" title="View File"></span></button> 

<button onclick="document.getElementById('id01').style.display='block'" class="btn btn-success" style="margin:1px;"><span class="glyphicon glyphicon-comment" data-toggle="tooltip" title="Send Feedback"></span></button>


<div id="id01" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>Feedback</h2>
       <span id="docname" name="l"></span>





      </header>
      <div class="w3-container">
        <p>&nbsp</p>
 
        <form method="post" action="filesLogicsup.php">
         <textarea rows="20" cols="100" name="message" style="resize: none;"> </textarea>
          <button name="submit_feedback" id="submitFeedback" class="btn btn-success" style="float: right; margin-top: 10px; margin-bottom: 10px; margin-right: 25px;" type="submit">Send Feedback</button>
        </form>

         </div>
      <footer class="w3-container w3-teal">
        <p> </p>
      </footer>
    </div>
  </div>




</td>

</tr>

<?php endforeach; ?>

</tbody>
</table>
</div>


<div class="container" >

<div class="modal fade" id="modalDocument" role="dialog">
<div class="modal-dialog">
    
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title" align="center"><b>PDF VIEWER</b></h4>
</div>
<div class="modal-body">
<!-- <form id="formid"> -->
<!-- <input type="hidden" name="iddocument" id="iddocument" value=""> -->
<!-- </form> -->
<iframe id="showDocument"  src="Uploads/Curriculum.pdf" width="1200" height="640" > </iframe>
</div>
   
</div>     
</div>
</div>
</div>




<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Bleh
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>




<script>
// Tooltips Initialization
$(function () {
$('[data-toggle="tooltip"]').tooltip()
})
</script>


</body>



</html>
 <script>
  $(document).ready(function (){
    // alert()
    $("#tablefiles").on('click', 'tr', function (){
      // alert($(this).closest('tr').find('td:nth-child(1)').text())
       //alert($(this).closest('tr').find('td:nth-child(1)').text())
       var x;
       x=$(this).closest('tr').find('td:nth-child(2)').text();
       $("#docname").text(x);
       
      $("#showDocument").attr('src', 'phpword/pdf/' + $(this).closest('tr').find('td:nth-child(2)').text().split('.').slice(0, -1).join('.') + '.pdf')
    })
    // $("#modalDocoment").on('show.bs.modal', function (){
  
    // })
      // $("#submitFeedback").click(function (){
      //   alert();
      //   location.reload();
      // })
  })
</script>




