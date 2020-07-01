<?php
include('database.php');
$tess=$_SESSION['username'];  
$superr=$_POST['superr'];
$message=$_POST['message'];



$mysqli->query("insert into notifications (name, docname, type, message, status, date) 
values ('$tess', $superr, 'comment', '$message', 'unread', CURRENT_TIMESTAMP)");
 
 
$res = $mysqli->query("select id from notifications order by id desc");
$row = $res->fetch_row();
$id = $row[0];

header('location:sup2.php');
?>