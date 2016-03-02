<?php
require_once 'database.php';
if(!isset($_SESSION)){session_start();}

?>

<!DOCTYPE html>
<html>
    
<head>
<meta charset="UTF-8">
<title>Authentication</title>

</head>
<body>
    <h1><?php echo "Welcome, ".$_SESSION['username'] ?></h1>
<!--    This error message is from test.php to see whether or not the student already takes the simulation test-->
    <?php if (!empty($ErrorMessageCheckStudentSimulation)) { ?>
    <?php echo htmlspecialchars($ErrorMessageCheckStudentSimulation); ?>
    <?php } ?><br><br>
    <a href="CheckStudentSimulation.php">Start Simulation</a><br><br>
    <a href="StudentUpdatePassword.php">Update Password</a><br><br>
    <a href="StudentResponse.php">View Result</a><br><br>
    <a href="logout.php">Log Out</a>
    
</body>


</html>