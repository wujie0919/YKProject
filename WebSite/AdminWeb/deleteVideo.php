<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 15/5/14
 * Time: 下午6:02
 */
error_reporting(0);
require '../Config/DataBase.Class.php';
$vid=$_POST["vid"];
$opt=$_POST["opt"];
$jsonRs= array();
$data = new DataBase();
if($opt=="jie")
{
    $sql="UPDATE YK_Video SET videoStatus='0' WHERE videoId='$vid'";
    $rs = $data->updateAction($sql);
    if($rs=='1')
        $jsonRs['success']='1';
    else
        $jsonRs['success']='0';
    echo json_encode($jsonRs);
}else
{
    $sql="UPDATE YK_Video SET videoStatus='1' WHERE videoId='$vid'";
    $rs = $data->updateAction($sql);
    if($rs=='1')
        $jsonRs['success']='1';
    else
        $jsonRs['success']='0';
    echo json_encode($jsonRs);
}
