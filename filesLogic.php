<?php session_start();?>
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
        // echo "You file extension must be .zip, .pdf or .docx";
         echo "<script>alert('You file extension must .docx, Currently the system cannot upload videos, kindly save the video link in a word file for upload ');              window.loaction='download_School.php'</script>";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
      
        if (move_uploaded_file($file, $destination)) {
        	  if ( isset($_POST['pf']) && isset($_POST['ft'] )){
        	  	$pf=$_POST['pf'];
        	  	$ft=$_POST['ft'];
            $sql = "INSERT INTO files (uii,program,filetype,name, size, downloads) VALUES ('$tess','$pf','$ft','$filename', $size, 0)";
            if (mysqli_query($conn, $sql)) {
				$_SESSION['docname'] = $filename;
				
                // header('location:phpword/test.php');
                // echo "File uploaded successfully";
                echo "<script>alert('File uploaded successfully');window.loaction='location:phpword/test.php'</script>";
            }
        } else {
            // echo "Failed to upload file.";
            echo "<script>alert('Failed to upload file');window.loaction='download_School.php'</script>";
        }
    }
}
}


	


	//$c=md5("jcuaresma@ched.gov.ph");
	//echo $c;
//$sql = "SELECT * FROM files where uii=$tess" ;

// $sql1 = "SELECT * FROM users where username=$tess" ;
// 	$result1 = mysqli_query($conn, $sql1);
// $row1 = mysqli_fetch($sql1);
// echo $row1;
// $sql1 = "SELECT * FROM users where username='$tess'";
//                     if($result = mysqli_query($conn, $sql1)){
//                         if(mysqli_num_rows($result) > 0){
//                             // echo "<table class='table table-bordered table-striped'>";
//                             //     echo "<thead>";
//                             //         echo "<tr>";
//                             //             echo "<th>#</th>";
//                             //             echo "<th>Subject Code</th>";
//                             //             echo "<th>Descriptive Title</th>";
//                             //             echo "<th>Unit/s</th>";
//                             //             echo "<th>Action</th>";
//                             //         echo "</tr>";
//                             //     echo "</thead>";
//                             //     echo "<tbody>";
//                                 while($row = mysqli_fetch_array($result)){
//                                     echo "<tr>";
                                       
//                                         $prog=$row['Program'];
//                                         echo "<td>";
                                           
//                                         echo "</td>";
//                                     echo "</tr>";
//                                 }
//                                 echo "</tbody>";                            
//                             echo "</table>";
//                             // Free result set
//                             mysqli_free_result($result);
//                         } else{
//                             echo "<p class='lead'><em>No records were found.</em></p>";
//                         }
//                     } else{
//                         echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
//                     }
 
//                     // Close connection
//                     //mysqli_close($conn);


$sql = "SELECT * FROM files where uii='$tess'" ;
	$result = mysqli_query($conn, $sql);

	$files = mysqli_fetch_all($result, MYSQLI_ASSOC);


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
			

			

			
			// exit;

		}


	}



	
?>