<?php
/**
 * Created by PhpStorm.
 * User: panlee
 * Date: 15/5/5
 * Time: 下午2:07
 */

require '../Config/dbhelper.class.php';


define(DB_HOST,'127.0.0.1:3306');
define(DB_USER,'root');
//define(DB_PASS,'root');
define(DB_PASS,'');
define(DB_DATABASENAME,'YKDB');
define(DB_TABLENAME,'student');

    $name = $_POST['dataBase'];
    $dbhelper = new DBHelper();
    $dbhelper->initDb(DB_HOST,DB_DATABASENAME,DB_USER,DB_PASS);
    $success = '1';
    if($_POST['action'] == 'insert'){
        $success = $dbhelper->insert($sql,null);
    }else if($_POST['action']=='delete' ) {
        $success = $dbhelper->delete($sql,null);
    }else if($_POST['action']=='update') {
        $sql = "update ".$name." set nickname='lipan' where userid = '123'";
        $success = $dbhelper->update($sql,null);
    }else if($_POST['action'] == 'query'){
        $sql = "select * from ".$name;
        $row = $dbhelper->selectAll($sql,null);
        $obj = array();
        foreach ($row as $key=>$value) {
            $obj[$key] = $value;
        }
        echo  json_encode($obj);
    }
    if(empty($success)){
        return '1';
    }else{
        return '0';
    }

//    if(empty($success))
//        echo "成功";
//    else
//        echo "失败";
