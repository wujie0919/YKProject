
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理-用户管理</title>
    <link rel="stylesheet" href="../Resources/css/pintuer.css">
    <link rel="stylesheet" href="../Resources/css/admin.css">
    <script src="../Resources/js/jquery.js"></script>
    <script src="../Resources/js/pintuer.js"></script>
    <script src="../Resources/js/respond.js"></script>
    <script src="../Resources/js/admin.js"></script>
    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
    <link href="/favicon.ico" rel="bookmark icon" />
</head>

<body>
<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 15/5/5
 * Time: 上午10:59
 */
session_start();
if(!$_SESSION["Login"])
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
            	<!--<a class="button button-little bg-main" href="#" target="_blank">前台首页</a>-->
                <a class="button button-little bg-yellow" href="logout.php">注销登录</a>
            </span>
            <ul class="nav nav-inline admin-nav">
                <li class="active"><a href="UserManager.php" class="icon-home"> 用户管理</a>
                    <ul>
                        <!--                        <li><a href="system.html">系统设置</a></li>-->
                        <!--                        <li><a href="content.html">内容管理</a></li>-->
                        <!--                        <li><a href="#">订单管理</a></li>-->
                        <li class="active"><a href="UserManager.php">用户管理</a></li>
                        <!--                        <li><a href="#">文件管理</a></li>-->
                        <!--                        <li><a href="#">栏目管理</a></li>-->
                    </ul>
                </li>
                <!--                <li><a href="system.html" class="icon-cog"> 系统</a>-->
                <!--                    <ul><li><a href="#">全局设置</a></li><li class="active"><a href="#">系统设置</a></li><li><a href="#">会员设置</a></li><li><a href="#">积分设置</a></li></ul>-->
                <!--                </li>-->
                <li><a href="VedioManager.php" class="icon-file-text"> 视频</a>
                    <ul><li><a href="#">添加内容</a></li><li class="active"><a href="#">视频管理</a></li><li><a href="#">分类设置</a></li><li><a href="#">链接管理</a></li></ul>
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
                <li><a href="#" class="icon-home"> 开始</a></li>
                <?php
                    error_reporting(0);
                    $type=$_GET["type"];
                    if($type=="add")
                        echo "<li>添加用户</li>";
                    else if($type=="update")
                        echo "<li>更新用户</li>";
                    else
                        exit;
                ?>

            </ul>
        </div>
    </div>
</div>

<div class="admin">
    <form method="post" action="">
        <table width="100%" style="border-width: 1px">
            <tr style="height: 40px">
                <td width="40px">昵称：</td>
                <td width="200px"><input type="text" id="nickname" width="200px"/></td>
            </tr>
            <tr style="height: 40px">
                <td width="40px">密码：</td>
                <td width="200px"><input type="text" id="nickname" width="200px"/></td>
            </tr>
            <tr style="height: 40px">
                <td width="40px">唯一标识（仅用于第三方登陆的账号）：</td>
                <td width="200px"><input type="text" id="nickname" width="200px"/></td>
            </tr>
            <tr style="height: 40px">
                <td width="40px">token（仅用于iPhone）：</td>
                <td width="200px"><input type="text" id="nickname" width="200px"/></td>
            </tr>
            <tr style="height: 40px">
                <td>用户状态：</td>
                <td>
                    被封：
                    <input type="radio" name="status" value="Male" checked="feng"/>
                    解封：
                    <input type="radio" name="status" value="unfeng"/>
                </td>
            </tr>

            <tr style="height: 40px">
                <td>来源：</td>
                <td>
                    正常：
                    <input type="radio" name="fs" value="zc" checked="zc">
                    微博:
                    <input type="radio" name="fs" value="weibo" />
                    微信:
                    <input type="radio" name="fs" value="weixin">
                    QQ：
                    <input type="radio" name="fs" value="qq">

                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="button" value="确定"/></td>
            </tr>
        </table>
    </form>
    <br />
</div>


</body>
</html>