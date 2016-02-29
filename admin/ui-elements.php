<?php
    include('../login/session.php');
    include('../login/info.php');
    $flag=" koko";
    $page = 1;
    if(!isset($_POST['submit']))
    {
        if(isset($_POST['select_course'])){
            $page = $_POST['select_course'];
        }
    }
    else{
        $connection = mysql_connect($dbhost, $dbuser, $dbpass); //The Blank string is the password
        mysql_select_db('dbms');

        $sql = "INSERT INTO coursequery (courseID, userID, comment,pertype)
        VALUES (3, 'Doe74','" . $_POST['area3'] . "' , 0)";

        $retval = mysql_query($sql, $connection);
        if (!$retval) {
            $flag = $retval;
            echo "Error: " . $sql . "<br>" . $conn->error;
        } else {
            $flag = $sql;
            echo "New record created successfully";
        }
        mysql_close($connection);
        if(isset($_POST['select_course'])){
            $page = $_POST['select_course'];
        }
    }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
	<!-- Bootstrap Styles-->
    <link href="../dashboard/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="../dashboard/assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="../dashboard/assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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
                        <a href="ui-elements.php" class="active-menu"><i class="fa fa-desktop"></i> Chat Forum</a>
                    </li>
					<li>
                        <a href="chart.php"><i class="fa fa-bar-chart-o"></i> Charts</a>
                    </li>
                    <li>
                        <a href="../wdCalendar/sample.php"><i class="fa fa-qrcode"></i> Event Calender</a>
                    </li>
                    
                    <li>
                        <a href="table.php"><i class="fa fa-table"></i> Responsive Tables</a>
                    </li>
                    <li>
                        <a href="form.php"><i class="fa fa-edit"></i> Forms </a>
                    </li>
                    <li>
                        <a href="course.php"><i class="fa fa-fw fa-file"></i> Courses Teaching</a>
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
                            Course Query Forum
                        </h1>
                        <form name="myform1" action="" method="post">
                        <label>Selects Course</label>
                            <select name="select_course" id="select_course" onchange="this.form.submit()">
                                
                                <?php 
                                  $connection = mysql_connect($dbhost, $dbuser, $dbpass); //The Blank string is the password
                                  mysql_select_db('dbms');
                                  $table=mysql_query('SELECT * FROM courset where courseID');
                                  if($page==1){
                                      while($row=mysql_fetch_array($table))
                                      {
                                          $number=$row['id'];
                                          $smark=$row['facID'];
                                          $smark1=$row['courseID'];
                                          echo "<option>" . $smark1 . "</option>" ;
                                      }  
                                    }
                                    else{
                                        echo "<option>" . $page . "</option>" ;
                                        while($row=mysql_fetch_array($table))
                                          {
                                              $number=$row['id'];
                                              $smark=$row['facID'];
                                              $smark1=$row['courseID'];
                                              if($smark1 != $page)
                                                echo "<option>" . $smark1 . "</option>" ;
                                          }
                                    }
                                    mysql_close();
                                ?>
                            </select>
                        </form>
                    </div>
                </div> 
                 <!-- /. ROW  -->
				 
				
			<div class="row">

			  <div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
				 Queries And Suggestions
				</div> 
                    <?php 
                      $connection = mysql_connect($dbhost, $dbuser, $dbpass); //The Blank string is the password
                      mysql_select_db('dbms');

                      $table=mysql_query('SELECT * FROM coursequery where courseID=' . $page);
                      while($row=mysql_fetch_array($table))
                      {
                          $number=$row['courseID'];
                          $smark=$row['userID'];
                          $smark1=$row['comment'];
                          $smark2=$row['pertype'];
                          echo "<div class='panel-body'>";
                          if($smark2 == 1)
                            echo "<div class='alert alert-success'>";
                          else
                            echo "<div class='alert alert-danger'>";
                          echo "<strong>" . $smark . ": </strong>" . $smark1;    
                          echo "</div>";
                          echo "</div>";
                      }
                    mysql_close();
                    ?>  
				</div>
			</div>						
				</div>								
									
				  <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Ask or Answer Query
                        </div>

                       <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                        <div class="panel-body">
                    
                            <textarea id="area3" name="area3" placeholder="Comment" cols="50" rows="5"></textarea>
                            <button type="submit" class="btn btn-default" name="submit">Submit</button>
                        </div>
                        </form>
                    </div>
               			
                     <!-- End Modals-->
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
