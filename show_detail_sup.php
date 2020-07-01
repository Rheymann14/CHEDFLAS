<!-- Detail Model -->
<div class="modal fade" id="detail<?php echo $row['id']; ?>" tabindex="-1" 
role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" 
aria-hidden="true">&times;</button>
<h3> Profile Details </h3>
</div>
<div class="modal-body">
<?php
$edit=$mysqli->query("select * from files where id=".$row['id']);
$erow=$edit->fetch_assoc();

?>
<div class="container-fluid">
<form method="POST" action="updatesup.php?id=<?php echo $erow['id']; ?>" 
enctype="multipart/form-data">
 

<div style="height:10px;"></div>
<div class="row">
<div class="col-lg-4" align="left">
<label style="position:relative; top:7px;">Title:</label>
</div>
<div class="col-lg-8" align="left">
<?php echo "Suggestion on"." ". $erow['name']; ?>
</div>
</div>

<textarea rows="20" cols="100" name="message" style="resize: none;"> </textarea>     
 
</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal"> 
Close</button>
	<button name="submit" class="btn btn-success" type="submit">Send Feedback</button>

 
</div>
</form>
</div>
</div>
</div>
<!-- /.modal -->