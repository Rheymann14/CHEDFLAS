
<?php 
session_start();

// variable declaration
$school_id  = "";
$schoolname  = "";
$email    = "";
$username    = "";
$password    = "";
$repassword = "";
$city="";

$errors = array(); 
$_SESSION['success'] = "";

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'chedflasusers');

// REGISTER USER
if (isset($_POST['reg_user'])) {

$school_id = mysqli_real_escape_string($db, $_POST['school_id']);
$schoolname = mysqli_real_escape_string($db, $_POST['schoolname']);
$city = mysqli_real_escape_string($db, $_POST['city']);

$email = mysqli_real_escape_string($db, $_POST['email']);
$username = mysqli_real_escape_string($db, $_POST['username']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$repassword = mysqli_real_escape_string($db, $_POST['repassword']);

// form validation: ensure that the form is correctly filled
// if (empty($school_id)) { array_push($errors, "school ID is required"); }
// if (empty($schoolname)) { array_push($errors, "schoolname is required"); }
// if (empty($city)) { array_push($errors, "city/municipality is required"); }
// if (empty($email)) { array_push($errors, "Email is required"); }
// if (empty($username)) { array_push($errors, "Username is required"); }
// if (empty($password)) { array_push($errors, "Password is required"); }
if ($password != $repassword) {
// $message1 = "The two passwords do not match";
//   echo "<script type='text/javascript'>alert('$message1');</script>";
array_push($errors, "The two passwords do not match");
}

// register user if there are no errors in the form
if (count($errors) == 0) {
$password = md5($password);//encrypt the password before saving in the database

$query = "INSERT INTO users (school_id,schoolname,city, email, username, password) 
VALUES('$school_id','$schoolname','$city', '$email', '$username', '$password')";
mysqli_query($db, $query);

// $_SESSION['username'] = $username;
//$_SESSION['success'] = "You are now logged in";
header('location: index.php');
}
}

// LOGIN USER
if (isset($_POST['login_user'])) {
$username = mysqli_real_escape_string($db, $_POST['username']);
$password = mysqli_real_escape_string($db, $_POST['password']);

// if (empty($username)) {
// array_push($errors, "Username is required");
// }
// if (empty($password)) {
// array_push($errors, "Password is required");
// }
		
if (count($errors) == 0) {
$password = md5($password);
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$results = mysqli_query($db, $query);

if (mysqli_num_rows($results) == 1) {

$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['usertype'] == 'Administrator') {
$_SESSION['username'] = $username;
 
header('location: index.php');

}elseif ($logged_in_user['usertype'] == 'School') {
$_SESSION['username'] = $username;
header('location: download_School.php');
}elseif ($logged_in_user['usertype'] == 'Supervisor') {
$_SESSION['username'] = $username;
$_SESSION['supervisorName'] = $logged_in_user['schoolname'];
header('location: supervisorend.php');
}// }else{
// $_SESSION['user'] = $logged_in_user;
// $_SESSION['success']  = "You are now logged in";

// header('location: index.php');
// }

}else {
// array_push($errors, "Wrong username/password combination");
  $message = "Username and/or Password incorrect.\\nTry again.";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
}
}

?>