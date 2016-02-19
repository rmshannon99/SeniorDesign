<?php
// if session is not started, start !
if(!isset($_SESSION)){session_start();}
require_once 'database.php';
require_once 'TableDisplay.php';

    
//Query to get student's responses
//There is no UserID yet.
//This query is used for demo only.
//Remeber to reset the student_response table first before run the demo
    $query = "SELECT Question, ChosenOption, TextResponse, CorrectOption FROM question_table, student_response WHERE question_table.ID = student_response.QuestionID AND student_response.userID='".$_SESSION['userID']."'";
    $statement = $db->prepare($query);
    $statement->execute();
    $question = $statement->fetchall();
    $statement->closeCursor();
    
// If the student didn't take the test yet
    if(empty($question)){
        $MessageResponse = "You didn't take the simulation test yet";
    }
    
    
// Get number of questions in the results
    $query1 = "SELECT COUNT(*) FROM question_table";
    $statement = $db->prepare($query1);
    $statement->execute();
    $numberOfQuestions = $statement->fetch();
    $statement->closeCursor();
    $number = $numberOfQuestions[0];
    //echo $number;

// Query to get how many question the student got right
    $query2 = "SELECT COUNT(*) FROM question_table, student_response WHERE student_response.ChosenOption = question_table.CorrectOption AND student_response.userID='".$_SESSION['userID']."'";
    $statement = $db->prepare($query2);
    $statement->execute();
    $numberOfCorrectOption = $statement->fetch();
    $statement->closeCursor();
    $numberOfCorrect = $numberOfCorrectOption[0];

    //Query to get instructor feedback
    $FeedbackQuery = "SELECT DISTINCT Feedback from student_response WHERE student_response.userID='".$_SESSION['userID']."'";
    $statement = $db->prepare($FeedbackQuery);
    $statement->execute();
    $Feedback = $statement->fetch();
    $statement->closeCursor();
    $FeedbackDisplay = $Feedback['Feedback'];
    
    
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Student Response</title>
</head>
<body>
<a href="StudentHomePage.php">Home</a><br><br>
<h1>Student Response</h1>
<?php if (!empty($MessageResponse)){?>
<h2 align="center"><?php echo $MessageResponse; ?></h2>

<?php }else{ ?>
<h2 align="center"><?php echo "You got ".$numberOfCorrect." out of ".$number." right." ?></h2>
    <?php studentResponse($question); ?><br><br>
    <h2 align="center">Feedback:</h2>
    <?php if(empty($FeedbackDisplay)){ ?>
    <p align="center"><textarea align="middle" rows="10" cols="90" disabled>The Nursing Instructor does not provide a feedback yet.</textarea></p>    
    <?php }else{?>
    <p align="center"><textarea align="middle" rows="10" cols="90" disabled><?php echo $FeedbackDisplay;?></textarea></p>    
    <?php }
}?>

</body>
</html>