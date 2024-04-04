<?php
error_reporting(1);
include_once("common/includes/constants.php");
include_once("common/includes/mysqli_function.php");
include_once("common/includes/functions.php");
include_once("common/includes/common.php");
include_once("common/includes/admin_session.php");
require 'vendor/autoload.php';


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;

$fromdate = $_REQUEST['fromdate'];
if ($fromdate != "")
    $condition .= "&fromdate=$fromdate";

$todate = $_REQUEST['todate'];
if ($todate != "")
    $condition .= "&todate=$todate";

$sql = "SELECT * FROM scan_log
    INNER JOIN usermaster ON scan_log.user_id=usermaster.user_id
     WHERE  usermaster.User_Del='0'   ";


if ($fromdate != '') {
    $sql .= " and date(scan_log.datetime)>= '$fromdate'";
}

if ($todate != '') {
    $sql .= " and date(scan_log.datetime)>= '$todate'";
}


$res = mysqli_query($conn, $sql);


$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set header row with gray background
$headerStyle = [
    'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '808080']]
];
$sheet->getStyle('A1:F1')->applyFromArray($headerStyle);
$sheet->setCellValue('A1', 'Sl No');
$sheet->setCellValue('B1', 'IN Bin');
$sheet->setCellValue('C1', 'OUT Bin');
$sheet->setCellValue('D1', 'Scan Datetime');
$sheet->setCellValue('E1', 'Scanned By');
$sheet->setCellValue('F1', 'Status');


$rowIndex = 2; // Start populating data from row 2
while ($row =  mysqli_fetch_object($res)) {
    if ($row->status == '0') {
        $status = "Match";
    } else {
        $status = "No Match";
    }


    $sheet->setCellValue('A' . $rowIndex, $rowIndex - 1); // Index starting from 1
    $sheet->setCellValue('B' . $rowIndex,  $row->in_bin);
    $sheet->setCellValue('C' . $rowIndex, $row->out_bin);
    $sheet->setCellValue('D' . $rowIndex, date('d-M-Y H:i:s', strtotime($row->datetime)));
    $sheet->setCellValue('E' . $rowIndex, $row->username);
    $sheet->setCellValue('F' . $rowIndex, $status);
    $rowIndex++;
}

$fileName = 'scan_report.xlsx';
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $fileName . '"');
header('Cache-Control: max-age=0');

// Write the spreadsheet to output
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
