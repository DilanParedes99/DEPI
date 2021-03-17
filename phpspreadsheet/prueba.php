<?php

require 'vendor/autoload.php';
require_once('../includes/dbconnection.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

$tableHead=[
	'font'=>[
		'color'=>[
			'rgb'=>'FFFFFF'
		],
	],
	'fill'=>[
		'fillType'=>FILL::FILL_SOLID,
		'startColor'=>[
			'rgb'=> '538ED5'
		]
	],
];


$arreglo= $_POST['exampleRadios'];
$num= count($arreglo);

if($num=='1'){
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', '#');
$sheet->setCellValue('B1', 'Titulo');
$sheet->setCellValue('C1', 'Autor');
$sheet->setCellValue('D1', 'Asesor');
$sheet->setCellValue('E1', 'Fecha');
$sheet->setCellValue('F1', 'Nivel');
$sheet->setCellValue('G1', 'Departamento');

$sql = "SELECT *  FROM tesis";
$result = $conn->query($sql);
if($result->num_rows > 0){
	$n = 1;
	while($row = $result->fetch_assoc()){
		$rowNum = $n + 1;
		$sheet->setCellValue('A'.$rowNum, $n);
		$sheet->setCellValue('B'.$rowNum, $row['titulo']);
		$sheet->setCellValue('C'.$rowNum, $row['autor']);
		$sheet->setCellValue('D'.$rowNum, $row['asesor']);
		$sheet->setCellValue('E'.$rowNum, $row['fecha']);
		$sheet->setCellValue('F'.$rowNum, $row['nivel']);
		$sheet->setCellValue('G'.$rowNum, $row['departamento']);
		$n++;
	}
}

$spreadsheet->getActiveSheet()->getStyle('A1:H1')->applyFromArray($tableHead);

$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(45);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(30);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(30);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(14);
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(30);

$spreadsheet->getDefaultStyle()
	->getFont()
	->setName('Arial')
	->setSize(12);

$spreadsheet->getActiveSheet()->getStyle("A1:G1")->getFont()->setSize(13);
$spreadsheet->getActiveSheet()->getStyle("A1:G1")->getFont()->setBold(true);

$spreadsheet->getActiveSheet()->getStyle("A1:G1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

$filename = 'Reporte-Tesis-'.time().'.xlsx';
// Redirect output to a client's web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$filename.'"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
 
// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');




}elseif ($num=='2') {
	

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', '#');
$sheet->setCellValue('B1', 'Titulo');
$sheet->setCellValue('C1', 'Autor');
$sheet->setCellValue('D1', 'Revista');
$sheet->setCellValue('E1', 'Volumen');
$sheet->setCellValue('F1', 'DOI');
$sheet->setCellValue('G1', 'Fecha');

$sql = "SELECT *  FROM articulos";
$result = $conn->query($sql);
if($result->num_rows > 0){
	$n = 1;
	while($row = $result->fetch_assoc()){
		$rowNum = $n + 1;
		$sheet->setCellValue('A'.$rowNum, $n);
		$sheet->setCellValue('B'.$rowNum, $row['titulo']);
		$sheet->setCellValue('C'.$rowNum, $row['autor']);
		$sheet->setCellValue('D'.$rowNum, $row['revista']);
		$sheet->setCellValue('E'.$rowNum, $row['volumen']);
		$sheet->setCellValue('F'.$rowNum, $row['doi']);
		$sheet->setCellValue('G'.$rowNum, $row['fecha']);
		$n++;
	}
}

$spreadsheet->getActiveSheet()->getStyle('A1:G1')->applyFromArray($tableHead);

$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(45);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(30);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(30);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(14);
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(10);

$spreadsheet->getDefaultStyle()
	->getFont()
	->setName('Arial')
	->setSize(12);

$spreadsheet->getActiveSheet()->getStyle("A1:G1")->getFont()->setSize(13);
$spreadsheet->getActiveSheet()->getStyle("A1:G1")->getFont()->setBold(true);

$spreadsheet->getActiveSheet()->getStyle("A1:G1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

$filename = 'Reporte-Articulos-'.time().'.xlsx';
// Redirect output to a client's web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$filename.'"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
 
// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
}else{
	echo "nada";
}

