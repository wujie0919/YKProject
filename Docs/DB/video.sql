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
 CREATE TABLE  if not exists YK_Video(videoId int not null auto_increment PRIMARY KEY ,videoAddress VARCHAR (10),videoName VARCHAR (50),videowner VARCHAR (20),uploadDate VARCHAR (20),videoDesc VARCHAR (200),videoStatus VARCHAR (2),videoArea VARCHAR (10))