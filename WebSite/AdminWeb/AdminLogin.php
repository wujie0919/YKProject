<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 15/4/28
 * Time: 下午4:13
 */

$username = $_GET["username"];
$password = $_GET["password"];

$json = array();

if($username == "admin" && $password == "admin"){
    $json["success"] = '1';
}else{
    $json["success"] = '0';
}
echo json_encode($json);