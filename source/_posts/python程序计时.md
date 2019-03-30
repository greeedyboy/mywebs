---
title: python程序计时耗时
urlname: python-time-count-index
tags:
  - python
categories:
  - python
date: 2018-11-28 10:39:51
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> python记录程序耗时情况。

<!-- more -->

好多人说python语音高级，但是会大量占用cpu时间，到底有多占用，提供方法进行程序占用时间测试。代码如下，拿去，不谢：
```
import time
start = time.perf_counter()
#需要测试的函数过程
end= time.perf_counter()
print (end-start)
```