<?php

    /*
     * Stacey Demecilio
     * Process data for index.php form
     *
     * Array
(
    [hiveName] => Honey123
    [dateCollection] => 2014-01-06
    [observationPeriod] => 5
    [miteCount] => 6
    [btnSubmit] => Submit Data
)
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
                    // read from database
                    require'../../../honeyDB.php';
                
                    // escape the data (rejects sql injection)
                    $hiveName = mysqli_real_escape_string($cnxn, $hiveName);
                    
                    $sql = "INSERT INTO bee_observations VALUES(NULL, '$hiveName', '$collectionDate', '$observationPeriod', '$miteCount', NOW());";
                    echo $sql; // <--- shows what the sql statemet is
                    $result = @mysqli_query($cnxn, $sql);
                    
                    if($result)
                    {
                        print "<p></p>";
                        print "Hive Name: " . $hiveName . "<br>";
                        print "Collection date: " . $collectionDate . "<br>";
                        print "Observation Period: " . $observationPeriod . "<br>";
                        print "Mite count: " . $miteCount . "<br>";
                    }
                    else
                    {
                        echo "<p>Error: " . mysqli_error($cnxn) . "</p>";
                    }
                }
            ?>
        
        <p><a href = "index.php"><h3>Back to data input.</h3></a></p>
            
        </body>
    </html>
    
    