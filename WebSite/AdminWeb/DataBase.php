<?php
/**
 * Created by PhpStorm.
 * User: panlee
 * Date: 15/5/4
 * Time: 下午5:05
 */

require_once ("../Config/WebConfig.php");

define(DB_HOST,'localhost:3306');
define(DB_USER,'user');
define(DB_PASS,'123');
define(DB_DATABASENAME,'test');
define(DB_TABLENAME,'student');

$myconn = mysql_connect(DB_HOST, DB_USER, DB_PASS);
if(!$myconn){
    die("connect failed" . mysql_error());
}else{
//             echo "success";
}
mysql_select_db(DB_DATABASENAME, $myconn);

//mysql_query("set names 'gbk'"); // //这就是指定数据库字符集，一般放在连接数据库后面就系了
//$strSql = "select * from " . DB_TABLENAME;
//$result = mysql_query($strSql, $myconn);
//$obj = array();
//while($row = mysql_fetch_assoc($result)){
//    $obj[] = $row;
//}
//echo json_encode($obj);

// insert
//$sql = "insert into ".DB_TABLENAME." (name,sid,sex,age)values('lipan1','154','1','26')";
//if(mysql_query($sql,$myconn)){
//    echo "success";
//}else{
//    die('Error: ' . mysql_error());
//}
//mysql_close($myconn);

// relpace
//$sql = "update ".DB_TABLENAME." set name = '李攀1' where sid = '12345'";
//if(mysql_query($sql,$myconn)){
//    echo "success";
//}else{
//    die('Error: ' . mysql_error());
//}
//mysql_close($myconn);

// delete
$sql = "delete from ".DB_TABLENAME." where sid = '12345'";
if(mysql_query($sql,$myconn)){
    echo "success";
}else{
    die('Error: ' . mysql_error());
}
mysql_close($myconn);