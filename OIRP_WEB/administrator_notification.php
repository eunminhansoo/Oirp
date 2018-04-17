<?php
	include 'database_connection.php';

	?>
<html>
 
<head>
 
 <title>Notification using PHP Ajax Bootstrap</title>
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>
 
<body>
 
 <br /><br />
 
 <div class="container">
 
  <nav class="navbar navbar-inverse">
 
   <div class="container-fluid">
 
    <div class="navbar-header">
 
     <a class="navbar-brand" href="#">PHP Notification Tutorial</a>
 
    </div>
 
    <ul class="nav navbar-nav navbar-right">
 
     <li class="dropdown">
 
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"><?php echo $comment_count;?></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
 
      <ul class="dropdown-menu"></ul>
 
     </li>
 
    </ul>
 
   </div>
 
  </nav>
 
  <br />
 
 
  </form>
 
 
 </div>
</body>
 
</html> 


<script> 
$(document).ready(function(){
 
// updating the view with notifications using ajax
 
function load_unseen_notification(btn_submit = '')
 
{
 
 $.ajax({
 
  url:"fetch_comment.php",
  method:"POST",
  data:{btn_submit:btn_submit},
  dataType:"json",
  success:function(data)
 
  {
 
   $('.dropdown-menu').html(data.notification);
 
   if(data.unseen_notification > 0)
   {
    $('.count').html(data.unseen_notification);
   }
 
  }
 
 });
 
}
 
load_unseen_notification();
 
 
// load new notifications
 
$(document).on('click', '.dropdown-toggle', function(){
 
 $('.count').html('');
 
 load_unseen_notification('yes');
 
});
 
setInterval(function(){
 
 load_unseen_notification();;
 
}, 5000);
 
});
 
</script>

<?php
 

   $update_query = "UPDATE notification SET COMMENT_STATUS = 1 WHERE COMMENT_STATUS= 0";
   mysqli_query($conn, $update_query);

 
$query = "SELECT * FROM notification ORDER BY STUDENT_COUNT DESC LIMIT 10";
$result = mysqli_query($conn, $query);
$output = '';
 
if(mysqli_num_rows($result) > 0)
{
 
while($row = mysqli_fetch_array($result))
 
{
  $output .= '
  <li>
  <a href="Oirp_capstone/OIRP_WEB/administrator_notification.php">
  <strong>'.$row['LASTNAME'].", ".$row['FIRSTNAME'].'</strong><br />
  <small><em>"has uploaded a PDF"</em></small>
  </a>
  </li>
 
  ';
}
}
 
else{
    $output .= '<li><a href="administrator_notification.php" class="text-bold text-italic">No Notifications Found</a></li>';
}
 
$status_query = "SELECT * FROM notification WHERE COMMENT_STATUS=0";
$result_query = mysqli_query($conn, $status_query);
$count = mysqli_num_rows($result_query);
 
$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
 
echo json_encode($data);

?>