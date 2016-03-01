<?php
	include('../login/session.php');
    include('../login/info.php');
    include('../login/helper_modules.php');
	ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
	$target_dir = $_SERVER['DOCUMENT_ROOT'] . "/dbb/" . $_POST["optionsRadios"] ."/";
	$uploadOk = 1;
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);	
	if(!isset($_FILES['fileToUpload']) || !isset($_POST["submit"]))
		echo "error no file selected";
	else if(file_exists($target_file)){
		echo "Sorry, file already exists.";
    	$uploadOk = 0;
	}
	else {
		$errors = array();
		echo $_POST["optionsRadios"]."<br>";
		echo $target_file."<br>";
		echo $_POST["area"]."<br>";
		//chmod($target_file, 0777);
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }

	    $fac_id = get_fac_id($_SESSION['login_id']);
	    if($_POST['select_topic'] == "newtopic"){
	    	$c_id = $_POST['select_course'];
	    	$top_name = $_POST['area1'];
	    	$top_id = populate_topics($c_id,$top_name);
	    	if($_POST['select_sub_topic'] == "newsubtopic"){
	    		$sub_name = $_POST['area2'];
	    		$sub_id = populate_subtopics($top_id,$sub_name);
	    	}
	    	else{
	    		$sub_id = $_POST['select_sub_topic'];
	    		//populate_lectures($subtop_id,$lec_name,$vdl,$lec_notes,$fac_id,$topics);
	    	}
	    }
	    else{
	    	$top_id = $_POST['select_topic'];
	    	$sub_id = $_POST['select_sub_topic'];
	    	//populate_lectures($subtop_id,$lec_name,$vdl,$lec_notes,$fac_id,$topics);
	    }

	    if($_POST['optionsRadios'] == "lecture"){
	    	$lec_name = $_POST['area5'];
	    	$topics = $_POST['area3'];
	    	$vdl = $_POST['area'];
	    	$lec_notes = $target_file;
		 	populate_lectures($sub_id,$lec_name,$vdl,$lec_notes,$fac_id,$topics);
		}
		else if($_POST['optionsRadios'] == "assignment"){
			
		}
		else{

		}
	}
?>