<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 15/5/14
 * Time: 上午10:49
 * par="vedio="+vedioName+"&desc="+desc+"&city="+city+"&type=add"+"&filePath="+filePath
 */

error_reporting(0);
require '../Config/DataBase.Class.php';
require '../Common/Tools.php';

$vedioName=$_POST["videoName"];
$desc=$_POST["desc"];
$city=$_POST["city"];
$opType=$_POST["type"];

exit(alert('文件上传错误'));

if($opType=="add")
{
    $file=$_FILES["fileToUpload"];
    $tools=new Tools();
    $vedioId=$tools->getCommonId();
    $uploadDate=$tools->getCommonId();

    // 定义允许的文件类型

//    $allowType = array('image/jpeg','image/gif','image/jpg');



    // 定义路径，可以是绝对路径，或者相对路径都可以

    $filePath  = '../Videos20150514/';
    if($file)
    {
        // 第一步，判断上传的文件是否有错误

        if( $file['error'] !== 0 ){

            exit(alert('文件上传错误'));

        }

// 第四步，判断路径是否存在，如果不存在则创建

        if( !file_exists($filePath) &&  !mkdir($filePath,0777,true) ){
            exit(alert('创建目录错误'));

        }

        // 第五步，定义上传后的名字及路径

        $filename = time().'_'.$file['name'];



        // 第六步，复制文件

        if( !move_uploaded_file($file,$filePath.$filename) ){

            exit(alert('上传文件出错，请稍候重试'));

        }



// 第七步，删除临时文件

        unlink($file['tmp_name']);



// 提示上传成功

        echo alert('恭喜，上传文件['.$filename.']成功！');
    }

}
