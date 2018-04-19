<?php
//fetch.php;
include 'database_connection.php';
if(isset($_POST["view"]))
{
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE notification SET COMMENT_STATUS=1 WHERE COMMENT_STATUS=0";
  mysqli_query($conn, $update_query);
 }
 $query = "SELECT * FROM notification ORDER BY STUDENT_COUNT DESC LIMIT 10";
 $result = mysqli_query($conn, $query);
 $output = '';
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
  	$fullname = $row['LASTNAME'].", ".$row['FIRSTNAME']." ";
   $output .= '
   <li>
    <a href="#">
     <strong>'.$row["LASTNAME"].' '.$row["FIRSTNAME"].' has uploaded a pdf</strong><br />
    </a>
   </li>
   <li class="divider"></li>
   ';
  }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
 
 $query_1 = "SELECT * FROM notification WHERE comment_status=0";
 $result_1 = mysqli_query($conn, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>