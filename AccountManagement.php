<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'database.php';
require_once 'TableDisplay.php';

/*show all users in the system and sort by last name */
$query = "SELECT Username, Password, FirstName, LastName, Email FROM user_information WHERE userID > 1";
$statement = $db->prepare($query);
    $statement->execute();
    $accounts = $statement->fetchall();
    $statement->closeCursor();
//print_r($question);  This line is for testing/debug to make sure query is working.
?>

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
              <img src="img/banner.svg" />
</div>
     <div class="row title">
         <div class="col-md-8"><p class="ptitle"><img class="responsive" src="img/studentlogo.svg"width="80px"height="50px"/>Welcome Instructor</p>
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
            <div class="table-responsive">
    <!--Javascript to confirm before account deletion    -->
    <script type="text/javascript">

    function confirmDelete() {
        
      var x = confirm("Are you sure you want to delete?");
      if (x)
          return true;
      else
        return false;
    
        
    } 
                

    </script>

 <?php
 studentAccounts($accounts);
 ?>
 &nbsp;&nbsp;<input class="btn btn-primary" action="action" type="button" value="Back" onclick="history.go(-1);" />
 </div>
 </div>
 </div>
    <footer class="footer">
    <img src="img/Logo SHP.svg" height="40px"/>
</footer>
</body>    
</html>

