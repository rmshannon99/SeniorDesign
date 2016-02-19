<?php
//This file is used reset student test if he/she already took the test and wish to re-take it again

require_once 'database.php';
// Start the session
if(!isset($_SESSION)){session_start();}

if(isset($_POST['StudentID'])){
    $StudentID =  $_POST['StudentID'];
    
    //This query to remove student answers in student_response table, so that he/she can re-take the test
    $ResetStudentTestQuery = "DELETE FROM student_response WHERE userID='$StudentID'";
    $statement = $db->prepare($ResetStudentTestQuery);
    $statement->execute();
    $statement->closeCursor();
    
    
    //Query to get username and student name based on the StudentID in order to display the message back in StudentList.php
    $StudentInfoQuery = "SELECT * FROM user_information WHERE userID='$StudentID'";
    $statement = $db->prepare($StudentInfoQuery);
    $statement->execute();
    $StudentInfo = $statement->fetch();
    $statement->closeCursor();
    $StudentName = $StudentInfo['FirstName'].' '.$StudentInfo['LastName'];
    $Message = $StudentName."'s account can re-take the simulation test now.";
    include 'StudentList.php';
    exit();
}   
?>

