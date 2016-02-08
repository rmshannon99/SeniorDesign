<?php

function studentResponse($data){ // use to display a table in HTML
        
        $result = '<table align="center" border="1" style="width:30%" cellpadding="10">';
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
    $result = '<table align="center" border="1" style="width:30%" cellpadding="10">';
    $result .= '<th>Username</th><th>Password</th><th>First Name</th><th>Last Name</th><th>Email</th><th></th><th></th>';
    $confirmMessage = "Are you sure you want to delete";

    foreach ($data as $value){
                        
                $result .= '<tr>';
                $result .= '<td align="center">'.$value['Username'].'</td>';
                $result .= '<td>'.$value['Password'].'</td>';
                $result .= '<td>'.$value['FirstName'].'</td>';
                $result .= '<td>'.$value['LastName'].'</td>';
                $result .= '<td>'.$value['Email'].'</td>';                               
                $result .= '<td><form action="DeleteAccount.php" onSubmit="return confirmDelete();" method="POST"><input type="hidden" name="studentUsername" value="'.$value['Username'].'"><input type="submit" value="Delete"></form></td>';
                $result .= '<td><form action="ResetPassword.php" method="POST"><input type="hidden" name="studentUsername" value="'.$value['Username'].'"><input type="submit" value="Reset Password"></form></td>';
                $result .= '</tr>';
                
            }
        $result .= '</table>';
            
        echo $result;        
}

function CurrentConfigDisplay($data){
    $result = '<table align="center" border="1" style="width:30%" cellpadding="10">';
    $result .= '<th>Blood Pressure</th><th>Heart Rate</th><th>Airway Respiratory</th><th>Parent State</th>';
    
    foreach ($data as $value){
                        
                $result .= '<tr>';
                $result .= '<td align="center">'.$value['BloodPressure'].'</td>';
                $result .= '<td align="center">'.$value['HeartRate'].'</td>';
                $result .= '<td align="center">'.$value['AirwayRespiratory'].'</td>';
                $result .= '<td align="center">'.$value['ParentState'].'</td>';
                $result .= '</tr>';
                
            }
        $result .= '</table>';
            
        echo $result;
    
}

function StudentInformationDisplay($data){
    $result = '<table align="center" border="1" style="width:30%" cellpadding="10">';
    $result .= '<th>Student ID</th><th>Student Name</th>';
    
    foreach ($data as $value){
                                   
                $result .= '<tr>';
                $result .= '<td align="center">'.$value['userID'].'</td>';
                $result .= '<td align="center"><form action="DisplayStudentResponse.php" method="POST"><input type="hidden" name="StudentID" value="'.$value['userID'].'"><input type="submit" value="'.$value['FirstName'].' '.$value['LastName'].'"></form></td>';
                $result .= '</tr>';
                
                
            }
        $result .= '</table>';
            
        echo $result;
    
}


function DisplayStudentResponse($data){ // use to display in DisplayStudentReponse.php
        
        $result = '<table align="center" border="1" style="width:30%" cellpadding="10">';
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