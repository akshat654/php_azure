<?php
try {
	//connecting to server
     $conn = new PDO("sqlsrv:server = tcp:quakesafeserver.database.windows.net,1433; Database = quakesafeDB", "quakesafeuser", "P@ssw0rd");
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    die();
    }
    
?>