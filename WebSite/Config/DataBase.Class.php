<?php
/**
 * Created by PhpStorm.
 * User: panlee
 * Date: 15/5/5
 * Time: 下午4:52
 */

require '../Config/dbhelper.class.php';
//test
define(DB_HOST,'127.0.0.1:3306');
define(DB_USER,'root');
define(DB_PASS,'root');
define(DB_DATABASENAME,'YKDB');
//define(DB_TABLENAME,'student');

//define(DB_HOST,'bdm123604245.my3w.com:3306');
//define(DB_USER,'bdm123604245');
//define(DB_PASS,'goodpenyou2015');
//define(DB_DATABASENAME,'bdm123604245_db');

class DataBase{
    public $dbhelper;
    public function __construct(){
        $this ->dbhelper = new DBHelper();
        $this ->dbhelper->initDb(DB_HOST,DB_DATABASENAME,DB_USER,DB_PASS);
    }

    public function selectAction($sql){
        $row = $this->dbhelper->selectAll($sql,null);
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
        if(empty($success)) {
            return '0';
        }else{
            return '1';
        }
    }

    public  function isSuccess($success){
        if(empty($success)){
            return '1';
        }else{
            return '0';
        }
    }
}

