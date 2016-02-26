<?php
include 'helper_modules.php';

   	if($_POST["password"]){
   	if(!$_POST["fname"]||!$_POST["lname"]||!$_POST["userid"]||!$_POST["password"]||!$_POST["age"]||!$_POST["sex"]||!$_POST["bday"]||!$_POST["email"])
   	{
   		echo "Please fill all the details!!";
   	}
   	else{
   
   	$conn = connectToDatabase();
   	if(!$_POST["mname"])
    {
      
   	$sql='INSERT INTO members '.
   	'SET fname=\''.$_POST["fname"].
   	'\',lname=\''.$_POST["lname"].
 	'\',userid=\''.$_POST["userid"].
 	'\',pwd=\''.$_POST["password"].
   	'\',age='.$_POST["age"].
   	',sex=\''.$_POST["sex"].
   	'\',bday=\''.$_POST["bday"].
    '\',email=\''.$_POST["email"].'\'';
   }
   else{
    $sql='INSERT INTO members '.
   	'SET fname=\''.$_POST["fname"].
   	'\',mname=\''.$_POST["mname"].
   	'\',lname=\''.$_POST["lname"].
 	'\',userid=\''.$_POST["userid"].
 	'\',pwd=\''.$_POST["password"].
   	'\',age='.$_POST["age"].
   	',sex=\''.$_POST["sex"].
    '\',bday=\''.$_POST["bday"].
    '\',email=\''.$_POST["email"].'\'';
   }

   $myusername = $_POST['userid'];

   $retval=mysql_query($sql,$conn);
   if(! $retval ) {
      die('Could not insert into table: ' . mysql_error());
   }
   
   //echo "\nAccount created successfully\n";
 	 echo "\nAccount created successfully \n";

      $_SESSION['login_user'] = $_POST['userid'];
        
      header('Location: welcome.php');

   //print "<br>".$sql."<br>";
   //echo "hello";
   exit();
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
form fieldset input[type="text"] ,input[type="number"] ,input[type="date"],input[type="password"],input[type="email"]{
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
select {
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
z-index: 1;
}
form fieldset a:hover { text-decoration: underline; }
</style>
</head>
<body>
<div id="login">
<h1><strong>Welcome</strong> Please signup.</h1>
<form action="<?php $_PHP_SELF ?>" method="post">
<fieldset>
<p><input type="text" name="fname" required placeholder="First Name" ></p>
<p><input type="text" name="mname" placeholder="Middle Name"></p>
<p><input type="text" name="lname" required placeholder="Last Name"></p>
<p><input type="text" name="userid" value ="" required placeholder="User ID"></p>
<p><input type="password" name="password" required placeholder="password"></p>
<p><input type="email" name="email" required placeholder="example@gmail.com"></p>
<p>Age: </p><p><input type="number" name="age" required placeholder="Age in years"></p>
<p>sex: </p>
<select name = "sex">
    <option value = "M">
       Male
    </option>
 
    <option value = "F">
       Female
    </option>
 </select>
<p>Birth Date: </p>
<p><input type="date" name="bday" required placeholder="YYYY-MM-DD"></p>
<p><input type="submit" value="Create Account"></p>
</fieldset>
</form>
</div> <!-- end login -->
</body>
</html>