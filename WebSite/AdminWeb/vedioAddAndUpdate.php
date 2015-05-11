<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理</title>
    <link rel="stylesheet" href="../Resources/css/pintuer.css">
    <link rel="stylesheet" href="../Resources/css/admin.css">
    <script src="../Resources/js/jquery.js"></script>
    <script src="../Resources/js/pintuer.js"></script>
    <script src="../Resources/js/respond.js"></script>
    <script src="../Resources/js/admin.js"></script>
    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
    <link href="/favicon.ico" rel="bookmark icon" />
    <style type="text/css">
        .txt{ height:22px; border:1px solid #cdcdcd; width:180px;}
        .btn{ background-color:#FFF; border:1px solid #CDCDCD;height:24px; width:70px;}
        .file{ position:absolute; top:0; right:80px; height:24px; filter:alpha(opacity:0);opacity: 0;width:260px }
    </style>
</head>

<body>
<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 15/5/5
 * Time: 上午10:54
 */
session_start();
if(!$_SESSION["Login"] && $_SESSION["Login"]!="admin")
{
    header("Location:login.html");
    exit;
}
?>
<div class="lefter">
    <div class="logo"><a href="#" target="_blank"><img src="../Resources/images/logo.png" alt="后台管理系统" /></a></div>
</div>
<div class="righter nav-navicon" id="admin-nav">
    <div class="mainer">
        <div class="admin-navbar">
            <span class="float-right">
            	<a class="button button-little bg-main" href="#">前台首页</a>
                <a class="button button-little bg-yellow" href="login.html">注销登录</a>
            </span>
            <ul class="nav nav-inline admin-nav">
                <li><a href="UserManager.php" class="icon-home"> 用户管理</a>
                    <ul><li><a href="system.html">系统设置</a></li><li><a href="content.html">内容管理</a></li><li><a href="#">订单管理</a></li><li class="active"><a href="#">会员管理</a></li><li><a href="#">文件管理</a></li><li><a href="#">栏目管理</a></li></ul>
                </li>
                <!--                <li><a href="system.html" class="icon-cog"> 系统</a>-->
                <!--                    <ul><li><a href="#">全局设置</a></li><li class="active"><a href="#">系统设置</a></li><li><a href="#">会员设置</a></li><li><a href="#">积分设置</a></li></ul>-->
                <!--                </li>-->
                <li class="active"><a href="VedioManager.php" class="icon-file-text"> 视频</a>
                    <ul>
                        <!--                        <li><a href="#">添加内容</a></li>-->
                        <li class="active"><a href="#">视频管理</a></li>
                        <!--                        <li><a href="#">分类设置</a></li>-->
                        <!--                        <li></li><a href="#">链接管理</a></li>-->
                    </ul>
                </li>
                <!--                <li><a href="#" class="icon-shopping-cart"> 订单</a></li>-->
                <!--                <li><a href="#" class="icon-user"> 会员</a></li>-->
                <!--                <li><a href="#" class="icon-file"> 文件</a></li>-->
                <!--                <li><a href="#" class="icon-th-list"> 栏目</a></li>-->
            </ul>
        </div>
        <div class="admin-bread">
            <span>
                <?php
                $name=$_SESSION["Login"];
                $info="";
                $info.="您好，".$name."，欢迎您的光临。";
                echo $info;
                ?>
            </span>
            <ul class="bread">
                <li><a href="UserManager.php" class="icon-home"> 开始</a></li>
                <li><a href="VedioManager.php">视频管理</a></li>
                <?php
                    error_reporting(0);
                    $type=$_GET["type"];
                    if($type=="add")
                        echo "<li>添加视频</li>";
                    else if($type=="update")
                        echo "<li>更新视频</li>";
                    else
                        exit;
                ?>
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript">
    function fileSelected() {
        var file = document.getElementById('fileToUpload').files[0];
        if (file) {
            var fileSize = 0;
            if (file.size > 1024 * 1024)
                fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';
            else
                fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';

            document.getElementById('fileName').innerHTML = 'Name: ' + file.name;
            document.getElementById('fileSize').innerHTML = 'Size: ' + fileSize;
            document.getElementById('fileType').innerHTML = 'Type: ' + file.type;
        }
    }
</script>
<div class="admin">
    <form method="post">
        <table>
            <tr style="height: 40px">
                <td>视频名称：</td>
                <td><input type="text"/></td>
            </tr>
            <tr style="height: 40px">
                <td>选择视频：</td>
                <td>
                    <input type="file" name="fileToUpload" id="fileToUpload" onchange="fileSelected();"/>
                </td>
            </tr>
            <tr style="height: 40px">
                <td>选择视频地区：</td>
                <td><select id="s1_text1_bold">
                        <option value="0" selected="">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select></td>
            </tr>
            <tr style="height: 40px">
                <td>视频描述：</td>
                <td>
                    <textarea rows="4" cols="50" name="comment" onfocus="if(value=='请在此处输入描述...') {value=''}" onblur="if(value=='') {value='请在此处输入描述...'}">请在此处输入描述...</textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                <td colspan="2" align="center"><input type="button" value="确定"/></td>
                </td>
            </tr>
        </table>
    </form>
    <br />
</div>




</body>
</html>


