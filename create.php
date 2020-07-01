<?php
// Include config file
require_once "server.php";
 
// Define variables and initialize with empty values
$name = $address = $salary = "";
$name_err = $address_err = $salary_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
  //  } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
  //      $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }
    
    // Validate salary
    $input_salary = trim($_POST["salary"]);
    if(empty($input_salary)){
        $salary_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($input_salary)){
        $salary_err = "Please enter a positive integer value.";
    } else{
        $salary = $input_salary;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($address_err) && empty($salary_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO employees (name, address, salary) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_address, $param_salary);
            
            // Set parameters
            $param_name = $name;
            $param_address = $address;
            $param_salary = $salary;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: curic.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($db);
}
?>
<!DOCTYPE html>

<html>

<head>

<title>Create Record</title>

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

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="border:2px solid #0c2245">

<div class="container">

<h1>Create Record</h1>
<p>Please fill this form and submit to add employee record to the database.</p>
<hr>


<label for="subjectcode"><b>SUBJECT CODE</b></label>
<input type="text" placeholder="Enter Subject Code" value="<?php echo $name; ?>">
<label for="dtitle"><b>DESCRIPTIVE TITLE</b></label>
<input type="text" placeholder="Enter Descriptive Title" value="<?php echo $address; ?>">
<label for="unit"><b>UNIT/s</b></label>
<input type="text" placeholder="Enter Unit/s"value="<?php echo $salary; ?>">

    

<div class="clearfix">
<button type="button" class="cancelbtn"  onclick="myFunction()">Cancel</button>
<button type="submit" class="signupbtn" value="submit" >Submit</button>
<a href="curic.php" class="btn btn-default">Cancel</a>
</div>

</div>

</form>


</body>

</html>
