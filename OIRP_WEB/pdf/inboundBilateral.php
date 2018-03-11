<?php
require('fpdf/fpdf.php');

//db connection
$conn = mysqli_connect("localhost", "root", "","oirp_db");
$db = mysqli_select_db($conn, "oirp_db");

$studentno = '20180308004-in';

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

$sql = "select home_univ_bila,univ_add_in_bila,name_officer_contact_in_bila,email_add_in_bila,current_prog_study_in_bila,designation_in_bila,telephone_num_bila,specialization_in_bila,year_level,scholarship_in_bila,scholarship_text_in_bila,application_form,application_type_prog from educ_background_inbound where student_id = '".$studentno."'";
$result = $conn->query($sql);

while ($row = $result->fetch_array()){
	$home_univ_bila = $row['home_univ_bila'];
	$univ_add_in_bila = $row['univ_add_in_bila'];
	$current_prog_study_in_bila = $row['current_prog_study_in_bila'];
	$specialization = $row['specialization'];
	$year_level = $row['year_level'];
	$scholarship_in_bila = $row['scholarship_in_bila'];
	$scholarship_text_in_bila = $row['scholarship_text_in_bila'];
	$application_form = $row['application_form'];
	$application_type_prog = $row['application_type_prog'];
	$name_officer_contact_in_bila = $row['name_officer_contact_in_bila'];
	$mailing_add_in = $row['mailing_add_in'];
	$telephone_num_in = $row['telephone_num_in'];
	$mobile_num_in = $row['mobile_num_in'];
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
$pdf->Cell(60,7,'','B',1);
$pdf->Cell(30,7,'MIDDLE NAME','BR',0);
$pdf->Cell(85,7,$middle_name,'BR',0);
$pdf->Cell(20,7,'BIRTHDATE','BR',0);
$pdf->Cell(35,7,$birth_dec,'BR',0);
$pdf->Cell(10,7,'AGE','BR',0);
$pdf->Cell(15,7,$age,'B',1);

$pdf->Cell(25,7,'PASSPORT NO.','BR',0);
$pdf->Cell(35,7,'','BR',0);
$pdf->Cell(30,7,'VALIDITY DATE','BR',0);
$pdf->Cell(40,7,'','BR',0);
$pdf->Cell(30,7,'DATE OF ISSUANCE','BR',0);
$pdf->Cell(35,7,'','B',1);

$pdf->Cell(30,7,'MAILING ADDRESS','BR',0);
$pdf->Cell(165,7,'','B',1);

$pdf->Cell(195,7,'','B',1);

$pdf->Cell(30,7,'EMAIL ADDRESS','BR',0);
$pdf->Cell(165,7,$email,'B',1);

$pdf->Cell(35,7,'TELEPHONE NUMBER','BR',0);
$pdf->Cell(55,7,'','BR',0);
$pdf->Cell(30,7,'MOBILE NUMBER','BR',0);
$pdf->Cell(75,7,'','B',1);

$pdf->Cell(35,7,'PERSON TO CONTACT','BR',0);
$pdf->Cell(85,7,'','BR',0);
$pdf->Cell(25,7,'RELATIONSHIP','BR',0);
$pdf->Cell(50,7,'','B',1);
$pdf->Cell(20,7,'ADDRESS','BR',0);
$pdf->Cell(175,7,'','B',1);
$pdf->Cell(30,7,'EMAIL ADDRESS','BR',0);
$pdf->Cell(80,7,'','BR',0);
$pdf->Cell(35,7,'PHONE NUMBER','BR',0);
$pdf->Cell(50,7,'','B',1);


//Educational Background
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,'II. EDUCATIONAL BACKGROUND','B',2);

$pdf->SetFont('Arial','',8);
$pdf->Cell(40,7,'HOME UNIVERSITY','BR',0);
$pdf->Cell(155,7,'','B',1);
$pdf->Cell(40,7,'UNIVERSITY ADDRESS','BR',0);
$pdf->Cell(155,7,'','B',1);
$pdf->Cell(50,7,'NAME OF OFFICER TO CONTACT','BR',0);
$pdf->Cell(80,7,'','BR',0);
$pdf->Cell(30,7,'DESIGNATION','BR',0);
$pdf->Cell(35,7,'','B',1);
$pdf->Cell(50,7,'EMAIL ADDRESS OF OFFICER','BR',0);
$pdf->Cell(70,7,'','BR',0);
$pdf->Cell(35,7,'TELEPHONE NUMBER','BR',0);
$pdf->Cell(40,7,'','B',1);
$pdf->Cell(50,7,'CURRENT PROGRAM OF STUDY','BR',0);
$pdf->Cell(65,7,'','BR',0);
$pdf->Cell(25,7,'SPECIALIZATION','BR',0);
$pdf->Cell(55,7,'','B',1);
$pdf->Cell(25,7,'YEAR LEVEL','BR',0);
$pdf->Cell(40,7,'','BR',0);
$pdf->Cell(70,7,'RECEPIENT OF SCHOLARSHIP/LOANS?','BR',0);
$pdf->Cell(30,7,'','B',1);


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

$pdf->Cell(55,7,'INTENDED SEMESTER TO STUDY','BR',0);
$pdf->Cell(35,7,'','BR',0);
$pdf->Cell(30,7,'RESEARCH TOPIC','BR',0);
$pdf->Cell(75,7,'','B',1);
$pdf->SetFont('Arial','',7);
$pdf->Cell(60,7,'REASON FOR STUDYING IN HOST UNIVERSITY','BR',0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(40,7,'','BR',0);
$pdf->Cell(55,7,'DISCIPLINARY ACTION AND STATUS','BR',0);
$pdf->Cell(40,7,'','B',0);

$pdf->Cell(195,25,'','',1);

//English Proficiency
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,'IV. ENGLISH PROFICIENCY (For non-native speakers of English)','TB',1);

$pdf->SetFont('Arial','',8);
$pdf->Cell(20,6,'','',0);
$pdf->Cell(120,6,'a.) Have you completed a TOEFL/IELTS test or equivalent in the last twelve months?','',1);
$pdf->Cell(40,6,'','',0);
$pdf->Cell(30,6,'Yes/No','',1);
$pdf->Cell(40,6,'','',0);
$pdf->Cell(35,6,'If yes, provide score: ','',0);
$pdf->Cell(30,4,'','B',1);
$pdf->Cell(10,1,'','',1);

$pdf->Cell(20,6,'','',0);
$pdf->Cell(120,6,'b.) Do you intend to take a TOEFL/IELTS test or equivalent in the immediate future?','',1);
$pdf->Cell(40,6,'','',0);
$pdf->Cell(70,6,'Yes/No','',1);
$pdf->Cell(40,6,'','',0);
$pdf->Cell(60,6,'If yes, provide type and date of test: ','',0);
$pdf->Cell(50,4,'','B',1);
$pdf->Cell(10,1,'','',1);

$pdf->Cell(20,6,'','',0);
$pdf->MultiCell(155,3,'c.) In the absence of TOEFL test or equivalent, English proficiency must be assessed by an English teacher in Home University:','',1);

$pdf->Cell(10,1,'','',1);

$pdf->Cell(60,6,'','',0);
$pdf->Cell(25,6,'POOR','',0,'C');
$pdf->Cell(25,6,'FAIR','',0,'C');
$pdf->Cell(25,6,'GOOD','',0,'C');
$pdf->Cell(25,6,'EXCELLENT','',1,'C');

$pdf->Cell(50,7,'Reading','',0,'R');
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(80,66,3,3);
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(105,66,3,3);
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(130,66,3,3);
$pdf->Cell(25,7,'','',1,'C');
$pdf->Rect(155,66,3,3);


$pdf->Cell(50,7,'Writing','',0,'R');
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(80,73,3,3);
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(105,73,3,3);
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(130,73,3,3);
$pdf->Cell(25,7,'','',1,'C');
$pdf->Rect(155,73,3,3);

$pdf->Cell(50,7,'Speaking','',0,'R');
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(80,80,3,3);
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(105,80,3,3);
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(130,80,3,3);
$pdf->Cell(25,7,'','',1,'C');
$pdf->Rect(155,80,3,3);

$pdf->Cell(50,7,'Listening','',0,'R');
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(80,87,3,3);
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(105,87,3,3);
$pdf->Cell(25,7,'','',0,'C');
$pdf->Rect(130,87,3,3);
$pdf->Cell(25,7,'','',1,'C');
$pdf->Rect(155,87,3,3);

$pdf->Cell(165,6,'','',1);

$pdf->Cell(25,6,'','',0);
$pdf->Cell(80,6,"Signature of your English teacher in Home University",'T',0,'C');
$pdf->Cell(20,6,'','',0);
$pdf->Cell(40,6,'Date','T',1,'C');

//Medical Information
$pdf->SetFont('Arial','B',9);
$pdf->Cell(195,7,"V. MEDICAL INFORMATION",'TB',1);

$pdf->SetFont('Arial','',8);
$pdf->Cell(30,7,'DO YOU SMOKE?','BR',0);
$pdf->Cell(20,7,'','BR',0);
$pdf->SetFont('Arial','',7);
$pdf->Cell(85,7,'DO YOU HAVE ANY PHYSICAL DISABILITIES/PERSONAL PROBLEMS?','BR',0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(60,7,'','B',1);
$pdf->SetFont('Arial','',7);
$pdf->Cell(85,7,'DO YOU HAVE ANY SERIOUS ILLNESS, CONDITIONS, OR ALLERGIES?','BR',0);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(110,7,'','B',1);

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
$pdf->Cell(60,7,'','B',1);

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
$pdf->MultiCell(200,4,'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. N','',1);
$pdf->Cell(195,1,'','T');



$pdf->Output();
?>