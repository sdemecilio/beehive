<!DOCTYPE html>
<html lang = "en">
    
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Honey Bee Data Collection</title>
        <meta charset = "UTF-8">
        
        <!--Bootstrap -->
        <link href = "css/bootstrap.min.css" rel = "stylesheet">
    </head>
    
    <body>
        <h1>Honey Bee Data Collection Form</h1>
        <!--
            Need:
                - Hive name
                - Observation date
                - observation duration
                - mite count
            -->
        
        <form id = "dataCollection" action = "record.php" method = "POST">
            <p>
                Hive Name:
                    <input type = "text" id = "hiveName" name = "hiveName">
            </p>
            <p>
                Date of Collection:
                    <input type = "date" id = "dateCollection" name = "dateCollection" required>
            </p>
            <p>
                Observation period:
                    <input type = "number" id = "observationPeriod" name = "observationPeriod" min = "1" max = "500" required>
            </p>
            <p>
                Mite count:
                    <input type = "number" id = "miteCount" name = "miteCount" min = "0" max = "1000" required>
            </p>
            
            <!-- Submit button -->
            <p>
                <input type = "submit" name = "btnSubmit" value = "Submit Data">
            </p>
        </form>
    </body>
    
</html>