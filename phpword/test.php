<?php
	session_start();
/* this is the copy pase read example */
require_once 'vendor/autoload.php';
$filename = $_SESSION['docname'];
$objReader= \PhpOffice\PhpWord\IOFactory::createReader('Word2007');
$contents=$objReader->load("docs/".$filename);

$rendername= \PhpOffice\PhpWord\Settings::PDF_RENDERER_TCPDF;

$renderLibrary="TCPDF";
$renderLibraryPath=''.$renderLibrary;
if(!\PhpOffice\PhpWord\Settings::setPdfRenderer($rendername,$renderLibrary)){
	die("Provide Render Library And Path");
}
$renderLibraryPath=''.$renderLibrary;
$objWriter= \PhpOffice\PhpWord\IOFactory::createWriter($contents,'PDF');
$objWriter->save("pdf/".substr($filename, 0, strrpos($filename, ".")).".pdf");
header('location:../download_school.php');
?>