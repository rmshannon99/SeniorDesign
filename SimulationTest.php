<pre>
<?php
// This file is used to start the simulation test
require_once 'database.php';
if(!isset($_SESSION)){session_start();} // Check to see if session exists or not


if(!isset($_SESSION['Scenes'])) { //Check to see if the data from the scene_table is already pulled out or not
//Get all the information fro scene_table
    
    $SceneQuery = "SELECT * FROM scene_table";
    $statement = $db->prepare($SceneQuery);
    $statement->execute();
    $Scene = $statement->fetchall();
    $statement->closeCursor();
    
    
    $_SESSION['Scenes'] = $Scene; // this array contains the scene information from scene_table
    $_SESSION['Counter'] = 0; //Index in the array of $Scene
    
    //Get the number of scenes in scene_table
    $SceneNumberQuery = "SELECT COUNT(*) FROM scene_table";
    $statement = $db->prepare($SceneNumberQuery);
    $statement->execute();
    $SceneNumber = $statement->fetch();
    $statement->closeCursor();
    $_SESSION['SceneNumber'] = $SceneNumber[0];
    
    
}
    // If the button is clicked
    if (isset($_POST['submit'])){
        
        //unset($BabyInformation); //Empty this array
        
        if(isset($_POST['AskMore']) && $_POST['AskMore'] == "AskMore"){
                //Check if counter+1 == SceneID in baby_information because SceneID starts at 1 while counter starts at 0. If when $Check contains some data, must pull data from baby_information table
                $SceneID = $_SESSION['Counter']+1;
                
                // Record student choice after get baby_information from baby_information table
                $StudentComment = trim($_POST['comment']); //trim is used to remove white spaces at the beginning and end
                $StudentComment = str_replace("'", "''", $StudentComment);//Replace an apostrophe with double single quote in order for SQL syntax to work.
                $_SESSION['SceneOption'] = trim($_SESSION['SceneOption']); //remove spaces at the beginning and end
                $_SESSION['SceneOption'] = str_replace("'", "''", $_SESSION['SceneOption']); //Replace an apostrophe with double single quote in order for SQL syntax to work.
                $InsertStudentCommentQuery = "UPDATE student_response_new SET TextResponse = '$StudentComment', ChosenOption = '".$_SESSION['SceneOption']."' WHERE SceneID = $SceneID AND ChosenOption = '".$_SESSION['SceneOption']."'";
                $statement = $db->prepare($InsertStudentCommentQuery);
                $statement->execute();
                $statement->closeCursor();              
                
                
                
        }
        
        //If the user clicks MoveOn, it will go to the next scene
        elseif (isset($_POST['AskMore']) && $_POST['AskMore'] == "MoveOn"){
                //This is a same thing like the if statement above
                //Check if counter+1 == SceneID in baby_information because SceneID starts at 1 while counter starts at 0. If when $Check contains some data, must pull data from baby_information table
                                
                // Record student choice after get baby_information from baby_information table
                $StudentComment = trim($_POST['comment']); //trim is used to remove white spaces at the beginning and end
                $StudentComment = str_replace("'", "''", $StudentComment);//Replace an apostrophe with double single quote in order for SQL syntax to work.
                $_SESSION['SceneOption'] = trim($_SESSION['SceneOption']); //remove spaces at the beginning and end
                $_SESSION['SceneOption'] = str_replace("'", "''", $_SESSION['SceneOption']); //Replace an apostrophe with double single quote in order for SQL syntax to work.
                $InsertStudentCommentQuery = "UPDATE student_response_new SET TextResponse = '$StudentComment' WHERE userID = '".$_SESSION['userID']."' AND ChosenOption = '".$_SESSION['SceneOption']."'";
                $statement = $db->prepare($InsertStudentCommentQuery);
                $statement->execute();
                $statement->closeCursor(); 
                $_SESSION['Counter']++;  
        }
        
        // This is used to check to see if the scene has any sub-information from baby_information table. Or no MoveOn nor AskMore available
        else{
            
            //Check if counter+1 == SceneID in baby_information because SceneID starts at 1 while counter starts at 0. If when $Check contains some data, must pull data from baby_information table
            $SceneID = $_SESSION['Counter']+1;
            $CheckQuery = "SELECT * FROM baby_information WHERE SceneID = $SceneID ";
            $statement = $db->prepare($CheckQuery);
            $statement->execute();
            $Check = $statement->fetchall();
            $statement->closeCursor();
            if (!empty($Check)){              
                
                $ChosenOption = trim($_POST['option']); //trim is used to remove white spaces at the beginning and end
                $ChosenOption = str_replace("'", "''", $ChosenOption);//Replace an apostrophe with double single quote in order for SQL syntax to work.
                $BabyInformationQuery = "SELECT * FROM baby_information WHERE SceneOption = '$ChosenOption'";
                $statement = $db->prepare($BabyInformationQuery);
                $statement->execute();
                $BabyInformation = $statement->fetch();
                $statement->closeCursor();
                
                //Need to store $BabyInformation['SceneOption'] to session so can be used in Update query of Askmore
                $_SESSION['SceneOption'] = $BabyInformation['SceneOption'];
                
                $_SESSION['Counter']--;   
                
                //Record student choice if the scene has sub-information in baby_information
                $StudentComment = trim($_POST['comment']); //trim is used to remove white spaces at the beginning and end
                $StudentComment = str_replace("'", "''", $StudentComment);//Replace an apostrophe with double single quote in order for SQL syntax to work.
                $StudentChoiceQuery = "INSERT INTO student_response_new (ID, SceneID, userID, ChosenOption, TextResponse) VALUES (NULL, $SceneID, '".$_SESSION['userID']."', '$ChosenOption', '$StudentComment')";
                $statement = $db->prepare($StudentChoiceQuery);
                $statement->execute();
                $statement->closeCursor();  
                
                
            }
            else {
                //Record student choice if the scene has no sub-information from baby_information table
                $ChosenOption = trim($_POST['option']); //trim is used to remove white spaces at the beginning and end
                $ChosenOption = str_replace("'", "''", $ChosenOption);//Replace an apostrophe with double single quote in order for SQL syntax to work.
                $StudentComment = trim($_POST['comment']); //trim is used to remove white spaces at the beginning and end
                $StudentComment = str_replace("'", "''", $StudentComment);//Replace an apostrophe with double single quote in order for SQL syntax to work.
                $StudentChoiceQuery = "INSERT INTO student_response_new (ID, SceneID, userID, ChosenOption, TextResponse) VALUES (NULL, $SceneID, '".$_SESSION['userID']."', '$ChosenOption', '$StudentComment')";
                $statement = $db->prepare($StudentChoiceQuery);
                $statement->execute();
                $statement->closeCursor();  
            }
        //    $query = "INSERT INTO student_response (ID, userID, QuestionID, ChosenOption, TextResponse) VALUES (Null, '".$_SESSION['userID']."', '".$_SESSION['questions'][$index][0]."', '".$_POST['option']."', '".$_POST['comment']."')";

            
            
            
            $_SESSION['Counter']++;      
            
        }
        

    }
    
    
?>
</pre>

<!DOCTYPE html>
<html>
    
<head>
<meta charset="UTF-8">
<title>SimulationQuestion</title>

</head>
<body>

    <?php
    
    //If the counter is less than or equal to the number of questions, it will display the question and options
    //if($_SESSION['Counter'] <= $_SESSION['SceneNumber'] -1){ //because counter starts at 0, that's why number is subtracted 1
    $SceneDisplay = $_SESSION['Scenes'][$_SESSION['Counter']];   
    //}
    ?>

    <form action="SimulationTest.php" method="POST">
    <?php if (!empty($BabyInformation)){
            echo $BabyInformation['BabyInformation'];?>
        <br><br>
        <input type="radio" name="AskMore" value="AskMore" checked>Ask more question?<br>
        <input type="radio" name="AskMore" value="MoveOn">Move on<br>
        <textarea name="comment" rows="10" cols="90" placeholder="Please enter your comment" ></textarea>
        <button name="submit" type="submit">Next</button>

    <?php    } 
        
        else{ ?>
    <?php echo $SceneDisplay["SceneInformation"]; ?><br>    
    <?php if($SceneDisplay["C"]=='') {
        $SceneRange = range('A','B'); //Range for SceneID = 1 and 4
            foreach ($SceneRange as $letter){ ?>
    <input type="radio" name="option" value="<?php echo $SceneDisplay["$letter"];?>" required><?php echo $SceneDisplay["$letter"]; ?><br>
            
    <?php             
            
        }
    }
        elseif ($SceneDisplay['D']==''){ //Range for SceneID = 2
        $SceneRange = range('A','C');
            foreach ($SceneRange as $letter){ ?>
                <input type="radio" name="option" value="<?php echo $SceneDisplay["$letter"];?>" required><?php echo $SceneDisplay["$letter"]; ?><br>
    <?php
            }
        }
        else  { //Range for SceneID = 3
        $SceneRange = range('A','Q');
            foreach ($SceneRange as $letter){ ?>
                <input type="radio" name="option" value="<?php echo $SceneDisplay["$letter"];?>" required><?php echo $SceneDisplay["$letter"]; ?><br>
    <?php 
            }
        } ?>
        <br><br>
        <textarea name="comment" rows="10" cols="90" placeholder="Please enter your comment" ></textarea>
        <button name="submit" type="submit">Next</button>
    <?php 
    }
            
    ?>   
    
    
    </form>

<!--    Play infant sound-->
<audio controls loop hidden="true" autoplay="true">
    <source src="./audio/crying.mp3" type="audio/mpeg">
</audio>

</body>


</html>