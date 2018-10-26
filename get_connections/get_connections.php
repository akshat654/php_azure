<?php
require('../init.php');

$error = True;
$message = "";
$response = array();
$user_id = $_POST['user_id'];
try{ 
  $stmt = "SELECT * from users where user_id=".$user_id."";
     $result = $conn->query($stmt);
     while($row = $result->fetch()){
     	$users = exlpode("-",$row['connections']);
     	 foreach( $users as $user ) {
	     	$stmt2 = "SELECT * from users where user_id=".$user."";
	     	$result2 = $conn->query($stmt2);
	     	 while($row2 = $result2->fetch()){
	            array_push($response,array(
	                    "name"=>$row2['name'],
	                    "mobile"=>$row2['mobile'],
	                    "status"=>$row2['status'],
	                    "is_fav"=>false);
	        }	
	    }
	    $error = False;
        break;
     }
    echo json_encode(array("error"=>$error,
    "message"=>$message,
    "response"=>$response));

} catch(PDOException $e){ 
    die("ERROR: Could not able to execute $sql. "  
                                   . $e->getMessage()); 
}  


?>