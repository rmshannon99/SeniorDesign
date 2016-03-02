<?php

if(!isset($_SESSION)){session_start();}
require_once 'database.php';
// Check user's sign-n information

if (isset($_POST['submit'])){
    if (empty($_POST['username']) || empty($_POST['password'])){
        $error_message = 'Invalid ID or Password.  Please try again.';
        include 'index.php';
        exit();
    }
    else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        //This query check to see if the user's information is valid or not
        $query = "SELECT * FROM user_information WHERE Password='$password' AND Username='$username'";
        $statement = $db->prepare($query);
        $statement->execute();
        $user_info = $statement->fetch();
        $statement->closeCursor();
        if(!empty($user_info[0])){ // if the information is corrected, go to main page

            $_SESSION['username'] = $user_info['Username']; // store username to global session
            $_SESSION['userID'] = $user_info['userID']; //Store student ID to global session
           // Check to see wheter or not it's admin account
            if($_SESSION['username'] != "admin"){

            header("Location: StudentHomePage.php");

            exit();
            }
            
            else {
                
            header("Location: AdminPage.php");
            exit();
                
            }

        }
        else{ // if not, go back to index page
            $error_message = 'User or Password is invalid';
            include 'index.php';
            exit();

        }
    }
}
?>