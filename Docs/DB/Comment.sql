/*
*评论表
*/

CREATE TABLE  if not exists YK_Comment(CommentId VARCHAR (20) PRIMARY KEY ,userId VARCHAR (20),commentDate VARCHAR (20),content VARCHAR (200),videoId VARCHAR (20));