<?php

    // require from database
    require '../../../honeyDB.php';
    
    $sql = "SELECT hive_id, collection_date, sample_period, num_mites FROM `bee_observations` ORDER BY collection_date";
    $result = @mysqli_query($cnxn, $sql);
    $count = @mysqli_num_rows($result);
    
    if ($count >= 0)
    {
        echo "<table><tr>
                <th>Hive Name</th>
                <th>Collection Date</th>
                <th>Sample Period</th>
                <th>Num of Mites</th>
            </tr>";
            
        foreach ($result as $row)
        {
            echo "<tr>";
            $hiveName = $row['hive_id'];
            $dateCollection = $row['collection_date'];
            $obsPeriod = $row['sample_period'];
            $miteCount = $row['num_mites'];
            
            echo "<td>$hiveName</td>
                    <td>$dateCollection</td>
                    <td>$obsPeriod</td>
                    <td>$miteCount</td>";
            
            echo "</tr>";
        }
        
        echo "</table>";
    }
    
    else
    {
        echo "<p>No results found.</p>";
    }
    
?>