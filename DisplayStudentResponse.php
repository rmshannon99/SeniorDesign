<?php
//This file is used to display student result after the instructor select from StudentList.php
require_once 'database.php';
require_once 'TableDisplay.php';
// Start the session
if(!isset($_SESSION)){session_start();}

if(isset($_POST['StudentID'])){
    $StudentID =  $_POST['StudentID'];
    $StudentResponseQuery = "SELECT Question, ChosenOption, TextResponse, CorrectOption FROM question_table, student_response WHERE question_table.ID = student_response.QuestionID AND student_response.userID='$StudentID'";
    $statement = $db->prepare($StudentResponseQuery);
    $statement->execute();
    $StudentResponse = $statement->fetchall();
    $statement->closeCursor();

    
    if(empty($StudentResponse)){
        $StudentUserNameQuery = "SELECT * FROM user_information WHERE userID='$StudentID'";
        $statement = $db->prepare($StudentUserNameQuery);
        $statement->execute();
        $StudentUserName = $statement->fetchall();
        $statement->closeCursor(); 
        $UserName = $StudentUserName[0]['FirstName'].$StudentUserName[0]['LastName'];
        $Message = $UserName." did not take the test";
        include 'StudentList.php';
        exit();
    }
}

?>

<!DOCTYPE html>
<html>
    
<head>
<title>SimulationQuestion</title>
</head>
<body>

<h1>Students Results</h1>

    <?php DisplayStudentResponse($StudentResponse);?><br>
<h4 align="center">Provide feedback to student's result:</h4>

<form action="InsertFeedback.php" method="POST" align="center">
       <textarea  name="Feedback" rows="10" cols="90" placeholder="Please enter your feedback" ></textarea>       
       <input type="hidden" name="StudentID" value="<?php echo $StudentID;?>">
       <button name="submit" type="submit">Submit</button>
        
</form>

</body>


</html>