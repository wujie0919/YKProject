/*
 字段说明
1、userId 用户id，用时间生成
2、nickName 用户昵称
3、CreateDate 创建账户时间
4、token 手机token 用来存储
5、password 密码
6、userStatus 账号状态 0：正常 1、被封
8、from 0、微博 1、QQ
9、iden 第三方的唯一标识
预留其他字段
 */
 CREATE TABLE  if not exists YK_User(userId int not null auto_increment PRIMARY KEY ,nickName VARCHAR (20),CreateDate VARCHAR (20),token VARCHAR (50),passw VARCHAR (100), userStatus VARCHAR (2),
fromSource VARCHAR (2),iden VARCHAR (100),OSType VARCHAR (20));