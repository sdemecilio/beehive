<?php

    $username = "stacey_beeAdmin";
    $password = "bee123";
    $hostname = "localhost";
            
    try
    {
        $db = new PDO ("mysql:host=$hostname; dbname = stacey_bee_database", $username, $password);
        echo 'Connected!';
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
    
    // make model available
    include 'models/beeDatabaseModel.php';
    
    // create instance of data model
    $model = new beeDatabaseModel($db);
    
    // call getAllObservations function
    $beeList = $model->getAllObservations();
    
    // show view
    include 'views/beeList.php';
    
    // close database conncection
    $db = null;
    
?>