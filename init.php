<?php
// $servername = "localhost";
// $username = "root";
// $password = "";

try {
     $conn = new PDO("sqlsrv:server = tcp:quakesafeserver.database.windows.net,1433; Database = quakesafeDB", "quakesafeuser", "P@ssw0rd");
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    
?>