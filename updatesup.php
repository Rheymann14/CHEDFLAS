<?php
include('database.php');
$id=$_GET['id'];
$name=$_POST['name'];
$message=$_POST['name'];


$mysqli->query("update files set name='$name' where id=$id");





 
header('location:sup.php');
 
?>