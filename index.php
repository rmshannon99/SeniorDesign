<?php
require_once 'database.php';
session_start();


if(!isset($_SESSION['questions'])) {
    $query = "SELECT * FROM question_table";
    $statement = $db->prepare($query);
    $statement->execute();
    $question = $statement->fetchall();
    $statement->closeCursor();

    $_SESSION['questions'] = $question; // this array contains the questions from the database.
    $_SESSION['counter'] = 0; //Index in the array

    // Get number of questions in the results
    $query1 = "SELECT COUNT(*) FROM question_table";
    $statement = $db->prepare($query1);
    $statement->execute();
    $numberOfQuestions = $statement->fetch();
    $statement->closeCursor();
    $_SESSION['number'] = $numberOfQuestions[0];
    
}

// If the button is clicked, this will record the student's responses to the database.
if (isset($_POST["submit"])){
    // DO YOUR STUFF 

    // Check to see if index exist
    $index = $_SESSION['counter']; //Index is used for the query below to get QuestionID
        //echo $_POST["option"];
    $query = "INSERT INTO student_response (ID, QuestionID, ChosenOption, TextResponse) VALUES (Null, '".$_SESSION['questions'][$index][0]."', '".$_POST['option']."', '".$_POST['comment']."')";
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();   
    $_SESSION['counter']++;

}

?>

<!DOCTYPE html>
<html>
    
<head>
<meta charset="UTF-8">
<title>SimulationQuestion</title>

</head>
<body>

<h1>Welcome</h1>
<?php
    
    //If the counter is less than or equal to the number of questions, it will display the question and options
    if($_SESSION['counter'] <= $_SESSION['number'] -1){ //because counter starts at 0, that's why number is subtracted 1
    $question = $_SESSION['questions'][$_SESSION['counter']];   

?>
<form action="index.php" method="POST">
    Question <?php echo $_SESSION['counter']+1 . ": " . $question["Question"]; ?><br>

    A: <input type="radio" name="option" value="<?php echo $question["OptionA"];?>" checked> <?php echo $question["OptionA"]; ?><br>
    B: <input type="radio" name="option" value="<?php echo $question["OptionB"];?>"> <?php echo $question["OptionB"]; ?><br>
    C: <input type="radio" name="option" value="<?php echo $question["OptionC"];?>"> <?php echo $question["OptionC"]; ?><br>
    D: <input type="radio" name="option" value="<?php echo $question["OptionD"];?>"> <?php echo $question["OptionD"]; ?><br>
       <br>
       <br>
       <textarea name="comment" rows="5" cols="35" placeholder="Please enter your comment" ></textarea>
<!--    If the last question is displayed, then the "Finish" button is showed. Otherwise, the "Next" button is showed.-->
       <button name="submit" type="submit"><?php if($_SESSION['counter']== $_SESSION['number']-1){ echo "Finish";} else {echo "Next";} ?></button>


        
</form>
<?php
    }
    else {
      
        header("Location: StudentResponse.php");
        session_unset(); // Remove all session variables.
    }
?>


</body>


</html>