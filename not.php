<?php include 'filesLogicsup.php'; ?>
<?php include('uploadmodal.php'); ?>
<?php
    include("notification/functions.php");
$tess=$_SESSION['username']; 


     // $sql = "SELECT * FROM users where username='$tess'";
     //                if($result = mysqli_query($conn, $sql)){
     //                    if(mysqli_num_rows($result) > 0){
     //                        // echo "<table class='table table-bordered table-striped'>";
     //                        //     echo "<thead>";
     //                        //         echo "<tr>";
     //                        //             echo "<th>#</th>";
     //                        //             echo "<th>Subject Code</th>";
     //                        //             echo "<th>Descriptive Title</th>";
     //                        //             echo "<th>Unit/s</th>";
     //                        //             echo "<th>Action</th>";
     //                        //         echo "</tr>";
     //                        //     echo "</thead>";
     //                        //     echo "<tbody>";
     //                            while($row = mysqli_fetch_array($result)){
     //                                echo "<tr>";
                                       
     //                                    echo "<td>" . $row['Program'] . "</td>";
     //                                    echo "<td>";
                                           
     //                                    echo "</td>";
     //                                echo "</tr>";
     //                            }
     //                            echo "</tbody>";                            
     //                        echo "</table>";
     //                        // Free result set
     //                        mysqli_free_result($result);
     //                    } else{
     //                        echo "<p class='lead'><em>No records were found.</em></p>";
     //                    }
     //                } else{
     //                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
     //                }
 
     //                // Close connection
     //                mysqli_close($conn);
               












?>
<!DOCTYPE html>
<html>

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


<title>CHEDFLAS - Supervisor Page</title>

<link rel="shortcut icon" type="image/x-icon" href="images/logo.ico"/>

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





<div class="logo_area">
<a><img src="images/logo.png" alt="" width="100" height="100"></a>
</div>

<div class="hero img">
<a><img src="images/logoname.png" alt="" height="60"></a>
</div class="btn">



<div id="grad1">
  <a href="login.php" onclick="javascript:return confirm('Are you sure you want to log out?');" class="btn btn-danger " style="float: right; margin-right: 160px; margin-top: 50px;">Logout</a>

<!-- <div align="right" class="notif">
  


<button type="button" class="btn btn-success">Notification <i class="fa fa-bell" aria-hidden="true"> <i id="noti_number"></i></i></button>
</div> -->


<table>

<thead>

<th>ID</th>
<th>Filename</th>
<!--<th>size (in mb)</th>-->
<th>Program</th>
<th>Downloads</th>

<th>Action</th>

</thead>

<tbody id="tablefiles">
<?php foreach ($files as $file): ?>

<tr>
<td><?php echo $file['id']; ?></td>
<td><?php echo $file['name']; ?></td>
<!--<td><?php //echo floor($file['size'] / 1000) . ' KB'; ?></td>-->
<td><?php echo $file['program']; ?></td>
<td><?php echo $file['downloads']; ?></td>
<td><a href="sup.php?file_id=<?php echo $file['id'] ?>" class="btn btn-primary"><span class="glyphicon glyphicon-download-alt" data-toggle="tooltip" title="Download"></span></a>



<button type="button"  data-toggle="modal" data-target="#modalDocument" class="btn btn-warning"><span class="glyphicon glyphicon-modal-window" data-toggle="tooltip" title="View File"></span></button> 

  








<button onclick="document.getElementById('id01').style.display='block'" class="btn btn-success"><span class="glyphicon glyphicon-comment" data-toggle="tooltip" title="Send Feedback"></span></button>



  <div id="id01" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>Feedback</h2>
        <?php echo $file['id']; ?>
      </header>
      <div class="w3-container">
        <p>&nbsp</p>
 
        <form method="post">
         <textarea rows="20" cols="100" name="message" style="resize: none;"> </textarea>
          <button name="submit" class="btn btn-success" style="float: right; margin-top: 10px; margin-bottom: 10px; margin-right: 25px;" type="submit">Send Feedback</button>
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


</body>



</html>

<?php 
          
          if(isset($_POST['submit'])){
              $message = $_POST['message'];
              $query ="INSERT INTO `notifications` (`id`, `name`, `type`, `message`, `status`, `date`) VALUES (NULL, '', 'comment', '$message', 'unread', CURRENT_TIMESTAMP)";
              if(performQuery($query)){
                
              }
          }
                
          ?>
         
<script>
  $(document).ready(function (){
    // alert()
    $("#tablefiles").on('click', 'tr', function (){
      // alert($(this).closest('tr').find('td:nth-child(1)').text())
       //alert($(this).closest('tr').find('td:nth-child(1)').text())
      $("#showDocument").attr('src', 'Uploads/' + $(this).closest('tr').find('td:nth-child(2)').text().split('.').slice(0, -1).join('.') + '.pdf')
    })
    // $("#modalDocoment").on('show.bs.modal', function (){
      
    // })

  })
</script>


<script type="text/javascript">
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
</script>


<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
function myFunction() {
var no;
var yes = confirm 

("You have unsaved data.\nClick ok to exit User Registration");

if (yes == true) {
    
} else {

}
}

</script>