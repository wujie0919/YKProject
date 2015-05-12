<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 15/5/11
 * Time: 下午3:54
 */
//error_reporting(0);
require '../Config/DataBase.Class.php';
require '../Common/Tools.php';

$nickname=$_POST["nickname"];
$iden=$_POST["iden"];
$token=$_POST["token"];
$status=$_POST["status"];
$fromSource=$_POST["fromSource"];

$type=$_POST["type"];

$tool= new Tools();
$udate=$tool->getCommonId();

$json = array();
$json["success"]=$udate;
if($type=="add")
{
    $pass=$_POST["pass"];
    $sql="INSERT INTO YK_User(userId,nickName,CreateDate,token,userStatus,froms,iden,passw)VALUES (".$udate.",".$nickname.",".$udate.",".$token.",".$status.",".$fromSource.",".$iden.",".$pass.")";
}
else
    $sql="INSERT INTO YK_User(userId,nickName,CreateDate,token,userStatus,froms,iden)VALUES (".$udate.",".$nickname.",".$udate.",".$token.",".$status.",".$fromSource.",".$iden.")";

$data=new DataBase();
$rs=$data->insertAction($sql);
$json = array();
$json["success"]=$rs;




