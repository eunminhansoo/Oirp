<?php
require('fpdf/fpdf.php');

session_start();
$studentno = $_SESSION['student_id_session'];

//db connection
$conn = mysqli_connect("localhost", "root", "","oirp_db");
$db = mysqli_select_db($conn, "oirp_db");


//student
$sql = "select email,family_name,given_name,middle_name,gender,birthday,age,birthplace from student where student_id = '".$studentno."'";
$result = $conn->query($sql);

while ($row = $result->fetch_array()){
	$email = $row['email'];
	$family_name = $row['family_name'];
	$given_name = $row['given_name'];
	$middle_name = $row['middle_name'];
	$gender = $row['gender'];
	$birthday = $row['birthday'];
	$age = $row['age'];
	$birthplace = $row['birthplace'];
}

$birth_dec = base64_decode($birthday);

//personal_info_inbound
$sql = "select nationality_in,passport_num_in,validity_date_in,date_issuance_in,mailing_add_in,telephone_num_in,mobile_num_in from personal_info_inbound where student_id = '".$studentno."'";
$result = $conn->query($sql);

while ($row = $result->fetch_array()){
	$nationality_in = $row['nationality_in'];
	$passport_num_in = $row['passport_num_in'];
	$validity_date_in = $row['validity_date_in'];
	$date_issuance_in = $row['date_issuance_in'];
	$mailing_add_in = $row['mailing_add_in'];
	$telephone_num_in = $row['telephone_num_in'];
	$mobile_num_in = $row['mobile_num_in'];
}

//educ_background_inbound
$sql = "select home_univ_in_bila,current_prog_study_in_bila,specialization_in_bila,year_level,SCHOLARSHIP_LOAN_OTHER,SCHOLARSHIP_LOAN_OTHER1,type_of_form,type_of_program from educ_background_inbound where student_id = '".$studentno."'";
$result = $conn->query($sql);

while ($row = $result->fetch_array()){
	$home_univ_in_bila = $row['home_univ_in_bila'];
	$current_prog_study_in_bila = $row['current_prog_study_in_bila'];
	$specialization_in_bila = $row['specialization_in_bila'];
	$year_level = $row['year_level'];
	$scholarship_in_bila = $row['SCHOLARSHIP_LOAN_OTHER'];
	$scholarship_text_in_bila = $row['SCHOLARSHIP_LOAN_OTHER1'];
	$application_form = $row['type_of_form'];
	$type_of_program = $row['type_of_program'];
}

//proposed_field_study_in_bila
$sql = "select proposed_prog_inbound,course_1_inbound,course_2_inbound,course_3_inbound,course_4_inbound,course_5_inbound,INTENDED_SEM_STUDY_INBOUND from proposed_field_study_in_bila where student_id ='".$studentno."'";
$result = $conn->query($sql);

while($row = $result->fetch_array()){
	$proposed_prog_inbound = $row['proposed_prog_inbound'];
	$course_1_inbound = $row['course_1_inbound'];
	$course_2_inbound = $row['course_2_inbound'];
	$course_3_inbound = $row['course_3_inbound'];
	$course_4_inbound = $row['course_4_inbound'];
	$course_5_inbound = $row['course_5_inbound'];
	$intended_sem_study_inbound = $row['INTENDED_SEM_STUDY_INBOUND'];
	
}

//medical_english_inbound
$sql = "select complete_toef_inbound,complete_toef_score_inbound,intend_take_toef_inbound,intend_take_toef_date_inbound,intend_take_toef_type_inbound from medical_english_inbound where student_id = '".$studentno."'";
$result = $conn->query($sql);

while($row = $result->fetch_array()){
	$complete_toef_inbound = $row['complete_toef_inbound'];
	$complete_toef_score_inbound = $row['complete_toef_score_inbound'];
	$intend_take_toef_inbound = $row['intend_take_toef_inbound'];
	$intend_take_toef_date_inbound = $row['intend_take_toef_date_inbound'];
	$intend_take_toef_type_inbound = $row['intend_take_toef_type_inbound'];
}

//expectation_prog_inbound
$sql = "select expectation_prog from expectation_prog_inbound where student_id = '".$studentno."'";
$result = $conn->query($sql);

while($row = $result->fetch_array()){
	$expectation_prog = $row['expectation_prog'];
}


class PDF extends FPDF
{
// Page header
function Header()
{
	$this->SetY(10);
	
    // Images
    $this->Image('../img/line.png', 7,32,150,8);
    $this->Image('../img/triangle2.png',117,5,90,35);
    $this->Image('../img/ust.jpg', 7,5,25);
    
    
    //UST
    $this->SetFont('Arial','B',20);
    $this->Cell(25,5,'');
    $this->Cell(30,5,'University of Santo Tomas',0,2);
    $this->SetFont('Arial','',10);
    $this->Cell(175,7,'(Founded in 1611, Manila, Philippines)',0,2);
    $this->SetFont('Arial','',14);
    $this->Cell(175,3,'Office of International Relations and Programs',0,2);
    $this->SetFont('Arial','',10);
    $this->Cell(175,7,'Student Exchange through Scholarship','',1);
    
    //Student
    $this->SetTextColor(255,255,255);
    $this->SetFont('Arial','B',12);
    $this->Cell(195,8,'APPLICATION FORM FOR INBOUND STUDENTS');
    
    
    // Line break
    $this->Ln(16);
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
if ($application_form=="AIMS"){
	$pdf->Image('../img/AIMS.jpg',150,12,45);
}
else if ($application_form=="SHARE"){
	$pdf->Image('../img/SHARE.png',150,12,50);
}
else if ($application_form=="UMAP"){
	$pdf->Image('../img/UMAP.png',150,12,60);
}

//2x2 pic
$pdf->Rect(155,43,50.8,50.8);

//Personal Information
$pdf->Cell(1,5,'','',1);
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
$pdf->Cell(50,7,$nationality_in,'B',1);
$pdf->Cell(25,7,'BIRTHDATE','BR',0);
$pdf->Cell(35,7,$birth_dec,'BR',0);
$pdf->Cell(30,7,'AGE','BR',0);
$pdf->Cell(50,7,$age,'B',1);

$pdf->Cell(25,7,'PASSPORT NO.','BR',0);
$pdf->Cell(35,7,$passport_num_in,'BR',0);
$pdf->Cell(30,7,'VALIDITY DATE','BR',0);
$pdf->Cell(40,7,$validity_date_in,'BR',0);
$pdf->Cell(30,7,'DATE OF ISSUANCE','TBR',0);
$pdf->Cell(35,7,$date_issuance_in,'TB',1);

$pdf->Cell(30,7,'MAILING ADDRESS','BR',0);
$pdf->Cell(165,7,$mailing_add_in,'B',1);

$pdf->Cell(195,7,'','B',1);

$pdf->Cell(35,7,'EMAIL ADDRESS','BR',0);
$pdf->Cell(160,7,$email,'B',1);

$pdf->Cell(35,7,'TELEPHONE NUMBER','BR',0);
$pdf->Cell(55,7,$telephone_num_in,'BR',0);
$pdf->Cell(30,7,'MOBILE NUMBER','BR',0);
$pdf->Cell(75,7,$mobile_num_in,'B',1);

$pdf->Cell(195,7,'','B',1);

//Educational Background
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,'II. EDUCATIONAL BACKGROUND','B',2);

$pdf->SetFont('Arial','',8);
$pdf->Cell(50,7,'HOME UNIVERSITY','BR',0);
$pdf->Cell(145,7,$home_univ_in_bila,'B',1);
$pdf->Cell(50,7,'DEGREE PROGRAM','BR',0);
$pdf->Cell(55,7,$current_prog_study_in_bila,'BR',0);
$pdf->Cell(20,7,'MAJOR','BR',0);
$pdf->Cell(70,7,$specialization_in_bila,'B',1);
$pdf->Cell(50,7,'YEAR LEVEL','BR',0);
$pdf->Cell(145,7,$year_level,'B',1);

$pdf->Cell(195,7,'','B',1);

//Proposed Field of Study
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,'III. PROPOSED FIELD OF STUDY','TB',1);

$pdf->SetFont('Arial','',8);
$pdf->Cell(50,7,'PROPOSED PROGRAM','BR',0);
$pdf->Cell(145,7,$proposed_prog_inbound,'B',1);

$pdf->Cell(50,35,'COURSES TO BE TAKEN AT UST','BR',0);
$pdf->Cell(145,7,'1. '.$course_1_inbound,'B',2);
$pdf->Cell(145,7,'2. '.$course_2_inbound,'B',2);
$pdf->Cell(145,7,'3. '.$course_3_inbound,'B',2);
$pdf->Cell(145,7,'4. '.$course_4_inbound,'B',2);
$pdf->Cell(145,7,'5. '.$course_5_inbound,'B',1);


//$pdf->Cell(195,50,'','',1);

//new page
$pdf->AddPage();

if ($application_form=="AIMS"){
	$pdf->Image('../img/AIMS.jpg',150,12,45);
}
else if ($application_form=="SHARE"){
	$pdf->Image('../img/SHARE.png',150,12,50);
}
else if ($application_form=="UMAP"){
	$pdf->Image('../img/UMAP.png',150,12,60);
}

//English Proficiency
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,'IV. ENGLISH PROFICIENCY: (FOR NON-NATIVE SPEAKER OF ENGLISH)','TB',1);

$pdf->SetFont('Arial','',9);
$pdf->Cell(20,7,'','',0);
$pdf->Cell(120,7,'a.) Have you completed a TOEFL/IELTS test or equivalent in the last twelve months?','',1);
$pdf->Cell(40,7,'','',0);
$pdf->Cell(10,7,$complete_toef_inbound,'',0);
$pdf->Cell(20,7,'','',0);
if($complete_toef_inbound=="Yes"){
	$pdf->Cell(15,7,'Score: ','',0);
	$pdf->Cell(20,5,$complete_toef_score_inbound,'B',1,'C');
} else{
	$pdf->Cell(35,7,'','',1);
}
$pdf->Cell(10,3,'','',1);

$pdf->Cell(20,7,'','',0);
$pdf->Cell(120,7,'b.) Do you intend to take a TOEFL/IELTS test or equivalent in the immediate future?','',1);
$pdf->Cell(40,7,'','',0);
$pdf->Cell(10,7,$intend_take_toef_inbound,'',0);
$pdf->Cell(20,7,'','',0);
if($intend_take_toef_inbound=="Yes"){
	$pdf->Cell(15,7,'Date: ','',0);
	$pdf->Cell(20,5,$intend_take_toef_date_inbound,'B',0,'C');
	$pdf->Cell(15,7,'Type: ','',0,'R');
	$pdf->Cell(40,5,$intend_take_toef_type_inbound,'B',1,'C');
	
} else{
	$pdf->Cell(35,7,'','',1);
}
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
$pdf->Rect(80,109,3,3);
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(105,109,3,3);
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(130,109,3,3);
$pdf->Cell(25,7,'','',1,'C');
$pdf->Rect(155,109,3,3);


$pdf->Cell(50,7,'Writing','',0,'R');
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(80,116,3,3);
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(105,116,3,3);
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(130,116,3,3);
$pdf->Cell(25,7,'','',1,'C');
$pdf->Rect(155,116,3,3);

$pdf->Cell(50,7,'Speaking','',0,'R');
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(80,123,3,3);
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(105,123,3,3);
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(130,123,3,3);
$pdf->Cell(25,7,'','',1,'C');
$pdf->Rect(155,123,3,3);

$pdf->Cell(50,7,'Listening','',0,'R');
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(80,130,3,3);
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(105,130,3,3);
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(130,130,3,3);
$pdf->Cell(25,7,'','',1,'C');
$pdf->Rect(155,130,3,3);

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
$pdf->MultiCell(195,5,'I certify that the above student has been approved for participation in the exchange program for the coming '.$intended_sem_study_inbound.'.','',1);
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
$pdf->Cell(195,3,'','',1);
$pdf->MultiCell(195,4,$expectation_prog,'',1);
$pdf->Cell(195,3,'','B');



$pdf->Output();
?>