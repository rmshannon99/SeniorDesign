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
<title>Simulation Question</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/studenthome.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<meta charset="UTF-8">
</head>
<body>
<body>
     <div class="container-fluid"> 
          <div class="row">
              <img src="img/banner.svg" />
</div>
     <div class="row title">
         <div class="col-md-8"><p class="ptitle"><img class="responsive" src="img/studentlogo.svg"width="80px"height="50px"/>Welcome Instructor<?php echo $_SESSION['username']; ?></p>
         </div>
         <div class="col-md-2">
             <a href="http://localhost/Demo/AdminPage.php" class="btn btn-lg">
          <span class="glyphicon glyphicon-home"></span> Home
        </a></div>
         <div class="col-md-2">
             <a href="http://localhost/Demo/logout.php" class="btn btn-lg">
          <span class="glyphicon glyphicon-off"></span> Log Out
        </a></div>
     </div>
         <div class="row">
             <div class="col-md-12">
                 <div class="table-responsive">
<h1>Students Results</h1>
<?php
        foreach ($SceneInfo as $SceneInfoValue){
        echo "<h3>"."Scene: ".$SceneInfoValue['SceneInformation']."</h3>";
            $result = '<table class="table" align="center">';
            $result .= '<th>Chosen Option</th><th style="text-align:right;">Student Comment</th>';
            foreach ($StudentAnswer as $StudentAnswerValue){

                if($SceneInfoValue['SceneID'] == $StudentAnswerValue['SceneID']){     
                    $result .= '<tr>';
                    $result .= '<td>'.$StudentAnswerValue['ChosenOption'].'</td>';
                    $result .= '<td  style="text-align:right;">'.$StudentAnswerValue['TextResponse'].'</td>';
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
        <p align="center"><textarea class="form-control" name="Feedback" rows="10" cols="90" placeholder="Please enter your feedback" ></textarea><br>     
       <input type="hidden" name="StudentID" value="<?php echo $StudentID;?>"> 
        <button class="btn btn-primary" name="submit" type="submit">Submit</button></p>
    <?php }else{ ?> 
        <p align="center"><textarea class="form-control" name="Feedback" rows="10" cols="90" placeholder="<?php echo $CheckFeedback[0]['Feedback']; ?>" ></textarea><br>     
       <input type="hidden" name="StudentID" value="<?php echo $StudentID;?>">
       <input class="btn btn-primary" action="action" type="button" value="Back" onclick="history.go(-1);" />
       <button class="btn btn-primary" name="submit" type="submit">Submit</button></p>
    <?php } ?>
                 </div>
             </div>
         </div>
        
</form>
<footer class="footer">
    <img src="img/Logo SHP.svg" height="40px"/>
</footer> 
</body>


</html>