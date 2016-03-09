<?php
// Check to see if session already exists or not
if(!isset($_SESSION)){session_start();}
require_once 'database.php';

if(isset($_POST['submit'])){
    
    //Check to see if new password and re-newpassword are the same or not
    if ($_POST['newPassword'] != $_POST['reNewPassword']){
        $errorMessage = "The new passwords are mismatched.  Please try again.";
    }
    else{
        // Set new password to the database.
        $newPassword = $_POST['newPassword'];
        $query = "UPDATE user_information SET Password ='$newPassword' WHERE Username='".$_SESSION['username']."'";
        $statement = $db->prepare($query);
        $statement->execute();
        $user_info = $statement->fetch();
        $statement->closeCursor();
        header("Location: StudentHomePage.php");
        exit();
        
    }
        
}


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
<title>Update Password</title>

</head>
<body>
         <div class="container-fluid"> 
          <div class="row">
              <img src="img/banner.svg" />
</div>
     <div class="row title">
         <div class="col-md-8"><p class="ptitle"><img class="responsive" src="img/studentlogo.svg"width="80px"height="50px"/>
                 Welcome Student<?php echo $_SESSION['username']; ?></p>
      <?php if (!empty($errorMessage)) { ?>
       <div class="alert alert-warning"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;<strong><?php echo htmlspecialchars($errorMessage); ?>
   <br><br></strong></div> <?php } ?>
         </div>
         <div class="col-md-2">
             <a href="http://localhost/Demo/StudentHomePage.php" class="btn btn-lg">
          <span class="glyphicon glyphicon-home"></span> Home
        </a></div>
         <div class="col-md-2">
             <a href="http://localhost/Demo/logout.php" class="btn btn-lg">
          <span class="glyphicon glyphicon-off"></span> Log Out
        </a></div>
     </div>  
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2>Reset Password</h2><br>
<form role="form" action="StudentUpdatePassword.php" method="POST">
    <div class="form-group">
    <label for="password">New Password:</label>
     <input type="password" class="form-control" name="newPassword">
  </div>
  <div class="form-group">
    <label for="repassword">Re-enter Password:</label>
    <input type="password" class="form-control" name="reNewPassword">
  </div>
        <input name = "submit" class="btn-block" type="submit" value="Update"><br>
        <input class="btn btn-primary" action="action" type="button" value="Back" onclick="history.go(-1);" />
    </form>
    </div>
       <div class="col-md-4"></div>
    </div>
    </div>


<footer class="footer">
    <img src="img/Logo SHP.svg" height="40px"/>
</footer>  
</body>
</html>

