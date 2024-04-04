<?php
	include_once("common/includes/constants.php"); 
	include_once("common/includes/functions.php");
	include_once("common/includes/common.php"); 
	include_once("common/includes/english_admin.php");
    include 'phpqrcode/qrlib.php';
    include ('fpdf/fpdf.php');
use QRcode as GlobalQRcode;

	
	header('Content-Type: application/json');
	error_reporting(0);
    $H_ID = $_GET['data'];

    $sql22 = mysql_query("SELECT
    hmt.H_NAME,
    hmt.H_CODE,
    hmt.Type_of_HCF,
    hmt.Affiliation_no,
    hmt.District,
    hmt.Phone,
    stmt.ST_Prefix,
    hmt.Pincode,
    hcfmt.PREFIX,
    hcfmt.HCF_NAME
     FROM hmt 
        LEFT JOIN stmt ON stmt.ST_CODE = hmt.State_CODE
        LEFT JOIN hcfmt ON hcfmt.HCF_CODE = hmt.HCF
        WHERE H_ID = '{$H_ID}' LIMIT 1");
    $data5 = mysql_fetch_object($sql22);
    $result['ST_Prefix'] =  $data5->ST_Prefix;
    $result['Pincode'] =  $data5->Pincode;
    $result['PREFIX'] =  $data5->PREFIX;

    $len3 = substr($data5->H_CODE,2);
    $barcode = $len3."|".$data5->Pincode."|".$data5->ST_Prefix."|".$data5->PREFIX."|".$data5->Affiliation_no;

    $qrdata = $H_ID."|".$data5->H_NAME."|".$data5->H_CODE."|".$data5->Affiliation_no."|".$data5->Type_of_HCF."|".$data5->HCF_NAME."|".$data5->District."|".$data5->Phone;
    $path="qrcodes/qrcode.png";
    $ecc = 'H';
    $pixel_size = 20;
    $frame_size = 5;
    $result=GlobalQRcode::png($qrdata,$path, $ecc, $pixel_size, $frame_size);
    $pdf = new FPDF('P','mm','A4');
    //Add a new page
    $pdf->AddPage();
    
    // Set the font for the text
    $pdf->SetFont('Arial', 'B', 18);
    
    // Prints a cell with given text 
    $pdf->Image($path, 75, 10, 60, 60,"png");
    $pdf->cell(0,130,$barcode,0,0,'C');
    
    // return the generated output
    $pdf->Output();
        // return json_encode($result); exit;
?>