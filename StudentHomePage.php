<?php
require_once 'database.php';
if(!isset($_SESSION)){session_start();}

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
<title>Student Home</title>
</head>
<body> 
    <!-- this is body-->
 <div class="container-fluid"> 
          <div class="row">
            <img class="responsive" src="img/background UI.svg"/>
        </div>
     <div class="row title">
         <div class="col-md-10"><p class="ptitle"><img class="responsive" src="img/studentlogo.svg"width="80px"height="50px"/>Welcome Student<?php echo $_SESSION['username']; ?></p>
         <?php if (!empty($ErrorMessageCheckStudentSimulation)) { ?>
       <div class="alert alert-warning"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;<strong><?php echo htmlspecialchars($ErrorMessageCheckStudentSimulation); ?>
   <br><br></strong></div> <?php } ?>
         </div>
         <div class="col-md-2">
             <a href="http://localhost/Demo/logout.php" class="btn btn-lg">
          <span class="glyphicon glyphicon-off"></span> Log Out
        </a></div>
     </div>
     <div class="row">     
<!--Simulation-->  
<div id="startsimulation" class="col-md-4">
    <img class="responsive" id="icon" src="img/icons1.svg"/>
    <div class="paragraph"><p>
        You have 20min to finish<br>
        There will be sound during the simulation.<br>
        Be Prepared！
         </p></div>
    <input name = 'Start Simulation' class="btn-block" type="submit" value="Start Simulation" onclick="location.href='http://localhost/Demo/CheckStudentSimulation.php';"></input>
</div>
<!--Feedback-->  
  <div id="viewfeedback" class='col-md-4'><img class="responsive" id="icon" src="img/icons2.svg"/>
      <div class="paragraph">
        <p>
        View your feedback here<br>
        Teacher feedback is available<br>
        <br>
    </p></div>
      <input name = 'Feedback' class="btn-block" type="submit" value="View Feedback" onclick="location.href='http://localhost/Demo/StudentResponse.php';"></div>
<!--Account Management-->  
 <div id="account" class="col-md-4">
  <img class="responsive" id="icon" src="img/icons4.svg"/>
  <div class="paragraph">
    <p>
        You can reset password <br>
        <br>
        <br>
    </p></div>
  <input name = 'Account' class="btn-block" type="submit" value="Manage Account" onclick="location.href='http://localhost/Demo/StudentUpdatePassword.php';"></input></div>
  </div>
</div>
<footer class="footer">
    <img src="img/Logo SHP.svg" height="40px"/>
</footer>   
</body>


</html>