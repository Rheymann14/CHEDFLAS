<?php session_start();
    include("notification/functions.php");
?>
<?php
	$conn = mysqli_connect('localhost', 'root', '', 'chedflasusers');
date_default_timezone_set('Hongkong');
$date = date('m/d/Y h:i:s a', time());
	$tess=$_SESSION['username']; 
	// echo $tess;

	
	//echo $_POST['pf'];	

		
		
// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];
   // $programval = $_FILES['programsval'];
    // destination of the file on the server
    $destination = 'phpword/docs/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
      
        if (move_uploaded_file($file, $destination)) {
        	  if(isset($_POST['pf'])){
        	  	$pf=$_POST['pf'];
            $sql = "INSERT INTO files (uii,program,name, size, downloads) VALUES ('$tess','$pf','$filename', $size, 0)";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}
}



if(isset($_POST['submit_feedback'])){
    $supervisor = $_SESSION['supervisorName'];
    $filename = $_SESSION['filename'];
    $message = $_POST['message'];
    $query ="INSERT INTO `notifications` (`id`,`name`,`docname`, `type`, `message`, `status`, `date`) VALUES (NULL, '$supervisor', '$filename', 'comment', '$message', 'unread', CURRENT_TIMESTAMP)";
    performQuery($query);
    header('location: supervisorend.php');
}


	//$c=md5("jcuaresma@ched.gov.ph");
	//echo $c;
//$sql = "SELECT * FROM files where uii=$tess" ;

// $sql1 = "SELECT * FROM users where username=$tess" ;
// 	$result1 = mysqli_query($conn, $sql1);
// $row1 = mysqli_fetch($sql1);
// echo $row1;
// $sql1 = "SELECT users.schoolname,files.name,files.program,files.filetype FROM files INNER JOIN users ON files.uii=users.school_id where username='$tess'";

//     $result = mysqli_query($conn, $sql);

//     $files = mysqli_fetch_all($result, MYSQLI_ASSOC);











                         $sql3 = "SELECT * FROM users where username='$tess'";
                    if($result3 = mysqli_query($conn, $sql3)){
                        if(mysqli_num_rows($result3) > 0){
                            // echo "<table class='table table-bordered table-striped'>";
                            //     echo "<thead>";
                            //         echo "<tr>";
                            //             echo "<th>#</th>";
                            //             echo "<th>Subject Code</th>";
                            //             echo "<th>Descriptive Title</th>";
                            //             echo "<th>Unit/s</th>";
                            //             echo "<th>Action</th>";
                            //         echo "</tr>";
                            //     echo "</thead>";
                            //     echo "<tbody>";
                                while($row3 = mysqli_fetch_array($result3)){
                                    echo "<tr>";
                                       
                                        $prog=$row3['Program'];
                                        echo "<td>";
                                           
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result3);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }
                    // Close connection
                    //mysqli_close($conn);


$sql = "SELECT users.schoolname,files.name,files.program,files.filetype FROM files INNER JOIN users ON files.uii=users.school_id where files.program='$prog'" ;
	$result7 = mysqli_query($conn, $sql);

	$files = mysqli_fetch_all($result7, MYSQLI_ASSOC);


	if (isset($_GET['file_id'])) {

		$id = $_GET['file_id'];
		$sql = "SELECT * FROM files WHERE id=$id";
		$result = mysqli_query($conn, $sql);
		$file = mysqli_fetch_assoc($result);
		$filepath = 'phpword/docs/' . $file['name'];

		if (file_exists($filepath)) {

			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename=' . basename($filepath));
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize('uploads/' . $file['name']));
			readfile('phpword/docs/' . $file['name']);

			$newCount = $file['downloads'] + 1;
			$updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";

			mysqli_query($conn, $updateQuery);
			// converttoPDF($file);

			
			// exit;

		}


	}



	
?>