<?php
// Check to see if session already exists or not
if(!isset($_SESSION)){session_start();}
require_once 'database.php';

if(isset($_POST['submit'])){
    
    //Check to see if new password and re-newpassword are the same or not
    if ($_POST['newPassword'] != $_POST['reNewPassword']){
        $errorMessage = "Both passwords are not the same";
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
<title>Authentication</title>

</head>
<body>
    
    <!--    This is error message from StudentUpdatePassword.php-->
    <?php if (!empty($errorMessage)) { ?>
    <?php echo htmlspecialchars($errorMessage); ?>
    <?php } ?>    
    <form action="StudentUpdatePassword.php" method="POST">             

        <input type="password"  name="newPassword" placeholder="Enter new password" ><br><br>
        <input type="password"  name="reNewPassword" placeholder="Re-enter new password" ><br><br>
        <input name = "submit" type="submit" value="Update"><br><br>

    </form>
    

</body>


</html>

