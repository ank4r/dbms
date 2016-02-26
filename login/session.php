<?php
   
   session_start();
   
   $user_check = $_SESSION['login_user'];

   $sql = "SELECT fname FROM members where userid = \'".$user_check." \' ";
   
   $ses_sql = mysqli_query($db,$sql);
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['fname'];
   
   if(!isset($_SESSION['login_user'])){
	    header("location:../login/login.php");
   }
?>