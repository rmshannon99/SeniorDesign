<!DOCTYPE html>
<html>
    
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/studenthome.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<meta charset="UTF-8">
<title>Administration</title>

</head>
<body>
     <div class="container-fluid"> 
          <div class="row">
      <img class="responsive" src="img/background UI.svg"/>
            </div>
     <div class="row title">
         <div class="col-md-10"><p class="ptitle"><img class="responsive" src="img/studentlogo.svg"width="80px"height="50px"/>Welcome Instructor</p>
         </div>
         <div class="col-md-2">
             <a href="http://localhost/Demo/logout.php" class="btn btn-lg">
          <span class="glyphicon glyphicon-off"></span> Log Out
        </a></div>
     </div>
     <div class="row">     
<!--Simulation-->  
<div class="col-md-4">
    <img class="responsive" id="icon" src="img/icons1.svg"/>
    <div class="paragraph"><p>
        View Student Response here<br>
        Insert Instructor feedback<br>
         </p></div>
    <input name = 'Feedback' class="btn-block" type="submit" value="Insert Feedback" onclick="location.href='http://localhost/Demo/StudentList.php';"></input>
</div>
<!--Feedback-->  
  <div class='col-md-4'><img class="responsive" id="icon" src="img/icons4.svg"/>
      <div class="paragraph">
        <p>
        Manage Student Accounts<br>
        Add Delete Modify<br>
        <br>
    </p></div>
      <input name = 'Feedback' class="btn-block" type="submit" value="Manage Student Account" onclick="location.href='http://localhost/Demo/AccountManagement.php';"></div>
<!--Account Management-->  
 <div class="col-md-4">
  <img class="responsive" id="icon" src="img/icons2.svg"/>
  <div class="paragraph">
    <p>
        Configure Infant's Health Parameter  <br>
        Avatar Emotions <br>
        <br>
    </p></div>
  <input name = 'Account' class="btn-block" type="submit" value="Configure Simulation" onclick="location.href='http://localhost/Demo/SimulationConfiguration.php';"></input></div>
  </div>
</div>
<footer class="footer">
    <img src="img/Logo SHP.svg" height="40px"/>
</footer>   
</body>


</html>
