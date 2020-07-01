<?php include('server.php') ?>
<!DOCTYPE html>

<html>

<head>

<title>User Registration</title>

<link rel="shortcut icon" type="image/x-icon" href="images/logo.ico"/>
<link href="css/regstyle.css" rel="stylesheet">

<div class="logoname">
<a><img src="images/logoname.png" alt="" width ="330" height="60"></a>
</div>

<div class="logo">
<a><img src="images/logo.png" alt="" width="100" height="100"></a>
</div>

<div id="grad1"></div>

</head>

<body>

<form method="post" action="signup.php" style="border:2px solid #0c2245">

<div class="container">

<h1>Register User Account</h1>
<p>Please fill in this form to create an account for users.</p>
<hr>

<?php include('errors.php'); ?>

<label for="school ID"><b>School ID</b></label>
<input type="text" placeholder="Enter School ID" name="school_id"value="<?php echo $school_id; ?>" required>
<label for="schoolname"><b>School Name</b></label>
<input type="text" placeholder="Enter School Name" name="schoolname"value="<?php echo $schoolname; ?>" required>
<label for="schoolname"><b>City/Municipality</b></label>
<input type="text" placeholder="Enter City/Municipality" name="city"value="<?php echo $city; ?>" required>

<label for="email"><b>Email</b></label>
<input type="text" placeholder="Enter Email" name="email"value="<?php echo $email; ?>" required>

<label for="username"><b>Username</b></label>
<input type="text" placeholder="Enter Username" name="username" value="<?php echo $username; ?>" required>

<label for="password"><b>Password</b></label>
<input type="password" placeholder="Enter Password" name="password" value="<?php echo $password; ?>" required>

<label for="repassword"><b>Re-type Password</b></label>
<input type="password" placeholder="Enter Password Again" name="repassword" value="<?php echo $repassword; ?>" required>
    

<div class="clearfix">
<button type="button" class="cancelbtn"  onclick="myFunction()">Cancel</button>
<button type="submit" class="signupbtn" name="reg_user">Register</button>
</div>

</div>

</form>

<script>
function myFunction() {
var no;
var yes = confirm 

("You have unsaved data.\nClick ok to exit User Registration");

if (yes == true) {
     window.history.go(-1);
} else {

}
}

</script>
</body>

</html>
