/*
*评论表
*/

CREATE TABLE  if not exists YK_Comment(CommentId VARCHAR (20) PRIMARY KEY ,userId VARCHAR (20),commentDate VARCHAR (20),token VARCHAR (50),password VARCHAR (100), userStatus VARCHAR (2),
fromSource VARCHAR (2),iden VARCHAR (100));