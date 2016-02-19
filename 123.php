<pre>
<?php
//Get all the information fro scene_table
    require_once 'database.php';
    $SceneQuery = "SELECT * FROM scene_table";
    $statement = $db->prepare($SceneQuery);
    $statement->execute();
    $Scene = $statement->fetchall();
    $statement->closeCursor();
    
    print_r($Scene);

            $CheckQuery = "SELECT * FROM baby_information WHERE SceneID = '3' ";
            $statement = $db->prepare($CheckQuery);
            $statement->execute();
            $Check = $statement->fetchall();
            print_r($Check);
?>
</pre>