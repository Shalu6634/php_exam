<?php 

header("Access-Control-Allow-Method: POST");
header("Content-Type: application/json");
include("../config.php");
$c1 = new Config();


if($_SERVER['REQUEST_METHOD']=='POST')
{
  $pro_name = $_POST['pro_name'];
  $price= $_POST['price'];
 

  if($pro_name !=null && $price!=null)
  {
    $res = $c1->proAdd($pro_name,$price);

  if($res)
  {
    $arr['msg']="Product Data inserted Successfully!";
  }else{
    $arr['msg']="Product Data not inserted ";
  }
  }
  else{
    $arr['err'] = "Value null";
  }
}
else{
    $arr['err'] = "Only Post Type Allowed";
    http_response_code(400);
}

echo json_encode($arr);

?>