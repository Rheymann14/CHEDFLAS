<?php include 'filesLogic.php'; ?>
<?php include('uploadmodal.php'); ?>
<?php include('notification/functions.php'); ?>
<?php
if (!isset($_SESSION['username'])) {
$_SESSION['msg'] = "You must log in first";
header('location: login.php');
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



<link rel="shortcut icon" type="image/x-icon" href="images/logo.ico"/>

<link href="css/navbarstyle.css" rel="stylesheet">
<link href="css/dropdown.css" rel="stylesheet">
<link href="css/hero.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/pdfmodal.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
<link rel="stylesheet" href="jquery.dataTables.min.css"></style>
<script type="text/javascript" src="jquery.dataTables.min.js"></script>

<title>School End</title>







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


	<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">



<div style="height:210px;"></div>
<table class="table table-striped table-bordered table-responsive table-hover" 
id="empTable" >
<thead style="background-color: #0c2245; color: #fff;" >
<th>File ID</th>
<th>Filename</th>
<!--<th>size (in mb)</th>-->
<th>Program</th>
<th>Document Type</th>

<th>Action</th>
</thead>
<tbody id="tablefiles">
<?php foreach ($files as $file): ?>


<tr>


<td><?php echo $file['id']; ?></td>
<td><?php echo $file['name']; ?></td>
<!--<td><?php //echo floor($file['size'] / 1000) . ' KB'; ?></td>-->

<td><?php echo $file['program']; ?></td>

<td><?php echo $file['filetype']; ?></td>
<td><a href="phpword/docs/<?php echo $file['name']; ?>" class="btn btn-primary" style="margin:1px;"><span class="glyphicon glyphicon-download-alt" data-toggle="tooltip" data-placement="top" title="Download"></span></a>

<a href="#del<?php echo $file['id']; ?>" data-toggle="modal" class="btn btn-danger" style="margin:1px;"><span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="top" title="Delete"></span></a>






<?php include('show_delete_modal_school.php'); ?>


</td>

</tr>

<?php endforeach; ?>

</tbody>
</table>

<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v7.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="102174801553784"
  theme_color="#0084ff">
      </div>


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
      // alert($(this).closest('tr').find('td:nth-child(1)').text())
      $("#showDocument").attr('src', 'Uploads/' + $(this).closest('tr').find('td:nth-child(2)').text().split('.').slice(0, -1).join('.') + '.pdf')
    })
    // $("#modalDocoment").on('show.bs.modal', function (){
      
    // })

  })
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


   

