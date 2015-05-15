<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 15/5/11
 * Time: 下午3:54
 */
error_reporting(0);
require '../Config/DataBase.Class.php';
require '../Common/Tools.php';

$nickname=$_POST["nickname"];
$iden=$_POST["iden"];
$token=$_POST["token"];
$status=$_POST["status"];
$fromSource=$_POST["fromSource"];
$OSType=$_POST["OSType"];
$type=$_POST["type"];


//return;
$data=new DataBase();
$jsonRs = array();
if($type=="add")
{
    $tool= new Tools();
    $udate=$tool->getCommonId();
    $pass=md5($_POST["pass"]);
    $sql="INSERT INTO YK_User(nickName,CreateDate,token,userStatus,fromSource,iden,passw,OSType)VALUES('$nickname','$udate','$token','$status','$fromSource','$iden','$pass','$OSType')";
    $rs=$data->insertAction($sql);
//    $jsonRs['success']=$rs;
    if($rs=='1')
        $jsonRs['success']='1';
    else
        $jsonRs['success']='0';
    echo json_encode($jsonRs);
}
else
{
    $userId=$_POST["id"];
    $sql="UPDATE YK_User SET nickName='$nickname',token='$token',userStatus='$status',fromSource='$fromSource',iden='$iden',OSType='$OSType' WHERE userId='$userId'";
    $rs=$data->updateAction($sql);
    if($rs=='1')
        $jsonRs['success']='1';
    else
        $jsonRs['success']='0';
    echo json_encode($jsonRs);
}




