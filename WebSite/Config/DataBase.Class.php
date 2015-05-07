<?php
/**
 * Created by PhpStorm.
 * User: panlee
 * Date: 15/5/5
 * Time: 下午4:52
 */

require '../Config/dbhelper.class.php';

define(DB_HOST,'localhost:3306');
define(DB_USER,'root');
define(DB_PASS,'root');
define(DB_DATABASENAME,'User');
define(DB_TABLENAME,'student');

class DataBase{
    public $dbhelper;
    public function __construct(){
        $this ->dbhelper = new DBHelper();
        $this ->dbhelper->initDb(DB_HOST,DB_DATABASENAME,DB_USER,DB_PASS);
    }

    public function selectAction($sql){
        $row = $this ->dbhelper->selectAll($sql,null);
        $obj = array();
        foreach ($row as $key=>$value) {
            $obj[$key] = $value;
        }
        return  json_encode($obj);
    }

    public function  updateAction($sql){
        $success = $this->dbhelper->update($sql,null);
        return $this->isSuccess($success);
    }

    public function deleteAction($sql){
        $success = $this ->dbhelper->delete($sql,null);
        return $this->isSuccess($success);
    }

    public function  insertAction($sql){
        $success = $this ->dbhelper->insert($sql,null);
        return $this->isSuccess($success);
    }


    public  function isSuccess($success){
        if(var_dump($success)){
            return "失败";
        }else{
            return "成功";
        }
    }
}

