<?php
   
   session_start();
   
   $user_check = $_SESSION['login_user'];

   $sql = "SELECT userid,id,fname FROM members where id = \'".$_SESSION['login_id']." \' ";
   
   $ses_sql = mysqli_query($db,$sql);
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['fname'];
  	
   echo "login id : " .$_SESSION['login_id'];
   
   if(!isset($_SESSION['login_user'])){
	    header("location:../login/login.php");
   }
?>
