<?php
include('helper_modules.php');
	//run the function call according to their priority wise i.e. low integer value = higher priority
   //createMembersTable(); //1
   //createLecturesTable(); //2
	//createSubTopicTable(); //3
	//createTopicTable(); //4
	relationTopic_SubTopic();//5
	relationSubTopic_Lecture();//6
	exit();
?>


