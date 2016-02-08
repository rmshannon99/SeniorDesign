<?php

if(!isset($_SESSION)){session_start();}
require_once 'database.php';

//Get the user's input
$username = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);

// Check to see if there is any error

if (empty($username) || empty($password) || empty($repassword) || empty ($fname) || empty ($lname)){
    $error_message1 = "Please complete the form!";
    
}
//elseif (strlen($username)<8){
//    $error_message1 = "Username should have at least 8 characters";
//}
elseif ($email == FALSE || empty($email) ){
    $error_message1 = "Please use valid email";
}
elseif ($password != $repassword){
    $error_message1 = "Passwords don't match. Please try again";
}
else{
    // Check to see if the username is already exist
    $query = "SELECT * FROM user_information WHERE Username='$username'";
    $statement = $db->prepare($query);
    $statement->execute();
    $user_info = $statement->fetch();
    $statement->closeCursor();
    if(!empty($user_info[0])){ //Check to see if there is a return
        
    $error_message1 ='Username is already taken! Please choose another username.';
        
    }
    else{ //else create save user's information into the database (user table)
    $error_message1 = '';
    $query = 'INSERT INTO user_information
             (userID, Username, Password, FirstName, LastName,Email)
          VALUES
             (NULL, :username, :password, :fname, :lname, :email)';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':fname', $fname);
    $statement->bindValue(':lname', $lname);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $statement->closeCursor();
    $_SESSION['username'] = $username; // store username to global session
    
    // Get new account ID
    
    $query = "SELECT * FROM user_information WHERE Username='$username'";
    $statement = $db->prepare($query);
    $statement->execute();
    $user_info = $statement->fetch();
    $statement->closeCursor();
    $_SESSION['userID'] = $user_info['userID']; //Store student ID to global session
    
    //$_SESSION['userID'] = $user_info['userID']; //Store student ID to global session
    header("Location: StudentHomePage.php"); //go to main page
    exit();}
}

if ($error_message1 != ''){
    include 'Authentication.php';
    exit();
}

?>


