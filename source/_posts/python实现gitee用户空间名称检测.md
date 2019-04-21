---
title: python实现gitee用户空间名称检测
urlname: python-gitee-index
tags:
  - gitee
  - python
categories:
  - daybreak
date: 2019-04-13 01:49:44
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 申请gitee码云账户空间名称时候，选择犹豫症又犯病了，无奈想看看还有没有短一点的名称，就想到使用python来逐个测试，把没有注册的放置到txt文本中，择优注册，说干就干。

<!-- more -->
### 大致思路
- gitee主页注册查询
- 生成查询关键字列表
- 利用python进行post
- 根据post结果提取可用列表存入txt

![尝试思维导图](https://wx1.sinaimg.cn/large/3f2c99ebgy1g20e72aydyj20kv085jrf.jpg)

### 曲折说明
- 生成字典时，查找方法资料，具体参考本文<https://wqian.net/blog/2019/0412-python-list-com-index.html>
- 开始学习利用python进行post
- 包涵操作txt文件追加内容

### 直接上代码吧
```
#!/usr/bin/env python 
# -*- coding:utf-8 -*-
"""info
check gitee.com user
"""

import requests
from functools import reduce


list1=[chr(i) for i in range(97,123)]
list2=[chr(i) for i in range(48,58)]
list3=list1[:]
list3.extend(list2)

fn = lambda x, code=',': reduce(lambda x, y: [str(i)+code+str(j) for i in x for j in y], x)
# 直接调用fn(lists, code)

ablist=fn([list1,list1,list1],'')



# 创建session对象，可以保存Cookie值
ssion = requests.session()

# 处理 headers
headers = {"User-Agent": "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36"}
file = r'giteeuser.txt'
with open(file, 'a+') as f:
    f.write("*"*10+ '\n')  # 加\n换行显示

for val in ablist:

    data = {"do": "user_username", "val": val}
    # 发送附带用户名和密码的请求，并获取登录后的Cookie值，保存在ssion里
    response = ssion.post("https://gitee.com/check", data=data)
    resok=response.ok
    rest = response.text
    if resok :
        if rest=='地址已存在' or rest=='This url is already taken':
            print("can not be user="+val)
        else:
            print("can be user="+val)
            with open(file, 'a+') as f:
                f.write(val + '\n')  # 加\n换行显示
```

### 饮水思源
- https://gitee.com/
- https://wqian.net/blog/2019/0412-python-list-com-index.html
- http://coolaf.com/