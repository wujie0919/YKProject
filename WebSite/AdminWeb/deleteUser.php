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
$opt=$_POST["opt"];
$jsonRs= array();
$data = new DataBase();
if($opt=="jie")
{
    $sql="UPDATE YK_User SET userStatus='0' WHERE userId='$userId'";
    $rs = $data->updateAction($sql);
    if($rs=='1')
        $jsonRs['success']='1';
    else
        $jsonRs['success']='0';
    echo json_encode($jsonRs);
}else
{
    $sql="UPDATE YK_User SET userStatus='1' WHERE userId='$userId'";
    $rs = $data->updateAction($sql);
    if($rs=='1')
        $jsonRs['success']='1';
    else
        $jsonRs['success']='0';
    echo json_encode($jsonRs);
}