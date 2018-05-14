---
title: VB.net中Aarry和Aaarylist及list类型相互转换
urlname: vb-net-array-list
tags:
  - vb.net
categories:
  - vb.net
date: 2018-04-19 17:03:48
---
>使用VB.net时遇到Aarry和Aaarylist及list类型的相互转换问题。Arraylist为集合的子类，数组和集合都可以用来表示容纳了相同数据的一个容器,数组的大小是固定的,集合的大小就是可变的可以任意增删改查。本文简单描述三种类型的区别，并提供相互转换的方法，为一些分不清的同学提供一些参考。

<!-- more -->

### Aarry数组说明
- 数组Aarry定义与变量定义差不多。可以用 dim 来定义
```
 dim a（100） as integer
 dim b(10) as string
 dim c as string()
 dim d() as integer ={1, 2, 3,4}
```
- 数组分为一维数组、二维数组等。详情查阅[参考文献](https://blog.csdn.net/departure19841030/article/details/4765276)

### ArrayList说明
- ArrayList 是一个数组列表，它位于 System.Collections名称空间下。是集和类型。 与 List相似。
- 使用简单例子，源自[网络参考](http://developer.51cto.com/art/201001/177862.htm)。+
```
Dim t As New ArrayList()  
t.Add("Northsnow")  
Dim d As New Collection  
d.Add("snow")  
d.Add("water")  
t.AddRange(d)  
For Each aa As String In t  
MsgBox(aa.ToString())  
Next  
'会依次输出：  
'Northsnow  
'snow 
'water  
ArrayList的构造器可以接受一个
集和，例子如下：  
Dim d As New Collection  
d.add("Northsnow")  
d.Add("snow")  
d.Add("water")  
Dim t As New ArrayList(d)  
Dim sb As New System.Text
.StringBuilder()  
If t.Count > 0 Then  
sb.Append("ArrayList中共有成员 ")  
sb.Append(t.Count.ToString)  
sb.Append(" 个")  
For Each aa As String In t  
sb.AppendLine()  
sb.Append(aa)  
Next  
End If  
MsgBox(sb.ToString)  
'最后输出结果为：  
'ArrayList中共有 成员 3 个  
'Northsnow  
'塞北的雪  
'51CTO 
```
### list
- list 属于VB.net中的泛型，具体可以参考相关文献

### 相互转换
```
'array-arraylist 
Dim MyIntArray() as integer={1,2,3}

Dim arrList As ArrayList = ArrayList.Adapter(MyIntArray)

'array-list 
Dim strArr as string()

Dim listS As New List(Of System.String)(strArr)

’arraylist-array
Dim listx As New ArrayList()
Dim arrString() As String = DirectCast(listx.ToArray(GetType(String)), String())

’  array-list
Dim str() As System.String={"str", "string", "abc"}
Dim listS As New List(Of System.String)(str)
’ list- array
Dim listS As New List(Of System.String)()
listS.Add("str")
listS.Add("hello")
Dim str() As System.String=listS.ToArray()
```


## **如果文章对你有一丁点的触动，赏一分钱鼓励一下作者吧**