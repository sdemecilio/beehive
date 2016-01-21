<?php

    /*
     * Stacey Demecilio
     * Process data for index.php using PDO
     */
    
    // turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Data Recording</title>
        </head>
        
        <body>
            
            <?php
            $username = "stacey_beeAdmin";
            $password = "bee123";
            $hostname = "localhost";
            
            try
            {
                // instatiate a database object
                $database = new PDO("mysql:host=$hostname; dbname=stacey_bee_database", $username, $password);
                //echo 'Connected to database';
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
                
                
                // create a boolean flag
                $isValid = true;
                
                // check for hive name
                if(!empty ($_POST['hiveName']))
                {
                    $hiveName = $_POST['hiveName'];
                }
                else
                {
                   $hiveName = "No hive name entered";
                }
                
                // check for collection date
                if(!empty($_POST['dateCollection']))
                {
                    $collectionDate = $_POST['dateCollection'];
                }
                
                // check for observation period
                if(!empty($_POST['observationPeriod']))
                {
                    $observationPeriod = $_POST['observationPeriod'];
                }
                
                //check number of mite count
                if(!empty($_POST['miteCount']))
                {
                    $miteCount = $_POST['miteCount'];
                }
                else
                {
                    $miteCount = 0;
                }
                
                // display summary
                if($isValid)
                {
                    $sql = "INSERT INTO bee_observations(hive_id, collection_date, sample_period, num_mites) VALUES(:hiveName, :collectionDate, :observationPeriod, :miteCount)";
                    
                    // prepare the statement
                    $statement = $database->prepare($sql);
                    
                    // bind parameters
                    $statement->bindParam(':hiveName', $hiveName, PDO::PARAM_STR);
                    $statement->bindParam(':collectionDate', $collectionDate, PDO::PARAM_STR);
                    $statement->bindParam(':observationPeriod', $observationPeriod, PDO::PARAM_STR);
                    $statement->bindParam(':miteCount', $miteCount, PDO::PARAM_STR);
                    
                    // execute statement
                   $statement->execute();
    
                    if ($statement)
                    {
                        print "<p>Data Recently Inputted:</p>";
                        print "<p></p>";
                        print "Hive Name: " . $hiveName . "<br>";
                        print "Collection date: " . $collectionDate . "<br>";
                        print "Observation Period: " . $observationPeriod . "<br>";
                        print "Mite count: " . $miteCount . "<br>";
                        
                        
                    }

                }
            ?>
        
        <p><a href = "index.php"><h3>Back to data input.</h3></a></p>
            
        </body>
    </html>
    
    