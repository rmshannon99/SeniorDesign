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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/studenthome.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<meta charset="UTF-8">
</head>
<body>
    
<!--    Display current configuration-->
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
            <div class="col-md-3"></div>
            <div class="col-md-6">
    <h2 align="center"> Current infant and parent configuration: </h2>
     <div class="table-responsive">
    <?php CurrentConfigDisplay($ConfigDisplay); ?><br></div>

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
        
        <input class="btn btn-lg btn-success" name = 'ConfigSubmit' type="submit" value="Save">
        <input class="btn btn-lg btn-primary" action="action" type="button" value="Back" onclick="history.go(-1);" />
        
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
</div>
  </div>
     </div>
    
 

</body>


</html>