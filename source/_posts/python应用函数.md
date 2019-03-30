---
title: python应用函数
urlname: python-function-index
tags:
  - diary
  - python
categories:
  - python
date: 2019-02-14 19:15:28
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 应用中使用的python函数小计。

<!-- more -->

### 获取剪切板

```
# -*- coding: utf-8 -*-

import win32clipboard as wc
import win32con

def getCopyText():
    wc.OpenClipboard()
    copy_text = wc.GetClipboardData(win32con.CF_TEXT)
    wc.CloseClipboard()
    return copy_text.decode('utf-8')

```

### 正确编码存储json文件
```
        with open(self.tempfile,'w',encoding='utf-8') as f_obj:
            json.dump(self.pg_settings[self.pg_settingx], f_obj, ensure_ascii=False,indent=4, separators=(',', ':'))

```

### 连接数据库
```
#!/usr/bin/env python 
# -*- coding:utf-8 -*-
"""info

"""
import sqlite3
sqlpath='datasql.db'

def creat_sql(sqlpath='datasql.db'):
    conn = sqlite3.connect(sqlpath)
    c = conn.cursor()
    try:
        c.execute("""
        CREATE TABLE qiushibaike
        (
            id INTEGER PRIMARY KEY NOT NULL,
            indexpage text, 
            dianji int, 
            content text, 
            isinmy int
        );""")


    except:
        pass
    conn.commit()
    conn.close()

def check_index(indexpage,isinmy,sqlpath='datasql.db'):
    conn = sqlite3.connect(sqlpath)
    sql="select * from qiushibaike where indexpage='"+ indexpage + "' and isinmy=" + str(isinmy)
    sql = "select * from qiushibaike "

    c = conn.execute(sql)
    rows=c.fetchall()
    print(rows)
    if rows:
        return True
    else:
        return False

def update_index(indexpage,dianji,isinmy,sqlpath='datasql.db'):
    sql = "UPDATE qiushibaike SET dianji = "+ dianji +" , isinmy = "+ isinmy +" WHERE indexpage = " + indexpage
    conn = sqlite3.connect(sqlpath)
    c=conn.cursor()
    c.execute(sql)
    conn.commit()
    conn.close()

def insert_index(indexpage,dianji,data,isinmy=0,sqlpath='datasql.db'):
    conn = sqlite3.connect(sqlpath)
    c = conn.cursor()

    if not  check_index(indexpage):
        # sql ="INSERT INTO qiushibaike (indexpage,dianji,content,isinmy) VALUES ("+ index +", 1 , "+ data +", " + isinmy + ")"
        sql = "INSERT INTO qiushibaike (indexpage,dianji,content,isinmy) VALUES ('"+ indexpage +"',"+ str(dianji) +",'"+data+"',"+ str(isinmy) +");"
    else:
        sql = "UPDATE qiushibaike SET dianji = "+ dianji +" WHERE indexpage = " + indexpage
    c.execute(sql)
    conn.commit()
    conn.close()

# creat_sql()
# b=check_index('indexs',0)
# print(b)
# insert_index('indexs',1,'data')
#
# b=check_index('indexs',0)
# print(b)

```