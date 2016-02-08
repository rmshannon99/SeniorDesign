<?php
// Destroy the session
session_start();
if(session_destroy()){
    header("Location: Authentication.php");
    exit();
}
   
?>

