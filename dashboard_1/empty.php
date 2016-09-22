<?php
   include('../login_1/session.php');
   include('../login_1/helper_modules.php');
    include('../login_1/info.php');
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
   //echo "Hello";
   //echo $_POST['Mathematics'];
    $active=0;
   $category = "";
   $in=0;
   //echo "Hello";
   if(isset($_POST['deletecourse']))
   {
        //echo $_POST['deletecourse'];
        delete_course($_POST['deletecourse']);
         $active=1;
   }
   if(isset($_POST['publishcourse']))
   {
        //echo $_POST['publishcourse'];
        publish_course($_POST['publishcourse']);
         $active=1;
   }
   if(isset($_POST['Mathematics']))
   {
        if($in==1)
        {
            $category=$category.",";
        }
        $category=$category."Mathematics";
        $in=1;
   }
   if(isset($_POST['Biology']))
   {
        if($in==1)
        {
            $category=$category.",";
        }
        $category=$category."Biology";
        $in=1;
   }
   if(isset($_POST['GeneralSciences']))
   {
        if($in==1)
        {
            $category=$category.",";
        }
        $category=$category."General Sciences";
        $in=1;
   }
   if(isset($_POST['Physics']))
   {
        if($in==1)
        {
            $category=$category.",";
        }
        $category=$category."Physics";
        $in=1;
   }
    if(isset($_POST['Chemistry']))
   {
        if($in==1)
        {
            $category=$category.",";
        }
        $category=$category."Chemistry";
        $in=1;
   }
   if(isset($_POST['SocialSciences']))
   {
        if($in==1)
        {
            $category=$category.",";
        }
        $category=$category."Social Sciences";
        $in=1;
   }
    if(isset($_POST['Miscellaneous']))
   {
        if($in==1)
        {
            $category=$category.",";
        }
        $category=$category."Miscellaneous";
        $in=1;
   }
   if(isset($_POST['Languages']))
   {
        if($in==1)
        {
            $category=$category.",";
        }
        $category=$category."Languages";
        $in=1;
   }
   if(isset($_POST['ComputerScience']))
   {
        if($in==1)
        {
            $category=$category.",";
        }
        $category=$category."Computer Science";
        $in=1;
   }
   if($category!="")
   {
        // echo $_POST['breif']";
        if(isset($_POST['course_name']))
        {
            if(isset($_POST["air_date"]))
            {
                $invites=array();
                $invites=explode(",",$_POST["invfac"]);
                    //echo $invites.length;
                echo $_POST["brief"];
                $course_id=populate_course($_POST['course_name'],$category,get_mem_id($_SESSION['login_id']),$_POST["air_date"],$_POST["brief"]);
                foreach ($invites as $value) {
                    $mem_id=get_mem_id($value);
                    if($mem_id!=-1)
                    {
                        $fac_id=get_fac_id($mem_id);
                        if($fac_id!=-1)
                        {
                            invite_faculty($course_id,$fac_id);
                        }
                    }
                }
            }
        }
   }
   if($_SESSION['role'] === "Admin"){
        $nouse = 0;
    }
    else
        exit();
    $flag="";
    $page;
    $page_name = "";
    $mem_id = "";
    $ptype= "";
    $pval=0;
    if(isset($_SESSION['login_id'])){
        $mem_id = $_SESSION['login_id'];
        $ptype = $_SESSION['role'];
        if($ptype === "Admin")
            $pval = 1;
        $fac_id = $_SESSION['role_id'];
        if($pval == 0)
            $table = get_course_for_faculty($mem_id);
        else
            $table = get_course_for_admin($mem_id);

        if( count($table) > 0 )
        {
             $table_row = $table[0];
             $page = $table_row['c_id'];
             $page_name = $table_row['course_name'];
        }
        /*$connection = mysql_connect($dbhost, $dbuser, $dbpass); 
        mysql_select_db('dbms');
        $table = $_SESSION['login_id'];
        mysql_close();*/
    }

    if(isset($_POST['course_id']))
    {
        $active=2;
        echo $_POST['course_id'];
        $page = $_POST['course_id'];
        $page_name = $_POST['course_name'];
        $comment1 = $_POST['area3'];
        //echo $page .  " " . $mem_id ." " . $comment1 . " " . $pval;
        populate_adminquery($page,$mem_id,$comment1,$pval);
        foreach ($table as $option) {
            if($option['c_id'] === $page){
                $page_name = $option['course_name'];
            }
        }
    }
    if(isset($_POST['select_course'])){
        $active=2;
        $page = $_POST['select_course'];
        foreach ($table as $option) {
            if($option['c_id'] === $page){
                $page_name = $option['course_name'];
            }
        }
    }

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap HTML5 Admin Template : Master</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
    <script type="text/javascript">
        function handleChange() {
            //alert("HELLLLO OOO");
            //document.getElementById('select_course')
            //$("#course_id").val($("#select_course").val());
            //alert($("#select_course").val());
            document.getElementById('myform1').submit();
        }
        function setValues() {
            //alert("HELLLLO OOO");
            //document.getElementById('select_course')
            $("#course_id").val($("#select_course").val());
            //alert($("#select_course").val());
            document.getElementById('myform22').submit();
        }
   </script>
   <script type="text/javascript">
        function show() {
            var ff = $("input[type=checkbox]:checked").length;
            if(ff==0)
            {
                alert("Please check atleast one category");
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
                <a class="navbar-brand" href="index.php"><i class="fa fa-comments"></i> <strong>KGP Course Management </strong></a>
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
                       <li><a href="../login/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                        <a href="courses.php"><i class="fa fa-book"></i> My Courses</a>
                    </li>
                    <li>
                        <a href="ui-elements.php"><i class="fa fa-desktop"></i> UI Elements</a>
                    </li>
					<li>
                        <a href="chart.php"><i class="fa fa-bar-chart-o"></i> Charts</a>
                    </li>
                    <li>
                        <a href="tab-panel.php"><i class="fa fa-qrcode"></i> Tabs & Panels</a>
                    </li>
                    
                    <li>
                        <a href="table.php"><i class="fa fa-table"></i> Responsive Tables</a>
                    </li>
                    <li>
                        <a href="form.php"><i class="fa fa-edit"></i> Forms </a>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>

                                </ul>

                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="active-menu" href="empty.php"><i class="fa fa-fw fa-file"></i> Empty Page</a>
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
                        </h1>
                        <div class="panel-body">
                            <ul class="nav nav-pills">
                                <?php if($active==0){ 
                                echo "<li class='active'>";}
                                 else{  echo "<li class=''>";
                                 }?>
                                 <a href="#createCourse-pills" data-toggle="tab">Create Course</a>
                                </li>
                                <?php if($active==1){ 
                                echo "<li class='active'>";}
                                 else{  echo "<li class=''>";
                                 }?>
                                 <a href="#courseStatus-pills" data-toggle="tab">Course Status</a>
                                </li>
                                <?php if($active==2){ 
                                echo "<li class='active'>";}
                                 else{  echo "<li class=''>";
                                 }?>
                                 <a href="#forum-pills" data-toggle="tab">Forum</a>
                                </li>
                                <?php if($active==3){ 
                                echo "<li class='active'>";}
                                 else{  echo "<li class=''>";
                                 }?>
                                 <a href="#settings-pills" data-toggle="tab">Settings</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <?php if($active==0){ 
                                echo "<div class='tab-pane fade  active in' id='createCourse-pills'>";}
                                 else{  echo "<div class='tab-pane fade' id='createCourse-pills'>";
                                 }?>
                                    <div class="panel-heading">
                            <h3> Course Details <h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form role="form" method="post">
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Course Name</label>
                                            <input class="form-control" name="course_name" placeholder="Basic Algebra" required>
                                        </div>
                                      <!--   <div class="form-group">
                                            <label>Static Control</label>
                                            <p class="form-control-static">email@example.com</p>
                                        </div> -->
                                       <!--  <div class="form-group">
                                            <label>File input</label>
                                            <input type="file">
                                        </div>
                                        <div class="form-group">
                                            <label>Text area</label>
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div> -->
                                        <div class="form-group" name="checkb">
                                            <label>Category</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="Mathematics">Mathematics
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="GeneralSciences">General Sciences
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="Biology">Biology
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="Physics">Physics
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="Chemistry">Chemistry
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="SocialSciences">Social Sciences
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="Miscellaneous">Miscellaneous
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="Languages">Languages
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="ComputerScience">Computer Science
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Brief Overview</label>
                                            <textarea class="form-control" rows="3" name="brief"></textarea>
                                        </div>
                                        <!-- <div class="form-group"> -->
                                           <!--  <label>Inline Checkboxes</label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox">1
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox">2
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox">3
                                            </label>
                                        </div> -->
                                       <!--  <div class="form-group">
                                            <label>Radio Buttons</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">Radio 1
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Radio 2
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio 3
                                                </label>
                                            </div>
                                        </div> -->
                                        <!-- <div class="form-group">
                                            <label>Inline Radio Buttons</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked="">1
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">2
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3">3
                                            </label>
                                        </div> -->
                                        <!-- <div class="form-group">
                                            <label>Selects</label>
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Multiple Selects</label>
                                            <select multiple="" class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div> -->
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                        <fieldset disabled="">
                                            <div class="form-group">
                                                <label for="disabledSelect">
                                                Admin id
                                                </label>
                                                <input class="form-control" id="disabledInput" type="text" placeholder=
                                                <?php
                                                    echo '"'.$_SESSION['role_id'].'"';
                                                ?>
                                                 disabled="">
                                            </div>
                                            <div class="form-group">
                                                <label for="disabledSelect">
                                                    Admin Name
                                                </label>
                                                <input class="form-control" id="disabledInput" type="text" placeholder=
                                                <?php
                                                    echo '"'.$_SESSION['login_user'].'"';
                                                ?>
                                                 disabled="">
                                            </div>
                                            <!-- <div class="checkbox">
                                                <label>
                                                    <input type="checkbox">Disabled Checkbox
                                                </label>
                                            </div> -->
                                            <!-- <button type="submit" class="btn btn-primary">Disabled Button</button> -->
                                        </fieldset>
                                    <!-- <h4>Form Validation States</h4>
                                    <form role="form">
                                        <div class="form-group has-success">
                                            <label class="control-label" for="inputSuccess">Input with success</label>
                                            <input type="text" class="form-control" id="inputSuccess">
                                        </div>
                                        <div class="form-group has-warning">
                                            <label class="control-label" for="inputWarning">Input with warning</label>
                                            <input type="text" class="form-control" id="inputWarning">
                                        </div>
                                        <div class="form-group has-error">
                                            <label class="control-label" for="inputError">Input with error</label>
                                            <input type="text" class="form-control" id="inputError">
                                        </div>
                                    </form> -->
                                    <h4>Invite Faculties</h4>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" class="form-control" name="invfac" placeholder="Userid,abd123,varun456">
                                        </div>
                                        <!-- <div class="form-group input-group">
                                            <input type="text" class="form-control">
                                            <span class="input-group-addon">.00</span>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-eur"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Font Awesome Icon">
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="text" class="form-control">
                                            <span class="input-group-addon">.00</span>
                                        </div> -->
                                        <!-- <div class="form-group input-group">
                                            <input type="text" class="form-control">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div> -->
                                    <div class="form-group">
                                    <label>Release Date</label>
                                    <input class="form-control" type="date" name="air_date" required>
                                    </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            <button type="submit" class="btn btn-default" onclick='show()'>Submit Button</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>
                            </form>
                    </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                                <?php if($active==1){ 
                                echo "<div class='tab-pane fade  active in' id='courseStatus-pills'>";}
                                 else{  echo "<div class='tab-pane fade' id='courseStatus-pills'>";
                                 }?>
                                   <?php
                                         $danger=get_danger_course($_SESSION['login_id']);
                                         $i=0;
                                         foreach ($danger as $value) {
                                             # code...
                                          if($i%3==0)
                                          {
                                                echo " <div class='row'>";
                                           }
                                          $pf=get_faculty_pending($value['c_id']);
                                          $af=get_faculty_accepted($value['c_id']);
                                         echo    "<div class='col-md-4 col-sm-4'>
                                                  <div class='panel panel-danger'>
                                                  <div class='panel-heading'>
                                                      ".$value['c_id']." : ".$value['course_name'].
                                                  "</div>
                                                  <div class='panel-body'>
                                                      <h4>Course Category:</h4>
                                                      <h5>".$value['course_category']."</h5>
                                                      <h4>Pending Faculty:</h4>
                                                      <h5>";
                                          foreach ($pf as $value1) {
                                              echo $value1['fname']." ".$value1['lname']." @".$value1['userid'];
                                              echo "<br>";
                                          }
                                          echo "</h5>
                                            <h4>Accepted Faculty:</h4> 
                                            <h5>";
                                          foreach ($af as $value1) {
                                              echo $value1['fname']." ".$value1['lname']." @".$value1['userid'];
                                              echo "<br>";
                                          }
                                          echo "</h5>";
                                          echo  "<p>".$value['brief_overview']."</p>
                                                      </div>";
                                        echo "<form action='' method='post'>";
                                        echo "<input type='hidden' name='deletecourse' value="."'".$value['c_id']."'"." />";
                                        echo "<div class=".'"'."btn-group pull-right".'"'.">";
                                        echo "<button type='submit' class='btn btn-default' >Delete</button>";
                                          echo "</div>";
                                          echo "</form>";
                                        echo "<form action='' method='post'>";
                                        echo "<input type='hidden' name='publishcourse' value="."'".$value['c_id']."'"." />";
                                        echo "<div class=".'"'."btn-group pull-right".'"'.">";
                                        echo "<button type='submit' class='btn btn-default' >Publish</button>";
                                          echo "</div>";
                                          echo "</form>";
                                          echo    " <div class='panel-footer'>"
                                                      .$value['air_date']."
                                                  </div>
                                              </div>
                                              </div>";
                                            if($i%3==2)
                                            {
                                                echo "</div>";
                                            }
                                            $i=$i+1;
                                         }
                                        


                                        $warning=get_warning_course($_SESSION['login_id']);
                                         foreach ($warning as $value) {
                                            if($i%3==0)
                                          {
                                                echo " <div class='row'>";
                                           }
                                             # code...
                                          $pf=get_faculty_pending($value['c_id']);
                                          $af=get_faculty_accepted($value['c_id']);
                                         echo    "<div class='col-md-4 col-sm-4'>
                                                  <div class='panel panel-warning'>
                                                  <div class='panel-heading'>
                                                      ".$value['c_id']." : ".$value['course_name'].
                                                  "</div>
                                                  <div class='panel-body'>
                                                      <h4>Course Category:</h4>
                                                      <h5>".$value['course_category']."</h5>
                                                      <h4>Pending Faculty:</h4>
                                                      <h5>";
                                          foreach ($pf as $value1) {
                                              echo $value1['fname']." ".$value1['lname']." @".$value1['userid'];
                                              echo "<br>";
                                          }
                                          echo "</h5>
                                            <h4>Accepted Faculty:</h4> 
                                            <h5>";
                                          foreach ($af as $value1) {
                                              echo $value1['fname']." ".$value1['lname']." @".$value1['userid'];
                                              echo "<br>";
                                          }
                                          echo "</h5>";
                                          echo  "<p>".$value['brief_overview']."</p>
                                                      </div>";
                                        echo "<form action='' method='post'>";
                                        echo "<input type='hidden' name='deletecourse' value="."'".$value['c_id']."'"." />";
                                        echo "<div class=".'"'."btn-group pull-right".'"'.">";
                                        echo "<button type='submit' class='btn btn-default' >Delete</button>";
                                          echo "</div>";
                                          echo "</form>";
                                        echo "<form action='' method='post'>";
                                        echo "<input type='hidden' name='publishcourse' value="."'".$value['c_id']."'"." />";
                                        echo "<div class=".'"'."btn-group pull-right".'"'.">";
                                        echo "<button type='submit' class='btn btn-default' >Publish</button>";
                                          echo "</div>";
                                          echo "</form>";
                                          echo    " <div class='panel-footer'>"
                                                      .$value['air_date']."
                                                  </div>
                                              </div>
                                              </div>";
                                            if($i%3==2)
                                            {
                                                echo "</div>";
                                            }
                                            $i=$i+1;
                                         }
                                         $normal=get_normal_course($_SESSION['login_id']);
                                         foreach ($normal as $value) {
                                            if($i%3==0)
                                          {
                                                echo " <div class='row'>";
                                           }
                                             # code...
                                          $pf=get_faculty_pending($value['c_id']);
                                          $af=get_faculty_accepted($value['c_id']);
                                         echo    "<div class='col-md-4 col-sm-4'>
                                                  <div class='panel panel-primary'>
                                                  <div class='panel-heading'>
                                                      ".$value['c_id']." : ".$value['course_name'].
                                                  "</div>
                                                  <div class='panel-body'>
                                                      <h4>Course Category:</h4>
                                                      <h5>".$value['course_category']."</h5>
                                                      <h4>Pending Faculty:</h4>
                                                      <h5>";
                                          foreach ($pf as $value1) {
                                              echo $value1['fname']." ".$value1['lname']." @".$value1['userid'];
                                              echo "<br>";
                                          }
                                          echo "</h5>
                                            <h4>Accepted Faculty:</h4> 
                                            <h5>";
                                          foreach ($af as $value1) {
                                              echo $value1['fname']." ".$value1['lname']." @".$value1['userid'];
                                              echo "<br>";
                                          }
                                          echo "</h5>";
                                          echo  "<p>".$value['brief_overview']."</p>
                                                      </div>";
                                        echo "<form action='' method='post'>";
                                        echo "<input type='hidden' name='deletecourse' value="."'".$value['c_id']."'"." />";
                                        echo "<div class=".'"'."btn-group pull-right".'"'.">";
                                        echo "<button type='submit' class='btn btn-default' >Delete</button>";
                                          echo "</div>";
                                          echo "</form>";
                                        echo "<form action='' method='post'>";
                                        echo "<input type='hidden' name='publishcourse' value="."'".$value['c_id']."'"." />";
                                        echo "<div class=".'"'."btn-group pull-right".'"'.">";
                                        echo "<button type='submit' class='btn btn-default' >Publish</button>";
                                          echo "</div>";
                                          echo "</form>";
                                          echo    " <div class='panel-footer'>"
                                                      .$value['air_date']."
                                                  </div>
                                              </div>
                                              </div>";
                                            if($i%3==2)
                                            {
                                                echo "</div>";
                                            }
                                            $i=$i+1;
                                         }


                                        $success=get_success_course('ravi1996');
                                         foreach ($success as $value) {
                                          if($i%3==0)
                                          {
                                                echo " <div class='row'>";
                                           }
                                             # code...
                                          $pf=get_faculty_pending($value['c_id']);
                                          $af=get_faculty_accepted($value['c_id']);
                                         echo    "<div class='col-md-4 col-sm-4'>
                                                  <div class='panel panel-success'>
                                                  <div class='panel-heading'>
                                                      ".$value['c_id']." : ".$value['course_name'].
                                                  "</div>
                                                  <div class='panel-body'>
                                                      <h4>Course Category:</h4>
                                                      <h5>".$value['course_category']."</h5>
                                                      <h4>Pending Faculty:</h4>
                                                      <h5>";
                                          foreach ($pf as $value1) {
                                              echo $value1['fname']." ".$value1['lname']." @".$value1['userid'];
                                              echo "<br>";
                                          }
                                         echo "</h5>";
                                          echo  "<p>".$value['brief_overview']."</p>
                                                      </div>";
                                        echo "<form action='' method='post'>";
                                        echo "<input type='hidden' name='deletecourse' value="."'".$value['c_id']."'"." />";
                                        echo "<div class=".'"'."btn-group pull-right".'"'.">";
                                        echo "<button type='submit' class='btn btn-default' >Delete</button>";
                                          echo "</div>";
                                          echo "</form>";
                                          echo    " <div class='panel-footer'>"
                                                      .$value['air_date']."
                                                  </div>
                                              </div>
                                              </div>";
                                            if($i%3==2)
                                            {
                                                echo "</div>";
                                            }
                                            $i=$i+1;
                                         }
                                        if($i%3!=0)
                                        {
                                            echo "</div>";
                                        }
                                   ?>
                                </div>
                                <?php if($active==2){ 
                                echo "<div class='tab-pane fade  active in' id='forum-pills'>";}
                                 else{  echo "<div class='tab-pane fade' id='forum-pills'>";
                                 }?>
                                     <div class="row">
                                        <div class="col-md-12">
                                    <h1 class="page-header">
                                        Course Query Forum
                                    </h1>
                                    <form name="myform1" id="myform1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                    <label>Selects Course</label>
                                        <select name="select_course" id="select_course" onchange="handleChange()">
                                            
                                            <?php
                                                  if(count($table) > 0){
                                                    $cname_id = $page_name . "-[" . $page . "]";
                                                    echo '<option value="' . $page . '">'. $cname_id . '</option>';
                                                  foreach($table as $option)
                                                  {
                                                    if($option['c_id'] === $page){
                                                        $nouse = 0;
                                                    }
                                                    else{
                                                      $cname_id = $option['course_name'] . "-[" . $option['c_id'] . "]";
                                                      echo '<option value="' . $option['c_id'] . '">'. $cname_id . '</option>';
                                                    }
                                                  } 
                                                  } 
                                            ?>
                                        </select>
                                    </form>
                                </div>
                            </div>
                                    <div class="row">
                                    <div class="col-md-12">
                                    <div class="panel panel-default">
                                    <div class="panel-heading">
                                     Queries And Suggestions
                                    </div> 
                                        <?php 
                                          $connection = mysql_connect($dbhost, $dbuser, $dbpass); //The Blank string is the password
                                          mysql_select_db('dbms');


                                          $txer=mysql_query('SELECT * FROM adminquery where c_id =' . $page);

                                          while($row=mysql_fetch_array($txer))
                                          {

                                              $number=$row['c_id'];
                                              $smark=$row['mem_id'];
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

                                           <form name="myform22" id="myform22" role="form" action="" method="post" enctype="multipart/form-data">
                                            <div class="panel-body">
                                                <input type="hidden" id="course_id" name="course_id" />
                                                <input type="hidden" id="course_name" name="course_name" />
                                                <textarea id="area3" name="area3" placeholder="Comment" cols="50" rows="5"></textarea>
                                                <input type='button' value='Submit form' onClick='setValues()' />
                                                <!-- <button type="submit" class="btn btn-default" name="submit">Submit</button> -->
                                            </div>
                                            </form>


                                        </div>
                                            
                                         <!-- End Modals-->
                                    </div>

                                </div>

                                    </div>
                                    <?php if($active==3){ 
                                echo "<div class='tab-pane fade  active in' id='settings-pills'>";}
                                 else{  echo "<div class='tab-pane fade' id='settings-pills'>";
                                 }?>
                                    <h4>Settings Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    </div>
                </div> 
                 <!-- /. ROW  -->

     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
