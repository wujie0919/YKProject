/*
1、videoId 视频Id
2、videoAddress 上传视频的地址，第一期只选择直辖市、市区、后期做经纬度
3、videoLength 视频长度
4、videowner 视频拥有者
5、videoType 分类
6、uploadDate 上传时间
7、videoDes 视频描述
8、videoStatus 视频状态
 */
 CREATE TABLE  if not exists YK_Video(voideoId VARCHAR (20) PRIMARY KEY ,videoAddress VARCHAR (10),videoLength VARCHAR (10),videowner VARCHAR (20), videoType VARCHAR (2),
 uploadDate VARCHAR (20),videoDes VARCHAR (200),videoStatus VARCHAR (2))