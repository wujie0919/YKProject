/*
*评论表
*/

CREATE TABLE  if not exists YK_Comment(CommentId int not null auto_increment PRIMARY KEY ,userId VARCHAR (20),commentDate VARCHAR (20),content VARCHAR (200),videoId VARCHAR (20));