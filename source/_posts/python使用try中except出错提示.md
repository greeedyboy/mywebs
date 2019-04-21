---
title: python使用try中except出错提示
urlname: python-print-index
tags:
  - python
  - try
  - except
categories:
  - python
date: 2019-04-18 01:26:25
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 自建try出错信息显示程序。

<!-- more -->

### 自建print程序

```
import traceback
def print_e(msg='',wfile='errlog.txt',record_e=True,show_e=True):
    '''
    记录错误
    :param msg: 信息
    :param wfile: 错误文件目录
    :param record_e: 是否记录到文件
    :param show_e: 是否显示系统错误
    :return:
    '''
    if not msg is None:
        print(msg)
    if show_e:
        traceback.print_exc()
    if record_e:
        traceback.print_exc(file=open(wfile, 'a+'))
try:
    a=1
    b=0
    c=a/b
except:
    print_e(msg='err')

```