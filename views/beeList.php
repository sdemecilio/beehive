<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>Beehive Prototype</title>
        <meta charset = "UTF-8">
        <meta name = "author" content = "Beehive">
    </head>
    
    <body>
        <table>
            <?php
            foreach ($beeList as $row)
            {
                echo '<tr>';
                echo '<td>', $row['hive_id'], '</td>';
                echo '<td>', $row['collection_date'], '</td>';
                echo '<td>', $row['sample_period'], '</td>';
                echo '<td>', $row['num_mites'], '</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </body>
</html>