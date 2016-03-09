<?php
require_once 'database.php';
if(!isset($_SESSION)){session_start();}



// Reset the sign up information
if (!isset($username)) { $username = ''; }
if (!isset($password)) { $password = ''; }
if (!isset($fname)) { $fname = ''; }
if (!isset($lname)) { $lname = ''; }
if (!isset($email)) { $email = ''; }

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Authentication</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/studenthome.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
 <!-- this is body-->
 <div class="container-fluid"> 
     <div class="row">
  <img src='img/bg2.svg'/>
  </div>
     <div class="row">
 <div class="space col-md-1"></div>
    <!--Sign In-->  
 <div id="signin" class="side col-md-4"><a name="login"></a><h2>Log In</h2>
<?php if (!empty($error_message)) { ?>
       <div class="alert alert-warning"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;<strong><?php echo htmlspecialchars($error_message); ?></strong></div>
  <?php } ?>  
 <form role="form" action="SignIn.php" method="POST">
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" class="form-control" name="username">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="password">
  </div>
  <a href="ForgetPassword.php">Forgot Password?</a>
  <input name = 'submit' class="btn btn-default btn-lg" type="submit" value="Log In" style="float: right;">
</form></div>
<div class="space col-md-1"></div>
 <div id="signup" class='main col-md-5'> 
   <!--Sign Up-->  
    <?php if (!empty($error_message1)) { ?>
   <div class="alert alert-warning"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;<strong><?php echo htmlspecialchars($error_message1); ?>!</strong></div>
    <?php } ?>
<h2>Sign Up</h2><form role="form" action="SignUp.php" method="POST">
    <div class="form-group">
    <label for="username">Username:</label>
    <input type="text"class="form-control"  name="username"><p></p>
  </div>
      <div class="form-group">
    <label for="password">Password:</label>
     <input type="password" class="form-control" name="password">
  </div>
  <div class="form-group">
    <label for="repassword">Re-enter Password:</label>
    <input type="password" class="form-control" name="repassword">
  </div>
      <div class="form-group">
    <label for="fname">First Name:</label>
     <input type="text"class="form-control"  name="fname">
  </div>
     <div class="form-group">
    <label for="lname">Last Name:</label>
     <input type="text" class="form-control"  name="lname">
  </div>
      <div class="form-group">
    <label for="email">Email address:</label>
    <input class="form-control"  type="text"  name="email">
  </div>
    <p>Note: All fields are case sensitive.</p>
    <input type="submit"class="btn btn-default btn-lg" value ="Sign Up" style="float: right;">
</form> </div>
 <div class="space col-md-1"></div></div></div>
<footer class="footer">
    <img src="img/Logo SHP.svg" height="40px"/>
</footer>   
</body>


</html>