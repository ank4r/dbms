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
      'l_id INTEGER AUTO_INCREMENT NOT NULL,'.
      'lec_name varchar(50) NOT NULL,'.
      'vidcont varchar(50),'.
      'lec_notes varchar(50),'.
      'rel_date Date NOT NULL,'.
      'fac_id INT NOT NULL,'.
      'topics varchar(50),'.
      'PRIMARY KEY(l_id))';
      
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
      'dir_path varchar(50) NOT NULL,'.
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
      'l_id INTEGER NOT NULL,'.
      'FOREIGN KEY(sub_id) REFERENCES subtopics(sub_id),'.
      'FOREIGN KEY(l_id) REFERENCES lectures(l_id))';
      
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



?>
