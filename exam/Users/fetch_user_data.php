<?php 

header("Access-Control-Allow-Method: GET");
header("Content-Type: application/json");
include("../config.php");
$c1 = new Config();


if($_SERVER['REQUEST_METHOD']=='GET')
{

  $res = $c1->fetchUserData();
  $arr = [];
  if($res)
  {
    while ($data = mysqli_fetch_assoc($res)) {

      array_push($arr, $data);
  
  }
  }
}
else{
    $arr['err'] = "Only GET Type Allowed";
    http_response_code(400);
}

echo json_encode($arr);

?>