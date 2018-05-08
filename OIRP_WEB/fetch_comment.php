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
    $query = "SELECT * FROM notification ORDER BY STUDENT_COUNT DESC LIMIT 7";
    $result = mysqli_query($conn, $query);
    $output = '';
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $app_form = $row['APPLICATION_FORM'];
            $studentId = $row['STUDENT_ID'];
            $encryptStudentId = base64_encode($studentId);
            $fullname = $row['LASTNAME'].", ".$row['FIRSTNAME']." ";
        	$college = $row['COLLEGE'];
        	$course = $row['COURSE'];
            $status = $row['STATUS'];

            
            switch ($college){
            	case "Faculty of Sacred Theology":
        $output .= '
                    <li>
                            The '.$college.' updated the course: '.$course.' of '.$fullname.' to '.$status.'<br />
                        </a>
                    </li>
                    <li class="divider"></li>
                ';
        break;
        		case "Faculty of Philosophy":
        $output .= '
                    <li>
                            The '.$college.' updated the course: '.$course.' of '.$fullname.' to '.$status.'<br />
                        </a>
                    </li>
                    <li class="divider"></li>
                ';
        break;
        		case "Faculty of Canon Law":
        $output .= '
                    <li>
                            The '.$college.' updated the course: '.$course.' of '.$fullname.' to '.$status.'<br />
                        </a>
                    </li>
                    <li class="divider"></li>
                ';
        break;
        		case "Graduate School":
        $output .= '
                    <li>
                            The '.$college.' updated the course: '.$course.' of '.$fullname.' to '.$status.'<br />
                        </a>
                    </li>
                    <li class="divider"></li>
                ';
        break;
        		case "Alfredo M. Velayo College of Accountancy":
        $output .= '
                    <li>
                           The '.$college.' updated the course: '.$course.' of '.$fullname.' to '.$status.'<br />
                        </a>
                    </li>
                    <li class="divider"></li>
                ';
        break;
        		case "College of Architecture":
        $output .= '
                    <li>
                          The '.$college.' updated the course: '.$course.' of '.$fullname.' to '.$status.'<br />
                        </a>
                    </li>
                    <li class="divider"></li>
                ';
        break;
        		case "Faculty of Arts and Letters":
        $output .= '
                    <li>
                            The '.$college.' updated the course: '.$course.' of '.$fullname.' to '.$status.'<br />
                        </a>
                    </li>
                    <li class="divider"></li>
                ';
        break;
        		case "Faculty of Civil Law":
        $output .= '
                    <li>
                            The '.$college.' updated the course: '.$course.' of '.$fullname.' to '.$status.'<br />
                        </a>
                    </li>
                    <li class="divider"></li>
                ';
        break;
        		case "College of Commerce and Business Administration":
        $output .= '
                    <li>
                            The '.$college.' updated the course: '.$course.' of '.$fullname.' to '.$status.'<br />
                        </a>
                    </li>
                    <li class="divider"></li>
                ';
        break;
        		case "College of Education":
        $output .= '
                    <li>
                            The '.$college.' updated the course: '.$course.' of '.$fullname.' to '.$status.'<br />
                        </a>
                    </li>
                    <li class="divider"></li>
                ';
        break;
        		case "Faculty of Engineering":
        $output .= '
                    <li>
                            The '.$college.' updated the course: '.$course.' of '.$fullname.' to '.$status.' <br />
                        </a>
                    </li>
                    <li class="divider"></li>
                ';
        break;
        		case "College of Fine Arts and Design":
        $output .= '
                    <li>
                             The '.$college.' updated the course: '.$course.' of '.$fullname.' to '.$status.' <br />
                        </a>
                    </li>
                    <li class="divider"></li>
                ';
        break;
        		case "Institute of Information and Computing Sciences":
        $output .= '
                    <li>
                             The '.$college.' updated the course: '.$course.' of '.$fullname.' to '.$status.' <br />
                        </a>
                    </li>
                    <li class="divider"></li>
                ';
        break;
        		case "Faculty of Medicine and Surgery":
        $output .= '
                    <li>
                             The '.$college.' updated the course: '.$course.' of '.$fullname.' to '.$status.' <br />
                        </a>
                    </li>
                    <li class="divider"></li>
                ';
        break;
        		case "Conservatory of Music":
        $output .= '
                    <li>
                             The '.$college.' updated the course: '.$course.' of '.$fullname.' to '.$status.' <br />
                        </a>
                    </li>
                    <li class="divider"></li>
                ';
        break;
        		case "College of Nursing":
        $output .= '
                    <li>
                             The '.$college.' updated the course: '.$course.' of '.$fullname.' to '.$status.' <br />
                        </a>
                    </li>
                    <li class="divider"></li>
                ';
        break;
        		case "Faculty of Pharmacy":
        $output .= '
                    <li>
                             The '.$college.' updated the course: '.$course.' of '.$fullname.' to '.$status.' <br />
                        </a>
                    </li>
                    <li class="divider"></li>
                ';
        break;
        		case "Institute of Physical Education and Athletics":
        $output .= '
                    <li>
                             The '.$college.' updated the course: '.$course.' of '.$fullname.' to '.$status.' <br />
                        </a>
                    </li>
                    <li class="divider"></li>
                ';
        break;
        		case "College of Rehabilitation Sciences":
        $output .= '
                    <li>
                             The '.$college.' updated the course: '.$course.' of '.$fullname.' to '.$status.' <br />
                        </a>
                    </li>
                    <li class="divider"></li>
                ';
        break;
        		case "Institute of Religion":
        $output .= '
                    <li>
                             The '.$college.' updated the course: '.$course.' of '.$fullname.' to '.$status.' <br />
                        </a>
                    </li>
                    <li class="divider"></li>
                ';
        break;
        		case "College of Science":
        $output .= '
                    <li>
                             The '.$college.' updated the course: '.$course.' of '.$fullname.' to '.$status.' <br />
                        </a>
                    </li>
                    <li class="divider"></li>
                ';
        break;
        		case "College of Tourism and Hospitality Management":
        $output .= '
                    <li>
                             The '.$college.' updated the course: '.$course.' of '.$fullname.' to '.$status.' <br />
                        </a>
                    </li>
                    <li class="divider"></li>
                ';
        break;
            }
            
            
            if($app_form == "inbound"){
                $output .= '
                    <li>
                        <a href=admin_student_application_in.php?studentName='.urlencode($encryptStudentId).'>
                             '.$row["LASTNAME"].', '.$row["FIRSTNAME"].' has uploaded a pdf <br />
                        </a>
                    </li>
                    <li class="divider"></li>
                ';
            }else{
                if($app_form == "outbound"){
                    $output .= '
                    <li>
                        <a href=admin_student_application_out.php?studentName='.urlencode($studentId).'>
                             '.$row["LASTNAME"].', '.$row["FIRSTNAME"].' has uploaded a pdf <br />
                        </a>
                    </li>
                    <li class="divider"></li>
                ';
                }
            }
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