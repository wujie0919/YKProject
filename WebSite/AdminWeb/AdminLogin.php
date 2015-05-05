<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 15/4/28
 * Time: 下午4:13
 */

$username = $_POST["username"];
$password = $_POST["password"];

$json = array();



if($username == "admin" && $password == "admin"){
    $json["success"] = '1';
}else{
    $json["success"] = '0';
}
//设置session
session_start();
$_SESSION["Login"]=$username;
echo json_encode($json);