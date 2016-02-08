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

</head>
<body>
    
<!--    This is a form to reset password for student account-->
    <?php if (!empty($errorMessagePassword)) { ?>
    <?php echo htmlspecialchars($errorMessagePassword); ?>
    <?php } ?>
    <form action="ResetPassword.php" method="POST">
        Account: <?php echo $studentUsername; ?> <br><br>        
        <input type="text"  name="password" placeholder="Enter new password" ><br><br>     
        <input type="hidden" name="studentUsername" value="<?php echo $studentUsername; ?>">
        <input name = 'submit' type="submit" value="Submit"><br><br>
        
    </form>



</body>


</html>