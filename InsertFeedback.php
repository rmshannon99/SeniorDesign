<?php
require_once 'database.php';
require_once 'TableDisplay.php';
// Start the session
if(!isset($_SESSION)){session_start();}

if(isset($_POST['submit'])){
    
    $Feedback = $_POST['Feedback'];
    $StudentID = $_POST['StudentID'];
    
    
    
    // Insert teacher feedback to student_response table
    $InsertFeedbackQuery = "UPDATE student_response_new SET Feedback ='$Feedback' WHERE userID='$StudentID'";
    $statement = $db->prepare($InsertFeedbackQuery);
    $statement->execute();
    $statement->closeCursor();
    $FeedbackMessage = "The feedback is successfully saved.";
    include 'StudentList.php';
    //header("Location: StudentList.php");
   
    
}


?>

