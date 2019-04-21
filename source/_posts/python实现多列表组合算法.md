---
title: python实现多列表组合算法
urlname: python-list-com-index
tags:
  - python
  - list
  - 排列组合
categories:
  - python
date: 2019-04-12 19:25:23
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 为解决生成两位字母的所有组合的数学问题，实现本程序的设计。为有同样需要的朋友提供帮助。

<!-- more -->

### 问题提出
- 生成以字母开头的两位字母数字组合
- 例如
```
#已知
list1=['a','b']
list2=['a','b','1','2']
#目标
list3=['aa','ab','a1','a2','ba','bb','b1','b2']
```

### 问题解决
- 正是有人不懈的奋斗和无私的奉献，才使得科技不断地进步，向那些提供共享知识的人，致敬
- 能分享，能开源的科技人，值得赞扬
- 网上一位[牛人](https://blog.csdn.net/wuuud1/article/details/83991951)，设计了一个特别好的程序，直接拿来用了，表示感谢。
```
from functools import reduce
fn = lambda x, code=',': reduce(lambda x, y: [str(i)+code+str(j) for i in x for j in y], x)
# 直接调用fn(lists, code)
```
### 特别说明
- 给出的方案中不仅仅局限于两个列表，可以是多个列表
- 基于应用驱动的目的，本程序将应用于生成字典，这也是研究这个问题的初衷

### 用到的`reduce`函数
- 摘自网络<http://www.runoob.com/python/python-func-reduce.html>

#### 描述
reduce() 函数会对参数序列中元素进行累积。函数将一个数据集合（链表，元组等）中的所有数据进行下列操作：用传给 reduce 中的函数 function（有两个参数）先对集合中的第 1、2 个元素进行操作，得到的结果再与第三个数据用 function 函数运算，最后得到一个结果。

#### 语法
reduce() 函数语法：reduce(function, iterable[, initializer])

#### 参数
- function -- 函数，有两个参数
- iterable -- 可迭代对象
- initializer -- 可选，初始参数
- 返回值：返回函数计算结果。

#### 实例
```
>>>def add(x, y) :            # 两数相加
...     return x + y
... 
>>> reduce(add, [1,2,3,4,5])   # 计算列表和：1+2+3+4+5
15
>>> reduce(lambda x, y: x+y, [1,2,3,4,5])  # 使用 lambda 匿名函数
15
```
#### 更多的python高阶函数
- 高阶函数：map(),reduce(),filter()的区别
- 参见<https://www.cnblogs.com/shapeL/p/9057152.html>

### 饮水思源
- <https://blog.csdn.net/wuuud1/article/details/83991951>
- <http://www.runoob.com/python/python-func-reduce.html>
- <https://www.cnblogs.com/shapeL/p/9057152.html>
