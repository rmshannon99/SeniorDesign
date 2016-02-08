<?php

// Check to see if session already exists or not
if(!isset($_SESSION)){session_start();}
require_once 'database.php';


$studentUsername = $_POST['studentUsername']; //Get student's username from studentAccount in TableDisplay.php

// Execute to the query to delete user's account
$query = "DELETE FROM user_information WHERE Username = '$studentUsername'";
$statement = $db->prepare($query);
$statement->execute();
$statement->closeCursor();
header("Location: AccountManagement.php");



?>