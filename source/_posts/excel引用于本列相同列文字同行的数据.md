---
title: excel引用于本列相同列文字同行的数据
urlname: excel-vlookup-index
tags:
  - excel
  - vlookup
categories:
  - 软件列表
date: 2018-07-31 15:13:58
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 在excel中可能会遇到引用与目标相同文字所在的行的某一个数据，那么就使用vlookup吧，好用。

<!-- more -->

![](https://wx3.sinaimg.cn/large/3f2c99ebgy1ftt2n1zg5dj20k40b1wev.jpg)

使用图来说明，如下想引用E对应的数字，使用代码如下：

```
=VLOOKUP(J6,$F$6:$G$12,2,0)
```

需要注意的是VLOOKUP的参数：
- 第一个参数表示要查找的文字
- 第二个参数是表示要查找的范围，要把你需要取的列包括进去
- 范围的第一列为1，第二列为2，第三列为3，以此类推
- false或0吧

that is all,thank me.
