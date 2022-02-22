<?php
$db = new PDO('mysql:host=localhost;dbname=competence;charset=utf8', 'root', 'root');
require_once('tcpdf_min/tcpdf.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator('creme');
$pdf->SetAuthor('creme');
$pdf->SetTitle('Table');
$pdf->SetSubject('exemple');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
$pdf->AddPage();
$pdf->SetFont('courier','B',12);
$width_cell=array(30,50,80,35);
$pdf->SetFillColor(193,229,252); // Background color of header 

// Header starts ///
$pdf->Cell($width_cell[0],10,'DATE_DEBUT',1,0,true); // First header column 
$pdf->Cell($width_cell[1],10,'NOM_SITUATION',1,0,true); // Second header column
$pdf->Cell($width_cell[2],10,'CONTEXTE',1,0,true); // Third header column 
$pdf->Cell($width_cell[3],10,'DATE_CREATION',1,1,true); // Fourth header column

//// header is over ///////
$pdf->SetFont('courier','',10);

// First row of data
$q = $db->query('SELECT * FROM situation');
while ($data = $q->fetch()){
    $pdf->Cell($width_cell[0],10, $data['date_debut'],1,0,false); // First column of row 1 
    $pdf->Cell($width_cell[1],10, $data['nom'],1,0,false); // Second column of row 1 
    $pdf->Cell($width_cell[2],10, $data['details'],1,0,false); // Third column of row 1 
    $pdf->Cell($width_cell[3],10, $data['date_creation'],1,1,false); // Fourth column of row 1
}

$pdf->Output('example.pdf', 'I');
?>