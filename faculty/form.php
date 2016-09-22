<?php
    include('../login/session.php');
    include('../login/info.php');
    include('../login/helper_modules.php');
    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);
    $fac_id = 1;
    $result = array();
    $course_id = 1;
    $topic_id = 1;
    $sub_topic_id = 1;
    $result_topic = array();
    $result_all_topic = array();
    $result_sub_topic = array();
    $result_all_sub_topic = array();
    $flagTopic = 0;
    if(isset($_SESSION['role_id'])){

        $fac_id = $_SESSION['role_id'];
        $result = get_course_for_faculty($fac_id);
        if(sizeof($result) > 0){
            $count_courses=0;
            foreach($result as $option) {
                $course_id = $option['c_id'];
                $temp_topic = get_topics_for_course($course_id);
                if($count_courses == 0)
                    $result_topic = $temp_topic;
                $count_topics=0;
                foreach($temp_topic as $option1) {
                    $flagTopic = 1;
                    $topic_id = $option1['tid'];
                    $result_all_sub_topic[$topic_id] = get_subtopics_for_topic($topic_id);
                    /*if($count_courses == 0 && $count_topics == 0)
                        $result_sub_topic = $result_all_sub_topic[$topic_id];*/
                    $count_topics++;
                }
                $result_all_topic[$course_id] = $temp_topic;
                $count_courses++;
            }
        }
       /* if(isset($_POST['select_course'])){
            $course_id = $_POST['select_course'];
            echo $course_id;
            $result_topic = get_topics_for_course($course_id);
            array_push($result_topic,23,"blue");
            if(isset($_POST['select_topic'])){
                $topic_id = $_POST['select_topic'];
                $result_sub_topic = get_sub_topics_for_course($topic_id);
            }
        }*/
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Free Bootstrap Admin Theme : Master</title>
	<!-- Bootstrap Styles-->
    <link href="../dashboard/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="../dashboard/assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="../dashboard/assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
   <script type="text/javascript">
      $(document).ready(function(){
      });
   </script>
   <script type="text/javascript">
        function show() {
                          var getTID = $('#select_topic').val();
                          var ch = 'newtopic';
                          var getpID = $("#select_sub_topic").val();
                          var value = 'newsubtopic';

                          document.getElementById('area').style.display = 'block';
                          document.getElementById('area3').style.display = 'block';
                          document.getElementById('area5').style.display = 'block';
                          document.getElementById('area5').required = true; 
                          document.getElementById("fileToUpload").required = true;
                          document.getElementById("area2").required = true;
                              if(getTID === ch)
                                {
                                    document.getElementById('area1').style.display = 'block';
                                    document.getElementById("area1").required = true;
                                    if(getpID === value){
                                        document.getElementById('area2').style.display = 'block';
                                        document.getElementById("area2").required = true;
                                    }
                                }  
                                //alert("kla");
                            }
        function none() {
            //alert("kola");
            var getTID = $('#select_topic').val();
            var ch = 'newtopic';
            var getpID = $("#select_sub_topic").val();
            var value = 'newsubtopic';
            document.getElementById("fileToUpload").required = false;
                if(getTID === ch){
                    document.getElementById("area2").required = false;
                }
                else{
                    if(getpID === value)
                        document.getElementById("area2").required = true;
                    else
                        document.getElementById("area2").required = false;
                }
            document.getElementById('area').style.display = 'none';
            document.getElementById('area3').style.display = 'none';
            document.getElementById('area5').style.display = 'none';
            document.getElementById('area5').required = false; 
            
            }


        function hide() {
                          var getTID = $('#select_topic').val();
                          var ch = 'newtopic';
                          var getpID = $("#select_sub_topic").val();
                          var value = 'newsubtopic';
                          
                          document.getElementById('area').style.display = 'none';
                          document.getElementById('area3').style.display = 'none';
                          document.getElementById('area5').style.display = 'none';
                          document.getElementById('area5').required = false; 
                          document.getElementById("fileToUpload").required = true;
                          document.getElementById("area2").required = true;
                            if(getTID === ch)
                                {
                                    document.getElementById('area1').style.display = 'block';
                                    document.getElementById("area1").required = true;
                                    if(getpID === value){
                                        document.getElementById('area2').style.display = 'block';
                                        document.getElementById("area2").required = true;
                                    }
                                } 
                                //alert("meow");
                         }


        var my_courses = <?php echo json_encode($result); ?>;
        var my_topics = JSON.parse( '<?php echo json_encode($result_all_topic) ?>' );
        var my_subtopics = <?php echo json_encode($result_all_sub_topic); ?>;
        var my_courses = <?php echo json_encode($result); ?>;
        function handleChange() {
            alert("HELLLLO OOO");
            var getCID = $('#select_course').val();
            var indCourse = 0;
            $("#select_topic").empty();
            $("#select_sub_topic").empty();
            var newOptions = $("#select_topic");
            var toosize = 0;
            //alert(my_courses.length);
            //alert(my_topics[$('#select_course').val()].length);
            var key = 'Add new Topic';
            var value = 'newtopic';
            var key1 = 'Add new Sub-Topic';
            var value1 = 'newsubtopic';
            var newOptions1 = $("#select_sub_topic");
            newOptions1.append(new Option(key1, value1));
            newOptions.append(new Option(key, value));
            for(var j = 0; j < my_topics[getCID].length; j++){
                value = my_topics[getCID][j]['tid'];
                key = my_topics[$('#select_course').val()][j]['tname'] + '-[' + my_topics[$('#select_course').val()][j]['tid'] + ']'; 
                newOptions.append(new Option(key, value));
            }
            document.getElementById('area1').style.display = 'block';
            document.getElementById('area2').style.display = 'block';
            document.getElementById("area1").required = true;
            document.getElementById("area2").required = true;
        }
        function handleChangeTopic() {
            
            var getTID = $('#select_topic').val();
            var ch = 'newtopic';
            var key = 'Add new Sub-Topic';
            var value = 'newsubtopic';
            var newOptions = $("#select_sub_topic");
            $("#select_sub_topic").empty();
            newOptions.append(new Option(key, value));
            if(ch === getTID){
                var ff = $("#optionsRadios").val();
                var kik = "none";
                //alert("meow");
                document.getElementById('area1').style.display = 'block';
                document.getElementById('area2').style.display = 'block';
                document.getElementById("area1").required = true;
                if(ff === kik)
                    document.getElementById("area2").required = false;
                else
                   document.getElementById("area2").required = true;
           }
            else{
                //alert("hola");
                for(var j = 0; j < my_subtopics[getTID].length; j++){
                    value = my_subtopics[getTID][j]['sid'];
                    key = my_subtopics[getTID][j]['sname'] + '-[' + my_subtopics[getTID][j]['sid'] + ']'; 
                    newOptions.append(new Option(key, value));
                }
                document.getElementById('area1').style.display = 'none';
                document.getElementById("area1").required = false;

            }
            //alert("lolo");
        }
    </script>
    <script type="text/javascript">
        var my_courses = <?php echo json_encode($result); ?>;
        var my_topics = JSON.parse( '<?php echo json_encode($result_all_topic) ?>' );
        var my_subtopics = <?php echo json_encode($result_all_sub_topic); ?>;
        var my_courses = <?php echo json_encode($result); ?>;
        function handleChangeSubTopic() {
            var getTID = $("#select_sub_topic").val();
            var value = 'newsubtopic';
            if(value === getTID){
                var ff = 1;
                document.getElementById('area2').style.display = 'block';
                document.getElementById("area2").required = true;
            }
            else{
                document.getElementById('area2').style.display = 'none';
                document.getElementById("area2").required = false;
            }
        }
    </script>




</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><i class="fa fa-comments"></i> <strong>MASTER </strong></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Doe</strong>
                                    <span class="pull-right text-muted">
                                        <em>Today</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since an kwilnw...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since the...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">28% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100" style="width: 28%">
                                            <span class="sr-only">28% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">85% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                                            <span class="sr-only">85% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                      <li>
                        <a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a  href="ui-elements.php"><i class="fa fa-desktop"></i> Chat Forum</a>
                    </li>
                 
                    <li>
                        <a href="../wdCalendar/sample.php"><i class="fa fa-qrcode"></i> Event Calender</a>
                    </li>
                    
                    <li>
                        <a class="active-menu" href="form.php"><i class="fa fa-edit"></i> Upload Content </a>
                    </li>
                    <li>
                        <a href="course.php"><i class="fa fa-fw fa-file"></i> Course Teaching</a>
                    </li>

                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Upload Course Content
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="submit.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Selects Course</label>
                                            <select class="form-control" name="select_course" id="select_course" onchange="handleChange()">
                                                <?php   
                                                     
                                                                                              
                                                  /*$connection = mysql_connect($dbhost, $dbuser, $dbpass); //The Blank string is the password
                                                  mysql_select_db('dbms');
                                                  $table=mysql_query('SELECT * FROM courset WHERE facID=1 ');
                                                  while($row=mysql_fetch_array($table))
                                                  {
                                                      $number=$row['id'];
                                                      $smark=$row['facID'];
                                                      $smark1=$row['courseID'];
                                                      echo "<option>". $cname_id . "</option>";
                                                  }*/
                                                  foreach($result as $option) {
                                                    $cname_id = $option['course_name'] . "-[" . $option['c_id'] . "]";
                                                    echo '<option value="' . $option['c_id'] . '">'. $cname_id . '</option>';
                                                    }
                                                //mysql_close();
                                                ?>
                                            </select>
                                            </br>
                                            </br>
                                            <label>Selects Topic</label>
                                            <select class="form-control" name="select_topic" id="select_topic" onchange="handleChangeTopic()">
                                                <option value="newtopic">Add new Topic</option>
                                                <?php
                                                   //echo '<option>' . sizeof($result_topic) . '</option>';
                                                  foreach($result_topic as $option) {
                                                    $cname_id = $option['tname'] . '-[' . $option['tid'] . ']';
                                                    echo '<option value="' . $option['tid'] . '">'. $cname_id . '</option>';
                                                    }
                                                  /*$connection = mysql_connect($dbhost, $dbuser, $dbpass); //The Blank string is the password
                                                  mysql_select_db('dbms');
                                                  $table=mysql_query('SELECT * FROM courset WHERE facID=1 ');
                                                  while($row=mysql_fetch_array($table))
                                                  {
                                                      $number=$row['id'];
                                                      $smark=$row['facID'];
                                                      $smark1=$row['courseID'];
                                                  }
                                                mysql_close();*/
                                                ?>
                                            </select>
                                            <input type="text" id="area1" name="area1" placeholder="Topic" required> 
                                            </br>
                                            </br>
                                            </br>
                                            <label>Select Sub-Topic</label>
                                            <select class="form-control" name="select_sub_topic" id="select_sub_topic" onchange="handleChangeSubTopic()">
                                                <option value="newsubtopic">Add new Sub-Topic</option>
                                                <?php                                                   
                                                  /*$connection = mysql_connect($dbhost, $dbuser, $dbpass); //The Blank string is the password
                                                  mysql_select_db('dbms');
                                                  $table=mysql_query('SELECT * FROM courset WHERE facID=1 ');
                                                  while($row=mysql_fetch_array($table))
                                                  {
                                                      $number=$row['id'];
                                                      $smark=$row['facID'];
                                                      $smark1=$row['courseID'];
                                                  ?>
                                                  <option><?php echo $smark1 ?></option>
                                                <?php }
                                                mysql_close();*/
                                                foreach($result_sub_topic as $option) {
                                                    echo sizeof($result_sub_topic);
                                                    $cname_id = $option['sname'] . '-[' . $option['sid'] . ']' ;
                                                    echo '<option value="' . $option['sid'] . '">'. $cname_id . '</option>';
                                                    }
                                                ?>
                                            </select>
                                            <input type="text" id="area2" name="area2" placeholder="Sub-Topic" required>
                                            </br>
                                            </br>
                                        </div>
                                        <div class="form-group">
                                            <label>Type Of Content</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="lecture" checked="" onclick="show();">Lecture
                                                    <br/>
                                                    <input type="text" id="area5" name="area5" placeholder="lecture name" required> 
                                                    <br/>
                                                    <input type="url" id="area" name="area" placeholder="video lecture url"> 
                                                    <br/>
                                                    <textarea id="area3" name="area3" placeholder="Lecture Transcription" cols="50" rows="5"></textarea>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="assignment" onclick="hide();">Assignment
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="quiz" onclick="hide();">Quiz
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="none" onclick="none();"> No content for now
                                                </label>
                                            </div>
                                            </br>
                                            </br>
                                            <label>File input</label>
                                            <input type="file" name="fileToUpload" id="fileToUpload" required>
                                        </div>
                                        <button type="submit" class="btn btn-default" name="submit">Submit</button>
                                        <button type="reset" class="btn btn-default" onclick='window.location.reload();'>Reset</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
			</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="../dashboard/assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="../dashboard/assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="../dashboard/assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="../dashboard/assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
