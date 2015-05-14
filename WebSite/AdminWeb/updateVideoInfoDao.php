<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 15/5/14
 * Time: 下午6:31
 * var par = "videoName="+videoName+"&swf_area="+swf_area+"&desc="+desc+"&cid="+msg;
 */
error_reporting(0);
require '../Config/DataBase.Class.php';
$videoName=$_POST["videoName"];
$swf_area=$_POST["swf_area"];
$desc=$_POST["desc"];
$vid=$_POST["vid"];

$data= new DataBase();
$sql="UPDATE YK_Video SET videoName='$videoName',videoDesc='$desc',videoArea='$swf_area' FROM YK_Video WHERE videoId='$vid'";
$jsonRs= array();
$rs=$data->updateAction($sql);
if($rs=='1')
    $jsonRs['success']='1';
else
    $jsonRs['success']='0';
echo json_encode($jsonRs);