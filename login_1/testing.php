<?php
include 'helper_modules.php';
// $ver = date("Y-m-d");
// $ver = 2;
// echo 'I love '."hello $ver";

// function get_topics_for_course($course_id)
// {
//    $conn=connectToDatabase();
//      $sql="SELECT coursetop.top_id, topics.top_name FROM topics INNER JOIN coursetop ON topics.top_id=coursetop.top_id WHERE coursetop.c_id=$course_id";
//    $retval=mysql_query($sql,$conn);
   
//    if(!$retval )
//    {
//      die('Could not get data: ' . mysql_error());
//    }
//    $result=array();
//    while($row=mysql_fetch_assoc($retval))
//    {
//       $result[] = $row;
//    }
//    endDatabaseConnection($conn);
//    return $result;
// }
//relationUnassignCourse_Fac();
// invite_faculty(2,1); //courseid,facid
// $result=display_course_for_fac(1);
// echo $result[0]["course_name"]." ".$result[0]["c_id"]." ".$result[0]["course_admin"]." ".$result[0]["fname"]." ".$result[0]["lname"];
// accept_course(2,1);
// $danger=get_danger_course('ravi1996');
// // echo "hello";
// foreach ($danger as $value) {
// //    # code...
// $pf=get_faculty_pending($value['c_id']);
// $af=get_faculty_accepted($value['c_id']);
// echo   $value['c_id']." : ".$value['course_name']."<br>".$value['course_category'];
// foreach ($pf as $value1) {
//     echo $value1['fname']." ".$value1['lname']." @".$value1['userid'];
//     echo "<br>";
// }
// echo        $value['brief_overview']."<br>".$value['air_date'];
// }

 // $danger=get_danger_course('ravi1996');
 // echo " <div class='row'>";
 // foreach ($danger as $value) {
 //     # code...
 //  $pf=get_faculty_pending($value['c_id']);
 //  $af=get_faculty_accepted($value['c_id']);
 // echo    "<div class='col-md-4 col-sm-4'>
 //          <div class='panel panel-danger'>
 //          <div class='panel-heading'>
 //              ".$value['c_id']." : ".$value['course_name'].
 //          "</div>
 //          <div class='panel-body'>
 //              <h4>Course Category:</h4>
 //              <p>".$value['course_category']."</p>
 //              <h4>Pending Faculty:</h4>";
 //  foreach ($pf as $value1) {
 //      echo $value1['fname']." ".$value1['lname']." @".$value1['userid'];
 //      echo "<br>";
 //  }
 //  echo        "<p>".$value['brief_overview']."</p>
 //              </div>
 //          <div class='panel-footer'>"
 //              .$value['air_date']."
 //          </div>
 //      </div>
 //      </div>";
 //  }
 //  echo "</div>";
createAdminQuery();
?>
