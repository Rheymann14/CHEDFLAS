
<!DOCTYPE html>

<html lang="en">

<head>

<title>CHEDFLAS - Admin Page</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

<h3>
	Hello Admin
</h3>

</body>

</html>

<?php
// get the name of the input PDF
$inputFile = "C:\\xamppp\\htdocs\\CHEDFLAS\\Uploads\\Curriculum.docx";

// get the name of the output MS-WORD file
$outputFile = "C:\\xamppp\\htdocs\\CHEDFLAS\\Uploads\\Curriculum.pdf";

try
    {
    $oLoader = new COM("easyPDF.Loader.8");
    $oPrinter = $oLoader->LoadObject("easyPDF.Printer.8");
    $oPrintJob = $oPrinter->PrintJob;
    $oPrintJob->PrintOut ($inputFile, $outputFile);
    print "Success";
    }


catch(com_exception $e)
    {
    Print "error code".$e->getcode(). "\n";
    print $e->getMessage();
    }
   ?>