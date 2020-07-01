<?php include 'filesLogic.php'; ?>

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


<title>CHEDFLAS - Archive</title>

<link rel="icon" href="images/logo.ico" type="image/x-icon" />

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
.btn-sm1 {background-color: #f44336;}
</style>

<div class="logo_area">
<a><img src="images/logo.png" alt="" width="100" height="100"></a>
</div>

<div class="hero img">
<a><img src="images/logoname.png" alt="" height="60"></a>
</div class="btn">

<div id="grad1">
<div>
<table>

<thead>

<th>ID</th>
<th>Filename</th>
<th>size (in mb)</th>
<th>Downloads</th>

<th>Action</th>

</thead>

<tbody id="tablefiles">
<?php foreach ($files as $file): ?>

<tr>
<td><?php echo $file['id']; ?></td>
<td><?php echo $file['name']; ?></td>
<td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
<td><?php echo $file['downloads']; ?></td>
<td><a href="downloads.php?file_id=<?php echo $file['id'] ?>" class="btn btn-primary"><span class="glyphicon glyphicon-download-alt" data-toggle="tooltip" title="Download"></span></a>



<button type="button"  data-toggle="modal" data-target="#modalDocument" class="btn btn-warning"><span class="glyphicon glyphicon-modal-window" data-toggle="tooltip" title="View File"></span></button>	

<button type="button"  data-toggle="modal" data-target="#myModal" class="btn btn-danger"><span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete"></span></button>

</td>

</tr>
<?php endforeach; ?>

</tbody>
</table>
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

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>