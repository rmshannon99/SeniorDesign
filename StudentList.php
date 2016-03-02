<?php

//This file is used to display to provide feedback to students

require_once 'database.php';
require_once 'TableDisplay.php';
// Start the session
if(!isset($_SESSION)){session_start();}

// Query to get student information
$StudentInformationQuery = "SELECT * FROM user_information WHERE userID > 1";
$statement = $db->prepare($StudentInformationQuery);
$statement->execute();
$StudentInformation = $statement->fetchall();
$statement->closeCursor(); 


?>
<!DOCTYPE html>
<html>
    
<head>
<title>SimulationQuestion</title>
</head>
<body>

<h1>Students Results</h1>

<h3 align="center">Students List:</h3>
<h4 align="center">    <?php if (!empty($Message)) { ?>
    <?php echo htmlspecialchars($Message);} ?></h4>
<h4 align="center">    <?php if (!empty($FeedbackMessage)) { ?>
    <?php echo htmlspecialchars($FeedbackMessage);} ?></h4>
    <?php StudentInformationDisplay($StudentInformation); ?><br><br>



</body>


</html>