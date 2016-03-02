<?php
//This file is used to display student result after the instructor selects from StudentList.php
require_once 'database.php';
require_once 'TableDisplay.php';
// Start the session
if(!isset($_SESSION)){session_start();}

if(isset($_POST['StudentID'])){
    
    //Get student's response from student_response_new table
    $StudentID =  $_POST['StudentID'];
    $StudentAnswerQuery = "SELECT * FROM student_response_new WHERE userID ='$StudentID'";
    $statement = $db->prepare($StudentAnswerQuery);
    $statement->execute();
    $StudentAnswer = $statement->fetchall();
    $statement->closeCursor();
    
    //Get SceneInformation from scene_table table
    $SceneInfoQuery = "SELECT * FROM scene_table";
    $statement = $db->prepare($SceneInfoQuery);
    $statement->execute();
    $SceneInfo = $statement->fetchall();
    $statement->closeCursor();  
    
    //Check if the student already gets the feedback
    $CheckFeedbackQuery = "SELECT DISTINCT Feedback FROM student_response_new WHERE userID ='$StudentID'";
    $statement = $db->prepare($CheckFeedbackQuery);
    $statement->execute();
    $CheckFeedback = $statement->fetchall();
    $statement->closeCursor();
    
    if(empty($StudentAnswer)){
        $StudentUserNameQuery = "SELECT * FROM user_information WHERE userID='$StudentID'";
        $statement = $db->prepare($StudentUserNameQuery);
        $statement->execute();
        $StudentUserName = $statement->fetchall();
        $statement->closeCursor(); 
        $UserName = $StudentUserName[0]['FirstName']." ".$StudentUserName[0]['LastName'];
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

<?php
        foreach ($SceneInfo as $SceneInfoValue){
        echo "<h3>"."Scene: ".$SceneInfoValue['SceneInformation']."</h3>";
            $result = '<table align="center" border="1" style="width:30%" cellpadding="10">';
            $result .= '<th>Chosen Option</th><th>Student Comment</th>';
            foreach ($StudentAnswer as $StudentAnswerValue){

                if($SceneInfoValue['SceneID'] == $StudentAnswerValue['SceneID']){     
                    $result .= '<tr>';
                    $result .= '<td>'.$StudentAnswerValue['ChosenOption'].'</td>';
                    $result .= '<td>'.$StudentAnswerValue['TextResponse'].'</td>';
                    $result .= '</tr>';                            
                    //echo $StudentAnswerValue['ChosenOption'];
                    //echo $StudentAnswerValue['TextResponse']."<br>";

                }
            }
                $result .= '</table>';
                echo $result;
                echo "<br>";
    }

?>
    
<h4 align="center">Provide feedback to student's result:</h4>

<form action="InsertFeedback.php" method="POST" align="center">
    <?php if(empty($CheckFeedback)){?>
        <p align="center"><textarea name="Feedback" rows="10" cols="90" placeholder="Please enter your feedback" ></textarea><br>     
       <input type="hidden" name="StudentID" value="<?php echo $StudentID;?>">
       <button name="submit" type="submit">Submit</button></p>  
    <?php }else{ ?> 
        <p align="center"><textarea name="Feedback" rows="10" cols="90" placeholder="<?php echo $CheckFeedback[0]['Feedback']; ?>" ></textarea><br>     
       <input type="hidden" name="StudentID" value="<?php echo $StudentID;?>">
       <input action="action" type="button" value="Back" onclick="history.go(-1);" />
       <button name="submit" type="submit">Submit</button></p>
    <?php } ?>

        
</form>

</body>


</html>