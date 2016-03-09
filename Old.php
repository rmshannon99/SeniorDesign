<?php
require_once 'database.php';

// Start the session
if(!isset($_SESSION)){session_start();}

$query = "SELECT * FROM question_table";
$statement = $db->prepare($query);
$statement->execute();
$question = $statement->fetchall();

$statement->closeCursor(); 

// Getting response from the student
//if (isset($_POST["submit"])){
//   
//echo "worked"; 
//echo $_POST["option"];
//}

?>

<!DOCTYPE html>
<html>
    
<head>
<title>SimulationQuestion</title>
</head>
<body>

<h1>Welcome</h1>
<form action="QuestionAndOption.php" method="POST">
<!--         index is used to display question number-->
        <?php $index =1; ?>
<!--        Pulling data from the returned array from the query-->
        <?php foreach($question as $value){ ?>
        Question <?php echo $index.": ".$value["Question"];?><br>
        
        A: <input type="radio" name="option" value="OptionA"> <?php echo $value["OptionA"]; ?><br>
        B: <input type="radio" name="option" value="OptionB"> <?php echo $value["OptionB"]; ?><br>
        C: <input type="radio" name="option" value="OptionC"> <?php echo $value["OptionC"]; ?><br>
        D: <input type="radio" name="option" value="OptionD"> <?php echo $value["OptionD"]; ?><br>
        
        <!--Submit button-->
        <button name="submit" type="submit">Next</button><br>
        
        <!--index is increment by 1 after each loop-->
        <?php $index++; ?>                           
        <?php } ?>

    </form>

</body>


</html>