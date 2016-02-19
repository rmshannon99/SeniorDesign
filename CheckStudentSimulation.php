<?php

//This file is used to check whether or not the student takes the simulation test yet
// Connect to database and check session
require_once 'database.php';
if(!isset($_SESSION)){session_start();}

   //Query check to see if the student takes the simulation yet or not
    $CheckStudentSimulationQuery = "SELECT * FROM student_response_new WHERE userID='".$_SESSION['userID']."'";
    $statement = $db->prepare($CheckStudentSimulationQuery);
    $statement->execute();
    $CheckStudentSimulation = $statement->fetchall();
    $statement->closeCursor();

    //If the student already takes it, display error message and goes back  to StudentHomePage.php
    if(!empty($CheckStudentSimulation)){
        $ErrorMessageCheckStudentSimulation = "You already took the simulation test.";
        include 'StudentHomePage.php';
        exit();
    }
    
    //If not, start the simulation
    else{
        header("Location: SimulationTest.php");
        
    }
?>

