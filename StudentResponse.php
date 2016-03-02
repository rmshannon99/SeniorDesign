<pre>
<?php
// if session is not started, start !
if(!isset($_SESSION)){session_start();}
require_once 'database.php';
require_once 'TableDisplay.php';


        //Get SceneInformation from scene_table table
            $SceneInfoQuery = "SELECT * FROM scene_table";
            $statement = $db->prepare($SceneInfoQuery);
            $statement->execute();
            $SceneInfo = $statement->fetchall();
            $statement->closeCursor();
            //print_r($SceneInfo);
            
        //Get student's response from student_response_new table
            $StudentAnswerQuery = "SELECT * FROM student_response_new WHERE userID ='".$_SESSION['userID']."'";
            $statement = $db->prepare($StudentAnswerQuery);
            $statement->execute();
            $StudentAnswer = $statement->fetchall();
            $statement->closeCursor();
            //print_r($StudentAnswer);
            
            
        //Check if the student takes the test yet or not
            if(empty($StudentAnswer)){
                $MessageResponse = "You didn't take the simulation test yet";
            }
            
        //Check to see if the instructor provides feedback yet
        $StudentID =  $_SESSION['userID'];
        $CheckFeedbackQuery = "SELECT DISTINCT Feedback FROM student_response_new WHERE userID ='$StudentID'";
        $statement = $db->prepare($CheckFeedbackQuery);
        $statement->execute();
        $CheckFeedback = $statement->fetchall();
        $statement->closeCursor();

?>
</pre>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Student Response</title>
</head>
<body>
    <h1>Student Response</h1>
    <?php if (!empty($MessageResponse)){
        echo $MessageResponse;
    }else{
        
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
        
    }?>
    
<!--    Display instructor's feedback-->
<?php if(empty($CheckFeedback[0]['Feedback'])){ ?>
<p align="center"><textarea align="middle" rows="10" cols="90" disabled>The Nursing Instructor does not provide a feedback yet.</textarea></p>
<?php }else { ?>
<p align="center"><textarea align="middle" rows="10" cols="90" disabled><?php echo $CheckFeedback[0]['Feedback']; ?></textarea></p>
<?php }?>
</body>

</html>