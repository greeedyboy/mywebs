---
title: Matlab连接数据库
urlname: matlab-mdb-index
tags:
  - matlab
  - mdb
categories:
  - 软件列表
date: 2019-03-30 17:04:31
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 利用matlab连接到数据库mdb进行数据读取。

<!-- more -->

### 可用代码
- 代码测试在matlab2015，windows7 64位上面可用
'''
conn = actxserver('ADODB.Connection');
connString = 'Provider=Microsoft.ACE.OLEDB.12.0;Data Source=K:\xxx\xxx.mdb;';
conn.Open(connString);
sqlQuery = 'select * from brakef where id>0 order by dateline asc';
myData = conn.Execute(sqlQuery).GetRows;
myData=myData';
Date_x=cell2mat(myData(:,1));
plot(Date_x,cell2mat(myData(:,6)),Date_x,cell2mat(myData(:,8)));
legend('brake-f-10','brake-f-12');
grid on; 
clear conn;
'''
- 如果出现'Error using COM.ADODB_Connection/Open'错误，可以从更改'Provider'入手
- 'Microsoft.Jet.OLEDB.4.0'在32位windows7系统可用，更改为64位系统后失效
