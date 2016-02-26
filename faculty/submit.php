<?php
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
	    if($_POST["area"] == ""){
	    }
	    else{
	    	
	    }
	}
?>