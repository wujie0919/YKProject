<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 15/5/11
 * Time: 下午3:54
 */
//"nickname="+name+"&iden="+iden+"&token="+token+"&status="+status+"&fromSource="+fromSource
/*1、userId 用户id，用时间生成
2、nickName 用户昵称
3、CreateDate 创建账户时间
4、token 手机token 用来存储
5、password 密码
6、userStatus 账号状态 0：正常 1、被封
8、froms 0、微博 1、QQ
9、iden 第三方的唯一标识
*/
error_reporting(0);
require '../Config/DataBase.Class.php';
require '../Common/Tools.php';

$nickname=$_POST["nickname"];
$iden=$_POST["iden"];
$token=$_POST["token"];
$status=$_POST["status"];
$fromSource=$_POST["fromSource"];

$type=$_POST["type"];
$sql="";
if($type=="add")
{
    $pass=$_POST["pass"];
    $sql="INSERT INTO YK_User(userId,nickName,CreateDate,token,userStatus,froms,iden,password)VALUES (".$udate.",".$nickname.",".$udate.",".$token.",".$status.",".$fromSource.",".$iden.",".$pass.")";
}
else
    $sql="INSERT INTO YK_User(userId,nickName,CreateDate,token,userStatus,froms,iden)VALUES (".$udate.",".$nickname.",".$udate.",".$token.",".$status.",".$fromSource.",".$iden.")";

$tool= new Tools();
$udate=$tool->getCommonId();

$data=new DataBase();
$rs=$data->insertAction($sql);
$json = array();
$json["success"]=$sql;




