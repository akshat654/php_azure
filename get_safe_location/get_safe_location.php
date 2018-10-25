<?php
require('../init.php');

// if(!isset($_POST['distance']){
//     die(json_encode(array('error'=>TRUE,
//       "message"=>"unauthorized!")));
// }

echo $_POST['abc'];

function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}



$lat = $_POST['latitude'];
$lon = $_POST['longitude'];
$DISTANCE = $_POST['distance'];

$error = True;
$message = "";
$response = array();

try{ 
    $sql = "SELECT * FROM footprint";  
    $res = $conn->query($sql); 
    if($res->rowCount() > 0){ 
         while($row = $res->fetch()){ 
            $lat_ = ($row['lat1']+$row['lat2']+$row['lat3']+$row['lat4'])/4;
            $lon_ = ($row['lon1']+$row['lon2']+$row['lon3']+$row['lon4'])/4;

           if(distance($lat,$lon,$lat_,$lon_,"K")<=$DISTANCE){
                array_push($response,array(
                    "lat1"=>$row['lat1'],
                    "lat2"=>$row['lat2'],
                    "lat3"=>$row['lat3'],
                    "lat4"=>$row['lat4'],
                    "lon1"=>$row['lon1'],
                    "lon2"=>$row['lon2'],
                    "lon3"=>$row['lon3'],
                    "lon4"=>$row['lon4'],
                    "height"=>$row['height'],
                    "radius"=>$row['height']/6
                ));
           }
        }
        // echo "dsdad";
        unset($res);
        $error = False; 
    } else{ 
        $message = "No records matching are found"; 
    } 

    echo json_encode(array("error"=>$error,
    "message"=>$message,
    "response"=>$response));

} catch(PDOException $e){ 
    die("ERROR: Could not able to execute $sql. "  
                                   . $e->getMessage()); 
}  

?>