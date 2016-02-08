<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'database.php';
require_once 'TableDisplay.php';

/*show all users in the system and sort by last name */
$query = "SELECT Username, Password, FirstName, LastName, Email FROM user_information";
$statement = $db->prepare($query);
    $statement->execute();
    $accounts = $statement->fetchall();
    $statement->closeCursor();
//print_r($question);  This line is for testing/debug to make sure query is working.
?>

<html>

    <!--Javascript to confirm before account deletion    -->
    <script type="text/javascript">

    function confirmDelete() {
        
      var x = confirm("Are you sure you want to delete?");
      if (x)
          return true;
      else
        return false;
    
        
    } 
                

    </script>

 <?php
 studentAccounts($accounts);
 ?>
    
</html>

