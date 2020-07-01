<?php
include('database.php');
$id=$_GET['id'];
$mysqli->query("delete from users where id=$id");
//unlink("profile_images/".$id.".jpg");
header('location:schoolist2.php');
?>