<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
	$this->SetY(10);
	
    // Images
    $this->Image('img/line.png', 60,33,150,8);
    $this->Image('img/triangle1.png', 8,5,90,42);
    $this->Image('img/SHARE.png', 10,15,30);
   //this->Image('img/AIMS.jpg',10,15,45);
    $this->Image('img/ust.jpg', 185,5,25);
    
    //UST
    $this->SetFont('Arial','B',20);
    $this->Cell(175,5,'University of Santo Tomas',0,2,'R');
    $this->SetFont('Arial','',10);
    $this->Cell(175,7,'(Founded in 1611, Manila, Philippines)',0,2,'R');
    $this->SetFont('Arial','',14);
    $this->Cell(175,3,'Office of International Relations and Programs',0,1,'R');
    
    // Scholarship
    $this->SetFont('Arial','B',30);
    $this->SetTextColor(255,255,255);
    $this->Cell(0,15,'',0,2);
    $this->Cell(70,0,'Scholarship');
    
   	//Student
    $this->SetTextColor(255,255,255);
    $this->SetFont('Arial','B',12);
   	$this->Cell(72,-5,'Student exchange application form');
   	$this->SetFont('Arial','',12);
    $this->Cell(10,-5,'(Host University in Europe)',0,2);
   	
    //Outbound
    $this->SetTextColor(0,0,0);
   	$this->SetFont('Arial','BI',9);
   	$this->Cell(1,6,'','',2);
   	$this->Cell(55,4,'First Term — August to December (Year)',0,2,'R');
   	$this->SetFont('Arial','B',9);
   	$this->Cell(55,4,'FOR OUTBOUND STUDENTS — FORM _',0,0,'R');
    
    // Line break
    $this->Ln(8);
}

// Page footer
function Footer()
{
    // Position at 20 cm from bottom
    $this->SetY(-20);
  	
    $this->SetFont('Arial','',8);
    $this->Cell(0,3,'Office of International Relations and Programs',0,2,'C');
    $this->Cell(0,3,'G/F Main Bldg., University of Santo Tomas',0,2,'C');
    $this->Cell(0,3,'España Blvd., Manila, Philippines, 1015',0,2,'C');
    $this->Cell(0,3,'406-1611 local 8658',0,2,'C');
    $this->Cell(0,3,'international@ust.edu.ph',0,2,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF('P','mm','A4');
$pdf->AddPage();

//content

//2x2 pic
$pdf->Rect(155,50,50.8,50.8);

//Personal Information
$pdf->SetFont('Arial','B',9);
$pdf->Cell(140,7,'I. PERSONAL INFORMATION','TB',2);

$pdf->SetFont('Arial','',8);
$pdf->Cell(30,7,'FAMILY NAME','BR',0);
$pdf->Cell(110,7,'','B',1);
$pdf->Cell(30,7,'GIVEN NAME','BR',0);
$pdf->Cell(110,7,'','B',1);
$pdf->Cell(30,7,'MIDDLE NAME','BR',0);
$pdf->Cell(110,7,'','B',1);

$pdf->Cell(25,7,'GENDER','BR',0);
$pdf->Cell(35,7,'','BR',0);
$pdf->Cell(30,7,'CITIZENSHIP','BR',0);
$pdf->Cell(50,7,'','B',1);
$pdf->Cell(25,7,'BIRTHDATE','BR',0);
$pdf->Cell(35,7,'','BR',0);
$pdf->Cell(30,7,'AGE','BR',0);
$pdf->Cell(50,7,'','B',1);
$pdf->Cell(25,7,'BIRTHPLACE','BR',0);
$pdf->Cell(35,7,'','BR',0);
$pdf->Cell(30,7,'NATIONALITY','BR',0);
$pdf->Cell(105,7,'','B',1);

$pdf->Cell(25,7,'PASSPORT NO.','BR',0);
$pdf->Cell(35,7,'','BR',0);
$pdf->Cell(30,7,'VALIDITY DATE','BR',0);
$pdf->Cell(40,7,'','BR',0);
$pdf->Cell(30,7,'DATE OF ISSUANCE','BR',0);
$pdf->Cell(35,7,'','B',1);

$pdf->Cell(30,7,'MAILING ADDRESS','BR',0);
$pdf->Cell(165,7,'','B',1);

$pdf->Cell(195,7,'','B',1);

$pdf->Cell(35,7,'EMAIL ADDRESS','BR',0);
$pdf->Cell(160,7,'','B',1);

$pdf->Cell(35,7,'TELEPHONE NUMBER','BR',0);
$pdf->Cell(55,7,'','BR',0);
$pdf->Cell(30,7,'MOBILE NUMBER','BR',0);
$pdf->Cell(75,7,'','B',1);

$pdf->Cell(195,7,'','B',1);

//Educational Background
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,'II. EDUCATIONAL BACKGROUND','B',2);

$pdf->SetFont('Arial','',8);
$pdf->Cell(50,7,'COLLEGE/FACULTY/INSTITUTE','BR',0);
$pdf->Cell(145,7,'','B',1);
$pdf->Cell(50,7,'DEGREE PROGRAM','BR',0);
$pdf->Cell(145,7,'','B',1);
$pdf->Cell(50,7,'YEAR LEVEL','BR',0);
$pdf->Cell(145,7,'','B',1);

$pdf->Cell(195,7,'','B',1);

//Guardian's Information
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,"III. GUARDIAN'S INFORMATION",'B',2);

$pdf->SetFont('Arial','',8);
$pdf->Cell(40,7,"FATHER'S NAME",'BR',0);
$pdf->Cell(155,7,'','B',1);

$pdf->Cell(40,7,'OCCUPATION/POSITION','BR',0);
$pdf->Cell(60,7,'','BR',0);
$pdf->Cell(25,7,'COMPANY','BR',0);
$pdf->Cell(70,7,'','B',1);

$pdf->Cell(35,7,'ADDRESS','BR',0);
$pdf->Cell(160,7,'','B',1);

$pdf->Cell(35,7,'CONTACT NUMBER','BR',0);
$pdf->Cell(50,7,'','BR',0);
$pdf->Cell(30,7,'EMAIL ADDRESS','BR',0);
$pdf->Cell(80,7,'','B',1);

$pdf->Cell(40,7,'ANNUAL INCOME','BR',0);
$pdf->Cell(155,7,'','B',1);

$pdf->Cell(195,7,'','B',1);

$pdf->Cell(40,7,"MOTHER'S NAME",'BR',0);
$pdf->Cell(155,7,'','B',1);

$pdf->Cell(40,7,'OCCUPATION/POSITION','BR',0);
$pdf->Cell(60,7,'','BR',0);
$pdf->Cell(25,7,'COMPANY','BR',0);
$pdf->Cell(70,7,'','B',1);

$pdf->Cell(35,7,'ADDRESS','BR',0);
$pdf->Cell(160,7,'','B',1);

$pdf->Cell(35,7,'CONTACT NUMBER','BR',0);
$pdf->Cell(50,7,'','BR',0);
$pdf->Cell(30,7,'EMAIL ADDRESS','BR',0);
$pdf->Cell(80,7,'','B',1);

$pdf->Cell(40,7,'ANNUAL INCOME','BR',0);
$pdf->Cell(155,7,'','B',1);

$pdf->Cell(195,7,'','',1);

//Courses/Program
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,'IV. COUNTRY & UNIVERSITY','TB',1);

$pdf->SetFont('Arial','',8);
$pdf->Cell(40,7,'COUNTRY','BR',0);
$pdf->Cell(155,7,'','B',1);
$pdf->Cell(40,7,'UNIVERSITY','BR',0);
$pdf->Cell(155,7,'','B',1);
$pdf->Cell(195,7,'','B',1);

$pdf->Cell(50,7,'PROPOSED PROGRAM','BR',0);
$pdf->Cell(145,7,'','B',1);

$pdf->Cell(20,35,'COURSES','BR',0);
$pdf->Cell(175,7,'1.','B',2);
$pdf->Cell(175,7,'2.','B',2);
$pdf->Cell(175,7,'3.','B',2);
$pdf->Cell(175,7,'4.','B',2);
$pdf->Cell(175,7,'5.','B',2);

$pdf->Cell(195,25,'','',1);

//Signatories
$pdf->SetFont('Arial','',9);
$pdf->Cell(35,7,'','',0);
$pdf->Cell(80,7,"Applicant's Signature Over Printed Name",'T',0,'C');
$pdf->Cell(30,7,'','',0);
$pdf->Cell(30,7,'Date','T',1,'C');

$pdf->Cell(165,7,'','',1);
$pdf->Cell(165,7,'','',1);
$pdf->Cell(35,7,'Assessed by: ','',0);
$pdf->Cell(165,7,'','',1);

$pdf->Cell(35,7,'','',0);
$pdf->Cell(80,7,"International Relations Coordinator",'T',0,'C');
$pdf->Cell(20,7,'','',0);
$pdf->Cell(50,7,'Signature and Date','T',1,'C');

$pdf->Cell(165,7,'','',1);
$pdf->Cell(165,7,'','',1);
$pdf->Cell(35,7,'Approved by: ','',0);
$pdf->Cell(165,7,'','',1);

$pdf->Cell(35,7,'','',0);
$pdf->Cell(80,7,"Program Chair",'T',0,'C');
$pdf->Cell(20,7,'','',0);
$pdf->Cell(50,7,'Signature and Date','T',1,'C');

$pdf->Cell(165,7,'','',1);
$pdf->Cell(165,7,'','',1);
$pdf->Cell(35,7,'Certified by: ','',0);
$pdf->Cell(165,7,'','',1);

$pdf->Cell(35,7,'','',0);
$pdf->Cell(80,7,"Dean",'T',0,'C');
$pdf->Cell(20,7,'','',0);
$pdf->Cell(50,7,'Signature and Date','T',1,'C');


$pdf->Output();
?>