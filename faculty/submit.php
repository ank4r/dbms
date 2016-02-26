<?php
	$target_dir = "../lec/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);	
	if(!isset($_FILES['fileToUpload']) || !isset($_POST["submit"]))
		echo "error no file selected";

	else {
		echo $_POST["optionsRadios"]."<br>";
		echo $target_file;
	}
?>