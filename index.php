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

</head>
<body>
    
    <!--    This is SignIn section-->
    <!--    This is error message from SignIn.php-->
    <?php if (!empty($error_message)) { ?>
    <?php echo htmlspecialchars($error_message); ?>
    <?php } ?>    
    <form action="SignIn.php" method="POST">             

        <input type="text"  name="username" placeholder="Username" ><br><br>
        <input type="password"  name="password" placeholder="Password" >&nbsp;&nbsp;
        <a href="ForgetPassword.php">Forgot Password?</a><br><br>
        <input name = 'submit' type="submit" value="Log In"><br><br>

    </form>
    
    
    <!--    This is SignUp section-->
    <!--    This is error message from SignUp.php-->
    <?php if (!empty($error_message1)) { ?>
    <?php echo htmlspecialchars($error_message1); ?>
    <?php } ?>
    <form action="SignUp.php" method="POST">
                    <input type="text"  name="username" placeholder="Username"><br><br>
                    <input type="password"  name="password" placeholder="Password"><br><br>
                    <input type="password"  name="repassword" placeholder="Re-Enter Password"><br><br>
                    <input type="text"  name="fname" placeholder="First Name"><br><br>
                    <input type="text"  name="lname" placeholder="Last Name"><br><br>
                    <input type="text"  name="email" placeholder="Email"><br>
                    Note: All fields are case sensitive. <br><br>
                    
                    <input type="submit" value ="Sign Up">
        
        
    </form>



</body>


</html>