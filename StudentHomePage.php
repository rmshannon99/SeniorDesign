<!DOCTYPE html>
<html>
    
<head>
<meta charset="UTF-8">
<title>Authentication</title>

</head>
<body>
    
<!--    This error message is from test.php to see whether or not the student already takes the simulation test-->
    <?php if (!empty($ErrorMessageCheckStudentSimulation)) { ?>
    <?php echo htmlspecialchars($ErrorMessageCheckStudentSimulation); ?>
    <?php } ?><br><br>
    <a href="http://localhost/Demo/CheckStudentSimulation.php">Start Simulation</a><br><br>
    <a href="http://localhost/Demo/StudentUpdatePassword.php">Update Password</a><br><br>
    <a href="http://localhost/Demo/StudentResponse.php">View Result</a><br><br>
    <a href="http://localhost/Demo/logout.php">Log Out</a>
    
</body>


</html>