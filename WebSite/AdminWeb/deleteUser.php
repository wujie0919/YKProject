<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 15/5/14
 * Time: 下午3:25
 */
error_reporting(0);
require '../Config/DataBase.Class.php';
$userId=$_POST["uid"];
$jsonRs= array();
$data = new DataBase();
$sql="UPDATE YK_User SET userStatus='1' WHERE userId='$userId'";
$rs = $data->updateAction($sql);
if($rs=='1')
    $jsonRs['success']='1';
else
    $jsonRs['success']='0';
echo json_encode($jsonRs);