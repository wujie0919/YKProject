<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 15/5/14
 * Time: 下午5:59
 */
error_reporting(0);
require '../Config/DataBase.Class.php';
$cid=$_POST["cid"];
$jsonRs= array();
$data = new DataBase();
$sql="DELETE FROM YK_Comment WHERE CommentId='$cid'";
$rs= $data->updateAction($sql);
$jsonRs['success']=$rs;

echo json_encode($jsonRs);