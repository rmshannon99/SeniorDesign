
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
                $MessageResponse = '<div class="alert alert-warning"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;<strong>'."You didn't take the simulation test yet";
            }
            
        //Check to see if the instructor provides feedback yet
        $StudentID =  $_SESSION['userID'];
        $CheckFeedbackQuery = "SELECT DISTINCT Feedback FROM student_response_new WHERE userID ='$StudentID'";
        $statement = $db->prepare($CheckFeedbackQuery);
        $statement->execute();
        $CheckFeedback = $statement->fetchall();
        $statement->closeCursor();

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/studenthome.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<title>Student Response</title>
</head>
<body>
         <div class="container-fluid"> 
          <div class="row">
              <img src="img/banner.svg" />
</div>
     <div class="row title">
         <div class="col-md-8"><p class="ptitle"><img class="responsive" src="img/studentlogo.svg"width="80px"height="50px"/>Welcome Student<?php echo $_SESSION['username']; ?></p>
         </div>
         <div class="col-md-2">
             <a href="http://localhost/Demo/StudentHomePage.php" class="btn btn-lg">
          <span class="glyphicon glyphicon-home"></span> Home
        </a></div>
         <div class="col-md-2">
             <a href="http://localhost/Demo/logout.php" class="btn btn-lg">
          <span class="glyphicon glyphicon-off"></span> Log Out
        </a></div>
     </div>
         <div class="row">
             <div class="col-md-12">
                 <h3>Student Response</h3>
         <div class="table-responsive">
             <br>
             <br>
    <?php if (!empty($MessageResponse)){
        echo $MessageResponse;
    }else{
        
            foreach ($SceneInfo as $SceneInfoValue){
                echo "<h4>"."Scene: ".$SceneInfoValue['SceneInformation']."</h4>";
                echo '<br>';
                    $result = '<table class="table" align="center">';
                    $result .= '<thead><th>Chosen Option</th><th style="text-align:right;">Student Comment</th></thead>';
                    foreach ($StudentAnswer as $StudentAnswerValue){
                        if($SceneInfoValue['SceneID'] == $StudentAnswerValue['SceneID']){     
                            $result .= '<tr><tbody>';
                            $result .= '<td>'.$StudentAnswerValue['ChosenOption'].'</td>';
                            $result .= '<td style="text-align:right;">'.$StudentAnswerValue['TextResponse'].'</td>';
                            $result .= '</tr></tbody>';                            
                            //echo $StudentAnswerValue['ChosenOption'];
                            //echo $StudentAnswerValue['TextResponse']."<br>";
                            
                        }
                    }
                        $result .= '</table>';
                        echo $result;
                        echo "<br>";
            }
        
    }?>
         </div></div></div>
         <div class="row">
             <div class="col-md-3"></div>
<div class="col-md-6">
<!--    Display instructor's feedback-->
<?php if(empty($CheckFeedback[0]['Feedback'])){ ?>
<p align="center"><textarea class="form-control"align="middle" rows="10" cols="90" disabled>The Nursing Instructor does not provide a feedback yet.</textarea></p>
<?php }else { ?>

<p align="center"><textarea class="form-control" align="middle" rows="10" cols="90" disabled><?php echo $CheckFeedback[0]['Feedback']; ?></textarea></p>
<?php }?>
<input class="btn btn-primary" action="action" type="button" value="Back" onclick="history.go(-1);" />
</div>
<div class="col-md-3">
    </div>    
 
   <footer class="footer">
    <img src="img/Logo SHP.svg" height="40px"/>
</footer>   
</div>
     </div>
</body>

</html>