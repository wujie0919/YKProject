<?php
/**
 * Created by PhpStorm.
 * User: panlee
 * Date: 15/5/4
 * Time: 下午5:05
 */

require_once ("./Config/WebConfig.php");


define(DB_HOST,'localhost');
define(DB_USER,'root');
define(DB_PASS,'root');
define(DB_DATABASENAME,'test');


//$db_password = "root";
//$myconn = mysql_connect("localhost", $db_username, $db_password);
//mysql_select_db("my_db", $myconn);
//mysql_query("set names 'gbk'"); // //这就是指定数据库字符集，一般放在连接数据库后面就系了
//$strSql = "select * from YK_User" ;
//$result = mysql_query($strSql, $myconn);
//$obj = array();
//while ($row = mysql_fetch_array($result)) {
//    $obj[$i] = $list;
//    $i++;
//}
//mysql_close($myconn);
//if($obj == null)
//    echo "null";
//else
//    echo json_encode($obj);


//class db{
//
//    function fun(){
//        global $db_username,$db_password;
//        echo "数据库用户名：".$db_username;
//        echo "数据库密码：".$db_password;
//    }
//
//    /**
//     * @param $databaseName
//     * @param $db_password
//     * @return string
//     */
//    public  function queryTab($databaseName)
//    {
//        $myconn = mysql_connect("localhost", $db_username, $db_password);
//        mysql_select_db("test", $myconn);
//        mysql_query("set names 'gbk'"); // //这就是指定数据库字符集，一般放在连接数据库后面就系了
//        $strSql = "select * from " . $databaseName;
//        $result = mysql_query($strSql, $myconn);
//        $obj = array();
//        while ($row = mysql_fetch_array($result)) {
//            $obj[$i] = $list;
//            $i++;
//        }
//        mysql_close($myconn);
//        return json_encode($obj);
//    }
//
//}