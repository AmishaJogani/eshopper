<?php


$status = false;
$data= [];
$msg = "";

if(!isset($_GET['email'])){
$msg = "Email is empty";
}

$data = ['status' => $status,
"msg" => $msg,
"data" => $data
];

echo json_encode($data);
?>