<?php

function studentResponse($data){ // use to display a table in HTML
        
        $result = '<table class="table" align="center" border="1" style="width:30%" cellpadding="10">';
        $result .= '<th>Number</th><th>Question</th><th>Student Response</th><th>Correct Answer</th><th>Your Comment</th>';
        $index = 1;

        foreach ($data as $value){
                        
                $result .= '<tr>';
                $result .= '<td align="center">'.$index.'</td>';
                $result .= '<td>'.$value['Question'].'</td>';
                $result .= '<td>'.$value['ChosenOption'].'</td>';
                $result .= '<td>'.$value['CorrectOption'].'</td>';
                $result .= '<td>'.$value['TextResponse'].'</td>';  
                $result .= '</tr>';
                $index++;
            }
        $result .= '</table>';
            
        echo $result;          
}

function studentAccounts($data) {
    $result = '<table class="table" align="center">';
    $result .= '<thead><th>Username</th><th>Password</th><th>First Name</th><th>Last Name</th><th>Email</th></thead>';
    $confirmMessage = "Are you sure you want to delete";

    foreach ($data as $value){
                        
                $result .= '<tr>';
                $result .= '<td>'.$value['Username'].'</td>';
                $result .= '<td>'.$value['Password'].'</td>';
                $result .= '<td>'.$value['FirstName'].'</td>';
                $result .= '<td>'.$value['LastName'].'</td>';
                $result .= '<td>'.$value['Email'].'</td>';                               
                $result .= '<td><form action="DeleteAccount.php" onSubmit="return confirmDelete();" method="POST"><input type="hidden" name="studentUsername" value="'.$value['Username'].'"><input class="btn btn-danger" type="submit" value="Delete"></form></td>';
                $result .= '<td><form action="ResetPassword.php" method="POST"><input type="hidden" name="studentUsername" value="'.$value['Username'].'"><input class="btn btn-default" type="submit" value="Reset Password"></form></td>';
                $result .= '</tr>';
                
            }
        $result .= '</table>';
            
        echo $result;        
}

function CurrentConfigDisplay($data){
    $result = '<table class="table" align="center">';
    $result .= '<thead><th>Blood Pressure</th><th>Heart Rate</th><th>Airway Respiratory</th><th>Parent State</th></thead>';
    
    foreach ($data as $value){
                        
                $result .= '<tr>';
                $result .= '<td>'.$value['BloodPressure'].'</td>';
                $result .= '<td>'.$value['HeartRate'].'</td>';
                $result .= '<td>'.$value['AirwayRespiratory'].'</td>';
                $result .= '<td>'.$value['ParentState'].'</td>';
                $result .= '</tr>';
                
            }
        $result .= '</table>';
            
        echo $result;
    
}

function StudentInformationDisplay($data){
    $result = '<table class="table" align="center">';
    $result .= '<thead><th>Student ID</th><th>Username</th><th>Student Name</th><th>Lets student re-take test</th></thead>';
    
    foreach ($data as $value){
                                   
                $result .= '<tr>';
                $result .= '<td>'.$value['userID'].'</td>';
                $result .= '<td>'.$value['Username'].'</td>';
                $result .= '<td><form action="DisplayStudentResponse.php" method="POST"><input type="hidden" name="StudentID" value="'.$value['userID'].'"><input class="btn btn-default" type="submit" value="'.$value['FirstName'].' '.$value['LastName'].'"></form></td>';
                $result .= '<td><form action="ResetStudentTest.php" method="POST"><input type="hidden" name="StudentID" value="'.$value['userID'].'"><input class="btn btn-success" type="submit" value="Yes"></form></td>';

                $result .= '</tr>';
                
                
            }
        $result .= '</table>';
            
        echo $result;
    
}


function DisplayStudentResponse($data){ // use to display in DisplayStudentReponse.php
        
        $result = '<table class="table" align="center" border="1" style="width:30%" cellpadding="10">';
        $result .= '<th>Number</th><th>Question</th><th>Student Answer</th><th>Correct Answer</th><th>Student Comment</th>';
        $index = 1;

        foreach ($data as $value){
                        
                $result .= '<tr>';
                $result .= '<td align="center">'.$index.'</td>';
                $result .= '<td>'.$value['Question'].'</td>';
                $result .= '<td>'.$value['ChosenOption'].'</td>';
                $result .= '<td>'.$value['CorrectOption'].'</td>';
                $result .= '<td>'.$value['TextResponse'].'</td>';  
                $result .= '</tr>';
                $index++;
            }
        $result .= '</table>';
            
        echo $result;          
}

?>