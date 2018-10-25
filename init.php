<?php
try {
	//connecting to server
     $conn = new PDO("sqlsrv:server = tcp:quakesafeserver.database.windows.net,1433; Database = quakesafeDB", "quakesafeuser", "P@ssw0rd");
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     // $stmt = "SELECT lat1 from footprint";
     // $result = $conn->query($stmt);
     // while($row = $result->fetch()){
     // 	echo $row['lat1'];
     // }
// 
     // echo "not working";
      // $sqlDelete = "DELETE FROM footprint";
        // $conn->exec($sqlDelete);
        // echo "deleted successfully";

    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    die();
    }
    
?>