<?
if(!$UploadAction):
    ?>
    <HTML>
    <HEAD>
        <TITLE>文件上载界面</TITLE>
    </HEAD>
    <BODY><TABLE><CENTER>
            <FORM ENCTYPE = "multipart/form-data" NAME = "SubmitForm"
                  ACTION = "testupload.php" METHOD = "POST">
                <INPUT TYPE = "hidden" NAME = "MAX_FILE_SIZE" VALUE ="1000000">
                <INPUT TYPE = "hidden" NAME = "UploadAction" VALUE = "1">
                <TR>
                    <TD><INPUT NAME = "UploadFile" TYPE = "file" SIZE = "30"></TD>
                </TR>
                <TR>
                    <TD><INPUT NAME = "submit" VALUE = "提交" TYPE = "submit"></TD>
                    <TD><INPUT NAME = "reset" VALUE = "重置" TYPE = "reset"></TD>
                </TR>
            </FORM></CENTER></TABLE></BODY>
    </HTML>
<?
else:
    ?>
    <HTML>
    <HEAD>
        <TITLE>文件上载代码</TITLE>
    </HEAD>
    <BODY>
    <?
    $UploadAction=0;

    $TimeLimit=60; /*设置超时限制时间
缺省时间为 30秒
设置为0时为不限时 */
    set_time_limit($TimeLimit);

    If(($UploadFile != "none")&&
        ($UploadFile != ""))
    {
        $UploadPath = "./Videos/";
//上载文件存放路径
        $FileName = $UploadPath.$UploadFile_name; //上载文件名
        if($UploadFile_size <1024) //上载文件大小
        {
            $FileSize = (string)$UploadFile_size . "字节";
        }
        elseif($UploadFile_size <(1024 * 1024))
        {
            $FileSize = number_format((double)($UploadFile_size / 1024), 1) . " KB";
        }
        else
        {
            $FileSize = number_format((double)($UploadFile_size/(1024*1024)),1)."MB";
        }

        if(!file_exists($FileName))
        {
            if(copy($UploadFile,$FileName))
            {
                echo "文件 $UploadFile_name ($FileSize)上载成功！";
            }
            else
            {
                echo "文件 $UploadFile_name上载失败！";
            }
            unlink($UploadFile);
        }
        else
        {
            echo "文件 $UploadFile_name已经存在！";
        }
    }
    else
    {
        echo "你没有选择任何文件上载！";
    }

    set_time_limit(30); //恢复缺省超时设置
    ?>
    <BR><A HREF = "upload.php3">返回</A>
    </BODY>
    </HTML>
<?
endif;
?>