<?php
    if(isset($_POST['logoutbtn'])){
        session_start();
        session_unset();
        session_destroy();
        ob_start();
        ob_end_flush();
        header("Location: index.php");
    }

	// if($_SESSION['valid'] == 'valid'){
    //     if($_SESSION['admin'] == 'login'){
	// 		if($_SESSION['superadmin'] == 'oirp'){
	// 			header("Location: administrator.php");
	// 		}else{
	// 			$_SESSION['collegeName'] = $rrow['college'];
	// 			header("Location: administrator_college.php");
	// 		}
	//     }
	// }else{
    //     header("Location: index.php");
    // }

    // if($_SESSION['stuValid'] == 'yes'){
	// 	header("Location: student_home.php");
	// }else{
    //     header("Location: index.php");
    // }
?>