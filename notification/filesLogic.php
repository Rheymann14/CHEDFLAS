<?php session_start();?>
<?php
	$conn = mysqli_connect('sql209.epizy.com', 'epiz_26107291', 'aOLRqmY58sJbMa', 'epiz_26107291_chedflas');
date_default_timezone_set('Hongkong');
$date = date('m/d/Y h:i:s a', time());
	$tess=$_SESSION['username']; 
	//echo $tess;

	//$c=md5("jcuaresma@ched.gov.ph");
	//echo $c;
//$sql = "SELECT * FROM files where uii=$tess" ;
$sql = "SELECT * FROM files where program='Education'" ;
	$result = mysqli_query($conn, $sql);

	$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

	if (isset($_POST['save'])) {

		$filename = $_FILES['myfile']['name'];

		$destination = 'uploads/' . $filename;

		$extension = pathinfo($filename, PATHINFO_EXTENSION);

		$file = $_FILES['myfile']['tmp_name'];
		$size = $_FILES['myfile']['size'];

		if (!in_array($extension, ['zip', 'pdf', 'docx'])) {

			echo "You file extension must be .zip, .pdf or .docx";

		} elseif ($_FILES['myfile']['size'] > 1000000) { 
			echo "File too large!";

		} else {
		        
			if (move_uploaded_file($file, $destination)) {
			$sql = "INSERT INTO files (uii,name, size, downloads) VALUES ('$tess','$filename', $size, 0)";

				if (mysqli_query($conn, $sql)) {
				echo "File uploaded successfully";
				header('location: sup.php');
				}

				// conversion to pdf
				// require_once 'phpword/vendor/autoload.php';
				// $objReader= \PhpOffice\PhpWord\IOFactory::createReader('Word2007');
				// $contents=$objReader->load('uploads/'.$filename);

				// $rendername= \PhpOffice\PhpWord\Settings::PDF_RENDERER_TCPDF;

				// $renderLibrary="TCPDF";
				// $renderLibraryPath=''.$renderLibrary;
				// // if(!\PhpOffice\PhpWord\Settings::setPdfRenderer($rendername,$renderLibrary)){
				// // 	die("Provide Render Library And Path");
				// // }
				// $renderLibraryPath=''.$renderLibrary;
				// $objWriter= \PhpOffice\PhpWord\IOFactory::createWriter($contents,'PDF');
				// $objWriter->save('uploads/test.pdf');	
				// end of conversion

			} else {
				echo "Failed to upload file.";
			}
		}
	}

	if (isset($_GET['file_id'])) {

		$id = $_GET['file_id'];
		$sql = "SELECT * FROM files WHERE id=$id";
		$result = mysqli_query($conn, $sql);
		$file = mysqli_fetch_assoc($result);
		$filepath = 'uploads/' . $file['name'];

		if (file_exists($filepath)) {

			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename=' . basename($filepath));
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize('uploads/' . $file['name']));
			readfile('uploads/' . $file['name']);

			$newCount = $file['downloads'] + 1;
			$updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";

			mysqli_query($conn, $updateQuery);
			// converttoPDF($file);

			
			// exit;

		}


	}
?>