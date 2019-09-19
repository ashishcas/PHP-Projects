<?php
require('fpdf.php');
$d=date('d_m_Y');

class PDF extends FPDF
{

function Header()
{
    $this->SetFont('Helvetica','',25);
	$this->SetFontSize(40);
    //Move to the right
    $this->Cell(80);
    //Line break
    $this->Ln();
}

//Page footer
function Footer()
{
   
}

//Load data
function LoadData($file)
{
	//Read file lines
	$lines=file($file);
	$data=array();
	foreach($lines as $line)
		$data[]=explode(';',chop($line));
	return $data;
}

//Simple table
function BasicTable($header,$data)
{ 

$this->SetFillColor(255,255,255);
//$this->SetDrawColor(255, 0, 0);
$w=array(25,20,30,20,20,55);
	
	
	//Header
	$this->SetFont('Arial','B',9);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'L',true);
	$this->Ln();
	
	//Data
	
	$this->SetFont('Arial','',10);
	foreach ($data as $eachResult) 
	{ //width
		$this->Cell(10);
		$this->Cell(25,6,$eachResult["empno"],1);
		$this->Cell(20,6,$eachResult["position"],1);
		$this->Cell(30,6,$eachResult["name"],1);
		$this->Cell(20,6,$eachResult["gender"],1);
		$this->Cell(20,6,$eachResult["age"],1);
		$this->Cell(55,6,$eachResult["address"],1);
		$this->Ln();
		 	 	 	 	
	}
}

//Better table
}



$pdf=new PDF();

	

$header=array('Emp Number','Position','Name','Gender','Age', 'Address');
//Data loading
//*** Load MySQL Data ***//
$objConnect = mysqli_connect("localhost","root","",'sams') or die("Error:Please check your database username & password");

$strSQL = "Select * From booking where ticketid = 'NITR9177'";
$objQuery = mysqli_query($objConnect,$strSQL);
$resultData = array();
for ($i=0;$i<mysqli_num_rows($objQuery);$i++) {
	$result = mysqli_fetch_array($objQuery);
	array_push($resultData,$result);
}
//************************//


//*** Table 1 ***//
$pdf->AddPage();

	$pdf->SetFont('Helvetica','',14);
	$pdf->Cell(68);
	$pdf->Write(5, 'Employees Records');
	$pdf->Ln();
	
	$pdf->Cell(22);
	$pdf->SetFontSize(8);
	$pdf->Cell(57);
	$result=mysqli_query($objConnect,"select date_format(now(), '%W, %M %d, %Y') as date");
	while( $row=mysqli_fetch_array($result) )
	{
		$pdf->Write(5,$row['date']);
	}
	$pdf->Ln();
	
	//count total numbers of visitors
	$result=mysqli_query($objConnect,"Select * from booking") or die ("Database query failed: $query" . mysql_error());
	
	$count = mysqli_num_rows($result);
	$pdf->Cell(0);
	$pdf->Ln();

	$pdf->Ln(5);

$pdf->Ln(0);
$pdf->Cell(10);
$pdf->BasicTable($header,$resultData);
//forme();
//$pdf->Output("$d.pdf","F");
$pdf->Output();

?>