<?php
require('fpdf/fpdf.php');

session_start();
$studentno = $_SESSION['student_id_session'];

//db connection
$conn = mysqli_connect("localhost", "root", "","oirp_db");
$db = mysqli_select_db($conn, "oirp_db");

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

$sql = "select nationality_out,passport_num_out,validity_date_out,date_issuance_out,mailing_add_out,telephone_num_out,mobile_num_out,college_institute_faculty_out,degree_prog_out,year_level_out from personal_info_outbound where student_id = '".$studentno."'";
$result = $conn->query($sql);

while ($row = $result->fetch_array()){
	$nationality_out = $row['nationality_out'];
	$passport_num_out = $row['passport_num_out'];
	$date_issuance_out = $row['date_issuance_out'];
	$validity_date_out = $row['validity_date_out'];
	$mailing_add_out = $row['mailing_add_out'];
	$telephone_num_out = $row['telephone_num_out'];
	$mobile_num_out = $row['mobile_num_out'];
	$college_institute_faculty_out = $row['college_institute_faculty_out'];
	$degree_prog_out = $row['degree_prog_out'];
	$year_level_out = $row['year_level_out'];
}

//guardian_info_outbound
$sql = "select father_name_out,occupation_dada_out,company_dada_out,address_dada_out,email_add_dada_out,contact_num_dada_out,annual_income_dada_out,
		mother_name_out,occupation_mom_out,company_mom_out,address_mom_out,email_add_mom_out,contact_num_mom_out,annual_income_mom_out from guardian_info_outbound where student_id = '".$studentno."'";
$result = $conn->query($sql);

while ($row = $result->fetch_array()){
	$father_name_out = $row['father_name_out'];
	$occupation_dada_out = $row['occupation_dada_out'];
	$company_dada_out = $row['company_dada_out'];
	$address_dada_out = $row['address_dada_out'];
	$email_add_dada_out = $row['email_add_dada_out'];
	$contact_num_dada_out = $row['contact_num_dada_out'];
	$annual_income_dada_out = $row['annual_income_dada_out'];
	$mother_name_out = $row['mother_name_out'];
	$occupation_mom_out = $row['occupation_mom_out'];
	$company_mom_out = $row['company_mom_out'];
	$address_mom_out = $row['address_mom_out'];
	$email_add_mom_out = $row['email_add_mom_out'];
	$contact_num_mom_out = $row['contact_num_mom_out'];
	$annual_income_mom_out = $row['annual_income_mom_out'];
}

//country_univ_outbound
$sql = "select country_out,university_out from country_univ_outbound where student_id = '".$studentno."'";
$result = $conn->query($sql);

while ($row = $result->fetch_array()){
	$country_out = $row['country_out'];
	$university_out = $row['university_out'];
}

//proposed_field_study 
$sql = "select proposed_prog,course_1,course_2,course_3,course_4,course_5,SCHOLARSHIP_LOAN_OTHER,SCHOLARSHIP_LOAN_OTHER1,type_of_program,type_of_form from proposed_field_study where student_id = '".$studentno."'";
$result = $conn->query($sql);

while($row = $result->fetch_array()){
	$proposed_prog = $row['proposed_prog'];
	$course_1 = $row['course_1'];
	$course_2 = $row['course_2'];
	$course_3 = $row['course_3'];
	$course_4 = $row['course_4'];
	$course_5 = $row['course_5'];
	$scholarship_outbound = $row['SCHOLARSHIP_LOAN_OTHER'];
	$scholarship_text_outbound = $row['SCHOLARSHIP_LOAN_OTHER1'];
	$application_form = $row['type_of_program'];
	$type_of_form = $row['type_of_form'];
}

if($application_form=="ShortStudy"){
	$application_form = "Short Study Abroad";
} else if($application_form=="StudyTour"){
	$application_form = "Study Tour";
} else if($application_form == "ServiceLearning"){
	$application_form = "Service Learning";
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
$pdf->Cell(205,4,$application_form,'',1,'C');
$pdf->Cell(205,4,'Application Form for Outbound Program','',1,'C');


//2x2 pic
$pdf->Rect(156,4,50.8,50.8);

//Personal Information
$pdf->Cell(1,10,'','',1);
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
$pdf->Cell(60,7,$nationality_out,'B',1);
$pdf->Cell(30,7,'MIDDLE NAME','BR',0);
$pdf->Cell(85,7,$middle_name,'BR',0);
$pdf->Cell(20,7,'BIRTHDATE','BR',0);
$pdf->Cell(35,7,$birth_dec,'BR',0);
$pdf->Cell(10,7,'AGE','BR',0);
$pdf->Cell(15,7,$age,'B',1);

$pdf->Cell(25,7,'PASSPORT NO.','BR',0);
$pdf->Cell(35,7,$passport_num_out,'BR',0);
$pdf->Cell(30,7,'VALIDITY DATE','BR',0);
$pdf->Cell(40,7,$validity_date_out,'BR',0);
$pdf->Cell(30,7,'DATE OF ISSUANCE','BR',0);
$pdf->Cell(35,7,$date_issuance_out,'B',1);

$pdf->Cell(30,7,'MAILING ADDRESS','BR',0);
$pdf->Cell(165,7,$mailing_add_out,'B',1);

$pdf->Cell(195,7,'','B',1);

$pdf->Cell(30,7,'EMAIL ADDRESS','BR',0);
$pdf->Cell(165,7,$email,'B',1);

$pdf->Cell(35,7,'TELEPHONE NUMBER','BR',0);
$pdf->Cell(55,7,$telephone_num_out,'BR',0);
$pdf->Cell(30,7,'MOBILE NUMBER','BR',0);
$pdf->Cell(75,7,$mobile_num_out,'B',1);

$pdf->Cell(195,7,'','B',1);

//Educational Background
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,'II. EDUCATIONAL BACKGROUND','B',2);

$pdf->SetFont('Arial','',8);
$pdf->Cell(50,7,'COLLEGE/FACULTY/INSTITUTE','BR',0);
$pdf->Cell(145,7,$college_institute_faculty_out,'B',1);
$pdf->Cell(50,7,'DEGREE PROGRAM','BR',0);
$pdf->Cell(145,7,$degree_prog_out,'B',1);
$pdf->Cell(50,7,'YEAR LEVEL','BR',0);
$pdf->Cell(145,7,$year_level_out,'B',1);

$pdf->Cell(195,7,'','B',1);

//Guardian's Information
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,"III. GUARDIAN'S INFORMATION",'B',2);

$pdf->SetFont('Arial','',8);
$pdf->Cell(40,7,"FATHER'S NAME",'BR',0);
$pdf->Cell(155,7,$father_name_out,'B',1);

$pdf->Cell(40,7,'OCCUPATION/POSITION','BR',0);
$pdf->Cell(60,7,$occupation_dada_out,'BR',0);
$pdf->Cell(25,7,'COMPANY','BR',0);
$pdf->Cell(70,7,$company_dada_out,'B',1);

$pdf->Cell(35,7,'ADDRESS','BR',0);
$pdf->Cell(160,7,$address_dada_out,'B',1);

$pdf->Cell(35,7,'CONTACT NUMBER','BR',0);
$pdf->Cell(50,7,$contact_num_dada_out,'BR',0);
$pdf->Cell(30,7,'EMAIL ADDRESS','BR',0);
$pdf->Cell(80,7,$email_add_dada_out,'B',1);

$pdf->Cell(40,7,'ANNUAL INCOME','BR',0);
$pdf->Cell(155,7,$annual_income_dada_out,'B',1);

$pdf->Cell(195,7,'','B',1);

$pdf->Cell(40,7,"MOTHER'S NAME",'BR',0);
$pdf->Cell(155,7,$mother_name_out,'B',1);

$pdf->Cell(40,7,'OCCUPATION/POSITION','BR',0);
$pdf->Cell(60,7,$occupation_mom_out,'BR',0);
$pdf->Cell(25,7,'COMPANY','BR',0);
$pdf->Cell(70,7,$company_mom_out,'B',1);

$pdf->Cell(35,7,'ADDRESS','BR',0);
$pdf->Cell(160,7,$address_mom_out,'B',1);

$pdf->Cell(35,7,'CONTACT NUMBER','BR',0);
$pdf->Cell(50,7,$contact_num_mom_out,'BR',0);
$pdf->Cell(30,7,'EMAIL ADDRESS','BR',0);
$pdf->Cell(80,7,$email_add_mom_out,'B',1);

$pdf->Cell(40,7,'ANNUAL INCOME','BR',0);
$pdf->Cell(155,7,$annual_income_mom_out,'B',1);

$pdf->Cell(195,20,'','',1);

//Proposed Field of Study
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,'III. PROPOSED FIELD OF STUDY','TB',1);

$pdf->SetFont('Arial','',8);
$pdf->Cell(40,7,'COUNTRY','BR',0);
$pdf->Cell(155,7,$country_out,'B',1);
$pdf->Cell(40,7,'UNIVERSITY','BR',0);
$pdf->Cell(155,7,$university_out,'B',1);
$pdf->Cell(40,7,'PROGRAM DURATION','BR',0);
$pdf->Cell(155,7,$type_of_form,'B',1);
$pdf->Cell(195,7,'','B',1);

$pdf->Cell(50,7,'PROPOSED PROGRAM','BR',0);
$pdf->Cell(145,7,$proposed_prog,'B',1);

$pdf->Cell(20,35,'COURSES','BR',0);
$pdf->Cell(175,7,'1. '.$course_1,'B',2);
$pdf->Cell(175,7,'2. '.$course_2,'B',2);
$pdf->Cell(175,7,'3. '.$course_3,'B',2);
$pdf->Cell(175,7,'4. '.$course_4,'B',2);
$pdf->Cell(175,7,'5. '.$course_5,'B',1);

$pdf->Cell(195,30,'','',1);

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