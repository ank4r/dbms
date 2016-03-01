<?php
include('helper_modules.php');

	//run the function call according to their priority wise i.e. low integer value = higher priority
   createMembersTable(); //1
   createLecturesTable(); //2
   createCoursesTable(); // 3
	createSubTopicTable(); //4
	createTopicTable(); //5
	
	createCalenderTable();//8
	createQuizTable();//9
	createAssignTable();//10
	createFacultyTable();//13
	createStudentTable();//15
	createAdminTable();//16

	
	relationSubTopic_Assign();//12
	relationSubTopic_Quiz();//11
	relationCourse_Faculty();//14
	relationStudent_Course();//17
	relationTopic_SubTopic();//6
	relationSubTopic_Lecture();//7
	relationCourse_Topic();//7


	exit();
?>


