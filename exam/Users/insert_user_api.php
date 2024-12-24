<?php

header("Access-Control-Allow-Method: POST");
header("Content-Type: application/json");
include("../config.php");
$c1 = new Config();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  if ($name != null && $email != null && $phone != null) {
    $res = $c1->userAdd($name, $email, $phone);


    if ($res) {

      $arr['msg'] = "User Data inserted Successfully!";


    } else {
      $arr['msg'] = "User Data not inserted ";
    }
  } else {
    $arr['err'] = " value null";
    
  }
} else {
  $arr['err'] = "Only Post Type Allowed";
  http_response_code(400);
}

echo json_encode($arr);

?>