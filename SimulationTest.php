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

                                
                $StudentComment = trim($_POST['comment']); //trim is used to remove white spaces at the beginning and end
                $StudentComment = str_replace("'", "''", $StudentComment);//Replace an apostrophe with double single quote in order for SQL syntax to work.
                $_SESSION['SceneOption'] = trim($_SESSION['SceneOption']); //remove spaces at the beginning and end
                $_SESSION['SceneOption'] = str_replace("'", "''", $_SESSION['SceneOption']); //Replace an apostrophe with double single quote in order for SQL syntax to work.
                

                    //Check to see if user has alreadys input something into a same sub_information
                    $CommentCheckQuery = "SELECT * FROM student_response_new WHERE SceneID= '$SceneID' AND ChosenOption= '".$_SESSION['SceneOption']."'";
                    $statement = $db->prepare($CommentCheckQuery);
                    $statement->execute();
                    $CommentCheck = $statement->fetchall();
                    $statement->closeCursor();
                    if (!empty($CommentCheck) && $StudentComment!=''){

                    $InsertStudentCommentQuery = "UPDATE student_response_new SET TextResponse = '$StudentComment' WHERE SceneID = $SceneID AND ChosenOption = '".$_SESSION['SceneOption']."'";
                    $statement = $db->prepare($InsertStudentCommentQuery);
                    $statement->execute();
                    $statement->closeCursor();
                    }
                    elseif (!empty($CommentCheck) && $StudentComment==''){
                        //Do nothing
                    }
                    else { //If the sql is empty then insert new row

                    //Record student choice if the scene has sub-information in baby_information               

                    $StudentChoiceQuery = "INSERT INTO student_response_new (ID, SceneID, userID, ChosenOption, TextResponse) VALUES (NULL, $SceneID, '".$_SESSION['userID']."', '".$_SESSION['SceneOption']."', '$StudentComment')";
                    $statement = $db->prepare($StudentChoiceQuery);
                    $statement->execute();
                    $statement->closeCursor();  
                    }
              
                
                
        }
        
        //If the user clicks MoveOn, it will go to the next scene
        elseif (isset($_POST['AskMore']) && $_POST['AskMore'] == "MoveOn"){
                //This is a same thing like the if statement above
                $SceneID = $_SESSION['Counter']+1;
                $StudentComment = trim($_POST['comment']); //trim is used to remove white spaces at the beginning and end
                $StudentComment = str_replace("'", "''", $StudentComment);//Replace an apostrophe with double single quote in order for SQL syntax to work.
                $_SESSION['SceneOption'] = trim($_SESSION['SceneOption']); //remove spaces at the beginning and end
                $_SESSION['SceneOption'] = str_replace("'", "''", $_SESSION['SceneOption']); //Replace an apostrophe with double single quote in order for SQL syntax to work.

                //Check to see if user has alreadys input something into a same sub_information
                $CommentCheckQuery = "SELECT * FROM student_response_new WHERE SceneID= '$SceneID' AND ChosenOption= '".$_SESSION['SceneOption']."'";
                $statement = $db->prepare($CommentCheckQuery);
                $statement->execute();
                $CommentCheck = $statement->fetchall();
                $statement->closeCursor();
                if (!empty($CommentCheck) && $StudentComment!=''){
                $InsertStudentCommentQuery = "UPDATE student_response_new SET TextResponse = '$StudentComment' WHERE SceneID = $SceneID AND ChosenOption = '".$_SESSION['SceneOption']."'";
                $statement = $db->prepare($InsertStudentCommentQuery);
                $statement->execute();
                $statement->closeCursor();
                }
                elseif (!empty($CommentCheck) && $StudentComment==''){
                        //Do nothing
                }
                else { //If the sql is empty then insert new row
                
                //Record student choice if the scene has sub-information in baby_information               

                $StudentChoiceQuery = "INSERT INTO student_response_new (ID, SceneID, userID, ChosenOption, TextResponse) VALUES (NULL, $SceneID, '".$_SESSION['userID']."', '".$_SESSION['SceneOption']."', '$StudentComment')";
                $statement = $db->prepare($StudentChoiceQuery);
                $statement->execute();
                $statement->closeCursor();  
                }                

            
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

                
                
            }
            else {
                //Record student choice if the scene has no sub-information from baby_information table
                $ChosenOption = $_POST['option'];
                $ChosenOption = trim($_POST['option']); //trim is used to remove white spaces at the beginning and end                
                $ChosenOption = str_replace("'", "''", $ChosenOption);//Replace an apostrophe with double single quote in order for SQL syntax to work.              
                $StudentComment = trim($_POST['comment']); //trim is used to remove white spaces at the beginning and end
                $StudentComment = str_replace("'", "''", $StudentComment);//Replace an apostrophe with double single quote in order for SQL syntax to work.
                $StudentChoiceQuery = "INSERT INTO student_response_new (ID, SceneID, userID, ChosenOption, TextResponse) VALUES (NULL, $SceneID, '".$_SESSION['userID']."', '$ChosenOption', '$StudentComment')";
                $statement = $db->prepare($StudentChoiceQuery);
                $statement->execute();
                $statement->closeCursor();
                
                
                
            }
          
            
            
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
    if($_SESSION['Counter'] <= $_SESSION['SceneNumber'] -1){ //because counter starts at 0, that's why number is subtracted 1
    $SceneDisplay = $_SESSION['Scenes'][$_SESSION['Counter']];   
    
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
    <?php if($SceneDisplay["B"]=='') {
        $SceneRange = range('A','A'); //Range for SceneID = 1 and 4
            foreach ($SceneRange as $letter){ ?>
    <input type="radio" name="option" value="<?php echo htmlspecialchars($SceneDisplay["$letter"]);?>" required><?php echo $SceneDisplay["$letter"]; ?><br>
            
    <?php             
            
        }
    }   elseif ($SceneDisplay['C']==''){
        $SceneRange = range('A','B');
        foreach ($SceneRange as $letter){ ?>
    <input type="radio" name="option" value="<?php echo htmlspecialchars($SceneDisplay["$letter"]);?>" required><?php echo $SceneDisplay["$letter"]; ?><br>
    <?php }
    }
        elseif ($SceneDisplay['D']==''){ //Range for SceneID = 2
            $SceneRange = range('A','C');
            foreach ($SceneRange as $letter){ ?>
                <input type="radio" name="option" value="<?php echo htmlspecialchars($SceneDisplay["$letter"]);?>" required><?php echo $SceneDisplay["$letter"]; ?><br>
    <?php
            }
        }elseif ($SceneDisplay['E']==''){
            $SceneRange = range('A','D');
            foreach ($SceneRange as $letter){ ?>
                <input type="radio" name="option" value="<?php echo htmlspecialchars($SceneDisplay["$letter"]);?>" required><?php echo $SceneDisplay["$letter"]; ?><br>
    <?php    }
        }
        elseif ($SceneDisplay['F']==''){
            $SceneRange = range('A','E');
            foreach ($SceneRange as $letter){ ?>
                <input type="radio" name="option" value="<?php echo htmlspecialchars($SceneDisplay["$letter"]);?>" required><?php echo $SceneDisplay["$letter"]; ?><br>
    <?php    }
        }
        elseif ($SceneDisplay['G']==''){
            $SceneRange = range('A','F');
            foreach ($SceneRange as $letter){ ?>
                <input type="radio" name="option" value="<?php echo htmlspecialchars($SceneDisplay["$letter"]);?>" required><?php echo $SceneDisplay["$letter"]; ?><br>
    <?php    }
        }
        elseif ($SceneDisplay['H']==''){
            $SceneRange = range('A','G');
            foreach ($SceneRange as $letter){ ?>
                <input type="radio" name="option" value="<?php echo htmlspecialchars($SceneDisplay["$letter"]);?>" required><?php echo $SceneDisplay["$letter"]; ?><br>
    <?php    }
        }
        elseif ($SceneDisplay['I']==''){
            $SceneRange = range('A','H');
            foreach ($SceneRange as $letter){ ?>
                <input type="radio" name="option" value="<?php echo htmlspecialchars($SceneDisplay["$letter"]);?>" required><?php echo $SceneDisplay["$letter"]; ?><br>
    <?php    }
        }
        elseif ($SceneDisplay['J']==''){
            $SceneRange = range('A','I');
            foreach ($SceneRange as $letter){ ?>
                <input type="radio" name="option" value="<?php echo htmlspecialchars($SceneDisplay["$letter"]);?>" required><?php echo $SceneDisplay["$letter"]; ?><br>
    <?php    }
        }
        elseif ($SceneDisplay['K']==''){
            $SceneRange = range('A','J');
            foreach ($SceneRange as $letter){ ?>
                <input type="radio" name="option" value="<?php echo htmlspecialchars($SceneDisplay["$letter"]);?>" required><?php echo $SceneDisplay["$letter"]; ?><br>
    <?php    }
        }
        elseif ($SceneDisplay['L']==''){
            $SceneRange = range('A','K');
            foreach ($SceneRange as $letter){ ?>
                <input type="radio" name="option" value="<?php echo htmlspecialchars($SceneDisplay["$letter"]);?>" required><?php echo $SceneDisplay["$letter"]; ?><br>
    <?php    }
        }
        elseif ($SceneDisplay['M']==''){
            $SceneRange = range('A','L');
            foreach ($SceneRange as $letter){ ?>
                <input type="radio" name="option" value="<?php echo htmlspecialchars($SceneDisplay["$letter"]);?>" required><?php echo $SceneDisplay["$letter"]; ?><br>
    <?php    }
        }
        elseif ($SceneDisplay['N']==''){
            $SceneRange = range('A','M');
            foreach ($SceneRange as $letter){ ?>
                <input type="radio" name="option" value="<?php echo htmlspecialchars($SceneDisplay["$letter"]);?>" required><?php echo $SceneDisplay["$letter"]; ?><br>
    <?php    }
        }
        elseif ($SceneDisplay['O']==''){
            $SceneRange = range('A','N');
            foreach ($SceneRange as $letter){ ?>
                <input type="radio" name="option" value="<?php echo htmlspecialchars($SceneDisplay["$letter"]);?>" required><?php echo $SceneDisplay["$letter"]; ?><br>
    <?php    }
        }
        elseif ($SceneDisplay['P']==''){
            $SceneRange = range('A','O');
            foreach ($SceneRange as $letter){ ?>
                <input type="radio" name="option" value="<?php echo htmlspecialchars($SceneDisplay["$letter"]);?>" required><?php echo $SceneDisplay["$letter"]; ?><br>
    <?php    }
        }
        elseif ($SceneDisplay['Q']==''){
            $SceneRange = range('A','P');
            foreach ($SceneRange as $letter){ ?>
                <input type="radio" name="option" value="<?php echo htmlspecialchars($SceneDisplay["$letter"]);?>" required><?php echo $SceneDisplay["$letter"]; ?><br>
    <?php    }
        }
        else  { //Range for SceneID = 3
        $SceneRange = range('A','Q');
            foreach ($SceneRange as $letter){ ?>
                <input type="radio" name="option" value="<?php echo htmlspecialchars($SceneDisplay["$letter"]);?>" required><?php echo $SceneDisplay["$letter"]; ?><br>
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
<?php
    }
    else {
      
        header("Location: StudentResponse.php");
        
    }
?>

<!--    Play infant sound-->
<!--<audio controls loop hidden="true" autoplay="true">
    <source src="./audio/crying.mp3" type="audio/mpeg">
</audio>-->

</body>


</html>