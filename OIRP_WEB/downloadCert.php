<?php
	include 'database_connection.php';
	if(isset($_GET['cOc'])){
		$studenId = $_GET['cOc'];
		$res2 = mysqli_query($conn, "SELECT * FROM certificateofcompletion WHERE STUDENT_ID = '$studenId'");
        while($row = mysqli_fetch_array($res2)){
            $cert = $row['CERTIFICATION'];
        }
		$name = "images/".$cert;
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename($name).'"');
		header('Content-Length:'.filesize($name));
		readfile($name);
	}
?>