<?php
require('fpdf/fpdf.php');

//db connection
$conn = mysqli_connect("localhost", "root", "","oirp_db");
$db = mysqli_select_db($conn, "oirp_db");

$studentno = "20180217001-outbound";

$sql = "select family_name,given_name,middle_name,gender,birthday from student where student_id = '".$studentno."'";
$result = $conn->query($sql);

while ($row = $result->fetch_array()){
	$family_name = $row['family_name'];
	$given_name = $row['given_name'];
	$middle_name = $row['middle_name'];
	$gender = $row['gender'];
	$birthday = $row['birthday'];
}



class PDF extends FPDF
{
// Page header
function Header()
{
	$this->SetY(10);
	
    // Images
    $this->Image('../img/line.png', 7,33,150,8);
    $this->Image('../img/triangle2.png',117,5,90,42);
    //$this->Image('../img/SHARE.png', 170,15,30);
    $this->Image('../img/AIMS.jpg',160,15,45);
    $this->Image('../img/ust.jpg', 7,5,25);
    
    //UST
    $this->SetFont('Arial','B',20);
    $this->Cell(25,5,'');
    $this->Cell(30,5,'University of Santo Tomas',0,2);
    $this->SetFont('Arial','',10);
    $this->Cell(175,7,'(Founded in 1611, Manila, Philippines)',0,2);
    $this->SetFont('Arial','',14);
    $this->Cell(175,3,'Office of International Relations and Programs',0,1);
    
    //Student
    $this->SetTextColor(255,255,255);
    $this->SetFont('Arial','B',12);
    $this->Cell(140,10,'','',1);
    $this->Cell(72,5,'Student exchange application form');
    $this->SetFont('Arial','',12);
    $this->Cell(10,5,'(Host University in Europe)',0,0);
    
    // Scholarship
    $this->SetFont('Arial','B',30);
    $this->SetTextColor(255,255,255);
    $this->Cell(113,7,'','',1,'R');
    
    //Inbound
    $this->SetTextColor(0,0,0);
   	$this->SetFont('Arial','BI',9);
   	$this->Cell(50,4,'First Term — August to December (Year)',0,1);
   	$this->SetFont('Arial','B',9);
   	$this->Cell(50,4,'FOR INBOUND STUDENTS — FORM _',0,0);
    
    // Line break
    $this->Ln(12);
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
$pdf->Cell(110,7,$family_name,'B',1);
$pdf->Cell(30,7,'GIVEN NAME','BR',0);
$pdf->Cell(110,7,$given_name,'B',1);
$pdf->Cell(30,7,'MIDDLE NAME','BR',0);
$pdf->Cell(110,7,$middle_name,'B',1);

$pdf->Cell(25,7,'GENDER','BR',0);
$pdf->Cell(35,7,$gender,'BR',0);
$pdf->Cell(30,7,'NATIONALITY','BR',0);
$pdf->Cell(50,7,'','B',1);
$pdf->Cell(25,7,'BIRTHDATE','BR',0);
$pdf->Cell(35,7,$birthday,'BR',0);
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
$pdf->Cell(165,7,'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean m','B',1);

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
$pdf->Cell(50,7,'HOME UNIVERSITY','BR',0);
$pdf->Cell(145,7,'','B',1);
$pdf->Cell(50,7,'DEGREE PROGRAM','BR',0);
$pdf->Cell(55,7,'','BR',0);
$pdf->Cell(20,7,'MAJOR','BR',0);
$pdf->Cell(70,7,'','B',1);
$pdf->Cell(50,7,'YEAR LEVEL','BR',0);
$pdf->Cell(145,7,'','B',1);

$pdf->Cell(195,7,'','B',1);

//Proposed Field of Study
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,'III. PROPOSED FIELD OF STUDY','TB',1);

$pdf->SetFont('Arial','',8);
$pdf->Cell(50,7,'PROPOSED PROGRAM','BR',0);
$pdf->Cell(145,7,'','B',1);

$pdf->Cell(50,35,'COURSES TO BE TAKEN AT UST','BR',0);
$pdf->Cell(145,7,'1.','B',2);
$pdf->Cell(145,7,'2.','B',2);
$pdf->Cell(145,7,'3.','B',2);
$pdf->Cell(145,7,'4.','B',2);
$pdf->Cell(145,7,'5.','B',1);

$pdf->Cell(30,7,'RESEARCH TOPIC','BR',0);
$pdf->Cell(165,7,'','B',1);
$pdf->Cell(55,7,'INTENDED SEMESTER TO STUDY','BR',0);
$pdf->Cell(140,7,'','B',1);
$pdf->Cell(55,7,'DISCIPLINARY ACTION AND STATUS','BR',0);
$pdf->Cell(40,7,'','BR',0);
$pdf->SetFont('Arial','',7);
$pdf->Cell(60,7,'REASON FOR STUDYING IN HOST UNIVERSITY','BR',0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(40,7,'','B',1);

$pdf->Cell(195,20,'','',1);

//English Proficiency
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,'IV. ENGLISH PROFICIENCY: (FOR NON-NATIVE SPEAKER OF ENGLISH)','TB',1);

$pdf->SetFont('Arial','',9);
$pdf->Cell(20,7,'','',0);
$pdf->Cell(120,7,'a.) Have you completed a TOEFL/IELTS test or equivalent in the last twelve months?','',1);
$pdf->Cell(40,7,'','',0);
$pdf->Cell(30,7,'Yes/No','',1);
$pdf->Cell(40,7,'','',0);
$pdf->Cell(35,7,'If yes, provide score: ','',0);
$pdf->Cell(30,5,'','B',1);
$pdf->Cell(10,3,'','',1);

$pdf->Cell(20,7,'','',0);
$pdf->Cell(120,7,'b.) Do you intend to take a TOEFL/IELTS test or equivalent in the immediate future?','',1);
$pdf->Cell(40,7,'','',0);
$pdf->Cell(70,7,'Yes/No','',1);
$pdf->Cell(40,7,'','',0);
$pdf->Cell(60,7,'If yes, provide type and date of test: ','',0);
$pdf->Cell(50,5,'','B',1);
$pdf->Cell(10,3,'','',1);

$pdf->Cell(20,7,'','',0);
$pdf->MultiCell(155,4,'c.) In the absence of TOEFL test or equivalent, English proficiency must be assessed by an English teacher in Home University:','',1);

$pdf->Cell(10,1,'','',1);

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
$pdf->Cell(3,3,'','',1);

//Student's Signature
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,"V. STUDENT'S SIGNATURE",'TB',1);

$pdf->SetFont('Arial','',9);
$pdf->MultiCell(195,5,'I hereby apply for admission to study at University of Santo Tomas. I confirm that the information provided above is correct to the best of my knowledge.','',1);
$pdf->Cell(195,7,'','',1);

$pdf->Cell(15,7,'','',0);
$pdf->Cell(80,7,"Signature",'T',0,'C');
$pdf->Cell(20,7,'','',0);
$pdf->Cell(40,7,'Date','T',1,'C');
$pdf->Cell(3,3,'','',1);


//Home Institution Approval
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,"VI. HOME INSTITUTION APPROVAL",'TB',1);

$pdf->SetFont('Arial','',9);
$pdf->MultiCell(195,5,'I certify that the above student has been approved for participation in the exchange program for the coming ____ term (year)','',1);
$pdf->Cell(195,7,'','',1);

$pdf->Cell(15,7,'','',0);
$pdf->Cell(100,7,"Signature of Exchange Coordinator/International Relations Officer",'T',0,'C');
$pdf->Cell(20,7,'','',0);
$pdf->Cell(40,7,'Date','T',1,'C');
$pdf->Cell(3,3,'','',1);

//Expectations
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,"VII. EXPECTATIONS FROM THE PROGRAM",'TB',1);
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(200,4,'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. N','',1);
$pdf->Cell(195,1,'','T');



$pdf->Output();
?>