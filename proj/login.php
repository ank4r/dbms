<?php
   session_start();

   	if($_POST["signup"])
	{
		echo "hello";
		header( "Location: signup.php");
	}
   	if($_POST["Username"] || $_POST["Password"] ){
   	/*echo $_POST["Username"];
   	echo "<br>".$_POST["Password"]."<br>";*/
   	if(!$_POST["Username"])
   	{
   		echo "Please Enter Username";
   	}
   	else if(!$_POST["Password"])
   	{
   		echo "Please Enter Password";
   	}
   	else{
   	$dbhost = 'localhost:3306';
   	$dbuser = 'root';
   	$dbpass = 'naruto';
   	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
    if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   	}
   //mysql_select_db('dbms');
   	//echo 'Connected successfully';
   /*$sql='CREATE TABLE student('.
   	'sid INT NOT NULL AUTO_INCREMENT,'.
   	'fname varchar(20) NOT NULL,'.
   	'mname varchar(20),'.
   	'lname varchar(20) NOT NULL,'.
   	'age INT NOT NULL,'.
   	'sex varchar(2) NOT NULL,'.
   	'bday DATE NOT NULL,'.
   	'PRIMARY KEY(sid))';*/
   	$myusername = "";
   	mysql_select_db('dbms');
	$sql='SELECT fname FROM student WHERE userid=\''.$_POST["Username"].'\' and pwd=\''.$_POST["Password"].'\'';
   	$retval=mysql_query($sql,$conn);
  	if(! $retval )
	{
	  die('Could not get data: ' . mysql_error());
	}
	$i=0;
	while($row = mysql_fetch_assoc($retval))
	{
		$i=1;
		echo "Welcome {$row['fname']} !!";
      $myusername = $row['fname'];
		break;
	}
   if($i==0)
   {
   		echo "Incorrect Username or Password";
   }
   else{
       echo "\nLogined successfully\n";

      $_SESSION['login_user'] = $myusername;
        
      header('Location: welcome.php');

	}
	mysql_close($conn);

}
}
?>

<html>
<head>
<meta charset="utf-8">
<title>Login Page</title>
<style type="text/css">
body {
background-color: #f4f4f4;
color: #5a5656;
font-family: 'Open Sans', Arial, Helvetica, sans-serif;
font-size: 16px;
line-height: 1.5em;
}
a { text-decoration: none; }
h1 { font-size: 1em; }
h1, p {
margin-bottom: 10px;
}
strong {
font-weight: bold;
}
.uppercase { text-transform: uppercase; }

/* ---------- LOGIN ---------- */
#login {
margin: 50px auto;
width: 300px;
}
form fieldset input[type="text"], input[type="password"] {
background-color: #e5e5e5;
border: none;
border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
color: #5a5656;
font-family: 'Open Sans', Arial, Helvetica, sans-serif;
font-size: 14px;
height: 50px;
outline: none;
padding: 0px 10px;
width: 280px;
-webkit-appearance:none;
}
form fieldset input[type="submit"] {
background-color: #008dde;
border: none;
border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
color: #f4f4f4;
cursor: pointer;
font-family: 'Open Sans', Arial, Helvetica, sans-serif;
height: 50px;
text-transform: uppercase;
width: 300px;
-webkit-appearance:none;
}
form fieldset a {
color: #5a5656;
font-size: 10px;
}
form fieldset a:hover { text-decoration: underline; }
.btn-round {
background-color: #5a5656;
border-radius: 50%;
-moz-border-radius: 50%;
-webkit-border-radius: 50%;
color: #f4f4f4;
display: block;
font-size: 12px;
height: 50px;
line-height: 50px;
margin: 30px 125px;
text-align: center;
text-transform: uppercase;
width: 50px;
}
.signup-before {
background-color: #0064ab;
border-radius: 3px 0px 0px 3px;
-moz-border-radius: 3px 0px 0px 3px;
-webkit-border-radius: 3px 0px 0px 3px;
color: #f4f4f4;
display: block;
float: left;
height: 50px;
line-height: 50px;
text-align: center;
width: 50px;
}
.signup {
background-color: #0079ce;
border: none;
border-radius: 0px 3px 3px 0px;
-moz-border-radius: 0px 3px 3px 0px;
-webkit-border-radius: 0px 3px 3px 0px;
color: #f4f4f4;
cursor: pointer;
height: 50px;
text-transform: uppercase;
width: 250px;
}
</style>
</head>
<body>
<div id="login">
<h1><strong>Welcome.</strong> Please login.</h1>
<form action="<?php $_PHP_SELF ?>" method="post">
<fieldset>
<p><input type="text" name="Username" required value="Username" onBlur="if(this.value=='')this.value='Username'" onFocus="if(this.value=='Username')this.value='' "></p>
<p><input type="password" name="Password" required value="Password" onBlur="if(this.value=='')this.value='Password'" onFocus="if(this.value=='Password')this.value='' "></p>
<p><a href="#">Forgot Password?</a></p>
<p><input type="submit" value="Login"></p>
</fieldset>
</form>
<p><span class="btn-round">or</span></p>
<form action="<?php $_PHP_SELF ?>" method="post">
<p>
<a class="signup-before"></a>
<input type="button" name="signup" value="signup" class="signup" onClick="document.location.href='signup.php'">
</p>
</form>
</div> <!-- end login -->
</body>
</html>