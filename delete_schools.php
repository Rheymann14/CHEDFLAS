<?php
include('database.php');
include('server.php');
$id=$_GET['id'];
//$filename=$_GET['name'];
  //$filename = $_SESSION['filename'];


$query = "SELECT name FROM files WHERE id = '$id'";
$result = mysqli_query($db, $query);
$file = mysqli_fetch_assoc($result);

$filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file['name']);

$mysqli->query("delete from files where id=$id");








unlink("phpword/docs/".$filename.".docx");
unlink("phpword/pdf/".$filename.".pdf"); 

header('location:schoolend.php');
?>