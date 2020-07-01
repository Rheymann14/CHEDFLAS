


 <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLongTitle" align="center">Feedback Notification</h2>
        
      </div>
      <br>
<div align="center">
<?php
    
    include("notification/functions.php");

    $id = $_GET['id'];

    $query ="UPDATE `notifications` SET `status` = 'read' WHERE `id` = $id;";
    performQuery($query);

    $query = "SELECT * from `notifications` where `id` = '$id';";
    if(count(fetchAll($query))>0){
        foreach(fetchAll($query) as $i){
            if($i['type']=='like'){
                echo ucfirst($i['name'])." liked your post. <br/>".$i['date'];
            }else{
                echo $i['name']."  </br> commented on your file: ".$i['docname']." </br> ".$i['message'];
                // echo $id;
            }
        }
    }
    
?>
</div>

<br>
   <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>




