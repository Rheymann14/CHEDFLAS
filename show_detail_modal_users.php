<!-- Detail Model -->
<div class="modal fade" id="detail<?php echo $row['id']; ?>" tabindex="-1" 
role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" 
aria-hidden="true">&times;</button>
<h3 style="text-align: center;"> <b>SCHOOL DETAILS</b></h3>
</div>
<div class="modal-body">
<?php
$edit=$mysqli->query("select * from users where id=".$row['id']);
$erow=$edit->fetch_assoc();
?>
<div class="container-fluid">
<form method="POST" action="update.php?id=<?php echo $erow['id']; ?>" 
enctype="multipart/form-data">
 
<!-- <div class="row">
<div class="col-lg-12" align="center">
<?php $img //= "profile_images/".$row['id']. ".jpg";?>
<img src='<?php //echo $img ?>' height="150px" width="170px" />
 
</div> -->
 
</div>
<div style="height:10px;"></div>
<div class="row">
<div class="col-lg-4" align="left">
<label style="position:relative; top:7px;">UII:</label>
</div>
<div class="col-lg-8" align="left">
<?php echo $erow['school_id']; ?>
</div>
</div>
<div style="height:10px;"></div>
<div class="row">
<div class="col-lg-4" align="left">
<label style="position:relative; top:7px;">School Name:</label>
</div>
<div class="col-lg-8" align="left">
<?php echo $erow['schoolname']; ?>
</div>
</div>
<div style="height:10px;"></div>
<div class="row">
<div class="col-lg-4" align="left">
<label style="position:relative; top:7px;">City:</label>
</div>
<div class="col-lg-8" align="left">
<?php echo $erow['city']; ?>
</div>
</div>
<div style="height:10px;"></div>
<div class="row">
<div class="col-lg-4" align="left">
<label class="control-label" style="position:relative; top:7px;">Email:</label>
</div>
<div class="col-lg-8" align="left">
<?php echo $erow['email']; ?>
</div>
</div>
 
 
<div style="height:10px;"></div>
<div class="row">
<div class="col-lg-4" align="left">
<label class="control-label" style="position:relative; top:7px;">Username:</label>
</div>
<div class="col-lg-8" align="left">
<?php echo $erow['username']; ?>
</div>
</div>
<div style="height:10px;"></div>
<div class="row">
<div class="col-lg-4" align="left">
<label class="control-label" style="position:relative; top:7px;">password:</label>
</div>
<div class="col-lg-8" align="left">
<?php echo $erow['username']; ?>
</div>
</div>
 <div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal"> 
Close</button>
 
</div>
</div>
</div>

</form>
</div>
</div>
</div>
<!-- /.modal -->