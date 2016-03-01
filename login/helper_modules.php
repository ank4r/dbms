<?php
function connectToDatabase()
{
   include('info.php');
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) {
     die('Could not connect: ' . mysql_error());
   }
   
   mysql_select_db('dbms');
      //echo 'Connected successfully';
   return $conn;
}

function endDatabaseConnection($conn)
{
    mysql_close($conn);
}


function createMembersTable()
{
   $conn=connectToDatabase();

   $sql='CREATE TABLE members('.
      'id INTEGER AUTO_INCREMENT NOT NULL,'.
      'fname varchar(20) NOT NULL,'.
      'mname varchar(20),'.
      'lname varchar(20) NOT NULL,'.
      'userid varchar(20) NOT NULL,'.
      'pwd varchar(30) NOT NULL,'.
      'age INTEGER NOT NULL CHECK (age>0 AND age<120),'.
      'sex BOOLEAN NOT NULL,'. // true denotes male, false -> female
      'bday DATE NOT NULL,'.
      'email varchar(50) NOT NULL,'.
      'PRIMARY KEY(id))';
      
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   else{
      echo "Created Members Table successfully";
   }
   endDatabaseConnection($conn);
} 

function createLecturesTable()
{
   $conn=connectToDatabase();

   $sql='CREATE TABLE lectures('.
      'lec_id INTEGER AUTO_INCREMENT NOT NULL,'.
      'lec_name varchar(50) NOT NULL,'.
      'vdl varchar(500),'.
      'lec_notes varchar(500) NOT NULL,'.
      'rel_date Date NOT NULL,'.
      'fac_id INT NOT NULL,'.
      'topics varchar(50),'.
      'PRIMARY KEY(lec_id))';
      
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   else{
      echo "Created Lectures Table successfully";
   }

   endDatabaseConnection($conn);
}


function createSubTopicTable()
{
   $conn=connectToDatabase();

   $sql='CREATE TABLE subtopics('.
      'sub_id INTEGER AUTO_INCREMENT NOT NULL,'.
      'sub_name varchar(50),'.
      'PRIMARY KEY(sub_id))';
      
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   else{
      echo "Created SubTopics Table successfully";
   }

   endDatabaseConnection($conn);
}

function createTopicTable()
{
   $conn=connectToDatabase();

   $sql='CREATE TABLE topics('.
      'top_id INTEGER AUTO_INCREMENT NOT NULL,'.
      'top_name varchar(50),'.
      'PRIMARY KEY(top_id))';
      
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   else{
      echo "Created Topics Table successfully";
   }

   endDatabaseConnection($conn);
}

function createQuizTable()
{
   $conn=connectToDatabase();

   $sql='CREATE TABLE quiz('.
      'q_id INTEGER AUTO_INCREMENT NOT NULL,'.
      'path varchar(500) NOT NULL,'.
      'PRIMARY KEY(q_id))';
      
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   else{
      echo "Created Topics Table successfully";
   }

   endDatabaseConnection($conn);
}

function createAssignTable()
{
   $conn=connectToDatabase();

   $sql='CREATE TABLE assign('.
      'ass_id INTEGER AUTO_INCREMENT NOT NULL,'.
      'path varchar(500) NOT NULL,'.
      'PRIMARY KEY(ass_id))';
      
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   else{
      echo "Created Topics Table successfully";
   }

   endDatabaseConnection($conn);
}

function relationTopic_SubTopic()
{
   $conn=connectToDatabase();

   $sql='CREATE TABLE topsubtop('.
      'top_id INTEGER NOT NULL,'.
      'sub_id INTEGER NOT NULL,'.
      'FOREIGN KEY(top_id) REFERENCES topics(top_id),'.
      'FOREIGN KEY(sub_id) REFERENCES subtopics(sub_id))';
      
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data1: ' . mysql_error());
   }
   else{
      echo "Created Topic_SubTopic Table successfully";
   }

   endDatabaseConnection($conn);
}

function relationSubTopic_Lecture()
{
   $conn=connectToDatabase();

   $sql='CREATE TABLE subtoplec('.
      'sub_id INTEGER NOT NULL,'.
      'lec_id INTEGER NOT NULL,'.
      'FOREIGN KEY(sub_id) REFERENCES subtopics(sub_id),'.
      'FOREIGN KEY(lec_id) REFERENCES lectures(lec_id))';
      
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data2: ' . mysql_error());
   }
   else{
      echo "Created SubTopic_Lecture Table successfully";
   }

   endDatabaseConnection($conn);
}

function relationCourse_Topic()
{
   $conn=connectToDatabase();

   $sql='CREATE TABLE coursetop('.
      'c_id INTEGER NOT NULL,'.
      'top_id INTEGER NOT NULL,'.
      'FOREIGN KEY(top_id) REFERENCES topics(top_id),'.
      'FOREIGN KEY(c_id) REFERENCES courses(c_id))';
      
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data2: ' . mysql_error());
   }
   else{
      echo "Created relationCourse_Topic Table successfully";
   }

   endDatabaseConnection($conn);
}

function relationSubTopic_Quiz()
{
   $conn=connectToDatabase();

   $sql='CREATE TABLE subtopquiz('.
      'sub_id INTEGER NOT NULL,'.
      'q_id INTEGER NOT NULL,'.
      'FOREIGN KEY(sub_id) REFERENCES subtopics(sub_id),'.
      'FOREIGN KEY(q_id) REFERENCES quiz(q_id))';
      
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data2: ' . mysql_error());
   }
   else{
      echo "Created SubTopic_Lecture Table successfully";
   }

   endDatabaseConnection($conn);
}

function relationSubTopic_Assign()
{
   $conn=connectToDatabase();

   $sql='CREATE TABLE subtopass('.
      'sub_id INTEGER NOT NULL,'.
      'ass_id INTEGER NOT NULL,'.
      'FOREIGN KEY(sub_id) REFERENCES subtopics(sub_id),'.
      'FOREIGN KEY(ass_id) REFERENCES assign(ass_id))';
      
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data2: ' . mysql_error());
   }
   else{
      echo "Created SubTopic_Lecture Table successfully";
   }

   endDatabaseConnection($conn);
}

function dropTable($tablename)
{
   $conn=connectToDatabase();

   $sql='DROP TABLE '.$tablename;
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not execute query: ' . mysql_error());
   }
   else{
      echo "Droppped Table ". $tablename." successfully";
   }
    endDatabaseConnection($conn);
}


function createCoursesTable()
{
   $conn=connectToDatabase();
   
   $sql='CREATE TABLE courses('.
      'c_id INTEGER AUTO_INCREMENT NOT NULL,'.
      'course_name varchar(50) NOT NULL,'.
      'course_category SET(\'Mathematics\',\'General Sciences\',\'Biology\',\'Physics\',\'Chemistry\',\'Social Sciences\',\'Miscellaneous\',\'Languages\',\'Computer Science\') NOT NULL,'.
      'course_admin INTEGER NOT NULL,'.
      'air_date Date NOT NULL,'.
      'brief_overview varchar(1000) NOT NULL,'.
      'PRIMARY KEY(c_id))';
      
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   else{
      echo "Created Courses Table successfully";
   }

   endDatabaseConnection();
}

function createFacultyTable() //tested
{
   $conn=connectToDatabase();
   $sql='CREATE TABLE faculty('.
      'fac_id INTEGER AUTO_INCREMENT NOT NULL,'.
      'mem_id INTEGER NOT NULL,'.
      'FOREIGN KEY(mem_id) REFERENCES members(id),'.
      'PRIMARY KEY(fac_id))';
      
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   else{
      echo "Created Topics Table successfully";
   }

   endDatabaseConnection($conn);
}

function relationCourse_Faculty()
{
   $conn=connectToDatabase();

   $sql='CREATE TABLE coursefac('.
      'c_id INTEGER NOT NULL,'.
      'fac_id INTEGER NOT NULL,'.
      'FOREIGN KEY(fac_id) REFERENCES faculty(fac_id),'.
      'FOREIGN KEY(c_id) REFERENCES courses(c_id))';
      
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data2: ' . mysql_error());
   }
   else{
      echo "Created relationCourse_Faculty Table successfully";
   }

   endDatabaseConnection($conn);
}

function createStudentTable()
{
   $conn=connectToDatabase();
   $sql='CREATE TABLE students('.
      'stud_id INTEGER AUTO_INCREMENT NOT NULL,'.
      'mem_id INTEGER NOT NULL,'.
      'FOREIGN KEY(mem_id) REFERENCES members(id),'.
      'PRIMARY KEY(stud_id))';
      
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   else{
      echo "Created Topics Table successfully";
   }

   endDatabaseConnection($conn);
}

function createAdminTable()
{
   $conn=connectToDatabase();
   $sql='CREATE TABLE admins('.
      'admin_id INTEGER AUTO_INCREMENT NOT NULL,'.
      'mem_id INTEGER NOT NULL,'.
      'FOREIGN KEY(mem_id) REFERENCES members(id),'.
      'PRIMARY KEY(admin_id))';
      
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   else{
      echo "Created Topics Table successfully";
   }

   endDatabaseConnection($conn);
}

function populate_lectures($subtop_id,$lec_name,$vdl,$lec_notes,$fac_id,$topics)
{
   $conn=connectToDatabase();
   /*
   $sql = "SELECT top_id FROM topics where top_name = \'$topic\'";
   $retval=mysql_query($sql,$conn);

   if(! $retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   $i=0;
   while($row = mysql_fetch_assoc($retval))
   {
      $i=1;
      break;
   }
   if($i==0)
   {
      //Inserted Topic
      $sql = "INSERT INTO topics SET top_name=\'$topic\'";
      $retval=mysql_query($sql,$conn);
      if(! $retval )
      {
        die('Could not get data: ' . mysql_error());
      }

      //Get the id of just insterted topic
      $sql = "SELECT top_id FROM topics where top_name = \'$topic\'";
      $retval=mysql_query($sql,$conn);
      if(! $retval )
      {
        die('Could not get data: ' . mysql_error());
      }
      $row = mysql_fetch_assoc($retval);
      $topid=$row['top_id'];

      //to insert the top_id course_id
      $sql = "INSERT INTO coursetop SET c_id=$course_id, top_id=$topid";
      $retval=mysql_query($sql,$conn);
      if(! $retval )
      {
        die('Could not get data: ' . mysql_error());
      }
   }

   $sql = "SELECT sub_id FROM subtopics where sub_name = \'$subtopic\'";
   $retval=mysql_query($sql,$conn);
   if(! $retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   $i=0;

   while($row = mysql_fetch_assoc($retval))
   {
      $i=1;
      $sql = "INSERT INTO lectures SET top_name=\'$topic\'";
      $retval=mysql_query($sql,$conn);
      if(! $retval )
      {
        die('Could not get data: ' . mysql_error());
      }
      break;
   }

   if($i==0)
   {
      $sql = "INSERT INTO subtopics SET sub_name=\'$subtopic\'";
      $retval=mysql_query($sql,$conn);
      if(! $retval )
      {
        die('Could not get data: ' . mysql_error());
      }

      //Get the id of just insterted topic
      $sql = "SELECT sub_id FROM subtopics where sub_name = \'$subtopic\'";
      $retval=mysql_query($sql,$conn);
      if(! $retval )
      {
        die('Could not get data: ' . mysql_error());
      }
      $row = mysql_fetch_assoc($retval);
      $subid=$row['sub_id'];

      $sql = "INSERT INTO topsubtop SET top_id=$top_id, sub_id=$subid";
      $retval=mysql_query($sql,$conn);
      if(! $retval )
      {
        die('Could not get data: ' . mysql_error());
      }
   }
   $sql = "SELECT lec_id FROM lectures where lec_name = \'$lec_name\'";
   $retval=mysql_query($sql,$conn);
   if(! $retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   $i=0;
   while($row = mysql_fetch_assoc($retval))
   {
      $i=1;
      $lecid=$row['lec_id'];
      $sql = "SELECT sub_id FROM subtoplec where lec_id = $lecid";
      $retval=mysql_query($sql,$conn);
      if(! $retval )
      {
        die('Could not get data: ' . mysql_error());
      }
      while($row = mysql_fetch_assoc($retval))
      {
         $i=2;
      }
      break;
   }
   if($i==2)
   {
      return -1;
   }
   else
   {
      if($i==0)
      {
         $sql = "INSERT INTO lectures SET lec_name=\'$lec_name\',vdl=";
         $retval=mysql_query($sql,$conn);
         if(! $retval )
         {
           die('Could not get data: ' . mysql_error());
         }
      }
   }*/
   $dt = date("Y-m-d");
   $sql = "INSERT INTO lectures SET lec_name='$lec_name',vdl='$vdl',lec_notes='$lec_notes',rel_date='$dt',fac_id=$fac_id,topics='$topics'";
   $retval=mysql_query($sql,$conn);
   if(! $retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   $lecid=mysql_insert_id();
   $sql = "INSERT INTO subtoplec SET sub_id=$subtop_id,lec_id=$lecid";
   $retval=mysql_query($sql,$conn);
   if(! $retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   endDatabaseConnection($conn);
   return $lecid;
}

function populate_subtopics($top_id,$sub_name)
{
   $conn=connectToDatabase();
   $sql = "INSERT INTO subtopics SET sub_name='$sub_name'";
   $retval=mysql_query($sql,$conn);
   if(! $retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   $subid=mysql_insert_id();
   $sql = "INSERT INTO topsubtop SET top_id=$top_id,sub_id=$subid";
   $retval=mysql_query($sql,$conn);
   if(! $retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   endDatabaseConnection($conn);
   return $subid;
}

function populate_topics($course_id,$top_name)
{
   $conn=connectToDatabase();
   $sql = "INSERT INTO topics SET top_name='$top_name'";
   $retval=mysql_query($sql,$conn);
   if(! $retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   $topid=mysql_insert_id();
   $sql = "INSERT INTO coursetop SET c_id=$course_id,top_id=$topid";
   $retval=mysql_query($sql,$conn);
   if(! $retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   endDatabaseConnection($conn);
   return $topid;
}

function get_course_for_faculty($fac_id)
{
   $conn=connectToDatabase();
   $sql="SELECT coursefac.c_id , courses.course_name FROM courses INNER JOIN coursefac ON courses.c_id=coursefac.c_id WHERE coursefac.fac_id=$fac_id";
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   $result=array();
   while($row=mysql_fetch_assoc($retval))
   {
      $result[] = $row;
   }
   endDatabaseConnection($conn);
   return $result;
}



function get_topics_for_course($course_id)
{
   $conn=connectToDatabase();
   $sql="SELECT coursetop.top_id, topics.top_name FROM topics INNER JOIN coursetop ON topics.top_id=coursetop.top_id WHERE coursetop.c_id=$course_id";
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   $result=array();
   while($row=mysql_fetch_assoc($retval))
   {
      $result[] = $row;
   }
   endDatabaseConnection($conn);
   return $result;
}

function get_subtopics_for_topic($top_id)
{
   $conn=connectToDatabase();
   $sql="SELECT topsubtop.sub_id, subtopics.sub_name FROM subtopics INNER JOIN topsubtop ON subtopics.sub_id=topsubtop.sub_id WHERE topsubtop.top_id=$top_id";
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   $result=array();
   while($row=mysql_fetch_assoc($retval))
   {
      $result[] = $row;
   }
   endDatabaseConnection($conn);
   return $result;
}

function get_lectures_for_subtopic($sub_id)
{
   $conn=connectToDatabase();
   $sql="SELECT subtoplec.lec_id, lectures.lec_name,lectures.vdl,lectures.lec_notes,lectures.rel_date,lectures.fac_id,lectures.topics FROM lectures INNER JOIN subtoplec ON subtoplec.lec_id=lectures.lec_id WHERE subtoplec.sub_id=$sub_id";
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   $result=array();
   while($row=mysql_fetch_assoc($retval))
   {
      $result[] = $row;
   }
   endDatabaseConnection($conn);
   return $result;
}

function get_assignments_for_subtopic($sub_id)
{
   $conn=connectToDatabase();
   $sql="SELECT subtopass.ass_id, assign.path FROM assign INNER JOIN subtopass ON subtopass.ass_id=assign.ass_id WHERE subtopass.sub_id=$sub_id";
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   $result=array();
   while($row=mysql_fetch_assoc($retval))
   {
      $result[] = $row;
   }
   endDatabaseConnection($conn);
   return $result;
}

function get_quiz_for_subtopic($sub_id)
{
   $conn=connectToDatabase();
   $sql="SELECT subtopquiz.q_id, quiz.path FROM quiz INNER JOIN subtopquiz ON subtopquiz.q_id=quiz.q_id WHERE subtopquiz.sub_id=$sub_id";
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   $result=array();
   while($row=mysql_fetch_assoc($retval))
   {
      $result[] = $row;
   }
   endDatabaseConnection($conn);
   return $result;
}
function get_fac_id($mem_id)
{
   $conn=connectToDatabase();
   $sql="SELECT faculty.fac_id FROM faculty WHERE faculty.mem_id = $mem_id";
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   $facid=3;
   while($row=mysql_fetch_assoc($retval))
   {
      $facid=$row['fac_id'];
      break;
   }
   return $facid;
}

function get_admin_id($mem_id)
{
   $conn=connectToDatabase();
   $sql="SELECT admins.admin_id FROM admins WHERE admins.mem_id = $mem_id";
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   $adminid=3;
   while($row=mysql_fetch_assoc($retval))
   {
      $adminid=$row['admin_id'];
      break;
   }
   return $adminid;
}

function get_stud_id($mem_id)
{
   $conn=connectToDatabase();
   $sql="SELECT students.stud_id FROM students WHERE students.mem_id = $mem_id";
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   $studid=3;
   while($row=mysql_fetch_assoc($retval))
   {
      $studid=$row['stud_id'];
      break;
   }
   return $studid;
}
function populate_faculty($mem_id) //tested
{
   $conn=connectToDatabase();
   $sql = "INSERT INTO faculty SET mem_id=$mem_id";
   $retval=mysql_query($sql,$conn);
   if(! $retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   $facid=mysql_insert_id();
   endDatabaseConnection($conn);
   return $facid;
}

function populate_course($course_name,$course_category,$course_admin,$air_date,$brief_overview) 
{
   $conn=connectToDatabase();
   $sql = "INSERT INTO courses SET course_name='$course_name',course_category='$course_category',course_admin=$course_admin,air_date='$air_date',brief_overview='$brief_overview'";
   $retval=mysql_query($sql,$conn);
   if(! $retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   $courseid=mysql_insert_id();
   endDatabaseConnection($conn);
   return $courseid;
}

function populate_students($mem_id) //tested
{
   $conn=connectToDatabase();
   $sql = "INSERT INTO students SET mem_id=$mem_id";
   $retval=mysql_query($sql,$conn);
   if(! $retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   $studid=mysql_insert_id();
   endDatabaseConnection($conn);
   return $studid;
}

function relationStudent_Course()
{
   $conn=connectToDatabase();

   $sql='CREATE TABLE studcourse('.
      'stud_id INTEGER NOT NULL,'.
      'c_id INTEGER NOT NULL,'.
      'FOREIGN KEY(stud_id) REFERENCES students(stud_id),'.
      'FOREIGN KEY(c_id) REFERENCES courses(c_id))';
      
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data1: ' . mysql_error());
   }
   else{
      echo "Created Student_Course Table successfully";
   }

   endDatabaseConnection($conn);
}

function enroll_students($stud_id,$course_id)
{
   $conn=connectToDatabase();
   $sql = "INSERT INTO studcourse SET stud_id=$stud_id,c_id=$course_id";
   $retval=mysql_query($sql,$conn);
   if(! $retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   endDatabaseConnection($conn);
}

function populate_quiz($sub_id,$path)
{
   $conn=connectToDatabase();
   $sql = "INSERT INTO quiz SET path='$path'";
   $retval=mysql_query($sql,$conn);
   if(! $retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   $qid=mysql_insert_id();
   $sql = "INSERT INTO subtopquiz SET sub_id=$sub_id,q_id=$qid";
   $retval=mysql_query($sql,$conn);
   if(! $retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   endDatabaseConnection($conn);
}

function populate_assign($sub_id,$path)
{
   $conn=connectToDatabase();
   $sql = "INSERT INTO assign SET path='$path'";
   $retval=mysql_query($sql,$conn);
   if(! $retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   $assid=mysql_insert_id();
   $sql = "INSERT INTO subtopass SET sub_id=$sub_id,ass_id=$assid";
   $retval=mysql_query($sql,$conn);
   if(! $retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   endDatabaseConnection($conn);
}

function createCalenderTable()
{
   $conn=connectToDatabase();
   $sql= 'SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO"';
   $retval=mysql_query($sql,$conn);
   if(!$retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   else{
      echo "SET SQL_MODE successfully";
   }

   $sql='CREATE TABLE `jqcalendar` ('.
     '`Id` int(11) NOT NULL auto_increment,'.
     '`Subject` varchar(1000) character set utf8 default NULL,'.
     '`Location` varchar(200) character set utf8 default NULL,'.
     '`Description` varchar(255) character set utf8 default NULL,'.
     '`StartTime` datetime default NULL,'.
     '`EndTime` datetime default NULL,'.
     '`IsAllDayEvent` smallint(6) NOT NULL,'.
     '`Color` varchar(200) character set utf8 default NULL,'.
     '`RecurringRule` varchar(500) character set utf8 default NULL,'.
     'PRIMARY KEY  (`Id`)'.
   ') ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4' ;
      
   $retval=mysql_query($sql,$conn);
   
   if(!$retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   else{
      echo "Created Calendar Table successfully";
   }

   endDatabaseConnection();
}

?>