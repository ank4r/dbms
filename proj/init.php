<?php
	$dbhost = 'localhost:3306';
   	$dbuser = 'root';
   	$dbpass = 'naruto';
   	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
    if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   	}
   mysql_select_db('dbms');
   	//echo 'Connected successfully';
   	$sql='CREATE TABLE student('.
   	'sid INT NOT NULL AUTO_INCREMENT,'.
   	'fname varchar(20) NOT NULL,'.
   	'mname varchar(20),'.
   	'lname varchar(20) NOT NULL,'.
   	'userid varchar(20) NOT NULL,'.
   	'pwd varchar(20) NOT NULL,'.
   	'age INT NOT NULL,'.
   	'sex varchar(2) NOT NULL,'.
   	'bday DATE NOT NULL,'.
   	'PRIMARY KEY(sid))';
   	$retval=mysql_query($sql,$conn);
  	if(!$retval )
	{
	  die('Could not get data: ' . mysql_error());
	}
	else{
		echo "Created Table successfully";
	}
	exit();
?>