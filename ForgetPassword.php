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

</head>
<body>
    <?php if (!empty($ForgetPasswordMessage)) { ?>
    <?php echo htmlspecialchars($ForgetPasswordMessage); ?>
    <?php } ?><br>    
    <form action="ForgetPassword.php" method="POST">             

        <input type="text"  name="Username" placeholder="Username" >&nbsp;&nbsp;Username is case sensitive.<br><br>
        <input type="text" name="FirstName" placeholder="Enter your first name"><br><br>
        <input type="text" name="LastName" placeholder="Enter your last name"><br><br>
        <input type="text" name="Email" placeholder="Enter your email"><br><br>
        <input action="action" type="button" value="Back" onclick="history.go(-1);" />&nbsp;&nbsp;&nbsp;&nbsp;
        <input name = 'submit' type="submit" value="Submit"><br><br>

    </form>
    
    
</body>
</html>