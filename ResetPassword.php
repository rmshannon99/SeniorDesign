<?php

// Check to see if session already exists or not
if(!isset($_SESSION)){session_start();}
require_once 'database.php';

if (isset($_POST['studentUsername'])){
$studentUsername = $_POST['studentUsername']; //Get student's username from studentAccount in TableDisplay.php
}

if (isset($_POST['submit'])){    
        
        $password = $_POST['password'];
        $studentUsername = $_POST['studentUsername']; //Need this username in order to update the password's query
        // Execute to the query to update user's password
        $query = "UPDATE user_information SET Password='$password' WHERE Username='$studentUsername'";
        $statement = $db->prepare($query);
        $statement->execute();
        $statement->closeCursor();
        header("Location: AccountManagement.php");
    

}

?>

<!DOCTYPE html>
<html>
    
<head>
<meta charset="UTF-8">
<title>Reset Password</title>
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
<!--    This is a form to reset password for student account-->
    <?php if (!empty($errorMessagePassword)) { ?>
<div class="alert alert-warning"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;<strong><?php echo htmlspecialchars($errorMessagePassword); ?>
    <?php } ?></strong></div>
<div class="row">
    <div class="col-md-4"></div>
        <div class="col-md-4">
     <form role="form" action="ResetPassword.php" method="POST">
    <label for="account">Account:<?php echo $studentUsername; ?> </label>
    <input class="form-control" type="text"  name="password" placeholder="Enter new password" ><br><br>     
    <input class="form-control" type="hidden" name="studentUsername" value="<?php echo $studentUsername; ?>">
    <input class="btn-block" name = 'submit' type="submit" value="Submit"><br>
    <input class="btn btn-primary" action="action" type="button" value="Back" onclick="history.go(-1);" />
    </form>
</div>
</div>
     </div>
<footer class="footer">
    <img src="img/Logo SHP.svg" height="40px"/>
</footer>  
</body>


</html>