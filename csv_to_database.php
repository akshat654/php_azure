<?php
require('init.php');
try {
    $fileName = "data_.csv";
    $file = fopen($fileName, "r"); 
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sqlInsert = "INSERT into footprint (lat1,lon1,lat2,lon2,lat3,lon3,lat4,lon4,height)
                   values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[7] . "','" . $column[8] . "')";
            $conn->exec($sqlInsert);
        }
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>