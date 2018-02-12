<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{

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
//header for page1

// Images
$pdf->Image('img/ust.jpg', 100,5,22);

//UST
$pdf->SetFont('Arial','B',12);
$pdf->Cell(1,17,'','',1);
$pdf->Cell(205,8,'University of Santo Tomas','',1,'C');

$pdf->Line(73,34,152,34);

$pdf->SetFont('Arial','',8);
$pdf->Cell(205,3,'OFFICE OF INTERNATIONAL RELATIONS AND PROGRAMS',0,1,'C');

$pdf->Cell(1,5,'','',1);

// Scholarship
$pdf->SetFont('Arial','B',9);
$pdf->Cell(205,4,'Student Exchange Program','',1,'C');
$pdf->Cell(205,4,'Application Form for Inbound Program','',1,'C');


//2x2 pic
$pdf->Rect(156,4,50.8,50.8);

//Personal Information
$pdf->Cell(1,5,'','',1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,'I. PERSONAL INFORMATION','TB',2);

$pdf->Cell(30,7,'Family Name','BR',0);
$pdf->Cell(85,7,'','BR',0);
$pdf->Cell(20,7,'Gender','BR',0);
$pdf->Cell(60,7,'','B',1);
$pdf->Cell(30,7,'Given Name','BR',0);
$pdf->Cell(85,7,'','BR',0);
$pdf->Cell(20,7,'Nationality','BR',0);
$pdf->Cell(60,7,'','B',1);
$pdf->Cell(30,7,'Middle Name','BR',0);
$pdf->Cell(85,7,'','BR',0);
$pdf->Cell(20,7,'Birthdate','BR',0);
$pdf->Cell(35,7,'','BR',0);
$pdf->Cell(10,7,'Age','BR',0);
$pdf->Cell(15,7,'','B',1);

$pdf->Cell(25,7,'Passport No.','BR',0);
$pdf->Cell(35,7,'','BR',0);
$pdf->Cell(30,7,'Validity Date','BR',0);
$pdf->Cell(40,7,'','BR',0);
$pdf->Cell(30,7,'Date of Issuance','BR',0);
$pdf->Cell(35,7,'','B',1);

$pdf->Cell(30,7,'Mailing Address','BR',0);
$pdf->Cell(165,7,'','B',1);

$pdf->Cell(195,7,'','B',1);

$pdf->Cell(30,7,'Email Address','BR',0);
$pdf->Cell(165,7,'','B',1);

$pdf->Cell(30,7,'Telephone Number','BR',0);
$pdf->Cell(60,7,'','BR',0);
$pdf->Cell(30,7,'Mobile Number','BR',0);
$pdf->Cell(75,7,'','B',1);

$pdf->Cell(30,7,'Person to Contact','BR',0);
$pdf->Cell(90,7,'','BR',0);
$pdf->Cell(25,7,'Relationship','BR',0);
$pdf->Cell(50,7,'','B',1);
$pdf->Cell(20,7,'Address','BR',0);
$pdf->Cell(175,7,'','B',1);
$pdf->Cell(30,7,'Email Address','BR',0);
$pdf->Cell(80,7,'','BR',0);
$pdf->Cell(35,7,'Telephone Number','BR',0);
$pdf->Cell(50,7,'','B',1);


//Educational Background
$pdf->Cell(195,7,'II. EDUCATIONAL BACKGROUND','B',2);

$pdf->Cell(40,7,'Home University','BR',0);
$pdf->Cell(155,7,'','B',1);
$pdf->Cell(40,7,'University Address','BR',0);
$pdf->Cell(155,7,'','B',1);
$pdf->Cell(50,7,'Name of Officer to contact','BR',0);
$pdf->Cell(80,7,'','BR',0);
$pdf->Cell(30,7,'Designation','BR',0);
$pdf->Cell(35,7,'','B',1);
$pdf->Cell(50,7,'Email Address of Officer','BR',0);
$pdf->Cell(70,7,'','BR',0);
$pdf->Cell(35,7,'Telephone Number','BR',0);
$pdf->Cell(40,7,'','B',1);
$pdf->Cell(50,7,'Current Program of Study','BR',0);
$pdf->Cell(65,7,'','BR',0);
$pdf->Cell(25,7,'Specialization','BR',0);
$pdf->Cell(55,7,'','B',1);
$pdf->Cell(15,7,'Year','BR',0);
$pdf->Cell(35,7,'','BR',0);
$pdf->Cell(20,7,'Year Level','BR',0);
$pdf->Cell(35,7,'','BR',0);
$pdf->Cell(55,7,'Recepient of scholarship/loans?','BR',0);
$pdf->Cell(35,7,'','B',1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(85,7,'Does your university have a signed agreement with UST?','BR',0);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(20,7,'','BR',0);
$pdf->Cell(25,7,'Year Signed','BR',0);
$pdf->Cell(20,7,'','BR',0);
$pdf->Cell(25,7,'Year Renewed','BR',0);
$pdf->Cell(20,7,'','B',1);


//Proposed Field of Study
$pdf->Cell(195,7,'III. PROPOSED FIELD OF STUDY','TB',1);

$pdf->Cell(50,7,'Proposed Program','BR',0);
$pdf->Cell(145,7,'','B',1);

$pdf->Cell(50,35,'Courses to be taken at UST','BR',0);
$pdf->Cell(145,7,'1.','B',2);
$pdf->Cell(145,7,'2.','B',2);
$pdf->Cell(145,7,'3.','B',2);
$pdf->Cell(145,7,'4.','B',2);
$pdf->Cell(145,7,'5.','B',1);

$pdf->Cell(30,7,'Research Topic','BR',0);
$pdf->Cell(165,7,'','B',1);
$pdf->Cell(50,7,'Intended Semester to Study','BR',0);
$pdf->Cell(145,7,'','B',1);
$pdf->Cell(50,7,'Disciplinary Action and Status','BR',0);
$pdf->Cell(45,7,'','BR',0);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(55,7,'Reason for Studying in Host University','BR',0);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(45,7,'','B',1);

$pdf->Cell(195,5,'','',1);

//English Proficiency
$pdf->Cell(195,7,'IV. ENGLISH PROFICIENCY: (FOR NON-NATIVE SPEAKER OF ENGLISH)','TB',1);

$pdf->Cell(20,7,'','',0);
$pdf->Cell(120,7,'a.) Have you completed a TOEFL/IELTS test or equivalent in the last twelve months?','',1);
$pdf->Cell(40,7,'','',0);
$pdf->Cell(30,7,'Yes/No','',1);
$pdf->Cell(40,7,'','',0);
$pdf->Cell(35,7,'If yes, provide score: ','',0);
$pdf->Cell(30,5,'','B',1);
$pdf->Cell(10,2,'','',1);

$pdf->Cell(20,7,'','',0);
$pdf->Cell(120,7,'b.) Do you intend to take a TOEFL/IELTS test or equivalent in the immediate future?','',1);
$pdf->Cell(40,7,'','',0);
$pdf->Cell(70,7,'Yes/No','',1);
$pdf->Cell(40,7,'','',0);
$pdf->Cell(60,7,'If yes, provide type and date of test: ','',0);
$pdf->Cell(50,5,'','B',1);
$pdf->Cell(10,2,'','',1);

$pdf->Cell(20,7,'','',0);
$pdf->MultiCell(155,4,'c.) In the absence of TOEFL test or equivalent, English proficiency must be assessed by an English teacher in Home University:','',1);

$pdf->Cell(10,2,'','',1);

$pdf->Cell(60,7,'','',0);
$pdf->Cell(25,7,'POOR','',0,'C');
$pdf->Cell(25,7,'FAIR','',0,'C');
$pdf->Cell(25,7,'GOOD','',0,'C');
$pdf->Cell(25,7,'EXCELLENT','',1,'C');

$pdf->Cell(50,7,'Reading','',0,'R');
$pdf->Cell(25,7,'','',0,'C');
$pdf->Cell(25,7,'','',0,'C');
$pdf->Cell(25,7,'','',0,'C');
$pdf->Cell(25,7,'','',1,'C');

$pdf->Cell(50,7,'Writing','',0,'R');
$pdf->Cell(25,7,'','',0,'C');
$pdf->Cell(25,7,'','',0,'C');
$pdf->Cell(25,7,'','',0,'C');
$pdf->Cell(25,7,'','',1,'C');

$pdf->Cell(50,7,'Speaking','',0,'R');
$pdf->Cell(25,7,'','',0,'C');
$pdf->Cell(25,7,'','',0,'C');
$pdf->Cell(25,7,'','',0,'C');
$pdf->Cell(25,7,'','',1,'C');

$pdf->Cell(50,7,'Listening','',0,'R');
$pdf->Cell(25,7,'','',0,'C');
$pdf->Cell(25,7,'','',0,'C');
$pdf->Cell(25,7,'','',0,'C');
$pdf->Cell(25,7,'','',1,'C');

$pdf->Cell(165,7,'','',1);

$pdf->Cell(25,7,'','',0);
$pdf->Cell(80,7,"Signature of your English teacher in Home University",'T',0,'C');
$pdf->Cell(20,7,'','',0);
$pdf->Cell(40,7,'Date','T',1,'C');

//Medical Information
$pdf->Cell(195,7,"V. MEDICAL INFORMATION",'TB',1);
$pdf->Cell(30,7,'Do you smoke?','BR',0);
$pdf->Cell(20,7,'','BR',0);
$pdf->SetFont('Arial','B',7);
$pdf->Cell(70,7,'Do you have any physical disabilities/personal problems?','BR',0);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(75,7,'','B',1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(80,7,'Do you have any serious illness, conditions, or allergies?','BR',0);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(115,7,'','B',1);

//Airport Pickup
$pdf->Cell(195,7,"VI. AIRPORT PICKUP (Take note that airport pickup service is arranged only for a group consisting at least 10 or more students)",'TB',1);

$pdf->Cell(45,7,'Date and Time of Arrival','BR',0);
$pdf->Cell(40,7,'','BR',0);
$pdf->Cell(30,7,'Flight Number','BR',0);
$pdf->Cell(40,7,'','BR',0);
$pdf->Cell(30,7,'NAIA Terminal','BR',0);
$pdf->Cell(10,7,'','B',1);

//Insurance Information
$pdf->Cell(195,7,"VII. INSURANCE INFORMATION",'TB',1);

$pdf->Cell(50,7,"Insurance Company's Name",'BR',0);
$pdf->Cell(145,7,'','B',1);
$pdf->Cell(30,7,'Policy Number','BR',0);
$pdf->Cell(60,7,'','BR',0);
$pdf->Cell(55,7,'Amount of Coverage in US Dollars','BR',0);
$pdf->Cell(50,7,'','B',1);

//Accomodation Information
$pdf->Cell(195,7,"VIII. ACCOMODATION INFORMATION",'TB',1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(130,7,'Do you need accomodation during the student exchange program? (Subject to availability)','BR',0);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(65,7,'','B',1);

//Student's Signature
$pdf->Cell(195,7,"IX. STUDENT'S SIGNATURE",'TB',1);
$pdf->MultiCell(195,5,'I hereby apply for admission to study at University of Santo Tomas. I confirm that the information provided above is correct to the best of my knowledge.','',1);
$pdf->Cell(195,7,'','',1);

$pdf->Cell(15,7,'','',0);
$pdf->Cell(80,7,"Signature",'T',0,'C');
$pdf->Cell(20,7,'','',0);
$pdf->Cell(40,7,'Date','T',1,'C');

//Home Institution Approval
$pdf->Cell(195,7,"X. HOME INSTITUTION APPROVAL",'TB',1);
$pdf->MultiCell(195,5,'I certify that the above student has been approved for participation in the exchange program for the coming ____ term (year)','',1);
$pdf->Cell(195,7,'','',1);

$pdf->Cell(15,7,'','',0);
$pdf->Cell(100,7,"Signature of Exchange Coordinator/International Relations Officer",'T',0,'C');
$pdf->Cell(20,7,'','',0);
$pdf->Cell(40,7,'Date','T',1,'C');

//Expectations
$pdf->Cell(195,7,"XI. EXPECTATIONS FROM THE PROGRAM",'TB',1);
$pdf->Cell(3,7,'');
$pdf->Cell(189,7,'','B',1);
$pdf->Cell(3,7,'');
$pdf->Cell(189,7,'','B',1);
$pdf->Cell(3,7,'');
$pdf->Cell(189,7,'','B',1);
$pdf->Cell(195,2,'','',1);
$pdf->Cell(195,1,'','T',1);



$pdf->Output();
?>