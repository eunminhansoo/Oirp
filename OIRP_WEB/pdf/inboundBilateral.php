<?php
require('fpdf/fpdf.php');

//db connection
$conn = mysqli_connect("localhost", "root", "","oirp_db");
$db = mysqli_select_db($conn, "oirp_db");

$studentno = '20180309002-in';

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
$sql = "select citizenship_in,nationality_in,passport_num_in,validity_date_in,date_issuance_in,mailing_add_in,telephone_num_in,mobile_num_in from personal_info_inbound where student_id = '".$studentno."'";
$result = $conn->query($sql);

while ($row = $result->fetch_array()){
	$citizenship_in = $row['citizenship_in'];
	$nationality_in = $row['nationality_in'];
	$passport_num_in = $row['passport_num_in'];
	$validity_date_in = $row['validity_date_in'];
	$date_issuance_in = $row['date_issuance_in'];
	$mailing_add_in = $row['mailing_add_in'];
	$telephone_num_in = $row['telephone_num_in'];
	$mobile_num_in = $row['mobile_num_in'];
}


//person_contact_inbound
$sql = "select personal_contact_in_bila,relationship_in_bila,add_in_bila,email_add_in_bila,telephone_num_in_bila from personal_contact_inbound where student_id = '".$studentno."'";
$result = $conn->query($sql);

while($row = $result->fetch_array()){
	$personal_contact_in_bila = $row['personal_contact_in_bila'];
	$relationship_in_bila = $row['relationship_in_bila'];
	$add_in_bila = $row['add_in_bila'];
	$email_add_in_bila = $row['email_add_in_bila'];
	$telephone_num_in_bila = $row['telephone_num_in_bila'];
}

//educ_background_inbound
$sql = "select home_univ_in_bila,univ_add_in_bila,name_officer_contact_in_bila,designation_in_bila,email_add_in_bila,current_prog_study_in_bila,designation_in_bila,telephone_num_bila,specialization_in_bila,year_level,scholarship_in_bila,scholarship_text_in_bila,application_form,application_type_prog from educ_background_inbound where student_id = '".$studentno."'";
$result = $conn->query($sql);

while ($row = $result->fetch_array()){
	$home_univ_bila = $row['home_univ_bila'];
	$univ_add_in_bila = $row['univ_add_in_bila'];
	$current_prog_study_in_bila = $row['current_prog_study_in_bila'];
	$specialization_in_bila = $row['specialization_in_bila'];
	$year_level = $row['year_level'];
	$scholarship_in_bila = $row['scholarship_in_bila'];
	$scholarship_text_in_bila = $row['scholarship_text_in_bila'];
	$application_form = $row['application_form'];
	$application_type_prog = $row['application_type_prog'];
	$name_officer_contact_in_bila = $row['name_officer_contact_in_bila'];
	$designation_in_bila = $row['designation_in_bila'];
	$mailing_add_in = $row['mailing_add_in'];
	$telephone_num_in = $row['telephone_num_in'];
	$mobile_num_in = $row['mobile_num_in'];
}

if($scholarship_text_in_bila==null){
	$scholar = $scholarship_in_bila;
} else{
	$scholar = $scholarship_text_in_bila;
}

//proposed_field_study_in_bila
$sql = "select proposed_prog_inbound,course_1_inbound,course_2_inbound,course_3_inbound,course_4_inbound,course_5_inbound,research_topic_inbound,intended_sem_study_inbound,description_action_status_inbound,reason_studying_inbound,accomodation_inbound from proposed_field_study_in_bila where student_id ='".$studentno."'";
$result = $conn->query($sql);

while($row = $result->fetch_array()){
	$proposed_prog_inbound = $row['proposed_prog_inbound'];
	$course_1_inbound = $row['course_1_inbound'];
	$course_2_inbound = $row['course_2_inbound'];
	$course_3_inbound = $row['course_3_inbound'];
	$course_4_inbound = $row['course_4_inbound'];
	$course_5_inbound = $row['course_5_inbound'];
	$research_topic_inbound = $row['research_topic_inbound'];
	$intended_sem_study_inbound = $row['intended_sem_study_inbound'];
	$description_action_status_inbound = $row['description_action_status_inbound'];
	$reason_studying_inbound = $row['reason_studying_inbound'];
	$accomodation_inbound = $row['accomodation_inbound'];

}

//medical_english_inbound
$sql = "select do_you_smoke_inbound,describe_disabili_inbound,describe_ill_inbound,complete_toef_inbound,complete_toef_score_inbound,intend_take_toef_inbound,intend_take_toef_date_inbound,intend_take_toef_type_inbound from medical_english_inbound where student_id = '".$studentno."'";
$result = $conn->query($sql);

while($row = $result->fetch_array()){
	$do_you_smoke_inbound = $row['do_you_smoke_inbound'];
	$describe_disabili_inbound = $row['describe_disabili_inbound'];
	$describe_ill_inbound = $row['describe_ill_inbound'];
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
$pdf->Image('../img/ust.jpg', 100,5,22);

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

$pdf->SetFont('Arial','',8);
$pdf->Cell(30,7,'FAMILY NAME','BR',0);
$pdf->Cell(85,7,$family_name,'BR',0);
$pdf->Cell(20,7,'GENDER','BR',0);
$pdf->Cell(60,7,$gender,'B',1);
$pdf->Cell(30,7,'GIVEN NAME','BR',0);
$pdf->Cell(85,7,$given_name,'BR',0);
$pdf->Cell(20,7,'NATIONALITY','BR',0);
$pdf->Cell(60,7,$nationality_in,'B',1);
$pdf->Cell(30,7,'MIDDLE NAME','BR',0);
$pdf->Cell(85,7,$middle_name,'BR',0);
$pdf->Cell(20,7,'BIRTHDATE','BR',0);
$pdf->Cell(35,7,$birth_dec,'BR',0);
$pdf->Cell(10,7,'AGE','BR',0);
$pdf->Cell(15,7,$age,'B',1);

$pdf->Cell(25,7,'PASSPORT NO.','BR',0);
$pdf->Cell(35,7,$passport_num_in,'BR',0);
$pdf->Cell(30,7,'VALIDITY DATE','BR',0);
$pdf->Cell(40,7,$validity_date_in,'BR',0);
$pdf->Cell(30,7,'DATE OF ISSUANCE','BR',0);
$pdf->Cell(35,7,$date_issuance_in,'B',1);

$pdf->Cell(30,7,'MAILING ADDRESS','BR',0);
$pdf->Cell(165,7,$mailing_add_in,'B',1);

$pdf->Cell(195,7,'','B',1);

$pdf->Cell(30,7,'EMAIL ADDRESS','BR',0);
$pdf->Cell(165,7,$email,'B',1);

$pdf->Cell(35,7,'TELEPHONE NUMBER','BR',0);
$pdf->Cell(55,7,$telephone_num_in,'BR',0);
$pdf->Cell(30,7,'MOBILE NUMBER','BR',0);
$pdf->Cell(75,7,$mobile_num_in,'B',1);

$pdf->Cell(35,7,'PERSON TO CONTACT','BR',0);
$pdf->Cell(85,7,$personal_contact_in_bila,'BR',0);
$pdf->Cell(25,7,'RELATIONSHIP','BR',0);
$pdf->Cell(50,7,$relationship_in_bila,'B',1);
$pdf->Cell(20,7,'ADDRESS','BR',0);
$pdf->Cell(175,7,$add_in_bila,'B',1);
$pdf->Cell(30,7,'EMAIL ADDRESS','BR',0);
$pdf->Cell(80,7,$email_add_in_bila,'BR',0);
$pdf->Cell(35,7,'PHONE NUMBER','BR',0);
$pdf->Cell(50,7,$telephone_num_in_bila,'B',1);


//Educational Background
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,'II. EDUCATIONAL BACKGROUND','B',2);

$pdf->SetFont('Arial','',8);
$pdf->Cell(40,7,'HOME UNIVERSITY','BR',0);
$pdf->Cell(155,7,$home_univ_bila,'B',1);
$pdf->Cell(40,7,'UNIVERSITY ADDRESS','BR',0);
$pdf->Cell(155,7,$univ_add_in_bila,'B',1);
$pdf->Cell(50,7,'NAME OF OFFICER TO CONTACT','BR',0);
$pdf->Cell(80,7,$name_officer_contact_in_bila,'BR',0);
$pdf->Cell(30,7,'DESIGNATION','BR',0);
$pdf->Cell(35,7,$designation_in_bila,'B',1);
$pdf->Cell(50,7,'EMAIL ADDRESS OF OFFICER','BR',0);
$pdf->Cell(70,7,$email_add_in_bila,'BR',0);
$pdf->Cell(35,7,'TELEPHONE NUMBER','BR',0);
$pdf->Cell(40,7,$telephone_num_in_bila,'B',1);
$pdf->Cell(50,7,'CURRENT PROGRAM OF STUDY','BR',0);
$pdf->Cell(65,7,$current_prog_study_in_bila,'BR',0);
$pdf->Cell(25,7,'SPECIALIZATION','BR',0);
$pdf->Cell(55,7,$specialization_in_bila,'B',1);
$pdf->Cell(25,7,'YEAR LEVEL','BR',0);
$pdf->Cell(40,7,$year_level,'BR',0);
$pdf->Cell(70,7,'RECEPIENT OF SCHOLARSHIP/LOANS?','BR',0);
$pdf->Cell(30,7,$scholar,'B',1);


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

$pdf->Cell(55,7,'INTENDED SEMESTER TO STUDY','BR',0);
$pdf->Cell(35,7,$intended_sem_study_inbound,'BR',0);
$pdf->Cell(30,7,'RESEARCH TOPIC','BR',0);
$pdf->Cell(75,7,$research_topic_inbound,'B',1);
$pdf->SetFont('Arial','',7);
$pdf->Cell(60,7,'REASON FOR STUDYING IN HOST UNIVERSITY','BR',0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(40,7,$reason_studying_inbound,'BR',0);
$pdf->Cell(55,7,'DISCIPLINARY ACTION AND STATUS','BR',0);
$pdf->Cell(40,7,$description_action_status_inbound,'B',0);

$pdf->Cell(195,25,'','',1);

//English Proficiency
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,'IV. ENGLISH PROFICIENCY (For non-native speakers of English)','TB',1);

$pdf->SetFont('Arial','',9);
$pdf->Cell(20,6,'','',0);
$pdf->Cell(120,6,'a.) Have you completed a TOEFL/IELTS test or equivalent in the last twelve months?','',1);
$pdf->Cell(40,6,'','',0);
$pdf->Cell(10,7,$complete_toef_inbound,'',0);
$pdf->Cell(20,7,'','',0);
if($complete_toef_inbound=="Yes"){
	$pdf->Cell(15,7,'Score: ','',0);
	$pdf->Cell(20,5,$complete_toef_score_inbound,'B',1,'C');
} else{
	$pdf->Cell(35,7,'','',1);
}
$pdf->Cell(10,3,'','',1);

$pdf->Cell(20,6,'','',0);
$pdf->Cell(120,6,'b.) Do you intend to take a TOEFL/IELTS test or equivalent in the immediate future?','',1);
$pdf->Cell(40,6,'','',0);
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

$pdf->Cell(20,6,'','',0);
$pdf->MultiCell(155,4,'c.) In the absence of TOEFL test or equivalent, English proficiency must be assessed by an English teacher in Home University:','',1);

$pdf->Cell(10,1,'','',1);

$pdf->Cell(60,6,'','',0);
$pdf->Cell(25,6,'POOR','',0,'C');
$pdf->Cell(25,6,'FAIR','',0,'C');
$pdf->Cell(25,6,'GOOD','',0,'C');
$pdf->Cell(25,6,'EXCELLENT','',1,'C');

$pdf->Cell(50,7,'Reading','',0,'R');
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(80,62,3,3);
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(105,62,3,3);
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(130,62,3,3);
$pdf->Cell(25,7,'','',1,'C');
$pdf->Rect(155,62,3,3);


$pdf->Cell(50,7,'Writing','',0,'R');
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(80,69,3,3);
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(105,69,3,3);
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(130,69,3,3);
$pdf->Cell(25,7,'','',1,'C');
$pdf->Rect(155,69,3,3);

$pdf->Cell(50,7,'Speaking','',0,'R');
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(80,76,3,3);
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(105,76,3,3);
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(130,76,3,3);
$pdf->Cell(25,7,'','',1,'C');
$pdf->Rect(155,76,3,3);

$pdf->Cell(50,7,'Listening','',0,'R');
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(80,84,3,3);
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(105,84,3,3);
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(130,84,3,3);
$pdf->Cell(25,7,'','',1,'C');
$pdf->Rect(155,84,3,3);

$pdf->Cell(165,7,'','',1);

$pdf->Cell(25,6,'','',0);
$pdf->Cell(80,6,"Signature of your English teacher in Home University",'T',0,'C');
$pdf->Cell(20,6,'','',0);
$pdf->Cell(40,6,'Date','T',1,'C');

//Medical Information
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,"V. MEDICAL INFORMATION",'TB',1);

$pdf->SetFont('Arial','',8);
$pdf->Cell(30,7,'DO YOU SMOKE?','BR',0);
$pdf->Cell(20,7,$do_you_smoke_inbound,'BR',0);
$pdf->SetFont('Arial','',7);
$pdf->Cell(85,7,'DO YOU HAVE ANY PHYSICAL DISABILITIES/PERSONAL PROBLEMS?','BR',0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(60,7,$describe_disabili_inbound,'B',1);
$pdf->SetFont('Arial','',7);
$pdf->Cell(85,7,'DO YOU HAVE ANY SERIOUS ILLNESS, CONDITIONS, OR ALLERGIES?','BR',0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(110,7,$describe_ill_inbound,'B',1);

//Airport Pickup
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,"VI. AIRPORT PICKUP (Airport pickup service is arranged only for a group consisting at least 10 or more students)",'TB',1);

$pdf->SetFont('Arial','',8);
$pdf->Cell(45,7,'DATE AND TIME OF ARRIVAL','BR',0);
$pdf->Cell(40,7,'','BR',0);
$pdf->Cell(30,7,'FLIGHT NUMBER','BR',0);
$pdf->Cell(40,7,'','BR',0);
$pdf->Cell(30,7,'NAIA TERMINAL','BR',0);
$pdf->Cell(10,7,'','B',1);

//Insurance Information
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,"VII. INSURANCE INFORMATION",'TB',1);

$pdf->SetFont('Arial','',8);
$pdf->Cell(50,7,"INSURANCE COMPANY'S NAME",'BR',0);
$pdf->Cell(145,7,'','B',1);
$pdf->Cell(30,7,'POLICY NUMBER','BR',0);
$pdf->Cell(60,7,'','BR',0);
$pdf->Cell(60,7,'AMOUNT OF COVERAGE IN US DOLLARS','BR',0);
$pdf->Cell(45,7,'','B',1);

//Accomodation Information
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,"VIII. ACCOMMODATION INFORMATION",'TB',1);
$pdf->SetFont('Arial','',7);
$pdf->Cell(135,7,'DO YOU NEED ACCOMMODATION DURING THE STUDENT EXCHANGE PROGRAM? (SUBJECT TO AVAILABILITY)','BR',0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(60,7,$accomodation_inbound,'B',1);

//Student's Signature
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,"IX. STUDENT'S SIGNATURE",'TB',1);

$pdf->SetFont('Arial','',9);
$pdf->MultiCell(195,5,'I hereby apply for admission to study at University of Santo Tomas. I confirm that the information provided above is correct to the best of my knowledge.','',1);
$pdf->Cell(195,7,'','',1);

$pdf->Cell(15,7,'','',0);
$pdf->Cell(80,7,"Signature",'T',0,'C');
$pdf->Cell(20,7,'','',0);
$pdf->Cell(40,7,'Date','T',1,'C');

//Home Institution Approval
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,"X. HOME INSTITUTION APPROVAL",'TB',1);

$pdf->SetFont('Arial','',9);
$pdf->MultiCell(195,5,'I certify that the above student has been approved for participation in the exchange program for the coming ____ term (year)','',1);
$pdf->Cell(195,7,'','',1);

$pdf->Cell(15,7,'','',0);
$pdf->Cell(100,7,"Signature of Exchange Coordinator/International Relations Officer",'T',0,'C');
$pdf->Cell(20,7,'','',0);
$pdf->Cell(40,7,'Date','T',1,'C');

//Expectations
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,"XI. EXPECTATIONS FROM THE PROGRAM",'TB',1);
$pdf->SetFont('Arial','',9);
$pdf->Cell(195,3,'','',1);
$pdf->MultiCell(195,4,$expectation_prog,'',1);
$pdf->Cell(195,3,'','B');


$pdf->Output();
?>