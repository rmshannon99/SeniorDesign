<?php
if(!isset($_SESSION)){session_start();}
require_once 'database.php';

if(isset($_POST['submit'])){
    $Username = $_POST['Username'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    
    //Extract data from user_information table where $Username = username in the table
    $CheckUsernameQuery = "SELECT * FROM user_information WHERE Username = '$Username'";
    $statement = $db->prepare($CheckUsernameQuery);
    $statement->execute();
    $CheckUsername = $statement->fetch();
    $statement->closeCursor();
    
    //Display message if nothing matches the username in the user_information table
    if(empty($CheckUsername)){
        $ForgetPasswordMessage = "No search results. Please try again with other information or contact your instructor";
        
    }else{
        if(strcasecmp($FirstName, $CheckUsername['FirstName'])== 0 && strcasecmp($LastName, $CheckUsername['LastName']) == 0 && strcasecmp($Email, $CheckUsername['Email']) == 0){
            $_SESSION['username'] = $Username; // store username to global session
            $_SESSION['userID'] = $CheckUsername['userID'];
            header("Location: StudentUpdatePassword.php");
        }else{
            $ForgetPasswordMessage = "No search results. Please try again with other information or contact your instructor";
        }
        
        
    }
}



?>


<!DOCTYPE html>
<html>
    
<head>
<meta charset="UTF-8">
<title>ForgetPassword</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/studenthome.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
    
    <div class="container-fluid"> 
     <div class="row">
  <img src='img/bg2.svg'/>
  </div>
     <div class="row">
 <div class="space col-md-3"></div>
    <!--Sign In-->  
 <div class="col-md-6"><h2>Retrieve Your Password</h2>
    <?php if (!empty($ForgetPasswordMessage)) { ?>
     <div class="alert alert-warning"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;<strong>
    <?php echo htmlspecialchars($ForgetPasswordMessage); ?>
    <?php } ?><br></strong></div></div></div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
   <form role="form" action="ForgetPassword.php" method="POST">
  <div class="form-group">
    <label for="username">Username</label>
    <input class="form-control"type="text"  name="Username" >Username is case sensitive.<br><br>
    <label for="fname">Enter Your First Name</label>
    <input class="form-control" type="text" name="FirstName"><br>
   <label for="lname">Last Your Last Name</label>
   <input class="form-control" type="text" name="LastName"><br>
    <label for="Email">Enter Your Email</label>     
    <input class="form-control" type="text" name="Email"><br>
    <input class="btn btn-default btn-lg" action="action" type="button" value="Back" onclick="history.go(-1);" />&nbsp;&nbsp;&nbsp;&nbsp;
    <input class="btn btn-default btn-lg" style="float: right;" name = 'submit' type="submit" value="Submit"><br><br>
    </form></div></div>
<footer class="footer">
    <img src="img/Logo SHP.svg" height="40px"/>
</footer> 
</body>
</html>