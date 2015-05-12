
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
    <script src="../Resources/js/ajax.js"></script>
    <link href="../Resources/css/page.css" rel="stylesheet" />
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
                        <li class="active"><a href="#">用户管理</a></li>
<!--                        <li><a href="#">文件管理</a></li>-->
<!--                        <li><a href="#">栏目管理</a></li>-->
                    </ul>
                </li>
<!--                <li><a href="system.html" class="icon-cog"> 系统</a>-->
<!--                    <ul><li><a href="#">全局设置</a></li><li class="active"><a href="#">系统设置</a></li><li><a href="#">会员设置</a></li><li><a href="#">积分设置</a></li></ul>-->
<!--                </li>-->
                <li><a href="VedioManager.php" class="icon-file-text"> 视频</a>
                    <ul>
                        <!--                        <li><a href="#">添加内容</a></li>-->
                        <li class="active"><a href="#">视频管理</a></li>
                        <!--                        <li><a href="#">分类设置</a></li>-->
                        <!--                        <li></li><a href="#">链接管理</a></li>-->
                    </ul>
                </li>
                <li><a href="CommentManager.php" class="icon-shopping-cart">评论管理</a>
                    <ul><li><a href="CommentManager.php">评论管理</a></li></ul>
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
                <li>后台首页</li>
            </ul>
        </div>
    </div>
</div>

<div class="admin">
    <form method="post" action="">
        <div class="panel admin-panel">
            <div class="panel-head"><strong>用户列表</strong></div>
            <div class="padding border-bottom">
                <input type="button" class="button button-small checkall" name="checkall" checkfor="id" value="全选" />
                <input type="button" class="button button-small border-green" value="添加用户" onClick="location.href='addUser.php?type=add'"/>
                <input type="button" class="button button-small border-yellow" value="批量删除" />
<!--                <input type="button" class="button button-small border-blue" value="被封用户" />-->
            </div>
            <?php
            error_reporting(0);
            require '../Config/DataBase.Class.php';
            $data=new DataBase();
            $list=array();
            $sql="SELECT * FROM YK_User";
            $list= $data->selectAction($sql);
            $total=sizeof($list);

            $page=isset($_POST['page'])?intval($_POST['page']):1;//这句就是获取page=18中的page的值，假如不存在page，那么页数就是1。
            $num=20;                                     //每页显示条数
            $url = end(explode('/',$_SERVER['PHP_SELF'])); // 获取当前访问的文件名

            //页码计算
            $pagenum=ceil($total/$num);                                    //获得总页数,也是最后一页
            $page=min($pagenum,$page);//获得首页
            $prepg=$page-1;//上一页
            $nextpg=($page==$pagenum ? 0 : $page+1);//下一页
            $offset=($page-1)*$num;                                      //获取limit的第一个参数的值，假如第一页则为(1-1)*10=0,第二页为(2-1)*10=10。

            //开始分页导航条代码：
            $pagenav="第 <B>".($total?($offset+1):0)."</B>-<B>".min($offset+$num,$total)."</B> 条记录，共 $total 条记录&nbsp;";

            //如果只有一页则跳出函数：
//            if($pagenum<=1) return false;

            $pagenav.=" <a href=javascript:dopage('msg','$url','1');>首页</a> ";
            if($prepg) $pagenav.=" <a href=javascript:dopage('msg','$url','$prepg');>前页</a> "; else $pagenav.=" 前页 ";
            if($nextpg) $pagenav.=" <a href=javascript:dopage('msg','$url','$nextpg');>后页</a> "; else $pagenav.=" 后页 ";
            $pagenav.=" <a href=javascript:dopage('msg','$url','$pagenum');>尾页</a> ";
            $pagenav.="</select> 页，共 $pagenum 页";

            //假如传入的页数参数大于总页数，则显示错误信息
//            If($page>$pagenum){
//                Echo "Error : Can Not Found The page ".$page;
//                Exit;
//            }

            echo "<table class='table table-hover'>
                <tr><th width='45'>选择</th><th width='120'>分类</th><th width='*'>名称</th><th width='100'>时间</th><th width='100'>操作</th></tr>";
            if(sizeof($data)>0)
                echo "<tr><td colspan='5' align='center'><span style='color: #ee3333'>无数据</span></td> </tr>";
            else
            {
                for($i=0;$i<sizeof($data);$i++)
                {

                }
            }
            echo "</table>";
            ?>
<!---->
<!--            <div class="panel-foot text-center">-->
<!--                <ul class="pagination"><li><a href="#">上一页</a></li></ul>-->
<!--                <ul class="pagination pagination-group">-->
<!--                    <li><a href="#">1</a></li>-->
<!--                    <li class="active"><a href="#">2</a></li>-->
<!--                    <li><a href="#">3</a></li>-->
<!--                    <li><a href="#">4</a></li>-->
<!--                    <li><a href="#">5</a></li>-->
<!--                </ul>-->
<!--                <ul class="pagination"><li><a href="#">下一页</a></li></ul>-->
<!--            </div>-->
        </div>
    </form>
    <br />
</div>


</body>
</html>
