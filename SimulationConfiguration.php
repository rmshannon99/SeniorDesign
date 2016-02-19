<?php
// Check to see if session already exists or not
if(!isset($_SESSION)){session_start();}
require_once 'database.php';
require_once 'TableDisplay.php';


// If button is clicked to save the configuration
if (isset($_POST['ConfigSubmit'])){
    
    //Get values from html
    $BloodPressure = $_POST['BloodPressure'];
    $HeartRate = $_POST['HeartRate'];
    $Airway = $_POST['AirwayRespiratory'];
    $ParentState = $_POST['ParentState'];
    
    //If the instructor wants to update new config
    // Delete current config
    $query1 = "DELETE FROM simulation_configuration";
    $statement = $db->prepare($query1);
    $statement->execute();
    $statement->closeCursor();
    
    //Reset the ID to 1    
    $query2 = "ALTER TABLE simulation_configuration AUTO_INCREMENT = 1";
    $statement = $db->prepare($query2);
    $statement->execute();
    $statement->closeCursor();
    
    //ALTER TABLE tablename AUTO_INCREMENT = 1
    
    //Query to insert data to database
    $query = "INSERT INTO simulation_configuration (ConfigurationID, BloodPressure, HeartRate, AirwayRespiratory, ParentState) VALUES (NULL, '$BloodPressure', '$HeartRate', '$Airway', '$ParentState')";
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();
    header("Location: AdminPage.php");
      
}

// Display current configuration
    $CurrentConfigQuey = "SELECT * FROM simulation_configuration";
    $statement = $db->prepare($CurrentConfigQuey);
    $statement->execute();
    $ConfigDisplay = $statement->fetchall();
    $statement->closeCursor();
    // print_r($ConfigDisplay);


?>

<!DOCTYPE html>
<html>
    
<head>
<meta charset="UTF-8">
<title>Simulation Configuration</title>

</head>
<body>
    
<!--    Display current configuration-->
    
    <h2 align="center"> Current infant and parent configuration: </h2>
    <?php CurrentConfigDisplay($ConfigDisplay); ?><br><br>
    <h3 align="center"> Or you wish to update: </h3>
    
    
    <!--    This is simulation configuration section-->

    <form action="SimulationConfiguration.php" method="POST" align="center">      
        
<!--        The range need to be updated since get the information from Aleah-->

        Please set infant's blood pressure: <input type="range" name="BloodPressure" min="0" max="100" value="50" onchange="showValue(this.value)">
        <span id="BloodPressure"></span><br><br>
        Please set infant's heart rate:     <input type="range" name="HeartRate" min="0" max="100" value="50" onchange="showValue1(this.value)">
        <span id="HeartRate"></span><br><br>
        Please set infant's airway respiratory:     <input type="range" name="AirwayRespiratory" min="0" max="100" value="50" onchange="showValue2(this.value)">
        <span id="Airway"></span><br><br>
        Please set parent state: 
        <input type="radio" name="ParentState" value="Angry"> Angry
        <input type="radio" name="ParentState" value="Normal"> Normal 
        <input type="radio" name="ParentState" value="Happy"> Happy <br><br>
<!--        Please set parent state:     <input type="range" name="ParentState" min="1" max="3" value="2" onchange="showValue3(this.value)">
        <span id="ParentState"></span><br><br>-->
        
        <input name = 'ConfigSubmit' type="submit" value="Save">
        
    </form>
                <!--    Javascript to get value of the slide bar's-->
    
        <script type="text/javascript">
            function showValue(newValue)
        {
            document.getElementById("BloodPressure").innerHTML=newValue;            
        }
            function showValue1(newValue)
        {
            document.getElementById("HeartRate").innerHTML=newValue;            
        }
            function showValue2(newValue)
        {
            document.getElementById("Airway").innerHTML=newValue;            
        }
//            function showValue3(newValue)
//        {
//            document.getElementById("ParentState").innerHTML=newValue;            
//        }
        
        </script>

    
    
 

</body>


</html>