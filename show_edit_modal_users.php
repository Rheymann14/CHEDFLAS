<!--Edit Model -->

<div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" 
role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" 
aria-hidden="true">&times;</button>
<center><h4 class="modal-title" id="myModalLabel"><b>EDIT</b></h4></center>
</div>
<div class="modal-body">
<?php
$edit=$mysqli->query("select * from users where id=".$row['id']);
$erow=$edit->fetch_assoc();
?>
<div class="container-fluid">
<form method="POST" action="update_users.php?id=<?php echo $erow['id']; ?>" 
enctype="multipart/form-data">
<div class="row">
<div class="col-lg-4" align="left">
<label style="position:relative; top:7px;">UII:</label>
</div>
<div class="col-lg-8">
<input type="text" name="school_id" class="form-control" 
value="<?php echo $erow['school_id']; ?>">
</div>
</div>
<div style="height:10px;"></div>
<div class="row">
<div class="col-lg-4" align="left">
<label style="position:relative; top:7px;">School Name:</label>
</div>
<div class="col-lg-8" align="left">
<input type="text" name="schoolname" class="form-control" 
value="<?php echo $erow['schoolname']; ?>">


</div>
</div>
<div style="height:10px;"></div>
<div class="row">
<div class="col-lg-4" align="left">
<label style="position:relative; top:7px;">City:</label>
</div>
<div class="col-lg-8">
<input type="text" name="city" class="form-control" 
value="<?php echo $erow['city']; ?>">
</div>
</div>
<div style="height:10px;"></div>
<div class="row">
<div class="col-lg-4" align="left">
<label class="control-label" style="position:relative; top:7px;">Email:</label>
</div>
<div class="col-lg-8">
<input type="text" class="form-control" name="email" 
value="<?php echo $erow['email']; ?>">
</div>
</div>
<div style="height:10px;"></div>
<div class="row">
<div class="col-lg-4" align="left">
<label class="control-label" style="position:relative; top:7px;">Username:</label>
</div>
<div class="col-lg-8">
<input type="text" class="form-control" 
name="username" value="<?php echo $erow['username']; ?>">
</div>
</div>
<!-- <div style="height:10px;"></div>
<div class="row">
<div class="col-lg-4" align="left">
<label class="control-label" style="position:relative; top:7px;">Current Password:</label>
</div>
<div class="col-lg-8">
<input type="text" class="form-control" 
name="password" >
</div>
</div>

<div style="height:10px;"></div>
<div class="row">
<div class="col-lg-4" align="left">
<label class="control-label" style="position:relative; top:7px;">New Password:</label>
</div>
<div class="col-lg-8">
<input type="text" class="form-control" 
name="npassword" >
</div>
</div>

<div style="height:10px;"></div>
<div class="row">
<div class="col-lg-4" align="left">
<label class="control-label" style="position:relative; top:7px;">Confirm Password:</label>
</div>
<div class="col-lg-8">
<input type="text" class="form-control" 
name="cpassword" >
</div>
</div>
 
<div style="height:10px;"></div>
<div class="row">
<div class="col-lg-4" align="left">
<label class="control-label" style="position:relative; top:7px;">Profile Image:
</label>
</div>
 
<div class="col-lg-8">
 
<input type="file" class="filestyle" name="pimage" />
 
</div>
 
</div> -->
 
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">
<span class="glyphicon glyphicon-remove"></span> Cancel</button>
<button type="submit" class="btn btn-warning" onclick="myFunction()">
<span class="glyphicon glyphicon-check"></span> Save</button>
</div>
</form>
</div>
</div>
</div>

<script>
function myFunction() {
 alert("Data Saved");
}
</script>


<!-- /.modal



	