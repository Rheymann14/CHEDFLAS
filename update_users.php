<?php
include('database.php');
$id=$_GET['id'];
$school_id=$_POST['school_id'];
$schoolname=$_POST['schoolname'];
$city=$_POST['city'];
$email=$_POST['email'];
$username=$_POST['username'];
//$password=$_POST['password'];
 //, password= '".md5($password)."'
$mysqli->query("update users set school_id='$school_id', schoolname='$schoolname', 
city='$city', email='$email', username='$username' where id=$id");
 
 
// Set a constant
//define ("FILEREPOSITORY","profile_images/");
 
// Make sure that the file was POSTed.
//if (is_uploaded_file($_FILES['pimage']['tmp_name']))
//{
// Was the file a JPEG?
//if ($_FILES['pimage']['type'] != "image/jpeg") {
//} else {
 
//$name = $_FILES['classnotes']['name'];
//$filename=$id.".jpg";
 
//unlink(FILEREPOSITORY.$filename);
//$result = move_uploaded_file($_FILES['pimage']['tmp_name'],
//FILEREPOSITORY.$filename);
//$result = move_uploaded_file($_FILES['pimg']['tmp_name'],
//"http://localhost/php_crud/profile_images/28.jpg");
//if ($result == 1) echo "<p>File successfully uploaded.</p>";
//else echo "<p>There was a problem uploading the file.</p>";
//}
 
header('location:schoolist2.php');
 
?>