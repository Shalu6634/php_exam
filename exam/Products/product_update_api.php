<?php 

header("Access-Control-Allow-Method: PUT");
header("Content-Type: application/json");

include("../config.php");
$c1 = new Config();


if($_SERVER['REQUEST_METHOD']=='PUT')
{

    $data = file_get_contents("php://input");
    parse_str($data,$result);
    $id = $result['id'];
    $pro_name = $result['pro_name'];
    $price = $result['price'];

    if($id!=null)
    {

    $res = $c1->proUpdate($id,$pro_name,$price);

  if($res)
  {
    $arr['msg']="Product Data update Successfully!";
  }else{
    $arr['msg']="Product Data not update ";
  }
    }
}
else{
    $arr['err'] = "Only PUT Type Allowed";
    http_response_code(400);
}

echo json_encode($arr);

?>