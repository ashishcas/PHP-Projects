<?php
//include connection file 
include_once("connection.php");
include_once('fpdf181/fpdf.php');
 
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo.png',10,-1,70);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Sample',1,0,'C');
    // Line break
    $this->Ln(20);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
 
$db = new dbObj();
$connString =  $db->getConnstring();
$display_heading = array('ticketid'=>'ID', 'name'=> 'Name', 'showdate'=> 'showdate','seatno'=> 'SeatNumber',);
 
$result = mysqli_query($connString, "SELECT ticketid, name, showdate, seatno FROM booking") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW ticketid, name, showdate, seatno FROM booking");
 
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,12,'Ticket ID',1);
$pdf->Cell(40,12,'Name',1);
$pdf->Cell(40,12,'Show DATE',1);
$pdf->Cell(40,12,'Seat Number',1);
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(40,12,$column,1);
}
$pdf->Output();
?>