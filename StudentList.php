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
<title>Simulation Question</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/studenthome.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
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
<h1>Students Results</h1>
<h3 align="center">Students List</h3>
         <?php if (!empty($Message)) { ?>
        <div class="alert alert-warning" align="center"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;<strong><?php echo htmlspecialchars($Message);} ?><br></strong></div>
         <?php if (!empty($FeedbackMessage)) { ?>
        <div class="alert alert-warning" align="center"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;<strong><?php echo htmlspecialchars($FeedbackMessage);} ?></strong>
        &nbsp;&nbsp;<input class="btn btn-primary" action="action" type="button" value="Back" onclick="history.go(-1);" /><br><br></div>    
    <div class="table-responsive">
    <?php StudentInformationDisplay($StudentInformation); ?><br><br>
</div>
</div>
</div>
 <footer class="footer">
    <img src="img/Logo SHP.svg" height="40px"/>
</footer>
</body>


</html>